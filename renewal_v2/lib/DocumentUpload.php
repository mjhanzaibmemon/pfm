<?php
/**
 * PFM Renewal v2 — DocumentUpload
 *
 * Handles all file upload logic for the Documents step (Step 5).
 * Files are stored at:  storage/uploads/{session_id}/{uuid}.{ext}
 * Metadata is kept in   renewal_sessions.draft_data['documents']
 *
 * Design decisions:
 *  - Files go to disk, not DB blobs (no MEDIUMBLOB inflation in members table)
 *  - Each uploaded file gets a UUID-based name (no user-supplied filenames on disk)
 *  - MIME type validated from actual file content (finfo), not the browser header
 *  - Per-session directory keeps sessions isolated; easy to delete on cancel
 *  - draft_data is the single source of truth for which files belong to the session
 *
 * File keys (slot identifiers stored in draft_data):
 *  - 'business_license'       General org document
 *  - 'driver_lic_{member_id}' Driver's license for a specific buyer
 *  - 'doc_{n}'                Generic additional document (n = 1, 2, ...)
 *
 * Spec: Section 5 (Documents step), Section 11 (security/file handling)
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/RenewalSession.php';

class DocumentUpload
{
    // ===== CONSTANTS =====

    /** Allowed MIME types (validated from file content, not browser header) */
    private const ALLOWED_TYPES = [
        'application/pdf' => 'pdf',
        'image/jpeg'      => 'jpg',
        'image/png'       => 'png',
    ];

    /** Maximum single file size (bytes) — from config, but also enforced here */
    private const MAX_BYTES = PFM_RNW_MAX_FILE_SIZE;

    /** Maximum total files per session */
    private const MAX_FILES = PFM_RNW_MAX_FILES_PER_SESSION;

    /** Regex: valid document key format */
    private const KEY_PATTERN = '/^[a-z0-9_]{1,80}$/';

    // ===== UPLOAD =====

    /**
     * Process and store an uploaded file for a renewal session.
     *
     * $uploadedFile should be a single entry from $_FILES, e.g.:
     *   [
     *     'name'     => 'license.pdf',
     *     'type'     => 'application/pdf',   // browser-supplied — we re-check with finfo
     *     'tmp_name' => '/tmp/phpXXXXXX',
     *     'error'    => UPLOAD_ERR_OK,
     *     'size'     => 204800,
     *   ]
     *
     * $key is a slot identifier (e.g. 'business_license', 'driver_lic_6139').
     * Uploading to the same key again REPLACES the previous file for that slot.
     *
     * @param  RenewalSession $session
     * @param  array          $uploadedFile  Single $_FILES[...] entry
     * @param  string         $key           Slot identifier
     * @return array          File metadata record (also stored in draft_data)
     *
     * @throws RuntimeException       on session state or slot-count violation
     * @throws InvalidArgumentException on bad key format
     * @throws UploadException        on file validation failure (extends RuntimeException)
     */
    public static function store(
        RenewalSession $session,
        array $uploadedFile,
        string $key
    ): array {
        // Session must be editable
        if (!$session->isEditable()) {
            throw new RuntimeException(
                "Cannot upload: session {$session->id} is in state '{$session->status}'."
            );
        }

        // Validate key format
        if (!preg_match(self::KEY_PATTERN, $key)) {
            throw new InvalidArgumentException(
                "Invalid document key '{$key}'. Use lowercase letters, digits, underscores (max 80 chars)."
            );
        }

        // Check PHP upload error code
        self::assertNoUploadError($uploadedFile['error'] ?? UPLOAD_ERR_NO_FILE);

        // Validate file size (double-check — PHP ini should also enforce)
        $size = (int) ($uploadedFile['size'] ?? 0);
        if ($size <= 0) {
            throw new UploadException('Uploaded file is empty.', 'empty');
        }
        if ($size > self::MAX_BYTES) {
            $mb = round(self::MAX_BYTES / 1048576);
            throw new UploadException("File exceeds the {$mb} MB size limit.", 'too_large');
        }

        // Verify it's actually an uploaded file (not a path traversal attack)
        $tmpPath = (string) ($uploadedFile['tmp_name'] ?? '');
        if (!is_uploaded_file($tmpPath)) {
            throw new UploadException('Invalid upload source.', 'invalid_source');
        }

        // MIME type from actual file content (not browser header)
        $mime = self::detectMime($tmpPath);
        if (!isset(self::ALLOWED_TYPES[$mime])) {
            $allowed = implode(', ', array_keys(self::ALLOWED_TYPES));
            throw new UploadException(
                "File type not allowed. Accepted: {$allowed}.",
                'bad_type'
            );
        }

        $ext = self::ALLOWED_TYPES[$mime];

        // ─── Cap-check + filesystem op + metadata save ───
        // Lock the renewal_sessions row to serialise concurrent uploads for the
        // same session. This prevents two parallel uploads from both passing the
        // MAX_FILES cap check.
        return Db::transaction(function () use ($session, $key, $tmpPath, $mime, $size, $ext, $uploadedFile): array {

            Db::one(
                'SELECT id FROM renewal_sessions WHERE id = ? FOR UPDATE',
                [$session->id]
            );

            // Re-load draft inside the lock so we see the freshest document list
            $fresh = RenewalSession::loadById($session->id);
            if ($fresh === null) {
                throw new RuntimeException("Session {$session->id} no longer exists.");
            }
            $session->draftData = $fresh->draftData;  // sync caller's instance

            $existing  = self::getByKey($session, $key);
            $docs      = self::getAll($session);
            $isNewSlot = ($existing === null);

            // Replacement doesn't count toward the cap, only net-new slots do
            if ($isNewSlot && count($docs) >= self::MAX_FILES) {
                throw new RuntimeException(
                    'Cannot upload: session ' . $session->id . ' already has ' . count($docs)
                    . ' files (maximum is ' . self::MAX_FILES . ').'
                );
            }

            // Delete the prior file for this slot (replace semantics) AFTER cap check
            if ($existing !== null) {
                self::deleteFile($existing['stored_name'], $session->id);
            }

            // Ensure session upload directory exists
            $dir = self::sessionDir($session->id);
            if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
                throw new RuntimeException("Could not create upload directory for session {$session->id}.");
            }

            // Move to permanent location with UUID filename
            $storedName = self::generateFilename($ext);
            $destPath   = $dir . DIRECTORY_SEPARATOR . $storedName;

            if (!move_uploaded_file($tmpPath, $destPath)) {
                throw new RuntimeException('Could not save uploaded file to disk.');
            }

            // Sanitise original filename (display only — never used for path operations)
            $originalName = self::sanitiseOriginalName((string) ($uploadedFile['name'] ?? 'upload'));

            $record = [
                'key'           => $key,
                'stored_name'   => $storedName,
                'original_name' => $originalName,
                'mime_type'     => $mime,
                'size'          => $size,
                'uploaded_at'   => date('Y-m-d H:i:s'),
            ];

            // If the DB save fails, we still have an orphan file on disk —
            // that's acceptable: it's unreferenced and a future cleanup job
            // can sweep it. The alternative (deleting from disk first) risks
            // losing the file if the DB commits fail.
            self::saveRecord($session, $key, $record);

            $session->logChange(
                RenewalSession::CHANGE_DOCUMENT_CHANGED,
                null,
                $key,
                $existing['original_name'] ?? null,
                $originalName
            );

            return $record;
        });
    }

    // ===== DELETE =====

    /**
     * Remove a document from a session by its key.
     * Deletes the file from disk and removes the metadata from draft_data.
     *
     * @throws RuntimeException if session is not editable or key not found
     */
    public static function delete(RenewalSession $session, string $key): void
    {
        if (!$session->isEditable()) {
            throw new RuntimeException(
                "Cannot delete document: session {$session->id} is in state '{$session->status}'."
            );
        }

        $record = self::getByKey($session, $key);
        if ($record === null) {
            throw new RuntimeException(
                "No document with key '{$key}' in session {$session->id}."
            );
        }

        // Delete physical file
        self::deleteFile($record['stored_name'], $session->id);

        // Remove from draft_data
        self::removeRecord($session, $key);

        // Log change
        $session->logChange(
            RenewalSession::CHANGE_DOCUMENT_CHANGED,
            null,
            $key,
            $record['original_name'],
            null
        );
    }

    /**
     * Delete ALL uploaded files for a session (used when cancelling or cleaning up).
     * Removes the entire session upload directory.
     * Does NOT touch draft_data — caller should handle that separately.
     */
    public static function purgeAll(int $sessionId): void
    {
        $dir = self::sessionDir($sessionId);
        if (!is_dir($dir)) {
            return;
        }
        $files = glob($dir . DIRECTORY_SEPARATOR . '*') ?: [];
        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
        @rmdir($dir);
    }

    // ===== READ =====

    /**
     * Return all document metadata records for a session (from draft_data).
     *
     * @return array[]  Indexed by key
     */
    public static function getAll(RenewalSession $session): array
    {
        return $session->draftData['documents'] ?? [];
    }

    /**
     * Return a single document record by key, or null if not found.
     */
    public static function getByKey(RenewalSession $session, string $key): ?array
    {
        $docs = self::getAll($session);
        return $docs[$key] ?? null;
    }

    /**
     * Count how many files have been uploaded to this session.
     */
    public static function count(RenewalSession $session): int
    {
        return count(self::getAll($session));
    }

    /**
     * Return the absolute path to a stored file.
     * IMPORTANT: Never expose this path to the browser — serve via a controlled script.
     *
     * @throws RuntimeException if the key doesn't exist or file is missing from disk
     */
    public static function getAbsolutePath(RenewalSession $session, string $key): string
    {
        $record = self::getByKey($session, $key);
        if ($record === null) {
            throw new RuntimeException(
                "No document with key '{$key}' in session {$session->id}."
            );
        }

        $path = self::sessionDir($session->id) . DIRECTORY_SEPARATOR . $record['stored_name'];

        if (!is_file($path)) {
            throw new RuntimeException(
                "File for key '{$key}' is missing from disk (stored_name: {$record['stored_name']})."
            );
        }

        return $path;
    }

    // ===== PRIVATE HELPERS =====

    /**
     * Detect MIME type from actual file content using PHP's finfo extension.
     */
    private static function detectMime(string $path): string
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime  = $finfo->file($path);
        if ($mime === false) {
            throw new UploadException('Could not determine file type.', 'mime_detect_failed');
        }
        // Normalise 'image/jpg' → 'image/jpeg'
        return $mime === 'image/jpg' ? 'image/jpeg' : $mime;
    }

    /**
     * Translate PHP UPLOAD_ERR_* code to a human-friendly UploadException.
     */
    private static function assertNoUploadError(int $errorCode): void
    {
        switch ($errorCode) {
            case UPLOAD_ERR_OK:
                return;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new UploadException('File exceeds the size limit.', 'too_large');
            case UPLOAD_ERR_PARTIAL:
                throw new UploadException('File was only partially uploaded.', 'partial');
            case UPLOAD_ERR_NO_FILE:
                throw new UploadException('No file was submitted.', 'no_file');
            case UPLOAD_ERR_NO_TMP_DIR:
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                throw new UploadException('Server upload error. Please try again.', 'server_error');
            default:
                throw new UploadException('Unknown upload error.', 'unknown');
        }
    }

    /**
     * Generate a cryptographically-random UUID v4 filename with the given extension.
     * E.g.: "a3f2c1d4-8b9e-4f2a-b1c3-d5e6f7a8b9c0.pdf"
     *
     * Uses random_bytes() (CSPRNG) instead of mt_rand() so filenames cannot be
     * guessed/predicted by an attacker. This is defence-in-depth — even if the
     * per-session access control ever has a flaw, attackers still can't probe
     * for other customers' uploaded documents by guessing UUIDs.
     */
    private static function generateFilename(string $ext): string
    {
        $bytes = random_bytes(16);
        // Set version (4) and variant (RFC 4122) bits per UUID v4 spec
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
        $hex  = bin2hex($bytes);
        $uuid = sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20, 12)
        );
        return $uuid . '.' . $ext;
    }

    /**
     * Return the upload directory path for a session.
     * Guaranteed to be under PFM_RNW_UPLOADS_DIR — no traversal possible.
     */
    private static function sessionDir(int $sessionId): string
    {
        return PFM_RNW_UPLOADS_DIR . DIRECTORY_SEPARATOR . $sessionId;
    }

    /**
     * Delete a physical file by stored_name within a session directory.
     * Silent no-op if the file doesn't exist.
     */
    private static function deleteFile(string $storedName, int $sessionId): void
    {
        // Stored names are UUID-generated — only allow safe characters
        if (!preg_match('/^[a-f0-9\-]+\.(pdf|jpg|png)$/', $storedName)) {
            return; // malformed name — skip silently
        }
        $path = self::sessionDir($sessionId) . DIRECTORY_SEPARATOR . $storedName;
        if (is_file($path)) {
            @unlink($path);
        }
    }

    /**
     * Strip path characters and limit length for the original display name.
     */
    private static function sanitiseOriginalName(string $name): string
    {
        // Keep only the base filename (no path traversal)
        $name = basename($name);
        // Strip null bytes and control characters
        $name = preg_replace('/[\x00-\x1f\x7f]/', '', $name);
        // Limit to 255 chars
        return substr($name ?: 'upload', 0, 255);
    }

    /**
     * Write (or overwrite) a document record into session draft_data['documents'].
     * Persists to DB immediately.
     */
    private static function saveRecord(RenewalSession $session, string $key, array $record): void
    {
        $docs       = $session->draftData['documents'] ?? [];
        $docs[$key] = $record;
        $session->saveDraft(['documents' => $docs]);
    }

    /**
     * Remove a document record from session draft_data['documents'].
     * Persists to DB immediately.
     */
    private static function removeRecord(RenewalSession $session, string $key): void
    {
        $docs = $session->draftData['documents'] ?? [];
        unset($docs[$key]);
        $session->saveDraft(['documents' => $docs]);
    }
}

/**
 * Thrown for user-facing upload validation failures.
 * Has a machine-readable $code alongside the human message.
 */
class UploadException extends RuntimeException
{
    public string $uploadCode;

    public function __construct(string $message, string $uploadCode, int $httpCode = 422)
    {
        parent::__construct($message, $httpCode);
        $this->uploadCode = $uploadCode;
    }
}
