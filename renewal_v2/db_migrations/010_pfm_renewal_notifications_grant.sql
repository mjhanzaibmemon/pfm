-- ─────────────────────────────────────────────────────────────────────
-- Migration 010: SELECT grant on notifications for pfm_renewal
--
-- Why this exists
-- ---------------
-- Larissa's 2026-07-11 Bucket B ask (video + written): the wizard's
-- "your renewal has been approved" email (fired after staff click
-- Confirm Receipt) must use the existing PFM template stored in the
-- `notifications` table row where notif_id = 2, subject
-- "Congratulations! Your Buyer's Pass Application Has Been Approved".
-- Prior to this migration StripeClient::sendCustomerRenewalConfirmedEmail
-- built the HTML body from a hardcoded string in PHP; the Bucket B
-- code change swaps that for a `SELECT msg_subject, msg_body FROM
-- notifications WHERE notif_id = 2` — but the pfm_renewal MySQL user
-- had no grant on `notifications`, so that SELECT would fail with:
--   SQLSTATE[42000]: 1142 SELECT command denied to user
--   'pfm_renewal'@'localhost' for table 'notifications'
--
-- Scope: SELECT only. The wizard reads templates, it does not edit
-- them. Larissa edits the templates herself via the ScriptCase
-- admin's "Security → Email Notifications" form (item_24), which runs
-- as the ScriptCase-admin MySQL user with full CRUD — that path is
-- unchanged. Same shape as the SELECT-only grant on `members_status`
-- established in the Phase-2 baseline for the customer-confirmation
-- email (sendCustomerConfirmationEmail, notif template row 1).
--
-- Apply this on production BEFORE deploying the updated
-- renewal_v2/lib/StripeClient.php from the Bucket B commit —
-- otherwise the first Confirm Receipt after deploy will log a 1142
-- error and fall through to the non-fatal catch (customer gets no
-- approval email that cycle).
-- ─────────────────────────────────────────────────────────────────────

GRANT SELECT ON `pfm`.`notifications` TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;

-- Verify after running:
--   SHOW GRANTS FOR 'pfm_renewal'@'localhost';
-- Should now include:
--   GRANT SELECT ON `pfm`.`notifications` TO `pfm_renewal`@`localhost`
