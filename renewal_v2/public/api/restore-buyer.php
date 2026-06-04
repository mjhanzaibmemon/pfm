<?php
/**
 * POST /api/restore-buyer.php
 *
 * Re-include a previously soft-removed buyer (counterpart to remove-buyer.php).
 * Enforces the same 50-buyer cap (race-protected in BuyerManager::restore).
 *
 * Request (POST):
 *   member_id  int  ID of buyer to restore (required)
 *
 * Response:
 *   { success: true, data: { member_id: 12345, buyer_count: 4 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

$memberId = api_required_int('member_id');

try {
    BuyerManager::restore($session, $memberId);
    $buyerCount = BuyerManager::countActive($session->clientId);

    api_ok([
        'member_id'   => $memberId,
        'buyer_count' => $buyerCount,
    ]);
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'restore_buyer_error');
}
