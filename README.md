# PFM — Portland Flower Market

Web application powering Portland Flower Market's member portal, renewals,
and admin tools.

## Repository Layout

| Top-level | Purpose |
|-----------|---------|
| `form_clients_*` / `form_members_*` | ScriptCase-generated customer & member forms |
| `form_clients_steps_appn_stripe_renew/` | **Legacy** renewal flow (~82k lines ScriptCase) — to be replaced by `renewal_v2/` |
| `form_clients_staff/` | Admin member edit form |
| `stripe_integration/` | Stripe payment integration (~1k lines) |
| `blank_renewal_link/` | Renewal email link landing page |
| `app_*` / `grid_*` | ScriptCase admin/grid screens (off-limits — do not modify) |
| `renewal_v2/` | **New rebuild** — customer renewal flow (Phase 2 backend complete) |
| `docs/` | Project handover, deployment notes, specifications |

## Branches

| Branch | Purpose |
|--------|---------|
| `main` | Production — matches what's live at `pfm-app.com` |
| `staging` | Active development — matches what's at `staging.pfm-app.com` |

Workflow: develop on `staging` → test on staging server → merge to `main` →
deploy to production.

## Quick Setup

See [`docs/DEPLOYMENT.md`](docs/DEPLOYMENT.md) for full setup instructions.

In short:

1. Clone this repo
2. Install ScriptCase runtime to `_lib/` (gitignored — see deployment doc)
3. Copy `stripe_integration/config.example.php` → `stripe_integration/config.php`
   and fill in real Stripe + DB credentials
4. Copy `renewal_v2/config/config.example.php` → `renewal_v2/config/config.php`
   (same idea)
5. Configure nginx, MySQL, PHP-FPM (see deployment doc)

## Servers

| Env | Host | Notes |
|-----|------|-------|
| **Production** | `44.250.234.112` (https://pfm-app.com) | Live customer site |
| **Staging** | `35.94.10.190` (https://staging.pfm-app.com) | Pre-production testing |

## Project Documentation

See [`docs/`](docs/) for:
- `larissa_rebuild.md` — Full project handover document
- `Phase1_Specification_v3.docx` — Approved renewal v2 spec
- `DEPLOYMENT.md` — Setup + deployment runbook
