-- ─────────────────────────────────────────────────────────────────────
-- Migration 020: 'declined' status + decline audit columns on
--                renewal_sessions — decline workflow for renewals
--
-- Larissa's decline workflow (Section 6 of NEW_CUSTOMER_APPLICATION_SPEC.md)
-- applies to BOTH renewals and new applications ("Staff need the
-- ability to decline a renewal or new application" — her own wording,
-- one unified ability). new_applications already ships with a
-- 'declined' status + declined_at/decline_reason/declined_by columns
-- baked into its initial CREATE TABLE (migration 018). renewal_sessions
-- predates the decline requirement, so this migration adds the
-- equivalent to it.
--
-- Why a genuine new ENUM value instead of reusing 'cancelled':
-- 'cancelled' already means "customer walked away / session superseded"
-- (see RenewalSession::cancel() and the stale-token handling in
-- public/index.php). Overloading it for staff-initiated declines would
-- make "was this customer-abandoned or staff-declined?" ambiguous
-- without also checking declined_at — a genuine 'declined' value keeps
-- the two concepts distinct and matches new_applications exactly, so
-- the merged Application Reviews queue (Section 2) can query both
-- tables with identical status semantics.
--
-- IDEMPOTENT:
--   - The ENUM MODIFY is naturally idempotent — re-applying the same
--     target definition is a no-op change, not an error.
--   - The three new columns are guarded via information_schema checks
--     + prepared statements (same pattern as migration 019) rather
--     than "ADD COLUMN IF NOT EXISTS" — this server's MySQL (8.0.42)
--     rejects that syntax despite it being documented for 8.0.29+,
--     so we fall back to the universally-compatible guard pattern.
-- ─────────────────────────────────────────────────────────────────────

ALTER TABLE `renewal_sessions`
  MODIFY COLUMN `status` ENUM('draft','submitted','awaiting_payment','awaiting_review','completed','cancelled','declined') DEFAULT 'draft';

-- declined_at
SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'renewal_sessions' AND COLUMN_NAME = 'declined_at'
);
SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `renewal_sessions` ADD COLUMN `declined_at` DATETIME NULL AFTER `admin_confirmed_at`',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- decline_reason
SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'renewal_sessions' AND COLUMN_NAME = 'decline_reason'
);
SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `renewal_sessions` ADD COLUMN `decline_reason` VARCHAR(1000) NULL AFTER `declined_at`',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- declined_by
SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'renewal_sessions' AND COLUMN_NAME = 'declined_by'
);
SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `renewal_sessions` ADD COLUMN `declined_by` VARCHAR(100) NULL AFTER `decline_reason`',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- VERIFY (run separately after this migration executes)
--
--   SHOW COLUMNS FROM renewal_sessions LIKE 'status';
--     -- Type must list 'declined' among the enum values
--
--   SHOW COLUMNS FROM renewal_sessions WHERE Field IN
--     ('declined_at','decline_reason','declined_by');
--     -- All three must exist, all NULL-able
