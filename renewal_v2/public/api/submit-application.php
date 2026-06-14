<?php
/**
 * POST /api/submit-application.php
 *
 * Final submission endpoint — called when the customer clicks "Submit & Pay"
 * on the Review step (Step 6).
 *
 * Actions performed (in a DB transaction):
 *   1. Validate all required data is present in draft_data
 *   2. Apply any company/contact changes from draft_data to the clients table
 *   3. Transition session: draft → submitted
 *   4. Create a Stripe Checkout session → submitted → awaiting_payment
 *   5. Return the Stripe redirect URL
 *
 * Request (POST):
 *   customer_note  string  Optional note from the customer
 *
 * Response:
 *   { success: true, data: { redirect_url: "https://checkout.stripe.com/..." } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

// Customer's optional Step-5 note. Prefer the explicit POST value when the
// caller supplies one (lets a future client-side change push an edited note
// at submit time), but fall back to whatever Step 5's auto-save persisted
// into draft_data. Without the fallback, the Step 6 Submit button — which
// posts an empty body — would always overwrite the saved note with NULL.
// Bug surfaced during Larissa's Phase 6 QA on session 37: her typed note
// "This is my renewal test comment" was correctly in draft_data but the
// renewal_sessions.customer_note column ended up NULL after submit.
$customerNote = api_optional_post('customer_note');
if ($customerNote === null || $customerNote === '') {
    $customerNote = $session->draftData['customer_note'] ?? null;
}

// ───────────────────────────────────────────────────────────────────
// Step 1: Validate required draft_data fields
// ───────────────────────────────────────────────────────────────────

$draft = $session->draftData;

// Required sections
$requiredSections = [
    'org'     => 'Organisation Information (Step 2)',
    'contact' => 'Main Contact (Step 3)',
];
foreach ($requiredSections as $key => $label) {
    if (empty($draft[$key])) {
        api_error("Incomplete renewal: {$label} is missing. Please go back and complete all steps.", 422, 'incomplete_draft');
    }
}

// At least one active buyer
$buyerCount = BuyerManager::countActive($session->clientId);
if ($buyerCount < 1) {
    api_error('You must have at least one active buyer before submitting.', 422, 'no_buyers');
}

// ───────────────────────────────────────────────────────────────────
// Step 2: Apply changes from draft_data to the clients table
//         (company name, contact info, address changes)
// ───────────────────────────────────────────────────────────────────

Db::transaction(function () use ($session, $draft, $customerNote): void {

    // Persist org info changes if present.
    // Step 2 fields (as of Phase 6 fix, 2026-06-14):
    //   - co_name, business_type, business_license (last kept for back-compat
    //     even though the input field was removed — see 2-organization.php)
    //   - mailing_address, city, state, zip_code (re-added after Larissa's
    //     Phase 6 budget-reply on 2026-06-12 caught they were missing from
    //     Step 2; only Store Front + Home Base were meant to go per
    //     Decision 3, mailing was meant to stay)
    // We still UPDATE only the fields the form submitted (others left
    // untouched), so partial Step 2 saves never overwrite unrelated columns.
    if (!empty($draft['org'])) {
        $org     = $draft['org'];
        $updates = [];
        $params  = [];

        $orgFields = [
            'co_name'          => 'co_name',
            'business_type'    => 'business_type',
            'business_license' => 'business_license',
            'mailing_address'  => 'mailing_address',
            'city'             => 'city',
            'state'            => 'state',
            'zip_code'         => 'zip_code',
        ];

        // Get current values to detect changes
        $current = Db::one(
            'SELECT co_name, business_type, business_license,
                    mailing_address, city, state, zip_code
               FROM clients WHERE client_id = ?',
            [$session->clientId]
        );

        foreach ($orgFields as $draftKey => $dbCol) {
            if (!isset($org[$draftKey])) {
                continue;
            }
            $newVal = trim((string) $org[$draftKey]);
            $oldVal = trim((string) ($current[$dbCol] ?? ''));
            if ($newVal === $oldVal) {
                continue; // unchanged
            }
            $updates[] = "{$dbCol} = ?";
            $params[]  = $newVal !== '' ? $newVal : null;
            $session->logChange(
                RenewalSession::CHANGE_COMPANY_CHANGED,
                null,
                $dbCol,
                $oldVal ?: null,
                $newVal ?: null
            );
        }

        if (!empty($updates)) {
            $params[] = $session->clientId;
            Db::exec(
                'UPDATE clients SET ' . implode(', ', $updates) . ' WHERE client_id = ?',
                $params
            );
        }
    }

    // Persist main contact changes if present
    if (!empty($draft['contact'])) {
        $contact = $draft['contact'];

        // Main contact is stored in members table (main_contact = 1)
        $mainContact = Db::one(
            "SELECT member_id, member_name, email, phone1
               FROM members
              WHERE client_id = ? AND main_contact = b'1' LIMIT 1",
            [$session->clientId]
        );

        if ($mainContact !== null) {
            $contactFields = ['member_name' => 'name', 'email' => 'email', 'phone1' => 'phone'];
            $updates = [];
            $params  = [];

            foreach ($contactFields as $dbCol => $draftKey) {
                if (!isset($contact[$draftKey])) {
                    continue;
                }
                $newVal = trim((string) $contact[$draftKey]);
                $oldVal = trim((string) ($mainContact[$dbCol] ?? ''));
                if ($newVal === $oldVal) {
                    continue;
                }
                $updates[] = "{$dbCol} = ?";
                $params[]  = $newVal !== '' ? $newVal : null;
                $session->logChange(
                    RenewalSession::CHANGE_CONTACT_CHANGED,
                    (int) $mainContact['member_id'],
                    $dbCol,
                    $oldVal ?: null,
                    $newVal ?: null
                );
            }

            if (!empty($updates)) {
                $params[] = (int) $mainContact['member_id'];
                Db::exec(
                    'UPDATE members SET ' . implode(', ', $updates) . ' WHERE member_id = ?',
                    $params
                );
            }
        }
    }

    // Transition: draft → submitted
    $session->submit($customerNote);
});

// ───────────────────────────────────────────────────────────────────
// Step 3 (outside transaction): Create Stripe Checkout Session
// If Stripe fails, the renewal stays in 'submitted' — customer can retry
// ───────────────────────────────────────────────────────────────────

try {
    $customerEmail = $session->draftData['contact']['email'] ?? '';
    $redirectUrl   = StripeClient::createCheckoutSession($session, $buyerCount, $customerEmail);
} catch (RuntimeException $e) {
    // Stripe failed — still return success but tell the frontend to retry
    // The session is now 'submitted' and the customer can click Pay again
    api_error(
        'Submission saved, but payment setup failed: ' . $e->getMessage()
        . ' — Please click Pay to try again.',
        502,
        'stripe_error'
    );
}

api_ok(['redirect_url' => $redirectUrl]);
