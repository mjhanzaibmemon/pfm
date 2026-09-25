<?php
/**
 * POST /renewal_v2/public/apply/api/check-duplicate-name.php
 *
 * Section 3's duplicate customer-name check
 * (NEW_CUSTOMER_APPLICATION_SPEC.md at the project root). Called by
 * the Organization step (Step 2) as the applicant types/blurs the
 * company name field, BEFORE they can proceed past that step.
 *
 * Deliberately returns ONLY a boolean, never the matching company's
 * name or client_id — an applicant should not be able to fish for
 * whether a specific competitor/business name is already a PFM member
 * by probing this endpoint. The frontend shows Larissa's fixed block
 * message (Section 3's exact wording) on `is_duplicate: true`; it does
 * not need to know WHICH existing record matched.
 *
 * Request (POST):
 *   company_name  string, required
 *
 * Response (JSON):
 *   { success: true, data: { is_duplicate: true|false } }
 *
 * Uses NewApplication::findNameConflict(): clients.co_name_normalized
 * (migration 019) plus new_applications.co_name_normalized (migration
 * 022, other applications already submitted) — both indexed lookups, not
 * live string comparisons, so this stays fast as the data grows.
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

// Note: deliberately does NOT call api_require_draft() — the applicant
// hasn't necessarily saved anything to draft_data yet when this check
// fires (it can run on blur before the first autosave completes), and
// there is no reason to block the check itself once submitted/paid
// either (though the UI never calls it past Step 2 in practice).
$application = api_require_application();

$companyName = api_required_post('company_name');

// Existing customers AND other applications already submitted/paid —
// excluding this applicant's own application so retyping their own name
// after a reload never blocks them.
$conflict = NewApplication::findNameConflict($companyName, $application->id);

api_ok(['is_duplicate' => $conflict !== null]);
