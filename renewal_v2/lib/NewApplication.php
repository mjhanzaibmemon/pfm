<?php
/**
 * PFM Renewal v2 — NewApplication
 *
 * Core class representing one new-customer application session.
 * Sibling to RenewalSession.php — same shape/method names/state machine
 * where the concepts overlap — but backed by its own `new_applications`
 * table (migration 018) instead of `renewal_sessions`, because a new
 * applicant has no existing `clients` row (no client_id) until staff
 * approves the application.
 *
 * Design rationale: NEW_CUSTOMER_APPLICATION_SPEC.md Section 13.2 at
 * the project root (project's master requirements + design doc for
 * this module — read that file first if you're picking this up cold).
 *
 * Key differences from RenewalSession:
 *   - No client_id field at all until `complete()` is called (staff
 *     approval materializes the real customer record — see
 *     admin/approve-application.php, not built yet as of this file).
 *   - Token is NOT validated against an external table (RenewalSession
 *     validates against sec_renewals, which a renewal email always
 *     pre-populates). A new applicant has no email link — loadOrCreate()
 *     here CREATES a fresh draft + token on first visit rather than
 *     rejecting an unrecognised token. See Section 13.5.
 *   - Has decline_at / decline_reason / declined_by (Section 6's
 *     decline workflow) and a genuine 'declined' status value —
 *     RenewalSession gets the equivalent via migration 020 for the
 *     renewal side of the same unified decline ability.
 *   - complete() takes the newly-created client_id + membership number
 *     as parameters (it CREATES the customer record; RenewalSession's
 *     confirm-receipt.php equivalent UPDATEs an existing one).
 *   - No change-log (renewal_changes) equivalent — that table tracks
 *     diffs against an existing customer's prior state, which doesn't
 *     apply to a brand-new application (there is no "before").
 *
 * Reference number prefix is "APP-" (vs RenewalSession's "RNW-") so
 * staff can tell at a glance, in emails and client_pmts.reference,
 * which flow a given record came through.
 */

declare(strict_types=1);

require_once __DIR__ . '/Db.php';

class NewApplication
{
    // States (matching DB ENUM — new_applications.status, migration 018)
    public const STATUS_DRAFT            = 'draft';
    public const STATUS_SUBMITTED        = 'submitted';
    public const STATUS_AWAITING_PAYMENT = 'awaiting_payment';
    public const STATUS_AWAITING_REVIEW  = 'awaiting_review';
    public const STATUS_COMPLETED        = 'completed';
    public const STATUS_CANCELLED        = 'cancelled';
    public const STATUS_DECLINED         = 'declined';

    // Application types (migration 024). Only 'annual' is implemented;
    // 'day_pass' is reserved for the future day-pass project (Section 7) and
    // is refused by pricing/checkout and approval until that is built.
    public const TYPE_ANNUAL   = 'annual';
    public const TYPE_DAY_PASS = 'day_pass';

    // Which statuses allow the applicant to still edit the form
    private const EDITABLE_STATUSES = [self::STATUS_DRAFT];

    // Which statuses count as "in progress" (non-terminal)
    private const ACTIVE_STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_SUBMITTED,
        self::STATUS_AWAITING_PAYMENT,
    ];

    // Terminal statuses — no further transitions allowed
    private const TERMINAL_STATUSES = [
        self::STATUS_COMPLETED,
        self::STATUS_CANCELLED,
        self::STATUS_DECLINED,
    ];

    public int $id;
    public string $token;
    public string $status;
    public string $applicationType;
    public int $currentStep;
    public array $draftData;
    public ?string $customerNote;
    public ?string $submittedAt;
    public ?string $stripeSessionId;
    public ?string $paymentId;
    public ?string $paidAt;
    public ?float $amountCharged;
    public string $createdAt;
    public string $updatedAt;

    // Admin-review workflow fields (same shape as RenewalSession Phase 4 fields)
    public ?string $adminReviewToken;
    public ?string $adminReviewedAt;
    public ?string $adminConfirmedAt;

    // Stripe receipt + card detail fields (same shape as RenewalSession)
    public ?string $stripeReceiptUrl;
    public ?string $stripeCardBrand;
    public ?string $stripeCardLast4;

    // Decline workflow fields (Section 6 — NOT present on RenewalSession
    // until migration 020 adds the equivalent for the renewal side)
    public ?string $declinedAt;
    public ?string $declineReason;
    public ?string $declinedBy;

    // Post-approval linkage — NULL until complete() runs
    public ?int $createdClientId;
    public ?int $membershipNumber;

    private function __construct(array $row)
    {
        $this->id               = (int) $row['id'];
        $this->token            = (string) $row['token'];
        $this->status           = (string) $row['status'];
        // Absent before migration 024 runs; every existing application is annual.
        $this->applicationType  = (string) ($row['application_type'] ?? self::TYPE_ANNUAL);
        $this->currentStep      = (int) $row['current_step'];
        $this->draftData        = $row['draft_data'] ? (json_decode((string) $row['draft_data'], true) ?: []) : [];
        $this->customerNote     = $row['customer_note'] ?? null;
        $this->submittedAt      = $row['submitted_at'] ?? null;
        $this->stripeSessionId  = $row['stripe_session_id'] ?? null;
        $this->paymentId        = $row['payment_id'] ?? null;
        $this->paidAt           = $row['paid_at'] ?? null;
        $this->amountCharged    = isset($row['amount_charged']) && $row['amount_charged'] !== null
            ? (float) $row['amount_charged'] : null;
        $this->createdAt        = (string) $row['created_at'];
        $this->updatedAt        = (string) $row['updated_at'];

        $this->adminReviewToken = $row['admin_review_token'] ?? null;
        $this->adminReviewedAt  = $row['admin_reviewed_at']  ?? null;
        $this->adminConfirmedAt = $row['admin_confirmed_at'] ?? null;

        $this->stripeReceiptUrl = $row['stripe_receipt_url'] ?? null;
        $this->stripeCardBrand  = $row['stripe_card_brand']  ?? null;
        $this->stripeCardLast4  = $row['stripe_card_last4']  ?? null;

        $this->declinedAt       = $row['declined_at']    ?? null;
        $this->declineReason    = $row['decline_reason'] ?? null;
        $this->declinedBy       = $row['declined_by']    ?? null;

        $this->createdClientId  = isset($row['created_client_id']) && $row['created_client_id'] !== null
            ? (int) $row['created_client_id'] : null;
        $this->membershipNumber = isset($row['membership_number']) && $row['membership_number'] !== null
            ? (int) $row['membership_number'] : null;
    }

    /**
     * Human-readable reference number shown to the applicant + written
     * into client_pmts.reference (once approved) so staff can search by
     * it. "APP-" prefix distinguishes it from a renewal's "RNW-" at a
     * glance in shared views like client_pmts or the Application
     * Reviews queue (Section 2).
     */
    public function getReferenceNumber(): string
    {
        return 'APP-' . $this->id;
    }

    /**
     * Persist Stripe receipt + card details fetched from a Payment Intent
     * (with expanded latest_charge). Mirrors
     * RenewalSession::saveStripePaymentDetails exactly — same
     * best-effort, non-throwing behaviour so a detail-save failure never
     * blocks payment processing.
     */
    public function saveStripePaymentDetails(
        ?string $receiptUrl,
        ?string $cardBrand,
        ?string $cardLast4
    ): void {
        try {
            Db::exec(
                'UPDATE new_applications
                    SET stripe_receipt_url = ?,
                        stripe_card_brand  = ?,
                        stripe_card_last4  = ?,
                        updated_at         = NOW()
                  WHERE id = ?',
                [
                    $receiptUrl !== null ? mb_substr($receiptUrl, 0, 500) : null,
                    $cardBrand  !== null ? mb_substr($cardBrand,  0, 20)  : null,
                    $cardLast4  !== null ? mb_substr($cardLast4,  0, 4)   : null,
                    $this->id,
                ]
            );
            $this->stripeReceiptUrl = $receiptUrl;
            $this->stripeCardBrand  = $cardBrand;
            $this->stripeCardLast4  = $cardLast4;
        } catch (\Throwable $e) {
            error_log(sprintf(
                '[new_application] saveStripePaymentDetails failed for application %d: %s',
                $this->id, $e->getMessage()
            ));
        }
    }

    // ===== FACTORY METHODS =====

    /**
     * Load an existing draft by token, or create a fresh one if the
     * token is empty/unrecognised. THIS IS THE KEY DIFFERENCE from
     * RenewalSession::loadOrCreate() — a renewal token must pre-exist
     * in sec_renewals (created by staff clicking "Email" on the
     * Renewals grid) and an unrecognised token is a hard failure. A
     * new applicant has no such pre-existing token — the public entry
     * page (Section 13.5) calls this with whatever token is in the
     * applicant's session cookie (or '' on a brand-new visit), and
     * either resumes their draft or starts one.
     *
     * Only DRAFT applications are resumable this way — once submitted/
     * paid/reviewed, the applicant has nothing left to edit, so a stale
     * cookie pointing at a non-draft application intentionally does NOT
     * resume; the caller (apply_bootstrap.php) should treat that case
     * as "start a fresh application" rather than surface old state.
     * (This mirrors the spirit of RenewalSession's stale-token handling
     * in public/index.php, adapted for the no-token-source difference.)
     *
     * @param string $token Token from the applicant's session cookie, or ''
     */
    public static function loadOrCreate(string $token): self
    {
        if ($token !== '' && strlen($token) <= 50) {
            $row = Db::one(
                'SELECT * FROM new_applications WHERE token = ? LIMIT 1',
                [$token]
            );
            if ($row !== null) {
                // Resume for ANY non-dead-end status — not just draft.
                // A customer who paid and is now sitting in
                // 'awaiting_payment' / 'awaiting_review' / 'completed'
                // must see THEIR status when they revisit (index.php's
                // status-based routing sends them to Step 7 or Step 8,
                // same as the renewal wizard) — creating a second fresh
                // application here would be wrong and would look like
                // their payment "disappeared." Only a genuinely
                // dead-end status (cancelled/declined) falls through to
                // start fresh, since there is nothing left to resume
                // into for those.
                if (!in_array($row['status'], [self::STATUS_CANCELLED, self::STATUS_DECLINED], true)) {
                    return new self($row);
                }
            }
            // No row, or a cancelled/declined dead-end — fall through
            // to create a fresh application. Any old row is untouched
            // and stays in the Application Reviews queue on its own
            // terms (audit trail preserved per Section 6).
        }

        $newToken = self::generateToken();
        $id = Db::insert(
            'INSERT INTO new_applications
                (token, status, current_step, draft_data)
             VALUES (?, ?, 1, ?)',
            [$newToken, self::STATUS_DRAFT, json_encode(new \stdClass())]
        );

        $newRow = Db::one('SELECT * FROM new_applications WHERE id = ?', [$id]);
        // $newRow cannot be null here — we just inserted it in the same
        // connection/transaction context — but guard defensively rather
        // than assert, matching the rest of this codebase's style.
        if ($newRow === null) {
            throw new \RuntimeException('Failed to load new_applications row immediately after insert.');
        }

        return new self($newRow);
    }

    /**
     * Generate a fresh, URL-safe token for a brand-new application.
     * 32 hex chars (16 random bytes) — same size/format as
     * RenewalSession's admin_review_token, comfortably inside the
     * VARCHAR(50) column budget with room to spare.
     */
    private static function generateToken(): string
    {
        return bin2hex(random_bytes(16));
    }

    /**
     * Load an application by its primary key. Returns null if not found.
     */
    public static function loadById(int $id): ?self
    {
        $row = Db::one('SELECT * FROM new_applications WHERE id = ?', [$id]);
        return $row !== null ? new self($row) : null;
    }

    /**
     * Load an application by its token string (exact match).
     * Returns null if not found — unlike loadOrCreate(), this never
     * creates a new row. Used where "does this token exist at all"
     * is the question (e.g. an admin looking up a specific application).
     */
    public static function loadByToken(string $token): ?self
    {
        if ($token === '') {
            return null;
        }
        $row = Db::one(
            'SELECT * FROM new_applications WHERE token = ? LIMIT 1',
            [$token]
        );
        return $row !== null ? new self($row) : null;
    }

    /**
     * Load an application by its admin_review_token (the one sent to
     * staff via email / shown in the Application Reviews queue).
     * Returns null if no application has that token.
     */
    public static function loadByAdminToken(string $adminToken): ?self
    {
        if ($adminToken === '' || strlen($adminToken) > 50) {
            return null;
        }
        $row = Db::one(
            'SELECT * FROM new_applications WHERE admin_review_token = ? LIMIT 1',
            [$adminToken]
        );
        return $row !== null ? new self($row) : null;
    }

    // ===== DUPLICATE-NAME DETECTION (Section 3) =====

    /**
     * Normalize a company name using the EXACT same transformation as
     * the `clients.co_name_normalized` generated column (migration
     * 019) — lowercase, trim, strip periods/apostrophes, collapse
     * repeated spaces. Deliberately preserves business suffixes
     * (LLC/Inc/Co/LLP) per Larissa's explicit correction — see Section
     * 3 and migration 019's header comment for the full rationale.
     *
     * MUST stay byte-for-byte in sync with migration 019's SQL
     * expression, or the duplicate check silently stops matching
     * correctly. If you ever change one, change both and re-verify
     * with a spot-check query (see migration 019's VERIFY section).
     */
    public static function normalizeCompanyName(string $name): string
    {
        $name = trim($name);
        $name = str_replace(['.', "'"], '', $name);
        $name = preg_replace('/\s+/', ' ', $name) ?? $name;
        return mb_strtolower($name);
    }

    /**
     * Check whether a company name already exists in the customer
     * database (Section 3's hard-stop duplicate check). Returns the
     * matching clients row (client_id, co_name) if found, or null if
     * the name is clear to use.
     *
     * Callers (the Organization step + its API endpoint) are
     * responsible for showing Section 3's exact block message and
     * refusing to let the applicant proceed — this method only answers
     * "does a match exist," it does not enforce anything itself.
     */
    public static function findDuplicateByCompanyName(string $companyName): ?array
    {
        $normalized = self::normalizeCompanyName($companyName);
        if ($normalized === '') {
            return null;
        }
        return Db::one(
            'SELECT client_id, co_name FROM clients WHERE co_name_normalized = ? LIMIT 1',
            [$normalized]
        );
    }

    /**
     * Membership level for a business category, shaped exactly like
     * StripeClient::getClientLevel() so it can be fed straight into
     * StripeClient::pricingBreakdown(). A new applicant has no
     * clients.pricing_level_id yet — the level comes from the category
     * picked on Step 2 (bus_categories.memb_lev_id → members_level).
     * Single source of truth for Steps 4, 6 and the Stripe amount;
     * price changes Larissa makes in members_level flow through
     * automatically.
     *
     * @return array|null members_level row (memb_lev_id, pricing_level,
     *                    curr_price, num_of_buyers, price_after) or null
     *                    if the category/level can't be resolved
     */
    public static function getLevelForCategory(int $busCatId): ?array
    {
        if ($busCatId <= 0) {
            return null;
        }
        $level = Db::one(
            'SELECT ml.memb_lev_id, ml.pricing_level, ml.curr_price,
                    ml.num_of_buyers, ml.price_after
               FROM bus_categories bc
               JOIN members_level ml ON ml.memb_lev_id = bc.memb_lev_id
              WHERE bc.bus_cat_id = ? LIMIT 1',
            [$busCatId]
        );
        if ($level === null) {
            return null;
        }
        $level['memb_lev_id']   = (int) $level['memb_lev_id'];
        $level['curr_price']    = (float) $level['curr_price'];
        $level['num_of_buyers'] = (int) $level['num_of_buyers'];
        $level['price_after']   = $level['price_after'] !== null ? (float) $level['price_after'] : 0.0;
        return $level;
    }

    /**
     * Total buyers this application will be priced for: the main
     * contact (always counted) plus every entry in draft_data.buyers.
     */
    public function totalBuyerCount(): int
    {
        $buyers = $this->draftData['buyers'] ?? [];
        return 1 + (is_array($buyers) ? count($buyers) : 0);
    }

    /**
     * Larissa's EXACT block message for a duplicate company name
     * (Section 3) — do not paraphrase. Plain-text form for API errors
     * and server-rendered alerts; Step 2's hidden alert carries the
     * same wording with a mailto link.
     */
    public const DUPLICATE_NAME_MESSAGE =
        'We may already have a customer record for this business. '
        . 'Please contact the Portland Flower Market at info@ofgaflowers.com '
        . 'or 503-289-1500 so we can confirm your account and provide the '
        . 'correct renewal link.';

    /**
     * Authoritative pre-submit validation, shared by the Step 6 page
     * (to show problems and disable Submit) and the submit endpoint
     * (to actually refuse). The browser-side checks on Steps 2/3/5 are
     * UX only — this is the gate.
     *
     * Re-runs the duplicate-name check on purpose: the applicant may
     * have passed Step 2 days ago, and a customer with the same name
     * could have been created since.
     *
     * @return array<int, array{step:int, code:string, message:string}>
     *         Empty when the application is ready to submit.
     */
    public function validateForSubmit(): array
    {
        $problems = [];
        $add = static function (int $step, string $code, string $message) use (&$problems): void {
            $problems[] = ['step' => $step, 'code' => $code, 'message' => $message];
        };

        $org     = $this->draftData['org']       ?? [];
        $contact = $this->draftData['contact']   ?? [];
        $docs    = $this->draftData['documents'] ?? [];
        $buyers  = $this->draftData['buyers']    ?? [];

        // ── Step 2: organization ──
        $orgRequired = [
            'co_name'         => 'Company name',
            'bus_cat_id'      => 'Business category',
            'bus_subcat_id'   => 'Business subcategory',
            'mailing_address' => 'Mailing street address',
            'city'            => 'City',
            'state'           => 'State',
            'zip_code'        => 'ZIP code',
        ];
        foreach ($orgRequired as $field => $label) {
            if (trim((string) ($org[$field] ?? '')) === '') {
                $add(2, 'missing_org_field', "{$label} is required.");
            }
        }
        $zip = trim((string) ($org['zip_code'] ?? ''));
        if ($zip !== '' && !preg_match('/^\d{5}(-\d{4})?$/', $zip)) {
            $add(2, 'invalid_zip', 'ZIP code must be 5 digits (or ZIP+4).');
        }

        $catId    = (int) ($org['bus_cat_id']    ?? 0);
        $subcatId = (int) ($org['bus_subcat_id'] ?? 0);
        if ($catId > 0 && $subcatId > 0) {
            $match = Db::one(
                'SELECT 1 AS ok FROM bus_subcats WHERE bus_subcat_id = ? AND bus_cat_id = ? LIMIT 1',
                [$subcatId, $catId]
            );
            if ($match === null) {
                $add(2, 'subcat_mismatch', 'The selected subcategory does not belong to the selected business category.');
            }
        }
        if ($catId > 0 && self::getLevelForCategory($catId) === null) {
            $add(2, 'no_pricing_level', 'We could not determine a membership level for your business category.');
        }

        $coName = trim((string) ($org['co_name'] ?? ''));
        if ($coName !== '' && self::findNameConflict($coName, $this->id) !== null) {
            $add(2, 'duplicate_name', self::DUPLICATE_NAME_MESSAGE);
        }

        // ── Step 3: main contact ──
        $contactRequired = [
            'name'  => 'Main contact name',
            'phone' => 'Main contact phone',
            'title' => 'Main contact title',
        ];
        foreach ($contactRequired as $field => $label) {
            if (trim((string) ($contact[$field] ?? '')) === '') {
                $add(3, 'missing_contact_field', "{$label} is required.");
            }
        }
        $email = trim((string) ($contact['email'] ?? ''));
        if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $add(3, 'invalid_contact_email', 'A valid main contact email is required.');
        }

        // ── Step 4: buyers ──
        if (!is_array($buyers)) {
            $buyers = [];
        }
        if ($this->totalBuyerCount() > 50) {
            $add(4, 'too_many_buyers', 'A membership can include at most 50 buyers (including the main contact).');
        }
        foreach ($buyers as $i => $b) {
            if (!is_array($b) || trim((string) ($b['name'] ?? '')) === '') {
                $add(4, 'buyer_missing_name', 'Buyer #' . ($i + 1) . ' is missing a name.');
            }
        }

        // ── Documents (Step 3 ID + Step 5 registry) ──
        if (empty($docs['main_contact_id'])) {
            $add(3, 'missing_document', "Main contact's driver's license / photo ID is missing. Please upload it on Step 3.");
        }
        if (empty($docs['business_license'])) {
            $add(5, 'missing_document', 'Business Registry document is missing. Please upload it on Step 5 (a previous upload may not have finished).');
        }

        return $problems;
    }

    /**
     * How long an UNPAID submitted application keeps claiming its company
     * name. A paid application (awaiting_review) claims it until staff
     * decide; an unpaid one (submitted / awaiting_payment) that nobody has
     * touched for this many days is treated as abandoned so it can't block
     * a legitimate applicant forever (there is no staff tool to cancel
     * unpaid applications, and Stripe Checkout links expire within a day).
     */
    public const UNPAID_CLAIM_DAYS = 7;

    /**
     * Full duplicate-name check: existing customers (clients) AND other
     * applications already past the draft stage. Closes the gap where
     * two applicants with the same company name both pass a clients-only
     * check because neither is a customer record yet.
     *
     * Used by the live Step 2 check, validateForSubmit(), and — REQUIRED
     * — the approval endpoint (Section 13.8), which must call it again
     * with the application's own id excluded so staff can never create a
     * second customer record with the same name.
     *
     * Which other applications count as a claim: paid ones awaiting review
     * always; unpaid submitted ones only while recent (UNPAID_CLAIM_DAYS).
     * Drafts never (someone typing a name must not block anyone);
     * cancelled/declined never; completed ones are already `clients` rows.
     *
     * @param  int  $excludeApplicationId  The caller's own application id
     *                                     (0 = exclude nothing).
     * @param  bool $includeUnpaid         false at APPROVAL time: an unpaid
     *                                     application can't be approved, so
     *                                     it must not block approving a paid
     *                                     one (if it pays later, it will hit
     *                                     the customer conflict in review).
     * @return array|null  ['source' => 'customer', 'client_id' => int] or
     *                     ['source' => 'application', 'application_id' => int],
     *                     null when the name is clear.
     */
    public static function findNameConflict(
        string $companyName,
        int $excludeApplicationId = 0,
        bool $includeUnpaid = true
    ): ?array {
        $normalized = self::normalizeCompanyName($companyName);
        if ($normalized === '') {
            return null;
        }

        $client = self::findDuplicateByCompanyName($companyName);
        if ($client !== null) {
            return ['source' => 'customer', 'client_id' => (int) $client['client_id']];
        }

        $unpaidClause = $includeUnpaid
            ? "OR (status IN ('submitted','awaiting_payment') AND updated_at >= NOW() - INTERVAL " . (int) self::UNPAID_CLAIM_DAYS . " DAY)"
            : '';
        $pending = Db::one(
            "SELECT id FROM new_applications
              WHERE co_name_normalized = ? AND id <> ?
                AND (status = 'awaiting_review' {$unpaidClause}) LIMIT 1",
            [$normalized, $excludeApplicationId]
        );
        if ($pending !== null) {
            return ['source' => 'application', 'application_id' => (int) $pending['id']];
        }

        return null;
    }

    /**
     * Run $fn while holding a MySQL advisory lock keyed on the
     * normalized company name, so two simultaneous submits of the same
     * name are serialized: the second one's validation runs only after
     * the first one's submit() has committed, and therefore sees it.
     * (Db uses one non-persistent PDO connection per request, so the
     * lock is released at the latest when the request ends.)
     *
     * @throws \RuntimeException if the lock can't be obtained in 10s
     */
    public static function withNameLock(string $companyName, callable $fn)
    {
        $normalized = self::normalizeCompanyName($companyName);
        if ($normalized === '') {
            return $fn();
        }

        $lockName = 'pfm_newapp_name_' . md5($normalized);
        $got = (int) Db::scalar('SELECT GET_LOCK(?, 10)', [$lockName]);
        if ($got !== 1) {
            throw new \RuntimeException('Could not acquire company-name lock; please try again.');
        }
        try {
            return $fn();
        } finally {
            Db::scalar('SELECT RELEASE_LOCK(?)', [$lockName]);
        }
    }

    // ===== DRAFT MANAGEMENT (identical shape to RenewalSession) =====

    /**
     * Save/merge draft data and update the current step. $data is
     * shallow-merged into existing draftData so callers can send only
     * the keys they changed. Pass null for $step to keep it unchanged.
     * Only allowed while status === 'draft'.
     *
     * @throws \RuntimeException if the application is not in draft state
     */
    public function saveDraft(array $data, ?int $step = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new \RuntimeException(
                "Cannot save draft: application {$this->id} is in state '{$this->status}'"
            );
        }

        $merged = array_merge($this->draftData, $data);
        $this->draftData = $merged;

        if ($step !== null && $step >= 1 && $step <= 8) {
            // Only advance forward, never regress (same rationale as
            // RenewalSession — progress-bar accuracy when the
            // applicant clicks back).
            if ($step > $this->currentStep) {
                $this->currentStep = $step;
            }
        }

        Db::exec(
            'UPDATE new_applications
                SET draft_data = ?, current_step = ?, updated_at = NOW()
              WHERE id = ?',
            [json_encode($this->draftData), $this->currentStep, $this->id]
        );
    }

    /**
     * Replace the entire draft_data blob in one shot. Same
     * editable-state restriction as saveDraft().
     *
     * @throws \RuntimeException if the application is not in draft state
     */
    public function replaceDraft(array $data, ?int $step = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new \RuntimeException(
                "Cannot replace draft: application {$this->id} is in state '{$this->status}'"
            );
        }

        $this->draftData = $data;

        if ($step !== null && $step >= 1 && $step <= 8) {
            $this->currentStep = $step;
        }

        Db::exec(
            'UPDATE new_applications
                SET draft_data = ?, current_step = ?, updated_at = NOW()
              WHERE id = ?',
            [json_encode($this->draftData), $this->currentStep, $this->id]
        );
    }

    // ===== STATE TRANSITIONS =====

    /**
     * Transition: draft → submitted
     *
     * @throws \RuntimeException if not currently in draft
     */
    public function submit(?string $customerNote = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new \RuntimeException(
                "Cannot submit: application {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status       = self::STATUS_SUBMITTED;
        $this->submittedAt  = date('Y-m-d H:i:s');
        $this->customerNote = $customerNote;
        // Payment (Step 7) is where the applicant is now.
        $this->currentStep  = max($this->currentStep, 7);

        // Claim the company name for findNameConflict() (migration 022).
        $normalizedName = self::normalizeCompanyName((string) ($this->draftData['org']['co_name'] ?? ''));

        Db::exec(
            'UPDATE new_applications
                SET status = ?, submitted_at = NOW(), customer_note = ?,
                    co_name_normalized = ?, current_step = ?, updated_at = NOW()
              WHERE id = ?',
            [
                self::STATUS_SUBMITTED, $customerNote,
                $normalizedName !== '' ? $normalizedName : null,
                $this->currentStep, $this->id,
            ]
        );
    }

    /**
     * Transition: submitted → awaiting_payment
     *
     * @throws \RuntimeException if not currently submitted
     */
    public function setStripeSession(string $stripeSessionId): void
    {
        if ($this->status !== self::STATUS_SUBMITTED) {
            throw new \RuntimeException(
                "Cannot set Stripe session: application {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status          = self::STATUS_AWAITING_PAYMENT;
        $this->stripeSessionId = $stripeSessionId;

        Db::exec(
            'UPDATE new_applications
                SET status = ?, stripe_session_id = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_AWAITING_PAYMENT, $stripeSessionId, $this->id]
        );
    }

    /**
     * Transition: submitted | awaiting_payment → awaiting_review
     *
     * Called by the Stripe webhook, same orphan-payment protection
     * rationale as RenewalSession::markPaid() — accepts either prior
     * state so a local setStripeSession() failure after Stripe Checkout
     * was already created doesn't strand a successful payment.
     *
     * @param string $paymentId     Stripe payment_intent or charge ID
     * @param float  $amountCharged Amount in dollars (not cents)
     * @throws \RuntimeException if not currently submitted or awaiting_payment
     */
    public function markPaid(string $paymentId, float $amountCharged): void
    {
        $validPriorStates = [self::STATUS_SUBMITTED, self::STATUS_AWAITING_PAYMENT];
        if (!in_array($this->status, $validPriorStates, true)) {
            throw new \RuntimeException(
                "Cannot mark paid: application {$this->id} is in state '{$this->status}' "
                . "(expected submitted or awaiting_payment)"
            );
        }

        $this->status        = self::STATUS_AWAITING_REVIEW;
        $this->paymentId     = $paymentId;
        $this->amountCharged = $amountCharged;
        $this->paidAt        = date('Y-m-d H:i:s');

        Db::exec(
            'UPDATE new_applications
                SET status = ?, payment_id = ?, amount_charged = ?, paid_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_AWAITING_REVIEW, $paymentId, $amountCharged, $this->id]
        );
    }

    /**
     * Reset from 'awaiting_payment' back to 'submitted' so a new Stripe
     * Checkout can be created (expired checkout link, applicant closed
     * the Stripe tab, etc.). Clears stripe_session_id.
     *
     * @throws \RuntimeException if not in awaiting_payment state
     */
    public function resetForPaymentRetry(): void
    {
        if ($this->status !== self::STATUS_AWAITING_PAYMENT) {
            throw new \RuntimeException(
                "Cannot reset for retry: application {$this->id} is in state '{$this->status}' "
                . "(expected awaiting_payment)"
            );
        }

        $this->status          = self::STATUS_SUBMITTED;
        $this->stripeSessionId = null;

        Db::exec(
            'UPDATE new_applications
                SET status = ?, stripe_session_id = NULL, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_SUBMITTED, $this->id]
        );
    }

    /**
     * Transition: awaiting_review → completed — APPROVAL.
     *
     * Unlike RenewalSession::complete() (which just flips a status on
     * an already-existing customer), this is called AFTER
     * admin/approve-application.php has already INSERTed the real
     * `clients` row + members + client_pmts (Section 13.8) — this
     * method's job is only to record that linkage on the application
     * row itself and flip its own status. It does NOT create anything;
     * the caller must pass in the IDs of what it already created.
     *
     * @param int $createdClientId  The new clients.client_id just created
     * @param int $membershipNumber The MembershipID assigned (Section 13.4 —
     *                               = $createdClientId per the data-verified
     *                               convention, but passed explicitly rather
     *                               than assumed here, so the caller stays
     *                               the single source of truth for that
     *                               decision)
     * @throws \RuntimeException if not currently awaiting_review
     */
    public function complete(int $createdClientId, int $membershipNumber): void
    {
        if ($this->status !== self::STATUS_AWAITING_REVIEW) {
            throw new \RuntimeException(
                "Cannot complete: application {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status           = self::STATUS_COMPLETED;
        $this->createdClientId  = $createdClientId;
        $this->membershipNumber = $membershipNumber;

        Db::exec(
            'UPDATE new_applications
                SET status = ?, created_client_id = ?, membership_number = ?,
                    admin_confirmed_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_COMPLETED, $createdClientId, $membershipNumber, $this->id]
        );
    }

    /**
     * Transition: any non-terminal state → declined — Section 6's
     * decline workflow. Deliberately does NOT touch any other table —
     * per Section 6, declining a new application must create nothing
     * (no client, no membership number, no payment record beyond
     * whatever the applicant already paid through Stripe, which
     * Larissa refunds manually and separately from this call).
     *
     * Caller (admin/decline-application.php, not built yet as of this
     * file) is responsible for the refund-confirmed checkbox gate and
     * for sending the decline email — this method only records the
     * decline itself.
     *
     * @throws \RuntimeException if already in a terminal state
     */
    public function decline(string $reason, string $declinedBy): void
    {
        if (in_array($this->status, self::TERMINAL_STATUSES, true)) {
            throw new \RuntimeException(
                "Cannot decline: application {$this->id} is already in terminal state '{$this->status}'"
            );
        }
        if (trim($reason) === '') {
            throw new \InvalidArgumentException('Decline reason cannot be empty (Section 6 requires it).');
        }

        $this->status        = self::STATUS_DECLINED;
        $this->declinedAt    = date('Y-m-d H:i:s');
        $this->declineReason = $reason;
        $this->declinedBy    = $declinedBy;

        Db::exec(
            'UPDATE new_applications
                SET status = ?, declined_at = NOW(), decline_reason = ?, declined_by = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_DECLINED, $reason, $declinedBy, $this->id]
        );
    }

    /**
     * Transition: any non-terminal state → cancelled. Kept distinct
     * from decline() — cancelled means the applicant walked away or a
     * stale draft was superseded (loadOrCreate()'s fresh-draft path);
     * declined means staff actively rejected it after review. Mirrors
     * the same distinction migration 020 draws for renewal_sessions.
     *
     * @throws \RuntimeException if already in a terminal state
     */
    public function cancel(): void
    {
        if (in_array($this->status, self::TERMINAL_STATUSES, true)) {
            throw new \RuntimeException(
                "Cannot cancel: application {$this->id} is already in terminal state '{$this->status}'"
            );
        }

        $this->status = self::STATUS_CANCELLED;

        Db::exec(
            'UPDATE new_applications
                SET status = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_CANCELLED, $this->id]
        );
    }

    // ===== ADMIN-SIDE REVIEW WORKFLOW =====

    /**
     * Generate and store a unique admin_review_token, embedded in the
     * link staff use to open this application's review page. Idempotent
     * — re-calling returns the existing token if one was already
     * generated, so re-sending a staff notification reuses the same URL.
     *
     * @return string The token (32-char hex)
     */
    public function ensureAdminReviewToken(): string
    {
        if ($this->adminReviewToken !== null && $this->adminReviewToken !== '') {
            return $this->adminReviewToken;
        }

        $token = bin2hex(random_bytes(16));

        Db::exec(
            'UPDATE new_applications
                SET admin_review_token = ?, updated_at = NOW()
              WHERE id = ?',
            [$token, $this->id]
        );

        $this->adminReviewToken = $token;
        return $token;
    }

    /**
     * Mark the moment staff first opened the admin review page.
     * Idempotent — only writes if not already marked.
     */
    public function markAdminReviewed(): void
    {
        if ($this->adminReviewedAt !== null) {
            return;
        }

        $now = date('Y-m-d H:i:s');
        Db::exec(
            'UPDATE new_applications
                SET admin_reviewed_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [$this->id]
        );
        $this->adminReviewedAt = $now;
    }

    /**
     * Convenience: true while staff have NOT yet approved (Confirm) or
     * declined a paid, pending application.
     */
    public function isAwaitingAdminConfirmation(): bool
    {
        return $this->adminConfirmedAt === null
            && $this->declinedAt === null
            && $this->isPaid();
    }

    // ===== QUERY HELPERS (identical shape to RenewalSession) =====

    /**
     * True while the applicant can still edit the form (draft only).
     */
    public function isEditable(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    /**
     * True while the application is in a non-terminal / "in progress" state.
     */
    public function isActive(): bool
    {
        return in_array($this->status, self::ACTIVE_STATUSES, true);
    }

    /**
     * True once the applicant has paid (awaiting_review or completed).
     * Note: a DECLINED application can also have been paid (Larissa
     * refunds it manually, separately from this flag) — callers that
     * need to distinguish "paid and pending" from "paid and declined"
     * should check status directly, not just isPaid().
     */
    public function isPaid(): bool
    {
        return in_array($this->status, [self::STATUS_AWAITING_REVIEW, self::STATUS_COMPLETED], true)
            || ($this->status === self::STATUS_DECLINED && $this->paidAt !== null);
    }

    // ===== SERIALISATION =====

    /**
     * Return a plain array safe to JSON-encode for API responses.
     * Never exposes the raw token — callers already have it.
     */
    public function toArray(): array
    {
        return [
            'id'                 => $this->id,
            'status'             => $this->status,
            'current_step'       => $this->currentStep,
            'draft_data'         => $this->draftData,
            'customer_note'      => $this->customerNote,
            'submitted_at'       => $this->submittedAt,
            'stripe_session_id'  => $this->stripeSessionId,
            'payment_id'         => $this->paymentId,
            'paid_at'            => $this->paidAt,
            'amount_charged'     => $this->amountCharged,
            'created_at'         => $this->createdAt,
            'updated_at'         => $this->updatedAt,
            'declined_at'        => $this->declinedAt,
            'decline_reason'     => $this->declineReason,
            'created_client_id'  => $this->createdClientId,
            'membership_number'  => $this->membershipNumber,
            'is_editable'        => $this->isEditable(),
            'is_paid'            => $this->isPaid(),
        ];
    }
}
