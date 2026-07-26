-- ─────────────────────────────────────────────────────────────────────
-- Migration 011: reposition ~LINK~ button in members_status row 3
--
-- What this does
-- --------------
-- Rewrites the msg_body of the "Renew Your Buyer's Pass" template
-- (members_status.memb_status_id = 3, status = 'Active') so the
-- renewal-link button + its subtitle appear BELOW the "please ensure
-- you have the following documents ready" list instead of above it.
-- Larissa's 2026-07-11 Bucket B ask (video + written): "please use
-- #3 ... and add the renewal wizard link/button below the list of
-- what the customer will need to complete the renewal process."
--
-- All other content (greeting, thanks paragraph, market-visit line,
-- docs list, closing paragraphs, contact info, sign-off) is preserved
-- verbatim. Only the position of the button block moves.
--
-- Why the reposition matters
-- --------------------------
-- Customers currently see the CTA before they see the required-docs
-- checklist, so many click through without knowing they need
-- Secretary-of-State proof and photo ID ready. Moving the button
-- below the checklist ensures the customer reads the requirements
-- first, then proceeds.
--
-- Who else uses this template
-- ---------------------------
-- Three send sites read from members_status row 3:
--   1. Legacy Renewals grid "Email" button
--      (grid_vw_clients_main_member_renew/index.php ~line 5289).
--      Larissa's normal annual renewal flow — one row per client.
--   2. renewal_v2/admin/reset-renewal.php (staff-triggered exception
--      reset — line 319-322). Sends the same template on manual
--      reset from the sidebar Reset Renewal item.
-- Both benefit from the improved layout equally.
--
-- Idempotency guard
-- -----------------
-- The WHERE clause fires in two cases so this migration handles both
-- deployment paths cleanly:
--   1. ~LINK~ is completely missing from the body — the case on real
--      production, where Larissa manually removed the CTA at some
--      point before Round 6 ("we removed the link that took them to
--      the renewal portal", from her 2026-07-11 video). Our new body
--      restores the button in the correct position below the docs
--      list.
--   2. ~LINK~ is present but positioned BEFORE the docs-intro
--      paragraph — the case on staging where the button was already
--      there in the wrong position. Our new body moves it below.
--
-- Both cases converge on the same target state. If the button is
-- already positioned correctly (post-migration state), neither
-- condition fires and the UPDATE affects 0 rows — safe no-op on
-- re-run. Verify with the SELECT at the bottom.
--
-- Apply on production during Phase 7 deploy AFTER migration 010 and
-- BEFORE swapping the wizard cutover (order is not strictly load-
-- bearing here — this only affects email content — but keeping the
-- sequence tidy).
-- ─────────────────────────────────────────────────────────────────────

UPDATE `pfm`.`members_status`
   SET `msg_body` = '<p>Dear ~COMPANY NAME~,</p>
<p data-start="182" data-end="291">We appreciate your continued support of the Portland Flower Market. Your Buyer’s Pass is now due for renewal.</p>
<p data-start="293" data-end="420">The next time you are in the market, please stop by the Buyer’s Pass Desk and we will be happy to assist you with your renewal.</p>
<p>As part of the renewal process, please ensure you have the following documents ready:</p>
<ul>
<li>A copy of your driver''s license or ID for identification purposes.</li>
<li>Verification of your business''s active registration with the Secretary of State. You can check the status using the following links:
<ul>
<li>Oregon Secretary of State: <a href="https://egov.sos.state.or.us/br/pkg_web_name_srch_inq.login">Oregon Secretary of State</a></li>
<li>Washington Secretary of State: <a href="https://secure.dor.wa.gov/gteunauth/_/#1">Washington Secretary of State</a><br /><span style="font-size: 8pt;">(Your name must be listed on the business registration or you must be able to provide additional documentation that you have permission to establish an account with this business.)</span></li>
</ul>
</li>
</ul>
<p style="text-align: center; margin: 24px 0;"><a href="~LINK~" style="display: inline-block; background: #727cf5; color: white; padding: 14px 28px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Renew Your Buyer’s Pass Online →</a></p>
<p style="text-align: center; font-size: 13px; color: #6c757d;">Or visit the Buyer’s Pass Desk during market hours.</p>
<p>Completing the renewal process promptly ensures uninterrupted access to the Portland Flower Market and its offerings. We value your continued membership and participation in our community.</p>
<p>If you have any questions, please don’t hesitate to reach out to our team at 503-289-1500 or <strong><a href="mailto:PortlandFlowerMarketInfo@gmail.com">i</a>nfo@ofgaflowers.com.</strong></p>
<p>Thank you for your attention to this matter, and we look forward to seeing you at the Portland Flower Market soon!</p>
<p>Best regards,</p>
<p>Buyers Pass Team<br />Portland Flower Market</p>'
 WHERE `memb_status_id` = 3
   AND (LOCATE('~LINK~', `msg_body`) = 0
         OR LOCATE('~LINK~', `msg_body`) < LOCATE('please ensure you have the following documents', `msg_body`));

-- Verify after running:
--   SELECT
--     LOCATE('~LINK~', msg_body) AS link_pos,
--     LOCATE('please ensure you have the following documents', msg_body) AS docs_intro_pos
--   FROM members_status WHERE memb_status_id = 3;
-- link_pos MUST be > docs_intro_pos after the migration runs
-- successfully. If both are 0, the row was not found. If link_pos is
-- still less than docs_intro_pos, the UPDATE didn't fire — inspect
-- the current msg_body against the WHERE-clause guard.
