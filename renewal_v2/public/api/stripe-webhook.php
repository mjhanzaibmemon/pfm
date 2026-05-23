<?php
/**
 * POST /api/stripe-webhook.php
 *
 * Stripe webhook endpoint — receives checkout.session.completed events.
 *
 * Security:
 *   - No PHP session, no cookie auth — this endpoint is called by Stripe's servers
 *   - Signature verified with HMAC-SHA256 (Stripe-Signature header)
 *   - Raw body read BEFORE any PHP processing (required for signature check)
 *   - Idempotent — calling twice for the same event is safe
 *
 * Setup in Stripe Dashboard:
 *   URL: https://pfm-app.com/renewal_v2/public/api/stripe-webhook.php
 *   Events: checkout.session.completed
 *   After creating, copy the signing secret to config.php (PFM_RNW_STRIPE_WEBHOOK_SECRET)
 *
 * Response: always 200 OK (Stripe retries on non-2xx)
 */

declare(strict_types=1);

// Must read raw body FIRST — before any output or session start
$rawBody = file_get_contents('php://input');

// Minimal bootstrap (no session, no output buffering yet)
define('RNW_ROOT', dirname(__DIR__, 2));
require_once RNW_ROOT . '/config/config.php';
require_once RNW_ROOT . '/lib/Db.php';
require_once RNW_ROOT . '/lib/RenewalSession.php';
require_once RNW_ROOT . '/lib/StripeClient.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$signatureHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
if ($signatureHeader === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Missing Stripe-Signature header']);
    exit;
}

// Verify signature
try {
    $event = StripeClient::verifyWebhook((string) $rawBody, $signatureHeader);
} catch (RuntimeException $e) {
    // 400 → Stripe will NOT retry (signature failure = bad request, not server error)
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

// Handle the event
try {
    $session = StripeClient::handleCheckoutCompleted($event);

    // Log to error_log for audit trail (staging: shows in Apache error log)
    if ($session !== null) {
        error_log(sprintf(
            '[renewal_v2 webhook] session=%d client=%d status=%s amount=%.2f payment=%s',
            $session->id,
            $session->clientId,
            $session->status,
            $session->amountCharged ?? 0,
            $session->paymentId ?? '-'
        ));
    }

    http_response_code(200);
    echo json_encode(['received' => true]);
} catch (RuntimeException $e) {
    // 500 → Stripe WILL retry (server error — something went wrong on our side)
    error_log('[renewal_v2 webhook] ERROR: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Internal error processing webhook']);
}
