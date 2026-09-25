<?php
/**
 * PFM New-Customer Application — Stripe payment layer
 *
 * Sibling to StripeClient's renewal-side methods. StripeClient's
 * createCheckoutSession / syncStripePaymentInto are typed to
 * RenewalSession and read its clients row for pricing; a new
 * application has neither, so this class re-implements just those
 * pieces against NewApplication and reuses everything that is
 * session-type-agnostic from StripeClient (the pricing breakdown
 * function, the HTTP/secret handling in apiPost, session and
 * payment-intent retrieval).
 *
 * Payment is confirmed the same two ways as the renewal flow:
 *   - Step 8's success-URL polling (confirmAndSync) — primary path
 *   - the Stripe webhook (handleCheckoutCompleted) — safety net for a
 *     customer who pays and closes the tab; only active if a webhook is
 *     configured in the Stripe dashboard
 * plus reconcile(): when an applicant returns to Step 7 (or retries
 * payment) we ask Stripe whether their earlier Checkout Session was
 * actually paid, so a paid-but-never-confirmed application is repaired
 * instead of being charged twice.
 *
 * Nothing here writes to clients / members / client_pmts — that happens
 * only when staff approve (spec 13.8).
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/NewApplication.php';
require_once __DIR__ . '/StripeClient.php';

final class ApplicationStripe
{
    /** Hosts allowed to use LIVE Stripe keys. */
    private const PRODUCTION_HOSTS = ['pfm-app.com', 'www.pfm-app.com'];

    /**
     * Base URL for Stripe return links. PFM_APP_BASE_URL (optional,
     * per-server config) wins so a staging server whose config was
     * copied from production can still redirect back to itself;
     * otherwise the renewal module's PFM_RNW_BASE_URL is used.
     */
    public static function baseUrl(): string
    {
        return defined('PFM_APP_BASE_URL') ? (string) PFM_APP_BASE_URL : (string) PFM_RNW_BASE_URL;
    }

    /**
     * Refuse to create a Checkout Session with a LIVE Stripe key from a
     * host that is not production. The staging clone's config was copied
     * from a production-mirroring rehearsal clone (live keys, production
     * base URL); without this guard a test click-through on staging
     * could put a real card charge through. Production (pfm-app.com) is
     * unaffected.
     *
     * @throws RuntimeException
     */
    public static function assertSafeEnvironment(): void
    {
        $key = (string) PFM_RNW_STRIPE_API_KEY;
        $isLiveKey = str_contains($key, '_live_');

        $host = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
        $host = (string) preg_replace('/:\d+$/', '', $host);

        if ($isLiveKey && !in_array($host, self::PRODUCTION_HOSTS, true)) {
            throw new RuntimeException(
                'Payments are disabled on this server: it is configured with a LIVE Stripe key '
                . 'but is not the production site. Configure Stripe TEST keys to test payments here.'
            );
        }
    }

    // ===== CHECKOUT =====

    /**
     * Create a Stripe Checkout Session for a submitted application and
     * advance it submitted → awaiting_payment. The amount is computed
     * here, server-side, from the Step 2 business category and the
     * buyer count — nothing about price comes from the browser.
     *
     * @return string Stripe Checkout URL to redirect the applicant to
     * @throws RuntimeException on wrong state, unresolvable price, or Stripe error
     */
    public static function createCheckoutSession(NewApplication $app, string $customerEmail = ''): string
    {
        if ($app->status !== NewApplication::STATUS_SUBMITTED) {
            throw new RuntimeException(
                "Cannot create Stripe session: application {$app->id} is in state '{$app->status}' (must be submitted)."
            );
        }
        if ($app->applicationType !== NewApplication::TYPE_ANNUAL) {
            throw new RuntimeException("Application {$app->id}: '{$app->applicationType}' applications are not supported yet.");
        }
        self::assertSafeEnvironment();

        $catId = (int) ($app->draftData['org']['bus_cat_id'] ?? 0);
        $level = NewApplication::getLevelForCategory($catId);
        if ($level === null) {
            throw new RuntimeException("Application {$app->id}: could not resolve a membership level for category {$catId}.");
        }

        $buyerCount  = $app->totalBuyerCount();
        $breakdown   = StripeClient::pricingBreakdown($level, $buyerCount);
        $amountCents = (int) $breakdown['total_cents'];
        if ($amountCents <= 0) {
            throw new RuntimeException("Application {$app->id}: computed amount is not positive.");
        }

        $description = "PFM New Membership Application — {$breakdown['level_name']} ({$buyerCount} buyer"
            . ($buyerCount !== 1 ? 's' : '') . ')';

        $base   = self::baseUrl();
        $params = [
            'mode'                                              => 'payment',
            'payment_method_types[]'                            => 'card',
            'line_items[0][price_data][currency]'               => 'usd',
            'line_items[0][price_data][product_data][name]'     => $description,
            'line_items[0][price_data][unit_amount]'            => (string) $amountCents,
            'line_items[0][quantity]'                           => '1',
            'success_url' => StripeClient::buildReturnUrl(
                $base . '/public/apply/steps/8-confirmation.php',
                ['session_id' => '{CHECKOUT_SESSION_ID}', 'token' => $app->token]
            ),
            'cancel_url'  => StripeClient::buildReturnUrl(
                $base . '/public/apply/steps/7-payment.php',
                ['cancelled' => '1', 'token' => $app->token]
            ),
            'client_reference_id'                               => $app->getReferenceNumber(),
            'metadata[application_id]'                          => (string) $app->id,
            'metadata[flow]'                                    => 'new_application',
            'payment_intent_data[metadata][application_id]'     => (string) $app->id,
        ];
        if ($customerEmail !== '') {
            $params['customer_email'] = $customerEmail;
        }

        $response = StripeClient::apiPost('/checkout/sessions', $params);
        if (!isset($response['id'], $response['url'])) {
            $errMsg = $response['error']['message'] ?? 'Unknown Stripe error';
            throw new RuntimeException("Stripe Checkout creation failed: {$errMsg}");
        }

        $app->setStripeSession((string) $response['id']);
        return (string) $response['url'];
    }

    /**
     * Best-effort: expire an old, still-open Checkout Session so it can't
     * be paid after the applicant has been given a new one (which would
     * charge them twice). Errors are ignored — an already-completed or
     * already-expired session simply refuses.
     */
    public static function expireSession(string $stripeSessionId): void
    {
        if ($stripeSessionId === '') {
            return;
        }
        try {
            StripeClient::apiPost('/checkout/sessions/' . rawurlencode($stripeSessionId) . '/expire', []);
        } catch (Throwable $e) {
            error_log('[new_application] expireSession ignored: ' . $e->getMessage());
        }
    }

    // ===== CONFIRMATION =====

    /**
     * Ask Stripe whether the applicant's stored Checkout Session was
     * actually paid; if so, apply it locally. Repairs the
     * "paid, then closed the tab before the success page ran" case.
     *
     * @return bool true if the application is (now) paid
     */
    public static function reconcile(NewApplication $app): bool
    {
        if ($app->isPaid()) {
            return true;
        }
        if ($app->stripeSessionId === null || $app->stripeSessionId === '') {
            return false;
        }
        try {
            $session = StripeClient::retrieveCheckoutSession($app->stripeSessionId);
            if (($session['payment_status'] ?? '') === 'paid') {
                return self::syncPaidSession($session) !== null;
            }
        } catch (Throwable $e) {
            error_log('[new_application] reconcile failed for application ' . $app->id . ': ' . $e->getMessage());
        }
        return false;
    }

    /**
     * Success-URL entry point (Step 8): confirm by asking Stripe directly.
     *
     * @return NewApplication|null the synced application, or null if
     *         Stripe does not (yet) report the session as paid or it
     *         isn't one of ours
     * @throws RuntimeException on Stripe API error
     */
    public static function confirmAndSync(string $stripeSessionId): ?NewApplication
    {
        if ($stripeSessionId === '') {
            throw new RuntimeException('confirmAndSync: empty Stripe session id.');
        }
        $stripeSession = StripeClient::retrieveCheckoutSession($stripeSessionId);
        if (($stripeSession['payment_status'] ?? '') !== 'paid') {
            return null;
        }
        return self::syncPaidSession($stripeSession);
    }

    /**
     * Webhook entry point. Returns null for events that are not a
     * new-application checkout (the renewal handler owns those).
     */
    public static function handleCheckoutCompleted(array $event): ?NewApplication
    {
        if (($event['type'] ?? '') !== 'checkout.session.completed') {
            return null;
        }
        return self::syncPaidSession($event['data']['object'] ?? []);
    }

    /**
     * Apply a PAID Stripe Checkout Session object to our application
     * row: awaiting_payment/submitted → awaiting_review, receipt details,
     * admin review token, customer confirmation email.
     *
     * Idempotent and race-safe: the row is locked (SELECT … FOR UPDATE)
     * while the state is checked and changed, so a webhook and the Step 8
     * poll arriving together apply the payment exactly once, and only the
     * caller that made the transition sends the email.
     *
     * @return NewApplication|null null when the session isn't a paid
     *         new-application checkout
     * @throws RuntimeException on data-integrity problems
     */
    public static function syncPaidSession(array $stripeSession): ?NewApplication
    {
        $appId = (int) ($stripeSession['metadata']['application_id'] ?? 0);
        if ($appId <= 0) {
            return null;
        }
        if (($stripeSession['payment_status'] ?? '') !== 'paid') {
            return null;
        }

        $paymentIntentId = (string) ($stripeSession['payment_intent'] ?? '');
        if ($paymentIntentId === '') {
            throw new RuntimeException('syncPaidSession: no payment_intent on Stripe session.');
        }
        $amountDollars = ((int) ($stripeSession['amount_total'] ?? 0)) / 100.0;

        $transitioned = false;
        $app = null;

        Db::transaction(function () use ($appId, $paymentIntentId, $amountDollars, &$transitioned, &$app): void {
            Db::one('SELECT id FROM new_applications WHERE id = ? FOR UPDATE', [$appId]);
            $app = NewApplication::loadById($appId);
            if ($app === null) {
                throw new RuntimeException("syncPaidSession: application {$appId} not found.");
            }
            if ($app->isPaid()) {
                return; // already applied — idempotent
            }
            $app->markPaid($paymentIntentId, $amountDollars); // throws if state is wrong
            $transitioned = true;
        });

        if (!$transitioned || $app === null) {
            return $app;
        }

        try {
            $pi     = StripeClient::retrievePaymentIntentWithCharge($paymentIntentId);
            $charge = $pi['latest_charge'] ?? null;
            if (is_array($charge)) {
                $receipt = isset($charge['receipt_url']) ? (string) $charge['receipt_url'] : '';
                $brand   = $charge['payment_method_details']['card']['brand'] ?? null;
                $last4   = $charge['payment_method_details']['card']['last4'] ?? null;
                $app->saveStripePaymentDetails(
                    $receipt !== '' ? $receipt : null,
                    $brand !== null ? (string) $brand : null,
                    $last4 !== null ? (string) $last4 : null
                );
            }
        } catch (Throwable $e) {
            error_log(sprintf(
                '[new_application] Stripe payment detail fetch failed for application %d (%s): %s',
                $app->id, $paymentIntentId, $e->getMessage()
            ));
        }

        $app->ensureAdminReviewToken();

        // No staff email: Larissa's Phase 6 instruction ("do not add staff
        // notification emails unless there is a specific reason") — staff
        // find pending items in Application Reviews.

        try {
            self::sendCustomerConfirmationEmail($app);
        } catch (Throwable $e) {
            error_log(sprintf(
                '[new_application] Customer confirmation email failed for application %d: %s',
                $app->id, $e->getMessage()
            ));
        }

        return $app;
    }

    // ===== CUSTOMER CONFIRMATION EMAIL =====

    /**
     * Compose the "Thank You for Your Buyer's Pass Application" email
     * (members_status.memb_status_id = 1 — same template the renewal
     * flow uses, editable by staff in the existing admin). Split from
     * sending so it can be inspected without delivering anything.
     *
     * @return array{to:string, subject:string, body:string, company:string}|null
     *         null when the template or recipient is missing
     */
    public static function buildCustomerConfirmationEmail(NewApplication $app): ?array
    {
        $template = Db::one(
            'SELECT msg_subject, msg_body FROM members_status WHERE memb_status_id = 1',
            []
        );
        if (!$template || empty($template['msg_subject']) || empty($template['msg_body'])) {
            error_log("[new_application] Confirmation email skipped for application {$app->id}: members_status id=1 template missing/empty.");
            return null;
        }

        $to = trim((string) ($app->draftData['contact']['email'] ?? ''));
        if ($to === '') {
            error_log("[new_application] Confirmation email skipped for application {$app->id}: no contact email.");
            return null;
        }

        $company = trim((string) ($app->draftData['org']['co_name'] ?? '')) ?: 'Customer';

        $subject = str_replace('~COMPANY NAME~', $company, (string) $template['msg_subject']);
        $body    = str_replace('~COMPANY NAME~', $company, (string) $template['msg_body']);
        if (defined('PFM_RNW_NOTIFY_SUBJECT_PREFIX') && PFM_RNW_NOTIFY_SUBJECT_PREFIX !== '') {
            $subject = PFM_RNW_NOTIFY_SUBJECT_PREFIX . $subject;
        }

        return ['to' => $to, 'subject' => $subject, 'body' => $body, 'company' => $company];
    }

    /**
     * True for addresses on RFC 2606 reserved test domains — never
     * deliverable, and not worth sending through the live mail relay
     * (e.g. from staging test data).
     */
    public static function isReservedTestAddress(string $email): bool
    {
        $domain = strtolower((string) substr(strrchr($email, '@') ?: '', 1));
        if ($domain === '') {
            return false;
        }
        foreach (['example.com', 'example.org', 'example.net'] as $d) {
            if ($domain === $d) {
                return true;
            }
        }
        return (bool) preg_match('/\.(test|example|invalid|localhost)$/', $domain);
    }

    public static function sendCustomerConfirmationEmail(NewApplication $app): bool
    {
        $mail = self::buildCustomerConfirmationEmail($app);
        if ($mail === null) {
            return false;
        }
        if (self::isReservedTestAddress($mail['to'])) {
            error_log("[new_application] Confirmation email for application {$app->id} not sent: {$mail['to']} is a reserved test domain.");
            return false;
        }

        require_once __DIR__ . '/Mailer.php';
        [$ok, $detail] = Mailer::send($mail['to'], $mail['subject'], $mail['body'], /* isHtml */ true);

        error_log(sprintf(
            '[new_application] Confirmation email %s for application %d to %s: company="%s" detail=%s',
            $ok ? 'sent' : 'FAILED', $app->id, $mail['to'], $mail['company'], $detail
        ));
        return $ok;
    }
}
