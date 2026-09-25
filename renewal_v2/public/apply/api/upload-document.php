<?php
/**
 * POST /renewal_v2/public/apply/api/upload-document.php
 *
 * Sibling to public/api/upload-document.php, swapped to NewApplication
 * / ApplicationDocumentUpload. Same request/response contract.
 *
 * Request (multipart/form-data POST):
 *   file  file    The uploaded file ($_FILES['file'])
 *   key   string  Document slot key, e.g. 'main_contact_id', 'business_license'
 *
 * Response:
 *   { success: true, data: { key, original_name, mime_type, size, file_count } }
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationDocumentUpload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    api_error('Method not allowed.', 405);
}
api_require_csrf();

$application = api_require_application();
api_require_draft($application);

$key = trim((string) ($_POST['key'] ?? ''));
if ($key === '') {
    api_error('Missing required field: key.', 400, 'missing_key');
}

if (!isset($_FILES['file']) || !is_array($_FILES['file'])) {
    api_error('No file uploaded.', 400, 'no_file');
}

$uploadedFile = $_FILES['file'];

try {
    $record = ApplicationDocumentUpload::store($application, $uploadedFile, $key);

    api_ok([
        'key'           => $record['key'],
        'original_name' => $record['original_name'],
        'mime_type'     => $record['mime_type'],
        'size'          => $record['size'],
        'file_count'    => ApplicationDocumentUpload::count($application),
    ]);
} catch (ApplicationUploadException $e) {
    api_error($e->getMessage(), 422, $e->uploadCode);
} catch (InvalidArgumentException $e) {
    api_error($e->getMessage(), 400, 'invalid_key');
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'upload_error');
}
