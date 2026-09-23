# Reset a Customer's Renewal Link — Quick Guide

*For PFM staff. One-page reference.*

---

## Where to find it

**Option 1 (recommended):** In the PFM admin sidebar, click **"Reset Renewal"** — it sits right under "Renewal Reviews". It opens in a new tab.

**Option 2:** After you click the **Email** button on the Renewals grid, the success page shows a small blue block titled *"Need to reset a specific customer's renewal?"* with an "Open Reset & Send Fresh Link" button. Same destination.

Both options open the same staff-only page. If prompted, sign in with the staff password (the same one used for the Pending Reviews dashboard).

---

## When should I use this page?

Use it when a customer needs a **fresh renewal link** and just clicking "Email" in the Renewals grid isn't enough. Common cases:

1. Customer says: *"I filled the renewal form with wrong info, can I start over?"* (and they **have not paid yet**) — their previous session is stuck in draft. This page wipes it and sends them a fresh link.

2. Customer says: *"My renewal link doesn't work anymore."* — the token expired (30-day limit) or was already used. This page issues a brand new token and emails it.

3. You accidentally sent a renewal to the wrong contact and want to reset before they open it.

> **Note:** For the normal "send renewal for this year" case, keep using the existing **Email** button in the Renewals grid. This page is for **reset** situations only.

---

## &#9940; When should I NOT use this page

### 1. The customer already paid but wants to make changes

If a customer has already completed their renewal and paid, and now needs to correct something (add a buyer, fix contact info, update the company name, etc.), **do NOT click Reset**. Reset starts a whole new renewal cycle and the customer will be asked to pay again — the original payment is not refunded.

Instead, open the client's record in the legacy PFM admin's **Client Details** page and edit the fields directly. For adding a single buyer against an already-paid renewal, use the existing **Additional Buyer Payment** tool (`form_client_pmts_adtl_byr`) so only the incremental charge is billed.

The Reset page detects this case and shows a big red STOP banner, but the ultimate decision is yours.

### 2. You're not 100% sure it's the right client

Reset **cannot be undone from the UI**. Once you click, the previous renewal session is marked cancelled and the token is retired. If you reset the wrong client, contact Muhammad (dev) with the client_id and timestamp — the cancelled session's data is still in the database and can be revived manually, but it requires developer intervention.

Rule of thumb: read the client_id, company name, and email displayed on screen before you click. If any of them look wrong, cancel out and re-search.

---

## How to use it — step by step

### 1. Open the page
Click **Reset Renewal** in the sidebar (or the blue block on the Email success page — either one).

### 2. Find the client
In the search box, type any one of:
- The client ID number (e.g. `737838`) — most precise
- Part of the company name (e.g. `Larissa Test`)
- The main-contact name (e.g. `Sarah`)
- The main-contact email (e.g. `sarah@example.com`)

Click **Search**.

### 3. Review the current state
The page shows you:
- **Company** and **main contact** for the client
- **Active session** — whether they have a draft, awaiting payment, or a completed renewal
- **Latest token** — when the last renewal link was generated, and whether it has been used

If the client has already paid, a red STOP banner appears with the paid date and amount. Read it before proceeding.

Double-check this is really the client you meant to reset. There is no undo.

### 4. Click "Reset renewal & send fresh link"
A confirmation popup appears asking:
*"This will cancel any renewal already in progress for this client and email them a fresh link. Continue?"*
(For an already-paid client, the popup wording is stronger — it warns the customer will be asked to pay again.)

Click **OK** to proceed.

### 5. Confirm the result
You will see one of two messages:

- **&#10003; Done — Fresh renewal link sent to `<email>`.** — the customer should receive the email within a minute. The link is also displayed on screen so you can copy it into a Slack message or text if needed.

- **&#9888; Problem — …** — something went wrong (usually the email failed to send). The new link is still generated and displayed on screen — copy it and share it manually.

An audit entry is also written to the customer's **Notes** tab in the legacy PFM admin, so any staff member who opens the customer later can see when the reset happened and where the fresh link was sent.

---

## What actually happens behind the scenes

For reference — feel free to skip.

1. The customer's current renewal session (draft, awaiting review, or completed) is marked `cancelled` in the database. Nothing is deleted — everything is kept for audit history.
2. A brand-new renewal token is generated with a 30-day expiry.
3. The standard renewal email (same template the Renewals-grid "Email" button uses) is sent to the customer's main-contact email.
4. When the customer clicks the new link, the wizard starts fresh at Step 1 — no data from the cancelled session carries over.
5. A Notes-tab audit line is added to the customer's profile in the legacy PFM admin so the reset is discoverable later without checking server logs.

---

## Questions / edge cases

**Q: The customer already has a new renewal link (they are mid-wizard) and I click Reset. What happens?**
A: Their in-progress draft is cancelled. When they next open a link they start over from Step 1 with no data pre-filled. Use with care — warn the customer first.

**Q: What if the reset succeeds but the email doesn't arrive?**
A: The new link is shown on the confirmation page. Copy it and send it via any other channel (Slack, text). It is a valid 30-day link.

**Q: I reset the wrong client — how do I undo?**
A: There is no automatic undo. Contact Muhammad (dev) with the client ID and timestamp — the cancelled session's data is still in the database and can be revived manually.

**Q: The customer has an old renewal link from an earlier email. Does that still work after I click Reset?**
A: No. As soon as a newer active token exists for the same client, the old link shows a friendly *"This renewal link is no longer active — a newer renewal email has been sent to you"* page. The customer is directed back to their inbox for the most recent email.

**Q: How do I know if I need Reset vs. the normal "Email" button?**
A:
- Customer has never renewed / it is their first renewal → **normal Email button** (Renewals grid)
- Customer already renewed this year and is on the normal schedule → **normal Email button** (Renewals grid)
- Customer already paid but needs to add one buyer only → **Additional Buyer Payment** (`form_client_pmts_adtl_byr`), not Reset
- Customer's in-progress renewal is broken and needs to be wiped → **this Reset page**
- Customer says their link is broken and needs a truly fresh one → **this Reset page**

If in doubt, use **this Reset page** for anything that needs a fresh link — it is slightly heavier-handed but always safe: it cancels anything in progress and starts clean.
