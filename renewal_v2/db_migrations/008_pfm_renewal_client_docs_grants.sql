-- 008_pfm_renewal_client_docs_grants.sql
--
-- Grant INSERT + SELECT on the existing client_docs table for the
-- dedicated pfm_renewal MySQL user that was created in migration 003.
--
-- Why this is needed:
--   Larissa's 2026-06-30 Round 4 QA screenshot of the Operational
--   Records tab on client 12 showed the legacy PFM admin reads
--   uploaded business documents from the client_docs table (rows
--   like doc_type="Active Secretary of State Registration" with
--   the file BLOB in doc_file). Until this migration, the wizard's
--   confirm-receipt.php only copied fresh Business Registry uploads
--   into the clients.doc_sec_of_state BLOB column — which stores
--   the bytes but is NOT what the Operational Records tab renders.
--   Result: customers who uploaded a Business Registry through the
--   wizard had their document invisible to staff on the tab where
--   staff actually go to check for it.
--
--   The follow-up commit adds a step 5h to confirm-receipt.php that
--   INSERTs a client_docs row per wizard-uploaded non-ID document so
--   Business Registry + additional docs show up in the Operational
--   Records tab the same way staff-uploaded documents do.
--
-- Idempotent — GRANT is safe to re-run.

GRANT INSERT, SELECT
   ON `pfm`.`client_docs`
   TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;
