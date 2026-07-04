<?php
/**
 * Shared layout helpers for the renewal_v2 admin pages.
 *
 * Two functions:
 *   pfm_admin_header($title, $subtitle = null)
 *   pfm_admin_footer()
 *
 * Reuses the same wizard.css so colours/typography match the customer
 * wizard. We deliberately do NOT include progress-bar / per-step chrome —
 * admin pages are standalone.
 *
 * Spec ref: larissa_rebuild.md → "Phase 4 — admin pages live under
 *   /renewal_v2/admin/. They must NOT touch existing ScriptCase admin."
 */

declare(strict_types=1);

/**
 * Start a PHP session that shares cleanly with the existing PFM admin
 * (ScriptCase) session, instead of bare session_start() with whatever
 * php.ini happens to default to. Called by every renewal_v2/admin/*.php
 * page (review, dashboard, confirm-receipt).
 *
 * Why this exists: Larissa's 2026-06-22 Round 3 QA reported "After
 * completing or viewing the renewal review, I clicked into Memberships
 * and received a message that said I needed to be logged in" — an
 * intermittent ScriptCase auth-loss that pointed at session-handling
 * collisions. PHP's ini defaults set save_path to /var/lib/php/sessions
 * and cookie_path to /, which matches ScriptCase by coincidence, but
 * any future ini change OR a fresh PHP-FPM pool would silently break
 * the inheritance. We pin the values explicitly here.
 *
 * Two extra hardenings:
 *   - explicit cookie_lifetime = 0 so the PHPSESSID cookie is a true
 *     browser-session cookie and ScriptCase's own expiry rules stay
 *     authoritative (PHP's default lifetime from ini is sometimes a
 *     long number that would survive a browser close and confuse the
 *     legacy app).
 *   - session_write_close() should be called by the page as soon as
 *     it's done mutating $_SESSION, so the per-session file lock
 *     releases before any slow rendering / Stripe API call — without
 *     that, a second admin tab on the same browser blocks for the
 *     duration of the first tab's request and looks like a hang.
 *
 * Idempotent — if a session is already active, we leave it alone
 * (this handles the rare PHP_SAPI = cli-server path under
 * development).
 */
if (!function_exists('pfm_admin_session_start')) {

    function pfm_admin_session_start(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        // Explicit handle to /var/lib/php/sessions matches ScriptCase's
        // own save_path (PHP-FPM pool default on this host). If a
        // future ops change moves ScriptCase elsewhere, update both at
        // the same time.
        $savePath = '/var/lib/php/sessions';
        if (is_dir($savePath) && is_writable($savePath)) {
            session_save_path($savePath);
        }

        session_name('PHPSESSID');
        session_set_cookie_params([
            'lifetime' => 0,
            'path'     => '/',
            'secure'   => !empty($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        session_start();

        // Keep the session file fresh on every /renewal_v2/admin/* hit.
        // PHP's default session GC (gc_maxlifetime = 1440s = 24 min)
        // will delete the session file if it hasn't been written to in
        // that window — and PHP only rewrites the file if $_SESSION
        // was mutated during the request. Larissa's 2026-06-30 Round 4
        // QA reported that after clicking Confirm Receipt and staying
        // on the pending-review screen for a while, clicking back into
        // the main PFM admin asked her to log in again. The most
        // likely shape of that failure is the session file getting
        // GC'd between two of our admin pages that didn't happen to
        // mutate $_SESSION (only read csrf_token and scriptcase auth
        // flags), leaving PHP with no session record to load next
        // request. Stamping pfm_admin_last_seen on every entry
        // guarantees a write on session_write_close, which resets the
        // file's mtime and puts the GC clock back to zero.
        //
        // Value is time() but any changing scalar would do — the goal
        // is only to trip PHP's "session was mutated" flag. Logged for
        // one-line traceability if Larissa reports the logout again.
        $_SESSION['pfm_admin_last_seen'] = time();

        // Defensive log: if the login pieces ScriptCase relies on ever
        // go missing between our page loads (usr_login at top level,
        // or the scriptcase array itself), we want to know. Costs one
        // error_log line per admin request, which is cheap and gives
        // us a breadcrumb next time the "please log in" ghost shows up.
        if (empty($_SESSION['usr_login']) && empty($_SESSION['scriptcase'])) {
            error_log(sprintf(
                '[renewal_v2] admin session_start ran with NO ScriptCase '
                . 'auth keys — session id %s from %s.',
                session_id(),
                (string) ($_SERVER['REMOTE_ADDR'] ?? 'unknown')
            ));
        }
    }
}

if (!function_exists('pfm_admin_header')) {

    function pfm_admin_header(string $title, ?string $subtitle = null): void
    {
        $envBadge = (defined('PFM_RNW_ENVIRONMENT') && PFM_RNW_ENVIRONMENT === 'staging')
            ? '<span class="pfm-env-badge">STAGING</span>'
            : '';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="same-origin">
    <meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES) ?>">
    <title><?= htmlspecialchars($title) ?> &middot; PFM Renewal Admin</title>
    <link rel="icon" href="/renewal_v2/public/assets/img/pfm_logo_small.png" type="image/png">
    <link rel="stylesheet" href="/renewal_v2/public/assets/css/wizard.css">
    <style>
        /* Admin-specific tweaks layered on top of wizard.css */
        .pfm-env-badge {
            display: inline-block;
            background: #fa5c7c;
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 8px;
            vertical-align: middle;
            letter-spacing: 0.05em;
        }
        .pfm-admin-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .pfm-admin-grid { grid-template-columns: 1fr; }
        }
        .pfm-data-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px solid #eef2f7;
            font-size: 0.92rem;
        }
        .pfm-data-row:last-child { border-bottom: none; }
        .pfm-data-row .label { color: #6c757d; }
        .pfm-data-row .value { color: #313a46; font-weight: 600; text-align: right; word-break: break-all; }
        .pfm-changes-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .pfm-changes-list li {
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 6px;
            font-size: 0.92rem;
            border-left: 3px solid #727cf5;
            background: #fafbfe;
        }
        .pfm-changes-list li.added    { border-left-color: #0acf97; }
        .pfm-changes-list li.removed  { border-left-color: #fa5c7c; }
        .pfm-changes-list li.modified { border-left-color: #ffbc00; }
        .pfm-changes-list .change-type {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 2px 8px;
            border-radius: 3px;
            margin-right: 8px;
            background: #e3e6f0;
            color: #313a46;
        }
        .pfm-changes-list li.added    .change-type { background: #d2f4e8; color: #0a8964; }
        .pfm-changes-list li.removed  .change-type { background: #ffe3e8; color: #b13b58; }
        .pfm-changes-list li.modified .change-type { background: #fff2cd; color: #8a6500; }
    </style>
</head>
<body>
<div class="pfm-shell">

    <header class="pfm-header" role="banner">
        <div class="pfm-container">
            <img src="/renewal_v2/public/assets/img/pfm_logo_small.png"
                 alt="Portland Flower Market"
                 class="pfm-header__logo">
            <div>
                <h1 class="pfm-header__title">PFM Renewal Admin <?= $envBadge ?></h1>
                <div class="pfm-header__subtitle">
                    <?= htmlspecialchars($subtitle ?? 'Internal review &amp; payment confirmation') ?>
                </div>
            </div>
        </div>
    </header>

    <main class="pfm-main" role="main">
        <div class="pfm-container">
        <?php
    }

    function pfm_admin_footer(): void
    {
        ?>
        </div>
    </main>

    <footer class="pfm-footer" role="contentinfo">
        <div class="pfm-container">
            <small class="pfm-text-muted">
                &copy; <?= date('Y') ?> Portland Flower Market &middot;
                Renewal Admin (renewal_v2) &middot;
                <?= defined('PFM_RNW_ENVIRONMENT') ? htmlspecialchars(PFM_RNW_ENVIRONMENT) : 'unknown' ?> environment
            </small>
        </div>
    </footer>

</div>
</body>
</html>
        <?php
    }
}
