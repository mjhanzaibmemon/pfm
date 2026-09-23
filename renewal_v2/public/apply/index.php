<?php
/**
 * PFM New-Customer Application — Entry Point
 *
 * Sibling to /renewal_v2/public/index.php (the renewal wizard's entry
 * point), but for applicants who have NO existing customer record.
 * Design reference: NEW_CUSTOMER_APPLICATION_SPEC.md Section 13.5 at
 * the project root.
 *
 * Renewal customers arrive here via an emailed token
 * (sec_renewals-issued, staff-triggered). A NEW applicant has no such
 * email — they land on a stable public URL (this file, or a link from
 * the marketing site) with no token at all. This entry point:
 *
 *  1. Resolve any in-progress application from the session cookie
 *     (NOT from a URL token — Section 13.5's key difference from the
 *     renewal flow. There is deliberately no `?token=` handling here;
 *     an applicant's own browser session IS the resume mechanism for
 *     this launch, per the 2026-09-23 decision recorded in the spec's
 *     Section 13.11).
 *  2. If none exists (first visit, or a stale cookie pointing at a
 *     cancelled/declined dead-end), start a fresh draft.
 *  3. Redirect to whichever step matches the application's current
 *     state (same routing shape as the renewal wizard's index.php).
 *
 * Session cookie name is DELIBERATELY DIFFERENT from the renewal
 * wizard's ('PFMRNW_WIZ') and from ScriptCase's default PHPSESSID —
 * see the session-setup block below for why that separation matters.
 */

declare(strict_types=1);

define('RNW_ROOT', dirname(__DIR__, 2));

require_once RNW_ROOT . '/lib/NewApplication.php';
require_once RNW_ROOT . '/config/config.php';

// ── Session setup ────────────────────────────────────────────────────
//
// A distinct session_name() — 'PFMAPP_WIZ' — so this wizard's cookie
// cannot collide with:
//   - ScriptCase's own PHPSESSID (path=/), which the legacy admin sets
//   - the renewal wizard's 'PFMRNW_WIZ' (public/index.php /
//     _includes/step_bootstrap.php) — a browser could plausibly have
//     BOTH wizards' cookies at once (e.g. staff testing both flows, or
//     a customer who is also mid-renewal for a different membership),
//     and giving each its own name means PHP resolves them
//     independently instead of one silently overwriting the other.
// Same rationale that drove the renewal wizard's own PFMRNW_WIZ choice
// (see public/index.php's matching comment — the 2026-06-19 "bar bar
// logout" report that motivated it applies equally here).
$sessionSavePath = RNW_ROOT . '/storage/sessions';
if (is_dir($sessionSavePath)) {
    session_save_path($sessionSavePath);
}
session_name('PFMAPP_WIZ');
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/renewal_v2/',
    'secure'   => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

// ── Token resolution — session ONLY, no URL param ──────────────────
// Unlike the renewal wizard, there is no email link carrying a token
// for a brand-new applicant to click, so there is nothing to read from
// $_GET here. loadOrCreate() below either resumes the session's
// existing token or mints a fresh one.
$sessionToken = (string) ($_SESSION['new_application_token'] ?? '');

// ── Load / create application ───────────────────────────────────────
// Unlike RenewalSession::loadOrCreate() (which can return null for an
// invalid/expired token), NewApplication::loadOrCreate() ALWAYS
// returns a usable object — see its own doc comment for why a new
// applicant has no external token source to fail validation against.
$application = NewApplication::loadOrCreate($sessionToken);

// Store token in PHP session
$_SESSION['new_application_token'] = $application->token;

// Generate CSRF token if not already set — used by the wizard step pages.
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ── Route based on current state ─────────────────────────────────────
$applicantToken = $application->token;

switch ($application->status) {
    case NewApplication::STATUS_DRAFT:
        // Resume at the furthest step reached (or step 1 for new
        // applications). Cap at 6 (Review) — payment/confirmation are
        // post-submit states, same cap as the renewal wizard.
        $step = max(1, min(6, $application->currentStep));
        header('Location: ' . stepUrl($step, $applicantToken));
        exit;

    case NewApplication::STATUS_SUBMITTED:
    case NewApplication::STATUS_AWAITING_PAYMENT:
        // Submitted but not yet paid — send to payment step
        header('Location: ' . stepUrl(7, $applicantToken));
        exit;

    case NewApplication::STATUS_AWAITING_REVIEW:
    case NewApplication::STATUS_COMPLETED:
        // Paid (and possibly already approved) — send to confirmation page
        header('Location: ' . stepUrl(8, $applicantToken));
        exit;

    case NewApplication::STATUS_DECLINED:
        // Reachable only if somehow a fresh loadOrCreate() call still
        // returned a declined row (shouldn't happen given the
        // dead-end handling in loadOrCreate(), but guarded here too —
        // defence in depth rather than relying on a single check).
        showError(
            'This application was not approved.',
            'If you have questions about your application, please contact '
            . '<a href="mailto:' . PFM_RNW_SUPPORT_EMAIL . '">'
            . PFM_RNW_SUPPORT_EMAIL . '</a>.'
        );

    case NewApplication::STATUS_CANCELLED:
        showError(
            'This application has been cancelled.',
            'Please contact <a href="mailto:' . PFM_RNW_SUPPORT_EMAIL . '">'
            . PFM_RNW_SUPPORT_EMAIL . '</a> if you believe this is an error, '
            . 'or refresh this page to start a new application.'
        );
        // showError() exits — never falls through

    default:
        showError('Unknown application status. Please contact ' . PFM_RNW_SUPPORT_EMAIL . '.');
}

// ── Helpers ──────────────────────────────────────────────────────────

function stepUrl(int $step, string $token = ''): string
{
    $url = '/renewal_v2/public/apply/steps/' . $step . '-' . stepSlug($step) . '.php';
    if ($token !== '') {
        $url .= '?token=' . rawurlencode($token);
    }
    return $url;
}

function stepSlug(int $step): string
{
    // Same 8-step shape as the renewal wizard (Larissa's own spec:
    // "based exactly on the renewal wizard... same information,
    // documents, buyers, payment process, staff review process").
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
    <title>Membership Application — Portland Flower Market</title>
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
