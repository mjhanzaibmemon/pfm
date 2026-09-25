<?php
/**
 * POST /renewal_v2/public/apply/api/submit-application.php
 *
 * Sibling to public/api/submit-application.php, but far smaller by
 * design: the renewal endpoint spends nearly all its length applying
 * edits to existing `clients` / `members` rows. A new application has
 * no such rows — nothing is written to the customer tables until staff
 * approve the paid application (Section 13.8) — so submit here means:
 *
 *   1. Run the authoritative validation (NewApplication::validateForSubmit —
 *      required fields, both documents, duplicate-name re-check, etc.)
 *   2. Transition draft → submitted
 *   3. Hand the applicant to Step 7, which creates the Stripe Checkout
 *      session (retryable there if Stripe is down)
 *
 * Request (POST): no fields required.
 * Response: { success: true, data: { redirect_url: "/renewal_v2/public/apply/steps/7-payment.php?token=..." } }
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$application = api_require_application();
api_require_draft($application);

$problems = $application->validateForSubmit();
if (!empty($problems)) {
    $first   = $problems[0];
    $message = $first['code'] === 'duplicate_name'
        ? $first['message']
        : $first['message'] . ' (Step ' . $first['step'] . ')';
    if (count($problems) > 1) {
        $message .= ' — plus ' . (count($problems) - 1) . ' other item'
            . (count($problems) - 1 === 1 ? '' : 's') . ' to fix.';
    }
    api_error($message, 422, 'incomplete_application');
}

$customerNote = $application->draftData['customer_note'] ?? null;
if (is_string($customerNote)) {
    $customerNote = mb_substr(trim($customerNote), 0, 500);
    if ($customerNote === '') {
        $customerNote = null;
    }
} else {
    $customerNote = null;
}

$application->submit($customerNote);

api_ok([
    'redirect_url' => '/renewal_v2/public/apply/steps/7-payment.php?token='
        . urlencode($application->token),
]);
