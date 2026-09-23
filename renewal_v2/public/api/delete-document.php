<?php
/**
 * POST /api/delete-document.php
 *
 * Remove an uploaded document from the session.
 * Deletes the file from disk and removes its metadata from draft_data.
 *
 * Request (POST):
 *   key  string  Document slot key to delete (e.g. 'business_license')
 *
 * Response:
 *   { success: true, data: { key: "business_license", file_count: 2 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

$key = api_required_post('key');

try {
    DocumentUpload::delete($session, $key);

    api_ok([
        'key'        => $key,
        'file_count' => DocumentUpload::count($session),
    ]);
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'delete_error');
}
