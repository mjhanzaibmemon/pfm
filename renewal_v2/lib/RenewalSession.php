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
     * Load existing session OR create new — implements "one renewal = one request" rule.
     * Returns null if token invalid or expired.
     *
     * Logic:
     *   1. Validate token in sec_renewals
     *   2. Look for an existing non-terminal session for that client
     *   3. If found: resume it (and sync the token if the customer used a newer link)
     *   4. If not found: create a fresh draft
     */
    public static function loadOrCreate(string $token): ?self
    {
        $clientId = self::validateToken($token);
        if ($clientId === null) {
            return null;
        }

        // Find active (non-terminal) session for this client
        $inList = implode(',', array_fill(0, count(self::ACTIVE_STATUSES), '?'));
        $row = Db::one(
            "SELECT * FROM renewal_sessions
             WHERE client_id = ? AND status IN ({$inList})
             ORDER BY updated_at DESC LIMIT 1",
            array_merge([$clientId], self::ACTIVE_STATUSES)
        );

        if ($row !== null) {
            // Resume — sync token if customer used a different / newer link
            if ($row['token'] !== $token) {
                Db::exec(
                    'UPDATE renewal_sessions SET token = ? WHERE id = ?',
                    [$token, $row['id']]
                );
                $row['token'] = $token;
            }
            return new self($row);
        }

        // No active session — create a fresh draft
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

        // Fallback if SELECT fails (shouldn't happen, but guard anyway)
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
