-- 001_initial_schema.sql
--
-- Phase 2 initial schema — the two additive tables the renewal_v2
-- wizard writes to. Neither table existed in PFM before this project
-- and neither shares any column with the existing PFM schema, so both
-- CREATEs are guarded with IF NOT EXISTS and are safe to re-run.
--
-- ORDER OF APPLICATION
--   Migrations must be applied in numeric order (001, 002, 003, …).
--   In particular:
--     - 002 depends on renewal_sessions existing (adds admin-review columns)
--     - 004 depends on renewal_sessions existing (adds Stripe receipt columns)
--     - 006 depends on the pfm-owned members table (adds wizard_removed_at)
--
-- HISTORICAL NOTE
--   These two tables were created directly on staging on 2026-05-23
--   as the very first Phase 2 task (see larissa_rebuild.md's Phase 2
--   Day 1 log entry, "Database foundation + folder structure").
--   Commit 20ae0c8 "Add renewal_v2 — Phase 2 backend complete" shipped
--   the PHP code but did NOT include a numbered .sql file — the CREATE
--   statements were pasted into staging's mysql client inline and the
--   migration file itself was never written.
--
--   This file was therefore reconstructed retroactively on 2026-07-04
--   by taking `SHOW CREATE TABLE renewal_sessions / renewal_changes`
--   from live staging and subtracting every column + index that
--   migrations 002 (admin-review columns) and 004 (Stripe-receipt
--   columns) add. The result is exactly what staging looked like
--   between 2026-05-23 and the first application of 002 on 2026-06-08.
--
--   Two spots where earlier drafts (larissa_rebuild.md's "Planned New
--   Tables" and PRODUCTION_DEPLOY_CHECKLIST.md § 1.1) drifted from
--   what was actually executed:
--     - customer_note is VARCHAR(500), not TEXT. Both docs said TEXT
--       but staging has always been VARCHAR(500) as far back as we
--       can inspect. Production must match staging, not the docs.
--     - idx_updated on (updated_at) exists on staging but was not
--       listed in either doc. Present in live, so preserved here.
--
-- IDEMPOTENT
--   IF NOT EXISTS on both CREATE TABLE statements means re-running
--   this migration on staging (where the tables already exist) is a
--   no-op. Safe to include as the first step of the Phase 7 numbered
--   migration run.

CREATE TABLE IF NOT EXISTS renewal_sessions (
    id                  BIGINT AUTO_INCREMENT PRIMARY KEY,
    client_id           BIGINT NOT NULL,
    token               VARCHAR(50) NOT NULL UNIQUE,
    status              ENUM('draft','submitted','awaiting_payment','awaiting_review','completed','cancelled') DEFAULT 'draft',
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
    INDEX idx_client  (client_id),
    INDEX idx_token   (token),
    INDEX idx_status  (status),
    INDEX idx_updated (updated_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
  COMMENT='Customer renewal sessions - tracks draft, submitted, paid states';

CREATE TABLE IF NOT EXISTS renewal_changes (
    id            BIGINT AUTO_INCREMENT PRIMARY KEY,
    session_id    BIGINT NOT NULL,
    change_type   ENUM('buyer_added','buyer_removed','buyer_modified','company_changed','contact_changed','document_changed') NOT NULL,
    target_id     BIGINT NULL,
    field_name    VARCHAR(100) NULL,
    old_value     TEXT NULL,
    new_value     TEXT NULL,
    created_at    DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_session     (session_id),
    INDEX idx_change_type (change_type),
    CONSTRAINT fk_renewal_changes_session
      FOREIGN KEY (session_id) REFERENCES renewal_sessions(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
  COMMENT='Tracks every change made during a renewal - for the Changes Summary panel';

-- VERIFY (run separately after this migration executes)
--
--   DESCRIBE renewal_sessions;
--   DESCRIBE renewal_changes;
--
--   Both must exist; renewal_sessions.token must be UNIQUE;
--   renewal_changes.session_id must FK to renewal_sessions.id ON DELETE CASCADE.
