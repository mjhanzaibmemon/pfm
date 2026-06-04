<?php
/**
 * Shared <head> + visible header for wizard step pages.
 * Expects: $PFM_PAGE_TITLE, $PFM_STEP, $PFM_STEP_TITLE, $_SESSION['csrf_token']
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="same-origin">
    <meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES) ?>">
    <meta name="pfm-api-base" content="/renewal_v2/public/api">
    <title><?= htmlspecialchars($PFM_PAGE_TITLE ?? 'PFM Membership Renewal') ?></title>
    <link rel="icon" href="/renewal_v2/public/assets/img/pfm_logo_small.png" type="image/png">
    <link rel="stylesheet" href="/renewal_v2/public/assets/css/wizard.css">
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
                <div class="pfm-header__subtitle">Annual Membership Renewal &middot; Step <?= (int) ($PFM_STEP ?? 1) ?> of 8</div>
            </div>
        </div>
    </header>

    <main class="pfm-main" role="main">
        <div class="pfm-container">
