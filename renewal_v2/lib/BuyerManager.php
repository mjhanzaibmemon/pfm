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

    /**
     * Draft-data key that holds the pending buyer-op queue. Every wizard
     * add / remove / modify appends to this structure and returns; nothing
     * hits the members table until submit-application.php drains the queue
     * on Step 6 submit.
     *
     * Why deferred: Muhammad's 2026-07-07 walkthrough uncovered that
     * add-buyer.php was writing directly into the `members` table on the
     * customer's Step-4 "Save buyer" click, so a buyer that the customer
     * added mid-wizard would show up in the legacy admin's CURRENT BUYERS
     * tab even if the customer bailed before paying. Step-3 contact edits
     * had always stayed in draft_data.contact and only landed in `clients`
     * on submit — buyer ops needed to work the same way.
     *
     * Shape:
     *   $draftData['buyer_ops'] = [
     *     'next_tmp_id' => -1,       // decrements as new adds land
     *     'adds'        => [
     *       ['tmp_id' => -1, 'name' => …, 'email' => …, 'phone' => …, 'note' => …],
     *     ],
     *     'removes'     => [123, 456], // committed member_ids to soft-delete
     *     'modifies'    => [
     *       789 => ['member_name' => …, 'email' => …, …],
     *     ],
     *   ];
     */
    private const OPS_KEY = 'buyer_ops';

    // ===== PENDING-OPS HELPERS =====

    /**
     * Return the pending-ops structure from the session's draft_data,
     * defaulting to an empty queue if none exists yet. Never touches
     * the DB — callers that don't have a session (admin/review.php,
     * post-submit contexts) simply pass null and get committed state
     * back from getActive() / countActive().
     */
    public static function getPendingOps(?RenewalSession $session): array
    {
        if ($session === null) {
            return self::emptyOps();
        }
        $ops = $session->draftData[self::OPS_KEY] ?? null;
        if (!is_array($ops)) {
            return self::emptyOps();
        }
        // Fill in any missing keys so callers can index without isset checks.
        return $ops + self::emptyOps();
    }

    private static function emptyOps(): array
    {
        return [
            'next_tmp_id' => -1,
            'adds'        => [],
            'removes'     => [],
            'modifies'    => [],
        ];
    }

    private static function savePendingOps(RenewalSession $session, array $ops): void
    {
        $session->saveDraft([self::OPS_KEY => $ops]);
    }

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
    public static function getActive(int $clientId, ?RenewalSession $session = null): array
    {
        // is_active flag is always true here (we only return active rows).
        // is_primary mirrors main_contact for callers that prefer the
        // semantic name (Step 4 UI, admin/review.php).
        //
        // For the main_contact=1 row we COALESCE email and phone against
        // the legacy clients.main_contact_email / .main_contact_phone
        // mirror columns, because the legacy PFM admin "Add Member" form
        // doesn't reliably populate members.email / .phone1 for the
        // primary row — it stamps clients.main_contact_* and leaves the
        // mirror on members blank. Larissa's 2026-06-27 Round 4 setup hit
        // exactly that: clients.main_contact_email = mjhanzaibmemon123
        // @gmail.com, members.email IS NULL, and Step 4's buyer card
        // rendered "Email: not provided" for the Primary Contact. The
        // submit handler already mirrors Step 3 edits back into clients
        // (commit 371cd5c), so reading clients on the way out keeps
        // every surface (Step 4, Step 6 review, admin/review.php Active
        // buyers panel) consistent with what staff see in the legacy
        // edit form — without needing to backfill the underlying members
        // row.
        $rows = Db::all(
            "SELECT m.member_id, m.member_name,
                    IF(m.main_contact = b'1',
                       COALESCE(NULLIF(TRIM(m.email), ''),  c.main_contact_email),
                       m.email)  AS email,
                    IF(m.main_contact = b'1',
                       COALESCE(NULLIF(TRIM(m.phone1), ''), c.main_contact_phone),
                       m.phone1) AS phone1,
                    m.note,
                    m.include, m.main_contact,
                    1 AS is_active
               FROM members m
               JOIN clients c ON c.client_id = m.client_id
              WHERE m.client_id = ?
                AND m.wizard_removed_at IS NULL
              ORDER BY m.main_contact DESC, m.member_id ASC",
            [$clientId]
        );

        // Normalise BIT fields — PDO returns them as raw byte strings
        $rows = array_map([self::class, 'normaliseRow'], $rows);

        // Overlay pending buyer ops from the current draft session (if any).
        // Admin surfaces that call getActive() without a session — like
        // admin/review.php post-Confirm-Receipt — see committed state only,
        // which is correct: by then submit-application.php has already
        // drained buyer_ops.
        if ($session !== null) {
            $rows = self::applyPendingOps($rows, self::getPendingOps($session));
        }

        return $rows;
    }

    /**
     * Merge the pending-ops queue on top of a committed roster:
     *   1. Drop rows whose member_id is in ops.removes.
     *   2. Overlay ops.modifies field values on matching rows.
     *   3. Append ops.adds as synthetic rows (using their negative tmp_id
     *      as member_id so downstream UI can identify them for edit /
     *      remove calls — the API path treats negative ids as pending).
     */
    private static function applyPendingOps(array $rows, array $ops): array
    {
        $removeSet = [];
        foreach ($ops['removes'] as $mid) {
            $removeSet[(int) $mid] = true;
        }
        $modifies = $ops['modifies'];

        $out = [];
        foreach ($rows as $r) {
            $mid = (int) $r['member_id'];
            if (isset($removeSet[$mid])) {
                continue;
            }
            if (isset($modifies[$mid]) && is_array($modifies[$mid])) {
                foreach ($modifies[$mid] as $col => $val) {
                    // Only overlay whitelisted modifiable columns.
                    if (array_key_exists($col, self::MODIFIABLE_FIELDS)) {
                        $r[$col] = $val;
                    }
                }
            }
            $out[] = $r;
        }

        foreach ($ops['adds'] as $a) {
            $out[] = self::normaliseRow([
                'member_id'    => (int) $a['tmp_id'],
                'member_name'  => $a['name'] ?? '',
                'email'        => $a['email'] ?? null,
                'phone1'       => $a['phone'] ?? null,
                'note'         => $a['note']  ?? null,
                'include'      => 1,   // treated as active by the wizard
                'main_contact' => 0,
                'is_active'    => 1,
            ]);
        }

        return $out;
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
    public static function countActive(int $clientId, ?RenewalSession $session = null): int
    {
        $committed = (int) Db::scalar(
            "SELECT COUNT(*) FROM members
              WHERE client_id = ?
                AND wizard_removed_at IS NULL",
            [$clientId]
        );

        if ($session === null) {
            return $committed;
        }

        // Adjust for pending ops. Removes subtract, adds add.
        // Modifies don't affect count. Guard against a remove targeting
        // a member that isn't currently active (already soft-deleted in
        // the DB, or belongs to a different client — defensive; caller
        // should have validated) so the count can never go negative.
        $ops = self::getPendingOps($session);

        $activeMemberIds = array_column(
            Db::all(
                "SELECT member_id FROM members
                  WHERE client_id = ?
                    AND wizard_removed_at IS NULL",
                [$clientId]
            ),
            'member_id'
        );
        $activeSet = [];
        foreach ($activeMemberIds as $mid) {
            $activeSet[(int) $mid] = true;
        }

        $effectiveRemoves = 0;
        foreach ($ops['removes'] as $mid) {
            if (isset($activeSet[(int) $mid])) {
                $effectiveRemoves++;
            }
        }

        return $committed - $effectiveRemoves + count($ops['adds']);
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

        // Deferred-commit model: the buyer stays in draft_data.buyer_ops
        // until submit-application.php drains the queue on Step 6 submit.
        // Nothing is written to `members` here, so a customer who bails
        // between Step 4 and payment leaves zero orphan rows behind.
        // Concurrency concerns from the old row-lock/transaction pattern
        // no longer apply — a single wizard session's JS makes serial
        // calls, and cross-session races would only touch different
        // clients (each has its own draft_data).
        $ops = self::getPendingOps($session);

        $effective = self::countActive($session->clientId, $session);
        if ($effective >= self::MAX_BUYERS) {
            throw new RuntimeException(
                "Cannot add buyer: client {$session->clientId} already has {$effective} active buyers "
                . "(maximum is " . self::MAX_BUYERS . ")."
            );
        }

        $tmpId = (int) $ops['next_tmp_id'];
        $ops['next_tmp_id'] = $tmpId - 1;
        $ops['adds'][] = [
            'tmp_id' => $tmpId,
            'name'   => $name,
            'email'  => self::sanitiseOptional($email, 255),
            // Phone stored as raw digits (see PhoneFormat::pfm_normalize_phone
            // for the legacy admin form's input-mask constraint).
            'phone'  => pfm_normalize_phone(self::sanitiseOptional($phone, 100)),
            'note'   => self::sanitiseOptional($note, 255),
        ];
        self::savePendingOps($session, $ops);

        // Log with the negative tmp_id as target. submit-application.php
        // rewrites these to the real member_id once the INSERT lands.
        $session->logChange(
            RenewalSession::CHANGE_BUYER_ADDED,
            $tmpId,
            'member_name',
            null,
            $name
        );

        return $tmpId;
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

        // Case 1: pending add (negative tmp_id) — never made it to the DB,
        // so just yank it out of ops.adds and discard the matching
        // CHANGE_BUYER_ADDED log entry so the Changes Summary stays clean.
        // No DB touch, no "removed" log entry (the buyer never existed to
        // staff).
        if ($memberId < 0) {
            $ops = self::getPendingOps($session);
            $before = count($ops['adds']);
            $ops['adds'] = array_values(array_filter(
                $ops['adds'],
                static fn(array $a): bool => (int) ($a['tmp_id'] ?? 0) !== $memberId
            ));
            if (count($ops['adds']) === $before) {
                // Not found — silently ignore. This is the idempotent
                // shape existing callers expect.
                return;
            }
            self::savePendingOps($session, $ops);

            // Drop the ADDED change-log entry so no ghost buyer shows up
            // on the review panel or the B1-a renewal-history note.
            Db::exec(
                'DELETE FROM renewal_changes
                   WHERE session_id = ?
                     AND target_id  = ?
                     AND change_type = ?',
                [$session->id, $memberId, RenewalSession::CHANGE_BUYER_ADDED]
            );
            return;
        }

        // Case 2: real committed member. Validate ownership, refuse to
        // remove the main contact, then queue the removal on the ops
        // struct — the actual UPDATE members SET wizard_removed_at = NOW()
        // happens in submit-application.php when the queue is drained.
        $buyer = self::assertBelongsToClient($memberId, $session->clientId);

        if ($buyer['main_contact']) {
            throw new RuntimeException(
                "Cannot remove member {$memberId}: they are the main contact. "
                . "Use the Main Contact step to change the main contact."
            );
        }

        $ops = self::getPendingOps($session);

        // If already queued for removal, idempotent no-op (matches old
        // wizard_removed_at short-circuit).
        foreach ($ops['removes'] as $existing) {
            if ((int) $existing === $memberId) {
                return;
            }
        }

        // Drop any pending modifies for this member — they're about to
        // be irrelevant. Keeps the queue slim.
        if (isset($ops['modifies'][$memberId])) {
            unset($ops['modifies'][$memberId]);
        }

        $ops['removes'][] = $memberId;
        self::savePendingOps($session, $ops);

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

        $buyer = self::assertBelongsToClient($memberId, $session->clientId);

        $ops = self::getPendingOps($session);

        $wasQueued = false;
        $ops['removes'] = array_values(array_filter(
            $ops['removes'],
            static function ($mid) use ($memberId, &$wasQueued): bool {
                if ((int) $mid === $memberId) {
                    $wasQueued = true;
                    return false;
                }
                return true;
            }
        ));

        // If the row wasn't queued AND the DB still has it active, this
        // is a no-op — matches the old "already active" short-circuit.
        // (In the deferred model, DB-level wizard_removed_at should only
        // appear from before this refactor or from an interrupted submit;
        // the queue is the wizard's canonical source of truth.)
        if (!$wasQueued && empty($buyer['wizard_removed_at'])) {
            return;
        }

        // Cap check against the EFFECTIVE roster after we restore.
        $effective = self::countActive($session->clientId, $session);
        if ($wasQueued) {
            // We just un-queued the remove, so effective is already what
            // it'll be after the restore. Guard against the pathological
            // case where the DB is already at MAX_BUYERS AND the customer
            // queued a remove/restore cycle that would push it over
            // (shouldn't be reachable from the UI but defend anyway).
            if ($effective > self::MAX_BUYERS) {
                throw new RuntimeException(
                    "Cannot restore buyer: client {$session->clientId} already has {$effective} active buyers "
                    . "(maximum is " . self::MAX_BUYERS . ")."
                );
            }
        }

        self::savePendingOps($session, $ops);

        // Legacy pre-refactor cleanup: if the members row still carries
        // an old wizard_removed_at flag, clear it now. Once every session
        // has been through the new code path this branch will be dead.
        if (!empty($buyer['wizard_removed_at'])) {
            Db::exec(
                "UPDATE members
                    SET wizard_removed_at = NULL,
                        include           = b'1'
                  WHERE member_id = ?",
                [$memberId]
            );
        }

        $session->logChange(
            RenewalSession::CHANGE_BUYER_ADDED,
            $memberId,
            'member_name',
            null,
            $buyer['member_name']
        );
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

        $ops = self::getPendingOps($session);

        // Case 1: pending add (negative tmp_id) — edit lives entirely in
        // ops.adds, no DB touch, and no CHANGE_BUYER_MODIFIED log entry
        // (buyer never made it to staff, so the Changes Summary just
        // reflects the final add).
        if ($memberId < 0) {
            $found = false;
            foreach ($ops['adds'] as &$a) {
                if ((int) ($a['tmp_id'] ?? 0) !== $memberId) {
                    continue;
                }
                $found = true;
                foreach ($fields as $field => $newValue) {
                    if (!array_key_exists($field, self::MODIFIABLE_FIELDS)) {
                        throw new InvalidArgumentException(
                            "Field '{$field}' is not modifiable via BuyerManager."
                        );
                    }
                    $cleaned = self::normaliseModifyValue($field, $newValue);
                    // adds structure uses 'name'/'phone' keys; translate.
                    $addKey = self::modifyFieldToAddKey($field);
                    $a[$addKey] = $cleaned;
                }
                break;
            }
            unset($a);

            if (!$found) {
                throw new RuntimeException(
                    "Pending buyer {$memberId} not found in current session."
                );
            }
            self::savePendingOps($session, $ops);
            return;
        }

        // Case 2: real committed member. Validate, whitelist, diff against
        // (committed row overlaid with any pending modifies), and queue the
        // change in ops.modifies. Actual UPDATE happens in submit-
        // application.php.
        $buyer = self::assertBelongsToClient($memberId, $session->clientId);

        if ($buyer['main_contact']) {
            throw new RuntimeException(
                "Cannot modify member {$memberId} via BuyerManager: "
                . "they are the main contact. Use the Main Contact step."
            );
        }

        $pendingForMember = $ops['modifies'][$memberId] ?? [];
        $changes          = []; // [field => [old, new]] for the log

        foreach ($fields as $field => $newValue) {
            if (!array_key_exists($field, self::MODIFIABLE_FIELDS)) {
                throw new InvalidArgumentException(
                    "Field '{$field}' is not modifiable via BuyerManager."
                );
            }

            $cleaned = self::normaliseModifyValue($field, $newValue);

            // Effective "current" value = pending override if present, else
            // committed DB value. Compare the same trim+phone-normalise
            // way the old code did.
            $oldRaw = array_key_exists($field, $pendingForMember)
                ? $pendingForMember[$field]
                : ($buyer[$field] ?? null);
            $oldNormalised = $oldRaw !== null ? trim((string) $oldRaw) : null;
            if ($oldNormalised === '') {
                $oldNormalised = null;
            }
            if ($field === 'phone1') {
                $oldNormalised = pfm_normalize_phone($oldNormalised);
            }
            if ($cleaned === $oldNormalised) {
                continue;
            }

            $pendingForMember[$field] = $cleaned;
            $changes[$field]          = [$buyer[$field] ?? null, $cleaned];
        }

        if (empty($changes)) {
            return; // all values were identical — nothing to do
        }

        $ops['modifies'][$memberId] = $pendingForMember;
        self::savePendingOps($session, $ops);

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

    /**
     * Trim + null-normalise + phone-canonicalise one incoming modify()
     * value. Extracted so both modify()-of-committed and modify()-of-
     * pending-add can share the same rules.
     */
    private static function normaliseModifyValue(string $field, $rawValue)
    {
        $maxLen  = self::MODIFIABLE_FIELDS[$field] ?? 255;
        $cleaned = $rawValue !== null ? trim((string) $rawValue) : null;

        if ($cleaned !== null && strlen($cleaned) > $maxLen) {
            throw new InvalidArgumentException(
                "Field '{$field}' must be {$maxLen} characters or fewer."
            );
        }
        if ($cleaned === '') {
            $cleaned = null;
        }
        if ($field === 'phone1') {
            $cleaned = pfm_normalize_phone($cleaned);
        }
        return $cleaned;
    }

    /**
     * Map a public modifiable field name (matches the members column)
     * to the corresponding key in the ops.adds struct — the adds
     * dictionary uses shorter camel-ish names (name/email/phone/note)
     * because it's serialised into JSON on every save.
     */
    private static function modifyFieldToAddKey(string $field): string
    {
        return [
            'member_name' => 'name',
            'email'       => 'email',
            'phone1'      => 'phone',
            'note'        => 'note',
        ][$field] ?? $field;
    }

    /**
     * Drain the pending buyer-op queue on Step 6 submit. Called by
     * submit-application.php inside its main transaction so the members
     * table snapshot, the change-log rewrite, and the payment-record
     * INSERT all live or die together.
     *
     * Order of operations:
     *   1. Adds → INSERT INTO members. Capture (tmp_id → real_id) map so
     *      the change log's negative target_ids can be rewritten below.
     *   2. Rewrite renewal_changes rows whose target_id is one of our
     *      tmp_ids to the newly-minted real member_id. Also rewrite the
     *      B1-a downstream log consumers automatically (they read from
     *      renewal_changes).
     *   3. Modifies → UPDATE members. Merged patch per member — one SQL
     *      per member, not per field, because each ops entry already
     *      collapses to the most recent value.
     *   4. Removes → soft-delete via wizard_removed_at = NOW() +
     *      include = b'0'. Mirrors the pre-refactor remove() side-effect
     *      exactly, so purgeRemovedBuyers() and the legacy admin's
     *      CURRENT BUYERS grid see the same shape they used to.
     *   5. Clear buyer_ops from draft_data so a repeat submit is a no-op.
     */
    public static function commitPendingOps(RenewalSession $session): void
    {
        $ops = self::getPendingOps($session);
        if (empty($ops['adds']) && empty($ops['removes']) && empty($ops['modifies'])) {
            // Nothing queued (e.g. customer only edited Step 3 contact) —
            // still clear the key so a future re-submit stays idempotent.
            self::clearPendingOps($session);
            return;
        }

        $tmpToReal = [];

        // 1. Adds
        foreach ($ops['adds'] as $a) {
            $realId = Db::insert(
                "INSERT INTO members (client_id, member_name, email, phone1, note, include, main_contact)
                 VALUES (?, ?, ?, ?, ?, b'1', b'0')",
                [
                    $session->clientId,
                    (string) ($a['name'] ?? ''),
                    self::sanitiseOptional($a['email'] ?? null, 255),
                    // Already normalised at add() time; re-normalise defensively
                    // in case modify() on a pending row put it back into
                    // formatted shape.
                    pfm_normalize_phone(self::sanitiseOptional($a['phone'] ?? null, 100)),
                    self::sanitiseOptional($a['note']  ?? null, 255),
                ]
            );
            $tmpToReal[(int) $a['tmp_id']] = (int) $realId;
        }

        // 2. Rewrite negative target_ids in the change log.
        foreach ($tmpToReal as $tmpId => $realId) {
            Db::exec(
                'UPDATE renewal_changes
                    SET target_id = ?
                  WHERE session_id = ? AND target_id = ?',
                [$realId, $session->id, $tmpId]
            );
        }

        // 3. Modifies
        foreach ($ops['modifies'] as $memberId => $patch) {
            if (empty($patch) || !is_array($patch)) {
                continue;
            }
            $setClauses = [];
            $params     = [];
            foreach ($patch as $col => $val) {
                if (!array_key_exists($col, self::MODIFIABLE_FIELDS)) {
                    continue;
                }
                $setClauses[] = "{$col} = ?";
                $params[]     = $val;
            }
            if (empty($setClauses)) {
                continue;
            }
            $params[] = (int) $memberId;
            Db::exec(
                'UPDATE members SET ' . implode(', ', $setClauses) . ' WHERE member_id = ?',
                $params
            );
        }

        // 4. Removes — soft-delete with dual-flag write, mirroring the
        //    pre-refactor remove() so purgeRemovedBuyers() and the legacy
        //    grid see the same state they used to.
        foreach ($ops['removes'] as $memberId) {
            $mid = (int) $memberId;
            if ($mid <= 0) {
                continue;
            }
            Db::exec(
                "UPDATE members
                    SET wizard_removed_at = NOW(),
                        include           = b'0'
                  WHERE member_id = ?",
                [$mid]
            );
        }

        // 5. Clear the queue so idempotent re-submits don't re-INSERT.
        self::clearPendingOps($session);
    }

    /**
     * Remove the buyer_ops key from draft_data. Called after a successful
     * commit and also from cancel/reset flows if you ever need to bail
     * out cleanly without processing.
     */
    public static function clearPendingOps(RenewalSession $session): void
    {
        if (!isset($session->draftData[self::OPS_KEY])) {
            return;
        }
        $draft = $session->draftData;
        unset($draft[self::OPS_KEY]);
        $session->replaceDraft($draft);
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
