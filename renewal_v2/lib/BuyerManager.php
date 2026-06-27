<?php
/**
 * PFM Renewal v2 — BuyerManager
 *
 * Manages the buyers (members) list for a renewal session.
 * Buyers live in the `members` table; this class handles add/modify/remove
 * with full change-logging to `renewal_changes` for the admin Changes Summary panel.
 *
 * Key rules:
 *  - "Buyers" = members WHERE main_contact = 0 AND include != 0 (or NULL)
 *  - Main contact (main_contact = 1) is managed in Step 3, never touched here
 *  - Removing a buyer = soft-delete (include = 0), never a hard DELETE
 *  - 50-buyer cap (Larissa v3 spec, Section 4)
 *  - Every change is logged via RenewalSession::logChange()
 *
 * Spec: Section 4 (Buyers step), Section 2 (state rules)
 */

declare(strict_types=1);

require_once __DIR__ . '/Db.php';
require_once __DIR__ . '/RenewalSession.php';
require_once __DIR__ . '/PhoneFormat.php';

class BuyerManager
{
    /** Maximum buyers allowed per client (Larissa v3 decision) */
    public const MAX_BUYERS = 50;

    /**
     * Allowed fields for modify().
     * Maps field name → max length for validation.
     */
    private const MODIFIABLE_FIELDS = [
        'member_name' => 255,
        'email'       => 255,
        'phone1'      => 100,
        'note'        => 255,
    ];

    // ===== READ =====

    /**
     * Return the active member roster for a client — the main contact
     * row first (when one exists), followed by buyers in
     * member_id-ascending order.
     *
     * "Active" = wizard_removed_at IS NULL
     * "Roster" = main_contact = 1 (the contact) UNION main_contact = 0
     *            (the buyers)
     *
     * Why main contact is included (Path B, 2026-06-22 Round 3 QA):
     *   Larissa's review of the legacy renewal flow confirmed it counts
     *   every members row for the client when computing the renewal
     *   fee — see form_clients_steps_appn_stripe_renew_apl.php line
     *   3164 ("SELECT COUNT(client_id) FROM members WHERE client_id = X"
     *   with no main_contact filter) feeding the pricing tier check at
     *   line 3349 ("if ($members_ct <= 3) base else base + extras"). The
     *   wizard's earlier behaviour (main contact excluded from the
     *   count) silently undercharged every customer with more than 3
     *   total members by one tier — a regression versus the legacy
     *   billing PFM was already running on. Including main contact in
     *   getActive() restores legacy parity across pricing, Step 4 UI,
     *   Step 6 review, and admin/review.php in one place.
     *
     * Buyer-management operations (remove / restore / modify) still
     * reject main_contact = 1 rows so Step 3 stays the single source
     * of truth for editing the main contact; Step 4 cards skip the
     * Edit/Remove buttons for that row.
     *
     * NOTE: this filter intentionally does NOT touch the legacy `include`
     * BIT column. The existing PFM admin "Add Buyer" form inserts new
     * buyers with include = b'0' by default, so a filter on `include`
     * would hide every buyer staff added before the customer started
     * the wizard — surfaced by Larissa's Phase 6 round-1 QA (2026-06-11),
     * which resulted in duplicate buyers in the customer profile.
     * Wizard-side soft-delete now uses the new wizard_removed_at column
     * added by migration 006, leaving `include` alone for any other
     * system that reads it.
     *
     * @return array[]  Each row: member_id, member_name, email, phone1,
     *                  note, include (as int), main_contact (as int),
     *                  is_active (always 1), is_primary (1 when this is
     *                  the main contact row, 0 otherwise — caller-friendly
     *                  alias for main_contact).
     */
    public static function getActive(int $clientId): array
    {
        // is_active flag is always true here (we only return active rows).
        // is_primary mirrors main_contact for callers that prefer the
        // semantic name (Step 4 UI, admin/review.php).
        $rows = Db::all(
            "SELECT member_id, member_name, email, phone1, note,
                    include, main_contact,
                    1 AS is_active
               FROM members
              WHERE client_id = ?
                AND wizard_removed_at IS NULL
              ORDER BY main_contact DESC, member_id ASC",
            [$clientId]
        );

        // Normalise BIT fields — PDO returns them as raw byte strings
        return array_map([self::class, 'normaliseRow'], $rows);
    }

    /**
     * Return all buyers for a client including wizard-removed ones.
     * Used by the admin Changes Summary panel to show what was removed.
     *
     * @return array[]
     */
    public static function getAll(int $clientId): array
    {
        $rows = Db::all(
            "SELECT member_id, member_name, email, phone1, note,
                    include, main_contact, wizard_removed_at,
                    (wizard_removed_at IS NULL) AS is_active
               FROM members
              WHERE client_id = ?
                AND main_contact = b'0'
              ORDER BY member_id ASC",
            [$clientId]
        );
        return array_map([self::class, 'normaliseRow'], $rows);
    }

    /**
     * Count active members for a client — main contact + buyers,
     * minus any wizard-removed rows. Matches the legacy renewal's
     * "SELECT COUNT(client_id) FROM members WHERE client_id" used by
     * the pricing tier check at apl.php line 3349. Used by Step 4's
     * live pricing line, StripeClient::pricingForClient(), and the
     * MAX_BUYERS cap on add().
     */
    public static function countActive(int $clientId): int
    {
        return (int) Db::scalar(
            "SELECT COUNT(*) FROM members
              WHERE client_id = ?
                AND wizard_removed_at IS NULL",
            [$clientId]
        );
    }

    /**
     * Load a single buyer row by member_id (any include state).
     * Returns null if not found.
     */
    public static function getOne(int $memberId): ?array
    {
        $row = Db::one(
            'SELECT member_id, member_name, email, phone1, note, client_id,
                    main_contact, include, wizard_removed_at
               FROM members
              WHERE member_id = ?',
            [$memberId]
        );
        return $row !== null ? self::normaliseRow($row) : null;
    }

    // ===== WRITE =====

    /**
     * Add a new buyer to the members table for the session's client.
     *
     * Validates:
     *  - Session must be in draft state
     *  - name must not be empty
     *  - Active buyer count must be below MAX_BUYERS
     *
     * Logs: CHANGE_BUYER_ADDED
     *
     * @param  RenewalSession $session  Current renewal session
     * @param  string         $name     Buyer full name (required)
     * @param  string|null    $email    Optional email
     * @param  string|null    $phone    Optional phone
     * @param  string|null    $note     Optional note
     * @return int  New member_id
     *
     * @throws RuntimeException if session is not editable or buyer cap reached
     * @throws InvalidArgumentException if name is empty
     */
    public static function add(
        RenewalSession $session,
        string $name,
        ?string $email = null,
        ?string $phone = null,
        ?string $note  = null
    ): int {
        self::requireEditable($session);

        $name = trim($name);
        if ($name === '') {
            throw new InvalidArgumentException('Buyer name cannot be empty.');
        }
        if (strlen($name) > 255) {
            throw new InvalidArgumentException('Buyer name must be 255 characters or fewer.');
        }

        // Wrap cap-check + INSERT in a transaction with row-level lock on the
        // client row, so concurrent add()/restore() calls for the same client
        // can't both pass the cap check (would exceed MAX_BUYERS).
        return Db::transaction(function () use ($session, $name, $email, $phone, $note): int {
            // Lock the client row for the duration of this transaction
            Db::one(
                'SELECT client_id FROM clients WHERE client_id = ? FOR UPDATE',
                [$session->clientId]
            );

            $current = self::countActive($session->clientId);
            if ($current >= self::MAX_BUYERS) {
                throw new RuntimeException(
                    "Cannot add buyer: client {$session->clientId} already has {$current} active buyers "
                    . "(maximum is " . self::MAX_BUYERS . ")."
                );
            }

            $memberId = Db::insert(
                "INSERT INTO members (client_id, member_name, email, phone1, note, include, main_contact)
                 VALUES (?, ?, ?, ?, ?, b'1', b'0')",
                [
                    $session->clientId,
                    $name,
                    self::sanitiseOptional($email, 255),
                    // Phone goes in as raw digits — see PhoneFormat
                    // ::pfm_normalize_phone for why; the legacy admin's
                    // phone input mask requires this shape.
                    pfm_normalize_phone(self::sanitiseOptional($phone, 100)),
                    self::sanitiseOptional($note, 255),
                ]
            );

            $session->logChange(
                RenewalSession::CHANGE_BUYER_ADDED,
                $memberId,
                'member_name',
                null,
                $name
            );

            return $memberId;
        });
    }

    /**
     * Soft-remove a buyer by stamping wizard_removed_at = NOW().
     *
     * Migration 006 added this column specifically so the wizard's
     * soft-delete doesn't collide with the legacy `include` BIT field,
     * which the existing PFM admin "Add Buyer" form sets to b'0' for
     * every new buyer by default. See migration 006 / getActive() for
     * the full rationale.
     *
     * Validates:
     *  - Session must be in draft state
     *  - Buyer must belong to session's client (prevents cross-client tampering)
     *  - Cannot remove the main contact via this method
     *  - Idempotent: already-removed buyer is a no-op
     *
     * Logs: CHANGE_BUYER_REMOVED
     *
     * @throws RuntimeException on validation failure
     */
    public static function remove(RenewalSession $session, int $memberId): void
    {
        self::requireEditable($session);

        $buyer = self::assertBelongsToClient($memberId, $session->clientId);

        if ($buyer['main_contact']) {
            throw new RuntimeException(
                "Cannot remove member {$memberId}: they are the main contact. "
                . "Use the Main Contact step to change the main contact."
            );
        }

        // If already removed, nothing to do (idempotent)
        if (!empty($buyer['wizard_removed_at'])) {
            return;
        }

        // Flag the row as wizard-removed in BOTH columns:
        //   - `wizard_removed_at` — the canonical wizard-side flag used by
        //     getActive() (mirrored on admin/review.php's "Active buyers"
        //     panel).
        //   - legacy `include = b'0'` — defensive sync so any consumer that
        //     still reads the BIT field (existing PFM admin views, exports,
        //     other ScriptCase grids) sees a consistent removed state.
        // Buyers that the customer added AND removed in the same wizard
        // session get hard-deleted later by pruneSameSessionAddRemove()
        // on submit so the legacy CURRENT BUYERS subgrid doesn't keep an
        // orphan with empty fields.
        Db::exec(
            "UPDATE members
                SET wizard_removed_at = NOW(),
                    include           = b'0'
              WHERE member_id = ?",
            [$memberId]
        );

        $session->logChange(
            RenewalSession::CHANGE_BUYER_REMOVED,
            $memberId,
            'member_name',
            $buyer['member_name'],
            null
        );
    }

    /**
     * Hard-delete every buyer the customer marked as removed in this
     * session's wizard run, so the legacy PFM admin CURRENT BUYERS grid
     * matches what the customer actually decided. Called from
     * submit-application.php right before the session transitions to
     * 'submitted' so the cleanup happens once per renewal.
     *
     * Why hard delete (and not just the wizard_removed_at + include = b'0'
     * flags set by remove()): the legacy form_clients_staff CURRENT
     * BUYERS subgrid doesn't filter on either flag — it lists every
     * members row for the client_id. Larissa's Phase 6 round-1 intent
     * ("customer can remove buyers no longer active") is only achieved
     * if the row is gone from that grid too, otherwise staff see
     * "phantom" rows with empty fields that the customer has already
     * declared inactive, which is exactly the duplicate / clutter
     * problem the rebuild is meant to fix. Touching the legacy admin
     * grid SQL was off the table, so the row deletion happens
     * customer-side instead.
     *
     * Two cases:
     *   - Same-session ghost (ADDED and REMOVED both logged on this
     *     session): wipe ALL log entries for this member_id so the
     *     Changes Summary and B1-a renewal-history note stay clean —
     *     a buyer that never made it past the wizard isn't worth a
     *     line in either place.
     *   - Pre-existing buyer (no ADDED entry on this session, just a
     *     REMOVED entry): KEEP the CHANGE_BUYER_REMOVED log entry so
     *     the B1-a note can report "Removed: {old_value}" with the
     *     buyer's name (which was captured in old_value at remove()
     *     time, doesn't depend on the now-deleted members row).
     *
     * renewal_changes.target_id has no FK to members so a deleted
     * member_id is harmless — the log row remains intact.
     *
     * Idempotent and safe to re-run.
     */
    public static function purgeRemovedBuyers(int $sessionId): void
    {
        // Find every member_id this session marked as removed.
        $rows = Db::all(
            "SELECT DISTINCT target_id AS member_id
               FROM renewal_changes
              WHERE session_id  = ?
                AND change_type = ?
                AND target_id IS NOT NULL",
            [$sessionId, RenewalSession::CHANGE_BUYER_REMOVED]
        );

        foreach ($rows as $row) {
            $memberId = (int) $row['member_id'];
            if ($memberId <= 0) {
                continue;
            }

            // Belt-and-suspenders: only hard-delete if the row is STILL
            // wizard-removed (customer may have hit Restore after
            // toggling, in which case we want to keep both the row and
            // the matching ADDED-via-restore log entry).
            $stillRemoved = (int) Db::scalar(
                "SELECT COUNT(*) FROM members
                  WHERE member_id = ? AND wizard_removed_at IS NOT NULL",
                [$memberId]
            );
            if ($stillRemoved === 0) {
                continue;
            }

            // Was this buyer ADDED in this same session? If yes, it's a
            // same-session ghost — drop every log entry so neither the
            // Changes Summary nor the B1-a note mentions a buyer who
            // never actually existed for staff. If no, the buyer is
            // pre-existing and we keep the REMOVED log entry for audit.
            $wasAddedHere = (int) Db::scalar(
                "SELECT COUNT(*) FROM renewal_changes
                  WHERE session_id = ? AND target_id = ? AND change_type = ?",
                [$sessionId, $memberId, RenewalSession::CHANGE_BUYER_ADDED]
            );

            if ($wasAddedHere > 0) {
                Db::exec(
                    "DELETE FROM renewal_changes
                      WHERE session_id = ? AND target_id = ?",
                    [$sessionId, $memberId]
                );
            }
            // else: pre-existing — REMOVED log entry stays so B1-a
            // can report "Removed: <buyer name>" using its old_value.

            Db::exec(
                "DELETE FROM members WHERE member_id = ?",
                [$memberId]
            );
        }
    }

    /**
     * Restore a previously wizard-removed buyer by clearing
     * wizard_removed_at back to NULL.
     *
     * Validates:
     *  - Session must be in draft state
     *  - Buyer must belong to session's client
     *  - Active buyer count must be below MAX_BUYERS
     *
     * Logs: CHANGE_BUYER_ADDED (re-adding = same as adding)
     *
     * @throws RuntimeException on validation failure
     */
    public static function restore(RenewalSession $session, int $memberId): void
    {
        self::requireEditable($session);

        // Wrap cap-check + UPDATE in a transaction with row-level lock on the
        // client row (same protection as add() — see comment there).
        Db::transaction(function () use ($session, $memberId): void {
            Db::one(
                'SELECT client_id FROM clients WHERE client_id = ? FOR UPDATE',
                [$session->clientId]
            );

            $buyer = self::assertBelongsToClient($memberId, $session->clientId);

            if (empty($buyer['wizard_removed_at'])) {
                return; // already active — nothing to do
            }

            $current = self::countActive($session->clientId);
            if ($current >= self::MAX_BUYERS) {
                throw new RuntimeException(
                    "Cannot restore buyer: client {$session->clientId} already has {$current} active buyers "
                    . "(maximum is " . self::MAX_BUYERS . ")."
                );
            }

            // Mirror the dual-flag write that remove() does: clear the
            // wizard flag AND flip legacy include back to b'1' so every
            // consumer (wizard, admin review, legacy admin grids) lands
            // on the same "active again" state.
            Db::exec(
                "UPDATE members
                    SET wizard_removed_at = NULL,
                        include           = b'1'
                  WHERE member_id = ?",
                [$memberId]
            );

            $session->logChange(
                RenewalSession::CHANGE_BUYER_ADDED,
                $memberId,
                'member_name',
                null,
                $buyer['member_name']
            );
        });
    }

    /**
     * Modify one or more allowed fields on a buyer.
     *
     * Only fields listed in MODIFIABLE_FIELDS can be changed.
     * Each changed field generates its own CHANGE_BUYER_MODIFIED log entry
     * (so the admin panel can show exactly which fields changed).
     *
     * Validates:
     *  - Session must be in draft state
     *  - Buyer must belong to session's client
     *  - Cannot modify the main contact's record via this method
     *  - Only whitelisted fields accepted (rejects unknown keys)
     *
     * @param  array  $fields  Associative array of field => new_value
     * @throws RuntimeException | InvalidArgumentException on validation failure
     */
    public static function modify(
        RenewalSession $session,
        int $memberId,
        array $fields
    ): void {
        self::requireEditable($session);

        if (empty($fields)) {
            return; // nothing to do
        }

        $buyer = self::assertBelongsToClient($memberId, $session->clientId);

        if ($buyer['main_contact']) {
            throw new RuntimeException(
                "Cannot modify member {$memberId} via BuyerManager: "
                . "they are the main contact. Use the Main Contact step."
            );
        }

        // Validate field whitelist and build SET clause
        $setClauses = [];
        $params      = [];
        $changes     = []; // [field => [old, new]]

        foreach ($fields as $field => $newValue) {
            if (!array_key_exists($field, self::MODIFIABLE_FIELDS)) {
                throw new InvalidArgumentException(
                    "Field '{$field}' is not modifiable via BuyerManager."
                );
            }

            $maxLen  = self::MODIFIABLE_FIELDS[$field];
            $cleaned = $newValue !== null ? trim((string) $newValue) : null;

            if ($cleaned !== null && strlen($cleaned) > $maxLen) {
                throw new InvalidArgumentException(
                    "Field '{$field}' must be {$maxLen} characters or fewer."
                );
            }

            // Normalise empty string to NULL — keeps modify() consistent with add()
            // (which uses sanitiseOptional). Customers clearing a field should result
            // in NULL in the DB, not empty string.
            if ($cleaned === '') {
                $cleaned = null;
            }

            // Phone fields canonicalise to raw digits before both the
            // diff check and the DB write so the legacy admin form's
            // phone input mask renders them correctly and the change
            // log doesn't record a pure format-change diff.
            if ($field === 'phone1') {
                $cleaned = pfm_normalize_phone($cleaned);
            }

            $oldValue = $buyer[$field] ?? null;

            // Skip if value is unchanged. Compare with the same trim+empty→null logic
            // applied to the existing value (so trailing whitespace doesn't trigger
            // a spurious "change").
            $oldNormalised = $oldValue !== null ? trim((string) $oldValue) : null;
            if ($oldNormalised === '') {
                $oldNormalised = null;
            }
            if ($field === 'phone1') {
                $oldNormalised = pfm_normalize_phone($oldNormalised);
            }
            if ($cleaned === $oldNormalised) {
                continue;
            }

            $setClauses[]  = "{$field} = ?";
            $params[]      = $cleaned;
            $changes[$field] = [$oldValue, $cleaned];
        }

        if (empty($setClauses)) {
            return; // all values were identical — nothing to update
        }

        $params[] = $memberId;
        Db::exec(
            'UPDATE members SET ' . implode(', ', $setClauses) . ' WHERE member_id = ?',
            $params
        );

        // Log each changed field separately
        foreach ($changes as $field => [$old, $new]) {
            $session->logChange(
                RenewalSession::CHANGE_BUYER_MODIFIED,
                $memberId,
                $field,
                $old,
                $new
            );
        }
    }

    // ===== HELPERS =====

    /**
     * Assert a member belongs to the given client and return the row.
     * Throws RuntimeException if not found or wrong client.
     *
     * @throws RuntimeException
     */
    private static function assertBelongsToClient(int $memberId, int $clientId): array
    {
        $row = Db::one(
            'SELECT member_id, client_id, member_name, email, phone1, note,
                    main_contact, include, wizard_removed_at
               FROM members
              WHERE member_id = ?',
            [$memberId]
        );

        if ($row === null) {
            throw new RuntimeException("Member {$memberId} not found.");
        }

        $row = self::normaliseRow($row);

        if ((int) $row['client_id'] !== $clientId) {
            // Security: buyer doesn't belong to this client
            throw new RuntimeException(
                "Member {$memberId} does not belong to client {$clientId}."
            );
        }

        return $row;
    }

    /**
     * Throw RuntimeException if the session is not in draft (editable) state.
     */
    private static function requireEditable(RenewalSession $session): void
    {
        if (!$session->isEditable()) {
            throw new RuntimeException(
                "Cannot modify buyers: session {$session->id} is in state '{$session->status}'. "
                . "Only draft sessions are editable."
            );
        }
    }

    /**
     * Trim + cap an optional string field, returning null if empty.
     */
    private static function sanitiseOptional(?string $value, int $maxLen): ?string
    {
        if ($value === null) {
            return null;
        }
        $value = trim($value);
        if ($value === '') {
            return null;
        }
        return substr($value, 0, $maxLen);
    }

    /**
     * Normalise a raw DB row: convert BIT(1) byte strings to booleans
     * and cast integer columns to proper PHP types.
     *
     * PDO returns BIT(1) as a single-byte string ("\x00" or "\x01").
     * This converts them to bool so callers get reliable truthy/falsy values.
     */
    private static function normaliseRow(array $row): array
    {
        // BIT(1) columns
        foreach (['include', 'main_contact', 'is_active'] as $col) {
            if (array_key_exists($col, $row)) {
                $v = $row[$col];
                // PDO BIT: "\x00" = false, "\x01" = true, NULL = null
                // After CAST/expression it may already be int 0/1
                if ($v === null) {
                    $row[$col] = null;
                } else {
                    $row[$col] = (bool) (is_string($v) ? ord($v) : (int) $v);
                }
            }
        }

        // INT columns
        if (isset($row['member_id'])) {
            $row['member_id'] = (int) $row['member_id'];
        }
        if (isset($row['client_id'])) {
            $row['client_id'] = (int) $row['client_id'];
        }

        return $row;
    }
}
