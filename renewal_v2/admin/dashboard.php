<?php
/**
 * Application Reviews — the staff dashboard.
 *
 * URL: /renewal_v2/admin/dashboard.php
 *
 * ONE queue for everything staff must decide on (Larissa, Section 2:
 * "staff will use the same review process for both"): paid renewals AND
 * paid new-customer applications, each row carrying a small type badge.
 * Renewals open admin/review.php, new applications open
 * admin/review-application.php — the review pages themselves are
 * unchanged in flow. Lists:
 *   - Pending reviews         (status awaiting_review, not yet decided)
 *   - Recently confirmed      (renewals confirmed / applications approved, 30 days)
 *   - Recently declined       (30 days) — Section 6
 *
 * Auth: unchanged from the renewal-only dashboard — PFM admin session, or
 * the shared-password fallback. Each review page is gated by its own
 * admin_review_token, so this only protects the listing page.
 *
 * Deploy-order safety: the new-application and declined queries are run
 * through pfm_dash_rows(), which returns [] (and logs) if a table/column
 * from migrations 018/020 isn't there yet, so deploying this file before
 * the migrations can never take the renewal review list down.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/_includes/admin_layout.php';

pfm_admin_session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/* ─── Auth: PFM-admin session OR shared-password fallback ──────────────
 *
 * B2-a per Larissa's 2026-06-17 approval: when staff are already
 * logged into the existing PFM admin (which sets ScriptCase session
 * keys under $_SESSION['scriptcase']['sc_apl_seg']), they shouldn't
 * have to type another password to reach the review listing.
 * The "Application Reviews" menu item under the Requests group opens
 * this page in a new tab — and from there staff click into a review
 * and the per-item admin_review_token in the URL takes over auth.
 *
 * The legacy password gate stays as a fallback for two cases:
 *   1. Direct URL access without a PFM admin login (e.g. dev
 *      walkthroughs, support sessions, link sharing during testing).
 *   2. Production fallback if the menu item is ever broken.
 *
 * Both paths end up setting the same $_SESSION[$DASHBOARD_AUTH_KEY]
 * flag so the rest of the page logic doesn't care which way the
 * user got in.
 */
$DASHBOARD_AUTH_KEY = 'pfm_admin_dashboard_authed';

// Auto-auth: any PFM admin session that has at least one ScriptCase
// app marked "on" (the legacy admin sets these the moment the user
// logs in to PFM admin's main menu). We don't whitelist specific
// apps because the review listing is appropriate for the same
// audience that can already see the Requests grid.
if (empty($_SESSION[$DASHBOARD_AUTH_KEY])
    && !empty($_SESSION['scriptcase']['sc_apl_seg'])
    && is_array($_SESSION['scriptcase']['sc_apl_seg'])
    && in_array('on', $_SESSION['scriptcase']['sc_apl_seg'], true)) {
    $_SESSION[$DASHBOARD_AUTH_KEY] = true;
    error_log(sprintf(
        '[renewal_v2] Dashboard auto-auth via PFM admin session (%d apps active).',
        count($_SESSION['scriptcase']['sc_apl_seg'])
    ));
}

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
    pfm_admin_header('Application Reviews — Sign in required');
    ?>
    <div class="pfm-card" style="max-width:480px; margin: 0 auto;">
        <h2 class="pfm-card__title pfm-mt-0">Staff sign-in</h2>
        <p class="pfm-text-muted pfm-mt-0">
            <strong>Easier path:</strong> open this page from the
            &ldquo;Application Reviews&rdquo; item in the PFM admin&rsquo;s
            Requests menu &mdash; if you&rsquo;re already signed in there,
            you&rsquo;ll be let through automatically.
        </p>
        <p class="pfm-text-muted pfm-mt-0">
            Otherwise, enter the shared admin password below to continue.
            (Individual review pages use their own per-item token,
            so this gate only protects the listing page.)
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

/** Run a query, returning [] (and logging) if it fails — see file header. */
function pfm_dash_rows(string $sql, array $params = []): array
{
    try {
        return Db::all($sql, $params);
    } catch (Throwable $e) {
        error_log('[renewal_v2] dashboard query skipped (migration not applied yet?): ' . $e->getMessage());
        return [];
    }
}

$APP_NAME  = "JSON_UNQUOTE(JSON_EXTRACT(draft_data, '\$.org.co_name'))";
$APP_CNAME = "JSON_UNQUOTE(JSON_EXTRACT(draft_data, '\$.contact.name'))";
$APP_CMAIL = "JSON_UNQUOTE(JSON_EXTRACT(draft_data, '\$.contact.email'))";

// ── Pending: paid, awaiting a decision ──
$pendingRenewals = Db::all(
    'SELECT rs.id, rs.client_id, rs.admin_review_token, rs.amount_charged, rs.paid_at,
            rs.admin_reviewed_at, c.co_name, c.MembershipID, c.main_contact_name, c.main_contact_email
       FROM renewal_sessions rs
       LEFT JOIN clients c ON c.client_id = rs.client_id
      WHERE rs.status = ?
        AND rs.admin_confirmed_at IS NULL
      ORDER BY rs.paid_at DESC, rs.id DESC
      LIMIT 200',
    [RenewalSession::STATUS_AWAITING_REVIEW]
);
$pendingApps = pfm_dash_rows(
    "SELECT id, admin_review_token, amount_charged, paid_at, admin_reviewed_at,
            {$APP_NAME} AS co_name, {$APP_CNAME} AS contact_name, {$APP_CMAIL} AS contact_email
       FROM new_applications
      WHERE status = 'awaiting_review'
      ORDER BY paid_at DESC, id DESC
      LIMIT 200"
);

$pending = [];
foreach ($pendingRenewals as $r) {
    $pending[] = [
        'type' => 'renewal', 'company' => (string) ($r['co_name'] ?? '(unknown)'),
        'sub' => 'Client #' . (int) $r['client_id']
               . (!empty($r['MembershipID']) ? ' · M#' . $r['MembershipID'] : '')
               . ' · Renewal #' . (int) $r['id'],
        'contact' => (string) ($r['main_contact_name'] ?? '—'), 'email' => (string) ($r['main_contact_email'] ?? ''),
        'amount' => $r['amount_charged'], 'paid_at' => $r['paid_at'], 'reviewed' => !empty($r['admin_reviewed_at']),
        'url' => '/renewal_v2/admin/review.php?token=' . rawurlencode((string) ($r['admin_review_token'] ?? '')),
    ];
}
foreach ($pendingApps as $a) {
    $pending[] = [
        'type' => 'application', 'company' => (string) ($a['co_name'] ?? '(unnamed)'),
        'sub' => 'Application APP-' . (int) $a['id'],
        'contact' => (string) ($a['contact_name'] ?? '—'), 'email' => (string) ($a['contact_email'] ?? ''),
        'amount' => $a['amount_charged'], 'paid_at' => $a['paid_at'], 'reviewed' => !empty($a['admin_reviewed_at']),
        'url' => '/renewal_v2/admin/review-application.php?token=' . rawurlencode((string) ($a['admin_review_token'] ?? '')),
    ];
}
usort($pending, static fn($x, $y) => strcmp((string) $y['paid_at'], (string) $x['paid_at']));

// ── Recently confirmed / approved (last 30 days) ──
$recentRenewals = Db::all(
    'SELECT rs.id, rs.client_id, rs.amount_charged, rs.admin_confirmed_at AS at, rs.payment_id,
            rs.admin_review_token, c.co_name
       FROM renewal_sessions rs
       LEFT JOIN clients c ON c.client_id = rs.client_id
      WHERE rs.admin_confirmed_at IS NOT NULL
        AND rs.admin_confirmed_at >= NOW() - INTERVAL 30 DAY
      ORDER BY rs.admin_confirmed_at DESC
      LIMIT 25'
);
$recentApps = pfm_dash_rows(
    "SELECT id, amount_charged, admin_confirmed_at AS at, payment_id, admin_review_token,
            created_client_id, membership_number, {$APP_NAME} AS co_name
       FROM new_applications
      WHERE status = 'completed' AND admin_confirmed_at >= NOW() - INTERVAL 30 DAY
      ORDER BY admin_confirmed_at DESC
      LIMIT 25"
);
$recent = [];
foreach ($recentRenewals as $r) {
    $recent[] = ['type' => 'renewal', 'company' => (string) ($r['co_name'] ?? '(unknown)'), 'sub' => '#' . (int) $r['client_id'],
        'amount' => $r['amount_charged'], 'at' => $r['at'], 'stripe' => (string) ($r['payment_id'] ?? '—'),
        'url' => !empty($r['admin_review_token']) ? '/renewal_v2/admin/review.php?token=' . rawurlencode((string) $r['admin_review_token']) : ''];
}
foreach ($recentApps as $a) {
    $recent[] = ['type' => 'application', 'company' => (string) ($a['co_name'] ?? '(unnamed)'),
        'sub' => 'New · M#' . (int) $a['membership_number'],
        'amount' => $a['amount_charged'], 'at' => $a['at'], 'stripe' => (string) ($a['payment_id'] ?? '—'),
        'url' => !empty($a['admin_review_token']) ? '/renewal_v2/admin/review-application.php?token=' . rawurlencode((string) $a['admin_review_token']) : ''];
}
usort($recent, static fn($x, $y) => strcmp((string) $y['at'], (string) $x['at']));
$recent = array_slice($recent, 0, 25);

// ── Recently declined (last 30 days) — Section 6 ──
$declRenewals = pfm_dash_rows(
    "SELECT rs.id, rs.client_id, rs.amount_charged, rs.declined_at AS at, rs.decline_reason, rs.declined_by,
            rs.admin_review_token, c.co_name
       FROM renewal_sessions rs
       LEFT JOIN clients c ON c.client_id = rs.client_id
      WHERE rs.status = 'declined' AND rs.declined_at >= NOW() - INTERVAL 30 DAY
      ORDER BY rs.declined_at DESC
      LIMIT 25"
);
$declApps = pfm_dash_rows(
    "SELECT id, amount_charged, declined_at AS at, decline_reason, declined_by, admin_review_token,
            {$APP_NAME} AS co_name
       FROM new_applications
      WHERE status = 'declined' AND declined_at >= NOW() - INTERVAL 30 DAY
      ORDER BY declined_at DESC
      LIMIT 25"
);
$declined = [];
foreach ($declRenewals as $r) {
    $declined[] = ['type' => 'renewal', 'company' => (string) ($r['co_name'] ?? '(unknown)'), 'sub' => '#' . (int) $r['client_id'],
        'amount' => $r['amount_charged'], 'at' => $r['at'], 'reason' => (string) ($r['decline_reason'] ?? ''), 'by' => (string) ($r['declined_by'] ?? ''),
        'url' => !empty($r['admin_review_token']) ? '/renewal_v2/admin/review.php?token=' . rawurlencode((string) $r['admin_review_token']) : ''];
}
foreach ($declApps as $a) {
    $declined[] = ['type' => 'application', 'company' => (string) ($a['co_name'] ?? '(unnamed)'), 'sub' => 'APP-' . (int) $a['id'],
        'amount' => $a['amount_charged'], 'at' => $a['at'], 'reason' => (string) ($a['decline_reason'] ?? ''), 'by' => (string) ($a['declined_by'] ?? ''),
        'url' => !empty($a['admin_review_token']) ? '/renewal_v2/admin/review-application.php?token=' . rawurlencode((string) $a['admin_review_token']) : ''];
}
usort($declined, static fn($x, $y) => strcmp((string) $y['at'], (string) $x['at']));
$declined = array_slice($declined, 0, 25);

$typeBadge = static function (string $type): string {
    return $type === 'application'
        ? '<span style="display:inline-block;padding:2px 8px;border-radius:10px;font-size:0.7rem;font-weight:700;background:#d2f4e8;color:#0a8964;">NEW APPLICATION</span>'
        : '<span style="display:inline-block;padding:2px 8px;border-radius:10px;font-size:0.7rem;font-weight:700;background:#e3e6f0;color:#313a46;">RENEWAL</span>';
};
$money = static fn($v): string => $v !== null && $v !== '' ? '$' . number_format((float) $v, 2) : '—';
$when  = static fn($v): string => !empty($v) ? date('M j, Y g:ia', strtotime((string) $v)) : '—';

pfm_admin_header(
    'Application Reviews',
    'Renewals and new applications awaiting your decision'
);
?>

<div class="pfm-card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2 class="pfm-card__title pfm-mt-0">
            Pending reviews
            <span class="pfm-text-muted" style="font-size:1rem; font-weight: 400;">
                (<?= count($pending) ?>)
            </span>
        </h2>
        <a href="/renewal_v2/admin/dashboard.php?logout=1"
           class="pfm-btn" style="font-size:0.85rem;">Sign out</a>
    </div>

    <p class="pfm-text-muted pfm-mt-0">
        These customers and applicants have paid via Stripe and are waiting for a decision.
        Click any row to open its review page, then approve (or confirm receipt for a renewal) or decline.
    </p>

    <?php if (empty($pending)): ?>
        <p class="pfm-text-muted pfm-mt-2">
            <em>No pending reviews. Everything paid has been decided.</em>
        </p>
    <?php else: ?>
        <table style="width:100%; border-collapse: collapse; margin-top: 16px;">
            <thead>
                <tr style="background:#fafbfe; border-bottom: 2px solid #eef2f7;">
                    <th style="text-align:left; padding:10px;">Type</th>
                    <th style="text-align:left; padding:10px;">Company</th>
                    <th style="text-align:left; padding:10px;">Main contact</th>
                    <th style="text-align:right; padding:10px;">Amount</th>
                    <th style="text-align:left; padding:10px;">Paid at</th>
                    <th style="text-align:left; padding:10px;">Reviewed</th>
                    <th style="text-align:right; padding:10px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pending as $row): ?>
                <tr style="border-bottom: 1px solid #eef2f7;">
                    <td style="padding:10px;"><?= $typeBadge($row['type']) ?></td>
                    <td style="padding:10px;">
                        <strong><?= htmlspecialchars($row['company']) ?></strong>
                        <div class="pfm-text-muted" style="font-size:0.82rem;"><?= htmlspecialchars($row['sub']) ?></div>
                    </td>
                    <td style="padding:10px;">
                        <?= htmlspecialchars($row['contact']) ?>
                        <div class="pfm-text-muted" style="font-size:0.82rem;"><?= htmlspecialchars($row['email']) ?></div>
                    </td>
                    <td style="padding:10px; text-align:right; font-weight:600;"><?= htmlspecialchars($money($row['amount'])) ?></td>
                    <td style="padding:10px; font-size:0.88rem;"><?= htmlspecialchars($when($row['paid_at'])) ?></td>
                    <td style="padding:10px; font-size:0.88rem;">
                        <?php if ($row['reviewed']): ?>
                            <span style="color:#0acf97;">✓ opened</span>
                        <?php else: ?>
                            <span class="pfm-text-muted">not yet</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding:10px; text-align:right;">
                        <a class="pfm-btn pfm-btn--primary" style="font-size:0.85rem; padding: 5px 12px;"
                           href="<?= htmlspecialchars($row['url']) ?>">Open review</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- ── Recently confirmed / approved (audit / informational) ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">
        Recently confirmed
        <span class="pfm-text-muted" style="font-size:1rem; font-weight: 400;">
            (last 30 days, <?= count($recent) ?>)
        </span>
    </h2>
    <p class="pfm-text-muted pfm-mt-0">
        Renewals whose receipt was confirmed and new applications that were approved. Listed for audit
        only &mdash; these payments are now visible in the existing PFM admin.
    </p>

    <?php if (empty($recent)): ?>
        <p class="pfm-text-muted pfm-mt-2"><em>Nothing confirmed or approved in the last 30 days.</em></p>
    <?php else: ?>
        <table style="width:100%; border-collapse: collapse; margin-top: 12px;">
            <thead>
                <tr style="background:#fafbfe; border-bottom: 2px solid #eef2f7;">
                    <th style="text-align:left; padding:8px;">Type</th>
                    <th style="text-align:left; padding:8px;">Company</th>
                    <th style="text-align:right; padding:8px;">Amount</th>
                    <th style="text-align:left; padding:8px;">Confirmed at</th>
                    <th style="text-align:left; padding:8px;">Stripe ID</th>
                    <th style="text-align:right; padding:8px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($recent as $row): ?>
                <tr style="border-bottom: 1px solid #eef2f7; font-size:0.88rem;">
                    <td style="padding:8px;"><?= $typeBadge($row['type']) ?></td>
                    <td style="padding:8px;">
                        <?= htmlspecialchars($row['company']) ?>
                        <span class="pfm-text-muted">(<?= htmlspecialchars($row['sub']) ?>)</span>
                    </td>
                    <td style="padding:8px; text-align:right;"><?= htmlspecialchars($money($row['amount'])) ?></td>
                    <td style="padding:8px;"><?= htmlspecialchars($when($row['at'])) ?></td>
                    <td style="padding:8px; font-family:monospace; font-size:0.78rem;"><?= htmlspecialchars($row['stripe']) ?></td>
                    <td style="padding:8px; text-align:right;">
                        <?php if ($row['url'] !== ''): ?>
                            <a class="pfm-btn" style="font-size:0.8rem; padding: 4px 10px;" href="<?= htmlspecialchars($row['url']) ?>">View</a>
                        <?php else: ?>
                            <span class="pfm-text-muted" style="font-size:0.78rem;">—</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- ── Recently declined (Section 6) ── -->
<div class="pfm-card pfm-mt-2">
    <h2 class="pfm-card__title pfm-mt-0">
        Recently declined
        <span class="pfm-text-muted" style="font-size:1rem; font-weight: 400;">
            (last 30 days, <?= count($declined) ?>)
        </span>
    </h2>
    <p class="pfm-text-muted pfm-mt-0">
        Declined renewals and applications. They are kept on record (not deleted) with the reason;
        refunds are handled manually in Stripe.
    </p>

    <?php if (empty($declined)): ?>
        <p class="pfm-text-muted pfm-mt-2"><em>Nothing declined in the last 30 days.</em></p>
    <?php else: ?>
        <table style="width:100%; border-collapse: collapse; margin-top: 12px;">
            <thead>
                <tr style="background:#fafbfe; border-bottom: 2px solid #eef2f7;">
                    <th style="text-align:left; padding:8px;">Type</th>
                    <th style="text-align:left; padding:8px;">Company</th>
                    <th style="text-align:right; padding:8px;">Amount</th>
                    <th style="text-align:left; padding:8px;">Declined at</th>
                    <th style="text-align:left; padding:8px;">Reason</th>
                    <th style="text-align:right; padding:8px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($declined as $row): ?>
                <tr style="border-bottom: 1px solid #eef2f7; font-size:0.88rem;">
                    <td style="padding:8px;"><?= $typeBadge($row['type']) ?></td>
                    <td style="padding:8px;">
                        <?= htmlspecialchars($row['company']) ?>
                        <span class="pfm-text-muted">(<?= htmlspecialchars($row['sub']) ?>)</span>
                    </td>
                    <td style="padding:8px; text-align:right;"><?= htmlspecialchars($money($row['amount'])) ?></td>
                    <td style="padding:8px;">
                        <?= htmlspecialchars($when($row['at'])) ?>
                        <div class="pfm-text-muted" style="font-size:0.78rem;">by <?= htmlspecialchars($row['by']) ?></div>
                    </td>
                    <td style="padding:8px; max-width:280px;"><?= htmlspecialchars(mb_strimwidth($row['reason'], 0, 140, '…')) ?></td>
                    <td style="padding:8px; text-align:right;">
                        <?php if ($row['url'] !== ''): ?>
                            <a class="pfm-btn" style="font-size:0.8rem; padding: 4px 10px;" href="<?= htmlspecialchars($row['url']) ?>">View</a>
                        <?php else: ?>
                            <span class="pfm-text-muted" style="font-size:0.78rem;">—</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
pfm_admin_footer();
