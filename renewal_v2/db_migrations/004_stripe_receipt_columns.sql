-- ─────────────────────────────────────────────────────────────────────
-- Migration 004: Stripe receipt + card detail columns — Phase 4 polish
--
-- Adds 3 columns to renewal_sessions so the admin review page can
-- display the customer's Stripe-hosted receipt URL plus the card
-- brand + last 4 digits without a per-page-load Stripe API call.
--
-- These values are fetched ONCE in StripeClient::syncStripePaymentInto
-- (immediately after payment succeeds) and stored here permanently —
-- so the admin review page reads from the DB and is fast, AND we
-- still have a copy if Stripe ever deletes the payment record.
--
-- Spec ref: v3 spec section 7 (Back-end Stripe Payment Display) —
--   "Method: Card ending in 4242 (Visa)"
--   "Receipt: [View Stripe Receipt ↗]"
-- ─────────────────────────────────────────────────────────────────────

ALTER TABLE renewal_sessions
  ADD COLUMN stripe_receipt_url VARCHAR(500) DEFAULT NULL
    COMMENT 'Stripe-hosted receipt URL from latest_charge.receipt_url',
  ADD COLUMN stripe_card_brand  VARCHAR(20)  DEFAULT NULL
    COMMENT 'visa, mastercard, amex, etc. — from card.brand',
  ADD COLUMN stripe_card_last4  VARCHAR(4)   DEFAULT NULL
    COMMENT 'Last 4 digits of card — from card.last4';

-- Existing rows get NULL (no backfill — old rows just don't show the link).
-- Apply: mysql --defaults-file=/etc/mysql/debian.cnf pfm < 004_stripe_receipt_columns.sql
