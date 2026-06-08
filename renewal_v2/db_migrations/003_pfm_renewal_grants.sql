-- ─────────────────────────────────────────────────────────────────────
-- Migration 003: pfm_renewal user grants — Phase 4
--
-- Adds the minimal extra UPDATE grant the renewal_v2 admin pages need to
-- mark a renewal token "applied" in sec_renewals when confirm-receipt.php
-- writes the matching client_pmts row.
--
-- Scope: only the `applied` column on sec_renewals (column-level grant)
-- so the admin pages cannot rewrite tokens or expiry dates — they can
-- only mark a token as used.
--
-- Apply this on production BEFORE deploying the Phase 4 admin pages.
-- Otherwise confirm-receipt.php will fail with:
--   SQLSTATE[42000]: UPDATE command denied to user 'pfm_renewal'@'localhost'
--   for table 'sec_renewals'
-- ─────────────────────────────────────────────────────────────────────

-- Run as root / pfm-adm-usr (a user with GRANT OPTION).
GRANT UPDATE (applied) ON `pfm`.`sec_renewals` TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;

-- Verify after running:
--   SHOW GRANTS FOR 'pfm_renewal'@'localhost';
-- Should include:
--   GRANT SELECT, UPDATE (`applied`) ON `pfm`.`sec_renewals` TO `pfm_renewal`@`localhost`
