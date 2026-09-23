-- 007_pfm_renewal_client_notes_grants.sql
--
-- Adds the missing INSERT + SELECT grants on the existing
-- client_notes table for the dedicated pfm_renewal MySQL user that
-- was created in migration 003.
--
-- Why this is needed:
--   Migration 006 / commit `51359a0` introduced
--   RenewalHistoryNote::buildAndStore() which is called from
--   admin/confirm-receipt.php after a successful payment-confirm
--   transaction. It writes one structured HTML summary row per
--   renewal into the existing PFM client_notes table — that's the
--   B1-a integration Larissa approved on 2026-06-17 ("use the
--   existing Notes area for renewal change history").
--
--   migration 003 set up pfm_renewal with the minimum-privilege
--   grants needed for the renewal-only tables, but client_notes
--   wasn't on the list because no renewal_v2 code was writing to
--   it at that time. The grant was missing on staging until
--   2026-06-17 and surfaced live when user's session 41 confirm-
--   receipt logged:
--     [renewal_v2] Renewal history note append FAILED for
--     session 41: SQLSTATE[42000]: Syntax error or access
--     violation: 1142 INSERT command denied to user
--     'pfm_renewal'@'localhost' for table 'client_notes'
--
-- Effect:
--   - INSERT lets buildAndStore() append the renewal-history row.
--   - SELECT lets us read the rows back (e.g. for future "show me
--     this customer's last 5 renewals at a glance" features —
--     not used today but cheap to include).
--
-- Deliberately NOT granted:
--   - UPDATE — we never edit an old note, we only append a new
--     dated row per renewal. If a future feature needs to edit,
--     re-evaluate then.
--   - DELETE — same rationale; PFM staff use the admin to remove
--     notes, not the renewal_v2 code.
--
-- Idempotent: GRANT … TO … is safe to re-run; MySQL just keeps the
-- existing grant if it's already there.
--
-- Applied on staging on 2026-06-17 by Muhammad via mysql client.
-- Verified by re-running RenewalHistoryNote::buildAndStore for the
-- failed session 41 — the backfill inserted client_notes #82789
-- without error.
--
-- Apply on production at Phase 7 deploy time, alongside the other
-- 00x_*.sql migrations. Run from a privileged account (the same one
-- that ran 003).

GRANT INSERT, SELECT
   ON `pfm`.`client_notes`
   TO `pfm_renewal`@`localhost`;

FLUSH PRIVILEGES;

-- Quick verify (run as the admin user that applied this migration):
--   SHOW GRANTS FOR `pfm_renewal`@`localhost`;
--
-- Expected to include the line:
--   GRANT SELECT, INSERT ON `pfm`.`client_notes`
--     TO `pfm_renewal`@`localhost`
