<?php
/**
 * Phase 4 — Pending Reviews Dashboard.
 *
 * URL: /renewal_v2/admin/dashboard.php
 *
 * Backup discovery page so staff can find a pending review even if they
 * lose the staff notification email. Lists all renewal_sessions whose
 * status = 'awaiting_review' AND admin_confirmed_at IS NULL, plus a
 * separate section for recently confirmed renewals (last 30 days).
 *
 * Auth: simple shared password (PFM_RNW_ADMIN_DASHBOARD_PASSWORD config).
 *       Each individual review page is gated by its own admin_review_token,
 *       so this password protects ONLY the listing page.
 *
 * Spec ref: larissa_rebuild.md → "Phase 4 — dashboard.php (pending review
 *   list, backup discovery)."
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/_includes/admin_layout.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/* ─── Auth: shared-password gate ─────────────────────────────────────── */
$DASHBOARD_AUTH_KEY = 'pfm_admin_dashboard_authed';

// Handle logout
if (isset($_GET['logout'])) {
    unset($_SESSION[$DASHBOARD_AUTH_KEY]);
    header('Location: /renewal_v2/admin/dashboard.php');
    exit;
}

// Handle login attempt
$loginError = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['admin_password'])) {
    // CSRF check on login form
    $postedCsrf = (string) ($_POST['csrf_token'] ?? '');
    if (!hash_equals((string) $_SESSION['csrf_token'], $postedCsrf)) {
        $loginError = 'Session expired. Please try again.';
    } else {
        $providedPassword = (string) $_POST['admin_password'];
        $expectedPassword = defined('PFM_RNW_ADMIN_DASHBOARD_PASSWORD')
            ? (string) PFM_RNW_ADMIN_DASHBOARD_PASSWORD
            : '';

        if ($expectedPassword !== '' && hash_equals($expectedPassword, $providedPassword)) {
            $_SESSION[$DASHBOARD_AUTH_KEY] = true;
            // Rotate CSRF token after successful login
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            header('Location: /renewal_v2/admin/dashboard.php');
            exit;
        }
        $loginError = 'Incorrect password.';
        // Small delay to slow brute-force attempts
        sleep(1);
    }
}

// Render login form if not authed
if (empty($_SESSION[$DASHBOARD_AUTH_KEY])) {
    pfm_admin_header('Dashboard — Sign in required');
    ?>
    <div class="pfm-card" style="max-width:480px; margin: 0 auto;">
        <h2 class="pfm-card__title pfm-mt-0">Staff sign-in</h2>
        <p class="pfm-text-muted pfm-mt-0">
            This is the pending-reviews dashboard. Enter the shared admin
            password to continue. (Individual review pages use their own
            per-renewal token from the email link — this gate only protects
            the listing.)
        </p>

        <?php if ($loginError !== null): ?>
            <div class="pfm-alert pfm-alert--danger pfm-mt-2">
                <?= htmlspecialchars($loginError) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="pfm-mt-2" autocomplete="off">
            <input type="hidden" name="csrf_token"
                   value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <label class="pfm-label" for="admin_password">Password</label>
            <input type="password" name="admin_password" id="admin_password"
                   class="pfm-input" required autofocus>
            <button type="submit" class="pfm-btn pfm-btn--primary pfm-mt-2"
                    style="width: 100%;">
                Sign in
            </button>
        </form>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

/* ─── Authed — load the data ─────────────────────────────────────────── */

// Pending: paid + awaiting_review + not confirmed
$pendingRows = Db::all(
    'SELECT rs.id, rs.client_id, rs.token, rs.admin_review_token, rs.status,
            rs.amount_charged, rs.payment_id, rs.paid_at,
            rs.admin_reviewed_at, rs.admin_confirmed_at, rs.created_at,
            c.co_name, c.MembershipID, c.main_contact_name, c.main_contact_email
       FROM renewal_sessions rs
       LEFT JOIN clients c ON c.client_id = rs.client_id
      WHERE rs.status = ?
        AND rs.admin_confirmed_at IS NULL
      ORDER BY rs.paid_at DESC, rs.id DESC
      LIMIT 200',
    [RenewalSession::STATUS_AWAITING_REVIEW]
);

// Recently confirmed (last 30 days) — purely informational
$recentRows = Db::all(
    'SELECT rs.id, rs.client_id, rs.amount_charged, rs.paid_at,
            rs.admin_confirmed_at, rs.payment_id,
            c.co_name, c.MembershipID
       FROM renewal_sessions rs
       LEFT JOIN clients c ON c.client_id = rs.client_id
      WHERE rs.admin_confirmed_at IS NOT NULL
        AND rs.admin_confirmed_at >= NOW() - INTERVAL 30 DAY
      ORDER BY rs.admin_confirmed_at DESC
      LIMIT 25'
);

pfm_admin_header(
    'Pending Reviews Dashboard',
    'Renewals awaiting your "Confirm Receipt" click'
);
?>

<div class="pfm-card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2 class="pfm-card__title pfm-mt-0">
            Pending reviews
            <span class="pfm-text-muted" style="font-size:1rem; font-weight: 400;">
                (<?= count($pendingRows) ?>)
            </span>
        </h2>
        <a href="/renewal_v2/admin/dashboard.php?logout=1"
           class="pfm-btn" style="font-size:0.85rem;">Sign out</a>
    </div>

    <p class="pfm-text-muted pfm-mt-0">
        These customers have paid via Stripe but their payment has not yet
        been written to <code>client_pmts</code>. Click any row to open its
        review page and confirm receipt.
    </p>

    <?php if (empty($pendingRows)): ?>
        <p class="pfm-text-muted pfm-mt-2">
            <em>No pending reviews. All paid renewals have been confirmed.</em>
        </p>
    <?php else: ?>
        <table style="width:100%; border-collapse: collapse; margin-top: 16px;">
            <thead>
                <tr style="background:#fafbfe; border-bottom: 2px solid #eef2f7;">
                    <th style="text-align:left; padding:10px;">Company</th>
                    <th style="text-align:left; padding:10px;">Main contact</th>
                    <th style="text-align:right; padding:10px;">Amount</th>
                    <th style="text-align:left; padding:10px;">Paid at</th>
                    <th style="text-align:left; padding:10px;">Reviewed</th>
                    <th style="text-align:right; padding:10px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pendingRows as $row): ?>
                <tr style="border-bottom: 1px solid #eef2f7;">
                    <td style="padding:10px;">
                        <strong><?= htmlspecialchars((string) ($row['co_name'] ?? '(unknown)')) ?></strong>
                        <div class="pfm-text-muted" style="font-size:0.82rem;">
                            Client #<?= (int) $row['client_id'] ?>
                            <?php if (!empty($row['MembershipID'])): ?>
                                &middot; M#<?= htmlspecialchars((string) $row['MembershipID']) ?>
                            <?php endif; ?>
                            &middot; Session #<?= (int) $row['id'] ?>
                        </div>
                    </td>
                    <td style="padding:10px;">
                        <?= htmlspecialchars((string) ($row['main_contact_name'] ?? '—')) ?>
                        <div class="pfm-text-muted" style="font-size:0.82rem;">
                            <?= htmlspecialchars((string) ($row['main_contact_email'] ?? '')) ?>
                        </div>
                    </td>
                    <td style="padding:10px; text-align:right; font-weight:600;">
                        <?= isset($row['amount_charged']) && $row['amount_charged'] !== null
                            ? '$' . number_format((float) $row['amount_charged'], 2)
                            : '—' ?>
                    </td>
                    <td style="padding:10px; font-size:0.88rem;">
                        <?= !empty($row['paid_at'])
                            ? htmlspecialchars(date('M j, Y g:ia', strtotime((string) $row['paid_at'])))
                            : '—' ?>
                    </td>
                    <td style="padding:10px; font-size:0.88rem;">
                        <?php if (!empty($row['admin_reviewed_at'])): ?>
                            <span style="color:#0acf97;">✓ opened</span>
                        <?php else: ?>
                            <span class="pfm-text-muted">not yet</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding:10px; text-align:right;">
                        <a class="pfm-btn pfm-btn--primary" style="font-size:0.85rem; padding: 5px 12px;"
                           href="/renewal_v2/admin/review.php?token=<?= htmlspecialchars((string) ($row['admin_review_token'] ?? '')) ?>">
                            Open review
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- ── Recent confirmations (audit / informational) ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">
        Recently confirmed
        <span class="pfm-text-muted" style="font-size:1rem; font-weight: 400;">
            (last 30 days, <?= count($recentRows) ?>)
        </span>
    </h2>
    <p class="pfm-text-muted pfm-mt-0">
        Renewals where receipt has already been confirmed. Listed for audit
        only — these payments are now visible in the existing PFM admin.
    </p>

    <?php if (empty($recentRows)): ?>
        <p class="pfm-text-muted pfm-mt-2"><em>No renewals confirmed in the last 30 days.</em></p>
    <?php else: ?>
        <table style="width:100%; border-collapse: collapse; margin-top: 12px;">
            <thead>
                <tr style="background:#fafbfe; border-bottom: 2px solid #eef2f7;">
                    <th style="text-align:left; padding:8px;">Company</th>
                    <th style="text-align:right; padding:8px;">Amount</th>
                    <th style="text-align:left; padding:8px;">Confirmed at</th>
                    <th style="text-align:left; padding:8px;">Stripe ID</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($recentRows as $row): ?>
                <tr style="border-bottom: 1px solid #eef2f7; font-size:0.88rem;">
                    <td style="padding:8px;">
                        <?= htmlspecialchars((string) ($row['co_name'] ?? '(unknown)')) ?>
                        <span class="pfm-text-muted">
                            (#<?= (int) $row['client_id'] ?>)
                        </span>
                    </td>
                    <td style="padding:8px; text-align:right;">
                        $<?= number_format((float) ($row['amount_charged'] ?? 0), 2) ?>
                    </td>
                    <td style="padding:8px;">
                        <?= htmlspecialchars(date('M j, Y g:ia', strtotime((string) $row['admin_confirmed_at']))) ?>
                    </td>
                    <td style="padding:8px; font-family:monospace; font-size:0.78rem;">
                        <?= htmlspecialchars((string) ($row['payment_id'] ?? '—')) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
pfm_admin_footer();
