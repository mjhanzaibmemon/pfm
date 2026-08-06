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
require_once __DIR__ . '/../../lib/PhoneFormat.php';

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
    'org'     => 'Organization Information (Step 2)',
    'contact' => 'Main Contact (Step 3)',
];
foreach ($requiredSections as $key => $label) {
    if (empty($draft[$key])) {
        api_error("Incomplete renewal: {$label} is missing. Please go back and complete all steps.", 422, 'incomplete_draft');
    }
}

// At least one active buyer — evaluated against the EFFECTIVE roster
// (committed members overlaid with the pending buyer_ops queue) so a
// customer who just added their first buyer in this session doesn't
// get bounced before we've had a chance to persist that add.
$buyerCount = BuyerManager::countActive($session->clientId, $session);
if ($buyerCount < 1) {
    api_error('You must have at least one active buyer before submitting.', 422, 'no_buyers');
}

// Required documents — Larissa's 2026-07-27 clone rehearsal on session 5
// (client 738023) surfaced a race condition: user clicked Continue on
// Step 5 while the business_license upload's XHR was still in flight;
// nginx logged HTTP 499 (client aborted request), draft_data.documents
// never received the entry, but the wizard happily proceeded to Stripe
// and completed a paid renewal with the document missing. Real customer
// scenarios that could hit this on production: slow mobile connection,
// distracted user, tab restore mid-upload, or dev-tools bypass of the
// Step 5 disabled-Next button. The Step 5 UX now tracks in-flight
// uploads and keeps Continue disabled while activeUploads > 0, but
// that is a client-side hint — this block is the authoritative gate.
//
// Both docs are strictly annual with no legacy carry-over:
//   - main_contact_id  → Round 7 (2026-07-17, commit fecb8b8): fresh
//                        upload every cycle, on-file no longer counts.
//   - business_license → Round 5 Item 3 (2026-07-08, commit 16d188d):
//                        clients.doc_sec_of_state kept for reference
//                        only, does not satisfy the required check.
$submittedDocs = $draft['documents'] ?? [];
if (empty($submittedDocs['main_contact_id'])) {
    api_error(
        'Main Contact ID is missing from your submission. Please return to Step 3 and upload a fresh photo ID, then continue back through the wizard.',
        422,
        'missing_document'
    );
}
if (empty($submittedDocs['business_license'])) {
    api_error(
        'Business Registry document is missing from your submission. Please return to Step 5 and re-upload — your previous upload may not have finished before you clicked Continue.',
        422,
        'missing_document'
    );
}

// ───────────────────────────────────────────────────────────────────
// Step 2: Apply changes from draft_data to the clients table
//         (company name, contact info, address changes)
// ───────────────────────────────────────────────────────────────────

Db::transaction(function () use ($session, $draft, $customerNote): void {

    // 2a. Drain the pending buyer-op queue FIRST so downstream steps
    //     (contact mirror, purgeRemovedBuyers, Stripe pricing) see a
    //     consistent members table. This is the write half of the
    //     deferred-commit refactor: BuyerManager::add/remove/modify at
    //     Step 4 only stage into draft_data.buyer_ops; the actual
    //     INSERT/UPDATE/soft-delete lands here on Submit so a customer
    //     who bails mid-wizard leaves zero orphan rows behind in the
    //     legacy PFM admin's CURRENT BUYERS grid.
    BuyerManager::commitPendingOps($session);


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
            'bus_cat_id'       => 'bus_cat_id',
            'bus_subcat_id'    => 'bus_subcat_id',
            'mailing_address'  => 'mailing_address',
            'city'             => 'city',
            'state'            => 'state',
            'zip_code'         => 'zip_code',
            'website_url'      => 'website_url',
            'acct_instagram'   => 'acct_instagram',
            'acct_facebook'    => 'acct_facebook',
        ];

        // Get current values to detect changes
        $current = Db::one(
            'SELECT co_name, business_type, business_license,
                    bus_cat_id, bus_subcat_id,
                    mailing_address, city, state, zip_code,
                    website_url, acct_instagram, acct_facebook
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

    // Persist main contact changes if present.
    //
    // The customer-facing main contact actually lives in TWO places in
    // the existing PFM schema, and the legacy form_clients_staff form
    // expects them to stay in sync:
    //
    //   1. members row WHERE main_contact = b'1'
    //        (member_name / email / phone1) — this is the row the
    //        wizard treats as canonical and what BuyerManager / Step 4
    //        / the admin review panel all read from.
    //
    //   2. clients row legacy mirror columns
    //        (main_contact_name / main_contact_email / main_contact_phone)
    //        — these were written by the legacy "Add Member" admin form
    //        and the legacy edit form keeps reading from them on render.
    //
    // Until this commit, the wizard only updated (1). Larissa's
    // 2026-06-22 Round 3 QA hit the resulting bug: she renamed the main
    // contact in Step 3, members.member_name updated correctly, but
    // clients.main_contact_name kept the old name with its leading
    // space. When she next opened the legacy edit form, the form's
    // existing "create-if-missing" sync logic spotted the mismatch and
    // INSERTed a brand new members row with main_contact = b'1', using
    // the stale clients.main_contact_name value — leaving her with two
    // Primary rows in CURRENT BUYERS and the renamed contact never
    // visible on the legacy Main Contact tab.
    //
    // Fix: write to both surfaces in lock-step inside the same
    // transaction. members stays canonical for the wizard / admin
    // review surfaces; clients mirror columns stay current for the
    // legacy edit form.
    //
    // title only lives on clients.main_contact_title — the members
    // table has no title column — so it's persisted there only.
    if (!empty($draft['contact'])) {
        $contact = $draft['contact'];

        // ── name / email / phone → members row + clients mirror ─────
        $mainContact = Db::one(
            "SELECT member_id, member_name, email, phone1
               FROM members
              WHERE client_id = ? AND main_contact = b'1' LIMIT 1",
            [$session->clientId]
        );

        if ($mainContact !== null) {
            // (members col, clients mirror col, draft key)
            $contactFields = [
                ['member_name', 'main_contact_name',  'name'],
                ['email',       'main_contact_email', 'email'],
                ['phone1',      'main_contact_phone', 'phone'],
            ];

            $memberUpdates  = [];
            $memberParams   = [];
            $clientsUpdates = [];
            $clientsParams  = [];

            // Read the current clients mirror values so we can suppress
            // no-op UPDATEs and log the right "from" side for the
            // change-log entry.
            $clientsMirror = Db::one(
                'SELECT main_contact_name, main_contact_email, main_contact_phone
                   FROM clients WHERE client_id = ?',
                [$session->clientId]
            ) ?? [];

            foreach ($contactFields as [$memberCol, $clientsCol, $draftKey]) {
                if (!isset($contact[$draftKey])) {
                    continue;
                }
                $rawNewVal  = trim((string) $contact[$draftKey]);
                $oldMember  = trim((string) ($mainContact[$memberCol]    ?? ''));
                $oldClients = trim((string) ($clientsMirror[$clientsCol] ?? ''));

                // Phone columns canonicalise to raw digits before either
                // the diff check or the DB write. Two reasons:
                //   1. The legacy PFM admin form has its own phone input
                //      mask that chokes on parens / dashes and renders
                //      "((50) 3) - 555-" if it receives a pre-formatted
                //      value. Raw digits feed straight into that mask.
                //   2. Comparing raw-to-raw keeps the change log from
                //      noisily recording a "0313261879 -> (031) 326-1879"
                //      diff that's really just a format change with no
                //      underlying number change.
                $isPhone = ($memberCol === 'phone1');
                $newVal  = $isPhone
                    ? (string) (pfm_normalize_phone($rawNewVal) ?? '')
                    : $rawNewVal;
                $oldMember  = $isPhone ? (string) (pfm_normalize_phone($oldMember)  ?? '') : $oldMember;
                $oldClients = $isPhone ? (string) (pfm_normalize_phone($oldClients) ?? '') : $oldClients;
                $persisted  = $newVal !== '' ? $newVal : null;

                if ($newVal !== $oldMember) {
                    $memberUpdates[] = "{$memberCol} = ?";
                    $memberParams[]  = $persisted;
                    $session->logChange(
                        RenewalSession::CHANGE_CONTACT_CHANGED,
                        (int) $mainContact['member_id'],
                        $memberCol,
                        $oldMember ?: null,
                        $newVal    ?: null
                    );
                }

                // Even when members already had the right value, the
                // clients mirror may be stale — happens for any contact
                // whose Step 3 prefill came from the members row but
                // never round-tripped through clients. Sync it.
                if ($newVal !== $oldClients) {
                    $clientsUpdates[] = "{$clientsCol} = ?";
                    $clientsParams[]  = $persisted;
                }
            }

            if (!empty($memberUpdates)) {
                $memberParams[] = (int) $mainContact['member_id'];
                Db::exec(
                    'UPDATE members SET ' . implode(', ', $memberUpdates) . ' WHERE member_id = ?',
                    $memberParams
                );
            }

            if (!empty($clientsUpdates)) {
                $clientsParams[] = $session->clientId;
                Db::exec(
                    'UPDATE clients SET ' . implode(', ', $clientsUpdates) . ' WHERE client_id = ?',
                    $clientsParams
                );
            }
        } else {
            // ── Self-heal: no committed primary members row exists ──
            //
            // This client is in the "0 live primary" state — its canonical
            // primary contact lives only on clients.main_contact_* mirror
            // columns (or in the draft the customer just filled). Testing
            // scan on 2026-08-05 found 1,488 active real customers in this
            // shape (pre-existing legacy from years of ScriptCase admin
            // edits), plus 2 test files we intentionally zeroed during the
            // duplicate-primary cleanup.
            //
            // BuyerManager::getActive() already synthesises a virtual
            // primary at read time so the wizard renders and prices
            // correctly. Here on submit we complete the loop by INSERTing
            // a real members row so the client stops relying on the
            // fallback for its next renewal — a lazy migration that
            // heals the legacy data one submit at a time without touching
            // any customer we haven't confirmed can renew.
            //
            // Data source, in fallthrough order:
            //   1. Step 3 draft edits (customer's just-typed values)
            //   2. clients.main_contact_* mirror (legacy canonical)
            //   3. skip synthesis entirely if we have neither
            //
            // The 18 "both mirror fields empty" clients on prod hit case 3
            // if they also skip Step 3 — but the wizard's Step 3 form is
            // required, so any customer that gets this far has typed at
            // least the required name. Guard defensively anyway.
            $mirrorForInsert = Db::one(
                'SELECT main_contact_name, main_contact_email, main_contact_phone
                   FROM clients WHERE client_id = ?',
                [$session->clientId]
            ) ?? [];

            $finalName  = trim((string) ($contact['name']
                ?? $mirrorForInsert['main_contact_name']  ?? ''));
            $finalEmail = trim((string) ($contact['email']
                ?? $mirrorForInsert['main_contact_email'] ?? ''));
            $finalPhoneRaw = trim((string) ($contact['phone']
                ?? $mirrorForInsert['main_contact_phone'] ?? ''));
            $finalPhone = (string) (pfm_normalize_phone($finalPhoneRaw) ?? '');

            if ($finalName !== '' || $finalEmail !== '') {
                $newMainMemberId = Db::insert(
                    "INSERT INTO members
                        (client_id, member_name, email, phone1, main_contact, include)
                     VALUES (?, ?, ?, ?, b'1', b'1')",
                    [
                        $session->clientId,
                        $finalName,
                        $finalEmail !== '' ? $finalEmail : null,
                        $finalPhone !== '' ? $finalPhone : null,
                    ]
                );

                // Sync clients mirror in the same transaction so the
                // legacy admin's Main Contact tab agrees with what we
                // just wrote to members. Only fields that differ.
                $mirrorInsertUpdates = [];
                $mirrorInsertParams  = [];
                foreach ([
                    ['main_contact_name',  $finalName],
                    ['main_contact_email', $finalEmail],
                    ['main_contact_phone', $finalPhone],
                ] as [$col, $finalVal]) {
                    $oldMirror = trim((string) ($mirrorForInsert[$col] ?? ''));
                    if ($col === 'main_contact_phone') {
                        $oldMirror = (string) (pfm_normalize_phone($oldMirror) ?? '');
                    }
                    if ($finalVal !== $oldMirror) {
                        $mirrorInsertUpdates[] = "{$col} = ?";
                        $mirrorInsertParams[]  = $finalVal !== '' ? $finalVal : null;
                    }
                }
                if (!empty($mirrorInsertUpdates)) {
                    $mirrorInsertParams[] = $session->clientId;
                    Db::exec(
                        'UPDATE clients SET ' . implode(', ', $mirrorInsertUpdates)
                            . ' WHERE client_id = ?',
                        $mirrorInsertParams
                    );
                }

                // Log the self-heal as a contact change so the admin
                // review summary shows what happened.
                $session->logChange(
                    RenewalSession::CHANGE_CONTACT_CHANGED,
                    (int) $newMainMemberId,
                    'member_name',
                    null,
                    $finalName
                );
            }
        }

        // ── title → clients.main_contact_title ───────────────────────
        // Added 2026-06-17 per Larissa's request to capture the contact's
        // title (Owner / Administrator / etc.) during renewal.
        if (isset($contact['title'])) {
            $newTitle = trim((string) $contact['title']);
            $currentTitleRow = Db::one(
                'SELECT main_contact_title FROM clients WHERE client_id = ?',
                [$session->clientId]
            );
            $oldTitle = trim((string) ($currentTitleRow['main_contact_title'] ?? ''));
            if ($newTitle !== $oldTitle) {
                Db::exec(
                    'UPDATE clients SET main_contact_title = ? WHERE client_id = ?',
                    [$newTitle !== '' ? $newTitle : null, $session->clientId]
                );
                $session->logChange(
                    RenewalSession::CHANGE_CONTACT_CHANGED,
                    null,
                    'main_contact_title',
                    $oldTitle ?: null,
                    $newTitle ?: null
                );
            }
        }
    }

    // Hard-delete every buyer the customer marked as removed in this
    // wizard run so the legacy PFM admin CURRENT BUYERS grid stops
    // showing "phantom" rows the customer has already declared inactive.
    // Covers both same-session add+remove ghosts and pre-existing
    // buyers the customer removed; audit trail for the pre-existing
    // case stays in the B1-a renewal-history note (the REMOVED log
    // entry carries the buyer's name in old_value). See
    // BuyerManager::purgeRemovedBuyers() for the full rationale.
    BuyerManager::purgeRemovedBuyers($session->id);

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
