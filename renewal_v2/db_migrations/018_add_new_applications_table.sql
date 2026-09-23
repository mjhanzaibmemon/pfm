-- ─────────────────────────────────────────────────────────────────────
-- Migration 018: new_applications table — new-customer application module
--
-- Parallel to renewal_sessions (001_initial_schema.sql), but for
-- applicants who have NO existing clients row yet. Full design
-- rationale is in NEW_CUSTOMER_APPLICATION_SPEC.md Section 13.2 at
-- the project root — summary here:
--
--   - No client_id column (doesn't exist until approval materializes
--     one — see the future approve-application.php admin endpoint).
--   - Own `token` column instead of reusing sec_renewals — new
--     applicants have no email link to click, so they get their own
--     token minted on first visit to the public entry page.
--   - Mirrors renewal_sessions' admin-review columns exactly
--     (admin_review_token / admin_reviewed_at / admin_confirmed_at)
--     so the Application Reviews queue (Larissa's Section 2 ask) can
--     read both tables with near-identical column names.
--   - Adds declined_at / decline_reason / declined_by — Larissa's
--     decline workflow (Section 6) needs these; renewal_sessions
--     gets the equivalent added separately in migration 020 since it
--     didn't need them before this project.
--   - created_client_id / membership_number are NULL until approval;
--     populated once the admin approval endpoint creates the real
--     clients row (Section 13.4 — MembershipID = the new client_id).
--
-- IDEMPOTENT: CREATE TABLE IF NOT EXISTS, safe to re-run.
-- ─────────────────────────────────────────────────────────────────────

CREATE TABLE IF NOT EXISTS new_applications (
    id                  BIGINT AUTO_INCREMENT PRIMARY KEY,
    token               VARCHAR(50) NOT NULL UNIQUE,
    status              ENUM('draft','submitted','awaiting_payment','awaiting_review','completed','cancelled','declined') DEFAULT 'draft',
    current_step        TINYINT DEFAULT 1,
    draft_data          JSON,
    customer_note       VARCHAR(500) NULL,
    submitted_at        DATETIME NULL,
    stripe_session_id   VARCHAR(255) NULL,
    payment_id          VARCHAR(255) NULL,
    paid_at             DATETIME NULL,
    amount_charged      DECIMAL(10,2) NULL,
    created_at          DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at          DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Mirrors renewal_sessions' admin-review fields (migration 002)
    admin_review_token  VARCHAR(50) UNIQUE NULL,
    admin_reviewed_at   DATETIME NULL,
    admin_confirmed_at  DATETIME NULL,

    -- Mirrors renewal_sessions' Stripe receipt/card fields (migration 004)
    stripe_receipt_url  VARCHAR(500) NULL,
    stripe_card_brand   VARCHAR(20)  NULL,
    stripe_card_last4   VARCHAR(4)   NULL,

    -- NEW — decline workflow (Larissa's Section 6 ask). renewal_sessions
    -- gets the same three columns added in migration 020.
    declined_at         DATETIME NULL,
    decline_reason      VARCHAR(1000) NULL,
    declined_by         VARCHAR(100) NULL,

    -- Post-approval linkage — NULL until the admin approval endpoint
    -- materializes a real clients row.
    created_client_id   BIGINT NULL,
    membership_number   BIGINT NULL,

    INDEX idx_token              (token),
    INDEX idx_status             (status),
    INDEX idx_admin_review_token (admin_review_token),
    INDEX idx_created_client     (created_client_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
  COMMENT='New-customer applications - tracks draft, submitted, paid, approved/declined states for applicants with no existing clients row';

-- pfm_renewal needs full CRUD here, matching its existing grant on
-- renewal_sessions (see `SHOW GRANTS FOR pfm_renewal@localhost` on any
-- server — GRANT SELECT, INSERT, UPDATE, DELETE ON pfm.renewal_sessions).
GRANT SELECT, INSERT, UPDATE, DELETE ON `pfm`.`new_applications` TO `pfm_renewal`@`localhost`;
FLUSH PRIVILEGES;

-- VERIFY (run separately after this migration executes)
--
--   DESCRIBE new_applications;
--   SHOW GRANTS FOR 'pfm_renewal'@'localhost';
--
-- new_applications.token and .admin_review_token must both be UNIQUE.
-- Grants list must include:
--   GRANT SELECT, INSERT, UPDATE, DELETE ON `pfm`.`new_applications` TO `pfm_renewal`@`localhost`
