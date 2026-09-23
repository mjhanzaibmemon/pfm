<?php
/**
 * PFM New-Customer Application — API Bootstrap
 *
 * Include at the top of every public/apply/api/*.php endpoint.
 * Sibling to public/_includes/api_bootstrap.php (the renewal wizard's
 * equivalent) — same JSON/CSRF/error-handling shape, swapped to
 * NewApplication instead of RenewalSession.
 *
 * The generic response/validation helpers below (api_ok, api_error,
 * api_require_method, api_require_csrf, api_required_post,
 * api_optional_post, api_required_int) are intentionally DUPLICATED
 * from api_bootstrap.php rather than extracted into a shared file —
 * they have zero session-type dependency, so extracting them would
 * mean editing the working renewal-flow file to carve them out, for a
 * saving of only ~100 lines of extremely stable, unlikely-to-change
 * boilerplate. Not worth the risk to already-shipped production code
 * for this project's scope. If a THIRD API surface is ever added to
 * this codebase, that's the point to revisit this decision.
 *
 * After including this file, call:
 *   $application = api_require_application();  // 401 JSON if not found
 *   api_require_draft($application);           // 409 JSON if not editable
 *   api_require_method('POST');                // 405 if wrong HTTP method
 */

declare(strict_types=1);

// Absolute path to renewal_v2 root. This file lives at
// public/apply/api/_includes/ — ONE level deeper than
// public/apply/_includes/ (which apply_bootstrap.php uses
// dirname(__DIR__, 3) from) — so this needs 4, not 3. Off-by-one
// caught during this session's end-to-end API test (500 error,
// "Failed opening required .../public/lib/NewApplication.php" — one
// directory short of renewal_v2/lib/).
define('RNW_ROOT', dirname(__DIR__, 4));

require_once RNW_ROOT . '/lib/NewApplication.php';
require_once RNW_ROOT . '/lib/DocumentUpload.php';
require_once RNW_ROOT . '/lib/StripeClient.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('X-Content-Type-Options: nosniff');

// PHP session — same PFMAPP_WIZ name as apply/index.php and
// apply_bootstrap.php. Must match exactly or this endpoint would read
// an empty/different session than the one the step page set up.
$sessionSavePath = RNW_ROOT . '/storage/sessions';
if (is_dir($sessionSavePath)) {
    session_save_path($sessionSavePath);
}
if (session_status() === PHP_SESSION_NONE) {
    session_name('PFMAPP_WIZ');
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/renewal_v2/',
        'secure'   => isset($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ───────────────────────────────────────────────────────────────────
// Response helpers (see file-level doc comment re: duplication)
// ───────────────────────────────────────────────────────────────────

function api_ok(array $data = [], int $code = 200): never
{
    http_response_code($code);
    echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
    exit;
}

function api_error(string $message, int $code = 400, string $errCode = ''): never
{
    http_response_code($code);
    $body = ['success' => false, 'error' => $message];
    if ($errCode !== '') {
        $body['error_code'] = $errCode;
    }
    echo json_encode($body, JSON_UNESCAPED_UNICODE);
    exit;
}

// ───────────────────────────────────────────────────────────────────
// Auth / application guards
// ───────────────────────────────────────────────────────────────────

/**
 * Require a valid application (session-backed, never a 401 for "no
 * token" the way the renewal API does — a new applicant with a totally
 * fresh session hasn't done anything wrong, they just haven't started
 * yet, so we create a draft for them here rather than error).
 *
 * Reads token from (in priority order):
 *   1. $_SESSION['new_application_token']
 *   2. $_POST['token'] or $_GET['token']  (fallback for direct API
 *      testing — matches api_bootstrap.php's own fallback)
 *
 * @return NewApplication
 */
function api_require_application(): NewApplication
{
    $token = $_SESSION['new_application_token'] ?? '';

    if ($token === '') {
        $token = (string) ($_POST['token'] ?? $_GET['token'] ?? '');
    }

    if ($token === '') {
        api_error('No application session found. Please start from the application link.', 401, 'no_token');
    }

    // Exact lookup only — an API call is always mid-flow (the step
    // page already resolved/created the application before wizard.js
    // ever fires an autosave), so an unrecognised token here means
    // something genuinely went wrong (expired storage, tampered
    // token), not "start a fresh one silently."
    $application = NewApplication::loadByToken($token);
    if ($application === null) {
        unset($_SESSION['new_application_token']);
        api_error('Your application session was not found. Please reload the application page.', 401, 'invalid_token');
    }

    $_SESSION['new_application_token'] = $application->token;

    return $application;
}

/**
 * Require the application to be in draft (editable) state.
 * Exits with 409 Conflict if already submitted/paid/reviewed.
 */
function api_require_draft(NewApplication $application): void
{
    if (!$application->isEditable()) {
        api_error(
            "This application has already been submitted and cannot be changed (status: {$application->status}).",
            409,
            'not_editable'
        );
    }
}

/**
 * Require a specific HTTP method. Exits with 405 if wrong method.
 */
function api_require_method(string $method): void
{
    if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method)) {
        header('Allow: ' . strtoupper($method));
        api_error('Method not allowed.', 405);
    }
}

/**
 * Require a valid CSRF token. Same shape as api_bootstrap.php's
 * version — accepts X-CSRF-Token header or csrf_token POST field.
 */
function api_require_csrf(): void
{
    $expected = $_SESSION['csrf_token'] ?? '';
    if ($expected === '') {
        api_error('Session has not been initialised. Please reload the application page.', 403, 'no_csrf');
    }

    $received = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    if ($received === '') {
        $received = (string) ($_POST['csrf_token'] ?? '');
    }

    if ($received === '' || !hash_equals($expected, $received)) {
        api_error('Invalid or missing CSRF token.', 403, 'csrf_mismatch');
    }
}

/**
 * Get a required POST field. Exits with 400 if missing or empty.
 */
function api_required_post(string $field): string
{
    $val = trim((string) ($_POST[$field] ?? ''));
    if ($val === '') {
        api_error("Missing required field: {$field}.", 400, 'missing_field');
    }
    return $val;
}

/**
 * Get an optional POST field (trimmed, null if empty/missing).
 */
function api_optional_post(string $field): ?string
{
    $val = trim((string) ($_POST[$field] ?? ''));
    return $val !== '' ? $val : null;
}

/**
 * Get a required integer POST field. Exits with 400 if missing,
 * not numeric, or <= 0.
 */
function api_required_int(string $field): int
{
    $raw = trim((string) ($_POST[$field] ?? ''));
    if (!ctype_digit($raw) || (int) $raw <= 0) {
        api_error("Field '{$field}' must be a positive integer.", 400, 'invalid_field');
    }
    return (int) $raw;
}

// ───────────────────────────────────────────────────────────────────
// Global exception → JSON error handler
// ───────────────────────────────────────────────────────────────────

set_exception_handler(function (Throwable $e): void {
    error_log(sprintf(
        '[new_application] %s: %s in %s:%d',
        get_class($e),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    ));

    $isDebug = defined('PFM_RNW_DEBUG') && PFM_RNW_DEBUG;
    $message = $isDebug
        ? $e->getMessage() . ' [' . basename($e->getFile()) . ':' . $e->getLine() . ']'
        : 'An unexpected error occurred. Please try again.';
    api_error($message, 500, 'server_error');
});
