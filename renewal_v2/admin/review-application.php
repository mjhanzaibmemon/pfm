<?php
/**
 * Admin review page for a NEW-CUSTOMER application.
 *
 * URL: /renewal_v2/admin/review-application.php?token=<admin_review_token>
 *
 * Sibling to admin/review.php (renewals) and reached the same way — from
 * the Application Reviews list (dashboard.php). Read-only display plus
 * the two decisions:
 *   Approve → POST approve-application.php (creates the customer record)
 *   Decline → decline.php (refund confirmation + reason + email preview)
 *
 * Unlike a renewal there is no `clients` row yet, so everything shown
 * comes from the application's draft_data; the "Changes Summary" of the
 * renewal page has no equivalent (nothing is being changed — a customer
 * is being created).
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/NewApplication.php';
require_once __DIR__ . '/../lib/ApplicationDocumentUpload.php';
require_once __DIR__ . '/../lib/PhoneFormat.php';
require_once __DIR__ . '/_includes/admin_layout.php';

pfm_admin_session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$pfmCsrfToken = $_SESSION['csrf_token'];
session_write_close();

$token = isset($_GET['token']) ? trim((string) $_GET['token']) : '';
$application = $token !== '' ? NewApplication::loadByAdminToken($token) : null;

if ($application === null) {
    pfm_admin_header('Application review — not found');
    ?>
    <div class="pfm-alert pfm-alert--danger">
        <strong>This review link is not valid.</strong>
        <p class="pfm-mt-0">The token doesn't match any application. Open the
        <a href="/renewal_v2/admin/dashboard.php">Application Reviews list</a>
        to find the one you're looking for.</p>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

$application->markAdminReviewed();

$draft   = $application->draftData;
$org     = $draft['org']     ?? [];
$contact = $draft['contact'] ?? [];
$buyers  = is_array($draft['buyers'] ?? null) ? $draft['buyers'] : [];
$coName  = trim((string) ($org['co_name'] ?? ''));

$level   = NewApplication::getLevelForCategory((int) ($org['bus_cat_id'] ?? 0));
$catName = (string) (Db::scalar('SELECT bus_cat FROM bus_categories WHERE bus_cat_id = ?', [(int) ($org['bus_cat_id'] ?? 0)]) ?? '');
$subName = (string) (Db::scalar('SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = ?', [(int) ($org['bus_subcat_id'] ?? 0)]) ?? '');
$catLine = $catName !== '' && $subName !== '' ? "{$catName} — {$subName}" : ($catName ?: $subName);

$isPending   = $application->status === NewApplication::STATUS_AWAITING_REVIEW;
$isCompleted = $application->status === NewApplication::STATUS_COMPLETED;
$isDeclined  = $application->status === NewApplication::STATUS_DECLINED;

// Name conflict (customers + OTHER pending applications) — the same check
// Approve enforces; surfaced here so staff see WHY before clicking.
$conflict = ($isPending && $coName !== '') ? NewApplication::findNameConflict($coName, $application->id, false) : null;
$conflictOther = null;
if ($conflict !== null && $conflict['source'] === 'application') {
    $conflictOther = NewApplication::loadById((int) $conflict['application_id']);
}

$docs = ApplicationDocumentUpload::getAll($application);
$docLabels = ['main_contact_id' => 'Main Contact ID', 'business_license' => 'Business Registry'];
$humanSize = static function (int $b): string {
    if ($b >= 1048576) return number_format($b / 1048576, 1) . ' MB';
    if ($b >= 1024)    return number_format($b / 1024, 0) . ' KB';
    return $b . ' B';
};
$adminTok = htmlspecialchars((string) $application->adminReviewToken, ENT_QUOTES);
$amount   = $application->amountCharged !== null ? '$' . number_format($application->amountCharged, 2) : '—';
$buyerTotal = 1 + count($buyers);

pfm_admin_header(
    ($coName !== '' ? $coName : 'Unnamed application') . ' — New application review',
    // pfm_admin_header() escapes the subtitle itself — pass plain text.
    sprintf('%s · Status: %s · Paid: %s',
        $application->getReferenceNumber(),
        $application->status,
        $application->paidAt ? date('M j, Y g:ia', strtotime($application->paidAt)) : '(not paid)')
);
?>

<?php if ($isCompleted): ?>
    <div class="pfm-alert pfm-alert--success">
        <strong>This application was approved.</strong>
        <p class="pfm-mt-0">
            Customer record created: client #<?= (int) $application->createdClientId ?>,
            membership number <strong><?= (int) $application->membershipNumber ?></strong>
            (<?= $application->adminConfirmedAt ? htmlspecialchars(date('F j, Y \a\t g:ia', strtotime($application->adminConfirmedAt))) : '' ?>).
            The payment is in the customer's Payments tab in the PFM admin.
        </p>
    </div>
<?php elseif ($isDeclined): ?>
    <div class="pfm-alert pfm-alert--danger">
        <strong>This application was declined.</strong>
        <p class="pfm-mt-0">
            <?= $application->declinedAt ? htmlspecialchars(date('F j, Y \a\t g:ia', strtotime($application->declinedAt))) : '' ?>
            by <?= htmlspecialchars((string) $application->declinedBy) ?>.
            <br><strong>Reason:</strong> <?= nl2br(htmlspecialchars((string) $application->declineReason)) ?>
        </p>
        <p class="pfm-mt-0">No customer record or membership number was created.</p>
    </div>
<?php elseif (!$isPending): ?>
    <div class="pfm-alert pfm-alert--warning">
        <strong>This application is not awaiting review</strong> (status: <code><?= htmlspecialchars($application->status) ?></code>).
        It can only be approved or declined once it has been paid.
    </div>
<?php endif; ?>

<?php if ($conflict !== null): ?>
    <div class="pfm-alert pfm-alert--danger">
        <strong>Duplicate company name &mdash; this application cannot be approved as it stands.</strong>
        <p class="pfm-mt-0">
        <?php if ($conflict['source'] === 'customer'): ?>
            A customer with this name already exists:
            <strong>client #<?= (int) $conflict['client_id'] ?></strong>.
            Creating a second record with the same company name is not allowed.
            If this is a returning customer, use Reset Renewal / the existing record; otherwise decline this application (with a refund).
        <?php else: ?>
            Another application already uses this name:
            <strong><?= htmlspecialchars($conflictOther ? $conflictOther->getReferenceNumber() : ('#' . (int) $conflict['application_id'])) ?></strong>
            (<?= htmlspecialchars($conflictOther->status ?? '?') ?>).
            Decide which one to approve and decline the other.
        <?php endif; ?>
        </p>
    </div>
<?php endif; ?>

<div class="pfm-card">
    <h2 class="pfm-card__title pfm-mt-0"><?= htmlspecialchars($coName !== '' ? $coName : '(no company name)') ?></h2>
    <p class="pfm-text-muted pfm-mt-0">
        New membership application &middot; submitted
        <?= $application->submittedAt ? htmlspecialchars(date('M j, Y g:ia', strtotime($application->submittedAt))) : '—' ?>
    </p>

    <div class="pfm-admin-grid pfm-mt-2">
        <div>
            <h3 class="pfm-card__subtitle">Main contact</h3>
            <div class="pfm-data-row"><span class="label">Name</span><span class="value"><?= htmlspecialchars((string) ($contact['name'] ?? '—')) ?></span></div>
            <div class="pfm-data-row"><span class="label">Title</span><span class="value"><?= htmlspecialchars((string) ($contact['title'] ?? '—')) ?></span></div>
            <div class="pfm-data-row"><span class="label">Email</span><span class="value"><?= htmlspecialchars((string) ($contact['email'] ?? '—')) ?></span></div>
            <div class="pfm-data-row"><span class="label">Phone</span><span class="value"><?= htmlspecialchars(pfm_format_phone((string) ($contact['phone'] ?? '')) ?: '—') ?></span></div>

            <h3 class="pfm-card__subtitle pfm-mt-3">Company</h3>
            <div class="pfm-data-row"><span class="label">Name</span><span class="value"><?= htmlspecialchars($coName ?: '—') ?></span></div>
            <?php if ($level): ?>
            <div class="pfm-data-row"><span class="label">Membership level</span><span class="value"><?= htmlspecialchars((string) $level['pricing_level']) ?></span></div>
            <?php endif; ?>
            <?php if ($catLine !== ''): ?>
            <div class="pfm-data-row"><span class="label">Business category</span><span class="value"><?= htmlspecialchars($catLine) ?></span></div>
            <?php endif; ?>
            <?php
                $online = [];
                foreach (['Website' => 'website_url', 'Instagram' => 'acct_instagram', 'Facebook' => 'acct_facebook'] as $lbl => $k) {
                    $v = trim((string) ($org[$k] ?? ''));
                    if ($v !== '') { $online[] = $lbl . ': ' . $v; }
                }
            ?>
            <?php if ($online): ?>
            <div class="pfm-data-row"><span class="label">Online presence</span>
                <span class="value" style="overflow-wrap:anywhere;"><?= implode('<br>', array_map('htmlspecialchars', $online)) ?></span></div>
            <?php endif; ?>
            <div class="pfm-data-row"><span class="label">Address</span>
                <span class="value" style="overflow-wrap:anywhere;">
                    <?= htmlspecialchars((string) ($org['mailing_address'] ?? '')) ?><br>
                    <?= htmlspecialchars(trim(($org['city'] ?? '') . ', ' . ($org['state'] ?? '') . ' ' . ($org['zip_code'] ?? ''), ' ,')) ?>
                </span></div>
        </div>

        <div>
            <h3 class="pfm-card__subtitle">Stripe payment</h3>
            <div class="pfm-data-row"><span class="label">Amount paid</span><span class="value"><?= htmlspecialchars($amount) ?></span></div>
            <div class="pfm-data-row"><span class="label">Payment status</span><span class="value">
                <?= $application->isPaid() ? '<span style="color:#0acf97;">✓ Paid</span>' : '<span style="color:#fa5c7c;">Not paid</span>' ?></span></div>
            <div class="pfm-data-row"><span class="label">Paid at</span><span class="value"><?= $application->paidAt ? htmlspecialchars(date('M j, Y g:ia', strtotime($application->paidAt))) : '—' ?></span></div>
            <div class="pfm-data-row"><span class="label">Card</span><span class="value">
                <?php if ($application->stripeCardBrand && $application->stripeCardLast4): ?>
                    <?= htmlspecialchars(ucfirst($application->stripeCardBrand)) ?> ending in <strong><?= htmlspecialchars($application->stripeCardLast4) ?></strong>
                <?php else: ?>&mdash;<?php endif; ?></span></div>
            <div class="pfm-data-row"><span class="label">Receipt</span><span class="value">
                <?php if ($application->stripeReceiptUrl): ?>
                    <a href="<?= htmlspecialchars($application->stripeReceiptUrl, ENT_QUOTES) ?>" target="_blank" rel="noopener noreferrer">View Stripe Receipt &nearr;</a>
                <?php else: ?>&mdash;<?php endif; ?></span></div>
            <div class="pfm-data-row"><span class="label">Stripe payment ID</span><span class="value" style="font-family:monospace;font-size:0.82rem;"><?= htmlspecialchars($application->paymentId ?? '—') ?></span></div>
            <div class="pfm-data-row"><span class="label">Checkout session</span><span class="value" style="font-family:monospace;font-size:0.78rem;"><?= htmlspecialchars($application->stripeSessionId ?? '—') ?></span></div>

            <h3 class="pfm-card__subtitle pfm-mt-3">Application</h3>
            <div class="pfm-data-row"><span class="label">Reference number</span><span class="value" style="font-family:monospace;font-weight:600;"><?= htmlspecialchars($application->getReferenceNumber()) ?></span></div>
            <div class="pfm-data-row"><span class="label">Status</span><span class="value"><?= htmlspecialchars($application->status) ?></span></div>
            <div class="pfm-data-row"><span class="label">Reviewed at</span><span class="value"><?= $application->adminReviewedAt ? htmlspecialchars(date('M j, Y g:ia', strtotime($application->adminReviewedAt))) : '—' ?></span></div>
            <div class="pfm-data-row"><span class="label">Buyers (incl. main contact)</span><span class="value"><?= (int) $buyerTotal ?></span></div>
        </div>
    </div>
</div>

<?php if (trim((string) $application->customerNote) !== ''): ?>
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Applicant's note</h2>
    <div style="white-space:pre-wrap;"><?= htmlspecialchars((string) $application->customerNote) ?></div>
</div>
<?php endif; ?>

<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Uploaded Documents (<?= count($docs) ?>)</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Open each file and verify the ID, the Secretary of State business registration,
        and any additional documents before approving.
    </p>
    <?php if (!$docs): ?>
        <div class="pfm-alert pfm-alert--warning"><strong>No documents are attached.</strong> The application form requires the ID and the Business Registry — please verify with the applicant before approving.</div>
    <?php else: ?>
        <ul style="list-style:none;padding:0;margin:0;">
        <?php foreach ($docs as $key => $doc): ?>
            <?php
                $keyEsc   = htmlspecialchars((string) $key, ENT_QUOTES);
                $label    = $docLabels[$key] ?? 'Additional document';
                $mime     = (string) ($doc['mime_type'] ?? '');
                $viewUrl  = '/renewal_v2/admin/view-application-document.php?token=' . $adminTok . '&key=' . $keyEsc;
            ?>
            <li style="display:flex;gap:14px;align-items:center;padding:12px 0;border-bottom:1px solid #eef2f7;">
                <?php if (str_starts_with($mime, 'image/')): ?>
                    <a href="<?= $viewUrl ?>" target="_blank" rel="noopener"><img src="<?= $viewUrl ?>" alt="<?= htmlspecialchars($label) ?>" style="width:72px;height:72px;object-fit:cover;border-radius:4px;border:1px solid #eef2f7;background:#fafbfe;"></a>
                <?php else: ?>
                    <div style="width:72px;height:72px;display:flex;align-items:center;justify-content:center;border-radius:4px;border:1px solid #eef2f7;background:#fafbfe;font-size:0.75rem;color:#6c757d;">PDF</div>
                <?php endif; ?>
                <div style="flex:1;min-width:0;">
                    <div><strong><?= htmlspecialchars($label) ?></strong></div>
                    <div class="pfm-text-muted" style="font-size:0.85rem;word-break:break-all;">
                        <?= htmlspecialchars((string) ($doc['original_name'] ?? '')) ?>
                        <?php if (($doc['size'] ?? 0) > 0): ?>&middot; <?= htmlspecialchars($humanSize((int) $doc['size'])) ?><?php endif; ?>
                    </div>
                </div>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm" href="<?= $viewUrl ?>" target="_blank" rel="noopener">View &nearr;</a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">Buyers (<?= (int) $buyerTotal ?>)</h2>
    <p class="pfm-text-muted pfm-mt-0">Main contact plus the buyers the applicant added. These become the customer's members on approval.</p>
    <ul style="list-style:none;padding:0;margin:0;">
        <li style="padding:12px 0;border-bottom:1px solid #eef2f7;">
            <strong><?= htmlspecialchars((string) ($contact['name'] ?? 'Unnamed')) ?>
                <span style="display:inline-block;margin-left:8px;padding:2px 8px;background:#727cf5;color:#fff;border-radius:10px;font-size:0.7rem;font-weight:600;vertical-align:middle;">Primary Contact</span></strong>
            <div style="margin-top:4px;font-size:0.9rem;">
                <span class="pfm-text-muted">Email:</span> <?= htmlspecialchars((string) ($contact['email'] ?? '')) ?>
                &nbsp; <span class="pfm-text-muted">Phone:</span> <?= htmlspecialchars(pfm_format_phone((string) ($contact['phone'] ?? ''))) ?>
            </div>
        </li>
        <?php foreach ($buyers as $b): ?>
        <li style="padding:12px 0;border-bottom:1px solid #eef2f7;">
            <strong><?= htmlspecialchars((string) ($b['name'] ?? 'Unnamed buyer')) ?></strong>
            <div style="margin-top:4px;font-size:0.9rem;">
                <span class="pfm-text-muted">Email:</span> <?= ($b['email'] ?? '') !== '' ? htmlspecialchars((string) $b['email']) : '<em class="pfm-text-muted">not provided</em>' ?>
                &nbsp; <span class="pfm-text-muted">Phone:</span> <?= ($b['phone'] ?? '') !== '' ? htmlspecialchars(pfm_format_phone((string) $b['phone'])) : '<em class="pfm-text-muted">not provided</em>' ?>
                <?php if (($b['note'] ?? '') !== ''): ?>&nbsp; <span class="pfm-text-muted">Note:</span> <?= htmlspecialchars((string) $b['note']) ?><?php endif; ?>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php if ($isPending): ?>
<div class="pfm-card pfm-mt-2 pfm-text-center">
    <h2 class="pfm-card__title pfm-mt-0">Decision</h2>
    <p class="pfm-text-muted pfm-mt-0">
        <strong>Approve</strong> creates the customer record (<?= (int) $buyerTotal ?> buyer<?= $buyerTotal === 1 ? '' : 's' ?>),
        assigns the next membership number, records the <?= htmlspecialchars($amount) ?> payment,
        sets the status to Active with Membership Since = the submission date, and emails the applicant the standard approval message.
        <strong>Decline</strong> creates nothing and emails the applicant your reason.
    </p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;" class="pfm-mt-2">
        <form action="/renewal_v2/admin/approve-application.php" method="POST"
              onsubmit="return confirm('Approve this application and create the customer record for <?= htmlspecialchars(addslashes($coName), ENT_QUOTES) ?>?\n\nThis creates a new customer, assigns a membership number and writes the payment. It cannot be undone from this page.');">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($pfmCsrfToken) ?>">
            <input type="hidden" name="admin_review_token" value="<?= $adminTok ?>">
            <button type="submit" class="pfm-btn pfm-btn--primary" style="background:#0acf97;border-color:#0acf97;" <?= $conflict !== null ? 'disabled title="Resolve the duplicate company name first"' : '' ?>>
                ✓ Approve &amp; Create Customer
            </button>
        </form>
        <a class="pfm-btn" style="border:1px solid #fa5c7c;color:#fa5c7c;"
           href="/renewal_v2/admin/decline.php?type=application&amp;token=<?= $adminTok ?>">✕ Decline…</a>
    </div>
</div>
<?php endif; ?>

<p class="pfm-text-muted pfm-text-center pfm-mt-2" style="font-size:0.85rem;">
    <a href="/renewal_v2/admin/dashboard.php">&larr; Back to Application Reviews</a>
</p>

<?php pfm_admin_footer(); ?>
