<?php
/**
 * Step 5 — Supporting Documents
 *
 * Per v3 spec:
 *   - Simple upload, no required-document dropdown
 *   - Business license image / scan suggested
 *   - "Federal tax ID document" example REMOVED from suggestion list
 *   - Comments / notes field re-added (sanitised on save)
 *   - Main contact ID was already uploaded in Step 3 — shown here read-only
 */
declare(strict_types=1);

$PFM_STEP       = 5;
$PFM_STEP_TITLE = 'Documents';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';

$allDocs       = DocumentUpload::getAll($session);
$idDocKey      = 'main_contact_id';
$businessKey   = 'business_license';
$idDoc         = $allDocs[$idDocKey]    ?? null;
$businessDoc   = $allDocs[$businessKey] ?? null;

// Collect any additional docs (everything not the ID / business license)
$additionalDocs = [];
foreach ($allDocs as $k => $d) {
    if ($k === $idDocKey || $k === $businessKey) continue;
    $additionalDocs[$k] = $d;
}

// Legacy Business Registry carry-over — mirrors the ID carry-over on
// Step 3. Confirm Receipt (commit bc1031c) writes wizard-uploaded
// business registries into clients.doc_sec_of_state so the NEXT year's
// renewal sees the document as "on file" and the customer can skip the
// upload unless it has actually changed. Query a single byte to detect
// presence without hauling the whole BLOB into PHP memory.
$hasLegacyBusinessReg = (int) (Db::scalar(
    'SELECT IF(doc_sec_of_state IS NULL OR OCTET_LENGTH(doc_sec_of_state) = 0, 0, 1)
       FROM clients WHERE client_id = ?',
    [$session->clientId]
) ?? 0) === 1;

// Legacy Main Contact ID carry-over — mirrors Bug 2 (round 4) fix on
// Step 3. Without this fallback, Step 5 nags "we don't see a main
// contact ID on file, go back to Step 3" even when Step 3 correctly
// showed "ID on file" from the clients.main_contact_img_id BLOB — the
// two steps would then contradict each other. Same OCTET_LENGTH probe
// so we don't drag a multi-MB BLOB into PHP.
$hasLegacyId = (int) (Db::scalar(
    'SELECT IF(main_contact_img_id IS NULL OR OCTET_LENGTH(main_contact_img_id) = 0, 0, 1)
       FROM clients WHERE client_id = ?',
    [$session->clientId]
) ?? 0) === 1;

$customerNote = $session->draftData['customer_note'] ?? '';

// Reusable inline helper: build a "View" link for one uploaded doc.
// Added 2026-06-17 per user feedback — the customer needs a way to
// open a document they previously uploaded so they can tell whether
// it still applies or needs to be replaced. Streams via the new
// public/api/view-document.php endpoint, which auths on the renewal
// token already in the URL.
$viewLink = static function (string $key) use ($session): string {
    return '/renewal_v2/public/api/view-document.php?token='
         . urlencode($session->token)
         . '&key=' . urlencode($key);
};

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Supporting Documents</h2>
        <p class="pfm-card__subtitle">
            Upload your business registry and any additional documents that support your membership.
            Accepted formats: PDF, JPG, PNG (max 10&nbsp;MB each, up to 10 files total).
        </p>
    </div>

    <!-- ── 1. Main contact ID (already uploaded in Step 3) ───────── -->
    <h3>Main Contact ID</h3>
    <?php if ($idDoc): ?>
        <ul class="pfm-file-list">
            <li class="pfm-file">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($idDoc['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($idDoc['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= htmlspecialchars($viewLink($idDocKey), ENT_QUOTES) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
                <span class="pfm-text-muted" style="font-size: 0.8rem;">Uploaded in Step 3</span>
            </li>
        </ul>
    <?php elseif ($hasLegacyId): ?>
        <div class="pfm-alert pfm-alert--info">
            <strong>ID on file.</strong> We already have a main contact ID on record from a previous renewal.
            You don't need to re-upload unless it has changed &mdash; if it has, use Step 3 to replace it.
        </div>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning">
            We don't see a main contact ID on file. Please <a href="<?= htmlspecialchars(pfm_step_url(3)) ?>">go back to Step 3</a> and upload it.
        </div>
    <?php endif; ?>

    <!-- ── 2. Business registry ──────────────────────────────────── -->
    <!-- Note: internal $businessKey stays as 'business_license' so files
         already uploaded under this slot remain retrievable. Only the
         customer-facing label is changed (per Larissa's Phase 6 video). -->
    <h3 class="pfm-mt-2">Business Registry <span class="pfm-required">*</span></h3>
    <p class="pfm-text-muted pfm-mb-1">A clear photo or scan of your current business registry.</p>

    <?php if ($hasLegacyBusinessReg && !$businessDoc): ?>
        <!-- Legacy Business Registry on file from a prior renewal — show as a carry-over
             badge with a View link, same pattern as the ID carry-over on Step 3. The
             customer can either keep this one or drop a new file below to replace it. -->
        <div class="pfm-alert pfm-alert--success">
            <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <div style="flex:1; min-width:200px;">
                    <strong>Business Registry on file</strong>
                    <span class="pfm-text-muted"> &mdash; carried over from your last renewal.</span>
                </div>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= htmlspecialchars($viewLink('legacy_business_registry'), ENT_QUOTES) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
            </div>
            <p class="pfm-mt-0" style="margin-bottom:0;">
                You don't need to re-upload your Business Registry unless it has changed since
                your last renewal. Drop a new file below if it needs replacing.
            </p>
        </div>
    <?php endif; ?>

    <label class="pfm-upload" id="pfm-upload-license">
        <input type="file" id="pfm-license-file" accept="application/pdf,image/jpeg,image/png">
        <strong>Click or drop a file here to upload</strong>
        <div class="pfm-upload__hint">PDF, JPG, or PNG &middot; up to 10&nbsp;MB</div>
    </label>

    <ul class="pfm-file-list" id="pfm-license-list" aria-live="polite">
        <?php if ($businessDoc): ?>
            <li class="pfm-file">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($businessDoc['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($businessDoc['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= htmlspecialchars($viewLink($businessKey), ENT_QUOTES) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
                <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm"
                        data-pfm-delete-doc="<?= htmlspecialchars($businessKey) ?>">Remove</button>
            </li>
        <?php endif; ?>
    </ul>

    <!-- ── 3. Additional documents ───────────────────────────────── -->
    <h3 class="pfm-mt-2">Additional Documents (optional)</h3>
    <p class="pfm-text-muted pfm-mb-1">
        Examples: nursery license, resale certificate, photo of storefront, or any other supporting document.
    </p>

    <label class="pfm-upload" id="pfm-upload-extra">
        <input type="file" id="pfm-extra-file" accept="application/pdf,image/jpeg,image/png">
        <strong>Click or drop a file here to add another document</strong>
        <div class="pfm-upload__hint">You can add as many as you need (up to the 10-file total cap).</div>
    </label>

    <ul class="pfm-file-list" id="pfm-extra-list" aria-live="polite">
        <?php foreach ($additionalDocs as $k => $d): ?>
            <li class="pfm-file" data-extra-key="<?= htmlspecialchars($k, ENT_QUOTES) ?>">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($d['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($d['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="<?= htmlspecialchars($viewLink($k), ENT_QUOTES) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
                <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm"
                        data-pfm-delete-doc="<?= htmlspecialchars($k, ENT_QUOTES) ?>">Remove</button>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- ── 4. Comments / notes ───────────────────────────────────── -->
    <h3 class="pfm-mt-2">Comments / Notes (optional)</h3>
    <p class="pfm-text-muted pfm-mb-1">
        Anything PFM staff should know about your membership? E.g. <em>"Please send invoices to our AP contact at ap@example.com"</em>.
    </p>
    <form id="pfm-form-note" autocomplete="off">
        <div class="pfm-field">
            <textarea id="pfm-note" name="customer_note" class="pfm-textarea" maxlength="500"
                      placeholder="Optional note for our team…"><?= htmlspecialchars((string) $customerNote) ?></textarea>
            <div class="pfm-field__hint">Maximum 500 characters.</div>
        </div>
    </form>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_step_url(4)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
            &larr; Back
        </a>
        <span data-pfm-savestate class="pfm-nav__save"></span>
        <button type="button" id="pfm-next" class="pfm-btn pfm-btn--primary">
            Continue to Review &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    // Auto-save the customer_note field
    PFM.autosave.attach(document.getElementById('pfm-form-note'), { step: 5 });

    // Track whether the Business Registry slot is satisfied. Per
    // Larissa's 2026-06-22 Round 3 QA ("Business Registry MUST be a
    // required field"), the slot is satisfied if EITHER:
    //   - the customer uploaded a fresh file under the business_license
    //     slot in this wizard session, OR
    //   - they had a Business Registry on file from a prior renewal
    //     (clients.doc_sec_of_state BLOB has bytes) and have not chosen
    //     to remove the carry-over.
    // Additional documents no longer count toward the requirement —
    // they're a separate optional bucket.
    var hasBusinessReg     = <?= !empty($businessDoc) ? 'true' : 'false' ?>;
    var hasLegacyBusReg    = <?= $hasLegacyBusinessReg ? 'true' : 'false' ?>;

    function refreshBusinessRegFlag() {
        // Live DOM recount of the business_license slot — fresh uploads
        // populate #pfm-license-list, so any .pfm-file row inside that
        // list means the slot now has a fresh upload.
        hasBusinessReg = document.querySelectorAll('#pfm-license-list .pfm-file').length > 0;
    }

    // Next button — block until the Business Registry slot has either a
    // fresh upload or a legacy carry-over.
    var nextBtn = document.getElementById('pfm-next');
    nextBtn.addEventListener('click', function () {
        refreshBusinessRegFlag();
        if (!hasBusinessReg && !hasLegacyBusReg) {
            PFM.toast.show(
                'Please upload your Business Registry to continue.',
                'danger',
                6000
            );
            return;
        }
        window.location.href = <?= json_encode(pfm_step_url(6)) ?>;
    });

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    function setupUploader(uploadEl, inputEl, listEl, keyFn) {
        ['dragenter', 'dragover'].forEach(function (ev) {
            uploadEl.addEventListener(ev, function (e) { e.preventDefault(); uploadEl.classList.add('pfm-upload--dragover'); });
        });
        ['dragleave', 'drop'].forEach(function (ev) {
            uploadEl.addEventListener(ev, function (e) { e.preventDefault(); uploadEl.classList.remove('pfm-upload--dragover'); });
        });
        uploadEl.addEventListener('drop', function (e) {
            if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0]) {
                doUpload(e.dataTransfer.files[0]);
            }
        });
        inputEl.addEventListener('change', function () {
            if (inputEl.files && inputEl.files[0]) doUpload(inputEl.files[0]);
        });

        function doUpload(file) {
            var allowed = ['application/pdf', 'image/jpeg', 'image/png'];
            if (allowed.indexOf(file.type) === -1) {
                PFM.toast.show('Only PDF, JPG, or PNG files are allowed.', 'danger');
                return;
            }
            if (file.size > 10 * 1024 * 1024) {
                PFM.toast.show('Maximum file size is 10 MB.', 'danger');
                return;
            }

            var key = keyFn();
            var pending = document.createElement('li');
            pending.className = 'pfm-file';
            pending.innerHTML = '<span class="pfm-spinner"></span>' +
                '<span class="pfm-file__name">Uploading ' + escapeHtml(file.name) + '…</span>';
            listEl.appendChild(pending);

            PFM.api.upload(file, key)
                .then(function (data) {
                    pending.remove();
                    var li = document.createElement('li');
                    li.className = 'pfm-file';
                    li.setAttribute('data-extra-key', data.key);
                    var viewHref = '/renewal_v2/public/api/view-document.php?token=' +
                        encodeURIComponent(<?= json_encode($session->token) ?>) +
                        '&key=' + encodeURIComponent(data.key);
                    li.innerHTML = '<span>&#128206;</span>' +
                        '<span class="pfm-file__name">' + escapeHtml(data.original_name) + '</span>' +
                        '<span class="pfm-file__meta">' + PFM.format.bytes(data.size) + '</span>' +
                        '<a class="pfm-btn pfm-btn--ghost pfm-btn--sm" target="_blank" rel="noopener" href="' +
                            escapeHtml(viewHref) + '">View &nearr;</a>' +
                        '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-delete-doc="' + data.key + '">Remove</button>';
                    // Replace existing entry with same key, else append
                    var existing = listEl.querySelector('[data-extra-key="' + data.key + '"]');
                    if (existing) existing.replaceWith(li); else listEl.appendChild(li);
                    bindDeletes();
                    PFM.toast.show('Uploaded.', 'success');
                    inputEl.value = '';
                })
                .catch(function (err) {
                    pending.remove();
                    PFM.toast.show(err.message || 'Upload failed.', 'danger');
                });
        }
    }

    function bindDeletes() {
        document.querySelectorAll('[data-pfm-delete-doc]').forEach(function (btn) {
            if (btn.dataset.pfmBound === '1') return;
            btn.dataset.pfmBound = '1';
            btn.addEventListener('click', function () {
                var key = btn.getAttribute('data-pfm-delete-doc');
                if (!confirm('Remove this document?')) return;
                PFM.api.post('delete-document.php', { key: key })
                    .then(function () {
                        var row = btn.closest('.pfm-file');
                        if (row) row.remove();
                        PFM.toast.show('Removed.', 'info');
                    })
                    .catch(function (err) { PFM.toast.show(err.message || 'Could not delete.', 'danger'); });
            });
        });
    }

    setupUploader(
        document.getElementById('pfm-upload-license'),
        document.getElementById('pfm-license-file'),
        document.getElementById('pfm-license-list'),
        function () { return 'business_license'; }
    );

    // For additional docs we generate a unique slot key each time
    var extraCounter = document.querySelectorAll('#pfm-extra-list .pfm-file').length;
    setupUploader(
        document.getElementById('pfm-upload-extra'),
        document.getElementById('pfm-extra-file'),
        document.getElementById('pfm-extra-list'),
        function () { extraCounter++; return 'doc_' + extraCounter + '_' + Date.now().toString(36); }
    );

    bindDeletes();
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
