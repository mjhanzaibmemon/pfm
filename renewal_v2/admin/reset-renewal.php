<?php
/**
 * Reset Renewal & Send Fresh Link — staff self-service page.
 *
 * URL: /renewal_v2/admin/reset-renewal.php
 *
 * Why this exists
 * ---------------
 * Larissa's 2026-07-04 QA surfaced a case the wizard couldn't self-heal:
 * a customer has an in-progress renewal_session (draft OR completed) that
 * needs to be wiped so a fresh renewal cycle can start. The customer
 * clicking the existing renewal link would just resume the old state.
 *
 * Two triggers Larissa hits:
 *   1. Customer says "the form has wrong info I already submitted, I
 *      want to redo from scratch." Their session is completed or in
 *      draft. Legacy "Email" button on the Renewals grid wouldn't clear
 *      the old state — this page does.
 *   2. A customer clicked a stale link, saw the "you already renewed"
 *      error, and asked Larissa for a fresh one. Larissa uses this page
 *      to reset + resend in one action.
 *
 * What it does when Larissa clicks "Reset & Send"
 * ------------------------------------------------
 *   1. Cancel every non-cancelled renewal_session for that client
 *      (status set to 'cancelled', token mangled so the UNIQUE index
 *      doesn't collide with the fresh sec_renewals row we're about
 *      to insert).
 *   2. INSERT INTO sec_renewals (client_id) — the trigger
 *      before_insert_sec_renewals auto-generates a fresh UUID token
 *      with a 30-day expiry.
 *   3. Read the standard renewal email template out of
 *      members_status.msg_body (same source as the legacy "Email"
 *      button) and substitute ~COMPANY NAME~ and ~LINK~.
 *   4. Send via renewal_v2\Mailer to the client's
 *      main_contact_email.
 *   5. Show Larissa a confirmation with the new link (so she can copy
 *      it into a Slack/text if the email bounces).
 *
 * Auth: same auto-auth + shared-password fallback as dashboard.php, so
 * a staff member already logged into the PFM ScriptCase admin can hit
 * this page with no extra login.
 *
 * Spec ref: Muhammad ↔ Larissa 2026-07-04 conversation ("Larissa khud
 * reset karde link ko or email chli jaye is tarah ka karna hai").
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/../lib/Mailer.php';
require_once __DIR__ . '/_includes/admin_layout.php';

pfm_admin_session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

/* ─── Auth (matches dashboard.php) ─────────────────────────────────── */
$RESET_AUTH_KEY = 'pfm_admin_dashboard_authed';

if (empty($_SESSION[$RESET_AUTH_KEY])
    && !empty($_SESSION['scriptcase']['sc_apl_seg'])
    && is_array($_SESSION['scriptcase']['sc_apl_seg'])
    && in_array('on', $_SESSION['scriptcase']['sc_apl_seg'], true)) {
    $_SESSION[$RESET_AUTH_KEY] = true;
}

$loginError = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST'
    && isset($_POST['admin_password'])) {
    $postedCsrf = (string) ($_POST['csrf_token'] ?? '');
    if (!hash_equals((string) $_SESSION['csrf_token'], $postedCsrf)) {
        $loginError = 'Session expired. Please try again.';
    } else {
        $providedPassword = (string) $_POST['admin_password'];
        $expectedPassword = defined('PFM_RNW_ADMIN_DASHBOARD_PASSWORD')
            ? (string) PFM_RNW_ADMIN_DASHBOARD_PASSWORD : '';
        if ($expectedPassword !== ''
            && hash_equals($expectedPassword, $providedPassword)) {
            $_SESSION[$RESET_AUTH_KEY] = true;
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            header('Location: /renewal_v2/admin/reset-renewal.php');
            exit;
        }
        $loginError = 'Incorrect password.';
        sleep(1);
    }
}

if (empty($_SESSION[$RESET_AUTH_KEY])) {
    // Reuse the dashboard login shell (keeps UX consistent)
    $pfmCsrfToken = (string) $_SESSION['csrf_token'];
    pfm_admin_header('Reset Renewal', 'Sign in required');
    ?>
    <div style="max-width:400px;margin:60px auto;padding:24px;
                background:white;border-radius:8px;
                box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <h2 style="margin-top:0">Staff Sign-In</h2>
        <?php if ($loginError !== null): ?>
            <p style="color:#c0392b;"><?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>
        <form method="post" action="/renewal_v2/admin/reset-renewal.php">
            <input type="hidden" name="csrf_token"
                   value="<?= htmlspecialchars($pfmCsrfToken, ENT_QUOTES) ?>">
            <label style="display:block;margin-bottom:12px;">
                Password
                <input type="password" name="admin_password" required
                       autofocus autocomplete="current-password"
                       style="width:100%;padding:8px;margin-top:4px;
                              border:1px solid #ccc;border-radius:4px;">
            </label>
            <button type="submit" style="width:100%;padding:10px;
                    background:#727cf5;color:white;border:none;
                    border-radius:4px;font-weight:600;">Sign in</button>
        </form>
    </div>
    <?php
    pfm_admin_footer();
    exit;
}

/* ─── Handlers: search & reset ────────────────────────────────────── */

$searchQuery   = trim((string) ($_GET['q'] ?? ''));
$foundClient   = null;
$currentState  = null;
$resetResult   = null;   // ['ok'=>bool, 'msg'=>string, 'link'=>string]

// Load current state for the searched client (if any)
if ($searchQuery !== '') {
    // Accept numeric client_id OR partial name/email match
    if (ctype_digit($searchQuery)) {
        $foundClient = Db::one(
            'SELECT client_id, co_name, main_contact_name,
                    main_contact_email
               FROM clients WHERE client_id = ?',
            [(int) $searchQuery]
        );
    } else {
        $foundClient = Db::one(
            'SELECT client_id, co_name, main_contact_name,
                    main_contact_email
               FROM clients
              WHERE co_name LIKE ?
                 OR main_contact_name LIKE ?
                 OR main_contact_email LIKE ?
              ORDER BY client_id DESC LIMIT 1',
            ['%' . $searchQuery . '%',
             '%' . $searchQuery . '%',
             '%' . $searchQuery . '%']
        );
    }

    if ($foundClient !== null) {
        $cid = (int) $foundClient['client_id'];
        $currentState = [
            'session' => Db::one(
                'SELECT id, status, current_step, paid_at, updated_at
                   FROM renewal_sessions
                  WHERE client_id = ? AND status != "cancelled"
                  ORDER BY updated_at DESC LIMIT 1',
                [$cid]
            ),
            'token' => Db::one(
                'SELECT sec_renew_id, LEFT(token, 8) AS token_prefix,
                        token_created, token_exp, applied
                   FROM sec_renewals
                  WHERE client_id = ?
                  ORDER BY token_created DESC LIMIT 1',
                [$cid]
            ),
        ];
    }
}

// Reset & send action — POST only, CSRF-checked
$resetError = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST'
    && isset($_POST['reset_action'])) {

    $postedCsrf = (string) ($_POST['csrf_token'] ?? '');
    $confirmCid = (int) ($_POST['confirm_client_id'] ?? 0);

    if (!hash_equals((string) $_SESSION['csrf_token'], $postedCsrf)) {
        $resetError = 'Session expired — please refresh and try again.';
    } elseif ($confirmCid <= 0) {
        $resetError = 'Missing client_id in reset request.';
    } else {
        $resetResult = pfm_reset_and_send_link($confirmCid);
        // Rotate CSRF so accidental double-submit doesn't re-fire
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

/**
 * Cancel any non-cancelled renewal_sessions for the client, insert a
 * fresh sec_renewals row, look up the standard renewal email template,
 * and send it to the client's main_contact_email via Mailer.
 *
 * Returns ['ok'=>bool, 'msg'=>string, 'link'=>string, 'sent_to'=>string]
 */
function pfm_reset_and_send_link(int $clientId): array
{
    // 1. Look up client (need name + email for template + mailing)
    $client = Db::one(
        'SELECT client_id, co_name, main_contact_email, email
           FROM clients WHERE client_id = ?',
        [$clientId]
    );
    if ($client === null) {
        return ['ok' => false,
                'msg' => "Client {$clientId} not found.",
                'link' => '', 'sent_to' => ''];
    }

    // Prefer main_contact_email; fall back to company email if empty
    $recipient = trim((string) ($client['main_contact_email'] ?? ''));
    if ($recipient === '') {
        $recipient = trim((string) ($client['email'] ?? ''));
    }
    if ($recipient === '' || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        return ['ok' => false,
                'msg' => "Client {$clientId} has no valid email on file.",
                'link' => '', 'sent_to' => ''];
    }

    try {
        // 2. Cancel any non-cancelled sessions with token-mangling to
        //    free the UNIQUE constraint. Same mangling scheme
        //    RenewalSession::loadOrCreate() uses ('sup_<id>_...').
        Db::exec(
            "UPDATE renewal_sessions
                SET status = 'cancelled',
                    token  = CONCAT('sup_', id, '_', LEFT(token, 35)),
                    updated_at = NOW()
              WHERE client_id = ?
                AND status != 'cancelled'",
            [$clientId]
        );

        // 3. Insert new sec_renewals row. The
        //    before_insert_sec_renewals trigger fills in token
        //    (UUID), token_exp (+30 days), token_created (now).
        Db::exec(
            'INSERT INTO sec_renewals (client_id) VALUES (?)',
            [$clientId]
        );

        // 4. Fetch the newly generated token
        $tokenRow = Db::one(
            'SELECT token FROM sec_renewals
              WHERE client_id = ?
              ORDER BY token_created DESC LIMIT 1',
            [$clientId]
        );
        if ($tokenRow === null || empty($tokenRow['token'])) {
            return ['ok' => false,
                    'msg' => 'Token INSERT succeeded but token was not readable back.',
                    'link' => '', 'sent_to' => $recipient];
        }
        $newToken = (string) $tokenRow['token'];

        // 5. Build the customer-facing renewal link. Use the legacy
        //    /blank_renewal_link/ redirector so bookmarks + old email
        //    templates keep working the same way; it 302s to
        //    renewal_v2/public/index.php.
        $host = $_SERVER['HTTP_HOST'] ?? 'staging.pfm-app.com';
        $renewalLink = 'https://' . $host . '/blank_renewal_link/?token='
                     . rawurlencode($newToken);

        // 6. Pull the same subject + body legacy uses (matches the
        //    "Email" button in the Renewals grid). Falls back to a
        //    hard-coded template if the row is missing.
        $tpl = Db::one(
            "SELECT msg_subject, msg_body FROM members_status
              WHERE status = 'Active' LIMIT 1"
        );
        if ($tpl !== null && !empty($tpl['msg_body'])) {
            $subject = (string) $tpl['msg_subject'];
            $body    = (string) $tpl['msg_body'];
        } else {
            $subject = 'Portland Flower Market — Renewal Link';
            $body    = 'Hello ~COMPANY NAME~,<br><br>'
                     . 'Please click the link below to renew your PFM '
                     . 'membership:<br><br>'
                     . '<a href="~LINK~">~LINK~</a><br><br>'
                     . 'The Portland Flower Market team';
        }
        $companyName = (string) ($client['co_name'] ?? '');
        $body = str_replace('~COMPANY NAME~', $companyName, $body);
        $body = str_replace('~LINK~',         $renewalLink, $body);

        // 7. Send via the same MailerSend SMTP relay the wizard uses
        [$sent, $detail] = Mailer::send($recipient, $subject, $body, true);

        if (!$sent) {
            error_log(sprintf(
                '[renewal_v2] reset-renewal: MAIL FAILED for client %d (%s) — %s',
                $clientId, $recipient, $detail
            ));
            return ['ok' => false,
                    'msg' => 'Reset done, but email failed: ' . $detail
                          . ' — copy the link below and send manually.',
                    'link' => $renewalLink, 'sent_to' => $recipient];
        }

        error_log(sprintf(
            '[renewal_v2] reset-renewal: sent fresh link to %s for client %d.',
            $recipient, $clientId
        ));
        return ['ok' => true,
                'msg' => 'Fresh renewal link sent to ' . $recipient . '.',
                'link' => $renewalLink, 'sent_to' => $recipient];

    } catch (\Throwable $e) {
        error_log(sprintf(
            '[renewal_v2] reset-renewal: EXCEPTION for client %d — %s',
            $clientId, $e->getMessage()
        ));
        return ['ok' => false,
                'msg' => 'Server error: ' . $e->getMessage(),
                'link' => '', 'sent_to' => ''];
    }
}

/* ─── Render ──────────────────────────────────────────────────────── */

$pfmCsrfToken = (string) $_SESSION['csrf_token'];
pfm_admin_header('Reset Renewal',
                 'Cancel a customer\'s in-progress renewal and email them a fresh link');
?>

<div style="max-width:800px;margin:0 auto;">

<?php if ($resetResult !== null): ?>
    <div style="padding:16px;border-radius:6px;margin-bottom:24px;
                background:<?= $resetResult['ok'] ? '#d2f4e8' : '#ffe3e8' ?>;
                border:1px solid <?= $resetResult['ok'] ? '#0acf97' : '#fa5c7c' ?>;">
        <strong><?= $resetResult['ok'] ? '&#10003; Done' : '&#9888; Problem' ?>:</strong>
        <?= htmlspecialchars($resetResult['msg']) ?>
        <?php if (!empty($resetResult['link'])): ?>
        <div style="margin-top:10px;padding:8px;background:white;
                    border-radius:4px;font-family:monospace;
                    word-break:break-all;font-size:0.85rem;">
            <?= htmlspecialchars($resetResult['link']) ?>
        </div>
        <?php endif; ?>
    </div>
<?php elseif ($resetError !== null): ?>
    <div style="padding:12px;background:#ffe3e8;border:1px solid #fa5c7c;
                border-radius:6px;margin-bottom:24px;color:#b13b58;">
        <?= htmlspecialchars($resetError) ?>
    </div>
<?php endif; ?>

<form method="get" action="/renewal_v2/admin/reset-renewal.php"
      style="margin-bottom:24px;background:white;padding:20px;
             border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
    <label style="display:block;font-weight:600;margin-bottom:6px;">
        Find a client
    </label>
    <div style="display:flex;gap:8px;">
        <input type="text" name="q" required autofocus
               value="<?= htmlspecialchars($searchQuery, ENT_QUOTES) ?>"
               placeholder="Client ID (e.g. 737838), company name, contact name, or email"
               style="flex:1;padding:10px;border:1px solid #ccc;
                      border-radius:4px;font-size:0.95rem;">
        <button type="submit" style="padding:10px 24px;background:#727cf5;
                color:white;border:none;border-radius:4px;font-weight:600;
                cursor:pointer;">Search</button>
    </div>
    <div style="font-size:0.8rem;color:#6c757d;margin-top:6px;">
        Search matches on client_id (exact) or partial company / contact name / email.
    </div>
</form>

<?php if ($searchQuery !== '' && $foundClient === null): ?>
    <div style="padding:16px;background:#fff2cd;border:1px solid #ffbc00;
                border-radius:6px;color:#8a6500;">
        No client matched
        &ldquo;<?= htmlspecialchars($searchQuery) ?>&rdquo;.
        Try a client ID or a more specific search.
    </div>
<?php elseif ($foundClient !== null): ?>

    <div style="background:white;padding:20px;border-radius:8px;
                box-shadow:0 1px 3px rgba(0,0,0,0.05);">

        <h3 style="margin-top:0">Client
            &#8203;#<?= (int) $foundClient['client_id'] ?></h3>

        <div class="pfm-data-row">
            <span class="label">Company</span>
            <span class="value"><?= htmlspecialchars((string) ($foundClient['co_name'] ?? '—')) ?></span>
        </div>
        <div class="pfm-data-row">
            <span class="label">Main contact</span>
            <span class="value"><?= htmlspecialchars((string) ($foundClient['main_contact_name'] ?? '—')) ?></span>
        </div>
        <div class="pfm-data-row">
            <span class="label">Email</span>
            <span class="value"><?= htmlspecialchars((string) ($foundClient['main_contact_email'] ?? '—')) ?></span>
        </div>

        <h4 style="margin-top:24px">Current renewal state</h4>
        <?php
        $session = $currentState['session'] ?? null;
        $token   = $currentState['token']   ?? null;
        ?>
        <?php if ($session === null): ?>
            <div class="pfm-data-row">
                <span class="label">Active session</span>
                <span class="value">
                    <em>No active renewal in progress.</em>
                </span>
            </div>
        <?php else: ?>
            <div class="pfm-data-row">
                <span class="label">Active session</span>
                <span class="value">
                    #<?= (int) $session['id'] ?>
                    &middot; status: <?= htmlspecialchars((string) $session['status']) ?>
                    <?php if (!empty($session['paid_at'])): ?>
                        &middot; paid <?= htmlspecialchars((string) $session['paid_at']) ?>
                    <?php else: ?>
                        &middot; step <?= (int) $session['current_step'] ?>
                    <?php endif; ?>
                </span>
            </div>
        <?php endif; ?>
        <?php if ($token !== null): ?>
            <div class="pfm-data-row">
                <span class="label">Latest token</span>
                <span class="value">
                    <?= htmlspecialchars((string) $token['token_prefix']) ?>&hellip;
                    &middot; created <?= htmlspecialchars((string) $token['token_created']) ?>
                    &middot;
                    <?= empty($token['applied'])
                        ? 'still active (unused)'
                        : ('used ' . htmlspecialchars((string) $token['applied'])) ?>
                </span>
            </div>
        <?php endif; ?>

        <div style="margin-top:24px;padding:16px;background:#fef7e0;
                    border:1px solid #ffbc00;border-radius:6px;
                    color:#7a5a00;">
            <strong>What will happen when you click Reset:</strong>
            <ol style="margin:8px 0 0 20px;padding:0;font-size:0.9rem;">
                <li>Any renewal currently in progress or completed for this
                    client is marked <em>cancelled</em> (kept in the DB for
                    audit — nothing is deleted).</li>
                <li>A brand-new renewal link is generated (valid for 30 days).</li>
                <li>The renewal email is sent to
                    <strong><?= htmlspecialchars((string) ($foundClient['main_contact_email'] ?? '(no email!)')) ?></strong>.</li>
                <li>The link is also shown to you here in case you need to
                    copy it into a different message.</li>
            </ol>
        </div>

        <form method="post" action="/renewal_v2/admin/reset-renewal.php"
              style="margin-top:16px;"
              onsubmit="return confirm(
                'This will cancel any renewal already in progress for this '
                + 'client and email them a fresh link. Continue?');">
            <input type="hidden" name="csrf_token"
                   value="<?= htmlspecialchars($pfmCsrfToken, ENT_QUOTES) ?>">
            <input type="hidden" name="confirm_client_id"
                   value="<?= (int) $foundClient['client_id'] ?>">
            <button type="submit" name="reset_action" value="1"
                    style="padding:12px 24px;background:#fa5c7c;color:white;
                           border:none;border-radius:4px;font-weight:600;
                           font-size:1rem;cursor:pointer;">
                &#9851; Reset renewal &amp; send fresh link
            </button>
        </form>
    </div>

<?php else: ?>

    <div style="background:#fafbfe;padding:20px;border-radius:8px;
                color:#6c757d;">
        Search for a client above to see their current renewal state and
        (if needed) reset it.
    </div>

<?php endif; ?>

</div>

<?php
pfm_admin_footer();
