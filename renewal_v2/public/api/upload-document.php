<?php
/**
 * POST /api/upload-document.php
 *
 * Upload a document file for the renewal.
 * Files are saved to storage/uploads/{session_id}/{uuid}.ext
 *
 * Request (multipart/form-data POST):
 *   file  file    The uploaded file ($_FILES['file'])
 *   key   string  Document slot key, e.g. 'business_license' or 'driver_lic_6139'
 *
 * Response:
 *   {
 *     success: true,
 *     data: {
 *       key: "business_license",
 *       original_name: "license.pdf",
 *       mime_type: "application/pdf",
 *       size: 204800,
 *       file_count: 3
 *     }
 *   }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

// Note: no api_require_method('POST') — multipart POST is still POST, but
// the Content-Type check would differ. Just confirm it's POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    api_error('Method not allowed.', 405);
}
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

// Validate key
$key = trim((string) ($_POST['key'] ?? ''));
if ($key === '') {
    api_error('Missing required field: key.', 400, 'missing_key');
}

// Validate file input
if (!isset($_FILES['file']) || !is_array($_FILES['file'])) {
    api_error('No file uploaded.', 400, 'no_file');
}

$uploadedFile = $_FILES['file'];

try {
    $record = DocumentUpload::store($session, $uploadedFile, $key);

    api_ok([
        'key'           => $record['key'],
        'original_name' => $record['original_name'],
        'mime_type'     => $record['mime_type'],
        'size'          => $record['size'],
        'file_count'    => DocumentUpload::count($session),
    ]);
} catch (UploadException $e) {
    api_error($e->getMessage(), 422, $e->uploadCode);
} catch (InvalidArgumentException $e) {
    api_error($e->getMessage(), 400, 'invalid_key');
} catch (RuntimeException $e) {
    api_error($e->getMessage(), 400, 'upload_error');
}
