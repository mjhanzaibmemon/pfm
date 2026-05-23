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
     * Return all active buyers for a client (excludes main contact and soft-deleted).
     *
     * "Active" = include IS NULL OR include = 1 (bit)
     * "Buyer"  = main_contact = 0
     *
     * Results are ordered by member_id ASC (stable, matches the order they were added).
     *
     * @return array[]  Each row: member_id, member_name, email, phone1, note, include (as int)
     */
    public static function getActive(int $clientId): array
    {
        // is_active matches the WHERE filter logic: NULL or b'1' = active, b'0' = removed
        $rows = Db::all(
            "SELECT member_id, member_name, email, phone1, note,
                    include, main_contact,
                    (include IS NULL OR include != b'0') AS is_active
               FROM members
              WHERE client_id = ?
                AND main_contact = b'0'
                AND (include IS NULL OR include != b'0')
              ORDER BY member_id ASC",
            [$clientId]
        );

        // Normalise BIT fields — PDO returns them as raw byte strings
        return array_map([self::class, 'normaliseRow'], $rows);
    }

    /**
     * Return all buyers for a client including soft-deleted ones.
     * Used by the admin Changes Summary panel to show what was removed.
     *
     * @return array[]
     */
    public static function getAll(int $clientId): array
    {
        // is_active: NULL or b'1' = active, b'0' = soft-removed (matches the WHERE logic in getActive)
        $rows = Db::all(
            "SELECT member_id, member_name, email, phone1, note,
                    include, main_contact,
                    (include IS NULL OR include != b'0') AS is_active
               FROM members
              WHERE client_id = ?
                AND main_contact = b'0'
              ORDER BY member_id ASC",
            [$clientId]
        );
        return array_map([self::class, 'normaliseRow'], $rows);
    }

    /**
     * Count active buyers for a client (excludes main contact and removed).
     */
    public static function countActive(int $clientId): int
    {
        return (int) Db::scalar(
            "SELECT COUNT(*) FROM members
              WHERE client_id = ?
                AND main_contact = b'0'
                AND (include IS NULL OR include != b'0')",
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
                    main_contact, include
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
                    self::sanitiseOptional($phone, 100),
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
     * Soft-remove a buyer by setting include = 0.
     *
     * Validates:
     *  - Session must be in draft state
     *  - Buyer must belong to session's client (prevents cross-client tampering)
     *  - Cannot remove the main contact via this method
     *  - Buyer must currently be active (idempotent removal is allowed — just logs once)
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
        if (!$buyer['include']) {
            return;
        }

        Db::exec(
            "UPDATE members SET include = b'0' WHERE member_id = ?",
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
     * Re-include a previously soft-removed buyer.
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

            if ($buyer['include']) {
                return; // already active — nothing to do
            }

            $current = self::countActive($session->clientId);
            if ($current >= self::MAX_BUYERS) {
                throw new RuntimeException(
                    "Cannot restore buyer: client {$session->clientId} already has {$current} active buyers "
                    . "(maximum is " . self::MAX_BUYERS . ")."
                );
            }

            Db::exec(
                "UPDATE members SET include = b'1' WHERE member_id = ?",
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

            $oldValue = $buyer[$field] ?? null;

            // Skip if value is unchanged. Compare with the same trim+empty→null logic
            // applied to the existing value (so trailing whitespace doesn't trigger
            // a spurious "change").
            $oldNormalised = $oldValue !== null ? trim((string) $oldValue) : null;
            if ($oldNormalised === '') {
                $oldNormalised = null;
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
                    main_contact, include
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
