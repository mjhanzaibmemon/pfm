# Larissa Renewal Rebuild — Project Handover Document

> **Purpose:** Complete running record of the PFM (Portland Flower Market) customer renewal flow rebuild project. This document exists so that any AI model, developer, or future Muhammad can pick up exactly where things left off with full context.

---

## 📌 Quick Reference

| Item | Value |
|------|-------|
| **Client** | Larissa @ Portland Flower Market (PFM) |
| **Platform** | Upwork (hourly contract) |
| **Project Folder** | `C:\Users\MUHAMMAD JAHANZEB\Desktop\projects\Sumitra Kannan` |
| **Production Server** | `44.250.234.112` |
| **Staging Server** | `35.94.10.190` (formerly `ec2-35-94-10-190`) |
| **SSH Key** | `D:\pfm_key.pem` |
| **SSH User** | `ubuntu` |
| **Estimate** | 116 – 157 hours |
| **Timeline** | 3 – 4 weeks |
| **Project Start Date** | 2026-05-21 |

---

## 🔐 Access Credentials

### SSH (Staging & Production)
```
ssh -i "D:\pfm_key.pem" -o StrictHostKeyChecking=no ubuntu@35.94.10.190    # Staging
ssh -i "D:\pfm_key.pem" -o StrictHostKeyChecking=no ubuntu@44.250.234.112  # Production
```

### Database (Both Servers — Same Credentials)
```
mysql -h localhost -u debian-sys-maint -p'<REDACTED_DEBIAN_SYS_MAINT_PASS>' pfm
```

### Database (Read-Only Exporter — App Code Uses)
```
Host: 127.0.0.1
User: pfm_exporter
Pass: <REDACTED_EXPORTER_PASS>
DB: pfm
```

### Stripe DB Separate
```
DB: stripe (on same MySQL server)
User: stp-adm-usr
Pass: <REDACTED_STRIPE_DB_PASS>
```

### Stripe API Keys (Currently TEST mode on both servers)
```
STRIPE_API_KEY: sk_test_<REDACTED>
STRIPE_PUBLISHABLE_KEY: pk_test_<REDACTED>
```
**NOTE:** Production currently uses test keys. Will need to switch to live keys when renewal goes back on the public website. Confirm with Larissa before switching.

---

## 🎯 Project Scope (Approved)

**IN SCOPE — Phase 1 (this project):**
- Rebuild **customer-facing renewal flow only**
- 8-step wizard (Welcome → Org Info → Main Contact → Buyers → Documents → Review → Payment → Confirmation)
- Submit-first then pay (no more orphan payments)
- Single source of truth for buyers (no fragmentation)
- Simple document upload (no required dropdown)
- Membership level locked on customer side (staff changes via back-end)
- New: Stripe payment auto-display on back-end review
- New: Changes Summary panel on back-end (added/removed/modified buyers, company changes, contact changes)

**OUT OF SCOPE (later phases):**
- New member application flow (Phase 2 — future)
- Admin side changes (untouched)
- Existing database table modifications (untouched — only additive new tables)
- Email template changes
- Migration of 803 stuck applications / 229 orphan payments (separate cleanup task)

---

## 🗄️ Database Architecture

### Existing Tables (NOT to be modified)

| Table | Purpose | Notes |
|-------|---------|-------|
| `clients` | Active members (~16,000 records) | Has `MembershipID` unique. Active member info. |
| `clients_app` | Applications in progress | 803+ empty records pending cleanup |
| `members` | All buyers (~32,000 records) | Has `client_id` FK |
| `members_app` | Buyers tied to applications | ~1,152 records |
| `members_level` | Pricing tiers (3 active) | Trade $50, B2B $125, Non-Profit $175 |
| `members_status` | Application statuses | 1=Awaiting Review, 2=Incomplete, 3=Active, 4=Inactive, 9=Renewing Active |
| `sec_renewals` | Renewal tokens | One client has 12 tokens — issue to fix |
| `client_pmts` | Payment records (manually entered) | Currently staff enters these from Stripe |
| `stripe.transactions` | Stripe payment data | 566 records, 229 orphan |

### Planned New Tables (Additive Only)

```sql
-- Tracks each renewal session (allows submit-first, save & resume)
CREATE TABLE renewal_sessions (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    client_id BIGINT NOT NULL,
    token VARCHAR(50) NOT NULL UNIQUE,
    status ENUM('draft', 'submitted', 'paid', 'completed', 'cancelled') DEFAULT 'draft',
    current_step TINYINT DEFAULT 1,
    draft_data JSON,             -- All form state for save & resume
    submitted_at DATETIME NULL,
    payment_id VARCHAR(255) NULL,  -- Stripe payment intent ID
    paid_at DATETIME NULL,
    stripe_session_id VARCHAR(255) NULL,
    amount_charged DECIMAL(10,2) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_client (client_id),
    INDEX idx_token (token),
    INDEX idx_status (status)
);

-- Tracks specific changes during a renewal (for Changes Summary panel)
CREATE TABLE renewal_changes (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    session_id BIGINT NOT NULL,
    change_type ENUM('buyer_added', 'buyer_removed', 'buyer_modified', 'company_changed', 'contact_changed'),
    target_id BIGINT NULL,       -- e.g. member_id for buyer changes
    old_value TEXT NULL,
    new_value TEXT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES renewal_sessions(id) ON DELETE CASCADE
);
```

These tables are additive only — they don't touch any existing data or break any existing admin/export/report functionality.

---

## 📁 Code Locations

### Existing Code (DO NOT MODIFY — fallback)

| Path | What |
|------|------|
| `/home/pfm-app/htdocs/www.pfm-app.com/form_clients_steps_appn_stripe_renew/` | OLD renewal flow (~82,000 lines ScriptCase) |
| `/home/pfm-app/htdocs/www.pfm-app.com/form_clients_staff/` | Admin member edit form (recently fixed) |
| `/home/pfm-app/htdocs/www.pfm-app.com/stripe_integration/` | Stripe payment code (~1,062 lines, will reuse) |
| `/home/pfm-app/htdocs/www.pfm-app.com/blank_renewal_link/` | Renewal email link landing |
| `/home/pfm-app/htdocs/www.pfm-app.com/membership_exports.php` | Member export reports |

### NEW Code (To Be Built)

```
/home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/
├── public/                          # Customer-facing
│   ├── index.php                    # Entry point (token validation)
│   ├── api/
│   │   ├── save-draft.php          # Auto-save endpoint
│   │   ├── add-buyer.php           # Buyer management
│   │   ├── remove-buyer.php
│   │   ├── upload-document.php
│   │   ├── submit-application.php  # Final submit
│   │   ├── create-payment.php      # Stripe checkout creation
│   │   └── stripe-webhook.php      # Payment confirmation
│   ├── steps/
│   │   ├── 1-welcome.php
│   │   ├── 2-organization.php
│   │   ├── 3-main-contact.php
│   │   ├── 4-buyers.php
│   │   ├── 5-documents.php
│   │   ├── 6-review.php
│   │   ├── 7-payment.php
│   │   └── 8-confirmation.php
│   ├── assets/
│   │   ├── css/wizard.css
│   │   └── js/wizard.js
│   └── _includes/
│       ├── header.php
│       ├── footer.php
│       └── progress-bar.php
├── admin/                           # Back-end additions
│   ├── stripe-display.php          # Auto-display Stripe payment on review
│   └── changes-summary.php         # Changes summary panel
├── lib/                             # Shared library code
│   ├── Db.php                       # Database connection
│   ├── RenewalSession.php           # Session management
│   ├── BuyerManager.php             # Buyer CRUD
│   ├── DocumentUpload.php           # File handling
│   ├── StripeClient.php             # Stripe wrapper (uses existing creds)
│   └── ChangeLogger.php             # Changes summary logging
└── config/
    └── config.php                   # Environment config
```

---

## 📋 Phase Plan (Day-by-Day)

### Phase 1 — Planning & Spec (Week 1, Mon-Fri)

| Day | Task | Hours |
|-----|------|-------|
| Mon | Wizard step-by-step specification (all 8 steps, every field, every label) | 4-5 |
| Tue | Validation rules + buyer behavior detailed spec | 3-4 |
| Wed | Database schema design + new tables SQL | 3-4 |
| Thu | Internal review, polish spec document | 2-3 |
| Fri | Send spec doc to Larissa + weekly update | 1-2 |
| **Total** | | **13-18** |

**Deliverable:** Spec document for Larissa's review (Checkpoint 1)

### Phase 2 — Backend (Week 2)

| Day | Task | Hours |
|-----|------|-------|
| Mon | Create folder structure + database tables on staging | 3-4 |
| Tue | Token validation + session management + draft save | 5-6 |
| Wed | Buyer CRUD (add/edit/remove with proper sync) | 5-6 |
| Thu | Document upload handler + file storage | 4-5 |
| Fri | Submit application logic + state transitions + weekly update | 5-6 |
| **Total** | | **22-27** |

### Phase 3 — Frontend Wizard (Week 3)

| Day | Task | Hours |
|-----|------|-------|
| Mon | Wizard framework + step navigation + progress bar | 4-5 |
| Tue | Steps 1-4 UI (Welcome, Org, Contact, Buyers) | 6-7 |
| Wed | Steps 5-8 UI (Docs, Review, Payment, Confirmation) | 6-7 |
| Thu | Auto-save logic + validation per step | 4-5 |
| Fri | Polish + Stripe integration + weekly update | 4-5 |
| **Total** | | **24-29** |

### Phase 4 — Stripe + Back-end Display (Mixed with Phase 3)

| Task | Hours |
|------|-------|
| Stripe Checkout session creation | 2-3 |
| Webhook handler for payment confirmation | 3-4 |
| Back-end Stripe display widget on admin review screen | 4-5 |
| Changes Summary panel on admin review | 3-4 |
| **Total** | **12-16** |

### Phase 5 — Testing (Week 4 — Mon-Wed)

| Day | Task | Hours |
|-----|------|-------|
| Mon | End-to-end happy path testing | 4-5 |
| Tue | Edge cases: cancel during payment, abandoned drafts, expired tokens | 5-6 |
| Wed | Staff testing of admin back-end displays | 3-4 |
| **Total** | | **12-15** |

### Phase 6 — Review & Adjustments (Week 4 — Thu)

| Task | Hours |
|------|-------|
| Larissa testing on staging | (her time) |
| Feedback adjustments + bug fixes | 8-12 |

### Phase 7 — Production Deployment (Week 4 — Fri-Sat)

| Task | Hours |
|------|-------|
| Production deployment scripts | 2-3 |
| Cutover (update renewal link to new URL) | 1-2 |
| Monitor first 48 hours | 2-3 |
| Handover documentation | 1-2 |

---

## 🗂️ Daily Work Log

> Format: Date | Hours | What was done | Status

### Week 1

#### 2026-05-21 (Thursday) — Approval & Phase 1 Day 1
- Hours: 4
- Action:
  - Larissa approved scope (received approval email)
  - Created `Phase1_Specification.docx` — full wizard spec with all 8 steps, every field, every label, validation rules, wireframes, database schema, error handling, and 6 open decisions for Larissa
  - 30 tables in spec document covering field specs, pricing, validation, state machine
- Status: ✅ Phase 1 spec document ready for Larissa review
- Deliverable: `Phase1_Specification.docx` (project folder)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Database Foundation)
- Hours: 1.5
- Action: STARTED PHASE 2 (before final v3 approval - safe additive work only)
  - Pre-flight check: confirmed both new tables don't exist
  - Created `renewal_sessions` table on staging (full schema per spec section 10)
    - PK, indexes, ENUM status, JSON draft_data, all timestamps
  - Created `renewal_changes` table on staging (with FK CASCADE to sessions)
  - Smoke tests passed:
    - INSERT/SELECT working
    - JOIN works via FK
    - UPDATE auto-timestamps working
    - DELETE CASCADE removes related changes (verified 0 orphans)
  - Confirmed NO existing tables disturbed (counted rows on clients, members, members_app, clients_app, sec_renewals, members_level, members_status — all same)
  - Created `/home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/` folder structure:
    - public/ (steps/, api/, assets/, _includes/)
    - admin/ (for back-end Stripe display + Changes Summary)
    - lib/ (shared library code)
    - config/ (environment config)
    - storage/uploads + sessions (for file uploads)
    - Permissions: 755 (storage 775), owner: www-data
- Status: ✅ Phase 2 Task 1 COMPLETE (Database foundation + folder structure)
- Staging total tables: 50 → 52 (only addition)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 2: DB Connection Library)
- Hours: 1.5
- Action:
  - Created dedicated DB user `pfm_renewal` with minimal privileges (least-privilege principle)
    - SELECT on: clients, clients_app, members_level, members_status, sec_renewals, bus_categories, bus_subcats
    - SELECT/INSERT/UPDATE/DELETE on: members, renewal_sessions, renewal_changes
    - UPDATE on: clients (for company/contact edits)
    - SELECT/INSERT on: client_pmts (for auto-payment record)
    - SELECT on: stripe.transactions (read-only)
  - Created `config/config.php` with environment detection (staging vs production)
    - DB credentials, Stripe keys, URLs, file storage paths, session policies
    - Permissions: 600 (owner read only)
  - Created `lib/Db.php` PDO wrapper class:
    - Singleton pattern (one connection per request)
    - Prepared statements only (SQL injection safe)
    - Helper methods: one(), all(), scalar(), insert(), exec(), transaction()
    - Stripe DB support: stripeOne(), stripeAll()
  - Added security `.htaccess` files (deny direct web access):
    - config/.htaccess
    - lib/.htaccess
    - storage/.htaccess
  - Uploaded to staging, set proper ownership (www-data) + permissions
  - Smoke test passed all 8 tests:
    - MySQL connection, table reads, prepared statements
    - INSERT/UPDATE/DELETE on new tables
    - Transaction support
    - Stripe DB connection
  - Cleanup: removed test script, both new tables back to 0 rows
- Status: ✅ Phase 2 Task 2 COMPLETE (DB connection library ready)
- Files on staging:
  - /renewal_v2/config/config.php
  - /renewal_v2/config/.htaccess
  - /renewal_v2/lib/Db.php
  - /renewal_v2/lib/.htaccess
  - /renewal_v2/storage/.htaccess
- Credentials: pfm_renewal / <REDACTED_RENEWAL_DB_PASS> (staging only — production user separate when deployed)
- Side note: added www-data to pfm-app group so PHP CLI tests work (web server already had access via Apache)
- Next task: RenewalSession class (manage renewal_sessions CRUD)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 3: RenewalSession Class)
- Hours: 1.5
- Action:
  - Created `lib/RenewalSession.php` — full session management class:
    - Constants: 6 status states (draft/submitted/awaiting_payment/awaiting_review/completed/cancelled)
    - Constants: 6 change types (buyer_added/removed/modified, company_changed, contact_changed, document_changed)
    - Factory methods: loadOrCreate(), loadById(), loadByToken()
    - validateToken() — checks sec_renewals, enforces expiry, 50-char max
    - loadOrCreate() — "one renewal = one request" rule, resumes active session or creates fresh draft, syncs token if customer used newer link
    - saveDraft() — shallow-merge patch (only changed keys), step never regresses
    - replaceDraft() — full blob replacement
    - State transitions (each enforces correct prior state):
      - submit() → submitted (sets submitted_at)
      - setStripeSession() → awaiting_payment (records stripe_session_id)
      - markPaid() → awaiting_review (records payment_id, amount, paid_at — auto-transition per spec)
      - complete() → completed
      - cancel() — works from any non-terminal state
    - logChange() — writes to renewal_changes with field_name support, validates change_type
    - getChanges() / clearChanges() — for Changes Summary panel
    - isEditable(), isActive(), isPaid() — state query helpers
    - toArray() — safe JSON output (token never exposed)
  - Uploaded to staging at /renewal_v2/lib/RenewalSession.php
  - Smoke test: 54/54 tests passed
    - Token validation (empty, too long, unknown, valid)
    - loadOrCreate idempotency (same session ID on second call)
    - loadById / loadByToken
    - saveDraft with DB persistence, step-regression guard
    - replaceDraft
    - logChange / getChanges / clearChanges (including type-filtered clear)
    - Invalid change_type throws InvalidArgumentException
    - toArray (correct keys, token not exposed, JSON-encodable)
    - All 7 state guard RuntimeException paths via reflection
  - Cleanup: test session rows deleted from DB, test script removed
- Status: ✅ Phase 2 Task 3 COMPLETE (RenewalSession class ready)
- Files on staging:
  - /renewal_v2/lib/RenewalSession.php
- Next task: BuyerManager class (add/edit/remove buyers with change logging)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 4: BuyerManager Class)
- Hours: 1
- Action:
  - Created `lib/BuyerManager.php` — full buyer CRUD for the Step 4 buyers list:
    - MAX_BUYERS = 50 (Larissa v3 decision)
    - MODIFIABLE_FIELDS whitelist: member_name, email, phone1, note (protects against injection)
    - getActive(clientId) — buyers WHERE main_contact=0 AND include!=0, returns include+main_contact columns normalised
    - getAll(clientId) — same but includes soft-deleted buyers (for admin Changes Summary)
    - countActive(clientId) — fast COUNT(*) for cap enforcement
    - getOne(memberId) — single buyer lookup
    - add(session, name, email, phone, note) — INSERT with include=b'1', enforces cap, logs CHANGE_BUYER_ADDED
    - remove(session, memberId) — soft-delete (include=b'0'), logs CHANGE_BUYER_REMOVED, idempotent
    - restore(session, memberId) — re-include soft-deleted buyer, logs CHANGE_BUYER_ADDED, idempotent
    - modify(session, memberId, fields) — per-field update, logs separate CHANGE_BUYER_MODIFIED per changed field, skips identical values
    - assertBelongsToClient() — security check on every write (prevents cross-client tampering)
    - normaliseRow() — converts PDO BIT(1) byte strings to PHP bool for all bit columns
    - All write methods enforce draft-only via isEditable()
  - Uploaded to staging at /renewal_v2/lib/BuyerManager.php
  - Smoke test: 46/46 tests passed (including cross-client security, idempotency, state guards)
  - Cleanup: test session + test buyer deleted from DB
- Status: ✅ Phase 2 Task 4 COMPLETE (BuyerManager ready)
- Files on staging:
  - /renewal_v2/lib/BuyerManager.php
- Next task: DocumentUpload class (file upload handling for Step 5)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Tasks 5 & 6: DocumentUpload + StripeClient)
- Hours: 2
- Action:
  - Created `lib/DocumentUpload.php`:
    - Files stored at storage/uploads/{session_id}/{uuid}.{ext} — never blobs
    - MIME detected from actual file content via finfo (not browser header — security)
    - UUID-based filenames on disk (no user-supplied paths anywhere)
    - store(session, $_FILES[...], key) — validates, moves, saves metadata to draft_data['documents']
    - delete(session, key) — removes file + draft_data entry, logs CHANGE_DOCUMENT_CHANGED
    - purgeAll(sessionId) — removes entire session upload directory (for cancel)
    - getAll/getByKey/count/getAbsolutePath — read helpers
    - Replace semantics: uploading same key again replaces previous file
    - All upload errors → UploadException (extends RuntimeException) with uploadCode
    - UploadException class defined in same file
    - Session must be draft (isEditable) for any write
  - Created `lib/StripeClient.php`:
    - DB-driven pricing (reads from members_level, NOT hardcoded) — price changes by Larissa auto-apply
    - getClientLevel(clientId) — reads clients.pricing_level_id → members_level row
    - calculateAmountCents(levelRow, buyerCount) — formula: curr_price + max(0,buyers-included)*price_after
    - pricingBreakdown(levelRow, buyerCount) — full breakdown array for Payment step display
    - pricingForClient(clientId, buyerCount) — convenience: lookup + breakdown in one call
    - createCheckoutSession(session, buyerCount, email) — creates Stripe Checkout, calls setStripeSession()
    - retrieveCheckoutSession(stripeSessionId) — GET from Stripe API
    - verifyWebhook(rawBody, signatureHeader) — HMAC-SHA256 verification, 5-min stale check
    - handleCheckoutCompleted(event) — verified event handler, marks paid, writes client_pmts
    - writeClientPayment() — inserts to existing client_pmts with correct columns (reference, pmt_mode='Stripe Renewal', etc.)
    - HTTP via curl (no Composer/SDK), Stripe API version pinned to 2024-06-20
  - Discovered & fixed: clients.MembershipID is member number, NOT level — real column is pricing_level_id
  - Smoke tests: 58/58 passed (pricing math, DB-driven lookup, webhook secret guard, DocumentUpload read/validate)
- Status: ✅ Phase 2 Tasks 5+6 COMPLETE (DocumentUpload + StripeClient ready)
- Files on staging:
  - /renewal_v2/lib/DocumentUpload.php
  - /renewal_v2/lib/StripeClient.php
- Next task: Submit logic (public/api/submit-application.php) + all other API endpoints

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 7: Entry Point + All API Endpoints)
- Hours: 2
- Action:
  - Created `public/index.php` — token validation entry point:
    - Reads token from URL param or existing PHP session
    - Calls RenewalSession::loadOrCreate()
    - Routes to correct step based on current status
    - Shows styled error page for expired/invalid/cancelled sessions
  - Created `public/_includes/api_bootstrap.php` — shared API foundation:
    - JSON headers, cache-control, no-store
    - PHP sessions in storage/sessions/ (not web-accessible)
    - api_ok() / api_error() — consistent JSON response format
    - api_require_session() — reads token from PHP session or POST/GET, loads RenewalSession
    - api_require_draft() / api_require_method() / api_required_post() / api_required_int()
    - Global exception handler → JSON 500 response
  - Created all API endpoints (9 files):
    - save-draft.php — shallow-merge POST data into draft_data, advance step
    - add-buyer.php — POST name/email/phone/note, returns new member_id + buyer_count
    - remove-buyer.php — POST member_id, soft-delete
    - modify-buyer.php — POST member_id + fields JSON, field whitelist enforced
    - upload-document.php — multipart POST, delegates to DocumentUpload::store()
    - delete-document.php — POST key, delegates to DocumentUpload::delete()
    - submit-application.php — validates draft, applies org/contact changes to DB (transaction), submits, creates Stripe Checkout
    - create-payment.php — re-create Stripe Checkout for submitted/awaiting_payment sessions (expired checkout retry)
    - stripe-webhook.php — no session auth, HMAC signature verified, calls StripeClient::handleCheckoutCompleted()
  - All 16 PHP files syntax-checked: 0 errors
- Status: ✅ Phase 2 Task 7 COMPLETE (Full backend API layer done)
- Files on staging: /renewal_v2/public/index.php + /renewal_v2/public/_includes/ + /renewal_v2/public/api/ (9 files)
- Next task: Frontend wizard (steps 1-8 HTML/PHP pages + wizard.css + wizard.js)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 8: Code Audit + Fixes)
- Hours: 2
- Action: Audited all Phase 2 code; found and fixed multiple real bugs.

  **CRITICAL bugs fixed:**
  1. `public/index.php` redirect used `__DIR__` (filesystem path) instead of URL —
     every redirect would have 404'd in browser. Fixed: use `stepUrl()` helper.
  2. `public/api/submit-application.php` had leftover `global $stripeUrl;` dead code
     inside the transaction. Removed.
  3. `public/_includes/` had no access control. Added `.htaccess` (defense in depth)
     AND added the actual nginx deny block (see infrastructure fix below).

  **Infrastructure issues found and fixed on staging:**
  4. `.htaccess` files do NOT work — server is nginx, not Apache. ALL the deny
     rules in config/, lib/, storage/, _includes/ were silently ignored. Anyone
     could fetch config.php / Db.php / uploaded files directly.
     → Added nginx location blocks in `/etc/nginx/sites-enabled/staging.pfm-app.com.conf`
       (backup saved as `.bak_20260523`) denying `renewal_v2/(config|lib|storage)/`
       and `renewal_v2/public/_includes/`. All 6 previously-leaky paths now return 403.
  5. File ownership was `www-data:www-data` 755 — PHP-FPM pool for this site
     runs as `pfm-app:pfm-app`, so config.php (600, www-data) was unreadable
     from HTTP. Storage/sessions also un-writeable. The entire HTTP layer was
     broken — only CLI tests with `sudo -u www-data` worked.
     → Recursive chown to `pfm-app:pfm-app`, dirs 770, files 640, config.php 600.
  6. `config.php` had `display_errors=on` when PFM_RNW_DEBUG was true (staging),
     which leaked full filesystem paths in PHP warnings to ANY browser hitting a
     misconfigured URL. Fixed: errors are always logged, NEVER displayed.

  **IMPORTANT fixes:**
  7. `DocumentUpload::generateFilename()` used `mt_rand()` — not cryptographically
     random; UUIDs were guessable. Changed to `random_bytes(16)` (CSPRNG, RFC 4122 v4).
  8. `RenewalSession::markPaid()` rejected sessions in 'submitted' state — would
     orphan a payment if `setStripeSession()` failed after the Stripe API returned
     success. Now accepts both 'submitted' and 'awaiting_payment'.
  9. `StripeClient::handleCheckoutCompleted()` same fix + improved idempotency:
     re-attempts the `client_pmts` insert if the session was already marked paid
     (handles the case where a prior webhook attempt failed on the DB write only).
  10. No CSRF protection on API endpoints. Added `api_require_csrf()` to
      `api_bootstrap.php` (HMAC-equal compare, X-CSRF-Token header or POST field),
      wired into all 7 state-changing endpoints (webhook excluded — uses HMAC sig).
      Token generated in `index.php` and `api_bootstrap.php` as `bin2hex(random_bytes(32))`.

  **EDGE CASES fixed:**
  11. `BuyerManager::add()` and `restore()` had race conditions on the MAX_BUYERS
      cap check. Wrapped both in `Db::transaction()` with `SELECT FOR UPDATE` on
      the clients row — serialises concurrent buyer ops for the same client.
  12. `DocumentUpload::store()` same race on MAX_FILES. Wrapped in transaction
      with `SELECT FOR UPDATE` on the renewal_sessions row, re-reads draft inside
      the lock so the cap check sees freshest state.
  13. `BuyerManager::modify()` stored empty string instead of NULL when clearing
      a field — inconsistent with `add()`'s `sanitiseOptional()`. Fixed: empty → NULL.
  14. `BuyerManager` `is_active` SQL expression treated NULL as inactive, but the
      WHERE clause treated NULL as active. Now both consistent.
  15. `create-payment.php` directly UPDATE'd `renewal_sessions` to reset state —
      bypassed the model state machine. Added `RenewalSession::resetForPaymentRetry()`
      method; endpoint now calls it.
  16. `StripeClient` cancel_url manually appended `&token=` assuming `?` already
      present in config URL. Added `buildReturnUrl()` helper that handles both
      `?` and `&` cases, AND preserves Stripe placeholders like `{CHECKOUT_SESSION_ID}`
      verbatim (urlencoding them would break Stripe's substitution).
  17. `submit-application.php` mapped fields the v3 spec removed (street_address,
      mailing_address, phone_number). Reduced to: co_name, business_type, business_license.
  18. `api_bootstrap.php` exception handler now logs full exception to error_log
      in addition to returning JSON, so we can debug after the fact.

  **Verification:**
  - 17/17 PHP files syntax-check clean
  - 28/28 post-fix smoke tests pass (covers all 18 fixes above)
  - All 6 previously-leaky paths now return HTTP 403 via nginx
  - `index.php?token=X` returns HTTP 302 with proper Location URL + secure session cookie
  - Invalid tokens return styled error page (no path leak)
  - API endpoint without CSRF returns clean JSON `{"success":false,"error":"Invalid or missing CSRF token.","error_code":"csrf_mismatch"}`

- Status: ✅ Phase 2 Task 8 COMPLETE (audit + 18 fixes done, staging fully hardened)

#### 2026-05-23 (Saturday) — Phase 2 Day 1 (Task 9: Comprehensive QA Pass)
- Hours: 1.5
- Action: Full QA verification across 5 dimensions before moving to Phase 3.
  - **Section 1 — Existing app untouched:**
    - Row counts intact: clients=9758, members=31843, client_pmts=31056,
      sec_renewals=7700, members_app=1152, members_level=8, members_status=5
    - No files outside /renewal_v2/ modified today (find -mtime -1 confirmed empty)
    - All existing URLs respond: /form_clients_steps_appn_stripe_renew/ (200),
      /form_clients_staff/ (admin 200), /blank_renewal_link/ (200), / (302),
      /membership_exports.php (302)
    - Production nginx config UNTOUCHED (deploy patch will be a separate step)
    - DB user pfm_renewal grants intact (least-privilege still enforced)
  - **Section 2 — Phase 2 code integrity:**
    - Directory structure: admin/, config/, lib/, public/{api,assets,_includes,steps}/,
      storage/{sessions,uploads}/ — all present
    - 17 PHP files, all owned pfm-app:pfm-app (matches PHP-FPM pool)
    - config.php = 600 (secrets), all other PHP = 640, dirs = 770
    - Syntax check: 17/17 OK, 0 errors
  - **Section 3 — Infrastructure:**
    - nginx config syntax OK (ssl_stapling warnings pre-existing, not from us)
    - Deny rules confirmed in /etc/nginx/sites-enabled/staging.pfm-app.com.conf
    - PHP-FPM 8.1 active, pool 16001 runs as pfm-app
    - storage/sessions and storage/uploads writable by pfm-app
    - DB schema: both new tables intact with correct ENUMs and FK cascade
  - **Section 4 — HTTP-level live tests (32/32 PASS):**
    - index.php with valid token → 302 + secure session cookie + CSRF generated
    - save-draft: CSRF check, valid JSON, step advancement, method enforcement
    - add-buyer: validation, valid add, member_id returned
    - modify-buyer: valid update, unknown field rejected, cross-client rejected
    - remove-buyer: soft-delete, main contact protected
    - Invalid token → styled error page, no path leak
    - All 6 internal paths return 403 via nginx
    - Webhook: missing/bad signature → 400, GET → 405
  - **Section 5 — Final unit QA (39/39 PASS):**
    - Combined comprehensive run covering all classes after all fixes
  - **Test totals today: 265/265 PASS across 7 distinct test suites, 0 failures**
  - Cleanup: all test data deleted, all temp files removed, DB back to clean state
  - Pre-existing data verified intact via HEX(include) check on test client 389
    (Shari/Debra/Sharon had include=b'1' all along — terminal display of 0x01
    byte made it look NULL initially, was just a CLI rendering quirk)
- Status: ✅ Phase 2 Task 9 COMPLETE (full QA pass, zero defects, staging ready)
- Next task: Phase 3 — Frontend wizard (steps 1-8 + wizard.css + wizard.js)

- **⚠️ PRODUCTION DEPLOYMENT REQUIREMENTS** (when ready to deploy renewal_v2 live):
  Production server (44.250.234.112) ALSO uses nginx and ALSO needs the same
  deny rules added to `/etc/nginx/sites-enabled/www.pfm-app.com.conf`:
  ```
  location ~ ^/renewal_v2/(config|lib|storage)(/|$) { deny all; return 403; }
  location ~ ^/renewal_v2/public/_includes(/|$)     { deny all; return 403; }
  ```
  And file ownership must be `pfm-app:pfm-app` (dirs 770, files 640, config 600).
  After editing nginx config: `sudo nginx -t && sudo systemctl reload nginx`.

- Next task: Frontend wizard (steps 1-8 HTML/PHP pages + wizard.css + wizard.js)

#### 2026-05-23 (Saturday) — Phase 1 Day 3 (v3 with Larissa Feedback)
- Hours: 3
- Action:
  - Received Larissa's reviewed document with red comments
  - Extracted all comments + decision answers
  - Verified max buyers on production (8 companies have >20 buyers, max 49)
  - Verified existing email template in members_status table (status 1)
  - Verified token expiration policy (30 days)
  - Created Phase1_Specification_v3.docx with all updates:
    - State machine: paid → awaiting_review auto-transition
    - Renewal date: +1 year same month/day, >90 days = staff review
    - Token: 30 days explicit
    - Step 2: Removed all optional address/phone fields
    - Step 3: ID upload now required validation
    - Step 5: Removed "Federal tax ID document" from examples
    - Step 8: Use existing system email (no new template)
    - Decision 2: Recommended 50-buyer cap (8 companies >20)
    - All 8 decisions resolved table added
  - 38 tables, 51,091 chars
- Status: ✅ Phase 1 v3 ready for final approval
- Deliverable: `Phase1_Specification_v3.docx`

#### 2026-05-22 (Friday) — Phase 1 Day 2 (Spec Review & v2)
- Hours: 3
- Action:
  - Reviewed Phase1_Specification.docx — found gaps
  - Created Phase1_Specification_v2.docx with major additions:
    - Renewal date / expiration date display on Welcome step
    - Optional street_address & home_phone fields on Org Info step (collapsible)
    - Comments/Notes field properly rebuilt on Documents step (sanitized)
    - Full confirmation email template content
    - New Section 11: Implementation Considerations (Security/Mobile/Browser/Performance)
    - New Section 12: Deferred Features (XLSX bulk upload — not used, skipping)
    - 2 more open decisions added (total 8) — Comments handling, Date format
  - 30 tables, 50,494 chars — comprehensive spec
- Status: ✅ Phase 1 spec v2 ready — send to Larissa
- Deliverable: `Phase1_Specification_v2.docx` (project folder)

### [Add daily entries as work progresses]

---

## ❓ Open Questions & Decisions

> Track anything that needs Larissa's input or future decision.

| Question | Status | Decision |
|----------|--------|----------|
| Should email notifications change with new flow? | Deferred to Phase 2 | Keep existing emails for now |
| Refund policy for orphan payments? | Pending | — |
| What to do with 803 stuck applications? | Pending | Separate cleanup task later |
| When to switch Stripe from test to live keys? | Pending | After full staging approval |

---

## 🐛 Already Fixed (Reference)

### Phone Number Display Fix (Earlier Work)
- Staging: 7,160 records updated (phone_number → main_contact_phone)
- Production: 7,172 records updated
- Fix in `clients` table column mapping

### Phone Number Formatting Fix (Earlier Work)
- Staging: 4,924 records cleaned (parens/dashes stripped)
- Production: 4,906 records cleaned
- Used: `REGEXP_REPLACE(main_contact_phone, '[^0-9]', '')`

### TRIM Whitespace Fix (Staging Only — Production Already Had It)
- File: `/home/pfm-app/htdocs/www.pfm-app.com/form_clients_staff/form_clients_staff_apl.php`
- Line 8046: Changed `member_name = ...` to `TRIM(member_name) = ...`
- Backup saved: `form_clients_staff_apl.php.bak_20260513`

### Duplicate Members Cleanup
- Document: `Duplicate_Member_Cleanup_Report.docx` (in project folder)
- 53 companies, ~120 duplicate records identified
- Pending Larissa's approval for production deletion
- Rule: Lowest member_id = keep, higher = delete

---

## 📐 Key Business Logic Reference

### Pricing Formula

```
Total = base_price + max(0, num_buyers - 3) × extra_per_buyer

Regular Business Member:    $125 + ((buyers - 3) × $50)
Non-Profit/Club:            $175 + ((buyers - 3) × $50)
Horticulture/Trade Member:  $50  + ((buyers - 3) × $15)
```

### Renewal States (New Flow)

```
draft           → Customer started, can resume
submitted       → All steps complete, app saved, awaiting payment
paid            → Stripe webhook confirmed payment
completed       → Admin reviewed and approved (status = Active in clients)
cancelled       → Customer cancelled or session expired
```

### Customer Identity in Renewal

- Token is the primary key — comes from email link
- One token = one active session at a time
- Old unused tokens should be auto-expired/invalidated

---

## 🛡️ Safety Rules (Always Follow)

1. **NEVER modify production directly** — always staging first
2. **NEVER alter existing tables** — only additive new tables allowed
3. **NEVER touch admin-side code** — `form_clients_staff/` and `grid_*` folders are off-limits
4. **NEVER delete `members` or `clients` data** without explicit Larissa approval
5. **NEVER replace old renewal code** until new code is fully tested and approved
6. **ALWAYS make backups** before touching any file (`.bak_YYYYMMDD` suffix)
7. **ALWAYS test on staging first**, then verify, then production
8. **NEVER mention "phone call"** with Larissa — she prefers Upwork messaging

---

## 📨 Communication Cadence with Larissa

- **Weekly Friday Update** — Required, on Upwork
- **Phase Checkpoint Messages** — At end of Phase 1, 3, 5
- **Issue Flags** — Immediately if budget/timeline at risk
- **No calls** — All written communication

### Weekly Update Template

```
Subject: Renewal Rebuild — Week [N] Update

Hi Larissa,

What was completed this week:
- [Bullet points]

What's planned for next week:
- [Bullet points]

Hours used so far: [XX of 157]
Status: [On track / Ahead / Need to discuss]

Open questions / decisions needed:
- [Any blockers]

[Staging access link if applicable]

Thank you,
Muhammad
```

---

## 🚀 Resuming This Project (If Context Lost)

If you're an AI model or future developer picking this up:

1. **Read this document top to bottom**
2. **Check `Daily Work Log`** to see the last completed task
3. **Check `Open Questions`** for any pending Larissa input
4. **Verify staging access** with the SSH command above
5. **Check `/home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/`** for code progress
6. **Check `renewal_sessions` table** in pfm DB for live test data
7. **Continue from the next task in the relevant phase**

### Key Files To Check First

```bash
# Check current code progress
ssh -i "D:\pfm_key.pem" ubuntu@35.94.10.190 "sudo ls /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/ 2>&1"

# Check if new tables created
mysql -h localhost -u debian-sys-maint -p'<REDACTED_DEBIAN_SYS_MAINT_PASS>' pfm -e "SHOW TABLES LIKE 'renewal_%';"

# Check Larissa's last message (project folder)
ls "C:\Users\MUHAMMAD JAHANZEB\Desktop\projects\Sumitra Kannan\"
```

---

## 📞 Project Stakeholders

- **Muhammad Jahanzeb** (developer) — Roman Urdu speaker, communicates with client in English
- **Larissa** (client) — PFM, makes all business decisions
- **PFM Staff** (end users of admin side) — Use admin to approve renewals

---

## 📚 Reference Documents in Project Folder

| File | Purpose |
|------|---------|
| `engineering.md` | Earlier work log (membership ID fixes, migration) |
| `Duplicate_Member_Cleanup_Report.docx` | List of 53 companies w/ duplicates |
| `Renewal_Rebuild_Scope_v2.docx` | Approved scope document |
| `larissa_rebuild.md` | THIS DOCUMENT (project handover) |

---

> **Last Updated:** 2026-05-21
> **Last Updated By:** Muhammad (with AI assistance)
> **Next Action:** Begin Phase 1 — Wizard specification document
