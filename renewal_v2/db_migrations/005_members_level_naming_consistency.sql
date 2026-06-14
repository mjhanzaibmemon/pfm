-- 005_members_level_naming_consistency.sql
--
-- Aligns the three actively-used membership-tier display names in
-- members_level.pricing_level with the canonical labels shown in the
-- existing PFM admin's reference table (form_clients_staff_apl.php
-- around line 2322 onwards). Before this migration, the same tier was
-- shown to staff with one label and to customers (via the renewal
-- wizard and Stripe checkout) with a different one — surfaced during
-- Larissa's Phase 6 round-1 QA on 2026-06-11.
--
-- Direction chosen: rename the DB labels to match what staff already
-- see in admin. Customer-facing surfaces (wizard Step 1 / Step 4 /
-- Step 6 / Step 7 / Stripe Checkout product name) read these labels
-- live via StripeClient::getClientLevel(), so the rename takes effect
-- in the wizard the moment this UPDATE runs.
--
-- The hardcoded admin reference table (legacy ScriptCase code) is
-- left untouched — no risk of breaking the existing admin.
--
-- Reversal: re-run with the old strings if Larissa later prefers the
-- original wording.
--
-- Applied on staging: 2026-06-14 by Muhammad (via mysql client).
-- Apply on production at Phase 7 deploy time, in the same DB session
-- as the other 00x_*.sql migrations.

UPDATE members_level
   SET pricing_level = 'Business-to-Business Membership'
 WHERE memb_lev_id = 13
   AND pricing_level <> 'Business-to-Business Membership';

UPDATE members_level
   SET pricing_level = 'Horticultural & Floral Trade Membership'
 WHERE memb_lev_id = 14
   AND pricing_level <> 'Horticultural & Floral Trade Membership';

UPDATE members_level
   SET pricing_level = 'Club, School, Non-Profit Membership'
 WHERE memb_lev_id = 16
   AND pricing_level <> 'Club, School, Non-Profit Membership';

-- Quick verify (run in a separate SELECT, output expected below):
--   SELECT memb_lev_id, pricing_level
--     FROM members_level
--    WHERE memb_lev_id IN (13, 14, 16);
--
-- Expected:
--   13 | Business-to-Business Membership
--   14 | Horticultural & Floral Trade Membership
--   16 | Club, School, Non-Profit Membership
