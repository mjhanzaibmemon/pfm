-- ─────────────────────────────────────────────────────────────────────
-- Migration 009: INSERT grant on sec_renewals for pfm_renewal
--
-- Why this exists
-- ---------------
-- The new /renewal_v2/admin/reset-renewal.php page (staff self-service:
-- "Reset renewal & send fresh link") needs to insert a fresh sec_renewals
-- row so the before_insert_sec_renewals trigger can generate a new token +
-- expiry. Without this grant, the reset button fails with:
--   SQLSTATE[42000]: 1142 INSERT command denied to user 'pfm_renewal'@'localhost'
--   for table 'sec_renewals'
--
-- Why the legacy "Email" button on the Renewals grid still worked without
-- this grant: the legacy ScriptCase admin runs its DB queries as the
-- ScriptCase-admin MySQL user (pfm-adm-usr / debian-sys-maint), which
-- already has full CRUD on sec_renewals. renewal_v2 uses its own
-- least-privilege `pfm_renewal` user, so grants have to be added explicitly.
--
-- Scope: SELECT was already granted by the Phase-2 baseline (needed for
-- token lookup in RenewalSession::loadOrCreate). Migration 003 added
-- UPDATE(applied) so confirm-receipt.php can mark a token used. This
-- migration completes the picture with INSERT so the reset page can
-- generate new tokens.
--
-- No DELETE is granted — we keep every historical sec_renewals row for
-- audit, matching how the legacy admin has always operated (7730+ rows
-- since 2025).
--
-- Apply this on production BEFORE deploying /renewal_v2/admin/reset-renewal.php.
-- ─────────────────────────────────────────────────────────────────────

GRANT INSERT ON `pfm`.`sec_renewals` TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;

-- Verify after running:
--   SHOW GRANTS FOR 'pfm_renewal'@'localhost';
-- Should include:
--   GRANT SELECT, INSERT, UPDATE (`applied`) ON `pfm`.`sec_renewals` TO `pfm_renewal`@`localhost`
