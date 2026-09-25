<?php
/**
 * PFM — staff review actions for new-customer applications (approve) and
 * for both applications and renewals (decline).
 *
 * APPROVE (new applications only — spec 13.8). This is the one place a
 * new applicant becomes a real customer: in a single transaction it
 * INSERTs the `clients` row, the `members` rows (main contact + buyers)
 * and the `client_pmts` payment row, sets Active status, Membership
 * Since and the renewal date, assigns the membership number, and flips
 * the application to 'completed'. Before any of that it re-checks the
 * company name against customers AND other pending applications, under
 * the same advisory lock the submit endpoint uses — Section 3's hard rule
 * ("never create two customer records with the same company name")
 * enforced at the last possible moment.
 *
 * After the commit, best-effort (a failure here never undoes the
 * approval, exactly like confirm-receipt.php for renewals): copy the ID
 * and Business Registry into the legacy `clients` BLOB columns and
 * `client_docs` so they show in the existing admin, add a history note,
 * and send the SAME approval email renewals use
 * (StripeClient::buildApprovedEmail — notifications.notif_id = 2).
 *
 * DECLINE (both flows — spec 13.9). Records the decline and sends the
 * `notifications` template 'declined_application' with ~REASON~ /
 * ~COMPANY NAME~ substituted. The email is composed by a separate method
 * so the admin UI can preview it before anything is sent. Declining
 * touches no customer data and creates no customer record.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/NewApplication.php';
require_once __DIR__ . '/RenewalSession.php';
require_once __DIR__ . '/StripeClient.php';
require_once __DIR__ . "/ApplicationDocumentUpload.php";
require_once __DIR__ . "/ApplicationStripe.php";
require_once __DIR__ . '/PhoneFormat.php';

/** Thrown when approval is refused because the company name is taken. */
final class ApplicationNameConflictException extends RuntimeException
{
    /** @var array{source:string, client_id?:int, application_id?:int} */
    public array $conflict;

    public function __construct(array $conflict)
    {
        $this->conflict = $conflict;
        parent::__construct(
            $conflict['source'] === 'customer'
                ? 'A customer record with this company name already exists (client #' . ($conflict['client_id'] ?? '?') . ').'
                : 'Another submitted application already uses this company name (application #' . ($conflict['application_id'] ?? '?') . ').'
        );
    }
}

final class ApplicationReview
{
    // ===================================================================
    // APPROVE
    // ===================================================================

    /**
     * Approve a paid new application.
     *
     * @return array{client_id:int, membership_number:int, client_pmt_id:int,
     *               buyers:int, docs_total:int, docs_copied:int,
     *               email:string}   email = sent | skipped:<why> | failed
     * @throws ApplicationNameConflictException when the name is taken
     * @throws RuntimeException on wrong state / data problems (nothing written)
     */
    public static function approve(NewApplication $app): array
    {
        $coName = trim((string) ($app->draftData['org']['co_name'] ?? ''));
        if ($coName === '') {
            throw new RuntimeException('Application has no company name.');
        }

        $created = NewApplication::withNameLock($coName, static function () use ($app, $coName): array {
            return self::tx(static function () use ($app, $coName): array {
                // Lock + re-read so two staff clicking Approve at once
                // (or a double submit) cannot both create a customer.
                Db::one('SELECT id FROM new_applications WHERE id = ? FOR UPDATE', [$app->id]);
                $fresh = NewApplication::loadById($app->id);
                if ($fresh === null) {
                    throw new RuntimeException("Application {$app->id} not found.");
                }
                if ($fresh->status !== NewApplication::STATUS_AWAITING_REVIEW) {
                    throw new RuntimeException(
                        "Cannot approve: application {$fresh->id} is '{$fresh->status}' (must be awaiting_review)."
                    );
                }
                if ($fresh->amountCharged === null || $fresh->amountCharged <= 0) {
                    throw new RuntimeException('Refusing to approve: no charged amount is recorded for this application.');
                }

                // Section 3 hard rule — last line of defence.
                $conflict = NewApplication::findNameConflict($coName, $fresh->id);
                if ($conflict !== null) {
                    throw new ApplicationNameConflictException($conflict);
                }

                $draft   = $fresh->draftData;
                $org     = $draft['org']     ?? [];
                $contact = $draft['contact'] ?? [];
                $buyers  = is_array($draft['buyers'] ?? null) ? $draft['buyers'] : [];

                $level = NewApplication::getLevelForCategory((int) ($org['bus_cat_id'] ?? 0));
                if ($level === null) {
                    throw new RuntimeException('Cannot resolve a membership level for the application\'s business category.');
                }

                // Membership Since = submission date (NOT approval time);
                // renewal date = exactly one year later (Section 5).
                $since   = new DateTimeImmutable((string) ($fresh->submittedAt ?: $fresh->createdAt));
                $sinceDb = $since->format('Y-m-d 00:00:00');
                $renewDb = $since->modify('+1 year')->format('Y-m-d 00:00:00');

                $contactPhone = (string) (pfm_normalize_phone((string) ($contact['phone'] ?? '')) ?? '');

                // 1. the customer record
                $clientId = Db::insert(
                    'INSERT INTO clients
                        (co_name, mailing_address, city, state, zip_code,
                         website_url, acct_instagram, acct_facebook,
                         bus_cat_id, bus_subcat_id, pricing_level_id, memb_status_id,
                         main_contact_name, main_contact_email, main_contact_phone, main_contact_title,
                         permanent_member_date, renewal_date, appn_date, appn_note,
                         record_created, date_last_updated)
                     VALUES (?, ?, ?, ?, ?,  ?, ?, ?,  ?, ?, ?, 3,  ?, ?, ?, ?,  ?, ?, ?, ?,  NOW(), NOW())',
                    [
                        $coName,
                        self::nn($org['mailing_address'] ?? null), self::nn($org['city'] ?? null),
                        self::nn($org['state'] ?? null),           self::nn($org['zip_code'] ?? null),
                        self::nn($org['website_url'] ?? null), self::nn($org['acct_instagram'] ?? null),
                        self::nn($org['acct_facebook'] ?? null),
                        (int) ($org['bus_cat_id'] ?? 0), (int) ($org['bus_subcat_id'] ?? 0),
                        (int) $level['memb_lev_id'],
                        self::nn($contact['name'] ?? null), self::nn($contact['email'] ?? null),
                        $contactPhone !== '' ? $contactPhone : null, self::nn($contact['title'] ?? null),
                        $sinceDb, $renewDb, $since->format('Y-m-d 00:00:00'),
                        self::nn($fresh->customerNote),
                    ]
                );

                // 2. membership number = client_id (spec 13.4: verified against
                //    the data — recent customers all have MembershipID = client_id).
                $membershipNumber = $clientId;
                $clash = (int) Db::scalar(
                    'SELECT COUNT(*) FROM clients WHERE MembershipID = ? AND client_id <> ?',
                    [$membershipNumber, $clientId]
                );
                if ($clash > 0) {
                    throw new RuntimeException("Membership number {$membershipNumber} is already in use by another customer.");
                }
                Db::exec('UPDATE clients SET MembershipID = ? WHERE client_id = ?', [$membershipNumber, $clientId]);

                // 3. members — main contact first, then every additional buyer
                Db::insert(
                    "INSERT INTO members (client_id, member_name, email, phone1, main_contact, include)
                     VALUES (?, ?, ?, ?, b'1', b'1')",
                    [
                        $clientId, (string) ($contact['name'] ?? ''), self::nn($contact['email'] ?? null),
                        $contactPhone !== '' ? $contactPhone : null,
                    ]
                );
                $buyerCount = 1;
                foreach ($buyers as $b) {
                    $bName = trim((string) ($b['name'] ?? ''));
                    if ($bName === '') {
                        continue;
                    }
                    $bPhone = (string) (pfm_normalize_phone((string) ($b['phone'] ?? '')) ?? '');
                    Db::insert(
                        "INSERT INTO members (client_id, member_name, email, phone1, note, main_contact, include)
                         VALUES (?, ?, ?, ?, ?, b'0', b'1')",
                        [
                            $clientId, $bName, self::nn($b['email'] ?? null),
                            $bPhone !== '' ? $bPhone : null, self::nn($b['note'] ?? null),
                        ]
                    );
                    $buyerCount++;
                }

                // 4. the payment row (same shape confirm-receipt.php writes)
                $stripeId  = (string) ($fresh->paymentId ?? '');
                $reference = $fresh->getReferenceNumber() . ($stripeId !== '' ? ' / ' . $stripeId : '');
                $pmtId = Db::insert(
                    'INSERT INTO client_pmts (client_id, pmt_mode, reference, pmt_date, amt_received, remarks)
                     VALUES (?, ?, ?, ?, ?, ?)',
                    [
                        $clientId, 'Credit Card', $reference,
                        $fresh->paidAt ?: date('Y-m-d H:i:s'),
                        number_format((float) $fresh->amountCharged, 2, '.', ''),
                        'New membership application (Stripe via renewal_v2)',
                    ]
                );

                // 5. close the application out, linked to what was created
                $fresh->complete($clientId, $membershipNumber);

                return [
                    'client_id' => $clientId, 'membership_number' => $membershipNumber,
                    'client_pmt_id' => $pmtId, 'buyers' => $buyerCount,
                ];
            });
        });

        // ── After the commit: best-effort extras (never undo the approval) ──
        $fresh = NewApplication::loadById($app->id) ?? $app;
        [$docsTotal, $docsCopied] = self::copyDocuments($fresh, $created['client_id']);
        self::writeHistoryNote($fresh, $created);
        $email = self::sendApprovedEmail($fresh, $created['client_id']);

        return $created + ['docs_total' => $docsTotal, 'docs_copied' => $docsCopied, 'email' => $email];
    }

    /**
     * Run $fn in a transaction — or, if the caller already opened one
     * (the rollback-based tests do), inside that one.
     */
    private static function tx(callable $fn)
    {
        return Db::pdo()->inTransaction() ? $fn() : Db::transaction($fn);
    }

    private static function nn($v): ?string
    {
        $v = trim((string) ($v ?? ''));
        return $v !== '' ? $v : null;
    }

    /**
     * Mirror the wizard uploads into the legacy places staff already look:
     *   main_contact_id  → clients.main_contact_img_id (+ file name / size)
     *   business_license → clients.doc_sec_of_state and a client_docs row
     *                      "Active Secretary of State Registration"
     *   anything else    → client_docs "Other type of document"
     * (identical mapping to confirm-receipt.php steps 5g/5h). The original
     * files stay on disk under storage/uploads/app_<id>/ regardless.
     *
     * @return array{0:int,1:int} [documents in the application, documents copied]
     */
    private static function copyDocuments(NewApplication $app, int $clientId): array
    {
        $total = 0;
        $copied = 0;
        try {
            foreach (ApplicationDocumentUpload::getAll($app) as $key => $meta) {
                $total++;
                try {
                    $path = ApplicationDocumentUpload::getAbsolutePath($app, (string) $key);
                    if (!is_file($path) || !is_readable($path)) {
                        error_log("[new_application] approve: file missing for {$key} (application {$app->id})");
                        continue;
                    }
                    $bytes = file_get_contents($path);
                    if ($bytes === false || $bytes === '') {
                        continue;
                    }
                    $name = (string) ($meta['original_name'] ?? 'document');
                    $size = (string) ((int) ($meta['size'] ?? strlen($bytes)));

                    if ($key === 'main_contact_id') {
                        Db::exec(
                            'UPDATE clients SET main_contact_img_id = ?, main_contact_img_file = ?, main_contact_img_size = ? WHERE client_id = ?',
                            [$bytes, $name, $size, $clientId]
                        );
                    } else {
                        if ($key === 'business_license') {
                            Db::exec('UPDATE clients SET doc_sec_of_state = ? WHERE client_id = ?', [$bytes, $clientId]);
                        }
                        Db::exec(
                            "INSERT INTO client_docs (client_id, appn_id, doc_type, doc_file, doc_filename, doc_filesize, ts, user)
                             VALUES (?, 0, ?, ?, ?, ?, NOW(), 'renewal_v2')",
                            [
                                $clientId,
                                $key === 'business_license' ? 'Active Secretary of State Registration' : 'Other type of document',
                                $bytes, $name, $size,
                            ]
                        );
                    }
                    $copied++;
                } catch (Throwable $e) {
                    error_log("[new_application] approve: copy of {$key} failed for application {$app->id}: " . $e->getMessage());
                }
            }
        } catch (Throwable $e) {
            error_log("[new_application] approve: document copy block failed for application {$app->id}: " . $e->getMessage());
        }
        return [$total, $copied];
    }

    /** One dated row in the existing client_notes history (best-effort). */
    private static function writeHistoryNote(NewApplication $app, array $created): void
    {
        try {
            $d   = $app->draftData;
            $e   = static fn($s) => htmlspecialchars((string) $s, ENT_QUOTES);
            $html = '<p><strong>New membership application approved</strong> (' . $e($app->getReferenceNumber()) . ')</p><ul>'
                . '<li>Submitted: ' . $e($app->submittedAt) . '</li>'
                . '<li>Payment: $' . number_format((float) $app->amountCharged, 2) . ' via Stripe (' . $e($app->paymentId) . ')</li>'
                . '<li>Buyers at approval (incl. main contact): ' . (int) $created['buyers'] . '</li>'
                . '<li>Membership number: ' . (int) $created['membership_number'] . '</li>'
                . '<li>Main contact: ' . $e($d['contact']['name'] ?? '') . ' &lt;' . $e($d['contact']['email'] ?? '') . '&gt;</li>';
            $note = trim((string) $app->customerNote);
            if ($note !== '') {
                $html .= '<li>Applicant note: ' . nl2br($e($note), false) . '</li>';
            }
            $html .= '</ul>';
            Db::insert(
                'INSERT INTO client_notes (client_id, note, note_date, user) VALUES (?, ?, NOW(), ?)',
                [$created['client_id'], $html, 'renewal_v2']
            );
        } catch (Throwable $e) {
            error_log("[new_application] approve: history note failed for application {$app->id}: " . $e->getMessage());
        }
    }

    /**
     * The approval email is the SAME one renewals use (notif_id 2), built by
     * StripeClient::buildApprovedEmail. Addresses on reserved test domains
     * are not sent through the live mail relay.
     */
    private static function sendApprovedEmail(NewApplication $app, int $clientId): string
    {
        try {
            $mail = StripeClient::buildApprovedEmail($clientId, $app->getReferenceNumber());
            if ($mail === null) {
                return 'skipped: template or recipient missing';
            }
            if (ApplicationStripe::isReservedTestAddress($mail['to'])) {
                error_log("[new_application] approved email for {$app->getReferenceNumber()} not sent: {$mail['to']} is a reserved test domain.");
                return 'skipped: reserved test domain';
            }
            require_once __DIR__ . '/Mailer.php';
            [$ok, $detail] = Mailer::send($mail['to'], $mail['subject'], $mail['body'], true);
            error_log(sprintf('[new_application] approved email %s for %s to %s detail=%s',
                $ok ? 'sent' : 'FAILED', $app->getReferenceNumber(), $mail['to'], $detail));
            return $ok ? 'sent' : 'failed';
        } catch (Throwable $e) {
            error_log("[new_application] approved email error for application {$app->id}: " . $e->getMessage());
            return 'failed';
        }
    }

    // ===================================================================
    // DECLINE
    // ===================================================================

    /**
     * Compose the decline email from the 'declined_application'
     * notifications template (migration 023). Nothing is sent.
     *
     * @return array{to:string, subject:string, body:string, company:string}|null
     *         null when the template is missing or there is no recipient
     */
    public static function buildDeclineEmail(string $companyName, string $toEmail, string $reason): ?array
    {
        $template = Db::one(
            "SELECT msg_subject, msg_body FROM notifications
              WHERE descript = 'declined_application' AND active = b'1' LIMIT 1"
        );
        if (!$template || empty($template['msg_subject']) || empty($template['msg_body'])) {
            return null;
        }
        $toEmail = trim($toEmail);
        if ($toEmail === '') {
            return null;
        }
        $company = trim($companyName) !== '' ? trim($companyName) : 'Customer';

        $subject = str_replace(['~COMPANY NAME~', '~REASON~'], [$company, trim($reason)], (string) $template['msg_subject']);
        // Body is HTML: escape the free-text values, keep the reason's line breaks.
        $body = str_replace(
            ['~COMPANY NAME~', '~REASON~'],
            [htmlspecialchars($company, ENT_QUOTES), nl2br(htmlspecialchars(trim($reason), ENT_QUOTES), false)],
            (string) $template['msg_body']
        );
        if (defined('PFM_RNW_NOTIFY_SUBJECT_PREFIX') && PFM_RNW_NOTIFY_SUBJECT_PREFIX !== '') {
            $subject = PFM_RNW_NOTIFY_SUBJECT_PREFIX . $subject;
        }
        return ['to' => $toEmail, 'subject' => $subject, 'body' => $body, 'company' => $company];
    }

    /** Company name + recipient for a declined item, from whichever flow it belongs to. */
    public static function declineRecipient(object $item): array
    {
        if ($item instanceof NewApplication) {
            return [
                trim((string) ($item->draftData['org']['co_name'] ?? '')),
                trim((string) ($item->draftData['contact']['email'] ?? '')),
            ];
        }
        $c = Db::one(
            'SELECT co_name, main_contact_email, email FROM clients WHERE client_id = ?',
            [$item->clientId]
        ) ?? [];
        $to = trim((string) ($c['main_contact_email'] ?? ''));
        if ($to === '') {
            $to = trim((string) ($c['email'] ?? ''));
        }
        return [trim((string) ($c['co_name'] ?? '')), $to];
    }

    /**
     * Decline a paid application or renewal that is awaiting review, then
     * send the decline email. The DB change happens first and is
     * authoritative; the email is best-effort and its outcome returned.
     *
     * @param  NewApplication|RenewalSession $item
     * @return array{email:string}  sent | skipped:<why> | failed
     * @throws RuntimeException if not awaiting review / already decided
     * @throws InvalidArgumentException if the reason is empty
     */
    public static function decline(object $item, string $reason, string $declinedBy): array
    {
        if (trim($reason) === '') {
            throw new InvalidArgumentException('A decline reason is required.');
        }
        if ($item->status !== 'awaiting_review') {
            throw new RuntimeException("Only items awaiting review can be declined (this one is '{$item->status}').");
        }
        [$company, $to] = self::declineRecipient($item);
        $mail = self::buildDeclineEmail($company, $to, $reason);
        if ($mail === null) {
            throw new RuntimeException('Cannot decline: the decline email template or the customer\'s email address is missing.');
        }

        $item->decline(trim($reason), $declinedBy);

        try {
            if (ApplicationStripe::isReservedTestAddress($mail['to'])) {
                error_log("[review] decline email for item {$item->id} not sent: {$mail['to']} is a reserved test domain.");
                return ['email' => 'skipped: reserved test domain'];
            }
            require_once __DIR__ . '/Mailer.php';
            [$ok, $detail] = Mailer::send($mail['to'], $mail['subject'], $mail['body'], true);
            error_log(sprintf('[review] decline email %s for %s #%d to %s detail=%s',
                $ok ? 'sent' : 'FAILED', get_class($item), $item->id, $mail['to'], $detail));
            return ['email' => $ok ? 'sent' : 'failed'];
        } catch (Throwable $e) {
            error_log('[review] decline email error: ' . $e->getMessage());
            return ['email' => 'failed'];
        }
    }
}
