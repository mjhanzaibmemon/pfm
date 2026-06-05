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

$customerNote = $session->draftData['customer_note'] ?? '';

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Supporting Documents</h2>
        <p class="pfm-card__subtitle">
            Upload your business license and any additional documents that support your membership.
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
                <span class="pfm-text-muted" style="font-size: 0.8rem;">Uploaded in Step 3</span>
            </li>
        </ul>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning">
            We don't see a main contact ID on file. Please <a href="<?= htmlspecialchars(pfm_step_url(3)) ?>">go back to Step 3</a> and upload it.
        </div>
    <?php endif; ?>

    <!-- ── 2. Business license ───────────────────────────────────── -->
    <h3 class="pfm-mt-2">Business License</h3>
    <p class="pfm-text-muted pfm-mb-1">A clear photo or scan of your current business license.</p>

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

    // Track whether at least one BUSINESS document has been uploaded
    // ("business document" = anything except the main_contact_id ID slot
    //  from Step 3, which is for identity not business eligibility).
    //
    // Per v3 spec line 15327: "Please upload at least one business document
    // to continue." mirrors the ID-required validation on Step 3.
    var hasBusinessDoc = <?= (!empty($businessDoc) || !empty($additionalDocs)) ? 'true' : 'false' ?>;

    function refreshBusinessDocFlag() {
        // Recount from the live DOM: any .pfm-file row inside either the
        // business-license list OR the additional-docs list counts.
        var bizCount = document.querySelectorAll('#pfm-license-list .pfm-file').length;
        var extCount = document.querySelectorAll('#pfm-extra-list .pfm-file').length;
        hasBusinessDoc = (bizCount + extCount) > 0;
    }

    // Next button — block until at least one business document is uploaded
    var nextBtn = document.getElementById('pfm-next');
    nextBtn.addEventListener('click', function () {
        refreshBusinessDocFlag();
        if (!hasBusinessDoc) {
            PFM.toast.show(
                'Please upload at least one business document to continue.',
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
                    li.innerHTML = '<span>&#128206;</span>' +
                        '<span class="pfm-file__name">' + escapeHtml(data.original_name) + '</span>' +
                        '<span class="pfm-file__meta">' + PFM.format.bytes(data.size) + '</span>' +
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
