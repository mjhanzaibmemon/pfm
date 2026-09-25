-- ─────────────────────────────────────────────────────────────────────
-- Migration 022: co_name_normalized on new_applications — duplicate
--                company-name protection BETWEEN pending applications
--
-- Section 3's duplicate check (migration 019) compares a new applicant's
-- company name against the `clients` table only. That leaves a gap: two
-- applicants can apply with the same company name at the same time —
-- neither is a `clients` row until staff approve — and both would pass
-- every check and both pay. This column lets the check also see other
-- applications that are past the draft stage.
--
-- Why a plain column written by PHP (not a generated column like
-- clients.co_name_normalized): the name lives inside the draft_data JSON
-- blob, and the value is only meaningful once an application is
-- submitted. NewApplication::submit() writes it using
-- NewApplication::normalizeCompanyName() — the exact same PHP function
-- the live Step 2 check uses — so there is no SQL-vs-PHP normalization
-- drift to keep in sync.
--
-- The column is only consulted for applications whose status is
-- 'submitted', 'awaiting_payment' or 'awaiting_review' (see
-- NewApplication::findNameConflict). Drafts, cancelled and declined
-- applications never block anyone; completed ones already exist as
-- `clients` rows and are covered by the original check.
--
-- IDEMPOTENT: guarded via information_schema + PREPARE/EXECUTE (same
-- pattern as migrations 019/020 — this server's MySQL 8.0.42 rejects
-- "ADD COLUMN IF NOT EXISTS").
-- ─────────────────────────────────────────────────────────────────────

SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'new_applications' AND COLUMN_NAME = 'co_name_normalized'
);
SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `new_applications` ADD COLUMN `co_name_normalized` VARCHAR(255) NULL AFTER `customer_note`',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET @idx_exists = (
  SELECT COUNT(*) FROM information_schema.STATISTICS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'new_applications' AND INDEX_NAME = 'idx_co_name_normalized'
);
SET @ddl = IF(@idx_exists = 0,
  'ALTER TABLE `new_applications` ADD INDEX `idx_co_name_normalized` (`co_name_normalized`)',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- VERIFY (run separately after this migration executes)
--
--   SHOW COLUMNS FROM new_applications LIKE 'co_name_normalized';
--     -- VARCHAR(255), NULL-able
--   SHOW INDEX FROM new_applications WHERE Key_name = 'idx_co_name_normalized';
--     -- one row
