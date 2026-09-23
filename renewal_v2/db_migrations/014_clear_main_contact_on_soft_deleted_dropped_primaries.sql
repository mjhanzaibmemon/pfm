-- ─────────────────────────────────────────────────────────────────────
-- Migration 014: clear main_contact flag on the 151 primary rows that
--                migration 012 soft-deleted via wizard_removed_at.
--
-- Why this exists
-- ---------------
-- Migration 012 (2026-07-30) soft-deleted the 151 rows Larissa marked
-- DROP in her workbook review. That soft-delete only stamped
-- wizard_removed_at = NOW() — main_contact = b'1' was left alone.
--
-- BuyerManager::getActive() (renewal_v2) filters on wizard_removed_at
-- IS NULL, so the wizard correctly stopped showing those rows. But
-- the legacy PFM admin's CURRENT BUYERS grid reads main_contact
-- directly with no wizard_removed_at filter — so it kept displaying
-- those rows as "Primary: Yes" alongside the true canonical primary.
--
-- Larissa hit this on 2026-07-30 opening Ambius (client 2760): the
-- Current Buyers tab showed THREE rows flagged Primary — Bonnie
-- Schramm (the canonical KEEP), Melissa St Mars (soft-deleted by 012),
-- and Place Holder (soft-deleted by 012). Per her 2026-07-30
-- clarification "each client should only have one primary contact —
-- the person listed on the main Primary Contact screen", the legacy
-- admin needs to reflect that too. My 012 was incomplete; this
-- migration completes the intent.
--
-- What this migration does
-- ------------------------
-- Sets main_contact = b'0' on the same 151 member_ids that 012 soft-
-- deleted. Nothing else changes:
--   * wizard_removed_at stays set (from 012) — renewal_v2 continues
--     to hide these rows via the same filter.
--   * include is not touched — some DROP rows were placeholders with
--     include=NULL, some real people with include=0 or 1; each keeps
--     whatever it had.
--   * clients.main_contact_* mirror fields are not touched.
--
-- Effect after apply
-- ------------------
-- Legacy admin's CURRENT BUYERS grid on every affected client will
-- show "Primary: --" for every DROP row (previously "Primary: Yes")
-- and "Primary: Yes" only on the actual KEEP row. Matches what the
-- wizard already reports.
--
-- Safety
-- ------
-- Filter is explicit member_id IN (...) — every ID is one 012 wrote
-- to. We ALSO guard on wizard_removed_at IS NOT NULL so that if a
-- future re-run of the migration ever hit a row someone had
-- unremoved from renewal_v2, we would not silently demote it.
--
-- Idempotency
-- -----------
-- Second apply is a no-op: the UPDATE requires main_contact = b'1'
-- to fire, so once flipped, the same row is skipped next time.
--
-- Rollback
-- --------
-- The reverse UPDATE at the bottom (commented) restores
-- main_contact = b'1' on all 151 rows, undoing this migration
-- without touching 012's wizard_removed_at stamp.
-- ─────────────────────────────────────────────────────────────────────

UPDATE `pfm`.`members`
   SET `main_contact` = b'0'
 WHERE `main_contact` = b'1'
   AND `wizard_removed_at` IS NOT NULL
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

-- Expected rows affected on a fresh apply: 151.
-- 0 if re-run against an already-migrated DB.

-- ─────────────────────────────────────────────────────────────────────
-- Verification — after apply.
--   • Every one of the 151 IDs must have main_contact = 0.
--   • No row across the DB should have main_contact = 1 AND
--     wizard_removed_at IS NOT NULL (orphan primary + soft-delete
--     combo eliminated).
--   • Live-primary count (main=1 AND wizard_removed_at IS NULL)
--     must be unchanged compared to before this migration ran —
--     we only touched already-soft-deleted rows.
-- ─────────────────────────────────────────────────────────────────────
-- SELECT
--   SUM(main_contact = b'1' AND wizard_removed_at IS NULL) AS live_primaries,
--   SUM(main_contact = b'1' AND wizard_removed_at IS NOT NULL) AS orphan_primaries_should_be_0,
--   SUM(main_contact = b'0' AND wizard_removed_at IS NOT NULL) AS soft_deleted_non_primaries
-- FROM `pfm`.`members`;

-- ─────────────────────────────────────────────────────────────────────
-- ROLLBACK (commented). Restores main_contact = b'1' on all 151 rows.
-- ─────────────────────────────────────────────────────────────────────
-- UPDATE `pfm`.`members`
--    SET `main_contact` = b'1'
--  WHERE `member_id` IN (
--     4047, 6911, 8108, 12456, 12660, 13906, 14706, 14891, 15457, 16192,
--     16413, 16591, 17953, 18711, 19577, 24429, 24575, 24799, 25691, 26153,
--     26863, 28045, 29950, 30025, 31438, 31812, 32395, 32702, 32920, 33452,
--     33834, 34405, 34636, 36007, 36253, 36319, 36348, 36445, 36449, 36476,
--     36544, 36596, 36615, 36621, 36633, 36688, 36733, 36734, 36737, 36738,
--     36787, 36804, 36860, 36865, 36866, 36867, 36868, 36919, 36923, 36938,
--     36939, 36940, 36941, 36969, 36996, 36997, 37023, 37067, 37163, 37169,
--     37231, 37232, 37233, 37234, 37235, 37236, 37237, 37289, 37394, 37409,
--     37410, 37411, 37412, 37425, 37426, 37427, 37456, 37489, 37494, 37499,
--     37505, 37508, 37509, 37510, 37546, 37554, 37555, 37558, 37559, 37560,
--     37596, 37602, 37603, 37616, 37617, 37618, 37644, 37666, 37700, 37701,
--     37751, 37752, 38116, 38117, 38118, 38119, 38203, 38204, 38205, 38380,
--     38396, 38399, 38400, 38401, 38402, 38433, 38460, 38461, 38463, 38464,
--     38467, 38498, 38501, 38515, 38526, 38535, 38666, 38684, 38695, 38718,
--     38927, 38928, 38977, 39023, 39090, 39092, 39156, 39179, 39207, 39209,
--     39210
--    );
