<?php
/**
 * POST /api/remove-buyer.php
 *
 * Soft-remove a buyer from the client (sets include = 0).
 * Cannot remove the main contact.
 *
 * Request (POST):
 *   member_id  int  ID of buyer to remove (required)
 *
 * Response:
 *   { success: true, data: { member_id: 12345, buyer_count: 3 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

$memberId = api_required_int('member_id');

try {
    BuyerManager::remove($session, $memberId);
    $buyerCount = BuyerManager::countActive($session->clientId);

    api_ok([
        'member_id'   => $memberId,
        'buyer_count' => $buyerCount,
    ]);
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'remove_buyer_error');
}
