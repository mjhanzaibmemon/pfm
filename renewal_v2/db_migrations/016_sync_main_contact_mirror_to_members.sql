-- ─────────────────────────────────────────────────────────────────────
-- Migration 016: sync clients.main_contact_* mirror → members primary
--                row (one-time bulk sync + trigger for future edits)
--
-- Context
-- -------
-- PFM's Legacy admin (ScriptCase-generated) has a long-standing design
-- quirk: the Main Contact tab updates the clients.main_contact_*
-- mirror columns when Save is clicked, but does NOT sync those values
-- back to the members table row flagged main_contact = b'1'. The
-- Current Buyers tab on the same client form reads directly from that
-- members row, so the two tabs end up showing DIFFERENT information
-- for the same primary contact person — different email, different
-- name, different phone, depending on what got edited when.
--
-- A production data scan on 2026-08-13 (via testing.pfm-app.com clone
-- of the 2026-07-26 prod snapshot) found 1,420 active real customer
-- clients in this state:
--   - 1,051 with phone number drift (canonical maintained, members
--     row stale)
--   -   170 with an empty members email that clients mirror has
--   -    62 with placeholder phones (0000000000 etc.) on the members
--     row while canonical has the real one
--   -    55 with name-format variations (canonical has fuller version)
--   -    33 with two different plausible emails (staff choice edge case)
--   -    30 with a completely different person (real staff turnover)
--   -    12 with placeholder fill@fill.com on members, real on canonical
--   -   The remaining handful are individually-reviewable edge cases
--
-- Larissa reviewed the full 1,420-row breakdown
-- (PFM_Legacy_Admin_Mismatch_Review.xlsx sent 2026-08-13) and gave
-- explicit approval to sync members → canonical, since the canonical
-- values are her OWN Main Contact tab edits accumulated over years.
-- Nothing is invented; the sync just harmonises two DB representations
-- of Larissa's already-canonical values so both Legacy admin tabs
-- agree.
--
-- Wizard-side impact
-- ------------------
-- The renewal wizard was updated 2026-08-07 (commit c10f0d0) to prefer
-- clients.main_contact_* over the members row for Step 3 prefill, and
-- BuyerManager::getActive() picks the canonical primary via the same
-- mirror in the dedup path. So the wizard already renders the
-- canonical values regardless of this migration. Migration 016
-- primarily fixes the Legacy admin's OWN internal inconsistency —
-- staff will no longer see two different values on the same client
-- form's two tabs.
--
-- What this migration does — three parts
-- --------------------------------------
--
-- PART 0 (safety snapshot)
--   CREATE TABLE members_pre_016_sync_backup — copy of every members
--   row Part 1 is about to change. Enables 1-command rollback (see
--   ROLLBACK block at the bottom). Uses CREATE TABLE IF NOT EXISTS so
--   a re-run doesn't clobber an existing backup — drop the table
--   manually if you truly want a fresh backup snapshot.
--
-- PART 1 (one-time sync)
--   UPDATE members m JOIN clients c ...
--   For every SINGLE-primary client where members row disagrees with
--   canonical mirror on name / email / phone, overwrite members with
--   canonical value — BUT only for fields where canonical is non-empty
--   (CASE WHEN TRIM(...) <> ''). Empty canonical values leave the
--   corresponding members field alone, so we never accidentally blank
--   out a real value with a NULL mirror.
--
--   MULTI-primary clients are excluded (JOIN on the single-primary
--   subquery). Those need explicit resolution — the wizard's own
--   BuyerManager::getActive() dedup handles them at display time, but
--   we don't want to programmatically overwrite both primary rows
--   with the same value here.
--
-- PART 2 (trigger for future edits)
--   CREATE TRIGGER sync_main_contact_to_members_primary AFTER UPDATE
--   ON clients. Fires only when at least one of the mirror columns
--   (name / email / phone) actually changed, and only when the
--   affected client has exactly ONE primary members row. Same
--   non-empty-guard as Part 1 — a Save on Main Contact tab that
--   clears a field will NOT blank the corresponding members field.
--   Empty-canonical writes are deliberately treated as no-ops to
--   preserve customer contact data if a mirror field gets accidentally
--   cleared.
--
--   Multi-primary clients: trigger skips them for the same reason as
--   Part 1 — the wizard-side dedup handles those safely without
--   creating identical duplicate rows.
--
-- Idempotency
-- -----------
-- Re-running is safe:
--   Part 0 — CREATE TABLE IF NOT EXISTS is a no-op if backup exists.
--   Part 1 — Rows already in sync generate zero-affected UPDATEs
--            because the WHERE clause requires a difference on at
--            least one field.
--   Part 2 — DROP TRIGGER IF EXISTS before CREATE TRIGGER makes
--            re-run replace the definition cleanly.
--
-- Rollback
-- --------
-- Bottom of file has the ROLLBACK block, commented. Uncomment + run
-- to restore every synced row from the backup table and drop the
-- trigger. The backup table itself is preserved for audit.
-- ─────────────────────────────────────────────────────────────────────


-- ═══════════════════════════════════════════════════════════════════
-- PART 0 — Safety snapshot of the rows Part 1 will change
-- ═══════════════════════════════════════════════════════════════════

CREATE TABLE IF NOT EXISTS `pfm`.`members_pre_016_sync_backup` AS
SELECT m.*
  FROM `pfm`.`members` m
  JOIN `pfm`.`clients` c ON c.client_id = m.client_id
  JOIN (
    SELECT client_id FROM `pfm`.`members`
     WHERE main_contact = b'1' AND wizard_removed_at IS NULL
     GROUP BY client_id HAVING COUNT(*) = 1
  ) single ON single.client_id = m.client_id
 WHERE m.main_contact       = b'1'
   AND m.wizard_removed_at IS NULL
   AND (NOT (m.member_name <=> c.main_contact_name)
     OR NOT (m.email       <=> c.main_contact_email)
     OR NOT (m.phone1      <=> c.main_contact_phone));

-- Expected: ~1,420 rows snapshotted on first run.


-- ═══════════════════════════════════════════════════════════════════
-- PART 1 — One-time sync: canonical mirror → members primary row
-- ═══════════════════════════════════════════════════════════════════

UPDATE `pfm`.`members` m
  JOIN `pfm`.`clients` c ON c.client_id = m.client_id
  JOIN (
    SELECT client_id FROM `pfm`.`members`
     WHERE main_contact = b'1' AND wizard_removed_at IS NULL
     GROUP BY client_id HAVING COUNT(*) = 1
  ) single ON single.client_id = m.client_id
   SET m.member_name = CASE
         WHEN TRIM(COALESCE(c.main_contact_name, '')) <> ''
         THEN c.main_contact_name
         ELSE m.member_name
       END,
       m.email       = CASE
         WHEN TRIM(COALESCE(c.main_contact_email, '')) <> ''
         THEN c.main_contact_email
         ELSE m.email
       END,
       m.phone1      = CASE
         WHEN TRIM(COALESCE(c.main_contact_phone, '')) <> ''
         THEN c.main_contact_phone
         ELSE m.phone1
       END
 WHERE m.main_contact       = b'1'
   AND m.wizard_removed_at IS NULL
   AND (NOT (m.member_name <=> c.main_contact_name)
     OR NOT (m.email       <=> c.main_contact_email)
     OR NOT (m.phone1      <=> c.main_contact_phone));

-- Expected: ~1,420 rows affected on fresh apply.
-- 0 rows on re-run (WHERE clause requires a difference).


-- ═══════════════════════════════════════════════════════════════════
-- PART 2 — Trigger for future Main Contact tab edits
-- ═══════════════════════════════════════════════════════════════════

DROP TRIGGER IF EXISTS `pfm`.`sync_main_contact_to_members_primary`;

DELIMITER //

CREATE TRIGGER `pfm`.`sync_main_contact_to_members_primary`
AFTER UPDATE ON `pfm`.`clients`
FOR EACH ROW
BEGIN
    DECLARE primary_count INT DEFAULT 0;

    -- Fire only when at least one mirror field actually changed.
    -- <=> is NULL-safe equality; wrapping with NOT ... AND ... AND ...
    -- returns TRUE iff any pair differs.
    IF NOT (NEW.main_contact_name  <=> OLD.main_contact_name
        AND NEW.main_contact_email <=> OLD.main_contact_email
        AND NEW.main_contact_phone <=> OLD.main_contact_phone) THEN

        SELECT COUNT(*) INTO primary_count
          FROM `pfm`.`members`
         WHERE client_id           = NEW.client_id
           AND main_contact        = b'1'
           AND wizard_removed_at  IS NULL;

        -- Only auto-sync single-primary clients. Multi-primary rows
        -- are handled by BuyerManager::getActive() at display time.
        IF primary_count = 1 THEN
            UPDATE `pfm`.`members`
               SET member_name = CASE
                     WHEN TRIM(COALESCE(NEW.main_contact_name, '')) <> ''
                     THEN NEW.main_contact_name
                     ELSE member_name
                   END,
                   email       = CASE
                     WHEN TRIM(COALESCE(NEW.main_contact_email, '')) <> ''
                     THEN NEW.main_contact_email
                     ELSE email
                   END,
                   phone1      = CASE
                     WHEN TRIM(COALESCE(NEW.main_contact_phone, '')) <> ''
                     THEN NEW.main_contact_phone
                     ELSE phone1
                   END
             WHERE client_id           = NEW.client_id
               AND main_contact        = b'1'
               AND wizard_removed_at  IS NULL;
        END IF;
    END IF;
END//

DELIMITER ;


-- ═══════════════════════════════════════════════════════════════════
-- VERIFICATION — run after Part 1 + Part 2 complete
-- ═══════════════════════════════════════════════════════════════════
-- SELECT
--   'Remaining single-primary mismatches (should be 0)' AS metric,
--   COUNT(*) AS n
-- FROM `pfm`.`members` m
--   JOIN `pfm`.`clients` c ON c.client_id = m.client_id
--   JOIN (
--     SELECT client_id FROM `pfm`.`members`
--      WHERE main_contact = b'1' AND wizard_removed_at IS NULL
--      GROUP BY client_id HAVING COUNT(*) = 1
--   ) single ON single.client_id = m.client_id
-- WHERE m.main_contact       = b'1'
--   AND m.wizard_removed_at IS NULL
--   AND (NOT (m.member_name <=> c.main_contact_name)
--     OR NOT (m.email       <=> c.main_contact_email)
--     OR NOT (m.phone1      <=> c.main_contact_phone));
--
-- SELECT
--   'Backup table row count (should be ~1,420)' AS metric,
--   COUNT(*) AS n
-- FROM `pfm`.`members_pre_016_sync_backup`;
--
-- SELECT
--   'Trigger exists (should return 1 row)' AS metric,
--   COUNT(*) AS n
-- FROM information_schema.triggers
-- WHERE trigger_name = 'sync_main_contact_to_members_primary';


-- ═══════════════════════════════════════════════════════════════════
-- ROLLBACK (commented). Uncomment and run to fully undo Migration 016.
-- Restores every synced row from the backup table + drops the trigger.
-- ═══════════════════════════════════════════════════════════════════
-- UPDATE `pfm`.`members` m
--   JOIN `pfm`.`members_pre_016_sync_backup` b ON b.member_id = m.member_id
--    SET m.member_name = b.member_name,
--        m.email       = b.email,
--        m.phone1      = b.phone1;
--
-- DROP TRIGGER IF EXISTS `pfm`.`sync_main_contact_to_members_primary`;
--
-- Optional — drop the backup table too after confirming rollback:
-- DROP TABLE IF EXISTS `pfm`.`members_pre_016_sync_backup`;
