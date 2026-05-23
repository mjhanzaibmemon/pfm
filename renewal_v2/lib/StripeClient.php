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
     * Handle a verified 'checkout.session.completed' event.
     *
     * Looks up the renewal session from event metadata, calls markPaid(),
     * and writes a record to client_pmts so staff see the payment in the
     * existing admin interface.
     *
     * Returns the updated RenewalSession on success.
     * Returns null if the event is not for this renewal flow (safe to ignore).
     *
     * Edge-case handling:
     *  - Idempotent: if session is already paid, returns without re-processing
     *    (Stripe may retry webhooks; we must accept the retry without erroring)
     *  - Resilient: accepts both 'submitted' AND 'awaiting_payment' prior states
     *    (handles the orphan-payment case where createCheckoutSession() got a
     *    response from Stripe but setStripeSession() failed to record it locally)
     *
     * @param  array $event  Verified Stripe event (from verifyWebhook)
     * @return RenewalSession|null
     * @throws RuntimeException on data integrity error
     */
    public static function handleCheckoutCompleted(array $event): ?RenewalSession
    {
        if (($event['type'] ?? '') !== 'checkout.session.completed') {
            return null; // not our event type
        }

        $stripeSession = $event['data']['object'] ?? [];
        $metadata      = $stripeSession['metadata'] ?? [];

        $renewalSessionId = isset($metadata['renewal_session_id'])
            ? (int) $metadata['renewal_session_id'] : 0;

        if ($renewalSessionId <= 0) {
            return null; // not a renewal payment — ignore
        }

        $session = RenewalSession::loadById($renewalSessionId);
        if ($session === null) {
            throw new RuntimeException(
                "Webhook: renewal session {$renewalSessionId} not found."
            );
        }

        // Idempotency: if already marked paid, do nothing (Stripe can retry webhooks).
        // BUT we still want to attempt the client_pmts insert in case the previous
        // attempt failed there — writeClientPayment() is itself idempotent.
        if ($session->isPaid()) {
            $existingPaymentId = $session->paymentId ?? (string) ($stripeSession['payment_intent'] ?? '');
            $amountFromStripe  = ((int) ($stripeSession['amount_total'] ?? 0)) / 100.0;
            if ($existingPaymentId !== '') {
                self::writeClientPayment(
                    $session,
                    $existingPaymentId,
                    $session->amountCharged ?? $amountFromStripe
                );
            }
            return $session;
        }

        // Accept both 'submitted' and 'awaiting_payment' — markPaid() enforces this too,
        // but checking here gives a clearer error message before we extract Stripe fields.
        $validStates = [
            RenewalSession::STATUS_SUBMITTED,
            RenewalSession::STATUS_AWAITING_PAYMENT,
        ];
        if (!in_array($session->status, $validStates, true)) {
            throw new RuntimeException(
                "Webhook: session {$renewalSessionId} is in state '{$session->status}', "
                . "expected submitted or awaiting_payment."
            );
        }

        // Extract payment details from Stripe
        $paymentIntentId = (string) ($stripeSession['payment_intent'] ?? '');
        $amountTotal     = (int) ($stripeSession['amount_total'] ?? 0); // cents
        $amountDollars   = $amountTotal / 100.0;

        if ($paymentIntentId === '') {
            throw new RuntimeException('Webhook: no payment_intent in checkout.session.completed event.');
        }

        // Mark paid → auto-transitions to awaiting_review (accepts either prior state)
        $session->markPaid($paymentIntentId, $amountDollars);

        // Write to client_pmts so staff see it in the existing admin interface
        self::writeClientPayment($session, $paymentIntentId, $amountDollars);

        return $session;
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
