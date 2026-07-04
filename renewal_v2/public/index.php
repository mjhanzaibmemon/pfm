<?php
/**
 * PFM Renewal v2 — Entry Point
 *
 * Customer lands here from their renewal email link:
 *   https://pfm-app.com/renewal_v2/public/index.php?token=XXXX
 *
 * Actions:
 *  1. Validate token
 *  2. Load or create renewal session
 *  3. Store token in PHP session
 *  4. Redirect to the customer's current step (or Step 1 for new sessions)
 *
 * If already paid → redirect to confirmation page.
 * If session cancelled → show expired/cancelled message.
 */

declare(strict_types=1);

define('RNW_ROOT', dirname(__DIR__));

require_once RNW_ROOT . '/lib/RenewalSession.php';
require_once RNW_ROOT . '/config/config.php';

// ── Session setup ────────────────────────────────────────────────────
//
// Unique session_name() so the wizard's cookie can't collide with the
// existing PFM admin's PHPSESSID (legacy ScriptCase sets that one with
// path=/). Same rationale as step_bootstrap.php / api_bootstrap.php —
// without this, staff who use both the wizard and /renewal_v2/admin/
// see "bar bar logout" on the admin pages (2026-06-19 report).
$sessionSavePath = RNW_ROOT . '/storage/sessions';
if (is_dir($sessionSavePath)) {
    session_save_path($sessionSavePath);
}
session_name('PFMRNW_WIZ');
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/renewal_v2/',
    'secure'   => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

// ── Token resolution ─────────────────────────────────────────────────
// Priority: URL param (fresh email link) > existing PHP session
$urlToken     = trim((string) ($_GET['token'] ?? ''));
$sessionToken = (string) ($_SESSION['renewal_token'] ?? '');
$token        = $urlToken !== '' ? $urlToken : $sessionToken;

if ($token === '') {
    showError('No renewal link found. Please use the link from your renewal email.');
}

// ── Stale-link check (before loadOrCreate) ──────────────────────────
// Larissa's 2026-06-30 Round 4 QA raised the question of what happens
// when a customer clicks an OLD email link after staff have started a
// new renewal cycle for the same customer. Every "Email" click on the
// legacy Renewals grid stamps a fresh sec_renewals row (new token, new
// 30-day expiry) — so the moment staff generate a new link, the old
// token becomes stale even if it hasn't hit its own token_exp yet.
//
// Detect that shape here and route the customer to a friendly
// "please use your latest email link" page instead of dumping them
// back on the old completed session's Thank You page. If the token
// has been applied but no newer token exists (the classic bookmark-
// after-paying case), we fall through so the customer still sees
// their completion — that's the intent of 9d62f9c and stays as-is.
$stalenessProbe = Db::one(
    'SELECT client_id, applied FROM sec_renewals
      WHERE token = ? ORDER BY token_created DESC LIMIT 1',
    [$token]
);
if ($stalenessProbe !== null && $stalenessProbe['applied'] !== null) {
    $newerActive = Db::one(
        "SELECT sec_renew_id
           FROM sec_renewals
          WHERE client_id  = ?
            AND token     != ?
            AND applied IS NULL
            AND token_exp > NOW()
          ORDER BY token_created DESC
          LIMIT 1",
        [(int) $stalenessProbe['client_id'], $token]
    );
    if ($newerActive !== null) {
        unset($_SESSION['renewal_token']);
        showError(
            'This renewal link has already been used.',
            'A newer renewal email has been sent to you. Please check '
            . 'your inbox for the most recent renewal link, or contact '
            . '<a href="mailto:' . PFM_RNW_SUPPORT_EMAIL . '">'
            . PFM_RNW_SUPPORT_EMAIL . '</a> if you can no longer find it.'
        );
    }
}

// ── Load / create session ────────────────────────────────────────────
$renewalSession = RenewalSession::loadOrCreate($token);

if ($renewalSession === null) {
    // Token invalid or expired
    unset($_SESSION['renewal_token']);
    showError(
        'Your renewal link has expired or is invalid.',
        'Renewal links are valid for 30 days. Please contact '
        . '<a href="mailto:' . PFM_RNW_SUPPORT_EMAIL . '">' . PFM_RNW_SUPPORT_EMAIL . '</a>'
        . ' to receive a new link.'
    );
}

// Store token in PHP session
$_SESSION['renewal_token'] = $renewalSession->token;

// Generate CSRF token if not already set — used by the wizard step pages.
// Frontend reads it via $_SESSION['csrf_token'] and includes it in API calls.
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ── Route based on current state ─────────────────────────────────────
// stepUrl() returns a URL path like
// '/renewal_v2/public/steps/1-welcome.php?token=...'
// The token is appended to every step URL so the wizard is self-contained
// in the address bar (security — see step_bootstrap.php for the rationale).

$customerToken = $renewalSession->token;

switch ($renewalSession->status) {
    case RenewalSession::STATUS_DRAFT:
        // Resume at the furthest step reached (or step 1 for new sessions).
        // Cap at 6 (Review) — payment/confirmation are post-submit states.
        $step = max(1, min(6, $renewalSession->currentStep));
        header('Location: ' . stepUrl($step, $customerToken));
        exit;

    case RenewalSession::STATUS_SUBMITTED:
    case RenewalSession::STATUS_AWAITING_PAYMENT:
        // Submitted but not yet paid — send to payment step
        header('Location: ' . stepUrl(7, $customerToken));
        exit;

    case RenewalSession::STATUS_AWAITING_REVIEW:
    case RenewalSession::STATUS_COMPLETED:
        // Paid — send to confirmation page
        header('Location: ' . stepUrl(8, $customerToken));
        exit;

    case RenewalSession::STATUS_CANCELLED:
        showError(
            'This renewal has been cancelled.',
            'Please contact <a href="mailto:' . PFM_RNW_SUPPORT_EMAIL . '">'
            . PFM_RNW_SUPPORT_EMAIL . '</a> if you believe this is an error.'
        );
        // showError() exits — never falls through

    default:
        showError('Unknown renewal status. Please contact ' . PFM_RNW_SUPPORT_EMAIL . '.');
}

// ── Helpers ──────────────────────────────────────────────────────────

function stepUrl(int $step, string $token = ''): string
{
    $url = '/renewal_v2/public/steps/' . $step . '-' . stepSlug($step) . '.php';
    if ($token !== '') {
        $url .= '?token=' . rawurlencode($token);
    }
    return $url;
}

function stepSlug(int $step): string
{
    $slugs = [
        1 => 'welcome',
        2 => 'organization',
        3 => 'main-contact',
        4 => 'buyers',
        5 => 'documents',
        6 => 'review',
        7 => 'payment',
        8 => 'confirmation',
    ];
    return $slugs[$step] ?? 'welcome';
}

function showError(string $heading, string $detail = ''): never
{
    http_response_code(400);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renewal — Portland Flower Market</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 80px auto; padding: 0 20px; color: #333; }
        h1   { color: #c0392b; font-size: 1.4em; }
        p    { line-height: 1.6; }
        a    { color: #2980b9; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($heading) ?></h1>
    <?php if ($detail !== ''): ?>
    <p><?= $detail /* trusted HTML — no escaping */ ?></p>
    <?php endif; ?>
</body>
</html>
    <?php
    exit;
}
