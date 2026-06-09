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
require_once __DIR__ . '/_includes/admin_layout.php';

// PHP session is needed for CSRF token used by the confirm form below
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

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
$client = Db::one(
    'SELECT client_id, co_name, MembershipID, email, phone_number,
            main_contact_name, main_contact_email, main_contact_phone, main_contact_title,
            business_type, business_license, federal_tax_id,
            street_address, city, state, zip_code,
            renewal_date, expiration_date
       FROM clients
      WHERE client_id = ?',
    [$session->clientId]
) ?? [];

$activeBuyers = Db::all(
    'SELECT member_id, member_name, email, phone1
       FROM members
      WHERE client_id = ? AND (main_contact IS NULL OR main_contact = \'\' OR main_contact = 0)
        AND (include IS NULL OR include != 0)
      ORDER BY member_id',
    [$session->clientId]
);

// Mark "reviewed" the first time someone opens this page. Idempotent.
$session->markAdminReviewed();

// ── 3. Pull the Changes Summary entries from renewal_changes ───────────
$rawChanges = $session->getChanges();

// Format each change row into a human-readable line for the Changes panel.
// Spec section 8 defines the format. We support 6 change_type values.
$formattedChanges = array_map(static function (array $c): array {
    $type     = (string) ($c['change_type']  ?? '');
    $field    = (string) ($c['field_name']   ?? '');
    $oldV     = trim((string) ($c['old_value'] ?? ''));
    $newV     = trim((string) ($c['new_value'] ?? ''));
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
            $headline = "Field <em>{$field}</em>";
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            if ($targetId) {
                $detail .= " &middot; Member ID: #{$targetId}";
            }
            break;

        case 'company_changed':
            $cssClass = 'modified';
            $badge    = 'Company updated';
            $headline = "Field <em>{$field}</em>";
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            break;

        case 'contact_changed':
            $cssClass = 'modified';
            $badge    = 'Main contact updated';
            $headline = "Field <em>{$field}</em>";
            $detail   = ($oldV !== '' ? "from \"{$oldV}\" " : '')
                      . "to \"{$newV}\"";
            break;

        case 'document_changed':
            $cssClass = 'modified';
            $badge    = 'Document uploaded';
            $headline = "Field <em>{$field}</em>";
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
                <span class="label">Business type</span>
                <span class="value"><?= htmlspecialchars($client['business_type'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Business license</span>
                <span class="value"><?= htmlspecialchars($client['business_license'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Federal tax ID</span>
                <span class="value"><?= htmlspecialchars($client['federal_tax_id'] ?? '—') ?></span>
            </div>
            <div class="pfm-data-row">
                <span class="label">Address</span>
                <span class="value">
                    <?= htmlspecialchars(trim(
                        ($client['street_address'] ?? '') . ', ' .
                        ($client['city'] ?? '') . ', ' .
                        ($client['state'] ?? '') . ' ' .
                        ($client['zip_code'] ?? ''),
                        ', '
                    )) ?>
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

<!-- ── Active buyers (post-renewal) ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Active buyers (<?= count($activeBuyers) ?>)</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Current active buyers under <?= htmlspecialchars($client['co_name'] ?? 'this client') ?>
        after the customer's edits in this renewal.
    </p>
    <?php if (empty($activeBuyers)): ?>
        <p class="pfm-text-muted"><em>No active buyers.</em></p>
    <?php else: ?>
        <ul style="list-style: none; padding: 0; margin: 0;">
        <?php foreach ($activeBuyers as $buyer): ?>
            <li style="padding: 8px 0; border-bottom: 1px solid #eef2f7;">
                <strong><?= htmlspecialchars((string) ($buyer['member_name'] ?? '')) ?></strong>
                <span class="pfm-text-muted" style="font-size:0.85rem;">
                    &middot; <?= htmlspecialchars((string) ($buyer['email'] ?? '')) ?>
                    &middot; <?= htmlspecialchars(pfm_format_phone((string) ($buyer['phone1'] ?? ''))) ?>
                    &middot; <span style="font-family:monospace;">#<?= (int) $buyer['member_id'] ?></span>
                </span>
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
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
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
