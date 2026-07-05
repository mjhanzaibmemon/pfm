# Reset a Customer's Renewal Link — Quick Guide

*For PFM staff (Larissa). Save this URL as a bookmark.*

**Bookmark this URL:**
`https://www.pfm-app.com/renewal_v2/admin/reset-renewal.php`

*(On staging: replace `www.pfm-app.com` with `staging.pfm-app.com`.)*

---

## When should I use this page?

Use it when a customer asks for a **fresh renewal link** and just clicking
"Email" in the Renewals grid isn't enough. Common cases:

1. Customer says: *"I filled the renewal form with wrong info, can I start
   over?"* — their previous session is stuck in draft or completed. This
   page wipes it and sends them a fresh link.

2. Customer says: *"My renewal link doesn't work anymore."* — the token
   expired (30-day limit) or was already used. This page issues a brand new
   token and emails it.

3. You accidentally sent a renewal to the wrong contact and want to reset
   before they open it.

> **Note:** For the normal "send renewal for this year" case, keep using the
> existing **Email** button in the Renewals grid. This page is for **reset**
> situations only.

---

## How to use it — step by step

### 1. Open the page
Click the bookmark, or type the URL into your browser. If prompted,
sign in with the staff password (the same one you use for the Pending
Reviews dashboard).

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
- **Active session** — whether they have a draft, awaiting payment, or a
  completed renewal
- **Latest token** — when the last renewal link was generated, and whether
  it's been used

Double-check this is really the client you meant to reset. There is no
undo.

### 4. Click "Reset renewal & send fresh link"
A confirmation popup will appear asking *"This will cancel any renewal
already in progress for this client and email them a fresh link.
Continue?"*

Click **OK** to proceed.

### 5. Confirm the result
You'll see one of two messages:

- **&#10003; Done — Fresh renewal link sent to `<email>`.** — the customer
  should receive the email within a minute. The link is also displayed
  on-screen in case you want to copy it into a Slack message or text.

- **&#9888; Problem — …** — something went wrong (usually the email failed
  to send). The new link is still generated and displayed on-screen — you
  can copy it and share it manually.

---

## What actually happens under the hood

For your reference (feel free to skip):

1. The customer's current renewal session (draft or completed) is marked
   `cancelled` in the database. Nothing is deleted — everything is kept for
   audit history.
2. A brand-new renewal token is generated with a 30-day expiry.
3. The standard renewal email (same template the Renewals-grid "Email"
   button uses) is sent to the customer's main-contact email.
4. When the customer clicks the new link, the wizard starts fresh at
   Step 1 — no data from the cancelled session carries over.

---

## Questions / edge cases

**Q: The customer already has a NEW renewal link (they're mid-wizard) and I
click Reset. What happens?**
A: Their in-progress draft is cancelled. When they next open a link, they
start over from Step 1 with no data pre-filled. Use with care — warn the
customer first.

**Q: What if the reset succeeds but the email doesn't arrive?**
A: The new link is shown on the confirmation page. Copy it and send it via
any other channel (Slack, text). It's a valid 30-day link.

**Q: I reset the wrong client — how do I undo?**
A: There is no automatic undo. Contact Muhammad (dev) with the client ID
and timestamp — the cancelled session's data is still in the database and
can be revived manually.

**Q: How do I know if I need Reset vs. the normal "Email" button?**
A:
- Customer has never renewed / it's their first renewal → **normal Email button** (Renewals grid)
- Customer already renewed this year → **normal Email button** (Renewals grid)
- Customer's in-progress renewal is broken and needs to be wiped → **this Reset page**
- Customer says their link is broken and needs a truly fresh one → **this Reset page**

If in doubt, use **this Reset page** — it's slightly heavier-handed but
always safe: it cancels anything in progress and starts clean.
