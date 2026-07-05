<?php
/**
 * PFM Renewal v2 — RenewalSession
 *
 * Core class representing one customer renewal session.
 * Handles token validation, session create/resume, draft auto-save,
 * state transitions, and change logging.
 *
 * Spec: Section 2 (states), Section 5 (auto-save), Step 1 (tokens)
 */

declare(strict_types=1);

require_once __DIR__ . '/Db.php';

class RenewalSession
{
    // States (matching DB ENUM)
    public const STATUS_DRAFT            = 'draft';
    public const STATUS_SUBMITTED        = 'submitted';
    public const STATUS_AWAITING_PAYMENT = 'awaiting_payment';
    public const STATUS_AWAITING_REVIEW  = 'awaiting_review';
    public const STATUS_COMPLETED        = 'completed';
    public const STATUS_CANCELLED        = 'cancelled';

    // Change types (matching DB ENUM)
    public const CHANGE_BUYER_ADDED      = 'buyer_added';
    public const CHANGE_BUYER_REMOVED    = 'buyer_removed';
    public const CHANGE_BUYER_MODIFIED   = 'buyer_modified';
    public const CHANGE_COMPANY_CHANGED  = 'company_changed';
    public const CHANGE_CONTACT_CHANGED  = 'contact_changed';
    public const CHANGE_DOCUMENT_CHANGED = 'document_changed';

    // Which statuses allow the customer to still edit the form
    private const EDITABLE_STATUSES = [self::STATUS_DRAFT];

    // Which statuses count as "in progress" (non-terminal)
    private const ACTIVE_STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_SUBMITTED,
        self::STATUS_AWAITING_PAYMENT,
    ];

    public int $id;
    public int $clientId;
    public string $token;
    public string $status;
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

    // Phase 4 — admin-review workflow fields (migration 002)
    public ?string $adminReviewToken;
    public ?string $adminReviewedAt;
    public ?string $adminConfirmedAt;

    // Phase 4 polish — Stripe receipt + card detail fields (migration 004)
    // Populated once in StripeClient::syncStripePaymentInto via a single
    // Stripe API call after payment succeeds; admin review page reads these
    // from the DB so it doesn't have to hit the Stripe API on every load.
    public ?string $stripeReceiptUrl;
    public ?string $stripeCardBrand;
    public ?string $stripeCardLast4;

    private function __construct(array $row)
    {
        $this->id              = (int) $row['id'];
        $this->clientId        = (int) $row['client_id'];
        $this->token           = (string) $row['token'];
        $this->status          = (string) $row['status'];
        $this->currentStep     = (int) $row['current_step'];
        $this->draftData       = $row['draft_data'] ? (json_decode((string) $row['draft_data'], true) ?: []) : [];
        $this->customerNote    = $row['customer_note'] ?? null;
        $this->submittedAt     = $row['submitted_at'] ?? null;
        $this->stripeSessionId = $row['stripe_session_id'] ?? null;
        $this->paymentId       = $row['payment_id'] ?? null;
        $this->paidAt          = $row['paid_at'] ?? null;
        $this->amountCharged   = isset($row['amount_charged']) && $row['amount_charged'] !== null
            ? (float) $row['amount_charged'] : null;
        $this->createdAt       = (string) $row['created_at'];
        $this->updatedAt       = (string) $row['updated_at'];

        // Phase 4 fields — may be absent on older rows from before migration 002
        $this->adminReviewToken = $row['admin_review_token'] ?? null;
        $this->adminReviewedAt  = $row['admin_reviewed_at']  ?? null;
        $this->adminConfirmedAt = $row['admin_confirmed_at'] ?? null;

        // Phase 4 polish — Stripe receipt/card (migration 004 columns)
        $this->stripeReceiptUrl = $row['stripe_receipt_url'] ?? null;
        $this->stripeCardBrand  = $row['stripe_card_brand']  ?? null;
        $this->stripeCardLast4  = $row['stripe_card_last4']  ?? null;
    }

    /**
     * Human-readable reference number shown to customers + written into
     * client_pmts.reference so staff can search by it. Format: "RNW-{id}".
     *
     * Matches Stripe's own prefix convention (`pi_`, `cs_`, `ch_`, etc.):
     * the type of the ID is obvious at a glance. Examples:
     *   RNW-27   — renewal_sessions row 27
     *   RNW-389  — renewal_sessions row 389
     *
     * The integer part is just renewal_sessions.id (no padding) so the
     * sequence matches admin URLs (?session=27) one-to-one.
     */
    public function getReferenceNumber(): string
    {
        return 'RNW-' . $this->id;
    }

    /**
     * Persist Stripe receipt + card details fetched from a Payment Intent
     * (with expanded latest_charge). Called once after payment succeeds —
     * see StripeClient::syncStripePaymentInto. Idempotent: re-saving same
     * values is harmless. Logs but does not throw on DB error so payment
     * processing is never blocked by this best-effort detail save.
     */
    public function saveStripePaymentDetails(
        ?string $receiptUrl,
        ?string $cardBrand,
        ?string $cardLast4
    ): void {
        try {
            Db::exec(
                'UPDATE renewal_sessions
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
                '[renewal_v2] saveStripePaymentDetails failed for session %d: %s',
                $this->id, $e->getMessage()
            ));
        }
    }

    // ===== TOKEN VALIDATION =====

    /**
     * Validate a renewal token. Returns the client_id if valid, null otherwise.
     * A token is valid if it exists in sec_renewals and token_exp is in the future.
     */
    public static function validateToken(string $token): ?int
    {
        if ($token === '' || strlen($token) > 50) {
            return null;
        }
        $row = Db::one(
            'SELECT client_id, token_exp FROM sec_renewals
             WHERE token = ? ORDER BY token_created DESC LIMIT 1',
            [$token]
        );
        if ($row === null) {
            return null;
        }
        if (strtotime((string) $row['token_exp']) < time()) {
            return null;
        }
        return (int) $row['client_id'];
    }

    // ===== FACTORY METHODS =====

    /**
     * Load existing session OR create new — the wizard's entry-point resolver.
     * Returns null if the token is invalid or expired.
     *
     * The tricky case this function handles is "customer already renewed AND
     * staff sent a fresh email for a new renewal cycle". Without care, we
     * would silently reuse the completed session and show the customer their
     * OLD Thank You page — which is exactly what Larissa observed on
     * 2026-07-04 (RNW-49, client 737838). Fix: compare the URL token's
     * creation time to the existing session's paid_at.
     *
     * Logic:
     *   1. Fetch token row (validates existence + non-expiry)
     *   2. Find the latest non-cancelled session for that client
     *   3. If none → create fresh draft (first-ever renewal)
     *   4. If found and NOT completed → resume as before, sync token pointer
     *   5. If found and completed:
     *        (a) URL token was created ≤ paid_at → bookmark-after-paying
     *            (customer re-opened their old email link). Return the
     *            completed session so index.php redirects them to Step 8.
     *        (b) URL token was created > paid_at → staff sent a new email
     *            for a new renewal cycle. Cancel the completed session and
     *            create a fresh draft, so the wizard starts at Step 1.
     *
     * Rationale for (b) with no ">90-day gate": customers cannot spawn new
     * tokens themselves — every sec_renewals row comes from a staff click on
     * the Renewals grid. If Larissa sent a new email, she meant it. The
     * 90-day gate June-10 spec targeted was designed for a system where
     * customers could self-request renewals; that shape doesn't apply here.
     * The bookmark case is protected by (a) using token_created_at, not by
     * time-since-paid.
     */
    public static function loadOrCreate(string $token): ?self
    {
        if ($token === '' || strlen($token) > 50) {
            return null;
        }

        // Fetch token metadata — need token_created for the completed-session
        // comparison below, not just client_id.
        $tokenRow = Db::one(
            'SELECT client_id, token_created, token_exp
               FROM sec_renewals
              WHERE token = ?
              ORDER BY token_created DESC
              LIMIT 1',
            [$token]
        );
        if ($tokenRow === null) {
            return null;
        }
        if (strtotime((string) $tokenRow['token_exp']) < time()) {
            return null;
        }

        $clientId       = (int) $tokenRow['client_id'];
        $tokenCreatedAt = (string) $tokenRow['token_created'];

        // Find latest non-cancelled session for this client. Includes
        // 'completed' so we can distinguish bookmark-after-paying from
        // staff-triggered new-cycle in the branch below.
        $nonCancelledStates = [
            self::STATUS_DRAFT,
            self::STATUS_SUBMITTED,
            self::STATUS_AWAITING_PAYMENT,
            self::STATUS_AWAITING_REVIEW,
            self::STATUS_COMPLETED,
        ];
        $inList = implode(',', array_fill(0, count($nonCancelledStates), '?'));
        $row = Db::one(
            "SELECT * FROM renewal_sessions
             WHERE client_id = ? AND status IN ({$inList})
             ORDER BY updated_at DESC LIMIT 1",
            array_merge([$clientId], $nonCancelledStates)
        );

        if ($row !== null) {
            $isCompleted = ($row['status'] === self::STATUS_COMPLETED);
            $paidAt      = (string) ($row['paid_at'] ?? '');

            // Case: found completed session — distinguish bookmark vs new cycle
            if ($isCompleted && $paidAt !== '') {
                $tokenBeforePayment =
                    strtotime($tokenCreatedAt) <= strtotime($paidAt);

                if ($tokenBeforePayment) {
                    // Bookmark-after-paying — return completed session so the
                    // customer lands on their Step 8 Thank You page again.
                    // Sync the token pointer defensively (usually a no-op).
                    if ($row['token'] !== $token) {
                        Db::exec(
                            'UPDATE renewal_sessions SET token = ? WHERE id = ?',
                            [$token, $row['id']]
                        );
                        $row['token'] = $token;
                    }
                    return new self($row);
                }

                // Token created AFTER paid_at → new renewal cycle. Retire the
                // completed session and mangle its token so the UNIQUE index
                // on renewal_sessions.token doesn't collide when we INSERT a
                // fresh draft below (both rows want the same URL token).
                // The mangled form 'sup_<id>_<first-35-chars>' keeps the id
                // greppable for later forensic work and stays within the
                // VARCHAR(50) budget (4+6+1+35 = 46).
                Db::exec(
                    'UPDATE renewal_sessions
                        SET status = ?,
                            token  = CONCAT(?, id, ?, LEFT(token, 35)),
                            updated_at = NOW()
                      WHERE id = ?',
                    [self::STATUS_CANCELLED, 'sup_', '_', $row['id']]
                );
                error_log(sprintf(
                    '[renewal_v2] New cycle detected for client %d — '
                    . 'retired completed session %d (paid %s), token '
                    . 'created %s. Creating fresh draft.',
                    $clientId,
                    (int) $row['id'],
                    $paidAt,
                    $tokenCreatedAt
                ));
                // fall through to fresh-draft insert below
            } else {
                // Not completed — normal resume (draft / submitted / awaiting_*)
                // Sync token pointer if customer used a newer / different link.
                if ($row['token'] !== $token) {
                    Db::exec(
                        'UPDATE renewal_sessions SET token = ? WHERE id = ?',
                        [$token, $row['id']]
                    );
                    $row['token'] = $token;
                }
                return new self($row);
            }
        }

        // No active session (or the previous completed one was just retired) —
        // create a fresh draft rooted at this token.
        $id = Db::insert(
            'INSERT INTO renewal_sessions
                (client_id, token, status, current_step, draft_data)
             VALUES (?, ?, ?, 1, ?)',
            [$clientId, $token, self::STATUS_DRAFT, json_encode(new stdClass())]
        );

        $newRow = Db::one(
            'SELECT * FROM renewal_sessions WHERE id = ?',
            [$id]
        );

        if ($newRow === null) {
            return null;
        }

        return new self($newRow);
    }

    /**
     * Load a session by its primary key.
     * Returns null if not found.
     */
    public static function loadById(int $id): ?self
    {
        $row = Db::one(
            'SELECT * FROM renewal_sessions WHERE id = ?',
            [$id]
        );
        return $row !== null ? new self($row) : null;
    }

    /**
     * Load a session by its token string (exact match).
     * Returns null if not found.
     */
    public static function loadByToken(string $token): ?self
    {
        if ($token === '') {
            return null;
        }
        $row = Db::one(
            'SELECT * FROM renewal_sessions WHERE token = ? LIMIT 1',
            [$token]
        );
        return $row !== null ? new self($row) : null;
    }

    /**
     * Load a session by its admin_review_token (the one sent to staff via email).
     * Returns null if no session has that token.
     *
     * Used by the staff-side admin review page to authenticate the request.
     */
    public static function loadByAdminToken(string $adminToken): ?self
    {
        if ($adminToken === '' || strlen($adminToken) > 50) {
            return null;
        }
        $row = Db::one(
            'SELECT * FROM renewal_sessions WHERE admin_review_token = ? LIMIT 1',
            [$adminToken]
        );
        return $row !== null ? new self($row) : null;
    }

    // ===== DRAFT MANAGEMENT =====

    /**
     * Save/merge draft data and update the current step.
     *
     * $data is shallow-merged into existing draftData so callers can
     * send only the keys they changed (step-level patch, not full replace).
     * Pass null for $step to keep the current step unchanged.
     *
     * Only allowed while status === 'draft'.
     *
     * @throws RuntimeException if session is not in draft state
     */
    public function saveDraft(array $data, ?int $step = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new RuntimeException(
                "Cannot save draft: session {$this->id} is in state '{$this->status}'"
            );
        }

        // Shallow merge — keeps existing keys the caller didn't send
        $merged = array_merge($this->draftData, $data);
        $this->draftData = $merged;

        if ($step !== null && $step >= 1 && $step <= 8) {
            // Only advance forward, never regress (customer can click back but
            // we keep the highest step they've reached for progress bar accuracy)
            if ($step > $this->currentStep) {
                $this->currentStep = $step;
            }
        }

        Db::exec(
            'UPDATE renewal_sessions
                SET draft_data = ?, current_step = ?, updated_at = NOW()
              WHERE id = ?',
            [json_encode($this->draftData), $this->currentStep, $this->id]
        );
    }

    /**
     * Replace the entire draft_data blob in one shot.
     * Use this only when you've already built the full merged object.
     * Same editable-state restriction as saveDraft().
     *
     * @throws RuntimeException if session is not in draft state
     */
    public function replaceDraft(array $data, ?int $step = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new RuntimeException(
                "Cannot replace draft: session {$this->id} is in state '{$this->status}'"
            );
        }

        $this->draftData = $data;

        if ($step !== null && $step >= 1 && $step <= 8) {
            $this->currentStep = $step;
        }

        Db::exec(
            'UPDATE renewal_sessions
                SET draft_data = ?, current_step = ?, updated_at = NOW()
              WHERE id = ?',
            [json_encode($this->draftData), $this->currentStep, $this->id]
        );
    }

    // ===== STATE TRANSITIONS =====

    /**
     * Transition: draft → submitted
     *
     * Called when the customer completes all 8 steps and clicks Submit.
     * Sets submitted_at and optionally saves a customer note.
     *
     * @throws RuntimeException if not currently in draft
     */
    public function submit(?string $customerNote = null): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new RuntimeException(
                "Cannot submit: session {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status      = self::STATUS_SUBMITTED;
        $this->submittedAt = date('Y-m-d H:i:s');
        $this->customerNote = $customerNote;

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, submitted_at = NOW(), customer_note = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_SUBMITTED, $customerNote, $this->id]
        );
    }

    /**
     * Transition: submitted → awaiting_payment
     *
     * Called when a Stripe Checkout session is successfully created.
     * Stores the Stripe session ID so the webhook can match it back.
     *
     * @throws RuntimeException if not currently submitted
     */
    public function setStripeSession(string $stripeSessionId): void
    {
        if ($this->status !== self::STATUS_SUBMITTED) {
            throw new RuntimeException(
                "Cannot set Stripe session: session {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status          = self::STATUS_AWAITING_PAYMENT;
        $this->stripeSessionId = $stripeSessionId;

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, stripe_session_id = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_AWAITING_PAYMENT, $stripeSessionId, $this->id]
        );
    }

    /**
     * Transition: submitted | awaiting_payment → awaiting_review
     *
     * Called by the Stripe webhook (checkout.session.completed event).
     * Records the payment intent ID, amount charged, and paid_at timestamp.
     * Auto-transitions straight to awaiting_review — no manual step needed.
     *
     * Accepts BOTH 'submitted' and 'awaiting_payment' as valid prior states.
     * This protects against the orphan-payment edge case: if Stripe Checkout
     * was created (so customer can pay) but our local setStripeSession() failed
     * (e.g. PHP crash, DB hiccup), the customer can still pay successfully and
     * the webhook will land us in the correct state.
     *
     * @param string $paymentId     Stripe payment_intent or charge ID
     * @param float  $amountCharged Amount in dollars (not cents)
     * @throws RuntimeException if not currently submitted or awaiting_payment
     */
    public function markPaid(string $paymentId, float $amountCharged): void
    {
        $validPriorStates = [self::STATUS_SUBMITTED, self::STATUS_AWAITING_PAYMENT];
        if (!in_array($this->status, $validPriorStates, true)) {
            throw new RuntimeException(
                "Cannot mark paid: session {$this->id} is in state '{$this->status}' "
                . "(expected submitted or awaiting_payment)"
            );
        }

        $this->status        = self::STATUS_AWAITING_REVIEW;
        $this->paymentId     = $paymentId;
        $this->amountCharged = $amountCharged;
        $this->paidAt        = date('Y-m-d H:i:s');

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, payment_id = ?, amount_charged = ?, paid_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_AWAITING_REVIEW, $paymentId, $amountCharged, $this->id]
        );
    }

    /**
     * Reset a session from 'awaiting_payment' back to 'submitted' so a new
     * Stripe Checkout can be created (e.g. previous checkout link expired
     * after 24 hours, or customer closed the Stripe tab without paying).
     *
     * Clears stripe_session_id since the old one is now invalid.
     *
     * @throws RuntimeException if not in awaiting_payment state
     */
    public function resetForPaymentRetry(): void
    {
        if ($this->status !== self::STATUS_AWAITING_PAYMENT) {
            throw new RuntimeException(
                "Cannot reset for retry: session {$this->id} is in state '{$this->status}' "
                . "(expected awaiting_payment)"
            );
        }

        $this->status          = self::STATUS_SUBMITTED;
        $this->stripeSessionId = null;

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, stripe_session_id = NULL, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_SUBMITTED, $this->id]
        );
    }

    /**
     * Transition: awaiting_review → completed
     *
     * Called by admin (or a future admin API) when the renewal is approved.
     * This is the terminal success state.
     *
     * @throws RuntimeException if not currently awaiting_review
     */
    public function complete(): void
    {
        if ($this->status !== self::STATUS_AWAITING_REVIEW) {
            throw new RuntimeException(
                "Cannot complete: session {$this->id} is in state '{$this->status}'"
            );
        }

        $this->status = self::STATUS_COMPLETED;

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_COMPLETED, $this->id]
        );
    }

    /**
     * Transition: any non-completed state → cancelled
     *
     * Allows cancellation from draft, submitted, or awaiting_payment.
     * Cannot cancel a session already completed or already cancelled.
     *
     * @throws RuntimeException if already in a terminal state
     */
    public function cancel(): void
    {
        $terminal = [self::STATUS_COMPLETED, self::STATUS_CANCELLED];
        if (in_array($this->status, $terminal, true)) {
            throw new RuntimeException(
                "Cannot cancel: session {$this->id} is already in terminal state '{$this->status}'"
            );
        }

        $this->status = self::STATUS_CANCELLED;

        Db::exec(
            'UPDATE renewal_sessions
                SET status = ?, updated_at = NOW()
              WHERE id = ?',
            [self::STATUS_CANCELLED, $this->id]
        );
    }

    // ===== ADMIN-SIDE REVIEW WORKFLOW (Phase 4) =====

    /**
     * Generate and store a unique admin_review_token. This token will be
     * embedded in the link sent to PFM staff via email after a customer
     * payment is received. Staff land on /renewal_v2/admin/review.php?token=...
     * and that token authenticates the request.
     *
     * Idempotent: if a token already exists for this session, returns the
     * existing one without generating a new one (so re-sending the email
     * uses the same URL).
     *
     * @return string The token (32-char hex)
     */
    public function ensureAdminReviewToken(): string
    {
        if ($this->adminReviewToken !== null && $this->adminReviewToken !== '') {
            return $this->adminReviewToken;
        }

        // 32 hex chars (16 random bytes) — fits in our VARCHAR(50) column
        $token = bin2hex(random_bytes(16));

        Db::exec(
            'UPDATE renewal_sessions
                SET admin_review_token = ?, updated_at = NOW()
              WHERE id = ?',
            [$token, $this->id]
        );

        $this->adminReviewToken = $token;
        return $token;
    }

    /**
     * Mark the moment staff first OPENED the admin review page. Idempotent —
     * only writes if not already marked (so repeated visits don't overwrite
     * the original review time).
     *
     * Note: this is intentionally permissive — we don't check session status
     * because staff may legitimately review a session that's already
     * confirmed (e.g. to look up payment ID later). Confirming again won't
     * re-write client_pmts (writeClientPayment is idempotent on its end).
     */
    public function markAdminReviewed(): void
    {
        if ($this->adminReviewedAt !== null) {
            return; // already marked — keep original timestamp
        }

        $now = date('Y-m-d H:i:s');
        Db::exec(
            'UPDATE renewal_sessions
                SET admin_reviewed_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [$this->id]
        );
        $this->adminReviewedAt = $now;
    }

    /**
     * Mark the moment staff CLICKED the "Confirm Receipt" button on the
     * admin review page. This is the gate event — caller (confirm-receipt.php)
     * is responsible for invoking StripeClient::writeClientPayment AFTER
     * this returns successfully, so that client_pmts has an entry only
     * once staff has acknowledged the payment.
     *
     * Idempotent: if already confirmed, returns false without re-writing.
     *
     * @return bool true if this call did the marking, false if it was
     *              already marked (the caller should NOT re-trigger
     *              client_pmts write).
     */
    public function markAdminConfirmed(): bool
    {
        if ($this->adminConfirmedAt !== null) {
            return false;
        }

        $now = date('Y-m-d H:i:s');
        Db::exec(
            'UPDATE renewal_sessions
                SET admin_confirmed_at = NOW(), updated_at = NOW()
              WHERE id = ?',
            [$this->id]
        );
        $this->adminConfirmedAt = $now;
        return true;
    }

    /**
     * Convenience: true if staff have NOT yet clicked Confirm Receipt.
     */
    public function isAwaitingAdminConfirmation(): bool
    {
        return $this->adminConfirmedAt === null && $this->isPaid();
    }

    // ===== CHANGE LOGGING =====

    /**
     * Record a change in renewal_changes for the Changes Summary panel.
     *
     * @param string      $changeType  One of the CHANGE_* constants
     * @param int|null    $targetId    e.g. member_id for buyer changes
     * @param string|null $fieldName   Field that changed (e.g. 'first_name')
     * @param mixed       $oldValue    Previous value (will be cast to string)
     * @param mixed       $newValue    New value (will be cast to string)
     */
    public function logChange(
        string $changeType,
        ?int $targetId = null,
        ?string $fieldName = null,
        $oldValue = null,
        $newValue = null
    ): void {
        $validTypes = [
            self::CHANGE_BUYER_ADDED,
            self::CHANGE_BUYER_REMOVED,
            self::CHANGE_BUYER_MODIFIED,
            self::CHANGE_COMPANY_CHANGED,
            self::CHANGE_CONTACT_CHANGED,
            self::CHANGE_DOCUMENT_CHANGED,
        ];

        if (!in_array($changeType, $validTypes, true)) {
            throw new InvalidArgumentException("Invalid change_type: {$changeType}");
        }

        Db::insert(
            'INSERT INTO renewal_changes
                (session_id, change_type, target_id, field_name, old_value, new_value)
             VALUES (?, ?, ?, ?, ?, ?)',
            [
                $this->id,
                $changeType,
                $targetId,
                $fieldName,
                $oldValue !== null ? (string) $oldValue : null,
                $newValue !== null ? (string) $newValue : null,
            ]
        );
    }

    /**
     * Fetch all logged changes for this session, newest first.
     *
     * @return array[]  Array of rows from renewal_changes
     */
    public function getChanges(): array
    {
        return Db::all(
            'SELECT id, change_type, target_id, field_name, old_value, new_value, created_at
               FROM renewal_changes
              WHERE session_id = ?
              ORDER BY created_at ASC, id ASC',
            [$this->id]
        );
    }

    /**
     * Delete all logged changes for this session.
     * Useful when the customer resets a step (e.g. re-uploads all buyers).
     *
     * @param string|null $changeType  If provided, only delete this type
     */
    public function clearChanges(?string $changeType = null): void
    {
        if ($changeType !== null) {
            Db::exec(
                'DELETE FROM renewal_changes WHERE session_id = ? AND change_type = ?',
                [$this->id, $changeType]
            );
        } else {
            Db::exec(
                'DELETE FROM renewal_changes WHERE session_id = ?',
                [$this->id]
            );
        }
    }

    // ===== QUERY HELPERS =====

    /**
     * True while the customer can still edit the form (draft only).
     */
    public function isEditable(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    /**
     * True while the session is in a non-terminal / "in progress" state.
     */
    public function isActive(): bool
    {
        return in_array($this->status, self::ACTIVE_STATUSES, true);
    }

    /**
     * True once the customer has paid (awaiting_review or completed).
     */
    public function isPaid(): bool
    {
        return in_array($this->status, [self::STATUS_AWAITING_REVIEW, self::STATUS_COMPLETED], true);
    }

    // ===== SERIALISATION =====

    /**
     * Return a plain array safe to JSON-encode for API responses.
     * Never exposes the raw token — callers already have it.
     */
    public function toArray(): array
    {
        return [
            'id'               => $this->id,
            'client_id'        => $this->clientId,
            'status'           => $this->status,
            'current_step'     => $this->currentStep,
            'draft_data'       => $this->draftData,
            'customer_note'    => $this->customerNote,
            'submitted_at'     => $this->submittedAt,
            'stripe_session_id'=> $this->stripeSessionId,
            'payment_id'       => $this->paymentId,
            'paid_at'          => $this->paidAt,
            'amount_charged'   => $this->amountCharged,
            'created_at'       => $this->createdAt,
            'updated_at'       => $this->updatedAt,
            'is_editable'      => $this->isEditable(),
            'is_paid'          => $this->isPaid(),
        ];
    }
}
