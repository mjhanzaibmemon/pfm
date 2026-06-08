<?php
/**
 * Shared layout helpers for the renewal_v2 admin pages.
 *
 * Two functions:
 *   pfm_admin_header($title, $subtitle = null)
 *   pfm_admin_footer()
 *
 * Reuses the same wizard.css so colours/typography match the customer
 * wizard. We deliberately do NOT include progress-bar / per-step chrome —
 * admin pages are standalone.
 *
 * Spec ref: larissa_rebuild.md → "Phase 4 — admin pages live under
 *   /renewal_v2/admin/. They must NOT touch existing ScriptCase admin."
 */

declare(strict_types=1);

if (!function_exists('pfm_admin_header')) {

    function pfm_admin_header(string $title, ?string $subtitle = null): void
    {
        $envBadge = (defined('PFM_RNW_ENVIRONMENT') && PFM_RNW_ENVIRONMENT === 'staging')
            ? '<span class="pfm-env-badge">STAGING</span>'
            : '';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="same-origin">
    <meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES) ?>">
    <title><?= htmlspecialchars($title) ?> &middot; PFM Renewal Admin</title>
    <link rel="icon" href="/renewal_v2/public/assets/img/pfm_logo_small.png" type="image/png">
    <link rel="stylesheet" href="/renewal_v2/public/assets/css/wizard.css">
    <style>
        /* Admin-specific tweaks layered on top of wizard.css */
        .pfm-env-badge {
            display: inline-block;
            background: #fa5c7c;
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 8px;
            vertical-align: middle;
            letter-spacing: 0.05em;
        }
        .pfm-admin-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .pfm-admin-grid { grid-template-columns: 1fr; }
        }
        .pfm-data-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px solid #eef2f7;
            font-size: 0.92rem;
        }
        .pfm-data-row:last-child { border-bottom: none; }
        .pfm-data-row .label { color: #6c757d; }
        .pfm-data-row .value { color: #313a46; font-weight: 600; text-align: right; word-break: break-all; }
        .pfm-changes-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .pfm-changes-list li {
            padding: 10px 12px;
            margin-bottom: 8px;
            border-radius: 6px;
            font-size: 0.92rem;
            border-left: 3px solid #727cf5;
            background: #fafbfe;
        }
        .pfm-changes-list li.added    { border-left-color: #0acf97; }
        .pfm-changes-list li.removed  { border-left-color: #fa5c7c; }
        .pfm-changes-list li.modified { border-left-color: #ffbc00; }
        .pfm-changes-list .change-type {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 2px 8px;
            border-radius: 3px;
            margin-right: 8px;
            background: #e3e6f0;
            color: #313a46;
        }
        .pfm-changes-list li.added    .change-type { background: #d2f4e8; color: #0a8964; }
        .pfm-changes-list li.removed  .change-type { background: #ffe3e8; color: #b13b58; }
        .pfm-changes-list li.modified .change-type { background: #fff2cd; color: #8a6500; }
    </style>
</head>
<body>
<div class="pfm-shell">

    <header class="pfm-header" role="banner">
        <div class="pfm-container">
            <img src="/renewal_v2/public/assets/img/pfm_logo_small.png"
                 alt="Portland Flower Market"
                 class="pfm-header__logo">
            <div>
                <h1 class="pfm-header__title">PFM Renewal Admin <?= $envBadge ?></h1>
                <div class="pfm-header__subtitle">
                    <?= htmlspecialchars($subtitle ?? 'Internal review &amp; payment confirmation') ?>
                </div>
            </div>
        </div>
    </header>

    <main class="pfm-main" role="main">
        <div class="pfm-container">
        <?php
    }

    function pfm_admin_footer(): void
    {
        ?>
        </div>
    </main>

    <footer class="pfm-footer" role="contentinfo">
        <div class="pfm-container">
            <small class="pfm-text-muted">
                &copy; <?= date('Y') ?> Portland Flower Market &middot;
                Renewal Admin (renewal_v2) &middot;
                <?= defined('PFM_RNW_ENVIRONMENT') ? htmlspecialchars(PFM_RNW_ENVIRONMENT) : 'unknown' ?> environment
            </small>
        </div>
    </footer>

</div>
</body>
</html>
        <?php
    }
}
