<?php
/**
 * Customer-side view endpoint — lets the customer open one of their
 * own uploaded files (or a legacy ID we already had on file) in a
 * new tab during the renewal wizard.
 *
 * URL: /renewal_v2/public/api/view-document.php?token={renewal_token}&key={doc_key}
 *
 * Why this exists:
 *   User's 2026-06-17 manual test feedback: "driver license or photo
 *   id ... wo client kai pass view ho takai usko pata chley kai
 *   usnai konsi photo id ya driver license dala wa hai ... step 5
 *   me bhi viwe ka option do takai jo bhi usnai pehlai upload kia
 *   hai wo bhi view krskatai ho bussiness registry bhi upload krey
 *   to viwe krskai." The customer needs to know which file is
 *   currently on file so they can decide whether to replace it.
 *
 * Three doc-key cases handled here:
 *
 *   - 'legacy_main_contact_id'
 *       Streams the BLOB stored at clients.main_contact_img_id —
 *       the ID the existing PFM admin form has been writing for
 *       years. There's no on-disk path for it; we read the bytes
 *       straight from the table.
 *
 *   - 'main_contact_id', 'business_license', 'additional_docs_*'
 *       Wizard-side uploads. Streams via DocumentUpload's existing
 *       getAbsolutePath() helper — same code path the admin view
 *       endpoint uses.
 *
 * Auth model:
 *   The renewal session token (the ?token= value the customer is
 *   already carrying on every wizard URL) identifies WHICH session
 *   we should serve files from. Sessions only resolve while
 *   sec_renewals.applied is NULL, so once staff click Confirm
 *   Receipt the customer naturally can't pull files anymore — at
 *   that point the admin view endpoint owns access.
 *
 *   We also explicitly bail if the session is in a "completed" or
 *   "cancelled" state, defence-in-depth: even if token validation
 *   somehow let a stale token through, the response would just be
 *   "this renewal isn't open anymore."
 */

declare(strict_types=1);

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../lib/Db.php';
require_once __DIR__ . '/../../lib/RenewalSession.php';
require_once __DIR__ . '/../../lib/DocumentUpload.php';

// ── 1. Inputs ─────────────────────────────────────────────────────
$token  = trim((string) ($_GET['token'] ?? ''));
$docKey = trim((string) ($_GET['key']   ?? ''));

if ($token === '' || $docKey === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: token and key are required.';
    exit;
}

// Key format mirrors the regex DocumentUpload::store() validates
// against, plus the special legacy key that uses the same shape.
if (!preg_match('/^[a-z0-9_]{1,80}$/', $docKey)) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bad request: invalid document key format.';
    exit;
}

// ── 2. Load session by renewal token ──────────────────────────────
$session = RenewalSession::loadByToken($token);
if ($session === null) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: no renewal session matches that token.';
    exit;
}

if (in_array($session->status, [
    RenewalSession::STATUS_COMPLETED,
    RenewalSession::STATUS_CANCELLED,
], true)) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'This renewal is no longer open. Contact PFM if you need a copy of your documents.';
    exit;
}

// ── 3. Special case — legacy ID from clients.main_contact_img_id ──
if ($docKey === 'legacy_main_contact_id') {
    streamLegacyId($session);
    exit;
}

// ── 4. Wizard-side upload via DocumentUpload ──────────────────────
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
        '[renewal_v2] customer view-document path lookup failed for '
        . 'session %d, key %s: %s',
        $session->id, $docKey, $e->getMessage()
    ));
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Server error: could not locate the document on disk.';
    exit;
}

if (!is_file($absPath) || !is_readable($absPath)) {
    error_log(sprintf(
        '[renewal_v2] customer view-document file missing on disk: session %d, key %s, path %s',
        $session->id, $docKey, $absPath
    ));
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not found: the file is missing from storage. Please re-upload.';
    exit;
}

$mime = (string) ($record['mime_type'] ?? 'application/octet-stream');
$size = (int)    ($record['size']      ?? filesize($absPath));
$name = (string) ($record['original_name'] ?? 'document');

emitHeaders($mime, $size, $name);

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


// ─────────────────────────────────────────────────────────────────
// helpers
// ─────────────────────────────────────────────────────────────────

/**
 * Stream the customer's legacy ID image straight from
 * clients.main_contact_img_id (a BLOB the existing PFM admin form
 * writes). No on-disk path here — the bytes live in the row itself.
 */
function streamLegacyId(RenewalSession $session): void
{
    $row = Db::one(
        'SELECT main_contact_img_id, main_contact_img_file, main_contact_img_size
           FROM clients WHERE client_id = ?',
        [$session->clientId]
    );

    if ($row === null
        || empty($row['main_contact_img_id'])
        || empty($row['main_contact_img_file'])) {
        http_response_code(404);
        header('Content-Type: text/plain; charset=utf-8');
        echo 'No ID is currently on file for this membership.';
        return;
    }

    $bytes = (string) $row['main_contact_img_id'];
    $name  = (string) $row['main_contact_img_file'];
    $size  = (int) ($row['main_contact_img_size'] ?? strlen($bytes));

    // Try to detect a more accurate MIME type than the generic
    // octet-stream by sniffing the byte content. finfo is available
    // on every PHP build PFM uses; fall back to extension-based
    // mapping if it isn't.
    $mime = 'application/octet-stream';
    if (class_exists('finfo')) {
        $f = new finfo(FILEINFO_MIME_TYPE);
        $detected = $f->buffer($bytes);
        if (is_string($detected) && $detected !== '') {
            $mime = $detected;
        }
    } else {
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $mime = match ($ext) {
            'pdf'        => 'application/pdf',
            'png'        => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif'        => 'image/gif',
            default      => 'application/octet-stream',
        };
    }

    emitHeaders($mime, $size, $name);
    echo $bytes;
}

/**
 * Common response headers for an inline document stream — same
 * pattern the admin view endpoint uses: serve as inline so PDFs
 * and images render in the browser tab instead of forcing a
 * download, with strict no-cache.
 */
function emitHeaders(string $mime, int $size, string $name): void
{
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
}
