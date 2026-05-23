<?php
/**
 * PFM Membership Exports - Staging Hub
 * 
 * Standalone export feature: 3 one-click exports (Current / Expired / All)
 * with full filtered record set (NO pagination limit) and 11 required fields.
 * 
 * STAGING ONLY: 34.219.24.194  (DB: pfm @ localhost, user: pfm_exporter, SELECT-only)
 * 
 * Production deploy plan:
 *   1) Create same MySQL user on Lightsail (GRANT SELECT ON pfm.* TO 'pfm_exporter'@'localhost')
 *   2) Copy this file into /home/pfm-app/htdocs/www.pfm-app.com/
 *   3) Set owner pfm-app:pfm-app, perms 640
 *   4) Add link from membership main menu (or access directly via URL)
 * 
 * Author: Generated Apr 2026 for Larissa / PFM
 */

declare(strict_types=1);

// --- Config ---------------------------------------------------------------
const PFM_DB_HOST = '127.0.0.1';
const PFM_DB_NAME = 'pfm';
const PFM_DB_USER = 'pfm_exporter';
const PFM_DB_PASS = 'REPLACE_ME_PFM_EXPORTER_PASS';

// --- Helpers --------------------------------------------------------------
function pfm_db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . PFM_DB_HOST . ';dbname=' . PFM_DB_NAME . ';charset=utf8mb4';
        $pdo = new PDO($dsn, PFM_DB_USER, PFM_DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}

function pfm_where_for(string $type): string {
    switch ($type) {
        case 'current':
            return "WHERE v.status IN ('Active','Renewing Active')";
        case 'expired':
            return "WHERE v.status IN ('Inactive','Incomplete')";
        case 'all':
        default:
            return "";
    }
}

function pfm_report_label(string $type): string {
    return [
        'current' => 'Current_Members',
        'expired' => 'Expired_Members',
        'all'     => 'All_Members',
    ][$type] ?? 'Members';
}

function pfm_count(string $type): int {
    $sql = "SELECT COUNT(*) c
            FROM vw_clients_main_member v
            " . pfm_where_for($type);
    $stmt = pfm_db()->query($sql);
    return (int) $stmt->fetchColumn();
}

function pfm_stream_csv(string $type): void {
    $where = pfm_where_for($type);
    $label = pfm_report_label($type);
    $filename = $label . '_' . date('Ymd_His') . '.csv';

    // 14 required fields (fixed order matching spec)
    $sql = "SELECT
                v.co_name                AS `Company Name`,
                v.mailing_address        AS `Address`,
                v.city                   AS `City`,
                v.state                  AS `State`,
                v.zip_code               AS `Zip Code`,
                COALESCE(v.main_phone, v.main_contact_phone) AS `Phone Number`,
                COALESCE(v.main_email, v.main_contact_email) AS `Email Address`,
                COALESCE(ml.descript, ml.pricing_level, '') AS `Membership Level`,
                v.bus_cat                AS `Business Category`,
                v.bus_subcategory        AS `Subcategory`,
                DATE_FORMAT(v.permanent_member_date, '%Y-%m-%d') AS `Member Since Date`,
                DATE_FORMAT(v.renewal_date,          '%Y-%m-%d') AS `Renewal Date`,
                v.status                 AS `Status`,
                v.main_contact_name      AS `Main Contact Name`
            FROM vw_clients_main_member v
            LEFT JOIN members_level ml ON ml.memb_lev_id = v.memb_lev_id
            $where
            ORDER BY v.co_name ASC, v.client_id ASC";

    // HTTP headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');

    $out = fopen('php://output', 'w');
    // UTF-8 BOM so Excel opens it correctly with accents
    fwrite($out, "\xEF\xBB\xBF");

    $stmt = pfm_db()->query($sql);

    // Header row
    $headerWritten = false;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (!$headerWritten) {
            fputcsv($out, array_keys($row));
            $headerWritten = true;
        }
        fputcsv($out, array_values($row));
    }
    if (!$headerWritten) {
        // No rows: still emit headers
        fputcsv($out, [
            'Company Name','Address','City','State','Zip Code',
            'Phone Number','Email Address','Membership Level',
            'Business Category','Subcategory','Member Since Date','Renewal Date',
            'Status','Main Contact Name',
        ]);
    }
    fclose($out);
    exit;
}

// --- Router ---------------------------------------------------------------
$action = isset($_GET['action']) ? (string) $_GET['action'] : 'menu';

if (in_array($action, ['current','expired','all'], true)) {
    try {
        pfm_stream_csv($action);
    } catch (Throwable $e) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Export failed.\n";
        // Log only; do not leak creds to user
        error_log('[membership_exports] ' . $e->getMessage());
        exit;
    }
}

// --- Menu UI --------------------------------------------------------------
try {
    $counts = [
        'current' => pfm_count('current'),
        'expired' => pfm_count('expired'),
        'all'     => pfm_count('all'),
    ];
    $db_ok = true;
    $db_err = '';
} catch (Throwable $e) {
    $counts = ['current' => 0, 'expired' => 0, 'all' => 0];
    $db_ok = false;
    $db_err = $e->getMessage();
}

?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PFM Membership Exports (Staging)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  :root { --pfm:#2c7a3d; --pfm-dk:#1f5a2b; --bg:#f6f8f6; --card:#fff; --txt:#222; --muted:#666; --border:#e3e7e3; }
  * { box-sizing:border-box; }
  body { margin:0; font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif; background:var(--bg); color:var(--txt); }
  header { background:var(--pfm); color:#fff; padding:18px 24px; }
  header h1 { margin:0; font-size:22px; font-weight:600; }
  header .sub { opacity:.9; font-size:13px; margin-top:2px; }
  .stg-badge { display:inline-block; background:#ffcc00; color:#222; font-size:11px; font-weight:700; padding:3px 8px; border-radius:4px; margin-left:8px; vertical-align:middle; letter-spacing:.5px; }
  main { max-width:960px; margin:24px auto; padding:0 16px; }
  .info { background:#fff3cd; border:1px solid #ffe69c; color:#664d03; padding:10px 14px; border-radius:6px; font-size:13px; margin-bottom:18px; }
  .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:16px; }
  .card { background:var(--card); border:1px solid var(--border); border-radius:8px; padding:20px; box-shadow:0 1px 2px rgba(0,0,0,.03); display:flex; flex-direction:column; }
  .card h3 { margin:0 0 6px; font-size:17px; color:var(--pfm-dk); }
  .card p { margin:0 0 14px; color:var(--muted); font-size:13px; line-height:1.45; }
  .count { font-size:28px; font-weight:700; color:var(--pfm-dk); margin-bottom:14px; }
  .count small { font-size:12px; font-weight:500; color:var(--muted); }
  .btn { display:inline-block; background:var(--pfm); color:#fff; padding:10px 18px; border-radius:6px; text-decoration:none; font-size:14px; font-weight:600; text-align:center; border:none; cursor:pointer; }
  .btn:hover { background:var(--pfm-dk); }
  .btn[disabled], .btn.disabled { background:#aaa; cursor:not-allowed; pointer-events:none; }
  .fields { background:#fff; border:1px solid var(--border); border-radius:8px; padding:16px 20px; margin-top:22px; font-size:13px; }
  .fields h4 { margin:0 0 8px; font-size:14px; color:var(--pfm-dk); }
  .fields ol { margin:0; padding-left:20px; columns:2; column-gap:24px; }
  .fields li { margin:2px 0; }
  footer { text-align:center; color:#999; font-size:12px; padding:20px; }
  .err { background:#f8d7da; border:1px solid #f5c2c7; color:#842029; padding:10px 14px; border-radius:6px; font-size:13px; margin-bottom:18px; font-family:monospace; white-space:pre-wrap; }
</style>
</head>
<body>
<header>
  <h1>PFM Membership Exports<span class="stg-badge">STAGING</span></h1>
  <div class="sub">One-click full exports &mdash; no page limit, all filtered records included.</div>
</header>
<main>

  <?php if (!$db_ok): ?>
    <div class="err">Database error: <?= htmlspecialchars($db_err, ENT_QUOTES, 'UTF-8') ?></div>
  <?php else: ?>
    <div class="info">
      <strong>Staging environment.</strong> Data shown is from the <code>backup-apr20</code> snapshot.
      Each button below downloads a CSV file containing every record in that category with all 11 fields.
    </div>
  <?php endif; ?>

  <div class="grid">

    <div class="card">
      <h3>Current Members</h3>
      <p>Status = Active or Renewing Active.</p>
      <div class="count"><?= number_format($counts['current']) ?> <small>records</small></div>
      <a class="btn<?= $db_ok ? '' : ' disabled' ?>" href="?action=current">Download CSV</a>
    </div>

    <div class="card">
      <h3>Expired Members</h3>
      <p>Status = Inactive or Incomplete.</p>
      <div class="count"><?= number_format($counts['expired']) ?> <small>records</small></div>
      <a class="btn<?= $db_ok ? '' : ' disabled' ?>" href="?action=expired">Download CSV</a>
    </div>

    <div class="card">
      <h3>All Members</h3>
      <p>Every record in the membership view, regardless of status.</p>
      <div class="count"><?= number_format($counts['all']) ?> <small>records</small></div>
      <a class="btn<?= $db_ok ? '' : ' disabled' ?>" href="?action=all">Download CSV</a>
    </div>

  </div>

  <div class="fields">
    <h4>Fields included in every export (in this order)</h4>
    <ol>
      <li>Company Name</li>
      <li>Address</li>
      <li>Phone Number</li>
      <li>Email Address</li>
      <li>Membership Level</li>
      <li>Business Category</li>
      <li>Subcategory</li>
      <li>Member Since Date</li>
      <li>Renewal Date</li>
      <li>Status</li>
      <li>Main Contact Name</li>
    </ol>
  </div>

</main>
<footer>
  PFM Membership Exports &middot; Staging build &middot; <?= date('Y-m-d H:i T') ?>
</footer>
</body>
</html>
