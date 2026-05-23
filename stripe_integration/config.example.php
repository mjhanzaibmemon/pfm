<?php
/**
 * stripe_integration/config.php — TEMPLATE
 *
 * Copy this file to `config.php` and fill in the real values.
 * `config.php` itself is gitignored (contains secrets).
 *
 * Stripe keys: https://dashboard.stripe.com/account/apikeys
 */

// Product Details
// Minimum amount is $0.50 US
$productName  = "Business to Business membership";
$productID    = "DP12345";
$productPrice = 125;
$currency     = "usd";

/*
 * Stripe API configuration
 * Switch to LIVE keys when going to production!
 */
define('STRIPE_API_KEY',         'sk_test_REPLACE_ME');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_REPLACE_ME');
define('STRIPE_SUCCESS_URL',     'https://pfm-app.com/stripe_integration/payment-success.php');
define('STRIPE_CANCEL_URL',      'https://pfm-app.com/stripe_integration/payment-cancel.php');

// Database configuration (Stripe payments DB — separate from main pfm DB)
define('DB_HOST',     'pfm-app.com');
define('DB_USERNAME', 'stp-adm-usr');
define('DB_PASSWORD', 'REPLACE_ME');
define('DB_NAME',     'stripe');
