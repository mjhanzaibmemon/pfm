<?php
/**
 * Admin endpoint — stream a document uploaded with a NEW-CUSTOMER
 * application to the staff member reviewing it.
 *
 * URL: /renewal_v2/admin/view-application-document.php?token={admin_review_token}&key={doc_key}
 *
 * Sibling to admin/view-document.php (renewals). Same auth model — the
 * per-application admin_review_token in the URL — and same streaming
 * behaviour, but reads the application's own upload folder via
 * ApplicationDocumentUpload. Works for every status once the application
 * has an admin review token (including completed/declined ones, so staff
 * can still open the originals after approval — the files are never
 * deleted).
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/NewApplication.php';
require_once __DIR__ . '/../lib/ApplicationDocumentUpload.php';

function pfm_doc_fail(int $code, string $msg): never
{
    http_response_code($code);
    header('Content-Type: text/plain; charset=utf-8');
    echo $msg;
    exit;
}

$adminToken = trim((string) ($_GET['token'] ?? ''));
$docKey     = trim((string) ($_GET['key']   ?? ''));

if ($adminToken === '' || $docKey === '') {
    pfm_doc_fail(400, 'Bad request: token and key are required.');
}
if (!preg_match('/^[a-z0-9_]{1,80}$/', $docKey)) {
    pfm_doc_fail(400, 'Bad request: invalid document key format.');
}

$application = NewApplication::loadByAdminToken($adminToken);
if ($application === null) {
    pfm_doc_fail(404, 'Not found: no application matches that admin token.');
}

$record = ApplicationDocumentUpload::getByKey($application, $docKey);
if ($record === null) {
    pfm_doc_fail(404, 'Not found: no document for that key on this application.');
}

try {
    $absPath = ApplicationDocumentUpload::getAbsolutePath($application, $docKey);
} catch (Throwable $e) {
    error_log(sprintf(
        '[new_application] admin view-document path lookup failed for application %d, key %s: %s',
        $application->id, $docKey, $e->getMessage()
    ));
    pfm_doc_fail(500, 'Server error: could not locate the document on disk.');
}

if (!is_file($absPath) || !is_readable($absPath)) {
    error_log(sprintf(
        '[new_application] admin view-document file missing: application %d, key %s, path %s',
        $application->id, $docKey, $absPath
    ));
    pfm_doc_fail(404, 'Not found: the file is missing from storage. Contact the dev team.');
}

$mime = (string) ($record['mime_type'] ?? 'application/octet-stream');
$size = (int) ($record['size'] ?? filesize($absPath));
$name = (string) ($record['original_name'] ?? 'document');

$safeName = preg_replace('/[\r\n"\\\\]+/', '', $name);
if ($safeName === '' || $safeName === null) {
    $safeName = 'document';
}

header('Content-Type: ' . $mime);
header('Content-Length: ' . $size);
header('Content-Disposition: inline; filename="' . $safeName . '"');
header('Cache-Control: private, no-store');
header('X-Content-Type-Options: nosniff');

$fh = fopen($absPath, 'rb');
if ($fh === false) {
    http_response_code(500);
    exit;
}
while (!feof($fh)) {
    echo fread($fh, 65536);
}
fclose($fh);
