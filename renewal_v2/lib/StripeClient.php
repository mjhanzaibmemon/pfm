<?php
/**
 * PFM Renewal v2 — StripeClient
 *
 * Lightweight wrapper around the Stripe API for the renewal flow.
 * Uses curl directly (no Composer / Stripe SDK dependency) to match the
 * existing PFM deployment pattern in stripe_integration/.
 *
 * Responsibilities:
 *  - Create a Stripe Checkout Session for a renewal payment
 *  - Verify a Stripe webhook signature (checkout.session.completed)
 *  - Look up a Checkout Session by ID
 *
 * Pricing calculation lives here (single source of truth).
 * Stripe amounts are always in cents (USD).
 *
 * Spec: Section 7 (Payment), Section 4 (Pricing formula), Section 11 (webhooks)
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/RenewalSession.php';

class StripeClient
{
    private const API_BASE = 'https://api.stripe.com/v1';

    // ===== PRICING =====

    /**
     * Load a client's membership level row from members_level.
     *
     * Uses clients.pricing_level_id → members_level.memb_lev_id.
     * The actual level IDs on this DB are: 13 (Regular), 14 (Trade), 16 (Non-Profit).
     * We do NOT hardcode these — we read live from the DB so price changes by Larissa
     * in members_level automatically take effect.
     *
     * @return array  Row from members_level:
     *                memb_lev_id, pricing_level, curr_price, num_of_buyers, price_after
     * @throws RuntimeException if client not found or level not found
     */
    public static function getClientLevel(int $clientId): array
    {
        $client = Db::one(
            'SELECT pricing_level_id FROM clients WHERE client_id = ? LIMIT 1',
            [$clientId]
        );
        if ($client === null) {
            throw new RuntimeException("Client {$clientId} not found in clients table.");
        }

        $levelId = (int) $client['pricing_level_id'];
        if ($levelId <= 0) {
            throw new RuntimeException(
                "Client {$clientId} has no pricing_level_id set."
            );
        }

        $level = Db::one(
            'SELECT memb_lev_id, pricing_level, curr_price, num_of_buyers, price_after
               FROM members_level
              WHERE memb_lev_id = ? LIMIT 1',
            [$levelId]
        );
        if ($level === null) {
            throw new RuntimeException(
                "members_level row not found for memb_lev_id={$levelId} (client {$clientId})."
            );
        }

        // Cast to proper types
        $level['memb_lev_id']    = (int) $level['memb_lev_id'];
        $level['curr_price']     = (float) $level['curr_price'];
        $level['num_of_buyers']  = (int) $level['num_of_buyers'];
        $level['price_after']    = $level['price_after'] !== null ? (float) $level['price_after'] : 0.0;

        return $level;
    }

    /**
     * Calculate the renewal amount in cents given a level row and buyer count.
     *
     * Formula (spec Section 4):
     *   total = curr_price + max(0, buyers - num_of_buyers) × price_after
     *
     * @param  array $level      Row from getClientLevel() or members_level
     * @param  int   $buyerCount Number of active buyers
     * @return int   Amount in cents (rounded to nearest cent)
     */
    public static function calculateAmountCents(array $level, int $buyerCount): int
    {
        if ($buyerCount < 0) {
            $buyerCount = 0;
        }
        $base      = (float) $level['curr_price'];
        $included  = (int)   $level['num_of_buyers'];
        $rateAfter = (float) $level['price_after'];
        $extra     = max(0, $buyerCount - $included);

        $totalDollars = $base + ($extra * $rateAfter);
        return (int) round($totalDollars * 100);
    }

    /**
     * Return a full pricing breakdown for display on the Payment step.
     *
     * @param  array $level      Row from getClientLevel()
     * @param  int   $buyerCount Number of active buyers
     * @return array [level_name, base_price, included_buyers, extra_per_buyer,
     *                buyer_count, extra_buyers, extra_charge, total_dollars, total_cents]
     */
    public static function pricingBreakdown(array $level, int $buyerCount): array
    {
        if ($buyerCount < 0) {
            $buyerCount = 0;
        }
        $base      = (float) $level['curr_price'];
        $included  = (int)   $level['num_of_buyers'];
        $rateAfter = (float) $level['price_after'];
        $extra     = max(0, $buyerCount - $included);

        $extraCharge  = $extra * $rateAfter;
        $totalDollars = $base + $extraCharge;

        return [
            'level_name'      => (string) $level['pricing_level'],
            'base_price'      => $base,
            'included_buyers' => $included,
            'extra_per_buyer' => $rateAfter,
            'buyer_count'     => $buyerCount,
            'extra_buyers'    => $extra,
            'extra_charge'    => $extraCharge,
            'total_dollars'   => $totalDollars,
            'total_cents'     => (int) round($totalDollars * 100),
        ];
    }

    /**
     * Convenience: load level + calculate amount in one call.
     *
     * @return array  Same as pricingBreakdown() — includes total_cents for Stripe
     * @throws RuntimeException if client or level not found
     */
    public static function pricingForClient(int $clientId, int $buyerCount): array
    {
        $level = self::getClientLevel($clientId);
        return self::pricingBreakdown($level, $buyerCount);
    }

    // ===== CHECKOUT SESSION =====

    /**
     * Create a Stripe Checkout Session for a renewal payment.
     *
     * Flow:
     *  1. Calculate amount from membership level + buyer count
     *  2. POST to Stripe /checkout/sessions
     *  3. Call session->setStripeSession() to record ID and advance state
     *  4. Return the Checkout URL for redirect
     *
     * @param  RenewalSession $session      Must be in 'submitted' state
     * @param  int            $buyerCount   Active buyer count for pricing
     * @param  string         $customerEmail Optional — pre-fills Stripe email field
     * @return string  Stripe Checkout URL (redirect the customer here)
     *
     * @throws RuntimeException on API error or wrong session state
     */
    public static function createCheckoutSession(
        RenewalSession $session,
        int $buyerCount,
        string $customerEmail = ''
    ): string {
        if ($session->status !== RenewalSession::STATUS_SUBMITTED) {
            throw new RuntimeException(
                "Cannot create Stripe session: renewal session {$session->id} "
                . "is in state '{$session->status}' (must be submitted)."
            );
        }

        $level        = self::getClientLevel($session->clientId);
        $breakdown    = self::pricingBreakdown($level, $buyerCount);
        $amountCents  = $breakdown['total_cents'];
        $description  = "PFM Annual Renewal — {$breakdown['level_name']} ({$buyerCount} buyer"
            . ($buyerCount !== 1 ? 's' : '') . ')';

        $params = [
            'mode'                                             => 'payment',
            'payment_method_types[]'                           => 'card',
            'line_items[0][price_data][currency]'              => 'usd',
            'line_items[0][price_data][product_data][name]'    => $description,
            'line_items[0][price_data][unit_amount]'           => (string) $amountCents,
            'line_items[0][quantity]'                          => '1',
            'success_url' => self::buildReturnUrl(
                PFM_RNW_STRIPE_SUCCESS_URL,
                ['session_id' => '{CHECKOUT_SESSION_ID}', 'token' => $session->token]
            ),
            'cancel_url'  => self::buildReturnUrl(
                PFM_RNW_STRIPE_CANCEL_URL,
                ['token' => $session->token]
            ),
            'metadata[renewal_session_id]'                     => (string) $session->id,
            'metadata[client_id]'                              => (string) $session->clientId,
            'payment_intent_data[metadata][renewal_session_id]'=> (string) $session->id,
        ];

        if ($customerEmail !== '') {
            $params['customer_email'] = $customerEmail;
        }

        $response = self::apiPost('/checkout/sessions', $params);

        if (!isset($response['id'], $response['url'])) {
            $errMsg = $response['error']['message'] ?? 'Unknown Stripe error';
            throw new RuntimeException("Stripe Checkout creation failed: {$errMsg}");
        }

        // Advance renewal session state: submitted → awaiting_payment
        $session->setStripeSession($response['id']);

        return $response['url'];
    }

    /**
     * Retrieve a Stripe Checkout Session by its ID.
     *
     * @return array  Stripe Checkout Session object (decoded JSON)
     * @throws RuntimeException on API error
     */
    public static function retrieveCheckoutSession(string $stripeSessionId): array
    {
        $response = self::apiGet('/checkout/sessions/' . urlencode($stripeSessionId));

        if (isset($response['error'])) {
            $errMsg = $response['error']['message'] ?? 'Unknown error';
            throw new RuntimeException("Stripe retrieve failed: {$errMsg}");
        }

        return $response;
    }

    /**
     * Retrieve a PaymentIntent from Stripe with the latest_charge object
     * expanded inline so we get the receipt_url and card details in one call.
     *
     * Used by syncStripePaymentInto() / fetchAndSaveStripePaymentDetails()
     * to populate the renewal_sessions.stripe_receipt_url / card_brand /
     * card_last4 columns (migration 004).
     *
     * Stripe docs:
     *   GET /v1/payment_intents/{id}?expand[]=latest_charge
     *   - latest_charge.receipt_url             → Stripe-hosted receipt PDF
     *   - latest_charge.payment_method_details.card.brand  → "visa", etc.
     *   - latest_charge.payment_method_details.card.last4  → "4242"
     *
     * @param  string $paymentIntentId  e.g. pi_3TfzJK...
     * @return array  Full PaymentIntent object (latest_charge inlined)
     * @throws RuntimeException on API error
     */
    public static function retrievePaymentIntentWithCharge(string $paymentIntentId): array
    {
        $endpoint = '/payment_intents/' . urlencode($paymentIntentId)
                  . '?expand[]=latest_charge';

        $response = self::apiGet($endpoint);

        if (isset($response['error'])) {
            $errMsg = $response['error']['message'] ?? 'Unknown error';
            throw new RuntimeException("Stripe PaymentIntent retrieve failed: {$errMsg}");
        }

        return $response;
    }

    /**
     * Fetch the receipt URL + card details for a paid renewal session and
     * persist them on the renewal_sessions row. Idempotent (re-saving same
     * values is harmless). Logs but does not throw on API/DB failure — this
     * is best-effort metadata and must not block payment processing.
     *
     * @param  RenewalSession $session
     * @param  string         $paymentIntentId
     */
    public static function fetchAndSaveStripePaymentDetails(
        RenewalSession $session,
        string $paymentIntentId
    ): void {
        if ($paymentIntentId === '') {
            return;
        }

        $pi     = self::retrievePaymentIntentWithCharge($paymentIntentId);
        $charge = $pi['latest_charge'] ?? null;

        // Stripe sometimes returns latest_charge as a string ID instead of
        // expanded object (e.g. if `expand` was silently dropped). Tolerate
        // both shapes — if it's a string, we just don't have details.
        if (!is_array($charge)) {
            error_log(sprintf(
                '[renewal_v2] fetchAndSaveStripePaymentDetails: latest_charge not '
                . 'expanded for session %d (pi=%s)',
                $session->id, $paymentIntentId
            ));
            return;
        }

        $receiptUrl = isset($charge['receipt_url']) ? (string) $charge['receipt_url'] : null;
        $cardBrand  = $charge['payment_method_details']['card']['brand'] ?? null;
        $cardLast4  = $charge['payment_method_details']['card']['last4'] ?? null;

        $session->saveStripePaymentDetails(
            $receiptUrl !== '' ? $receiptUrl : null,
            $cardBrand  !== null ? (string) $cardBrand : null,
            $cardLast4  !== null ? (string) $cardLast4 : null
        );

        error_log(sprintf(
            '[renewal_v2] Stripe payment details saved for session %d: '
            . 'brand=%s last4=%s receipt=%s',
            $session->id,
            $cardBrand ?? '(none)',
            $cardLast4 ?? '(none)',
            $receiptUrl ? 'YES' : 'NO'
        ));
    }

    // ===== WEBHOOK =====

    /**
     * Verify a Stripe webhook request and return the parsed Event.
     *
     * Must be called with the raw request body (before any json_decode).
     * Validates the Stripe-Signature header using HMAC-SHA256.
     *
     * @param  string $rawBody           Raw HTTP request body (file_get_contents('php://input'))
     * @param  string $signatureHeader   Value of $_SERVER['HTTP_STRIPE_SIGNATURE']
     * @return array  Stripe Event object
     *
     * @throws RuntimeException if signature is invalid or timestamp is stale (>300 s)
     */
    public static function verifyWebhook(string $rawBody, string $signatureHeader): array
    {
        $secret = PFM_RNW_STRIPE_WEBHOOK_SECRET;

        if ($secret === '') {
            throw new RuntimeException('Webhook secret is not configured.');
        }

        // Parse the Stripe-Signature header: t=timestamp,v1=sig,...
        $parts = [];
        foreach (explode(',', $signatureHeader) as $chunk) {
            [$k, $v] = explode('=', $chunk, 2) + ['', ''];
            $parts[$k] = $v;
        }

        if (empty($parts['t']) || empty($parts['v1'])) {
            throw new RuntimeException('Invalid Stripe-Signature header format.');
        }

        $timestamp = (int) $parts['t'];
        $received  = $parts['v1'];

        // Reject stale events (> 5 minutes old)
        if (abs(time() - $timestamp) > 300) {
            throw new RuntimeException('Webhook timestamp is stale (> 5 minutes). Possible replay attack.');
        }

        // Compute expected signature
        $signedPayload = $timestamp . '.' . $rawBody;
        $expected      = hash_hmac('sha256', $signedPayload, $secret);

        // Constant-time comparison to prevent timing attacks
        if (!hash_equals($expected, $received)) {
            throw new RuntimeException('Stripe webhook signature verification failed.');
        }

        $event = json_decode($rawBody, true);
        if (!is_array($event)) {
            throw new RuntimeException('Webhook body is not valid JSON.');
        }

        return $event;
    }

    /**
     * Primary success-path entry point: confirm a payment by polling the
     * Stripe API directly (called from Step 8 confirmation page).
     *
     * This is the existing PFM pattern (see legacy stripe_integration/
     * payment-success.php) — no webhook required. The webhook handler
     * below also exists and shares the same internal helper, so either
     * trigger produces identical results.
     *
     * Flow:
     *   1. Call Stripe API to retrieve the Checkout Session
     *   2. Verify payment_status === 'paid'
     *   3. Extract amount and payment_intent
     *   4. Delegate to syncStripePaymentInto() for the actual local state changes
     *
     * @param  string $stripeSessionId  e.g. cs_test_a1b2c3...
     * @return RenewalSession|null  The synced renewal session, or null if
     *                              the Stripe session is not paid yet (caller
     *                              should show "processing, refresh shortly")
     * @throws RuntimeException on Stripe API error or unrelated session
     */
    public static function confirmAndSync(string $stripeSessionId): ?RenewalSession
    {
        if ($stripeSessionId === '') {
            throw new RuntimeException('confirmAndSync: empty Stripe session id.');
        }

        $stripeSession = self::retrieveCheckoutSession($stripeSessionId);

        // Stripe Checkout Session has a `payment_status` field with values
        // 'paid', 'unpaid', 'no_payment_required'. We only proceed on 'paid'.
        $paymentStatus = (string) ($stripeSession['payment_status'] ?? '');
        if ($paymentStatus !== 'paid') {
            // Not yet — caller will display a "processing" UI and retry
            return null;
        }

        return self::syncStripePaymentInto($stripeSession);
    }

    /**
     * Webhook entry point — kept for the case when Larissa eventually wires
     * up a Stripe webhook in the dashboard. Shares the syncStripePaymentInto
     * helper with confirmAndSync, so identical state changes regardless of
     * trigger.
     *
     * Idempotent: if the session is already paid, returns immediately
     * (Stripe retries webhooks; we must accept that without erroring).
     *
     * @param  array $event  Verified Stripe event (from verifyWebhook)
     * @return RenewalSession|null  null if event is not for renewal_v2 or
     *                              if session not yet in a syncable state
     * @throws RuntimeException on data integrity error
     */
    public static function handleCheckoutCompleted(array $event): ?RenewalSession
    {
        if (($event['type'] ?? '') !== 'checkout.session.completed') {
            return null; // not our event type
        }
        $stripeSession = $event['data']['object'] ?? [];
        return self::syncStripePaymentInto($stripeSession);
    }

    /**
     * Internal helper — applies a paid Stripe Checkout Session object onto
     * our local renewal_sessions row. Used by both confirmAndSync (success
     * URL polling) and handleCheckoutCompleted (webhook).
     *
     * DOES:
     *   - mark our renewal session as paid (awaiting_review)
     *   - generate the admin_review_token if not already set
     *   - send the staff notification email (best-effort, never fatal)
     *
     * DOES NOT:
     *   - write to client_pmts. That deferral is intentional and is the
     *     Phase 4 "gate": payment becomes visible in the existing admin
     *     UI only after staff click "Confirm Receipt" on the admin review
     *     page. See public/admin/confirm-receipt.php for the writer.
     *
     * Idempotent: re-applying for an already-paid session is a no-op
     * (just returns the session) — the staff email is NOT re-sent.
     *
     * @param  array $stripeSession  Stripe Checkout Session object
     * @return RenewalSession|null   null if the session has no
     *                               renewal_session_id metadata (i.e. it's
     *                               not one of our payments — safe to ignore)
     * @throws RuntimeException on data integrity error
     */
    private static function syncStripePaymentInto(array $stripeSession): ?RenewalSession
    {
        $metadata         = $stripeSession['metadata'] ?? [];
        $renewalSessionId = isset($metadata['renewal_session_id'])
            ? (int) $metadata['renewal_session_id'] : 0;

        if ($renewalSessionId <= 0) {
            return null; // not a renewal_v2 payment
        }

        $session = RenewalSession::loadById($renewalSessionId);
        if ($session === null) {
            throw new RuntimeException(
                "syncStripePaymentInto: renewal session {$renewalSessionId} not found."
            );
        }

        // Idempotency — already paid means we've been here before, just return.
        // We do NOT re-send the staff email (would spam them with duplicates).
        if ($session->isPaid()) {
            return $session;
        }

        // Defensive: only transition from submitted or awaiting_payment
        $validStates = [
            RenewalSession::STATUS_SUBMITTED,
            RenewalSession::STATUS_AWAITING_PAYMENT,
        ];
        if (!in_array($session->status, $validStates, true)) {
            throw new RuntimeException(
                "syncStripePaymentInto: session {$renewalSessionId} in state '{$session->status}', "
                . 'expected submitted or awaiting_payment.'
            );
        }

        $paymentIntentId = (string) ($stripeSession['payment_intent'] ?? '');
        $amountTotal     = (int) ($stripeSession['amount_total'] ?? 0); // cents
        $amountDollars   = $amountTotal / 100.0;

        if ($paymentIntentId === '') {
            throw new RuntimeException(
                'syncStripePaymentInto: no payment_intent on Stripe session.'
            );
        }

        // 1. Mark our session paid (state → awaiting_review)
        $session->markPaid($paymentIntentId, $amountDollars);

        // 1b. Fetch Stripe receipt URL + card details (one extra API call,
        //     stored permanently so admin review page doesn't hit Stripe
        //     on every load). Non-fatal — payment processing never blocks
        //     on this best-effort metadata save.
        try {
            self::fetchAndSaveStripePaymentDetails($session, $paymentIntentId);
        } catch (Throwable $e) {
            error_log(sprintf(
                '[renewal_v2] Stripe payment detail fetch failed for session %d (%s): %s',
                $session->id, $paymentIntentId, $e->getMessage()
            ));
        }

        // 2. Generate admin review token (used in the staff email link)
        $session->ensureAdminReviewToken();

        // 3. Notify staff via email — feature-flag gated.
        //    Larissa requested in Phase 6 round-1 feedback (2026-06-11):
        //      "do not add staff notification emails unless there is a
        //       specific reason they are needed for the new process."
        //    PFM staff discover pending renewals through the Requests area
        //    of the existing admin instead. Set PFM_RNW_SEND_STAFF_EMAIL = true
        //    in config.php to re-enable.
        //    Non-fatal — logs but does not throw if mail() fails, so
        //    payment processing isn't blocked by mail issues.
        if (defined('PFM_RNW_SEND_STAFF_EMAIL') && PFM_RNW_SEND_STAFF_EMAIL) {
            try {
                self::sendStaffReviewEmail($session);
            } catch (Throwable $e) {
                error_log(sprintf(
                    '[renewal_v2] Staff email send failed for session %d: %s',
                    $session->id, $e->getMessage()
                ));
            }
        } else {
            error_log(sprintf(
                '[renewal_v2] Staff email skipped for session %d '
                . '(PFM_RNW_SEND_STAFF_EMAIL is off — Larissa\'s Phase 6 instruction).',
                $session->id
            ));
        }

        // 4. Send the existing PFM "Thank You for Your Buyer's Pass Application"
        //    confirmation email to the customer. Per v3 spec section 8 / Step 8:
        //    use the template stored in members_status WHERE memb_status_id=1
        //    (status "Awaiting Review"). Non-fatal — payment confirmation never
        //    blocks on email delivery.
        try {
            self::sendCustomerConfirmationEmail($session);
        } catch (Throwable $e) {
            error_log(sprintf(
                '[renewal_v2] Customer confirmation email send failed for session %d: %s',
                $session->id, $e->getMessage()
            ));
        }

        return $session;
    }

    // ===== STAFF NOTIFICATION EMAIL (Phase 4) =====

    /**
     * Send the "payment received, review required" notification email to
     * PFM staff inboxes. Includes a deep link to the admin review page
     * (which carries the admin_review_token in the URL for authentication).
     *
     * Recipients: PFM_RNW_STAFF_NOTIFY_EMAILS (config — comma-separated).
     * From:       PFM_RNW_NOTIFY_FROM        (config).
     * Subject:    Prefixed with [STAGING TEST] on staging only.
     *
     * Delivery goes through PHPMailer + MailerSend SMTP (port 587/TLS) — the
     * same relay the existing PFM admin uses. NOT through mail()/postfix,
     * because AWS blocks outbound port 25 from EC2.
     *
     * @param  RenewalSession $session  Must be paid and have admin_review_token set
     * @return bool  true if SMTP relay accepted the message, false otherwise
     */
    public static function sendStaffReviewEmail(RenewalSession $session): bool
    {
        if ($session->adminReviewToken === null || $session->adminReviewToken === '') {
            // Defensive — caller is supposed to have set this before invoking us
            throw new RuntimeException(
                "sendStaffReviewEmail: session {$session->id} has no admin_review_token."
            );
        }

        // Look up the customer's company name for a more useful subject line.
        $client = Db::one(
            'SELECT co_name FROM clients WHERE client_id = ?',
            [$session->clientId]
        );
        $companyName = $client['co_name'] ?? 'Unknown Customer';

        $reviewUrl = PFM_RNW_BASE_URL
            . '/admin/review.php?token='
            . rawurlencode($session->adminReviewToken);

        $amount = $session->amountCharged !== null
            ? '$' . number_format($session->amountCharged, 2)
            : '(amount unknown)';

        $subject = PFM_RNW_NOTIFY_SUBJECT_PREFIX
            . 'PFM Renewal — ' . $companyName . ' paid '
            . $amount . ' · Review required before approval';

        // Plain-text body (Gmail renders it cleanly; no HTML markup needed
        // for a notification this short).
        $body = "Hello PFM Team,\n\n"
              . "A customer renewal payment has been received and is awaiting your review:\n\n"
              . "  Customer:      {$companyName}\n"
              . "  Amount paid:   {$amount}\n"
              . "  Renewal id:    #{$session->id}\n"
              . "  Paid at:       " . ($session->paidAt ?? '(just now)') . "\n\n"
              . "Please open the review page below to see the full Changes Summary\n"
              . "(buyers added/removed/modified, company changes, uploaded documents)\n"
              . "and Stripe payment details. After you click \"Confirm Receipt\" on that\n"
              . "page, the payment will appear in the existing admin form for approval.\n\n"
              . "Review URL:\n"
              . "  {$reviewUrl}\n\n"
              . "If you can't click the link, copy and paste it into your browser.\n\n"
              . "—\n"
              . "This is an automated notification from the PFM renewal system.\n";

        // Recipients: comma-separated → trimmed list
        $toList = array_filter(array_map('trim', explode(',', PFM_RNW_STAFF_NOTIFY_EMAILS)));
        if (empty($toList)) {
            error_log('[renewal_v2] No PFM_RNW_STAFF_NOTIFY_EMAILS configured — skipping staff email.');
            return false;
        }

        // Send via MailerSend SMTP relay (port 587/TLS) — same path the
        // existing PFM admin uses. We deliberately avoid PHP mail() because
        // AWS blocks outbound port 25 from EC2, so postfix can never deliver
        // to Gmail/Outlook from staging or production.
        require_once __DIR__ . '/Mailer.php';
        [$ok, $detail] = Mailer::send($toList, $subject, $body, /* isHtml */ false);

        error_log(sprintf(
            '[renewal_v2] Staff email %s for session %d to [%s]: subject="%s" detail=%s',
            $ok ? 'sent' : 'FAILED',
            $session->id,
            implode(', ', $toList),
            $subject,
            $detail
        ));

        return $ok;
    }

    // ===== CUSTOMER CONFIRMATION EMAIL (v3 spec Step 8) =====

    /**
     * Send the customer the existing PFM "Thank You for Your Buyer's Pass
     * Application" confirmation email after their payment succeeds.
     *
     * Per v3 spec section 8 (Step 8 — Confirmation):
     *   "Source: existing email already in the system — stored in the
     *    members_status table under status_id = 1 (Awaiting Review).
     *    Trigger: Sent automatically when the application moves to
     *    awaiting_review (immediately after Stripe webhook confirms payment).
     *    Personalization: ~COMPANY NAME~ placeholder is replaced with the
     *    customer's company name as it already works today."
     *
     * Recipient: clients.main_contact_email (fallback to clients.email).
     * From:      PFM_RNW_NOTIFY_FROM (must be MailerSend-verified domain).
     * Subject:   members_status.msg_subject (with [STAGING TEST] prefix on
     *            staging only).
     * Body:      members_status.msg_body (HTML), with ~COMPANY NAME~ replaced.
     *
     * Reading the template from the DB (not hardcoding) means Larissa can
     * edit the email content via the existing admin's Email Notices grid
     * and the change flows through automatically — no code redeploy needed.
     *
     * @param  RenewalSession $session  Must be paid
     * @return bool  true if SMTP relay accepted the message, false otherwise
     */
    public static function sendCustomerConfirmationEmail(RenewalSession $session): bool
    {
        // ── 1. Fetch the email template from members_status ───────────────
        // memb_status_id = 1 corresponds to "Awaiting Review" per v3 spec.
        $template = Db::one(
            'SELECT msg_subject, msg_body
               FROM members_status
              WHERE memb_status_id = 1',
            []
        );
        if (!$template || empty($template['msg_subject']) || empty($template['msg_body'])) {
            error_log(sprintf(
                '[renewal_v2] Customer confirmation email skipped for session %d: '
                . 'members_status row for status_id=1 is missing or empty.',
                $session->id
            ));
            return false;
        }

        // ── 2. Look up the customer's company name + email address ────────
        // We prefer main_contact_email (the person managing the renewal); fall
        // back to clients.email if it's empty. Spec doesn't specify which to
        // use, but main_contact_email is the standard PFM convention.
        $client = Db::one(
            'SELECT co_name, main_contact_email, email AS company_email
               FROM clients
              WHERE client_id = ?',
            [$session->clientId]
        );
        if (!$client) {
            error_log(sprintf(
                '[renewal_v2] Customer confirmation email skipped for session %d: '
                . 'client_id %d not found in clients table.',
                $session->id, $session->clientId
            ));
            return false;
        }

        $toEmail = trim((string) ($client['main_contact_email'] ?? ''));
        if ($toEmail === '') {
            $toEmail = trim((string) ($client['company_email'] ?? ''));
        }
        if ($toEmail === '') {
            error_log(sprintf(
                '[renewal_v2] Customer confirmation email skipped for session %d: '
                . 'no main_contact_email or email on client %d.',
                $session->id, $session->clientId
            ));
            return false;
        }

        $companyName = trim((string) ($client['co_name'] ?? ''));
        if ($companyName === '') {
            $companyName = 'Customer'; // graceful fallback for placeholder
        }

        // ── 3. Replace ~COMPANY NAME~ placeholder ─────────────────────────
        // Existing PFM convention — see members_status.msg_body for "Dear
        // ~COMPANY NAME~,". Both subject and body get the substitution in
        // case staff later adds the placeholder to the subject too.
        $subject = str_replace('~COMPANY NAME~', $companyName, (string) $template['msg_subject']);
        $body    = str_replace('~COMPANY NAME~', $companyName, (string) $template['msg_body']);

        // Prefix subject with [STAGING TEST] on staging only (matches the
        // staff notification email behaviour for consistency).
        if (defined('PFM_RNW_NOTIFY_SUBJECT_PREFIX') && PFM_RNW_NOTIFY_SUBJECT_PREFIX !== '') {
            $subject = PFM_RNW_NOTIFY_SUBJECT_PREFIX . $subject;
        }

        // ── 4. Send via MailerSend SMTP (HTML body — template uses <p> tags) ──
        require_once __DIR__ . '/Mailer.php';
        [$ok, $detail] = Mailer::send($toEmail, $subject, $body, /* isHtml */ true);

        error_log(sprintf(
            '[renewal_v2] Customer confirmation email %s for session %d to %s: '
            . 'company="%s" detail=%s',
            $ok ? 'sent' : 'FAILED',
            $session->id,
            $toEmail,
            $companyName,
            $detail
        ));

        return $ok;
    }

    // ===== CUSTOMER RENEWAL-CONFIRMED EMAIL (Round 7 — Bucket B template alignment) =====

    /**
     * Send the customer a "your renewal is approved" email AFTER staff
     * click "Confirm Receipt" in admin/review.php. Closes the loop on
     * the renewal flow:
     *
     *   1. Customer pays               → "Application received" email (sendCustomerConfirmationEmail)
     *   2. Staff reviews + confirms    → "Renewal approved / active" email (THIS method)
     *
     * Per Larissa's 2026-07-11 Bucket B video + written instruction, this
     * email must use the existing PFM template stored in the
     * `notifications` table row where notif_id = 2, subject
     * "Congratulations! Your Buyer's Pass Application Has Been Approved".
     * The template body already references the Buyer's Pass Desk pickup
     * location (3624 N. Leverman St., Portland, OR 97217), matches the
     * Round 6 confirmation-page wording, and is editable by staff via
     * ScriptCase admin's "Security → Email Notifications" form (item_24)
     * — so wording changes never require a code redeploy.
     *
     * Recipient: clients.main_contact_email (fallback to clients.email).
     * From:      PFM_RNW_NOTIFY_FROM (must be MailerSend-verified domain).
     * Subject:   notifications.msg_subject (with [STAGING TEST] prefix on
     *            staging only).
     * Body:      notifications.msg_body (HTML), with ~COMPANY NAME~ replaced.
     *
     * Reading the template from the DB (not hardcoding) means Larissa can
     * edit the email content via the existing admin's Email Notifications
     * grid and the change flows through automatically — no code redeploy
     * needed. Prior to Round 7 this method built a hardcoded HTML body
     * with reference / amount / dates; that mismatched Larissa's ask
     * ("please use the existing templates already in the system") and
     * carried the incorrect "membership card & shipping" line that
     * Round 6 removed from the wizard confirmation page.
     *
     * Non-fatal: caller wraps in try/catch so payment confirmation in
     * confirm-receipt.php is never blocked by an email-send failure.
     *
     * @param  RenewalSession $session  Must have admin_confirmed_at set
     * @return bool  true if SMTP relay accepted the message, false otherwise
     */
    public static function sendCustomerRenewalConfirmedEmail(RenewalSession $session): bool
    {
        // ── 1. Fetch the email template from notifications ────────────────
        // notif_id = 2 = "approved_membership" per Larissa's Bucket B spec.
        // Migration 010 grants SELECT on `notifications` to pfm_renewal.
        $template = Db::one(
            'SELECT msg_subject, msg_body
               FROM notifications
              WHERE notif_id = 2',
            []
        );
        if (!$template || empty($template['msg_subject']) || empty($template['msg_body'])) {
            error_log(sprintf(
                '[renewal_v2] Customer renewal-confirmed email skipped for session %d: '
                . 'notifications row for notif_id=2 is missing or empty.',
                $session->id
            ));
            return false;
        }

        // ── 2. Look up the customer's company name + email address ────────
        // Prefer main_contact_email (person managing the renewal); fall
        // back to clients.email if it's empty. Matches sendCustomerConfirmationEmail.
        $client = Db::one(
            'SELECT co_name, main_contact_email, email AS company_email
               FROM clients
              WHERE client_id = ?',
            [$session->clientId]
        );
        if (!$client) {
            error_log(sprintf(
                '[renewal_v2] Customer renewal-confirmed email skipped for session %d: '
                . 'client_id %d not found in clients table.',
                $session->id, $session->clientId
            ));
            return false;
        }

        $toEmail = trim((string) ($client['main_contact_email'] ?? ''));
        if ($toEmail === '') {
            $toEmail = trim((string) ($client['company_email'] ?? ''));
        }
        if ($toEmail === '') {
            error_log(sprintf(
                '[renewal_v2] Customer renewal-confirmed email skipped for session %d: '
                . 'no main_contact_email or email on client %d.',
                $session->id, $session->clientId
            ));
            return false;
        }

        $companyName = trim((string) ($client['co_name'] ?? '')) ?: 'Customer';

        // ── 3. Replace ~COMPANY NAME~ placeholder ─────────────────────────
        // Existing PFM convention — see notifications.msg_body for "Dear
        // ~COMPANY NAME~,". Both subject and body get the substitution in
        // case staff later adds the placeholder to the subject too. No
        // ~LINK~ substitution here — the approval email has no action
        // link (the pass is picked up at the Buyer's Pass Desk).
        $subject = str_replace('~COMPANY NAME~', $companyName, (string) $template['msg_subject']);
        $body    = str_replace('~COMPANY NAME~', $companyName, (string) $template['msg_body']);

        // Prefix subject with [STAGING TEST] on staging only (matches the
        // sibling sendCustomerConfirmationEmail behaviour for consistency).
        if (defined('PFM_RNW_NOTIFY_SUBJECT_PREFIX') && PFM_RNW_NOTIFY_SUBJECT_PREFIX !== '') {
            $subject = PFM_RNW_NOTIFY_SUBJECT_PREFIX . $subject;
        }

        // ── 4. Send via MailerSend SMTP (HTML body — template uses <p> tags) ──
        require_once __DIR__ . '/Mailer.php';
        [$ok, $detail] = Mailer::send($toEmail, $subject, $body, /* isHtml */ true);

        error_log(sprintf(
            '[renewal_v2] Customer renewal-confirmed email %s for session %d to %s: '
            . 'company="%s" reference=%s detail=%s',
            $ok ? 'sent' : 'FAILED',
            $session->id,
            $toEmail,
            $companyName,
            $session->getReferenceNumber(),
            $detail
        ));

        return $ok;
    }

    /**
     * Build a return URL by appending query parameters, handling whether the
     * base URL already has a '?' query string or not.
     *
     * Values that look like Stripe template placeholders (e.g. {CHECKOUT_SESSION_ID})
     * are passed through verbatim — Stripe substitutes them server-side after
     * Checkout completes, so we must NOT urlencode them.
     */
    private static function buildReturnUrl(string $baseUrl, array $params): string
    {
        $separator = strpos($baseUrl, '?') === false ? '?' : '&';
        $parts     = [];
        foreach ($params as $key => $value) {
            $value = (string) $value;
            // Stripe template placeholders like {CHECKOUT_SESSION_ID} must NOT be encoded
            if (preg_match('/^\{[A-Z_]+\}$/', $value)) {
                $encoded = $value;
            } else {
                $encoded = rawurlencode($value);
            }
            $parts[] = rawurlencode((string) $key) . '=' . $encoded;
        }
        return $baseUrl . $separator . implode('&', $parts);
    }

    /**
     * Write a record to client_pmts (existing table) so the payment shows up
     * in the current admin interface without any admin-side code changes.
     *
     * The existing stripe_integration code also reads from stripe.transactions;
     * we don't duplicate that — the stripe-display.php admin widget will read
     * directly from Stripe API anyway. This is just for the legacy pmt column.
     */
    private static function writeClientPayment(
        RenewalSession $session,
        string $paymentIntentId,
        float $amountDollars
    ): void {
        // Check if record already exists (idempotency — webhook may be called twice)
        // `reference` column stores the Stripe payment_intent ID
        $existing = Db::one(
            'SELECT client_pmt_id FROM client_pmts WHERE reference = ? LIMIT 1',
            [$paymentIntentId]
        );
        if ($existing !== null) {
            return; // already recorded
        }

        // Map to existing client_pmts columns (table is NOT modified — additive insert only)
        // pmt_mode: 'Stripe Renewal' identifies these as coming from the new renewal flow
        // reference: Stripe payment_intent ID for reconciliation
        // remarks: session ID for staff cross-reference
        Db::insert(
            'INSERT INTO client_pmts (client_id, pmt_mode, reference, pmt_date, amt_received, remarks)
             VALUES (?, ?, ?, NOW(), ?, ?)',
            [
                $session->clientId,
                'Stripe Renewal',
                $paymentIntentId,
                $amountDollars,
                'Renewal session #' . $session->id,
            ]
        );
    }

    // ===== HTTP HELPERS =====

    /**
     * POST to Stripe API with form-encoded params.
     *
     * @param  string $endpoint  e.g. '/checkout/sessions'
     * @param  array  $params    Key-value pairs (will be http_build_query encoded)
     * @return array  Decoded JSON response
     */
    private static function apiPost(string $endpoint, array $params): array
    {
        return self::apiRequest('POST', $endpoint, $params);
    }

    /**
     * GET from Stripe API.
     */
    private static function apiGet(string $endpoint): array
    {
        return self::apiRequest('GET', $endpoint, []);
    }

    /**
     * Execute a Stripe API request via curl.
     *
     * @throws RuntimeException on curl error or non-2xx response (for fatal errors)
     */
    private static function apiRequest(string $method, string $endpoint, array $params): array
    {
        $url = self::API_BASE . $endpoint;
        $ch  = curl_init();

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD        => PFM_RNW_STRIPE_API_KEY . ':',
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER     => [
                'Stripe-Version: 2024-06-20',
                'Accept: application/json',
            ],
        ];

        if ($method === 'POST') {
            $options[CURLOPT_URL]        = $url;
            $options[CURLOPT_POST]       = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($params);
        } else {
            $options[CURLOPT_URL]        = $url;
            $options[CURLOPT_HTTPGET]    = true;
        }

        curl_setopt_array($ch, $options);

        $body  = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($errno !== 0) {
            throw new RuntimeException("Stripe API curl error ({$errno}): {$error}");
        }

        $decoded = json_decode((string) $body, true);
        if (!is_array($decoded)) {
            throw new RuntimeException("Stripe API returned non-JSON response (HTTP {$code}).");
        }

        return $decoded;
    }
}
