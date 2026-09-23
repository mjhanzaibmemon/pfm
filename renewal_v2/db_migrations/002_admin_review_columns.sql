-- ─────────────────────────────────────────────────────────────────────
--  Migration: 002_admin_review_columns
--  Date:      2026-06-06
--  Phase:     Phase 4 — Admin Review Workflow
--
--  Adds three new columns to renewal_sessions to support the
--  "email-gated client_pmts write" workflow:
--
--    admin_review_token  — unique token generated when payment confirmed;
--                          sent to staff via email; appears in the URL of
--                          the admin review page (/renewal_v2/admin/review.php).
--
--    admin_reviewed_at   — timestamp of when staff first OPENED the
--                          admin review page (page-load event).
--
--    admin_confirmed_at  — timestamp of when staff CLICKED the
--                          "Confirm Receipt & Open in Admin" button on
--                          the review page. This event triggers the
--                          insert into the existing client_pmts table,
--                          making the payment visible in the existing
--                          form_clients_staff/ admin UI.
--
--  Purely additive — no existing column is touched, no existing data
--  is modified. Existing renewal_sessions rows will have NULL for all
--  three new columns (which the application treats as "not yet
--  reviewed by staff").
--
--  Apply order on each server:
--    1. Apply this file once:
--          mysql -u <admin> -p pfm < 002_admin_review_columns.sql
--    2. Verify with:
--          DESCRIBE renewal_sessions;
-- ─────────────────────────────────────────────────────────────────────

ALTER TABLE renewal_sessions
  ADD COLUMN admin_review_token VARCHAR(50) DEFAULT NULL
    COMMENT 'Unique token sent to staff via email after payment received',
  ADD COLUMN admin_reviewed_at  DATETIME    DEFAULT NULL
    COMMENT 'When staff first opened the admin review page',
  ADD COLUMN admin_confirmed_at DATETIME    DEFAULT NULL
    COMMENT 'When staff clicked Confirm Receipt — triggers client_pmts write',
  ADD UNIQUE KEY uk_admin_review_token (admin_review_token),
  ADD INDEX idx_admin_pending (admin_confirmed_at);
