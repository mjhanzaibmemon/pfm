<?php
/**
 * PFM Membership Exports
 *
 * Integrated ScriptCase blank-app target. Loaded inside menu_main iframe.
 * Requires an authenticated ScriptCase session ΓÇö anonymous users are bounced
 * to the app login page.
 *
 * Reports (logic per client request 2026-04-25):
 *   - Current Members:        renewal_date >= today - 30 days (30-day grace period)
 *   - Expired Members:        renewal_date BETWEEN user-supplied [from .. to]
 *   - All Members:            every row, no filter
 *   - Missing Renewal Date:   data-quality list ΓÇö renewal_date IS NULL
 *
 * Fields (12, in this order). Membership No. is first.
 */

declare(strict_types=1);

// --- Auth guard ----------------------------------------------------------
if (session_status() !== PHP_SESSION_ACTIVE) {
    @session_start();
}
$is_logged_in =
       isset($_SESSION['scriptcase'])
    && (
           !empty($_SESSION['scriptcase']['glo_usuario'])
        || !empty($_SESSION['scriptcase']['login_user'])
        || !empty($_SESSION['scriptcase']['menu_main']['glo_nm_usa_grupo'])
    );

if (!$is_logged_in) {
    header('Location: app_Login/');
    exit;
}

// --- DB config -----------------------------------------------------------
const PFM_DB_HOST = '127.0.0.1';
const PFM_DB_NAME = 'pfm';
const PFM_DB_USER = 'pfm_exporter';
const PFM_DB_PASS = 'REPLACE_ME_PFM_EXPORTER_PASS';

// --- Helpers -------------------------------------------------------------
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

function pfm_valid_date(string $s): bool {
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $s)) return false;
    [$y,$m,$d] = array_map('intval', explode('-', $s));
    return checkdate($m, $d, $y);
}

/**
 * Build [where_sql, params] for a given report.
 */
function pfm_filter(string $type, ?string $from = null, ?string $to = null): array {
    switch ($type) {
        case 'current':
            // 30-day grace: renewal_date >= today - 30 days (includes future)
            return [
                "WHERE v.renewal_date IS NOT NULL
                   AND v.renewal_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)",
                [],
            ];
        case 'expired':
            return [
                "WHERE v.renewal_date IS NOT NULL
                   AND v.renewal_date >= :rf
                   AND v.renewal_date <  DATE_ADD(:rt, INTERVAL 1 DAY)",
                [':rf' => $from, ':rt' => $to],
            ];
        case 'missing':
            return ["WHERE v.renewal_date IS NULL", []];
        case 'all':
        default:
            return ["", []];
    }
}

function pfm_report_label(string $type): string {
    return [
        'current' => 'Current_Members',
        'expired' => 'Expired_Members',
        'all'     => 'All_Members',
        'missing' => 'Missing_Renewal_Date',
    ][$type] ?? 'Members';
}

function pfm_count(string $type, ?string $from = null, ?string $to = null): int {
    [$where, $params] = pfm_filter($type, $from, $to);
    $sql  = "SELECT COUNT(*) FROM vw_clients_main_member v $where";
    $stmt = pfm_db()->prepare($sql);
    $stmt->execute($params);
    return (int) $stmt->fetchColumn();
}

function pfm_stream_csv(string $type, ?string $from = null, ?string $to = null): void {
    [$where, $params] = pfm_filter($type, $from, $to);
    $label    = pfm_report_label($type);

    $suffix = '';
    if ($type === 'expired' && $from && $to) {
        $suffix = '_' . str_replace('-', '', $from) . '_' . str_replace('-', '', $to);
    }
    $filename = $label . $suffix . '_' . date('Ymd_His') . '.csv';

    $sql = "SELECT
                v.MembershipID           AS `Membership No.`,
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

    while (ob_get_level() > 0) { ob_end_clean(); }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');

    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF"); // BOM for Excel

    $stmt = pfm_db()->prepare($sql);
    $stmt->execute($params);
    $headerWritten = false;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (!$headerWritten) {
            fputcsv($out, array_keys($row));
            $headerWritten = true;
        }
        fputcsv($out, array_values($row));
    }
    if (!$headerWritten) {
        fputcsv($out, [
            'Membership No.','Company Name','Address','City','State','Zip Code',
            'Phone Number','Email Address',
            'Membership Level','Business Category','Subcategory','Member Since Date',
            'Renewal Date','Status','Main Contact Name',
        ]);
    }
    fclose($out);
    exit;
}

// --- Router --------------------------------------------------------------
$action = isset($_GET['action']) ? (string) $_GET['action'] : 'menu';

if (in_array($action, ['current','all','missing'], true)) {
    try {
        pfm_stream_csv($action);
    } catch (Throwable $e) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Export failed.\n";
        error_log('[membership_exports] ' . $e->getMessage());
        exit;
    }
}

if ($action === 'expired') {
    $from = isset($_GET['from']) ? trim((string) $_GET['from']) : '';
    $to   = isset($_GET['to'])   ? trim((string) $_GET['to'])   : '';
    if (!pfm_valid_date($from) || !pfm_valid_date($to) || strcmp($from, $to) > 0) {
        http_response_code(400);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Please supply valid From / To dates (YYYY-MM-DD), with From <= To.";
        exit;
    }
    try {
        pfm_stream_csv('expired', $from, $to);
    } catch (Throwable $e) {
        http_response_code(500);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Export failed.\n";
        error_log('[membership_exports] ' . $e->getMessage());
        exit;
    }
}

// --- Menu UI -------------------------------------------------------------
// Default expired range: previous calendar month
$today        = new DateTimeImmutable('today');
$prevMonth    = $today->modify('first day of last month');
$prevMonthEnd = $today->modify('last day of last month');
$default_from = $prevMonth->format('Y-m-d');
$default_to   = $prevMonthEnd->format('Y-m-d');

try {
    $counts = [
        'current' => pfm_count('current'),
        'expired' => pfm_count('expired', $default_from, $default_to),
        'all'     => pfm_count('all'),
        'missing' => pfm_count('missing'),
    ];
    $db_ok  = true;
    $db_err = '';
} catch (Throwable $e) {
    $counts = ['current' => 0, 'expired' => 0, 'all' => 0, 'missing' => 0];
    $db_ok  = false;
    $db_err = $e->getMessage();
}

?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Membership Exports</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  /* Match ScriptCase Meadow theme palette used by the rest of the app */
  :root {
    --pfm-primary: #009061;
    --pfm-primary-dk: #00744f;
    --pfm-text: #3C4858;
    --pfm-muted: #8492A6;
    --pfm-border: #E0E6ED;
    --pfm-bg: #FFFFFF;
    --pfm-bg-soft: #F2F4F7;
    --pfm-info-bg: #EFF6F2;
    --pfm-info-border: #BFE0CF;
    --pfm-info-text: #1f5a40;
  }
  * { box-sizing: border-box; }
  html, body { margin: 0; padding: 0; background: var(--pfm-bg); color: var(--pfm-text);
               font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
  .pfm-wrap { padding: 16px 18px 28px; max-width: 1080px; }
  .pfm-page-title { font-size: 18px; font-weight: bold; color: var(--pfm-text);
                    border-bottom: 1px solid var(--pfm-border); padding: 4px 0 10px; margin: 0 0 16px; }
  .pfm-info { background: var(--pfm-info-bg); border: 1px solid var(--pfm-info-border);
              color: var(--pfm-info-text); padding: 9px 12px; border-radius: 4px;
              font-size: 12px; margin-bottom: 16px; }
  .pfm-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; }
  .pfm-card { background: var(--pfm-bg); border: 1px solid var(--pfm-border);
              border-radius: 4px; padding: 16px 18px; display: flex; flex-direction: column; }
  .pfm-card h3 { margin: 0 0 4px; font-size: 14px; font-weight: bold; color: var(--pfm-text); }
  .pfm-card .desc { margin: 0 0 12px; color: var(--pfm-muted); font-size: 12px; line-height: 1.5; }
  .pfm-count { font-size: 26px; font-weight: bold; color: var(--pfm-primary); margin-bottom: 12px; }
  .pfm-count small { font-size: 11px; font-weight: normal; color: var(--pfm-muted); margin-left: 4px; }
  .pfm-btn { display: inline-block; background: var(--pfm-primary); color: #fff;
             padding: 7px 14px; border-radius: 3px; text-decoration: none;
             font-size: 12px; font-weight: bold; border: 1px solid var(--pfm-primary);
             cursor: pointer; text-align: center; }
  .pfm-btn:hover { background: var(--pfm-primary-dk); border-color: var(--pfm-primary-dk); }
  .pfm-btn.disabled, .pfm-btn[disabled] { background: #aaa; border-color: #aaa;
                                          cursor: not-allowed; pointer-events: none; }
  .pfm-fields { background: var(--pfm-bg-soft); border: 1px solid var(--pfm-border);
                border-radius: 4px; padding: 12px 18px; margin-top: 18px; font-size: 12px; }
  .pfm-fields h4 { margin: 0 0 6px; font-size: 12px; font-weight: bold; color: var(--pfm-text); }
  .pfm-fields ol { margin: 0; padding-left: 18px; columns: 2; column-gap: 24px; color: var(--pfm-text); }
  .pfm-fields li { margin: 1px 0; }
  .pfm-err { background: #FDECEA; border: 1px solid #F4B7B0; color: #8A1F11;
             padding: 9px 12px; border-radius: 4px; font-size: 12px; margin-bottom: 16px;
             font-family: monospace; white-space: pre-wrap; }
  .pfm-row { display: flex; gap: 8px; align-items: flex-end; flex-wrap: wrap; margin-top: auto; margin-bottom: 0; }
  .pfm-field { display: flex; flex-direction: column; font-size: 11px; color: var(--pfm-muted); }
  .pfm-field label { margin-bottom: 3px; }
  .pfm-field input[type=date] { padding: 6px 8px; border: 1px solid var(--pfm-border);
                                border-radius: 3px; font-size: 12px; color: var(--pfm-text);
                                background: #fff; min-width: 130px; }
  .pfm-field input[type=date]:focus { outline: none; border-color: var(--pfm-primary); }
  .pfm-card-warn { border-color: #E0B85A; background: #FFFBF0; }
  .pfm-count-warn { color: #B8860B; }
  .pfm-btn-warn { background: #B8860B; border-color: #B8860B; }
  .pfm-btn-warn:hover { background: #8C6508; border-color: #8C6508; }
  .pfm-badge { display: inline-block; background: #E0B85A; color: #fff;
               font-size: 10px; font-weight: bold; padding: 1px 6px; border-radius: 3px;
               margin-left: 6px; vertical-align: middle; text-transform: uppercase; letter-spacing: 0.4px; }
</style>
</head>
<body>
<div class="pfm-wrap">

  <div class="pfm-page-title">Membership Exports</div>

  <?php if (!$db_ok): ?>
    <div class="pfm-err">Database error: <?= htmlspecialchars($db_err, ENT_QUOTES, 'UTF-8') ?></div>
  <?php else: ?>
    <div class="pfm-info">
      Reports are based on <strong>Renewal Date</strong>. Current = within last 30 days or future
      (30-day grace period). Expired = pick any Renewal Date range. All = every record.
    </div>
  <?php endif; ?>

  <div class="pfm-grid">

    <div class="pfm-card">
      <h3>Current Members</h3>
      <div class="desc">Renewal Date is within the last 30 days or in the future
        (30-day grace period after expiration).</div>
      <div class="pfm-count"><?= number_format($counts['current']) ?><small>records</small></div>
      <a class="pfm-btn<?= $db_ok ? '' : ' disabled' ?>" href="?action=current">Download CSV</a>
    </div>

    <div class="pfm-card">
      <h3>Expired Members</h3>
      <div class="desc">Members whose Renewal Date falls within the selected range
        (e.g.&nbsp;3/1/26&ndash;3/31/26 for monthly reporting).</div>
      <form method="get" action="" class="pfm-row">
        <input type="hidden" name="action" value="expired">
        <div class="pfm-field">
          <label for="exp_from">From</label>
          <input type="date" id="exp_from" name="from"
                 value="<?= htmlspecialchars($default_from, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="pfm-field">
          <label for="exp_to">To</label>
          <input type="date" id="exp_to" name="to"
                 value="<?= htmlspecialchars($default_to, ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <button type="submit" class="pfm-btn"<?= $db_ok ? '' : ' disabled' ?>>Download CSV</button>
      </form>
      <div class="desc" style="margin-top:8px; margin-bottom:0;">
        Default: <strong><?= htmlspecialchars($default_from, ENT_QUOTES, 'UTF-8') ?></strong>
        &rarr; <strong><?= htmlspecialchars($default_to, ENT_QUOTES, 'UTF-8') ?></strong>
        (<?= number_format($counts['expired']) ?> records).
      </div>
    </div>

    <div class="pfm-card">
      <h3>All Members</h3>
      <div class="desc">Every record in the membership view, regardless of status or renewal date.</div>
      <div class="pfm-count"><?= number_format($counts['all']) ?><small>records</small></div>
      <a class="pfm-btn<?= $db_ok ? '' : ' disabled' ?>" href="?action=all">Download CSV</a>
    </div>

    <div class="pfm-card pfm-card-warn">
      <h3>Missing Renewal Date <span class="pfm-badge">data quality</span></h3>
      <div class="desc">Members whose <strong>Renewal Date is empty</strong>. These won't appear in the
        Current or Expired reports until the date is filled in. Use this list to find &amp; fix them
        in the member's record &mdash; the count will drop as records are corrected.</div>
      <div class="pfm-count pfm-count-warn"><?= number_format($counts['missing']) ?><small>records</small></div>
      <a class="pfm-btn pfm-btn-warn<?= $db_ok ? '' : ' disabled' ?>" href="?action=missing">Download CSV</a>
    </div>

  </div>

  <div class="pfm-fields">
    <h4>Fields included in every export (in this order)</h4>
    <ol>
      <li>Membership No.</li>
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

</div>
</body>
</html>
