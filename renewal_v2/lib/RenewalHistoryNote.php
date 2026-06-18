<?php
/**
 * PFM Renewal v2 — Renewal History Note Builder (B1-a, 2026-06-17)
 *
 * Builds a structured HTML summary of everything that happened during
 * a single renewal and writes it into the existing PFM client_notes
 * table (the same table staff already check on the customer profile
 * for member history).
 *
 * Larissa's reply on 2026-06-17 approved the lower-cost B1-a option:
 *   "I would like to go with B1-a and use the existing Notes area for
 *    renewal change history. My reason is not only the lower cost,
 *    but also that the Notes section is already where staff look for
 *    customer/member history. I do not think we need two separate
 *    note/history areas if the existing Notes section can capture
 *    renewal history clearly."
 *
 * Items per her explicit list:
 *   - Buyer additions
 *   - Buyer removals
 *   - Contact information changes
 *   - Address changes
 *   - Document uploads
 *   - Renewal comments / notes
 *   - Payment confirmation
 *   - Approval date / status
 *
 * Each renewal becomes one new dated row in client_notes (notes_id
 * auto-increment, client_id, note mediumtext HTML, note_date = NOW(),
 * user = 'renewal_v2'). Matches the existing note format (other rows
 * use <p>-wrapped HTML written by users like 'larisu', 'ofga1941',
 * etc.) so the Notes grid renders it consistently.
 */

declare(strict_types=1);

require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/RenewalSession.php';
require_once __DIR__ . '/DocumentUpload.php';

class RenewalHistoryNote
{
    /**
     * Build the renewal-history note for a just-confirmed session and
     * INSERT it into client_notes. Non-fatal — caller wraps in try/catch
     * so a note-write failure can never roll back the payment commit.
     *
     * @return int Newly-inserted notes_id (or 0 on early return)
     */
    public static function buildAndStore(RenewalSession $session, int $clientPmtId): int
    {
        // Gather all the data first so the note generation is self-
        // contained — we'd rather render an empty section than half a
        // note if some lookup fails.
        $changes      = self::loadChanges($session->id);
        $documents    = DocumentUpload::getAll($session);
        $customerNote = (string) ($session->customerNote ?? '');
        $clientPmt    = self::loadClientPmt($clientPmtId);

        $html = self::renderHtml($session, $changes, $documents, $customerNote, $clientPmt);

        return Db::insert(
            'INSERT INTO client_notes (client_id, note, note_date, user)
             VALUES (?, ?, NOW(), ?)',
            [$session->clientId, $html, 'renewal_v2']
        );
    }

    /** @return array[] */
    private static function loadChanges(int $sessionId): array
    {
        return Db::all(
            'SELECT change_type, target_id, field_name, old_value, new_value, created_at
               FROM renewal_changes
              WHERE session_id = ?
              ORDER BY id ASC',
            [$sessionId]
        );
    }

    /** @return array|null */
    private static function loadClientPmt(int $clientPmtId): ?array
    {
        if ($clientPmtId <= 0) {
            return null;
        }
        return Db::one(
            'SELECT client_pmt_id, pmt_mode, reference, pmt_date, amt_received, remarks
               FROM client_pmts WHERE client_pmt_id = ?',
            [$clientPmtId]
        );
    }

    /**
     * @param array[]   $changes
     * @param array[]   $documents
     * @param array|null $clientPmt
     */
    private static function renderHtml(
        RenewalSession $session,
        array $changes,
        array $documents,
        string $customerNote,
        ?array $clientPmt
    ): string {
        $reference   = $session->getReferenceNumber();
        $amount      = $session->amountCharged !== null
            ? '$' . number_format((float) $session->amountCharged, 2)
            : '(amount unknown)';
        $paidAt      = $session->paidAt
            ? date('M j, Y g:i a', strtotime((string) $session->paidAt))
            : '—';
        $confirmedAt = $session->adminConfirmedAt
            ? date('M j, Y g:i a', strtotime((string) $session->adminConfirmedAt))
            : date('M j, Y g:i a');
        $stripeRef   = (string) ($session->paymentId ?? '');

        $h = static fn(?string $s): string => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');

        // Bucket the changes by type so we can render each section.
        $buyerAdded   = [];
        $buyerRemoved = [];
        $companyDiffs = []; // [ [field, old, new], ... ]
        $contactDiffs = [];
        $docNames     = [];

        foreach ($changes as $c) {
            $type = (string) ($c['change_type'] ?? '');
            switch ($type) {
                case RenewalSession::CHANGE_BUYER_ADDED:
                    $buyerAdded[] = (string) ($c['new_value'] ?? '');
                    break;
                case RenewalSession::CHANGE_BUYER_REMOVED:
                    $buyerRemoved[] = (string) ($c['old_value'] ?? '');
                    break;
                case RenewalSession::CHANGE_COMPANY_CHANGED:
                    $companyDiffs[] = [
                        'field' => (string) ($c['field_name'] ?? ''),
                        'old'   => (string) ($c['old_value']  ?? ''),
                        'new'   => (string) ($c['new_value']  ?? ''),
                    ];
                    break;
                case RenewalSession::CHANGE_CONTACT_CHANGED:
                    $contactDiffs[] = [
                        'field' => (string) ($c['field_name'] ?? ''),
                        'old'   => (string) ($c['old_value']  ?? ''),
                        'new'   => (string) ($c['new_value']  ?? ''),
                    ];
                    break;
                case RenewalSession::CHANGE_DOCUMENT_CHANGED:
                    $docNames[] = (string) ($c['new_value'] ?? '');
                    break;
            }
        }

        // Also pull the canonical document list from draft_data — the
        // changes table only records UPLOADS during the session, but the
        // customer may have come in with documents already attached.
        $allDocNames = [];
        foreach ($documents as $key => $doc) {
            $allDocNames[] = (string) ($doc['original_name'] ?? $key);
        }
        $allDocNames = array_values(array_unique(array_merge($allDocNames, $docNames)));

        // ── render ────────────────────────────────────────────────────
        $out  = '<p><strong>Renewal completed &mdash; ' . $h($reference)
              . ', ' . $h($amount) . ' paid ' . $h($paidAt) . '</strong></p>';

        $out .= '<p>'
              . 'Approved on ' . $h($confirmedAt) . '<br>';
        if ($stripeRef !== '') {
            $out .= 'Stripe reference: <code>' . $h($stripeRef) . '</code><br>';
        }
        if ($clientPmt !== null) {
            $out .= 'Payment record: <code>client_pmts #' . (int) $clientPmt['client_pmt_id'] . '</code> ('
                  . $h((string) $clientPmt['reference']) . ')';
        }
        $out .= '</p>';

        // Buyer changes
        if (!empty($buyerAdded) || !empty($buyerRemoved)) {
            $out .= '<p><strong>Buyer changes</strong></p><ul>';
            foreach ($buyerAdded as $name) {
                $out .= '<li>Added: ' . $h($name) . '</li>';
            }
            foreach ($buyerRemoved as $name) {
                $out .= '<li>Removed: ' . $h($name) . '</li>';
            }
            $out .= '</ul>';
        }

        // Company info diffs
        if (!empty($companyDiffs)) {
            $out .= '<p><strong>Company info changes</strong></p><ul>';
            foreach ($companyDiffs as $d) {
                $out .= '<li>'
                      . self::fieldLabel($d['field']) . ': '
                      . ($d['old'] !== '' ? $h($d['old']) : '<em>(empty)</em>')
                      . ' &rarr; '
                      . ($d['new'] !== '' ? $h($d['new']) : '<em>(empty)</em>')
                      . '</li>';
            }
            $out .= '</ul>';
        }

        // Main contact diffs
        if (!empty($contactDiffs)) {
            $out .= '<p><strong>Main contact changes</strong></p><ul>';
            foreach ($contactDiffs as $d) {
                $label = self::fieldLabel($d['field']);
                $out .= '<li>'
                      . $h($label) . ': '
                      . ($d['old'] !== '' ? $h($d['old']) : '<em>(empty)</em>')
                      . ' &rarr; '
                      . ($d['new'] !== '' ? $h($d['new']) : '<em>(empty)</em>')
                      . '</li>';
            }
            $out .= '</ul>';
        }

        // Documents (all attached to this renewal session)
        if (!empty($allDocNames)) {
            $out .= '<p><strong>Documents on this renewal</strong></p><ul>';
            foreach ($allDocNames as $name) {
                $out .= '<li>' . $h($name) . '</li>';
            }
            $out .= '</ul>';
        }

        // Customer's renewal comment
        if ($customerNote !== '') {
            $out .= '<p><strong>Customer&rsquo;s renewal comment:</strong> '
                  . $h($customerNote) . '</p>';
        }

        return $out;
    }

    /**
     * Human-friendly label for the renewal_changes.target_id field name
     * used when CHANGE_COMPANY_CHANGED is logged. submit-application.php
     * stores the underscore_db_col_name in target_id; we turn that into
     * "Mailing address" / "Business category" / etc. for the note.
     *
     * The list mirrors orgFields in submit-application.php; unknown
     * keys fall through to a Title-Cased version of the key.
     */
    private static function fieldLabel(string $key): string
    {
        static $map = [
            // Company / org section
            'co_name'            => 'Company name',
            'business_type'      => 'Business type',
            'business_license'   => 'Business license',
            'bus_cat_id'         => 'Business category',
            'bus_subcat_id'      => 'Business subcategory',
            'mailing_address'    => 'Mailing address',
            'city'               => 'City',
            'state'              => 'State',
            'zip_code'           => 'ZIP code',
            'website_url'        => 'Company website',
            'acct_instagram'     => 'Instagram',
            'acct_facebook'      => 'Facebook',
            'main_contact_title' => 'Main contact title',
            // Main contact section (members table column names that
            // submit-application.php passes through into field_name)
            'member_name'        => 'Contact name',
            'email'              => 'Contact email',
            'phone1'             => 'Contact phone',
        ];
        if (isset($map[$key])) {
            return $map[$key];
        }
        $pretty = preg_replace('/[_\\-]+/', ' ', $key);
        return $pretty !== null ? ucwords($pretty) : $key;
    }
}
