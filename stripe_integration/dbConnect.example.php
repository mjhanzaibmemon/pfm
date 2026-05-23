<?php
/**
 * stripe_integration/dbConnect.php — TEMPLATE
 *
 * Copy to `dbConnect.php` and fill in the real password.
 * The real `dbConnect.php` is gitignored (contains secrets).
 */

$servername = "pfm-app.com";
$username   = "stp-adm-usr";
$password   = "REPLACE_ME";         // Stripe DB password
$dbname     = "stripe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Second connection (legacy code expects $db too)
$db = new mysqli($servername, $username, $password, $dbname);
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
