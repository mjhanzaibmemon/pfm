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
// A renewal link is stale the moment a strictly-NEWER unused-and-still-
// -valid link exists for the same client. Two paths lead here:
//
//   1. Bug 5 (Larissa's 2026-06-30 Round 4 QA) — customer clicks their
//      OLD email link after having already paid, and staff have since
//      sent a new email for a new renewal cycle. The old token has
//      applied != NULL and a newer active token exists.
//
//   2. Reset button (2026-07-05) — staff opened /admin/reset-renewal.php
//      to force a fresh renewal cycle. The old token may never have
//      been applied (customer bailed on Step 2), but we still don't
//      want them to accidentally resume their now-cancelled draft on
//      the old link. The old token has applied = NULL and a newer
//      active token exists.
//
// Both paths share the same rule: "any strictly-newer unused-and-
// unexpired sec_renewals row for this client makes the URL token
// stale, regardless of whether the URL token itself has been applied."
// The check compares token_created (not just presence) so a customer
// who correctly clicks the newest link never sees a false stale error
// even when older tokens are still lying around unused.
//
// If no newer row exists we fall through. That preserves the bookmark-
// after-paying case (paid token, no newer token) so the customer still
// gets their Thank You page — the intent of 9d62f9c stays intact.
$stalenessProbe = Db::one(
    'SELECT client_id, token_created FROM sec_renewals
      WHERE token = ? ORDER BY token_created DESC LIMIT 1',
    [$token]
);
if ($stalenessProbe !== null) {
    $newerActive = Db::one(
        "SELECT sec_renew_id
           FROM sec_renewals
          WHERE client_id     = ?
            AND token_created > ?
            AND applied IS NULL
            AND token_exp > NOW()
          ORDER BY token_created DESC
          LIMIT 1",
        [
            (int) $stalenessProbe['client_id'],
            (string) $stalenessProbe['token_created'],
        ]
    );
    if ($newerActive !== null) {
        unset($_SESSION['renewal_token']);
        showError(
            'This renewal link is no longer active.',
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
