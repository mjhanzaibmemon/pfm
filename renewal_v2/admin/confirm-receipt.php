<?php
/**
 * Phase 4 — Confirm Receipt gate endpoint.
 *
 * POST /renewal_v2/admin/confirm-receipt.php
 *   csrf_token=<from form>
 *   admin_review_token=<session.admin_review_token>
 *
 * This is THE gate — it is the only place in the codebase that writes a
 * row into client_pmts for a renewal payment. Until staff click "Confirm
 * Receipt" on review.php and this endpoint runs successfully, the
 * Stripe payment exists ONLY in renewal_sessions.payment_id and is
 * invisible to the existing PFM admin grids.
 *
 * What this does on success (atomic, idempotent):
 *   1. INSERT INTO client_pmts (the payment row that PFM staff sees)
 *   2. UPDATE renewal_sessions.admin_confirmed_at = NOW()
 *   3. UPDATE renewal_sessions.status = 'completed'
 *   4. UPDATE sec_renewals.applied = NOW() for the token used (renewal closed out)
 *
 * Idempotency: if admin_confirmed_at is already set, we return success
 * without re-inserting. Reload-safe.
 *
 * Spec ref: larissa_rebuild.md → "Staff clicks Confirm Receipt → ONLY THEN
 *   does client_pmts get the row (the gate)."
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/_includes/admin_layout.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

/* ─── Small helper: render the error/success terminal screens ──────────── */
function pfm_admin_terminal(string $title, string $alertClass, string $bodyHtml, ?int $sessionId = null): void
{
    pfm_admin_header($title);
    echo '<div class="pfm-card">';
    echo '<div class="pfm-alert pfm-alert--' . htmlspecialchars($alertClass) . '">';
    echo $bodyHtml;
    echo '</div>';
    echo '<p class="pfm-text-muted pfm-text-center pfm-mt-2">';
    echo '<a href="/renewal_v2/admin/dashboard.php">&larr; Back to pending reviews dashboard</a>';
    echo '</p>';
    echo '</div>';
    pfm_admin_footer();
    exit;
}

/* ─── 1. Method + CSRF guards ──────────────────────────────────────────── */
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    pfm_admin_terminal(
        'Confirm Receipt — Method not allowed',
        'danger',
        '<strong>This endpoint only accepts POST.</strong><p class="pfm-mt-0">'
      . 'Please use the Confirm Receipt button on the review page.</p>'
    );
}

$postedCsrf = (string) ($_POST['csrf_token'] ?? '');
$sessionCsrf = (string) ($_SESSION['csrf_token'] ?? '');
if ($postedCsrf === '' || !hash_equals($sessionCsrf, $postedCsrf)) {
    pfm_admin_terminal(
        'Confirm Receipt — CSRF mismatch',
        'danger',
        '<strong>Your session expired or the form was tampered with.</strong>'
      . '<p class="pfm-mt-0">Please open the review page again and click '
      . 'Confirm Receipt without leaving the tab.</p>'
    );
}

$adminToken = trim((string) ($_POST['admin_review_token'] ?? ''));
if ($adminToken === '') {
    pfm_admin_terminal(
        'Confirm Receipt — Missing token',
        'danger',
        '<strong>No admin review token in request.</strong>'
    );
}

/* ─── 2. Load session by admin token ───────────────────────────────────── */
$session = RenewalSession::loadByAdminToken($adminToken);
if ($session === null) {
    pfm_admin_terminal(
        'Confirm Receipt — Invalid token',
        'danger',
        '<strong>This admin review token does not match any renewal session.</strong>'
      . '<p class="pfm-mt-0">It may have been tampered with, or the renewal was cancelled.</p>'
    );
}

/* ─── 3. Idempotent short-circuit ──────────────────────────────────────── */
if ($session->adminConfirmedAt !== null) {
    pfm_admin_terminal(
        'Already confirmed',
        'success',
        '<strong>This renewal was already confirmed.</strong>'
      . '<p class="pfm-mt-0">No further action is needed. The payment row '
      . 'is already visible in the existing PFM admin.</p>'
      . '<p class="pfm-mt-2"><a class="pfm-btn pfm-btn--primary" '
      . 'href="/renewal_v2/admin/review.php?token=' . htmlspecialchars($adminToken)
      . '">Open review page</a></p>'
    );
}

/* ─── 4. Sanity checks before writing client_pmts ──────────────────────── */
if (!$session->isPaid()) {
    pfm_admin_terminal(
        'Cannot confirm — not paid',
        'danger',
        '<strong>This renewal session is not marked paid.</strong>'
      . '<p class="pfm-mt-0">Status: <code>' . htmlspecialchars($session->status) . '</code>. '
      . 'Confirm Receipt can only be applied to a paid session.</p>'
    );
}
if ($session->amountCharged === null || $session->amountCharged <= 0) {
    pfm_admin_terminal(
        'Cannot confirm — no amount',
        'danger',
        '<strong>This renewal session has no charged amount recorded.</strong>'
      . '<p class="pfm-mt-0">Refusing to insert a $0 row into client_pmts. '
      . 'Contact the dev team before proceeding.</p>'
    );
}

/* ─── 5. Apply the write (best-effort transaction) ─────────────────────── */
$pdo      = Db::pdo();
$inserted = false;
try {
    $pdo->beginTransaction();

    // 5a. INSERT into client_pmts
    // pmt_mode matches the existing convention used by the legacy renewal
    // (see client_pmts samples — "Crediit Card" [sic] is in the prod data).
    // We use the corrected spelling "Credit Card" so reports show clean labels;
    // amt_received and pmt_date come from the renewal_sessions row.
    //
    // reference is a HYBRID format: "RNW-{id} / pi_xxx"
    //   - "RNW-27"          → human-friendly number customer cites on phone
    //   - " / pi_3TfzJK..." → full Stripe payment intent ID for reconciliation
    // Both in one field so existing PFM admin grids show both at once and
    // staff can search by either.
    $stripeId  = (string) ($session->paymentId ?? '');
    $reference = $session->getReferenceNumber()
               . ($stripeId !== '' ? ' / ' . $stripeId : '');

    $stmt = $pdo->prepare(
        'INSERT INTO client_pmts (client_id, pmt_mode, reference, pmt_date, amt_received, remarks)
              VALUES (?,         ?,        ?,         ?,        ?,            ?)'
    );
    $stmt->execute([
        $session->clientId,
        'Credit Card',
        $reference,
        $session->paidAt ?: date('Y-m-d H:i:s'),
        number_format((float) $session->amountCharged, 2, '.', ''),
        'Renewal (Stripe via renewal_v2)',
    ]);
    $clientPmtId = (int) $pdo->lastInsertId();
    $inserted    = true;

    // 5b. Mark the renewal session confirmed + completed
    $pdo->prepare(
        'UPDATE renewal_sessions
            SET admin_confirmed_at = NOW(),
                status             = ?,
                updated_at         = NOW()
          WHERE id = ?'
    )->execute([RenewalSession::STATUS_COMPLETED, $session->id]);

    // 5c. Mark the renewal token "applied" in sec_renewals (close out the
    //     specific token the customer used). Best-effort — missing row is
    //     not fatal because some old tokens may have been recycled.
    $pdo->prepare(
        'UPDATE sec_renewals
            SET applied = NOW()
          WHERE client_id = ? AND token = ?'
    )->execute([$session->clientId, $session->token]);

    $pdo->commit();

    // Refresh local object so terminal screen shows the new state
    $session = RenewalSession::loadByAdminToken($adminToken);
} catch (\Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    error_log(sprintf(
        '[renewal_v2] confirm-receipt FAILED for session %d (client %d): %s',
        $session->id,
        $session->clientId,
        $e->getMessage()
    ));
    pfm_admin_terminal(
        'Confirm Receipt — Database error',
        'danger',
        '<strong>Failed to write the payment row.</strong>'
      . '<p class="pfm-mt-0">The error has been logged. Please try once more; '
      . 'if it fails again, contact the dev team. No partial data has been '
      . 'written (transaction rolled back).</p>'
      . '<p class="pfm-mt-2" style="font-family:monospace;font-size:0.78rem;color:#6c757d;">'
      . htmlspecialchars($e->getMessage()) . '</p>'
    );
}

error_log(sprintf(
    '[renewal_v2] confirm-receipt OK: session=%d client=%d amount=%.2f stripe_pi=%s client_pmt_id=%d',
    $session->id,
    $session->clientId,
    (float) $session->amountCharged,
    (string) $session->paymentId,
    $clientPmtId
));

/* ─── 6. Success screen ────────────────────────────────────────────────── */
pfm_admin_header('Receipt confirmed — Renewal completed');
?>
<div class="pfm-card">
    <div class="pfm-alert pfm-alert--success">
        <strong>✓ Payment confirmed and applied.</strong>
        <p class="pfm-mt-0">
            <strong>$<?= number_format((float) $session->amountCharged, 2) ?></strong>
            has been written to <code>client_pmts</code> for client #<?= (int) $session->clientId ?>.
            The renewal is now <strong>completed</strong>.
        </p>
    </div>

    <div class="pfm-mt-2">
        <h3 class="pfm-card__subtitle">What just happened</h3>
        <ul style="padding-left:18px; line-height:1.7;">
            <li><code>client_pmts</code> row <strong>#<?= (int) $clientPmtId ?></strong> created (visible in existing PFM admin)</li>
            <li><code>renewal_sessions</code> #<?= (int) $session->id ?> status &rarr; <code>completed</code>, admin_confirmed_at set</li>
            <li><code>sec_renewals</code> token marked applied so it can't be reused</li>
        </ul>
    </div>

    <p class="pfm-text-center pfm-mt-2">
        <a class="pfm-btn pfm-btn--primary" href="/renewal_v2/admin/dashboard.php">
            Back to pending reviews
        </a>
    </p>
</div>
<?php
pfm_admin_footer();
