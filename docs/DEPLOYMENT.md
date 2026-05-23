# PFM Deployment Runbook

How to set up the PFM web app on a fresh server, and how to deploy updates.

---

## 1. Server Prerequisites

- Ubuntu 22.04 (or similar Debian)
- nginx
- PHP-FPM 8.1 running as `pfm-app:pfm-app`
- MySQL 8.0 with the `pfm` and `stripe` databases
- `pfm-app` user with `/home/pfm-app/htdocs/` as web root parent

---

## 2. Initial Repo Setup

```bash
sudo -u pfm-app git clone https://github.com/mjhanzaibmemon/pfm.git \
    /home/pfm-app/htdocs/www.pfm-app.com
cd /home/pfm-app/htdocs/www.pfm-app.com

# Pick the right branch
sudo -u pfm-app git checkout main       # production
# OR
sudo -u pfm-app git checkout staging    # staging
```

---

## 3. Install `_lib/` (ScriptCase Runtime)

`_lib/` is the ScriptCase framework (~749 MB of vendor binaries:
wkhtmltopdf, phantomjs, AWS SDK, fontawesome, etc.). It's gitignored
because it's standard vendor code and bloats the repo.

Two options:

### Option A — Copy from another server (fastest)
```bash
# From a working PFM server:
sudo tar czf /tmp/pfm_lib.tar.gz -C /home/pfm-app/htdocs/www.pfm-app.com _lib

# scp to the new server, then:
sudo tar xzf /tmp/pfm_lib.tar.gz -C /home/pfm-app/htdocs/www.pfm-app.com/
sudo chown -R pfm-app:pfm-app /home/pfm-app/htdocs/www.pfm-app.com/_lib
```

### Option B — Re-deploy from ScriptCase Software
Re-publish the project from ScriptCase IDE. Generated `_lib/` will appear
under the app's root.

---

## 4. Set Up Config Files (NOT in git — contain secrets)

```bash
# Stripe integration
sudo -u pfm-app cp \
    /home/pfm-app/htdocs/www.pfm-app.com/stripe_integration/config.example.php \
    /home/pfm-app/htdocs/www.pfm-app.com/stripe_integration/config.php
sudo nano /home/pfm-app/htdocs/www.pfm-app.com/stripe_integration/config.php
# → fill in STRIPE_API_KEY, STRIPE_PUBLISHABLE_KEY, DB_PASSWORD

# Renewal v2 (if on staging or after deploying renewal_v2 to prod)
sudo -u pfm-app cp \
    /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/config/config.example.php \
    /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/config/config.php
sudo chmod 600 /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/config/config.php
sudo nano /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/config/config.php
# → fill in PFM_RNW_DB_PASS, Stripe keys, webhook secret
```

---

## 5. nginx Configuration

Add a server block in `/etc/nginx/sites-enabled/`. See existing configs as
templates. The PFM Renewal v2 specifically needs these deny rules added
inside the HTTPS server block:

```nginx
# ─── PFM Renewal v2 — deny direct access to internal directories ───
location ~ ^/renewal_v2/(config|lib|storage)(/|$) {
    deny all;
    return 403;
}
location ~ ^/renewal_v2/public/_includes(/|$) {
    deny all;
    return 403;
}
```

Then:
```bash
sudo nginx -t && sudo systemctl reload nginx
```

---

## 6. Directory Permissions

The PHP-FPM pool for this site runs as `pfm-app:pfm-app`. All files must
be owned accordingly:

```bash
sudo chown -R pfm-app:pfm-app /home/pfm-app/htdocs/www.pfm-app.com
sudo find /home/pfm-app/htdocs/www.pfm-app.com -type d -exec chmod 770 {} \;
sudo find /home/pfm-app/htdocs/www.pfm-app.com -type f -exec chmod 640 {} \;
sudo chmod 600 /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/config/config.php
sudo chmod 600 /home/pfm-app/htdocs/www.pfm-app.com/stripe_integration/config.php
```

Renewal v2 storage dirs must be writable for sessions + uploads:
```bash
sudo chmod 770 /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/storage/sessions
sudo chmod 770 /home/pfm-app/htdocs/www.pfm-app.com/renewal_v2/storage/uploads
```

---

## 7. Database Setup

The `renewal_v2` flow needs two additional tables (additive only — does
not touch existing tables):

```sql
CREATE TABLE renewal_sessions (...);  -- see Phase 1 spec section 10
CREATE TABLE renewal_changes (...);
```

And a dedicated read/write DB user:
```sql
CREATE USER 'pfm_renewal'@'localhost' IDENTIFIED BY '<password>';
GRANT SELECT ON pfm.clients_app TO 'pfm_renewal'@'localhost';
GRANT SELECT, UPDATE ON pfm.clients TO 'pfm_renewal'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON pfm.members TO 'pfm_renewal'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON pfm.renewal_sessions TO 'pfm_renewal'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON pfm.renewal_changes TO 'pfm_renewal'@'localhost';
GRANT SELECT ON pfm.members_level TO 'pfm_renewal'@'localhost';
GRANT SELECT ON pfm.members_status TO 'pfm_renewal'@'localhost';
GRANT SELECT ON pfm.sec_renewals TO 'pfm_renewal'@'localhost';
GRANT SELECT, INSERT ON pfm.client_pmts TO 'pfm_renewal'@'localhost';
GRANT SELECT ON pfm.bus_categories TO 'pfm_renewal'@'localhost';
GRANT SELECT ON pfm.bus_subcats TO 'pfm_renewal'@'localhost';
GRANT SELECT ON stripe.transactions TO 'pfm_renewal'@'localhost';
FLUSH PRIVILEGES;
```

---

## 8. Standard Deployment Workflow

```bash
# On staging:
ssh ubuntu@35.94.10.190
cd /home/pfm-app/htdocs/www.pfm-app.com
sudo -u pfm-app git fetch origin
sudo -u pfm-app git checkout staging
sudo -u pfm-app git pull origin staging

# Test thoroughly...

# When ready to ship to production:
# (Locally) merge staging into main, push, then on production:
ssh ubuntu@44.250.234.112
cd /home/pfm-app/htdocs/www.pfm-app.com
sudo -u pfm-app git fetch origin
sudo -u pfm-app git checkout main
sudo -u pfm-app git pull origin main
```

After any deployment:
- Verify file ownership: `sudo chown -R pfm-app:pfm-app .`
- Verify config.php files are still in place (not overwritten — they're gitignored)
- Reload nginx if you changed any config: `sudo systemctl reload nginx`

---

## 9. Servers

| Env | Host (SSH) | Domain | nginx site config |
|-----|------------|--------|-------------------|
| Production | `ubuntu@44.250.234.112` | https://pfm-app.com | `/etc/nginx/sites-enabled/www.pfm-app.com.conf` |
| Staging | `ubuntu@35.94.10.190` | https://staging.pfm-app.com | `/etc/nginx/sites-enabled/staging.pfm-app.com.conf` |

SSH key: `D:\pfm_key.pem`

---

## 10. Database Connections

```
Staging DB (admin):       mysql -h localhost -u debian-sys-maint -p
Production DB (admin):    mysql -h localhost -u debian-sys-maint -p
Renewal v2 app DB user:   pfm_renewal (least-privilege, configured per server)
```

DB credentials live in:
- `stripe_integration/config.php` (gitignored)
- `renewal_v2/config/config.php` (gitignored)
- For server-admin tasks: `/etc/mysql/debian.cnf` (root-only)
