<?php
/**
 * /blank_renewal_link/index.php  — CUTOVER REDIRECT (Phase 7 prep)
 *
 * This used to be a ScriptCase-generated entry page (~3,300 lines) that
 * loaded the legacy renewal form for customers arriving from their
 * renewal email. The legacy form is being replaced by the new wizard at
 * `/renewal_v2/`, so this file is now a thin redirect.
 *
 * Existing PFM renewal emails point to /blank_renewal_link/?token=...
 * Rather than reissuing every email link or rewriting the email-send
 * code, we redirect every hit on this path into the new wizard.
 *
 * The ScriptCase admin code that *generates* the link
 * (grid_vw_clients_main_member_renew/) is untouched — it still produces
 * ?token=XXX URLs as before. Customers transparently land in the new flow.
 *
 * Rollback: copy the .bak_YYYYMMDD_HHMMSS file back over index.php and
 *           the legacy flow returns immediately.
 */
declare(strict_types=1);

$token = isset($_GET['token']) ? trim((string) $_GET['token']) : '';

$dest = '/renewal_v2/public/index.php';
if ($token !== '') {
    $dest .= '?token=' . rawurlencode($token);
}

// Light audit trail. Never fatal.
@error_log(sprintf(
    '[blank_renewal_link redirect] %s  token=%s  ua=%s  ip=%s',
    date('Y-m-d H:i:s'),
    $token !== '' ? substr($token, 0, 12) . '...' : '(none)',
    $_SERVER['HTTP_USER_AGENT'] ?? '?',
    $_SERVER['REMOTE_ADDR']     ?? '?'
));

header('Location: ' . $dest, true, 302);
exit;
