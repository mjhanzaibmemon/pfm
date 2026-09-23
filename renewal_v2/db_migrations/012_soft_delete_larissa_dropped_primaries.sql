-- ─────────────────────────────────────────────────────────────────────
-- Migration 012: soft-delete the 151 primary-contact rows Larissa
--                marked DROP in her 2026-07-30 workbook review.
--
-- Context
-- -------
-- On 2026-07-27 a clone-rehearsal test with client 738023 (syntechops)
-- surfaced that renewal_v2's Active Buyers section was over-counting
-- when a client had multiple members rows flagged main_contact = b'1'.
-- Investigation found the wizard code was correct — the write path had
-- been hardened in commit 371cd5c so it can no longer introduce a
-- second primary row on its own — but 95 clients on production carried
-- pre-existing duplicate-primary state accumulated over years of
-- legacy-admin (ScriptCase) edits. Larissa confirmed on 2026-07-30:
--
--   "Each client should only have one primary contact. The primary
--    contact should be the person listed on the main Primary Contact
--    screen, not multiple people from the buyer/member list."
--
-- Muhammad exported the full duplicate-primary roster
-- (`PFM_Duplicate_Primary_Contacts_Review.xlsx`, 3 sheets, 256 rows
-- across 95 clients) and Larissa reviewed every row, marking each as
-- KEEP or DROP. She returned the completed workbook 2026-07-30.
--
-- What this migration does
-- ------------------------
-- Soft-deletes every members row whose member_id appears in Larissa's
-- DROP list. "Soft-delete" here means stamping wizard_removed_at =
-- NOW() — the row stays in the members table, keeps its main_contact
-- flag, but disappears from BuyerManager::getActive() (which filters
-- on `wizard_removed_at IS NULL`) and therefore from every renewal-
-- v2 wizard surface and the admin/review.php Active Buyers panel.
--
-- Nothing on any KEEP row is touched. Their main_contact flag, their
-- name, email, phone, and include value all remain exactly as they
-- are today. Legacy admin's CURRENT BUYERS grid keeps showing them.
--
-- What this migration does NOT do
-- -------------------------------
-- 1. Does not touch the 11 clients where Larissa marked 2 or 3 rows
--    as KEEP (Ambius, Kraft Masonry, Mis Tacones, North Star
--    Construction, Olivia's Emporium, Oregon Rheumatology, Paradise
--    Restored Landscaping, Portland Building and Remodeling, Sira
--    Fleur, Soter Vineyards, Z Callas). Those clients are handled by
--    a separate follow-up migration (013) that picks the canonical
--    Primary Contact screen row and demotes the other KEEP rows to
--    regular buyers (main_contact = 0, include = 1). Splitting the
--    two concerns into two migrations keeps rollback fine-grained.
-- 2. Does not hard-delete anything. Every row remains in the members
--    table, only its visibility flag flips.
-- 3. Does not modify clients.main_contact_name / .main_contact_email
--    / .main_contact_phone — the canonical Primary Contact screen
--    that Larissa treats as the source of truth stays exactly as it
--    is.
--
-- Idempotency
-- -----------
-- Re-running is a no-op: the UPDATE only affects rows whose
-- wizard_removed_at IS NULL, so a second application will not roll
-- forward the timestamp on rows already soft-deleted (avoiding
-- inflating a rollback set on the next apply).
--
-- Rollback
-- --------
-- The reverse UPDATE is at the bottom of this file, commented out.
-- Uncomment and run to restore every soft-deleted row. Because we
-- only stamped wizard_removed_at, the rollback simply nulls it back
-- and the rows reappear on every surface.
--
-- Verification query is at the bottom (commented). Run it after this
-- migration completes to confirm each of the 82 simple-cleanup
-- clients now has exactly 1 primary, the 2 test-file clients (4 and
-- 737971) have 0, and the 11 multi-KEEP clients still show 2 or 3
-- (they will be resolved by migration 013).
-- ─────────────────────────────────────────────────────────────────────

UPDATE `pfm`.`members`
   SET `wizard_removed_at` = NOW()
 WHERE `main_contact` = b'1'
   AND `wizard_removed_at` IS NULL
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
-- (fewer if this migration is re-run against an already-migrated DB)

-- ─────────────────────────────────────────────────────────────────────
-- Verification — run manually after the UPDATE above completes.
-- Every affected client should now have primary_count equal to the
-- number of KEEP rows Larissa marked for that client.
-- ─────────────────────────────────────────────────────────────────────
-- SELECT
--   c.client_id,
--   c.co_name,
--   COUNT(*) AS primary_count
-- FROM `pfm`.`members` m
-- JOIN `pfm`.`clients` c ON c.client_id = m.client_id
-- WHERE m.main_contact = b'1'
--   AND m.wizard_removed_at IS NULL
--   AND m.client_id IN (
--     -- The 95 client_ids that had duplicate primaries before 012 ran
--     SELECT DISTINCT client_id FROM `pfm`.`members`
--      WHERE main_contact = b'1'
--        AND member_id IN (
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
--        )
--   )
-- GROUP BY c.client_id, c.co_name
-- ORDER BY primary_count DESC, c.co_name;
--
-- Expected result buckets:
--   primary_count = 3  → 1 client  (Kraft Masonry, resolved by 013)
--   primary_count = 2  → 10 clients (resolved by 013)
--   primary_count = 1  → 82 clients (done, this migration handled)
--   primary_count = 0  → 2 clients  (client 4 test file, 737971 broken record)

-- ─────────────────────────────────────────────────────────────────────
-- ROLLBACK (commented). To undo migration 012, uncomment the block
-- below and run it. This restores every row this migration soft-
-- deleted, in one atomic UPDATE.
-- ─────────────────────────────────────────────────────────────────────
-- UPDATE `pfm`.`members`
--    SET `wizard_removed_at` = NULL
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
