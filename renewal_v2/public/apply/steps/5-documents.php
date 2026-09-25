<?php
/**
 * New-Customer Application — Step 5 — Supporting Documents
 *
 * Sibling to public/steps/5-documents.php, simpler by design: a new
 * applicant has no prior-year Business Registry or ID on file, so none
 * of the renewal wizard's legacy carry-over / "reference only" /
 * annual-fresh handling applies. The Business Registry is simply
 * always required, and the main contact ID (uploaded on Step 3) is
 * shown read-only.
 *
 * Uses ApplicationDocumentUpload via this module's own
 * upload/delete/view-document.php endpoints. The Business Registry
 * keeps the internal slot key 'business_license' (same as the renewal
 * wizard) so approval (Section 13.8) can map both flows' documents
 * identically.
 *
 * The client-side "Business Registry required" check below is a UX
 * convenience only — the authoritative gate must live server-side in
 * the submit endpoint (Step 6/7), exactly as in the renewal wizard.
 */
declare(strict_types=1);

$PFM_STEP       = 5;
$PFM_STEP_TITLE = 'Documents';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationDocumentUpload.php';

$allDocs     = ApplicationDocumentUpload::getAll($application);
$idDocKey    = 'main_contact_id';
$businessKey = 'business_license';
$idDoc       = $allDocs[$idDocKey]    ?? null;
$businessDoc = $allDocs[$businessKey] ?? null;

$additionalDocs = [];
foreach ($allDocs as $k => $d) {
    if ($k === $idDocKey || $k === $businessKey) continue;
    $additionalDocs[$k] = $d;
}

$customerNote = $application->draftData['customer_note'] ?? '';

$viewLink = static function (string $key) use ($application): string {
    return '/renewal_v2/public/apply/api/view-document.php?token='
         . urlencode($application->token)
         . '&key=' . urlencode($key);
};

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Supporting Documents</h2>
        <p class="pfm-card__subtitle">
            Upload your current Secretary of State registration and any additional
            documents that support your application. Accepted formats: PDF, JPG, PNG.
        </p>
    </div>

    <!-- 1. Main contact ID (uploaded on Step 3) -->
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
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning">
            <strong>Driver&rsquo;s License / Photo ID required.</strong>
            We don&rsquo;t see a main contact ID uploaded yet. Please
            <a href="<?= htmlspecialchars(pfm_apply_step_url(3)) ?>">go back to Step 3</a> and upload one.
        </div>
    <?php endif; ?>

    <!-- 2. Business registry -->
    <h3 class="pfm-mt-2">Business Registry <span class="pfm-required">*</span></h3>
    <p class="pfm-text-muted pfm-mb-1">Upload a current copy of your Secretary of State business registration.</p>

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

    <!-- 3. Additional documents -->
    <h3 class="pfm-mt-2">Additional Documents (optional)</h3>
    <p class="pfm-text-muted pfm-mb-1">
        Examples: documentation showing the main contact&rsquo;s relationship to the
        company, or written authorization allowing the main contact to apply for
        and manage the account.
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

    <!-- 4. Comments / notes -->
    <h3 class="pfm-mt-2">Comments / Notes (optional)</h3>
    <p class="pfm-text-muted pfm-mb-1">
        Is there anything PFM staff should know when reviewing your application?
    </p>
    <form id="pfm-form-note" autocomplete="off">
        <div class="pfm-field">
            <textarea id="pfm-note" name="customer_note" class="pfm-textarea" maxlength="500"
                      placeholder="Optional note for our team…"><?= htmlspecialchars((string) $customerNote) ?></textarea>
            <div class="pfm-field__hint">Maximum 500 characters.</div>
        </div>
    </form>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_apply_step_url(4)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
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
    PFM.autosave.attach(document.getElementById('pfm-form-note'), { step: 5 });

    var hasIdDoc = <?= !empty($idDoc) ? 'true' : 'false' ?>;

    // An in-flight upload must block Continue: without this, a fast
    // click aborts the XHR mid-flight and the wizard advances with the
    // document missing (the renewal wizard hit exactly this race).
    var activeUploads = 0;
    var NEXT_BTN_LABEL_READY  = 'Continue to Review →';
    var NEXT_BTN_LABEL_UPLOAD = 'Uploading… please wait';
    var nextBtn = document.getElementById('pfm-next');

    function hasBusinessReg() {
        return document.querySelectorAll(
            '#pfm-license-list .pfm-file:not(.pfm-file--pending)'
        ).length > 0;
    }

    function refreshNextButtonState() {
        if (activeUploads > 0) {
            nextBtn.disabled = true;
            nextBtn.textContent = NEXT_BTN_LABEL_UPLOAD;
        } else {
            nextBtn.disabled = false;
            nextBtn.textContent = NEXT_BTN_LABEL_READY;
        }
    }

    nextBtn.addEventListener('click', function () {
        if (activeUploads > 0) {
            PFM.toast.show(
                'Please wait for your document upload to finish before continuing.',
                'warning', 5000
            );
            return;
        }
        if (!hasIdDoc) {
            PFM.toast.show(
                'Your main contact\'s ID is missing. Please go back to Step 3 and upload it.',
                'danger', 6000
            );
            return;
        }
        if (!hasBusinessReg()) {
            PFM.toast.show('Please upload your Business Registry to continue.', 'danger', 6000);
            return;
        }
        window.location.href = <?= json_encode(pfm_apply_step_url(6)) ?>;
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
            pending.className = 'pfm-file pfm-file--pending';
            pending.innerHTML = '<span class="pfm-spinner"></span>' +
                '<span class="pfm-file__name">Uploading ' + escapeHtml(file.name) + '…</span>';
            listEl.appendChild(pending);

            activeUploads++;
            refreshNextButtonState();

            PFM.api.upload(file, key)
                .then(function (data) {
                    pending.remove();
                    var li = document.createElement('li');
                    li.className = 'pfm-file';
                    li.setAttribute('data-extra-key', data.key);
                    var viewHref = '/renewal_v2/public/apply/api/view-document.php?token=' +
                        encodeURIComponent(<?= json_encode($application->token) ?>) +
                        '&key=' + encodeURIComponent(data.key);
                    li.innerHTML = '<span>&#128206;</span>' +
                        '<span class="pfm-file__name">' + escapeHtml(data.original_name) + '</span>' +
                        '<span class="pfm-file__meta">' + PFM.format.bytes(data.size) + '</span>' +
                        '<a class="pfm-btn pfm-btn--ghost pfm-btn--sm" target="_blank" rel="noopener" href="' +
                            escapeHtml(viewHref) + '">View &nearr;</a>' +
                        '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-delete-doc="' + escapeHtml(data.key) + '">Remove</button>';
                    var existing = listEl.querySelector('[data-extra-key="' + data.key + '"]');
                    if (existing) existing.replaceWith(li); else listEl.appendChild(li);
                    bindDeletes();
                    PFM.toast.show('Uploaded.', 'success');
                    inputEl.value = '';
                })
                .catch(function (err) {
                    pending.remove();
                    PFM.toast.show(err.message || 'Upload failed.', 'danger');
                })
                .finally(function () {
                    activeUploads = Math.max(0, activeUploads - 1);
                    refreshNextButtonState();
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

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
