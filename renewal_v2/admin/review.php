<?php
/**
 * Phase 4 — Admin review page.
 *
 * URL: /renewal_v2/admin/review.php?token=<admin_review_token>
 *
 * Reached by staff from the [STAGING TEST] email sent at end of customer
 * checkout (StripeClient::sendStaffReviewEmail). Shows:
 *
 *   1. Customer + company information (read from clients/members tables)
 *   2. Stripe payment details (from renewal_sessions — synced at payment time)
 *   3. Changes Summary panel — what the customer added/removed/modified
 *      during this renewal (read from renewal_changes table)
 *   4. A big "Confirm Receipt" button that POSTs to confirm-receipt.php
 *
 * Per spec: this page is READ-ONLY display + the confirm button. The actual
 * payment-to-client_pmts write happens in confirm-receipt.php (the "gate").
 *
 * Spec ref: larissa_rebuild.md → "Phase 4 — Stripe display + Changes
 *   Summary panel on back-end review."
 *   _v3_doc.xml → section 8 "Changes Summary Panel"
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/../lib/PhoneFormat.php';
require_once __DIR__ . '/../lib/DocumentUpload.php';
require_once __DIR__ . '/../lib/BuyerManager.php';
require_once __DIR__ . '/_includes/admin_layout.php';

// PHP session is needed for CSRF token used by the confirm form below.
// pfm_admin_session_start() pins save_path / cookie params to match
// ScriptCase so we share the legacy PFM admin session cleanly. Once the
// CSRF token is ensured, release the session lock immediately —
// admin/review.php has slow downstream calls (Stripe receipt fetch,
// document listing) and a held lock would block a second admin tab.
pfm_admin_session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$pfmCsrfToken = $_SESSION['csrf_token'];
session_write_close();

// ── 1. Validate admin_review_token from URL ─────────────────────────────
$token = isset($_GET['token']) ? trim((string) $_GET['token']) : '';
if ($token === '') {
    pfm_admin_header('Review — Missing token');
    ?>
    <div class="pfm-alert pfm-alert--danger">
        <strong>No review token provided.</strong>
        <p class="pfm-mt-0">This page must be opened from the link in the staff
        notification email. If you arrived here from the dashboard, please
        click an item to open its review.</p>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

$session = RenewalSession::loadByAdminToken($token);
if ($session === null) {
    pfm_admin_header('Review — Invalid token');
    ?>
    <div class="pfm-alert pfm-alert--danger">
        <strong>This review link is not valid.</strong>
        <p class="pfm-mt-0">The token in this URL doesn't match any renewal
        session. It may have been mistyped, or the renewal was cancelled.
        Try opening the
        <a href="/renewal_v2/admin/dashboard.php">pending reviews dashboard</a>
        to find the renewal you're looking for.</p>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

// ── 2. Look up customer + company context ───────────────────────────────
// pricing_level_id + bus_cat_id + bus_subcat_id + website_url + Instagram
// + Facebook columns added 2026-06-26 — Larissa's Round 4 retest noted
// the admin review's "Company" subsection only carried the Address row
// (after we'd dropped the legacy free-text business_type / license /
// federal_tax_id rows in 8b9d801) and read as half-empty. The actual
// page-title carries co_name, but staff scanning the body don't always
// notice that — surfacing Membership level / Business category / Online
// presence in the Company block makes the section earn its space again.
$client = Db::one(
    'SELECT client_id, co_name, MembershipID, email, phone_number,
            main_contact_name, main_contact_email, main_contact_phone, main_contact_title,
            mailing_address, city, state, zip_code,
            pricing_level_id, bus_cat_id, bus_subcat_id,
            website_url, acct_instagram, acct_facebook,
            renewal_date, expiration_date
       FROM clients
      WHERE client_id = ?',
    [$session->clientId]
) ?? [];

// Membership level / category / subcategory display labels — same source
// the wizard's Step 2 dropdowns + Step 6 review use, so the names line
// up across every surface.
$membershipLevelName = '';
$busCatName          = '';
$busSubcatName       = '';
if (!empty($client['pricing_level_id'])) {
    $row = Db::one(
        'SELECT pricing_level FROM members_level WHERE memb_lev_id = ?',
        [(int) $client['pricing_level_id']]
    );
    $membershipLevelName = (string) ($row['pricing_level'] ?? '');
}
if (!empty($client['bus_cat_id'])) {
    $row = Db::one(
        'SELECT bus_cat FROM bus_categories WHERE bus_cat_id = ?',
        [(int) $client['bus_cat_id']]
    );
    $busCatName = (string) ($row['bus_cat'] ?? '');
}
if (!empty($client['bus_subcat_id'])) {
    $row = Db::one(
        'SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = ?',
        [(int) $client['bus_subcat_id']]
    );
    $busSubcatName = (string) ($row['bus_subcategory'] ?? '');
}

// Use BuyerManager::getActive() instead of an inline query so the
// admin review panel always matches what the customer sees on Step 4
// of the wizard. The inline query that was here used the legacy
// `include` BIT filter — that hid the admin-added buyers (whose
// include defaults to b'0') that migration 006 specifically fixed
// on the wizard side. User's manual test on 2026-06-19 (client
// 737831, "Test Member 20-Jun-2026") showed Step 4 with 3 active
// buyers but admin review claiming only 1.
$activeBuyers = BuyerManager::getActive($session->clientId);

// Mark "reviewed" the first time someone opens this page. Idempotent.
$session->markAdminReviewed();

// ── 3. Pull the Changes Summary entries from renewal_changes ───────────
$rawChanges = $session->getChanges();

// Pre-load lookup tables so the formatter can resolve raw IDs to
// readable names. Larissa's 2026-06-22 Round 3 QA called out a row
// reading "bus_subcat_id changed from 3 to 2" — staff have to mentally
// translate every ID into a category name, which they shouldn't have
// to do. We do the lookup once per page render rather than per row.
$busCatLookup    = [];
$busSubcatLookup = [];
foreach (Db::all('SELECT bus_cat_id, bus_cat FROM bus_categories') as $r) {
    $busCatLookup[(int) $r['bus_cat_id']] = (string) ($r['bus_cat'] ?? '');
}
foreach (Db::all('SELECT bus_subcat_id, bus_subcategory FROM bus_subcats') as $r) {
    $busSubcatLookup[(int) $r['bus_subcat_id']] = (string) ($r['bus_subcategory'] ?? '');
}

// Friendly labels for the column names we log into renewal_changes.
// Anything not in this map falls back to the raw column name, which is
// still better than nothing — but every column the wizard actively
// edits has a row here so staff never see column-name lingo.
$fieldLabels = [
    // Step 2 — organisation
    'co_name'             => 'Company name',
    'bus_cat_id'          => 'Business category',
    'bus_subcat_id'       => 'Business subcategory',
    'mailing_address'     => 'Mailing address',
    'city'                => 'City',
    'state'               => 'State',
    'zip_code'            => 'ZIP code',
    'website_url'         => 'Company website',
    'acct_instagram'      => 'Instagram',
    'acct_facebook'       => 'Facebook',
    // Step 3 — main contact
    'member_name'         => 'Name',
    'email'               => 'Email',
    'phone1'              => 'Phone',
    'main_contact_title'  => 'Title',
    // Step 4 — buyers
    'note'                => 'Note',
    // Step 5 — documents (the field_name is the slot key the wizard used)
    'main_contact_id'     => 'Main contact ID',
    'business_license'    => 'Business Registry',
];

// Helper: turn old_value / new_value into a display string, looking up
// IDs for the two foreign-key fields. Empty values pass through as ''.
$valueFor = static function (string $field, string $raw)
    use ($busCatLookup, $busSubcatLookup): string {
    if ($raw === '') {
        return '';
    }
    if ($field === 'bus_cat_id' && ctype_digit($raw)) {
        return $busCatLookup[(int) $raw] ?? $raw;
    }
    if ($field === 'bus_subcat_id' && ctype_digit($raw)) {
        return $busSubcatLookup[(int) $raw] ?? $raw;
    }
    return $raw;
};

// Format each change row into a human-readable line for the Changes panel.
// Spec section 8 defines the format. We support 6 change_type values.
$formattedChanges = array_map(static function (array $c) use ($fieldLabels, $valueFor): array {
    $type     = (string) ($c['change_type']  ?? '');
    $field    = (string) ($c['field_name']   ?? '');
    $oldRaw   = trim((string) ($c['old_value'] ?? ''));
    $newRaw   = trim((string) ($c['new_value'] ?? ''));
    $oldV     = $valueFor($field, $oldRaw);
    $newV     = $valueFor($field, $newRaw);
    $label    = $fieldLabels[$field] ?? $field;
    $targetId = $c['target_id'];

    // Default values; specific cases override
    $cssClass = 'modified';
    $badge    = 'Modified';
    $headline = '';
    $detail   = '';

    switch ($type) {
        case 'buyer_added':
            $cssClass = 'added';
            $badge    = 'Buyer added';
            $headline = $newV !== '' ? $newV : 'New buyer';
            if ($targetId) {
                $detail = "Member ID: #{$targetId}";
            }
            break;

        case 'buyer_removed':
            $cssClass = 'removed';
            $badge    = 'Buyer removed';
            $headline = $oldV !== '' ? $oldV : 'Existing buyer';
            if ($targetId) {
                $detail = "Member ID: #{$targetId}";
            }
            break;

        case 'buyer_modified':
            $cssClass = 'modified';
            $badge    = 'Buyer modified';
            $headline = $label;
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            if ($targetId) {
                $detail .= " &middot; Member ID: #{$targetId}";
            }
            break;

        case 'company_changed':
            $cssClass = 'modified';
            $badge    = 'Company updated';
            $headline = $label;
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            break;

        case 'contact_changed':
            $cssClass = 'modified';
            $badge    = 'Main contact updated';
            $headline = $label;
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            break;

        case 'document_changed':
            $cssClass = 'modified';
            $badge    = 'Document uploaded';
            $headline = $label;
            $detail   = "File: \"{$newV}\"";
            break;
    }

    return [
        'cssClass' => $cssClass,
        'badge'    => $badge,
        'headline' => $headline,
        'detail'   => $detail,
        'at'       => (string) ($c['created_at'] ?? ''),
    ];
}, $rawChanges);

// ── 4. Render ───────────────────────────────────────────────────────────
$pageTitle  = ($client['co_name'] ?? 'Unknown') . ' — Renewal review';
$subtitle   = sprintf(
    'Session #%d &middot; Status: %s &middot; Paid: %s',
    $session->id,
    htmlspecialchars($session->status),
    $session->paidAt
        ? htmlspecialchars(date('M j, Y g:ia', strtotime($session->paidAt)))
        : '(not paid)'
);

pfm_admin_header($pageTitle, $subtitle);

// ── If already confirmed, lock the form and show a banner ─────────────
$alreadyConfirmed = ($session->adminConfirmedAt !== null);
?>

<?php if ($alreadyConfirmed): ?>
    <div class="pfm-alert pfm-alert--success">
        <strong>This renewal has already been confirmed.</strong>
        <p class="pfm-mt-0">
            Receipt was confirmed on
            <strong><?= htmlspecialchars(date('F j, Y \a\t g:ia', strtotime($session->adminConfirmedAt))) ?></strong>.
            The payment row has been written to <code>client_pmts</code> and is visible
            in the existing PFM admin. No further action needed.
        </p>
    </div>
<?php endif; ?>

<div class="pfm-card">
    <h2 class="pfm-card__title pfm-mt-0">
        <?= htmlspecialchars($client['co_name'] ?? '(Unknown company)') ?>
    </h2>
    <p class="pfm-text-muted pfm-mt-0">
        Membership #<?= htmlspecialchars((string) ($client['MembershipID'] ?? '—')) ?>
        &middot; Client ID <?= (int) $session->clientId ?>
    </p>

    <div class="pfm-admin-grid pfm-mt-2">

        <!-- ── Left column: customer + company ── -->
        <div>
            <h3 class="pfm-card__subtitle">Main contact</h3>
            <div class="pfm-data-row">
                <span class="label">Name</span>
                <span class="value"><?= htmlspecialchars($client['main_contact_name'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Title</span>
                <span class="value"><?= htmlspecialchars($client['main_contact_title'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Email</span>
                <span class="value"><?= htmlspecialchars($client['main_contact_email'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Phone</span>
                <span class="value"><?= htmlspecialchars(pfm_format_phone($client['main_contact_phone'] ?? null) ?: '—') ?></span>
            </div>

            <h3 class="pfm-card__subtitle pfm-mt-3">Company</h3>
            <div class="pfm-data-row">
                <span class="label">Name</span>
                <span class="value"><?= htmlspecialchars($client['co_name'] ?? '—') ?></span>
            </div>
            <?php if ($membershipLevelName !== ''): ?>
            <div class="pfm-data-row">
                <span class="label">Membership level</span>
                <span class="value"><?= htmlspecialchars($membershipLevelName) ?></span>
            </div>
            <?php endif; ?>
            <?php
                $catLine = $busCatName;
                if ($busSubcatName !== '') {
                    $catLine = $catLine !== ''
                        ? $catLine . ' — ' . $busSubcatName
                        : $busSubcatName;
                }
            ?>
            <?php if ($catLine !== ''): ?>
            <div class="pfm-data-row">
                <span class="label">Business category</span>
                <span class="value"><?= htmlspecialchars($catLine) ?></span>
            </div>
            <?php endif; ?>
            <?php
                // Only render the Online presence row when the customer
                // actually has at least one of the three. Keeps the block
                // compact for clients who don't use social.
                $onlineLinks = [];
                foreach ([
                    'Website'   => $client['website_url']    ?? '',
                    'Instagram' => $client['acct_instagram'] ?? '',
                    'Facebook'  => $client['acct_facebook']  ?? '',
                ] as $lbl => $val) {
                    $val = trim((string) $val);
                    if ($val !== '') {
                        $onlineLinks[] = $lbl . ': ' . $val;
                    }
                }
            ?>
            <?php if (!empty($onlineLinks)): ?>
            <div class="pfm-data-row">
                <span class="label">Online presence</span>
                <span class="value" style="overflow-wrap: anywhere; word-break: break-word;">
                    <?= implode('<br>', array_map('htmlspecialchars', $onlineLinks)) ?>
                </span>
            </div>
            <?php endif; ?>
            <div class="pfm-data-row">
                <span class="label">Address</span>
                <span class="value" style="overflow-wrap: anywhere; word-break: break-word;">
                    <?php
                        // Render street on one line, city / state / zip on a
                        // second line. Larissa's 2026-06-26 Round 4 test caught
                        // the previous single-line implementation breaking
                        // "Karachi Central" between "Centr" and "al" when the
                        // mailing_address field carried a long string (in her
                        // test, the customer had pasted an email address into
                        // street_address, blowing the column width). Two-line
                        // layout + overflow-wrap: anywhere on the value cell
                        // gives the address breathing room and forces any
                        // single overlong token to break at character bounds
                        // instead of mangling a word in the middle.
                        $street   = trim((string) ($client['mailing_address'] ?? ''));
                        $cityLine = trim(implode(', ', array_filter([
                            trim((string) ($client['city']     ?? '')),
                            trim((string) ($client['state']    ?? '')),
                        ], static fn($v) => $v !== '')));
                        $zip = trim((string) ($client['zip_code'] ?? ''));
                        if ($cityLine !== '' && $zip !== '') {
                            $cityLine .= ' ' . $zip;
                        } elseif ($zip !== '') {
                            $cityLine = $zip;
                        }
                    ?>
                    <?php if ($street !== ''): ?>
                        <?= htmlspecialchars($street) ?><br>
                    <?php endif; ?>
                    <?php if ($cityLine !== ''): ?>
                        <?= htmlspecialchars($cityLine) ?>
                    <?php endif; ?>
                </span>
            </div>
        </div>

        <!-- ── Right column: Stripe payment ── -->
        <div>
            <h3 class="pfm-card__subtitle">Stripe payment</h3>
            <div class="pfm-data-row">
                <span class="label">Amount paid</span>
                <span class="value">
                    <?= $session->amountCharged !== null
                        ? '$' . number_format($session->amountCharged, 2)
                        : '—' ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Payment status</span>
                <span class="value">
                    <?= $session->isPaid()
                        ? '<span style="color:#0acf97;">✓ Paid</span>'
                        : '<span style="color:#fa5c7c;">Not paid</span>' ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Paid at</span>
                <span class="value">
                    <?= $session->paidAt
                        ? htmlspecialchars(date('M j, Y g:ia', strtotime($session->paidAt)))
                        : '—' ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Card</span>
                <span class="value">
                    <?php if ($session->stripeCardBrand && $session->stripeCardLast4): ?>
                        <?= htmlspecialchars(ucfirst($session->stripeCardBrand)) ?>
                        ending in <strong><?= htmlspecialchars($session->stripeCardLast4) ?></strong>
                    <?php else: ?>
                        &mdash;
                    <?php endif; ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Receipt</span>
                <span class="value">
                    <?php if ($session->stripeReceiptUrl): ?>
                        <a href="<?= htmlspecialchars($session->stripeReceiptUrl, ENT_QUOTES) ?>"
                           target="_blank" rel="noopener noreferrer">
                            View Stripe Receipt &nearr;
                        </a>
                    <?php else: ?>
                        &mdash;
                    <?php endif; ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Stripe payment ID</span>
                <span class="value" style="font-family:monospace; font-size:0.82rem;">
                    <?= htmlspecialchars($session->paymentId ?? '—') ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Checkout session</span>
                <span class="value" style="font-family:monospace; font-size:0.78rem;">
                    <?= htmlspecialchars($session->stripeSessionId ?? '—') ?>
                </span>
            </div>

            <h3 class="pfm-card__subtitle pfm-mt-3">Renewal session</h3>
            <div class="pfm-data-row">
                <span class="label">Reference number</span>
                <span class="value" style="font-family:monospace; font-weight:600;">
                    <?= htmlspecialchars($session->getReferenceNumber()) ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Session ID</span>
                <span class="value">#<?= (int) $session->id ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Status</span>
                <span class="value"><?= htmlspecialchars($session->status) ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Reviewed at</span>
                <span class="value">
                    <?= $session->adminReviewedAt
                        ? htmlspecialchars(date('M j, Y g:ia', strtotime($session->adminReviewedAt)))
                        : '—' ?>
                </span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Confirmed at</span>
                <span class="value">
                    <?= $session->adminConfirmedAt
                        ? htmlspecialchars(date('M j, Y g:ia', strtotime($session->adminConfirmedAt)))
                        : '—' ?>
                </span>
            </div>
        </div>

    </div>
</div>

<!-- ── Changes Summary ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Changes Summary</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Everything the customer added, removed, or modified during this renewal.
        These changes have already been applied to the existing PFM database
        (clients/members tables) — this list is the audit trail.
    </p>

    <?php if (empty($formattedChanges)): ?>
        <p class="pfm-text-muted pfm-mt-2"><em>No changes were recorded for this renewal session.</em></p>
    <?php else: ?>
        <ul class="pfm-changes-list pfm-mt-2">
        <?php foreach ($formattedChanges as $c): ?>
            <li class="<?= htmlspecialchars($c['cssClass']) ?>">
                <span class="change-type"><?= htmlspecialchars($c['badge']) ?></span>
                <span><?= $c['headline'] /* already-escaped fields are pre-escaped above; field name from DB enum is safe */ ?></span>
                <?php if ($c['detail'] !== ''): ?>
                    <div class="pfm-text-muted" style="font-size:0.85rem; margin-top:4px; margin-left:2px;">
                        <?= $c['detail'] ?>
                    </div>
                <?php endif; ?>
                <?php if ($c['at'] !== ''): ?>
                    <div class="pfm-text-muted" style="font-size:0.78rem; margin-top:2px;">
                        <?= htmlspecialchars(date('M j, Y g:ia', strtotime($c['at']))) ?>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- ── Uploaded documents (added 2026-06-14 per Larissa's Phase 6 video) ── -->
<?php
// Friendly display labels for the well-known document keys plus a fallback
// for any additional documents the customer may have uploaded. Larissa
// specifically asked staff to verify the ID, Secretary of State /
// business registration, and any additional documents BEFORE clicking
// Confirm Receipt — this panel exists for exactly that.
$documents = DocumentUpload::getAll($session);

// Legacy carry-over ID surface — mirror of the Bug 2 fallback the
// wizard uses on Step 3 / 5 / 6. When a customer has an existing ID
// stored directly in clients.main_contact_img_id (uploaded via legacy
// admin, not via a prior wizard run) they can skip the ID re-upload
// on Step 3. Until Larissa's Round 5 item 1 (2026-07-08) this panel
// had no way to open that on-file image, so staff couldn't verify the
// ID against the customer's registration before Confirm Receipt.
// Adds a synthetic list entry with a View link pointing at
// view-document.php's legacy_main_contact_id branch.
$hasCarryOverIdOnly = false;
if (!isset($documents['main_contact_id'])) {
    $hasCarryOverIdOnly = (int) (Db::scalar(
        'SELECT IF(main_contact_img_id IS NULL OR OCTET_LENGTH(main_contact_img_id) = 0, 0, 1)
           FROM clients WHERE client_id = ?',
        [$session->clientId]
    ) ?? 0) === 1;
}

$docLabels = [
    'main_contact_id'  => 'Main Contact ID',
    'business_license' => 'Business Registry',
];
$humaniseDocKey = static function (string $key) use ($docLabels): string {
    if (isset($docLabels[$key])) {
        return $docLabels[$key];
    }
    $clean = preg_replace('/[_\\-]+/', ' ', $key);
    $clean = ucwords((string) $clean);
    return $clean;
};
$humaniseSize = static function (int $bytes): string {
    if ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 1) . ' MB';
    }
    if ($bytes >= 1024) {
        return number_format($bytes / 1024, 0) . ' KB';
    }
    return $bytes . ' B';
};
$adminTok = htmlspecialchars($session->adminReviewToken ?? '', ENT_QUOTES);
?>
<?php
$totalDocCount = count($documents) + ($hasCarryOverIdOnly ? 1 : 0);
?>
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Uploaded Documents (<?= $totalDocCount ?>)</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Open each file in a new tab and verify the ID, the business
        registration with the Secretary of State, and any additional
        documents the customer attached. Confirm Receipt should only be
        clicked once every required document checks out.
    </p>

    <?php if ($totalDocCount === 0): ?>
        <div class="pfm-alert pfm-alert--warning">
            <strong>No documents are attached to this renewal.</strong>
            This is unusual — the wizard requires the customer's ID on
            Step 3 and a business document on Step 5. Please verify with
            the customer before proceeding.
        </div>
    <?php else: ?>
        <ul style="list-style: none; padding: 0; margin: 0;">
        <?php foreach ($documents as $key => $doc): ?>
            <?php
                $keyEsc      = htmlspecialchars((string) $key, ENT_QUOTES);
                $labelEsc    = htmlspecialchars($humaniseDocKey((string) $key), ENT_QUOTES);
                $origEsc     = htmlspecialchars((string) ($doc['original_name'] ?? ''), ENT_QUOTES);
                $mime        = (string) ($doc['mime_type'] ?? '');
                $bytes       = (int) ($doc['size'] ?? 0);
                $isImage     = str_starts_with($mime, 'image/');
                $viewUrl     = '/renewal_v2/admin/view-document.php?token=' . $adminTok . '&key=' . $keyEsc;
            ?>
            <li style="display:flex; gap:14px; align-items:center; padding:12px 0; border-bottom:1px solid #eef2f7;">
                <?php if ($isImage): ?>
                    <a href="<?= $viewUrl ?>" target="_blank" rel="noopener" title="Open <?= $labelEsc ?>">
                        <img src="<?= $viewUrl ?>" alt="<?= $labelEsc ?>"
                             style="width:72px; height:72px; object-fit:cover; border-radius:4px; border:1px solid #eef2f7; background:#fafbfe;">
                    </a>
                <?php else: ?>
                    <div style="width:72px; height:72px; display:flex; align-items:center; justify-content:center; border-radius:4px; border:1px solid #eef2f7; background:#fafbfe; font-size:0.75rem; color:#6c757d;">
                        PDF
                    </div>
                <?php endif; ?>
                <div style="flex:1; min-width:0;">
                    <div><strong><?= $labelEsc ?></strong></div>
                    <div class="pfm-text-muted" style="font-size:0.85rem; word-break:break-all;">
                        <?= $origEsc ?>
                        <?php if ($bytes > 0): ?>
                            &middot; <?= htmlspecialchars($humaniseSize($bytes)) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= $viewUrl ?>" target="_blank" rel="noopener">
                    View &nearr;
                </a>
            </li>
        <?php endforeach; ?>

        <?php if ($hasCarryOverIdOnly): ?>
            <?php $legacyUrl = '/renewal_v2/admin/view-document.php?token=' . $adminTok . '&key=legacy_main_contact_id'; ?>
            <li style="display:flex; gap:14px; align-items:center; padding:12px 0; border-bottom:1px solid #eef2f7;">
                <a href="<?= $legacyUrl ?>" target="_blank" rel="noopener" title="Open Main Contact ID">
                    <img src="<?= $legacyUrl ?>" alt="Main Contact ID (on file)"
                         style="width:72px; height:72px; object-fit:cover; border-radius:4px; border:1px solid #eef2f7; background:#fafbfe;">
                </a>
                <div style="flex:1; min-width:0;">
                    <div><strong>Main Contact ID</strong></div>
                    <div class="pfm-text-muted" style="font-size:0.85rem;">
                        On file from a previous renewal &mdash; customer did not re-upload this cycle.
                    </div>
                </div>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= $legacyUrl ?>" target="_blank" rel="noopener">
                    View &nearr;
                </a>
            </li>
        <?php endif; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- ── Active buyers (post-renewal) — includes the main contact, per
     Path B (matches legacy renewal counting). The main_contact row is
     surfaced with a Primary Contact pill so staff can tell it apart at
     a glance. ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Active buyers (<?= count($activeBuyers) ?>)</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Current active members under <?= htmlspecialchars($client['co_name'] ?? 'this client') ?>
        after the customer's edits in this renewal &mdash; main contact + buyers,
        same way the legacy renewal counted them.
    </p>
    <?php if (empty($activeBuyers)): ?>
        <p class="pfm-text-muted"><em>No active buyers.</em></p>
    <?php else: ?>
        <ul style="list-style: none; padding: 0; margin: 0;">
        <?php foreach ($activeBuyers as $buyer): ?>
            <?php
                $bName    = (string) ($buyer['member_name'] ?? '');
                $bEmail   = (string) ($buyer['email']       ?? '');
                $bPhone   = (string) ($buyer['phone1']      ?? '');
                $bNote    = (string) ($buyer['note']        ?? '');
                $isPrimary = !empty($buyer['main_contact']);
            ?>
            <li style="padding: 12px 0; border-bottom: 1px solid #eef2f7;">
                <div style="display:flex; justify-content:space-between; align-items:baseline; gap:8px;">
                    <strong>
                        <?= htmlspecialchars($bName !== '' ? $bName : 'Unnamed buyer') ?>
                        <?php if ($isPrimary): ?>
                            <span style="display:inline-block; margin-left:8px; padding:2px 8px; background:#727cf5; color:#fff; border-radius:10px; font-size:0.7rem; font-weight:600; vertical-align:middle;">
                                Primary Contact
                            </span>
                        <?php endif; ?>
                    </strong>
                    <span class="pfm-text-muted" style="font-family:monospace; font-size:0.8rem;">#<?= (int) $buyer['member_id'] ?></span>
                </div>
                <div style="margin-top:4px; font-size:0.9rem;">
                    <div>
                        <span class="pfm-text-muted">Email:</span>
                        <?php if ($bEmail !== ''): ?>
                            <?= htmlspecialchars($bEmail) ?>
                        <?php else: ?>
                            <span class="pfm-text-muted"><em>not provided</em></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span class="pfm-text-muted">Phone:</span>
                        <?php if ($bPhone !== ''): ?>
                            <?= htmlspecialchars(pfm_format_phone($bPhone)) ?>
                        <?php else: ?>
                            <span class="pfm-text-muted"><em>not provided</em></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span class="pfm-text-muted">Note:</span>
                        <?php if ($bNote !== ''): ?>
                            <?= htmlspecialchars($bNote) ?>
                        <?php else: ?>
                            <span class="pfm-text-muted"><em>not provided</em></span>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<!-- ── Confirm Receipt button (the gate) ── -->
<div class="pfm-card pfm-mt-2 pfm-text-center">
    <h2 class="pfm-card__title pfm-mt-0">
        <?= $alreadyConfirmed ? 'Already confirmed' : 'Confirm Receipt' ?>
    </h2>

    <?php if ($alreadyConfirmed): ?>
        <p class="pfm-text-muted">
            This renewal's payment has already been written to <code>client_pmts</code>.
        </p>
    <?php else: ?>
        <p class="pfm-text-muted pfm-mt-0">
            Clicking the button below will write a row to <code>client_pmts</code>
            (<strong>$<?= $session->amountCharged !== null ? number_format($session->amountCharged, 2) : '—' ?></strong>
            via Stripe reference
            <code><?= htmlspecialchars($session->paymentId ?? '—') ?></code>).
            After that, the payment appears in the existing PFM admin and the
            renewal session is marked completed.
        </p>

        <form action="/renewal_v2/admin/confirm-receipt.php" method="POST" class="pfm-mt-2"
              onsubmit="return confirm('Confirm receipt of $<?= $session->amountCharged !== null ? number_format($session->amountCharged, 2) : '0.00' ?> for <?= htmlspecialchars(addslashes($client['co_name'] ?? '')) ?>?\n\nThis writes to client_pmts and cannot be undone from this page.');">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($pfmCsrfToken) ?>">
            <input type="hidden" name="admin_review_token" value="<?= htmlspecialchars($session->adminReviewToken ?? '') ?>">
            <button type="submit" class="pfm-btn pfm-btn--primary" style="background:#0acf97; border-color:#0acf97;">
                ✓ Confirm Receipt &amp; Apply Payment
            </button>
        </form>
    <?php endif; ?>
</div>

<p class="pfm-text-muted pfm-text-center pfm-mt-2" style="font-size:0.85rem;">
    <a href="/renewal_v2/admin/dashboard.php">&larr; Back to pending reviews dashboard</a>
</p>

<?php pfm_admin_footer(); ?>
