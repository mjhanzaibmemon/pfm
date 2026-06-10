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

// ---------- Staff Notifications (Phase 4) ----------
// Comma-separated list of staff inboxes that should receive a notification
// email when a customer payment is received and is awaiting review.
//
// Recipients (sourced from the legacy code on 2026-06-10):
//   - portlandflowermarketinfo@gmail.com — the contact-PFM mailto in
//     form_clients_steps_appn_*, and the main_contact_email on
//     staff-managed records (Oregon Flower Growers Assoc., Day Pass, etc.)
//   - OFGA.FMA.GM@gmail.com — OFGA (parent org) Floral Market
//     Association General Manager inbox.
//
// Staging used to point at a single dev inbox during Phase 3 build-out;
// since 2026-06-10 staging mirrors production so Larissa's QA matches
// what real PFM staff will see. The "[STAGING TEST]" subject prefix
// (see PFM_RNW_NOTIFY_SUBJECT_PREFIX below) is still applied on
// non-production envs so test traffic is unambiguous in the inbox.
//
// To temporarily route to a different inbox (e.g. a dev debug session),
// replace the recipients with your own address and re-deploy this file.
define(
    'PFM_RNW_STAFF_NOTIFY_EMAILS',
    'portlandflowermarketinfo@gmail.com, OFGA.FMA.GM@gmail.com'
);

// "From" address used by mail() for staff notifications. Use a domain
// that the server is allowed to send for (Gmail accepts mail from any
// configured sender; for production you may want a real noreply@pfm-app.com).
//
// IMPORTANT: This value MUST be on a domain that's verified inside the
// MailerSend account whose SMTP credentials are configured below. Sending
// from gmail.com or any unverified domain results in a 550 reject. The
// existing PFM admin uses pfm@pdxflowermarket.com — match that for parity.
define('PFM_RNW_NOTIFY_FROM', 'pfm@pdxflowermarket.com');
define('PFM_RNW_NOTIFY_FROM_NAME', 'Portland Flower Market — Renewals');

// ---------- SMTP relay (MailerSend) ----------
// AWS EC2 blocks outbound port 25 by default, so PHP mail()/postfix cannot
// deliver to Gmail/Outlook. We use the same MailerSend SMTP relay the
// existing PFM admin uses (see grid_vw_clients_main_member_renew_*.class.php
// in the legacy ScriptCase code). Real credentials live in this server's
// non-example config.php — never commit them to git.
define('PFM_RNW_SMTP_HOST',     'smtp.mailersend.net');
define('PFM_RNW_SMTP_PORT',     587);
define('PFM_RNW_SMTP_SECURE',   'tls');
define('PFM_RNW_SMTP_USERNAME', 'CHANGE_ME_mailersend_smtp_username');
define('PFM_RNW_SMTP_PASSWORD', 'CHANGE_ME_mailersend_smtp_password');

// On staging the email subject is prefixed so recipients can immediately
// identify (and ignore/triage) test emails. On production the prefix is
// empty and emails look identical to any other staff notification.
define('PFM_RNW_NOTIFY_SUBJECT_PREFIX', $ENV === 'staging' ? '[STAGING TEST] ' : '');

// ---------- Admin dashboard auth (Phase 4) ----------
// Simple shared-password gate for the /renewal_v2/admin/dashboard.php page
// (the backup discovery list of pending reviews). Each individual review
// page uses its own per-session admin_review_token from the email link, so
// this password ONLY protects the dashboard listing.
// CHANGE THIS in production. The Larissa demo password is set in the real
// (non-example) config.php on the server.
define('PFM_RNW_ADMIN_DASHBOARD_PASSWORD', 'pfm_admin_change_me');

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
