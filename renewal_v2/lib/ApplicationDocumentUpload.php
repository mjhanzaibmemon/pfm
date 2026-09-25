<?php
/**
 * PFM Renewal v2 — ApplicationDocumentUpload
 *
 * Sibling to lib/DocumentUpload.php (the renewal wizard's file-upload
 * handler), swapped to NewApplication. Design reference:
 * NEW_CUSTOMER_APPLICATION_SPEC.md Section 13 at the project root.
 *
 * Why a full sibling file rather than widening DocumentUpload.php's
 * type hints: DocumentUpload's store()/delete() methods are internally
 * hard-coupled to RenewalSession in ways deeper than a type hint —
 * they lock the literal `renewal_sessions` table row
 * (`SELECT id FROM renewal_sessions WHERE id = ? FOR UPDATE`), reload
 * via `RenewalSession::loadById()`, and call `$session->logChange(...)`
 * (a method NewApplication deliberately does not have — Section
 * 13.2's rationale: there is no "before" state to diff against for a
 * brand-new application, so no change-log concept applies). Branching
 * all of that inside the one shared file would mean editing
 * security-sensitive, already-shipped file-upload code (path safety,
 * MIME sniffing, transaction locking) purely to serve a second caller
 * — more risk to the live renewal flow than the ~250 lines this
 * duplicates are worth. Matches the same call made for
 * NewApplication.php itself and apply_api_bootstrap.php.
 *
 * CRITICAL DIFFERENCE FROM DocumentUpload.php — storage path prefix:
 * `renewal_sessions.id` and `new_applications.id` are BOTH independent
 * auto-increment sequences starting at 1. DocumentUpload.php stores
 * files at storage/uploads/{session_id}/ using the bare integer — if
 * this file used the same scheme, a new application with id=5 would
 * write into the SAME directory as an unrelated renewal session with
 * id=5, silently mixing two different customers' uploaded documents
 * together. sessionDir() below prefixes with "app_" specifically to
 * make collision impossible. Caught during design, before any file was
 * ever written under the unprefixed scheme — if this class is ever
 * refactored, this prefix must not be dropped.
 *
 * File keys (slot identifiers stored in draft_data['documents']):
 *  - 'main_contact_id'   Driver's license / photo ID for the main contact
 *  - 'business_license'  Business Registry / Secretary of State document
 *  - 'doc_{n}'           Generic additional document (n = 1, 2, ...)
 *    (same key shape as the renewal wizard's DocumentUpload, so the
 *    eventual approval workflow — Section 13.8 — can reuse the exact
 *    same client_docs / legacy-BLOB copy logic confirm-receipt.php
 *    already has, just pointed at a freshly-created client_id instead
 *    of an existing one)
 */

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/NewApplication.php';

class ApplicationDocumentUpload
{
    // ===== CONSTANTS (identical rules to DocumentUpload.php) =====

    private const ALLOWED_TYPES = [
        'application/pdf' => 'pdf',
        'image/jpeg'      => 'jpg',
        'image/png'       => 'png',
    ];

    private const MAX_BYTES = PFM_RNW_MAX_FILE_SIZE;
    private const MAX_FILES = PFM_RNW_MAX_FILES_PER_SESSION;
    private const KEY_PATTERN = '/^[a-z0-9_]{1,80}$/';

    // ===== UPLOAD =====

    /**
     * Process and store an uploaded file for a new-customer application.
     * Same contract as DocumentUpload::store() — see that file's doc
     * comment for the $uploadedFile shape. Uploading to the same $key
     * again REPLACES the previous file for that slot.
     *
     * @throws RuntimeException          on application state / slot-count violation
     * @throws InvalidArgumentException  on bad key format
     * @throws ApplicationUploadException on file validation failure
     */
    public static function store(
        NewApplication $application,
        array $uploadedFile,
        string $key
    ): array {
        if (!$application->isEditable()) {
            throw new RuntimeException(
                "Cannot upload: application {$application->id} is in state '{$application->status}'."
            );
        }

        if (!preg_match(self::KEY_PATTERN, $key)) {
            throw new InvalidArgumentException(
                "Invalid document key '{$key}'. Use lowercase letters, digits, underscores (max 80 chars)."
            );
        }

        self::assertNoUploadError($uploadedFile['error'] ?? UPLOAD_ERR_NO_FILE);

        $size = (int) ($uploadedFile['size'] ?? 0);
        if ($size <= 0) {
            throw new ApplicationUploadException('Uploaded file is empty.', 'empty');
        }
        if ($size > self::MAX_BYTES) {
            $mb = round(self::MAX_BYTES / 1048576);
            throw new ApplicationUploadException("File exceeds the {$mb} MB size limit.", 'too_large');
        }

        $tmpPath = (string) ($uploadedFile['tmp_name'] ?? '');
        if (!is_uploaded_file($tmpPath)) {
            throw new ApplicationUploadException('Invalid upload source.', 'invalid_source');
        }

        $mime = self::detectMime($tmpPath);
        if (!isset(self::ALLOWED_TYPES[$mime])) {
            $allowed = implode(', ', array_keys(self::ALLOWED_TYPES));
            throw new ApplicationUploadException(
                "File type not allowed. Accepted: {$allowed}.",
                'bad_type'
            );
        }

        $ext = self::ALLOWED_TYPES[$mime];

        // Lock the new_applications row to serialise concurrent uploads
        // for the same application — same rationale as DocumentUpload's
        // renewal_sessions lock, just on the correct table.
        return Db::transaction(function () use ($application, $key, $tmpPath, $mime, $size, $ext, $uploadedFile): array {

            Db::one(
                'SELECT id FROM new_applications WHERE id = ? FOR UPDATE',
                [$application->id]
            );

            $fresh = NewApplication::loadById($application->id);
            if ($fresh === null) {
                throw new RuntimeException("Application {$application->id} no longer exists.");
            }
            $application->draftData = $fresh->draftData;

            $existing  = self::getByKey($application, $key);
            $docs      = self::getAll($application);
            $isNewSlot = ($existing === null);

            if ($isNewSlot && count($docs) >= self::MAX_FILES) {
                throw new RuntimeException(
                    'Cannot upload: application ' . $application->id . ' already has ' . count($docs)
                    . ' files (maximum is ' . self::MAX_FILES . ').'
                );
            }

            if ($existing !== null) {
                self::deleteFile($existing['stored_name'], $application->id);
            }

            $dir = self::applicationDir($application->id);
            if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
                throw new RuntimeException("Could not create upload directory for application {$application->id}.");
            }

            $storedName = self::generateFilename($ext);
            $destPath   = $dir . DIRECTORY_SEPARATOR . $storedName;

            if (!move_uploaded_file($tmpPath, $destPath)) {
                throw new RuntimeException('Could not save uploaded file to disk.');
            }

            $originalName = self::sanitiseOriginalName((string) ($uploadedFile['name'] ?? 'upload'));

            $record = [
                'key'           => $key,
                'stored_name'   => $storedName,
                'original_name' => $originalName,
                'mime_type'     => $mime,
                'size'          => $size,
                'uploaded_at'   => date('Y-m-d H:i:s'),
            ];

            // No logChange() call here — NewApplication has no change-log
            // concept (Section 13.2). draft_data itself is the record.
            self::saveRecord($application, $key, $record);

            return $record;
        });
    }

    // ===== DELETE =====

    /**
     * Remove a document from an application by its key.
     *
     * @throws RuntimeException if application is not editable or key not found
     */
    public static function delete(NewApplication $application, string $key): void
    {
        if (!$application->isEditable()) {
            throw new RuntimeException(
                "Cannot delete document: application {$application->id} is in state '{$application->status}'."
            );
        }

        $record = self::getByKey($application, $key);
        if ($record === null) {
            throw new RuntimeException(
                "No document with key '{$key}' in application {$application->id}."
            );
        }

        self::deleteFile($record['stored_name'], $application->id);
        self::removeRecord($application, $key);
    }

    /**
     * Delete ALL uploaded files for an application (cancel/cleanup path).
     * Does NOT touch draft_data — caller handles that separately.
     */
    public static function purgeAll(int $applicationId): void
    {
        $dir = self::applicationDir($applicationId);
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

    public static function getAll(NewApplication $application): array
    {
        return $application->draftData['documents'] ?? [];
    }

    public static function getByKey(NewApplication $application, string $key): ?array
    {
        $docs = self::getAll($application);
        return $docs[$key] ?? null;
    }

    public static function count(NewApplication $application): int
    {
        return count(self::getAll($application));
    }

    /**
     * @throws RuntimeException if the key doesn't exist or file is missing from disk
     */
    public static function getAbsolutePath(NewApplication $application, string $key): string
    {
        $record = self::getByKey($application, $key);
        if ($record === null) {
            throw new RuntimeException(
                "No document with key '{$key}' in application {$application->id}."
            );
        }

        $path = self::applicationDir($application->id) . DIRECTORY_SEPARATOR . $record['stored_name'];

        if (!is_file($path)) {
            throw new RuntimeException(
                "File for key '{$key}' is missing from disk (stored_name: {$record['stored_name']})."
            );
        }

        return $path;
    }

    // ===== PRIVATE HELPERS =====

    private static function detectMime(string $path): string
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime  = $finfo->file($path);
        if ($mime === false) {
            throw new ApplicationUploadException('Could not determine file type.', 'mime_detect_failed');
        }
        return $mime === 'image/jpg' ? 'image/jpeg' : $mime;
    }

    private static function assertNoUploadError(int $errorCode): void
    {
        switch ($errorCode) {
            case UPLOAD_ERR_OK:
                return;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new ApplicationUploadException('File exceeds the size limit.', 'too_large');
            case UPLOAD_ERR_PARTIAL:
                throw new ApplicationUploadException('File was only partially uploaded.', 'partial');
            case UPLOAD_ERR_NO_FILE:
                throw new ApplicationUploadException('No file was submitted.', 'no_file');
            case UPLOAD_ERR_NO_TMP_DIR:
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                throw new ApplicationUploadException('Server upload error. Please try again.', 'server_error');
            default:
                throw new ApplicationUploadException('Unknown upload error.', 'unknown');
        }
    }

    private static function generateFilename(string $ext): string
    {
        $bytes = random_bytes(16);
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
     * Return the upload directory path for an application. PREFIXED
     * with "app_" — see this file's top doc-comment for why that
     * prefix is load-bearing (renewal_sessions.id and
     * new_applications.id are independent sequences that can and do
     * collide on the same integer).
     */
    private static function applicationDir(int $applicationId): string
    {
        return PFM_RNW_UPLOADS_DIR . DIRECTORY_SEPARATOR . 'app_' . $applicationId;
    }

    private static function deleteFile(string $storedName, int $applicationId): void
    {
        if (!preg_match('/^[a-f0-9\-]+\.(pdf|jpg|png)$/', $storedName)) {
            return;
        }
        $path = self::applicationDir($applicationId) . DIRECTORY_SEPARATOR . $storedName;
        if (is_file($path)) {
            @unlink($path);
        }
    }

    private static function sanitiseOriginalName(string $name): string
    {
        $name = basename($name);
        $name = preg_replace('/[\x00-\x1f\x7f]/', '', $name);
        return substr($name ?: 'upload', 0, 255);
    }

    private static function saveRecord(NewApplication $application, string $key, array $record): void
    {
        $docs       = $application->draftData['documents'] ?? [];
        $docs[$key] = $record;
        $application->saveDraft(['documents' => $docs]);
    }

    private static function removeRecord(NewApplication $application, string $key): void
    {
        $docs = $application->draftData['documents'] ?? [];
        unset($docs[$key]);
        $application->saveDraft(['documents' => $docs]);
    }
}

/**
 * Thrown for user-facing upload validation failures. Distinct class
 * from DocumentUpload.php's UploadException (kept self-contained
 * rather than requiring that file just for this one class — same
 * sibling-file philosophy as the rest of this module) — has the same
 * shape (message + machine-readable $code) so calling code that
 * catches by message/code works identically either way.
 */
class ApplicationUploadException extends RuntimeException
{
    public string $uploadCode;

    public function __construct(string $message, string $uploadCode, int $httpCode = 422)
    {
        parent::__construct($message, $httpCode);
        $this->uploadCode = $uploadCode;
    }
}
