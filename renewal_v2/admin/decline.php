<?php
/**
 * Decline a paid application OR renewal (Larissa's Section 6 workflow).
 *
 * URL: /renewal_v2/admin/decline.php?type=application|renewal&token=<admin_review_token>
 *
 * One page for both kinds of review item (Larissa: "decline a renewal or
 * new application" is one ability, and both share one review queue). Four
 * steps in one file:
 *
 *   GET            the decline form: required reason + required
 *                  "I have processed the refund manually in Stripe" box
 *   POST preview   validates, then shows EXACTLY the email the customer
 *                  will receive (reason substituted in) — nothing is
 *                  changed or sent yet
 *   POST edit      back to the form with the reason pre-filled
 *   POST confirm   revalidates, records the decline, sends the email
 *
 * This workflow never touches Stripe (Larissa refunds manually) and
 * never creates or changes customer data: a declined new application
 * creates no customer record and no membership number.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/ApplicationReview.php';
require_once __DIR__ . '/_includes/admin_layout.php';

pfm_admin_session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf  = (string) $_SESSION['csrf_token'];
$actor = pfm_admin_actor();
session_write_close();

function pfm_decline_terminal(string $title, string $cls, string $html, ?string $backUrl = null): never
{
    pfm_admin_header($title);
    echo '<div class="pfm-card"><div class="pfm-alert pfm-alert--' . htmlspecialchars($cls) . '">' . $html . '</div>';
    if ($backUrl !== null) {
        echo '<p class="pfm-text-center pfm-mt-2"><a class="pfm-btn" href="' . htmlspecialchars($backUrl) . '">&larr; Back to the review</a></p>';
    }
    echo '<p class="pfm-text-muted pfm-text-center"><a href="/renewal_v2/admin/dashboard.php">Back to Application Reviews</a></p></div>';
    pfm_admin_footer();
    exit;
}

$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$src    = $isPost ? $_POST : $_GET;
$type   = (string) ($src['type'] ?? '');
$token  = trim((string) ($src['token'] ?? ''));
$step   = $isPost ? (string) ($_POST['step'] ?? '') : '';

if (!in_array($type, ['application', 'renewal'], true) || $token === '') {
    pfm_decline_terminal('Decline — bad request', 'danger', '<strong>Missing or invalid type/token.</strong>');
}

$item = $type === 'application' ? NewApplication::loadByAdminToken($token) : RenewalSession::loadByAdminToken($token);
if ($item === null) {
    pfm_decline_terminal('Decline — not found', 'danger', '<strong>No ' . htmlspecialchars($type) . ' matches that review token.</strong>');
}
$reviewUrl = ($type === 'application' ? '/renewal_v2/admin/review-application.php' : '/renewal_v2/admin/review.php')
           . '?token=' . rawurlencode($token);

[$company, $toEmail] = ApplicationReview::declineRecipient($item);
$company = $company !== '' ? $company : '(unknown company)';

if ($item->status === 'declined') {
    pfm_decline_terminal('Already declined', 'warning',
        '<strong>This ' . htmlspecialchars($type) . ' was already declined.</strong>'
        . '<p class="pfm-mt-0">Reason: ' . nl2br(htmlspecialchars((string) $item->declineReason)) . '</p>', $reviewUrl);
}
if ($item->status !== 'awaiting_review') {
    pfm_decline_terminal('Cannot decline', 'warning',
        '<strong>Only paid items that are awaiting review can be declined.</strong>'
        . '<p class="pfm-mt-0">Current status: <code>' . htmlspecialchars($item->status) . '</code>.</p>', $reviewUrl);
}

$amount = $item->amountCharged !== null ? '$' . number_format($item->amountCharged, 2) : '—';

if ($isPost) {
    $posted = (string) ($_POST['csrf_token'] ?? '');
    if ($posted === '' || !hash_equals($csrf, $posted)) {
        pfm_decline_terminal('Decline — CSRF mismatch', 'danger',
            '<strong>Your session expired or the form was tampered with.</strong><p class="pfm-mt-0">Open the review page again and start over.</p>', $reviewUrl);
    }
}

$reason         = trim((string) ($src['reason'] ?? ''));
$refundConfirm  = !empty($_POST['refund_confirmed']);
$errors         = [];

if ($isPost && in_array($step, ['preview', 'confirm'], true)) {
    if ($reason === '')                 { $errors[] = 'Please enter the reason for declining — it is required.'; }
    if (mb_strlen($reason) > 1000)      { $errors[] = 'The reason is too long (1000 characters maximum).'; }
    if (!$refundConfirm)                { $errors[] = 'Please confirm that you have processed the refund manually in Stripe.'; }
}

// ── CONFIRM: record the decline + send the email ───────────────────
if ($isPost && $step === 'confirm' && !$errors) {
    try {
        $result = ApplicationReview::decline($item, $reason, $actor);
    } catch (Throwable $e) {
        error_log(sprintf('[review] decline FAILED for %s %d: %s', $type, $item->id, $e->getMessage()));
        pfm_decline_terminal('Decline — could not complete', 'danger',
            '<strong>Not declined.</strong><p class="pfm-mt-0">' . htmlspecialchars($e->getMessage()) . '</p>', $reviewUrl);
    }
    error_log(sprintf('[review] decline OK: %s=%d company="%s" by=%s email=%s', $type, $item->id, $company, $actor, $result['email']));

    pfm_admin_header('Declined');
    ?>
    <div class="pfm-card">
        <div class="pfm-alert pfm-alert--success">
            <strong>✓ Declined and removed from Pending Reviews.</strong>
            <p class="pfm-mt-0"><?= htmlspecialchars($company) ?> &mdash; the <?= htmlspecialchars($type) ?> is kept on record as <em>Declined</em> with your reason.</p>
        </div>
        <ul style="padding-left:18px;line-height:1.7;">
            <li>Decline email to <strong><?= htmlspecialchars($toEmail) ?></strong>: <strong><?= htmlspecialchars($result['email']) ?></strong></li>
            <?php if ($type === 'application'): ?>
                <li>No customer record or membership number was created.</li>
            <?php else: ?>
                <li>No changes were made to the customer's record, membership dates, status or payment history by the decline itself.</li>
            <?php endif; ?>
            <li>The refund was not issued by this system &mdash; it was recorded as already done by you in Stripe.</li>
        </ul>
        <p class="pfm-text-center pfm-mt-2">
            <a class="pfm-btn" href="<?= htmlspecialchars($reviewUrl) ?>">Open the record</a>
            <a class="pfm-btn pfm-btn--primary" href="/renewal_v2/admin/dashboard.php">Back to Application Reviews</a>
        </p>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

// ── PREVIEW: show the exact outgoing email ─────────────────────────
if ($isPost && $step === 'preview' && !$errors) {
    $mail = ApplicationReview::buildDeclineEmail($company, $toEmail, $reason);
    if ($mail === null) {
        pfm_decline_terminal('Decline — cannot build the email', 'danger',
            '<strong>The decline email cannot be prepared.</strong>'
            . '<p class="pfm-mt-0">Either the "declined_application" template is missing from Email Notices, '
            . 'or this customer has no email address on file. Nothing was declined.</p>', $reviewUrl);
    }
    pfm_admin_header('Preview decline email — ' . $company);
    ?>
    <div class="pfm-card">
        <h2 class="pfm-card__title pfm-mt-0">Preview: this is exactly what <?= htmlspecialchars($company) ?> will receive</h2>
        <p class="pfm-text-muted pfm-mt-0">Nothing has been declined or sent yet. Check the wording (especially the reason you entered), then confirm.</p>
        <div class="pfm-data-row"><span class="label">To</span><span class="value"><?= htmlspecialchars($mail['to']) ?></span></div>
        <div class="pfm-data-row"><span class="label">Subject</span><span class="value" style="text-align:left;font-weight:600;"><?= htmlspecialchars($mail['subject']) ?></span></div>
        <div style="border:1px solid #dfe3ea;border-radius:6px;padding:16px 20px;margin-top:12px;background:#fff;">
            <?= $mail['body'] /* template HTML from the Email Notices table; reason/company already escaped */ ?>
        </div>

        <form method="POST" class="pfm-mt-2" style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf) ?>">
            <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
            <input type="hidden" name="reason" value="<?= htmlspecialchars($reason, ENT_QUOTES) ?>">
            <input type="hidden" name="refund_confirmed" value="1">
            <button type="submit" name="step" value="edit" class="pfm-btn">&larr; Edit the reason</button>
            <button type="submit" name="step" value="confirm" class="pfm-btn pfm-btn--primary" style="background:#fa5c7c;border-color:#fa5c7c;"
                    onclick="return confirm('Decline this <?= htmlspecialchars($type) ?> and send this email to <?= htmlspecialchars(addslashes($mail['to']), ENT_QUOTES) ?>?');">
                Confirm decline &amp; send email
            </button>
        </form>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

// ── FORM (GET, or POST edit / validation errors) ────────────────────
pfm_admin_header('Decline — ' . $company, $type === 'application' ? 'New application' : 'Renewal');
?>
<div class="pfm-card">
    <h2 class="pfm-card__title pfm-mt-0">Decline: <?= htmlspecialchars($company) ?></h2>
    <p class="pfm-text-muted pfm-mt-0">
        <?= $type === 'application' ? htmlspecialchars($item->getReferenceNumber()) : htmlspecialchars($item->getReferenceNumber()) ?>
        &middot; paid <strong><?= htmlspecialchars($amount) ?></strong>
        <?php if ($item->paymentId): ?>(Stripe <code><?= htmlspecialchars($item->paymentId) ?></code>)<?php endif; ?>
    </p>

    <?php if ($type === 'application'): ?>
        <div class="pfm-alert pfm-alert--info">Declining creates <strong>no customer record and no membership number</strong>.</div>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning">
            <strong>Heads-up for renewals:</strong> declining changes nothing on the customer's record, membership dates, status or payments.
            But any edits the customer made during this renewal (buyers, contact, company details) were applied when they
            submitted &mdash; declining does <em>not</em> revert them. The review page's Changes Summary lists them if you need to undo any by hand.
        </div>
    <?php endif; ?>

    <?php if ($errors): ?>
        <div class="pfm-alert pfm-alert--danger"><ul style="margin:0;padding-left:18px;">
            <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
        </ul></div>
    <?php endif; ?>

    <form method="POST" class="pfm-mt-2">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf) ?>">
        <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <input type="hidden" name="step" value="preview">

        <label class="pfm-label" for="reason"><strong>Reason for declining</strong> <span class="pfm-required">*</span></label>
        <p class="pfm-text-muted pfm-mt-0" style="font-size:0.85rem;">The customer will see this text in the decline email, so please word it as you'd want them to read it.</p>
        <textarea id="reason" name="reason" class="pfm-textarea" rows="5" maxlength="1000" required
                  placeholder="e.g. Our records show this business is no longer active."><?= htmlspecialchars($reason) ?></textarea>

        <label style="display:flex;gap:10px;align-items:flex-start;margin-top:16px;">
            <input type="checkbox" name="refund_confirmed" value="1" required <?= $refundConfirm ? 'checked' : '' ?> style="margin-top:4px;">
            <span>I have processed the refund of <strong><?= htmlspecialchars($amount) ?></strong> for this payment manually in Stripe.
                <span class="pfm-text-muted">(This system does not issue refunds.)</span></span>
        </label>

        <div class="pfm-mt-2" style="display:flex;gap:12px;">
            <a class="pfm-btn" href="<?= htmlspecialchars($reviewUrl) ?>">Cancel</a>
            <button type="submit" class="pfm-btn pfm-btn--primary">Preview decline email &rarr;</button>
        </div>
    </form>
</div>
<?php pfm_admin_footer();
