<?php
/**
 * Applicant-side view endpoint — lets the applicant open one of their
 * own uploaded files in a new tab during the application wizard.
 * Sibling to public/api/view-document.php, but simpler: there is no
 * "legacy" BLOB case (no existing clients row to have one), so this
 * only ever serves wizard-side uploads via ApplicationDocumentUpload.
 *
 * URL: /renewal_v2/public/apply/api/view-document.php?token={application_token}&key={doc_key}
 *
 * Auth model: the application token in the URL (the same one on every
 * wizard step URL) identifies which application to serve files from.
 * Explicitly bails if the application is completed/cancelled/declined
 * — defence-in-depth matching the renewal wizard's equivalent gate.
 */

declare(strict_types=1);

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../lib/Db.php';
require_once __DIR__ . '/../../../lib/NewApplication.php';
require_once __DIR__ . '/../../../lib/ApplicationDocumentUpload.php';

$token  = trim((string) ($_GET['token'] ?? ''));
$docKey = trim((string) ($_GET['key']   ?? ''));

if ($token === '' || $docKey === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: token and key are required.';
    exit;
}

if (!preg_match('/^[a-z0-9_]{1,80}$/', $docKey)) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: invalid document key format.';
    exit;
}

$application = NewApplication::loadByToken($token);
if ($application === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: no application matches that token.';
    exit;
}

if (in_array($application->status, [
    NewApplication::STATUS_COMPLETED,
    NewApplication::STATUS_CANCELLED,
    NewApplication::STATUS_DECLINED,
], true)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'This application is no longer open. Contact PFM if you need a copy of your documents.';
    exit;
}

$record = ApplicationDocumentUpload::getByKey($application, $docKey);
if ($record === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: no document for that key on this application.';
    exit;
}

try {
    $absPath = ApplicationDocumentUpload::getAbsolutePath($application, $docKey);
} catch (Throwable $e) {
    error_log(sprintf(
        '[new_application] applicant view-document path lookup failed for '
        . 'application %d, key %s: %s',
        $application->id, $docKey, $e->getMessage()
    ));
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Server error: could not locate the document on disk.';
    exit;
}

if (!is_file($absPath) || !is_readable($absPath)) {
    error_log(sprintf(
        '[new_application] applicant view-document file missing on disk: application %d, key %s, path %s',
        $application->id, $docKey, $absPath
    ));
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: the file is missing from storage. Please re-upload.';
    exit;
}

$mime = (string) ($record['mime_type'] ?? 'application/octet-stream');
$size = (int)    ($record['size']      ?? filesize($absPath));
$name = (string) ($record['original_name'] ?? 'document');

$safeName = preg_replace('/[\r\n"\\\\]+/', '', $name);
if ($safeName === '' || $safeName === null) {
    $safeName = 'document';
}
header('Content-Type: ' . $mime);
if ($size > 0) {
    header('Content-Length: ' . $size);
}
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
exit;
