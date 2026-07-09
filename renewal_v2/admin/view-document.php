<?php
/**
 * Admin endpoint — stream an uploaded renewal document to the staff
 * member reviewing the renewal.
 *
 * URL: /renewal_v2/admin/view-document.php?token={admin_review_token}&key={doc_key}
 *
 * Why this file exists:
 *   Larissa's Phase 6 round-1 QA video (2026-06-11) flagged that staff
 *   couldn't verify uploaded documents before clicking Confirm Receipt
 *   ("I can't go in and I need to before I prove it, I need to be able
 *    to go in and see that their documentation is correct"). The
 *   review page now lists every uploaded document with a View link
 *   pointing here, so staff can open the ID, Business Registry, and
 *   any additional documents in a new tab before approving.
 *
 * Auth model:
 *   Same pattern as admin/review.php — the admin_review_token in the
 *   URL is the auth. It's a 32-char hex string tied to a specific
 *   renewal_sessions row (generated when the customer reaches Step 7).
 *   Without the right token, the request is rejected.
 *
 * Output:
 *   Streams the file body with Content-Type from the stored mime_type
 *   and Content-Disposition: inline (so browsers display PDF / image
 *   in-place rather than forcing a download). Cache-Control: private,
 *   no-store to keep upload contents out of any intermediate cache.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/Db.php';
require_once __DIR__ . '/../lib/RenewalSession.php';
require_once __DIR__ . '/../lib/DocumentUpload.php';

// ── 1. Pull + sanitise inputs ─────────────────────────────────────
$adminToken = trim((string) ($_GET['token'] ?? ''));
$docKey     = trim((string) ($_GET['key']   ?? ''));

if ($adminToken === '' || $docKey === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: token and key are required.';
    exit;
}

// Key format mirrors the validation in DocumentUpload::store() — fail
// fast on anything that wouldn't pass the upload-side check.
if (!preg_match('/^[a-z0-9_]{1,80}$/', $docKey)) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: invalid document key format.';
    exit;
}

// ── 2. Load session by admin review token ─────────────────────────
$session = RenewalSession::loadByAdminToken($adminToken);
if ($session === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: no renewal session matches that admin token.';
    exit;
}

// ── 3a. Legacy carry-over shortcut ─────────────────────────────────
// Special key 'legacy_main_contact_id' streams the raw BLOB from
// clients.main_contact_img_id — the wizard's Bug 2 fallback (Step 3 /
// 5 / 6) recognises this on-file image, but until Larissa's Round 5
// item 1 (2026-07-08) admin review had no way to open it, so staff
// couldn't visually verify the ID against the customer's registration
// before Confirm Receipt. Same admin-token auth as the disk path.
if ($docKey === 'legacy_main_contact_id') {
    $row = Db::one(
        'SELECT main_contact_img_id, main_contact_img_file, main_contact_img_size
           FROM clients
          WHERE client_id = ?
            AND main_contact_img_id IS NOT NULL
            AND OCTET_LENGTH(main_contact_img_id) > 0',
        [$session->clientId]
    );
    if ($row === null) {
        http_response_code(404);
        header('Content-Type: text/plain; charset=utf-8');
        echo 'Not found: no legacy Main Contact ID on file for this client.';
        exit;
    }

    $blob = (string) $row['main_contact_img_id'];
    $safeName = (string) ($row['main_contact_img_file'] ?? '');
    $safeName = preg_replace('/[\r\n"\\\\]+/', '', $safeName);
    if ($safeName === '' || $safeName === null) {
        $safeName = 'main-contact-id';
    }

    // Legacy admin never stored a MIME column — detect from magic bytes.
    $mime = 'application/octet-stream';
    if (function_exists('finfo_buffer')) {
        $fi = finfo_open(FILEINFO_MIME_TYPE);
        if ($fi) {
            $detected = finfo_buffer($fi, $blob);
            finfo_close($fi);
            if (is_string($detected) && $detected !== '') {
                $mime = $detected;
            }
        }
    }

    header('Content-Type: ' . $mime);
    header('Content-Length: ' . strlen($blob));
    header('Content-Disposition: inline; filename="' . $safeName . '"');
    header('Cache-Control: private, no-store');
    header('X-Content-Type-Options: nosniff');
    echo $blob;
    exit;
}

// ── 3. Find the document record + on-disk path ────────────────────
$record = DocumentUpload::getByKey($session, $docKey);
if ($record === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: no document for that key on this renewal.';
    exit;
}

try {
    $absPath = DocumentUpload::getAbsolutePath($session, $docKey);
} catch (Throwable $e) {
    error_log(sprintf(
        '[renewal_v2] view-document path lookup failed for session %d, key %s: %s',
        $session->id, $docKey, $e->getMessage()
    ));
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Server error: could not locate the document on disk.';
    exit;
}

if (!is_file($absPath) || !is_readable($absPath)) {
    error_log(sprintf(
        '[renewal_v2] view-document file missing on disk: session %d, key %s, path %s',
        $session->id, $docKey, $absPath
    ));
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: the file is missing from storage. Contact the dev team.';
    exit;
}

// ── 4. Stream it ──────────────────────────────────────────────────
$mime = (string) ($record['mime_type'] ?? 'application/octet-stream');
$size = (int) ($record['size'] ?? filesize($absPath));
$name = (string) ($record['original_name'] ?? 'document');

// Strip any control / quote characters from the filename for a safe header.
$safeName = preg_replace('/[\r\n"\\\\]+/', '', $name);
if ($safeName === '' || $safeName === null) {
    $safeName = 'document';
}

header('Content-Type: ' . $mime);
header('Content-Length: ' . $size);
header('Content-Disposition: inline; filename="' . $safeName . '"');
header('Cache-Control: private, no-store');
header('X-Content-Type-Options: nosniff');

// Output in chunks so very large files don't blow PHP's memory limit.
$fh = fopen($absPath, 'rb');
if ($fh === false) {
    http_response_code(500);
    exit;
}
while (!feof($fh)) {
    echo fread($fh, 65536);
}
fclose($fh);
