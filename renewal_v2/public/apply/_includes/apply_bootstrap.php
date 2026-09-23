<?php
/**
 * Shared bootstrap for every new-customer application step page
 * (1-welcome.php … 8-confirmation.php under public/apply/steps/).
 *
 * Sibling to public/_includes/step_bootstrap.php (the renewal wizard's
 * equivalent) — same shape, adapted for an applicant who has no
 * existing `clients` row. Design reference:
 * NEW_CUSTOMER_APPLICATION_SPEC.md Section 13.6 at the project root.
 *
 * Provides:
 *   - Session start + token resolution + NewApplication loading
 *   - $application  (NewApplication)
 *   - Variables expected by header.php / progress-bar.php (shared,
 *     unmodified, with header.php's $PFM_FLOW_LABEL set below)
 *
 * Behaviour:
 *   - No token / unresolvable token → redirect to apply/index.php
 *     (which will mint a fresh draft — see NewApplication::loadOrCreate())
 *   - Wrong state for this step       → redirect to whichever step is
 *     appropriate, same routing shape as index.php's switch
 *
 * Each step page must define BEFORE including this file:
 *     $PFM_STEP        = 1..8;
 *     $PFM_STEP_TITLE  = 'Organization Information';
 *     $PFM_REQUIRES    = 'draft' | 'submitted' | 'paid' | 'any';
 *
 * KEY DIFFERENCE from step_bootstrap.php: there is no `$client` row to
 * load (no clients.client_id exists yet — that is the entire premise
 * of this module). Every step's pre-fill logic must read ONLY from
 * $application->draftData; there is no legacy-column fallback to fall
 * back to, unlike the renewal wizard's `$draftOrg[...] ?? $client[...]`
 * pattern. Any step file copy-adapted from the renewal wizard's
 * equivalent MUST have its `?? $client[...]` fallbacks removed, not
 * left in place pointing at an undefined variable.
 */
declare(strict_types=1);

define('RNW_ROOT', dirname(__DIR__, 3));

require_once RNW_ROOT . '/config/config.php';
require_once RNW_ROOT . '/lib/NewApplication.php';
require_once RNW_ROOT . '/lib/DocumentUpload.php';
require_once RNW_ROOT . '/lib/StripeClient.php';

// ── Session setup (must match apply/index.php) ──────────────────────
$pfmSessionDir = RNW_ROOT . '/storage/sessions';
if (is_dir($pfmSessionDir)) {
    session_save_path($pfmSessionDir);
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

// ── Token resolution ────────────────────────────────────────────────
// Same priority + same security rationale as step_bootstrap.php: the
// URL token wins over the session token, and a mismatch wipes the
// stale session rather than silently mixing two applicants' data.
$urlToken     = (string) ($_GET['token'] ?? '');
$sessionToken = (string) ($_SESSION['new_application_token'] ?? '');

if ($urlToken !== '' && $urlToken !== $sessionToken) {
    unset($_SESSION['new_application_token']);
    $sessionToken = '';
}

$token = $urlToken !== '' ? $urlToken : $sessionToken;
if ($token === '') {
    header('Location: /renewal_v2/public/apply/index.php');
    exit;
}

// Unlike step_bootstrap.php's RenewalSession::loadOrCreate() (which can
// return null for a genuinely invalid token), NewApplication's version
// always returns something — but a token that doesn't match any
// existing row still means "this specific link is unrecognised," so
// we route back to the entry point rather than silently minting a
// fresh draft under an unrelated token here. loadByToken() (exact
// lookup, never creates) is the right call for that distinction.
$application = NewApplication::loadByToken($token);
if ($application === null) {
    unset($_SESSION['new_application_token']);
    header('Location: /renewal_v2/public/apply/index.php');
    exit;
}
$_SESSION['new_application_token'] = $application->token;

// ── CSRF token ──────────────────────────────────────────────────────
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ── State gating ────────────────────────────────────────────────────
$requires = $PFM_REQUIRES ?? 'any';
$status   = $application->status;

/**
 * Build the URL for an application step, always including the current
 * token so URLs stay self-contained across all 8 steps (same rationale
 * as the renewal wizard's pfm_step_url()). Named distinctly
 * (pfm_apply_step_url, not pfm_step_url) so there is no symbol
 * collision if a future page ever needs both wizards' bootstraps
 * available at once (not expected, but free to guard against).
 */
function pfm_apply_step_url(int $step, array $extra = []): string {
    global $application;

    $slugs = [
        1 => 'welcome', 2 => 'organization', 3 => 'main-contact', 4 => 'buyers',
        5 => 'documents', 6 => 'review', 7 => 'payment', 8 => 'confirmation',
    ];
    $path = '/renewal_v2/public/apply/steps/' . $step . '-' . ($slugs[$step] ?? 'welcome') . '.php';

    $params = [];
    if (isset($application) && $application instanceof NewApplication && $application->token !== '') {
        $params['token'] = $application->token;
    }
    foreach ($extra as $k => $v) {
        if ($v !== null && $v !== '') {
            $params[$k] = $v;
        }
    }

    return empty($params) ? $path : ($path . '?' . http_build_query($params));
}

if ($requires === 'draft' && $status !== NewApplication::STATUS_DRAFT) {
    if (in_array($status, [NewApplication::STATUS_SUBMITTED, NewApplication::STATUS_AWAITING_PAYMENT], true)) {
        header('Location: ' . pfm_apply_step_url(7));
        exit;
    }
    if (in_array($status, [NewApplication::STATUS_AWAITING_REVIEW, NewApplication::STATUS_COMPLETED], true)) {
        header('Location: ' . pfm_apply_step_url(8));
        exit;
    }
    // cancelled / declined — nothing left to resume into
    header('Location: /renewal_v2/public/apply/index.php');
    exit;
}

if ($requires === 'submitted' && !in_array($status, [
    NewApplication::STATUS_SUBMITTED,
    NewApplication::STATUS_AWAITING_PAYMENT,
], true)) {
    if (in_array($status, [NewApplication::STATUS_AWAITING_REVIEW, NewApplication::STATUS_COMPLETED], true)) {
        header('Location: ' . pfm_apply_step_url(8));
        exit;
    }
    header('Location: ' . pfm_apply_step_url(6));
    exit;
}

if ($requires === 'paid' && !$application->isPaid()) {
    header('Location: ' . pfm_apply_step_url(7));
    exit;
}

// ── NOTE: no `$client` row load here ────────────────────────────────
// This is the module's defining difference from step_bootstrap.php.
// There is no clients.client_id yet — every step's pre-fill logic
// reads ONLY from $application->draftData (see this file's top
// doc-comment). There is also no pricing_level_id / "staff hasn't
// finished setting up this record" early-error check
// (step_bootstrap.php lines ~200-205) — that check exists because a
// RENEWAL customer's pricing level is something STAFF pre-assign on
// the existing clients row before the customer ever sees the wizard.
// A new applicant instead SELECTS their business category on the
// Organization step, and the level derives from that selection — there
// is nothing for staff to have "forgotten to set" before the applicant
// arrives, so this class of early error simply does not apply here.

// ── Defaults for header / progress-bar ─────────────────────────────
$PFM_STEP        = $PFM_STEP        ?? 1;
$PFM_STEP_TITLE  = $PFM_STEP_TITLE  ?? 'Membership Application';
$PFM_FLOW_LABEL  = 'New Membership Application';
$PFM_PAGE_TITLE  = $PFM_STEP_TITLE . ' — Portland Flower Market Membership Application';
