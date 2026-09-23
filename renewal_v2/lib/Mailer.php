<?php
declare(strict_types=1);

/**
 * Mailer — PHPMailer + SMTP wrapper for PFM Renewal v2.
 *
 * Why this exists
 * ---------------
 * PHP's native mail() relies on the local MTA (postfix). On AWS EC2 the
 * outbound port 25 is blocked by default (anti-spam policy), so postfix
 * cannot deliver to Gmail/Outlook. The existing PFM admin (ScriptCase
 * renewal grids) already solved this by going through MailerSend's SMTP
 * relay on port 587/TLS — see
 *   grid_vw_clients_main_member_renew_res_csv.class.php
 * We mirror that exact setup so the new renewal_v2 system delivers email
 * the same way on both staging AND production with zero infra changes.
 *
 * Dependency
 * ----------
 * Uses the same PHPMailer copy that every other ScriptCase app on this
 * server already loads — no new vendor code:
 *   /home/pfm-app/htdocs/www.pfm-app.com/_lib/libraries/sys/PHPMailerLib/PHPMailer
 *
 * Config (renewal_v2/config/config.php)
 * -------------------------------------
 *   PFM_RNW_SMTP_HOST       e.g. smtp.mailersend.net
 *   PFM_RNW_SMTP_PORT       e.g. 587
 *   PFM_RNW_SMTP_USERNAME   MailerSend SMTP username
 *   PFM_RNW_SMTP_PASSWORD   MailerSend SMTP password
 *   PFM_RNW_SMTP_SECURE     'tls' | 'ssl'
 *   PFM_RNW_NOTIFY_FROM     MailerSend-verified address (e.g. pfm@pdxflowermarket.com)
 *   PFM_RNW_NOTIFY_FROM_NAME
 *
 * IMPORTANT — From address must be on a MailerSend-verified domain
 * (pdxflowermarket.com). Sending from gmail.com or unverified domains
 * results in 550 rejection from MailerSend.
 */
final class Mailer
{
    /**
     * Absolute path to the shared PHPMailer library copy that PFM uses.
     * Hard-coded because it's a known, stable server path and avoids the
     * need for composer / autoloading in this small library.
     */
    private const PHPMAILER_BASE =
        '/home/pfm-app/htdocs/www.pfm-app.com/_lib/libraries/sys/PHPMailerLib/PHPMailer';

    /**
     * Send a plain-text or HTML email via the configured SMTP relay.
     *
     * @param string|string[] $to        One address or list of addresses
     * @param string          $subject
     * @param string          $body
     * @param bool            $isHtml    Default false (plain text)
     * @param string|null     $replyTo   Optional Reply-To address
     *
     * @return array{0:bool,1:string}    [ok, detail]
     *   - ok=true   → SMTP relay accepted the message
     *   - ok=false  → detail contains PHPMailer's ErrorInfo for the log
     */
    public static function send(
        $to,
        string $subject,
        string $body,
        bool $isHtml = false,
        ?string $replyTo = null
    ): array {
        // ── Lazy-load PHPMailer (kept out of the autoloader so the rest of
        //    the wizard, which doesn't send mail, has zero require cost) ──
        $base = self::PHPMAILER_BASE;
        if (!class_exists('PHPMailer', false)) {
            require_once $base . '/PHPMailer.php';
            require_once $base . '/SMTP.php';
            // Exception.php is only present in PHPMailer 6.x. Guard with a
            // file_exists() check so older PHPMailer copies still work.
            if (file_exists($base . '/Exception.php')) {
                require_once $base . '/Exception.php';
            }
        }

        try {
            // PHPMailer is in the root namespace here (legacy ScriptCase copy
            // doesn't use PHPMailer\PHPMailer\PHPMailer). The `true` arg makes
            // it throw on error so we catch a clean exception below.
            $mail = new \PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = self::cfg('PFM_RNW_SMTP_HOST',     'smtp.mailersend.net');
            $mail->Port       = (int) self::cfg('PFM_RNW_SMTP_PORT', 587);
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = self::cfg('PFM_RNW_SMTP_SECURE',   'tls');
            $mail->Username   = self::cfg('PFM_RNW_SMTP_USERNAME', '');
            $mail->Password   = self::cfg('PFM_RNW_SMTP_PASSWORD', '');
            $mail->CharSet    = 'UTF-8';
            $mail->XMailer    = 'PFM-Renewal-v2';

            // From — MUST be a MailerSend-verified domain or the relay 550s
            $fromAddr = self::cfg('PFM_RNW_NOTIFY_FROM',      'pfm@pdxflowermarket.com');
            $fromName = self::cfg('PFM_RNW_NOTIFY_FROM_NAME', 'Portland Flower Market - Renewals');
            $mail->setFrom($fromAddr, $fromName);

            if ($replyTo !== null && $replyTo !== '') {
                $mail->addReplyTo($replyTo);
            }

            // Recipients — accept string OR array, dedupe + trim
            $recipients = is_array($to) ? $to : [$to];
            $seen = [];
            foreach ($recipients as $addr) {
                $addr = trim((string) $addr);
                if ($addr !== '' && !isset($seen[strtolower($addr)])) {
                    $mail->addAddress($addr);
                    $seen[strtolower($addr)] = true;
                }
            }

            $mail->Subject = $subject;
            $mail->isHTML($isHtml);
            $mail->Body    = $body;
            if (!$isHtml) {
                // For plain-text mails, set AltBody too — some clients prefer it
                $mail->AltBody = $body;
            }

            $ok = $mail->send();

            return [(bool) $ok, $ok ? 'sent' : ('PHPMailer: ' . $mail->ErrorInfo)];
        } catch (\Throwable $e) {
            return [false, 'Mailer exception: ' . $e->getMessage()];
        }
    }

    /**
     * Read a config constant with a safe default if it's not defined yet.
     * Lets the Mailer degrade to harmless defaults during partial deploys
     * rather than php-fatal-ing.
     */
    private static function cfg(string $name, $default)
    {
        return defined($name) ? constant($name) : $default;
    }
}
