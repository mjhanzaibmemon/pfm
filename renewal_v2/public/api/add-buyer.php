<?php
/**
 * POST /api/add-buyer.php
 *
 * Add a new buyer to the session's client.
 *
 * Request (POST):
 *   name   string  Buyer full name (required)
 *   email  string  Email (optional)
 *   phone  string  Phone (optional)
 *   note   string  Note (optional)
 *
 * Response:
 *   { success: true, data: { member_id: 12345, name: "Jane Doe", buyer_count: 4 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

$name  = api_required_post('name');
$email = api_optional_post('email');
$phone = api_optional_post('phone');
$note  = api_optional_post('note');

try {
    $memberId   = BuyerManager::add($session, $name, $email, $phone, $note);
    // Pass $session so the count reflects the just-queued pending add
    // (deferred-commit refactor — nothing hit `members` yet).
    $buyerCount = BuyerManager::countActive($session->clientId, $session);

    api_ok([
        // member_id is negative for pending buyers (tmp id in
        // draft_data.buyer_ops). The Step 4 UI treats it as an opaque
        // identifier — it can still be sent back to remove-buyer.php or
        // modify-buyer.php — and gets rewritten to the real positive id
        // by submit-application.php on Step 6 submit.
        'member_id'   => $memberId,
        'name'        => $name,
        'buyer_count' => $buyerCount,
    ]);
} catch (InvalidArgumentException $e) {
    api_error($e->getMessage(), 422, 'validation_error');
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'add_buyer_error');
}
