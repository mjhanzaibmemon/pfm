<?php
/**
 * PFM Renewal v2 — API Bootstrap
 *
 * Include at the top of every public/api/*.php endpoint.
 * Sets up JSON headers, error handling, and provides helper functions.
 *
 * After including this file, call:
 *   $session = api_require_session();   // exits with 401 JSON if not authenticated
 *   api_require_draft($session);        // exits with 409 JSON if not editable
 *   api_require_method('POST');         // exits with 405 if wrong HTTP method
 */

declare(strict_types=1);

// Absolute path to renewal_v2 root (two levels up from public/api/)
define('RNW_ROOT', dirname(__DIR__, 2));

require_once RNW_ROOT . '/lib/RenewalSession.php';
require_once RNW_ROOT . '/lib/BuyerManager.php';
require_once RNW_ROOT . '/lib/DocumentUpload.php';
require_once RNW_ROOT . '/lib/StripeClient.php';

// All responses are JSON
header('Content-Type: application/json; charset=utf-8');
// Prevent caching of API responses
header('Cache-Control: no-store, no-cache, must-revalidate');
header('X-Content-Type-Options: nosniff');

// PHP session (stored in storage/sessions/ — not web-accessible)
$sessionSavePath = RNW_ROOT . '/storage/sessions';
if (is_dir($sessionSavePath)) {
    session_save_path($sessionSavePath);
}
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/renewal_v2/',
        'secure'   => isset($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

// Generate a CSRF token on first session use. The wizard step pages expose this
// via a <meta name="csrf-token"> tag; wizard.js sends it back as X-CSRF-Token
// header or csrf_token POST field on every state-changing call.
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ───────────────────────────────────────────────────────────────────
// Response helpers
// ───────────────────────────────────────────────────────────────────

/**
 * Send a JSON success response and exit.
 *
 * @param array $data  Data payload (optional)
 * @param int   $code  HTTP status code (default 200)
 */
function api_ok(array $data = [], int $code = 200): never
{
    http_response_code($code);
    echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Send a JSON error response and exit.
 *
 * @param string $message  Human-readable error
 * @param int    $code     HTTP status code (default 400)
 * @param string $errCode  Machine-readable error code (optional)
 */
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
// Auth / session guards
// ───────────────────────────────────────────────────────────────────

/**
 * Require a valid renewal session.
 *
 * Reads token from (in priority order):
 *   1. $_SESSION['renewal_token']  (set by index.php on initial token validation)
 *   2. $_POST['token'] or $_GET['token']  (fallback for direct API calls in testing)
 *
 * Validates the token and loads the renewal session.
 * Exits with 401 JSON if no valid session found.
 *
 * @return RenewalSession
 */
function api_require_session(): RenewalSession
{
    $token = $_SESSION['renewal_token'] ?? '';

    // Fallback to request param (useful for direct API testing, webhook, etc.)
    if ($token === '') {
        $token = (string) ($_POST['token'] ?? $_GET['token'] ?? '');
    }

    if ($token === '') {
        api_error('No renewal session. Please use your renewal email link.', 401, 'no_token');
    }

    $session = RenewalSession::loadOrCreate($token);
    if ($session === null) {
        // Clear stale session data
        unset($_SESSION['renewal_token']);
        api_error('Your renewal link has expired. Please request a new one.', 401, 'expired_token');
    }

    // Keep session token up to date
    $_SESSION['renewal_token'] = $session->token;

    return $session;
}

/**
 * Require session to be in draft (editable) state.
 * Exits with 409 Conflict if already submitted/paid.
 */
function api_require_draft(RenewalSession $session): void
{
    if (!$session->isEditable()) {
        api_error(
            "This renewal has already been submitted and cannot be changed (status: {$session->status}).",
            409,
            'not_editable'
        );
    }
}

/**
 * Require a specific HTTP method.
 * Exits with 405 Method Not Allowed if wrong method.
 */
function api_require_method(string $method): void
{
    if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method)) {
        header('Allow: ' . strtoupper($method));
        api_error('Method not allowed.', 405);
    }
}

/**
 * Require a valid CSRF token. Defence-in-depth against cross-site request forgery
 * on top of the SameSite=Lax cookie attribute.
 *
 * Accepts the token from either:
 *   - X-CSRF-Token request header (preferred for XHR / fetch)
 *   - csrf_token POST field (for traditional form submissions)
 *
 * Exits with 403 Forbidden if missing or mismatched.
 *
 * Webhook endpoints (which are authenticated by HMAC, not session cookies)
 * MUST NOT call this — Stripe doesn't know our CSRF token.
 */
function api_require_csrf(): void
{
    $expected = $_SESSION['csrf_token'] ?? '';
    if ($expected === '') {
        api_error('Session has not been initialised. Please reload the renewal link.', 403, 'no_csrf');
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
 * Get a required POST field.
 * Exits with 400 if missing or empty.
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
 * Get a required integer POST field.
 * Exits with 400 if missing, not numeric, or <= 0.
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
    // Always log the full exception server-side for debugging, even in production
    error_log(sprintf(
        '[renewal_v2] %s: %s in %s:%d',
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
