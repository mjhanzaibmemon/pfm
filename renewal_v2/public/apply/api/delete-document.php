<?php
/**
 * POST /renewal_v2/public/apply/api/delete-document.php
 *
 * Sibling to public/api/delete-document.php, swapped to NewApplication
 * / ApplicationDocumentUpload.
 *
 * Request (POST): key string — document slot key to delete
 * Response: { success: true, data: { key, file_count } }
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationDocumentUpload.php';

api_require_method('POST');
api_require_csrf();

$application = api_require_application();
api_require_draft($application);

$key = api_required_post('key');

try {
    ApplicationDocumentUpload::delete($application, $key);

    api_ok([
        'key'        => $key,
        'file_count' => ApplicationDocumentUpload::count($application),
    ]);
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'delete_error');
}
