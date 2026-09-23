<?php
/**
 * Shared <head> + visible header for wizard step pages.
 * Expects: $PFM_PAGE_TITLE, $PFM_STEP, $PFM_STEP_TITLE, $_SESSION['csrf_token']
 * Optional: $PFM_FLOW_LABEL — subtitle text next to "Step N of 8".
 *   Defaults to 'Annual Membership Renewal' (the renewal wizard never
 *   sets this). The new-customer application wizard
 *   (public/apply/steps/*) sets it to 'New Membership Application' —
 *   see apply_bootstrap.php. Added 2026-09-23 for the new-customer
 *   application module (NEW_CUSTOMER_APPLICATION_SPEC.md Section 8)
 *   rather than duplicating this whole file for one string.
 * Optional: $PFM_API_BASE — value for the <meta name="pfm-api-base">
 *   tag that wizard.js reads to know where to POST autosave/upload/etc
 *   calls. Defaults to '/renewal_v2/public/api' (the renewal wizard's
 *   existing endpoints — never set by those pages, so unaffected). The
 *   new-customer application wizard sets it to
 *   '/renewal_v2/public/apply/api' so the SAME wizard.js (unmodified)
 *   posts to its own parallel API endpoints instead. See
 *   apply_bootstrap.php and wizard.js's getApiBase().
 */
$PFM_FLOW_LABEL = $PFM_FLOW_LABEL ?? 'Annual Membership Renewal';
$PFM_API_BASE   = $PFM_API_BASE   ?? '/renewal_v2/public/api';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="same-origin">
    <meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES) ?>">
    <meta name="pfm-api-base" content="<?= htmlspecialchars($PFM_API_BASE, ENT_QUOTES) ?>">
    <title><?= htmlspecialchars($PFM_PAGE_TITLE ?? 'PFM Membership Renewal') ?></title>
    <link rel="icon" href="/renewal_v2/public/assets/img/pfm_logo_small.png" type="image/png">
    <link rel="stylesheet" href="/renewal_v2/public/assets/css/wizard.css">
    <!--
        wizard.js loads here (in <head>) so the global window.PFM is defined
        BEFORE the per-step inline <script> blocks run. The script itself
        only sets up window.PFM at top-level (no DOM access) and registers
        a DOMContentLoaded listener for auto-wiring, so loading in <head>
        is safe.
    -->
    <script src="/renewal_v2/public/assets/js/wizard.js"></script>
</head>
<body>
<div class="pfm-shell">

    <header class="pfm-header" role="banner">
        <div class="pfm-container">
            <img src="/renewal_v2/public/assets/img/pfm_logo_small.png"
                 alt="Portland Flower Market"
                 class="pfm-header__logo">
            <div>
                <h1 class="pfm-header__title">Portland Flower Market</h1>
                <div class="pfm-header__subtitle"><?= htmlspecialchars($PFM_FLOW_LABEL) ?> &middot; Step <?= (int) ($PFM_STEP ?? 1) ?> of 8</div>
            </div>
        </div>
    </header>

    <main class="pfm-main" role="main">
        <div class="pfm-container">
