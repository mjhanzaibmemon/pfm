-- ─────────────────────────────────────────────────────────────────────
-- Migration 021: grant INSERT on clients to pfm_renewal —
--                new-customer approval workflow
--
-- Discovered while designing the new-customer application module
-- (checked `SHOW GRANTS FOR pfm_renewal@localhost` on the staging
-- clone, 2026-09-23): pfm_renewal currently has SELECT, UPDATE on
-- clients (sufficient for every renewal operation, which only ever
-- UPDATEs an existing row) but NOT INSERT.
--
-- The new-customer approval endpoint (admin/approve-application.php,
-- see NEW_CUSTOMER_APPLICATION_SPEC.md Section 13.8) INSERTs a brand
-- new clients row when staff approves a new application — the first
-- time renewal_v2's DB user has ever needed to create a client rather
-- than update one. Without this grant, approval would fail with:
--   SQLSTATE[42000]: INSERT command denied to user 'pfm_renewal'@'localhost'
--   for table 'clients'
--
-- Scope: table-level INSERT only (not column-restricted) — the
-- approval endpoint needs to set co_name, mailing address, business
-- category/subcategory, main contact fields, memb_status_id,
-- permanent_member_date, renewal_date, and MembershipID all in one
-- INSERT, so a column-level grant would need to enumerate all of them
-- with no meaningful security benefit (pfm_renewal already has
-- unrestricted UPDATE on the same table).
-- ─────────────────────────────────────────────────────────────────────

GRANT INSERT ON `pfm`.`clients` TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;

-- VERIFY (run separately after this migration executes)
--
--   SHOW GRANTS FOR 'pfm_renewal'@'localhost';
-- Should include:
--   GRANT SELECT, INSERT, UPDATE ON `pfm`.`clients` TO `pfm_renewal`@`localhost`
