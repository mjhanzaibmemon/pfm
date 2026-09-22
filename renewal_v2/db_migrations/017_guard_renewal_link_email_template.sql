-- ─────────────────────────────────────────────────────────────────────
-- Migration 017: guard trigger for the renewal-link ScriptCase
--                URL-rebasing bug on members_status.msg_body
--
-- Context
-- -------
-- Applied directly on production 2026-09-08 during incident response
-- (never previously captured as a migration file — this migration
-- documents it retroactively so a fresh server can reproduce it).
--
-- On 2026-09-03 10:06 AM, Larissa edited the "Active" status email
-- template (memb_status_id = 3, "Reminder: Renew Your Buyer's Pass")
-- via the Email Notices admin (form_members_status) to remove two
-- "visit the Buyer's Pass Desk" lines. That edit itself was correct
-- and intentional. But ScriptCase's TinyMCE editor treats `~LINK~`
-- as a relative URL and silently rewrites it to an absolute one
-- using the current app's own URL when the row is saved:
--
--     Before save:  href="~LINK~"
--     After save:   href="https://www.pfm-app.com/form_members_status/~LINK~"
--
-- The renewal-link code (grid_vw_clients_main_member_renew/index.php
-- line 5237, and renewal_v2 admin reset-renewal.php) already builds
-- a full URL before doing the ~LINK~ substitution, so the result was
-- a doubled/broken URL:
--
--     https://www.pfm-app.com/form_members_status/https://pfm-app.com/blank_renewal_link/?token=XXX
--
-- Every renewal email sent between 2026-09-03 10:06 AM and 2026-09-08
-- (when this was diagnosed and fixed) carried this broken link.
-- Customers clicking it hit a redirect loop
-- (ERR_TOO_MANY_REDIRECTS / "too many redirects" in Safari/Chrome).
-- Confirmed cases: Olivia Belle Design, Barbara's Baskets, Silverleaf
-- Landscaping LLC. Several Sept 3-4 renewals were completed manually
-- by staff for customers who likely hit the same bug.
--
-- Root-cause data trail (ScriptCase sc_log audit table, ~LINK~
-- position in nightly DB backups) traced the exact edit to
-- larisu @ 2026-09-03 10:06:44, confirming this was an editor
-- side-effect of an otherwise-intended content edit, not a data
-- entry mistake.
--
-- What this migration does
-- -------------------------
-- PART 1 (one-time cleanup, same as the manual fix applied 2026-09-08)
--   Strips the ScriptCase URL prefix back out of memb_status_id = 3's
--   msg_body if present. Idempotent — no-op if already clean.
--
-- PART 2 (permanent guard)
--   CREATE TRIGGER members_status_prevent_broken_link BEFORE UPDATE
--   ON members_status. Any future save through the Email Notices
--   admin (by Larissa, staff, or a ScriptCase editor quirk) that
--   reintroduces the `.../form_members_status/~LINK~` pattern is
--   silently corrected back to the clean `~LINK~` placeholder before
--   the row is written. This does not restrict what staff can edit —
--   it only neutralises this one specific known editor side-effect.
--
-- Companion fix (NOT part of this migration, tracked separately)
-- ----------------------------------------------------------------
-- membership_exports.php line 125 had an unrelated but similarly
-- long-lived bug: the Current Members report's email column
-- preferred the legacy clients.email field over the current
-- clients.main_contact_email field. Fixed the same day (2026-09-08)
-- by swapping the COALESCE order. That is a plain code file change,
-- already reflected directly in membership_exports.php in this repo
-- — no migration needed for it.
-- ─────────────────────────────────────────────────────────────────────

-- PART 1 — one-time cleanup (safe to re-run; no-op if already clean)
UPDATE `pfm`.`members_status`
   SET msg_body = REPLACE(
     msg_body,
     'href="https://www.pfm-app.com/form_members_status/~LINK~"',
     'href="~LINK~"'
   )
 WHERE memb_status_id = 3
   AND INSTR(msg_body, 'https://www.pfm-app.com/form_members_status/~LINK~') > 0;

-- PART 2 — permanent guard trigger
DROP TRIGGER IF EXISTS `pfm`.`members_status_prevent_broken_link`;

DELIMITER //

CREATE TRIGGER `pfm`.`members_status_prevent_broken_link`
BEFORE UPDATE ON `pfm`.`members_status`
FOR EACH ROW
BEGIN
    -- ScriptCase's editor rebases relative URLs to absolute using the
    -- current app's own URL. `~LINK~` looks relative to it, so on
    -- save it can become `https://.../form_members_status/~LINK~`.
    -- That produces a broken renewal link in the outgoing email.
    -- Strip the prefix back out silently on every save. Handles both
    -- the www and non-www host variants defensively.
    IF NEW.msg_body LIKE '%form_members_status/~LINK~%' THEN
        SET NEW.msg_body = REPLACE(
            NEW.msg_body,
            'https://www.pfm-app.com/form_members_status/~LINK~',
            '~LINK~'
        );
        SET NEW.msg_body = REPLACE(
            NEW.msg_body,
            'https://pfm-app.com/form_members_status/~LINK~',
            '~LINK~'
        );
    END IF;
END//

DELIMITER ;

-- Verify after running:
--   SELECT
--     memb_status_id,
--     INSTR(msg_body, 'form_members_status/~LINK~') AS should_be_zero,
--     INSTR(msg_body, 'href="~LINK~"')               AS should_be_positive
--   FROM members_status WHERE memb_status_id = 3;
--
--   SHOW TRIGGERS FROM pfm LIKE 'members_status';
-- Expect: should_be_zero = 0, should_be_positive > 0, and the trigger
-- listed with Event = UPDATE, Timing = BEFORE.
