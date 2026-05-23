<?php
/**
 * POST /api/create-payment.php
 *
 * (Re)create a Stripe Checkout Session for a submitted renewal.
 * Used if:
 *   - The customer's first checkout session expired (Stripe sessions expire in 24h)
 *   - The customer closed the Stripe tab without paying
 *
 * Session must be in 'submitted' state (not draft — submit first via submit-application.php).
 * Also handles 'awaiting_payment' state by creating a fresh Stripe session.
 *
 * Request (POST): no additional fields required
 *
 * Response:
 *   { success: true, data: { redirect_url: "https://checkout.stripe.com/..." } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();

// Must be submitted or awaiting_payment
$allowedStates = [
    RenewalSession::STATUS_SUBMITTED,
    RenewalSession::STATUS_AWAITING_PAYMENT,
];
if (!in_array($session->status, $allowedStates, true)) {
    if ($session->status === RenewalSession::STATUS_DRAFT) {
        api_error('Please complete and submit the renewal form first.', 400, 'not_submitted');
    }
    if ($session->isPaid()) {
        api_error('This renewal has already been paid.', 409, 'already_paid');
    }
    api_error("Cannot create payment for session in state '{$session->status}'.", 400, 'wrong_state');
}

// If awaiting_payment, reset back to submitted so setStripeSession() can proceed.
// Uses the model's resetForPaymentRetry() method instead of raw SQL — keeps
// state-machine transitions encapsulated in RenewalSession.
if ($session->status === RenewalSession::STATUS_AWAITING_PAYMENT) {
    $session->resetForPaymentRetry();
}

$buyerCount    = BuyerManager::countActive($session->clientId);
$customerEmail = $session->draftData['contact']['email'] ?? '';

try {
    $redirectUrl = StripeClient::createCheckoutSession($session, $buyerCount, $customerEmail);
} catch (RuntimeException $e) {
    api_error('Could not create payment session: ' . $e->getMessage(), 502, 'stripe_error');
}

api_ok(['redirect_url' => $redirectUrl]);
