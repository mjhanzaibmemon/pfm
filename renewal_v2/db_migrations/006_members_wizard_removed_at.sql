-- 006_members_wizard_removed_at.sql
--
-- Adds a column the renewal_v2 wizard can use to soft-delete buyers
-- WITHOUT relying on the existing `members.include` BIT field, which
-- the legacy PFM admin "Add Buyer" form sets to b'0' by default for
-- every newly-added buyer.
--
-- Problem (surfaced by Larissa's Phase 6 round-1 QA on 2026-06-11):
--   - Larissa added 2 buyers via the admin form for her test client
--     737824 → both rows had include = b'0'.
--   - BuyerManager::getActive() filtered them out with
--       AND (include IS NULL OR include != b'0')
--     because the wizard's internal soft-delete also uses include=b'0'.
--   - Result: the wizard showed 0 existing buyers, so Larissa re-added
--     the same two during renewal, ending up with duplicates after
--     Confirm Receipt.
--
-- Fix (this migration + the matching BuyerManager.php change):
--   - New column `wizard_removed_at` DATETIME NULL, defaults to NULL.
--   - BuyerManager::remove()  → SET wizard_removed_at = NOW()
--   - BuyerManager::restore() → SET wizard_removed_at = NULL
--   - BuyerManager::getActive() → WHERE wizard_removed_at IS NULL
--     (no longer references `include` at all)
--
-- The legacy `include` column is left fully untouched so no other
-- code path that reads it (legacy PFM admin, exports, reports) is
-- affected. Future-proof for the next PFM admin rewrite — at that
-- point the admin can adopt the same semantics or this column can be
-- dropped in favour of a unified flag.
--
-- Applied on staging: 2026-06-14 by Muhammad.
-- Apply on production at Phase 7 deploy time alongside the other
-- 00x_*.sql migrations.

ALTER TABLE members
    ADD COLUMN wizard_removed_at DATETIME NULL DEFAULT NULL
    AFTER include,
    ADD INDEX idx_members_wizard_removed (client_id, wizard_removed_at);

-- Quick verify (run in a separate query):
--   SHOW COLUMNS FROM members LIKE 'wizard_removed_at';
--
-- Expected:
--   Field             | Type     | Null | Key | Default | Extra
--   wizard_removed_at | datetime | YES  | MUL | NULL    |
