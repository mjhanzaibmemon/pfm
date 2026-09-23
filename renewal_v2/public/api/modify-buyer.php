<?php
/**
 * POST /api/modify-buyer.php
 *
 * Edit one or more fields on an existing buyer.
 * Only whitelisted fields: member_name, email, phone1, note.
 *
 * Request (POST):
 *   member_id  int     ID of buyer to modify (required)
 *   fields     string  JSON object of field => new_value pairs (required)
 *              e.g. '{"member_name":"Jane Smith","email":"jane@example.com"}'
 *
 * Response:
 *   { success: true, data: { member_id: 12345 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

$memberId  = api_required_int('member_id');
$rawFields = api_required_post('fields');

$fields = json_decode($rawFields, true);
if (!is_array($fields)) {
    api_error('fields must be a valid JSON object.', 400, 'invalid_json');
}

try {
    BuyerManager::modify($session, $memberId, $fields);

    api_ok(['member_id' => $memberId]);
} catch (InvalidArgumentException $e) {
    api_error($e->getMessage(), 422, 'validation_error');
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'modify_buyer_error');
}
