-- ─────────────────────────────────────────────────────────────────────
-- Migration 023: decline-email template in the existing `notifications`
--                table (Email Notices area of the PFM admin)
--
-- Larissa's decline workflow (Section 6): "Managed under the existing
-- Email Notices area — a new template row, not a separate bolted-on
-- mailer. Template includes a ~REASON~ placeholder that auto-fills with
-- the staff-entered decline reason." This inserts that row, next to
-- notif_id 1 (application submitted), 2 (approved) and 3.
--
-- Placeholders substituted at send time by ApplicationReview:
--   ~COMPANY NAME~   the customer's company name (existing convention)
--   ~REASON~         the reason staff typed on the decline form
--
-- !! DRAFT WORDING — needs Larissa's review. She can edit it any time in
-- the Email Notices grid (descript = 'declined_application'); no code
-- change or redeploy is needed. It is deliberately neutral so the same
-- template works for declined renewals AND declined new applications, and
-- says "refunded" because staff must confirm the manual Stripe refund
-- before a decline can be finalised.
--
-- IDEMPOTENT: inserts only if no row with descript 'declined_application'
-- exists, so re-running never creates a duplicate or overwrites edits.
-- Runs as an admin MySQL user (pfm_renewal only has SELECT on this table).
-- ─────────────────────────────────────────────────────────────────────

INSERT INTO `notifications` (`msg_subject`, `msg_body`, `descript`, `active`)
SELECT
  'Update on Your Portland Flower Market Buyer''s Pass Application',
  CONCAT(
    '<p>Dear ~COMPANY NAME~,</p>',
    '<p>Thank you for your interest in the Portland Flower Market. After reviewing your submission, we are unable to approve it at this time.</p>',
    '<p><strong>Reason:</strong> ~REASON~</p>',
    '<p>Any payment you made has been refunded to your original method of payment.</p>',
    '<p>If you have any questions, please call us at <strong>503-289-1500</strong> or email <strong>info@ofgaflowers.com</strong>.</p>',
    '<p> </p>',
    '<p>Best regards,<br />Buyers Pass Team<br />Portland Flower Market</p>'
  ),
  'declined_application',
  b'1'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `notifications` WHERE `descript` = 'declined_application');

-- VERIFY (run separately after this migration executes)
--
--   SELECT notif_id, descript, active+0 AS active, msg_subject, LENGTH(msg_body) AS body_len
--     FROM notifications WHERE descript = 'declined_application';
--     -- exactly one row; body_len well under the 3000-char column limit
