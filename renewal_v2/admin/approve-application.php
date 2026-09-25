<?php
/**
 * Approve a NEW-CUSTOMER application — the gate where an applicant
 * becomes a real customer.
 *
 * POST /renewal_v2/admin/approve-application.php
 *   csrf_token=<from the review page form>
 *   admin_review_token=<application.admin_review_token>
 *
 * Sibling to admin/confirm-receipt.php (renewals), same guards: POST only,
 * CSRF, per-application admin token, idempotent on reload. The work
 * itself — duplicate-name re-check, INSERT clients/members/client_pmts,
 * Active status, Membership Since / renewal date, membership number, the
 * shared approval email, document copy-in — is
 * ApplicationReview::approve(); see that class for the details.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/ApplicationReview.php';
require_once __DIR__ . '/_includes/admin_layout.php';

pfm_admin_session_start();

function pfm_approve_terminal(string $title, string $alertClass, string $bodyHtml): never
{
    pfm_admin_header($title);
    echo '<div class="pfm-card"><div class="pfm-alert pfm-alert--' . htmlspecialchars($alertClass) . '">' . $bodyHtml . '</div>';
    echo '<p class="pfm-text-muted pfm-text-center pfm-mt-2"><a href="/renewal_v2/admin/dashboard.php">&larr; Back to Application Reviews</a></p></div>';
    pfm_admin_footer();
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    pfm_approve_terminal('Approve — method not allowed', 'danger',
        '<strong>This endpoint only accepts POST.</strong><p class="pfm-mt-0">Use the Approve button on the application review page.</p>');
}

$postedCsrf  = (string) ($_POST['csrf_token'] ?? '');
$sessionCsrf = (string) ($_SESSION['csrf_token'] ?? '');
$actor       = pfm_admin_actor();
// Release the session lock before the slow work (DB transaction, document
// copy, email) so a second admin tab doesn't block on it.
session_write_close();

if ($postedCsrf === '' || !hash_equals($sessionCsrf, $postedCsrf)) {
    pfm_approve_terminal('Approve — CSRF mismatch', 'danger',
        '<strong>Your session expired or the form was tampered with.</strong>'
        . '<p class="pfm-mt-0">Open the application review page again and click Approve without leaving the tab.</p>');
}

$adminToken = trim((string) ($_POST['admin_review_token'] ?? ''));
$application = $adminToken !== '' ? NewApplication::loadByAdminToken($adminToken) : null;
if ($application === null) {
    pfm_approve_terminal('Approve — invalid token', 'danger',
        '<strong>This admin review token does not match any application.</strong>');
}
$reviewUrl = '/renewal_v2/admin/review-application.php?token=' . rawurlencode($adminToken);

// Idempotent: already approved → just point at the result.
if ($application->status === NewApplication::STATUS_COMPLETED) {
    pfm_approve_terminal('Already approved', 'success',
        '<strong>This application was already approved.</strong>'
        . '<p class="pfm-mt-0">Customer #' . (int) $application->createdClientId
        . ', membership number ' . (int) $application->membershipNumber . '. No further action is needed.</p>'
        . '<p class="pfm-mt-2"><a class="pfm-btn pfm-btn--primary" href="' . htmlspecialchars($reviewUrl) . '">Open application</a></p>');
}

try {
    $result = ApplicationReview::approve($application);
} catch (ApplicationNameConflictException $e) {
    error_log('[new_application] approve refused (name conflict) for application ' . $application->id . ': ' . $e->getMessage());
    pfm_approve_terminal('Cannot approve — duplicate company name', 'danger',
        '<strong>Not approved: ' . htmlspecialchars($e->getMessage()) . '</strong>'
        . '<p class="pfm-mt-0">Nothing was created. Resolve the duplicate (or decline this application with a refund), then try again.</p>'
        . '<p class="pfm-mt-2"><a class="pfm-btn" href="' . htmlspecialchars($reviewUrl) . '">Back to the application</a></p>');
} catch (Throwable $e) {
    error_log(sprintf('[new_application] approve FAILED for application %d: %s', $application->id, $e->getMessage()));
    pfm_approve_terminal('Approve — could not complete', 'danger',
        '<strong>The application was not approved.</strong>'
        . '<p class="pfm-mt-0">Nothing was created (the change was rolled back). The error has been logged; '
        . 'try once more, and contact the dev team if it repeats.</p>'
        . '<p class="pfm-mt-0" style="font-family:monospace;font-size:0.78rem;color:#6c757d;">' . htmlspecialchars($e->getMessage()) . '</p>'
        . '<p class="pfm-mt-2"><a class="pfm-btn" href="' . htmlspecialchars($reviewUrl) . '">Back to the application</a></p>');
}

error_log(sprintf(
    '[new_application] approve OK: application=%d client=%d membership=%d buyers=%d docs=%d/%d email=%s by=%s',
    $application->id, $result['client_id'], $result['membership_number'], $result['buyers'],
    $result['docs_copied'], $result['docs_total'], $result['email'], $actor
));

pfm_admin_header('Application approved');
?>
<div class="pfm-card">
    <div class="pfm-alert pfm-alert--success">
        <strong>✓ Application approved &mdash; customer created.</strong>
        <p class="pfm-mt-0">
            <strong><?= htmlspecialchars((string) ($application->draftData['org']['co_name'] ?? '')) ?></strong>
            is now an <strong>Active</strong> customer with membership number
            <strong><?= (int) $result['membership_number'] ?></strong>.
        </p>
    </div>

    <h3 class="pfm-card__subtitle pfm-mt-2">What just happened</h3>
    <ul style="padding-left:18px;line-height:1.7;">
        <li>Customer record created (client #<?= (int) $result['client_id'] ?>, membership number <?= (int) $result['membership_number'] ?>), status Active</li>
        <li><?= (int) $result['buyers'] ?> buyer<?= $result['buyers'] === 1 ? '' : 's' ?> created (main contact + additional)</li>
        <li>Payment recorded in <code>client_pmts</code> (row #<?= (int) $result['client_pmt_id'] ?>) &mdash; visible in the customer's Payments tab</li>
        <li>Documents copied to the customer record: <?= (int) $result['docs_copied'] ?> of <?= (int) $result['docs_total'] ?>
            <?php if ($result['docs_copied'] < $result['docs_total']): ?>
                <span style="color:#fa5c7c;">(some could not be copied &mdash; the originals are still viewable on the application page)</span>
            <?php endif; ?></li>
        <li>Approval email: <strong><?= htmlspecialchars($result['email']) ?></strong></li>
    </ul>

    <p class="pfm-text-center pfm-mt-2">
        <a class="pfm-btn" href="<?= htmlspecialchars($reviewUrl) ?>">Open application</a>
        <a class="pfm-btn pfm-btn--primary" href="/renewal_v2/admin/dashboard.php">Back to Application Reviews</a>
    </p>
</div>
<?php pfm_admin_footer();
