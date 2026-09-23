-- ─────────────────────────────────────────────────────────────────────
-- Migration 019: co_name_normalized generated column on clients —
--                duplicate-name detection for new-customer applications
--
-- Larissa's requirement (Section 3 of NEW_CUSTOMER_APPLICATION_SPEC.md):
-- never create two customer records with the same company name. The
-- comparison must be case-insensitive and ignore capitalization, extra
-- spaces, periods, and apostrophes — but MUST preserve business suffixes
-- (LLC, Inc., Co., LLP) since two businesses can be legally distinct
-- entities differing only by suffix (her explicit correction to our
-- first draft, which had proposed stripping suffixes too).
--
-- Rather than normalizing on the fly for every duplicate check (a full
-- table scan + string manipulation against ~9,900 rows on every new
-- application), this adds a STORED GENERATED column so the comparison
-- is a single indexed lookup:
--
--   SELECT client_id, co_name FROM clients
--    WHERE co_name_normalized = ?   -- pre-normalized in PHP, same rules
--    LIMIT 1
--
-- Normalization applied (matches the PHP-side normalizeCompanyName()
-- helper the wizard uses on the applicant's typed input — MUST stay in
-- sync with this expression or the comparison silently breaks):
--   1. TRIM leading/trailing whitespace
--   2. Strip periods (.) and apostrophes (')
--   3. Collapse repeated spaces down to one
--   4. LOWERCASE
-- Deliberately does NOT touch "LLC" / "Inc" / "Co" / "LLP" or any other
-- substring — satisfies Larissa's suffix-preservation requirement.
--
-- IDEMPOTENT: guarded by an information_schema check so re-running this
-- migration on a server where the column already exists is a no-op
-- (MySQL has no native "ADD COLUMN IF NOT EXISTS" for generated columns
-- in this version, so we guard manually via a prepared statement).
-- ─────────────────────────────────────────────────────────────────────

SET @col_exists = (
  SELECT COUNT(*) FROM information_schema.COLUMNS
   WHERE TABLE_SCHEMA = DATABASE()
     AND TABLE_NAME   = 'clients'
     AND COLUMN_NAME  = 'co_name_normalized'
);

SET @ddl = IF(@col_exists = 0,
  'ALTER TABLE `clients`
     ADD COLUMN `co_name_normalized` VARCHAR(255)
       GENERATED ALWAYS AS (
         LOWER(
           REPLACE(REPLACE(REPLACE(REPLACE(
             TRIM(`co_name`),
           ''.'', ''''), '''''''', ''''), ''  '', '' ''), ''  '', '' '')
         )
       ) STORED,
     ADD INDEX `idx_co_name_normalized` (`co_name_normalized`)',
  'SELECT 1'  -- no-op if the column already exists
);

PREPARE stmt FROM @ddl;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- VERIFY (run separately after this migration executes)
--
--   SHOW COLUMNS FROM clients LIKE 'co_name_normalized';
--   SHOW INDEX FROM clients WHERE Key_name = 'idx_co_name_normalized';
--
--   -- Spot-check the normalization is behaving (suffix preserved,
--   -- punctuation/case/spacing ignored):
--   SELECT co_name, co_name_normalized FROM clients
--    WHERE co_name LIKE '%LLC%' OR co_name LIKE '%Inc%'
--    LIMIT 10;
--
--   -- Confirm duplicate-lookup shape works:
--   SELECT client_id, co_name FROM clients
--    WHERE co_name_normalized = 'abc flowers llc'
--    LIMIT 5;
