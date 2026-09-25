<?php
/**
 * POST /renewal_v2/public/apply/api/create-payment.php
 *
 * (Re)create a Stripe Checkout Session for a submitted application.
 * Sibling to public/api/create-payment.php, with two additions that the
 * renewal version lacks:
 *
 *   - Before creating a new session for an applicant who already has an
 *     awaiting_payment one, ask Stripe whether the old one was actually
 *     PAID (they may have paid and closed the tab). If so, repair the
 *     application and send them to the confirmation page instead of
 *     creating a second checkout that could charge them twice.
 *   - The abandoned old session is expired at Stripe so it can't be paid
 *     after the applicant has been handed a fresh one.
 *
 * Response: { success: true, data: { redirect_url } }
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationStripe.php';

api_require_method('POST');
api_require_csrf();

$application = api_require_application();

$allowed = [NewApplication::STATUS_SUBMITTED, NewApplication::STATUS_AWAITING_PAYMENT];
if (!in_array($application->status, $allowed, true)) {
    if ($application->status === NewApplication::STATUS_DRAFT) {
        api_error('Please complete and submit the application first.', 400, 'not_submitted');
    }
    if ($application->isPaid()) {
        api_error('This application has already been paid.', 409, 'already_paid');
    }
    api_error("Cannot create payment for an application in state '{$application->status}'.", 400, 'wrong_state');
}

$confirmationUrl = static function (NewApplication $app): string {
    $q = 'token=' . urlencode($app->token);
    if ($app->stripeSessionId !== null && $app->stripeSessionId !== '') {
        $q .= '&session_id=' . urlencode($app->stripeSessionId);
    }
    return '/renewal_v2/public/apply/steps/8-confirmation.php?' . $q;
};

try {
    if ($application->status === NewApplication::STATUS_AWAITING_PAYMENT) {
        if (ApplicationStripe::reconcile($application)) {
            $application = NewApplication::loadById($application->id) ?? $application;
            api_ok(['redirect_url' => $confirmationUrl($application), 'already_paid' => true]);
        }
        ApplicationStripe::expireSession((string) $application->stripeSessionId);
        $application->resetForPaymentRetry();
    }

    $email       = (string) ($application->draftData['contact']['email'] ?? '');
    $redirectUrl = ApplicationStripe::createCheckoutSession($application, $email);
} catch (RuntimeException $e) {
    api_error('Could not create payment session: ' . $e->getMessage(), 502, 'stripe_error');
}

api_ok(['redirect_url' => $redirectUrl]);
