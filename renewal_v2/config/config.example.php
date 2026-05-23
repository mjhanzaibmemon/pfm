<?php
/**
 * PFM Renewal v2 — Configuration TEMPLATE
 *
 * Copy to `config.php` (which is gitignored) and fill in the real secrets.
 * Each server keeps its own real `config.php` — never commit it to git.
 *
 * Security:
 *   - File MUST NOT be web-accessible (nginx deny + .htaccess fallback)
 *   - Recommended permissions: 600 (owner read only)
 *
 * Setup:
 *   sudo -u pfm-app cp config.example.php config.php
 *   sudo nano config.php          # → fill in REPLACE_ME values
 *   sudo chmod 600 config.php
 */

declare(strict_types=1);

// ---------- Environment Detection ----------

function pfm_renewal_env(): string {
    $host = $_SERVER['SERVER_ADDR']
        ?? gethostbyname(gethostname())
        ?? '';
    if (strpos($host, '44.250.234.112') !== false) {
        return 'production';
    }
    return 'staging';
}

$ENV = pfm_renewal_env();

// ---------- Database Configuration ----------

define('PFM_RNW_DB_HOST',    '127.0.0.1');
define('PFM_RNW_DB_NAME',    'pfm');
define('PFM_RNW_DB_USER',    'pfm_renewal');
define('PFM_RNW_DB_PASS',    'REPLACE_ME_PFM_RENEWAL_DB_PASS');
define('PFM_RNW_DB_CHARSET', 'utf8mb4');

// Stripe database (separate from main pfm DB)
define('PFM_RNW_STRIPE_DB_NAME', 'stripe');

// ---------- Stripe Configuration ----------
// Use TEST keys on staging and during early production rollout.
// Switch to LIVE keys (sk_live_*, pk_live_*) when ready to accept real payments.

if ($ENV === 'production') {
    define('PFM_RNW_STRIPE_API_KEY',         'REPLACE_ME_STRIPE_API_KEY');
    define('PFM_RNW_STRIPE_PUBLISHABLE_KEY', 'REPLACE_ME_STRIPE_PUBLISHABLE_KEY');
    define('PFM_RNW_STRIPE_WEBHOOK_SECRET',  'REPLACE_ME_WHSEC');  // From Stripe webhook config
} else {
    define('PFM_RNW_STRIPE_API_KEY',         'REPLACE_ME_STRIPE_API_KEY');
    define('PFM_RNW_STRIPE_PUBLISHABLE_KEY', 'REPLACE_ME_STRIPE_PUBLISHABLE_KEY');
    define('PFM_RNW_STRIPE_WEBHOOK_SECRET',  'REPLACE_ME_WHSEC');
}

// ---------- URLs ----------

if ($ENV === 'production') {
    define('PFM_RNW_BASE_URL', 'https://pfm-app.com/renewal_v2');
} else {
    define('PFM_RNW_BASE_URL', 'https://staging.pfm-app.com/renewal_v2');
}

define('PFM_RNW_STRIPE_SUCCESS_URL', PFM_RNW_BASE_URL . '/public/steps/8-confirmation.php');
define('PFM_RNW_STRIPE_CANCEL_URL',  PFM_RNW_BASE_URL . '/public/steps/7-payment.php?cancelled=1');

// ---------- File Storage ----------

define('PFM_RNW_STORAGE_ROOT',  __DIR__ . '/../storage');
define('PFM_RNW_UPLOADS_DIR',   PFM_RNW_STORAGE_ROOT . '/uploads');
define('PFM_RNW_MAX_FILE_SIZE', 10 * 1024 * 1024);   // 10 MB per file
define('PFM_RNW_MAX_FILES_PER_SESSION', 10);
define('PFM_RNW_ALLOWED_MIME_TYPES', [
    'application/pdf',
    'image/jpeg',
    'image/jpg',
    'image/png',
]);

// ---------- Session / Draft Behavior ----------

define('PFM_RNW_TOKEN_VALIDITY_DAYS',       30);
define('PFM_RNW_DRAFT_RETENTION_DAYS',      30);
define('PFM_RNW_MAX_BUYERS_PER_MEMBERSHIP', 50);

// ---------- PFM Contact / Support ----------

define('PFM_RNW_SUPPORT_EMAIL', 'info@pfm-app.com');

// ---------- Misc ----------

define('PFM_RNW_ENVIRONMENT', $ENV);
define('PFM_RNW_DEBUG', $ENV === 'staging');   // Verbose API error responses on staging only

// Error reporting policy:
//   - ALWAYS log errors to the server log (debug-after-the-fact).
//   - NEVER display PHP errors to the browser — even on staging — because
//     that leaks paths/line numbers to anyone hitting a misconfigured URL.
error_reporting(E_ALL);
ini_set('display_errors',         '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors',             '1');

date_default_timezone_set('America/Los_Angeles');
