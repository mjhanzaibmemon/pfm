-- ─────────────────────────────────────────────────────────────────────
-- Migration 015: hard-delete the 151 primary rows already soft-deleted
--                by migration 012 (Larissa's 2026-07-30 workbook DROP
--                list).
--
-- Context
-- -------
-- Third and final step of the 2026-07-30 duplicate-primary cleanup:
--   012 stamped wizard_removed_at = NOW()  → wizard hides them
--   014 flipped main_contact = b'0'        → legacy admin shows Primary=--
--   015 removes the rows entirely           → legacy admin no longer clutters
--
-- Rationale for hard-delete (Muhammad + Larissa 2026-08-07 discussion)
-- --------------------------------------------------------------------
-- Larissa's workbook DROP mark on each row is her explicit "remove
-- this" decision. She reviewed 256 rows individually and is not going
-- to reverse those decisions. Keeping them soft-deleted for
-- reversibility served a purpose during the initial cleanup rollout
-- (rollback safety), but once the 012/013/014 sequence has been
-- verified good, the rows serve no further purpose and add clutter to
-- legacy admin's CURRENT BUYERS grid on all 95 affected clients.
--
-- Hard-delete matches the wizard's own established pattern —
-- BuyerManager::purgeRemovedBuyers() (lib/BuyerManager.php, line 611)
-- hard-DELETES a soft-removed buyer at the end of every customer's
-- submit, so bulk-deleting the 151 primary rows Larissa DROPped is
-- the same operation, just batched.
--
-- What this migration does
-- ------------------------
-- DELETE FROM `pfm`.`members` on the 151 member_id list embedded
-- below. Four safety filters combine so this can only touch the
-- exact rows migration 012 targeted:
--
--   1. member_id IN (...151 ids...)
--        — the explicit list, sole source of truth for which rows go
--   2. main_contact = b'0'
--        — must have been demoted by migration 014; a still-primary
--          row here would mean 014 hasn't been applied yet, in which
--          case we refuse to delete
--   3. wizard_removed_at IS NOT NULL
--        — must have been soft-deleted by migration 012; a live
--          (un-removed) row here would mean the soft-delete was
--          rolled back, and hard-delete would surprise the customer
--   4. DATE(wizard_removed_at) = '2026-07-30'
--        — the date 012 stamped; anything with a different soft-delete
--          date is somebody else's row and not our concern
--
-- All four must be true for a DELETE to fire. Any drift from the
-- expected post-014 state on a given row skips it silently — a
-- verification query at the bottom catches non-zero misses.
--
-- What this migration does NOT do
-- -------------------------------
-- 1. Does not touch the 105 KEEP rows (any state, any timestamp).
-- 2. Does not touch the 12 rows migration 013 demoted to buyers —
--    those have wizard_removed_at IS NULL (never soft-deleted),
--    so filter #3 excludes them.
-- 3. Does not touch the 1,488 pre-existing 0-primary real customers
--    the 2026-08-06 investigation surfaced — those are a separate
--    legacy state, handled by the wizard's synthetic-primary
--    fallback + submit-time self-heal.
-- 4. Does not touch clients.main_contact_* mirror fields.
--
-- Idempotency
-- -----------
-- Filters combine to affect ZERO rows on a second application:
-- filter #3 requires wizard_removed_at IS NOT NULL, but once
-- deleted the row no longer exists to be matched.
--
-- Irreversibility
-- ---------------
-- Unlike 012/013/014, this migration is IRREVERSIBLE. No rollback SQL
-- is provided because the row data is gone after DELETE. If you need
-- to preserve the rows for audit / dispute later, take a snapshot
-- BEFORE running:
--   CREATE TABLE pfm.members_dropped_2026_07_30 AS
--   SELECT * FROM pfm.members
--    WHERE main_contact = b'0'
--      AND wizard_removed_at IS NOT NULL
--      AND DATE(wizard_removed_at) = '2026-07-30'
--      AND member_id IN (...151 ids...);
-- On testing this snapshot step is optional (clone is disposable). On
-- production it is STRONGLY recommended.
--
-- Verification query at the bottom (commented). Expected result after
-- a clean apply: 151 rows affected, and the follow-up SELECT returns
-- 0 rows.
-- ─────────────────────────────────────────────────────────────────────

DELETE FROM `pfm`.`members`
 WHERE `main_contact` = b'0'
   AND `wizard_removed_at` IS NOT NULL
   AND DATE(`wizard_removed_at`) = '2026-07-30'
   AND `member_id` IN (
    4047, 6911, 8108, 12456, 12660, 13906, 14706, 14891, 15457, 16192,
    16413, 16591, 17953, 18711, 19577, 24429, 24575, 24799, 25691, 26153,
    26863, 28045, 29950, 30025, 31438, 31812, 32395, 32702, 32920, 33452,
    33834, 34405, 34636, 36007, 36253, 36319, 36348, 36445, 36449, 36476,
    36544, 36596, 36615, 36621, 36633, 36688, 36733, 36734, 36737, 36738,
    36787, 36804, 36860, 36865, 36866, 36867, 36868, 36919, 36923, 36938,
    36939, 36940, 36941, 36969, 36996, 36997, 37023, 37067, 37163, 37169,
    37231, 37232, 37233, 37234, 37235, 37236, 37237, 37289, 37394, 37409,
    37410, 37411, 37412, 37425, 37426, 37427, 37456, 37489, 37494, 37499,
    37505, 37508, 37509, 37510, 37546, 37554, 37555, 37558, 37559, 37560,
    37596, 37602, 37603, 37616, 37617, 37618, 37644, 37666, 37700, 37701,
    37751, 37752, 38116, 38117, 38118, 38119, 38203, 38204, 38205, 38380,
    38396, 38399, 38400, 38401, 38402, 38433, 38460, 38461, 38463, 38464,
    38467, 38498, 38501, 38515, 38526, 38535, 38666, 38684, 38695, 38718,
    38927, 38928, 38977, 39023, 39090, 39092, 39156, 39179, 39207, 39209,
    39210
   );

-- Expected rows affected on a fresh apply: 151
-- 0 if re-run against an already-migrated DB.

-- ─────────────────────────────────────────────────────────────────────
-- Verification — run manually after the DELETE above completes.
-- Should return 0. Any non-zero result means one or more expected-
-- to-be-deleted rows survived — investigate before proceeding.
-- ─────────────────────────────────────────────────────────────────────
-- SELECT COUNT(*) AS survivors_should_be_0
--   FROM `pfm`.`members`
--  WHERE `main_contact` = b'0'
--    AND `wizard_removed_at` IS NOT NULL
--    AND DATE(`wizard_removed_at`) = '2026-07-30';
--
-- And the global duplicate-primary check should still return 0:
-- SELECT COUNT(*) AS clients_with_duplicate_primaries FROM (
--   SELECT client_id FROM `pfm`.`members`
--    WHERE main_contact = b'1' AND wizard_removed_at IS NULL
--    GROUP BY client_id HAVING COUNT(*) > 1
-- ) x;
-- MUST return 0. If not, the cleanup has drifted and needs review.
