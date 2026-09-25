-- ─────────────────────────────────────────────────────────────────────
-- Migration 024: application_type on new_applications — day-pass
--                scaffolding (Section 7 of the requirements)
--
-- Larissa: day passes are a SEPARATE future project, but the module must
-- be architected now so they can be added later without a rewrite —
-- "an application-type field/enum that already has a day-pass value
-- reserved, even if unused". This adds exactly that and nothing more:
--
--   application_type ENUM('annual','day_pass') NOT NULL DEFAULT 'annual'
--
-- Every application created today is 'annual' (the column default), no
-- customer-facing page shows or sets it (Larissa: do NOT show a Day Pass
-- option at launch), and the code refuses to price or approve anything
-- that isn't 'annual' (NewApplication::TYPE_DAY_PASS is reserved, not
-- implemented). Building $25/buyer pricing, the visit-date picker and the
-- Stripe day-pass product are NOT part of this authorization.
--
-- IDEMPOTENT: guarded via information_schema + PREPARE/EXECUTE (same
-- pattern as migrations 019/020/022).
-- ─────────────────────────────────────────────────────────────────────

SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'new_applications' AND COLUMN_NAME = 'application_type'
);
SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `new_applications` ADD COLUMN `application_type` ENUM(''annual'',''day_pass'') NOT NULL DEFAULT ''annual'' AFTER `status`',
  'SELECT 1');
PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- VERIFY (run separately after this migration executes)
--
--   SHOW COLUMNS FROM new_applications LIKE 'application_type';
--     -- enum('annual','day_pass'), NOT NULL, default 'annual'
--   SELECT application_type, COUNT(*) FROM new_applications GROUP BY 1;
--     -- every existing row is 'annual'
