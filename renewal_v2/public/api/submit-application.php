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

$customerNote = api_optional_post('customer_note');

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
    // Per v3 spec (Section 2): Step 2 only collects co_name, business_type,
    // and business_license. Optional address/phone fields were removed.
    // We still UPDATE only the fields the form submitted (others left untouched).
    if (!empty($draft['org'])) {
        $org     = $draft['org'];
        $updates = [];
        $params  = [];

        $orgFields = [
            'co_name'          => 'co_name',
            'business_type'    => 'business_type',
            'business_license' => 'business_license',
        ];

        // Get current values to detect changes
        $current = Db::one(
            'SELECT co_name, business_type, business_license
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
