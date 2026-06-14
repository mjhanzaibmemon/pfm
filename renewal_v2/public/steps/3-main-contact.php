<?php
/**
 * Step 3 — Main Contact
 *
 * Pre-fills the existing main_contact=1 row from `members` (name, email, phone).
 * Customer can update those fields.
 *
 * Per v3 spec: driver's licence / ID upload is REQUIRED — the Next button
 * stays disabled until a file is uploaded for this slot.
 */
declare(strict_types=1);

$PFM_STEP       = 3;
$PFM_STEP_TITLE = 'Main Contact';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';

// ── Load existing main contact row ──────────────────────────────────
$mainContact = Db::one(
    "SELECT member_id, member_name, email, phone1
       FROM members
      WHERE client_id = ? AND main_contact = b'1'
      LIMIT 1",
    [$session->clientId]
);

// Prefill priority: draft_data > existing DB row > empty
$draftContact = $session->draftData['contact'] ?? [];
$values = [
    'name'  => $draftContact['name']  ?? $mainContact['member_name'] ?? '',
    'email' => $draftContact['email'] ?? $mainContact['email']       ?? '',
    'phone' => $draftContact['phone'] ?? $mainContact['phone1']      ?? '',
];

// Check whether an ID document has already been uploaded for this session
$idKey   = 'main_contact_id';
$uploaded = $session->draftData['documents'][$idKey] ?? null;

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Main Contact Person</h2>
        <p class="pfm-card__subtitle">Please confirm or update the primary contact for your membership.</p>
    </div>

    <div class="pfm-alert pfm-alert--info">
        <strong>Review and update your information.</strong>
        If the main contact&rsquo;s name, email, or phone has changed since
        your last renewal, please update them here. You can also upload a
        new ID below if needed.
    </div>

    <form id="pfm-form-contact" autocomplete="off" novalidate>
        <div class="pfm-field">
            <label for="contact_name" class="pfm-field__label">
                Full Name <span class="pfm-required">*</span>
            </label>
            <input type="text" id="contact_name" name="name"
                   class="pfm-input" data-pfm-required maxlength="255"
                   value="<?= htmlspecialchars($values['name'], ENT_QUOTES) ?>">
            <div class="pfm-field__error">Please enter the contact's full name.</div>
        </div>

        <div class="pfm-grid pfm-grid--2">
            <div class="pfm-field">
                <label for="contact_email" class="pfm-field__label">
                    Email <span class="pfm-required">*</span>
                </label>
                <input type="email" id="contact_email" name="email"
                       class="pfm-input" data-pfm-required maxlength="255"
                       value="<?= htmlspecialchars($values['email'], ENT_QUOTES) ?>">
                <div class="pfm-field__error">Please enter a valid email.</div>
            </div>

            <div class="pfm-field">
                <label for="contact_phone" class="pfm-field__label">
                    Phone <span class="pfm-required">*</span>
                </label>
                <input type="tel" id="contact_phone" name="phone"
                       class="pfm-input" data-pfm-required maxlength="100"
                       value="<?= htmlspecialchars($values['phone'], ENT_QUOTES) ?>">
                <div class="pfm-field__error">Please enter a phone number.</div>
            </div>
        </div>
    </form>

    <!-- ── REQUIRED ID upload (per v3 spec Step 3) ───────────────── -->
    <h3 class="pfm-mt-2">Driver's License or Photo ID <span class="pfm-required">*</span></h3>
    <p class="pfm-text-muted pfm-mb-1">
        We require a photo of your driver's license or government-issued ID for the main contact.
        Accepted formats: PDF, JPG, PNG (max 10&nbsp;MB).
    </p>

    <label class="pfm-upload" id="pfm-upload-id">
        <input type="file" id="pfm-id-file" accept="application/pdf,image/jpeg,image/png">
        <strong>Click or drop a file here to upload</strong>
        <div class="pfm-upload__hint">Your ID image is stored securely and only used to verify your membership.</div>
    </label>

    <ul class="pfm-file-list" id="pfm-id-filelist" aria-live="polite">
        <?php if ($uploaded): ?>
            <li class="pfm-file" data-id-uploaded="1">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($uploaded['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($uploaded['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-delete-id>Remove</button>
            </li>
        <?php endif; ?>
    </ul>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_step_url(2)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
            &larr; Back
        </a>
        <span data-pfm-savestate class="pfm-nav__save"></span>
        <button type="button" id="pfm-next" class="pfm-btn pfm-btn--primary">
            Save &amp; Continue &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var form     = document.getElementById('pfm-form-contact');
    var nextBtn  = document.getElementById('pfm-next');
    var upload   = document.getElementById('pfm-upload-id');
    var fileIn   = document.getElementById('pfm-id-file');
    var fileList = document.getElementById('pfm-id-filelist');
    var idKey    = <?= json_encode($idKey) ?>;

    var hasIdUploaded = <?= $uploaded ? 'true' : 'false' ?>;

    // Auto-save contact fields → draft_data.contact.*
    var saver = PFM.autosave.attach(form, { section: 'contact', step: 3 });

    // Drag-drop visual feedback
    ['dragenter', 'dragover'].forEach(function (ev) {
        upload.addEventListener(ev, function (e) { e.preventDefault(); upload.classList.add('pfm-upload--dragover'); });
    });
    ['dragleave', 'drop'].forEach(function (ev) {
        upload.addEventListener(ev, function (e) { e.preventDefault(); upload.classList.remove('pfm-upload--dragover'); });
    });
    upload.addEventListener('drop', function (e) {
        if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files[0]) {
            doUpload(e.dataTransfer.files[0]);
        }
    });
    fileIn.addEventListener('change', function () {
        if (fileIn.files && fileIn.files[0]) doUpload(fileIn.files[0]);
    });

    function doUpload(file) {
        // Quick client-side sanity check
        var allowed = ['application/pdf', 'image/jpeg', 'image/png'];
        if (allowed.indexOf(file.type) === -1) {
            PFM.toast.show('Only PDF, JPG, or PNG files are allowed.', 'danger');
            return;
        }
        if (file.size > 10 * 1024 * 1024) {
            PFM.toast.show('Maximum file size is 10 MB.', 'danger');
            return;
        }

        // Show "uploading" placeholder
        fileList.innerHTML = '<li class="pfm-file"><span class="pfm-spinner"></span>' +
            '<span class="pfm-file__name">Uploading ' + escapeHtml(file.name) + '…</span></li>';

        PFM.api.upload(file, idKey)
            .then(function (data) {
                hasIdUploaded = true;
                fileList.innerHTML = '<li class="pfm-file" data-id-uploaded="1">' +
                    '<span>&#128206;</span>' +
                    '<span class="pfm-file__name">' + escapeHtml(data.original_name) + '</span>' +
                    '<span class="pfm-file__meta">' + PFM.format.bytes(data.size) + '</span>' +
                    '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-delete-id>Remove</button>' +
                '</li>';
                bindDelete();
                PFM.toast.show('ID uploaded successfully.', 'success');
            })
            .catch(function (err) {
                fileList.innerHTML = '';
                PFM.toast.show(err.message || 'Upload failed.', 'danger');
            });
    }

    function bindDelete() {
        var btn = fileList.querySelector('[data-pfm-delete-id]');
        if (!btn) return;
        btn.addEventListener('click', function () {
            if (!confirm('Remove uploaded ID?')) return;
            PFM.api.post('delete-document.php', { key: idKey })
                .then(function () {
                    hasIdUploaded = false;
                    fileList.innerHTML = '';
                    PFM.toast.show('ID removed.', 'info');
                })
                .catch(function (err) {
                    PFM.toast.show(err.message || 'Could not delete file.', 'danger');
                });
        });
    }

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    bindDelete();

    nextBtn.addEventListener('click', function () {
        if (!PFM.validate.required(form)) {
            PFM.toast.show('Please fill in the required fields highlighted in red.', 'danger');
            return;
        }
        // Email format check
        var emailEl = document.getElementById('contact_email');
        if (emailEl && emailEl.value && !PFM.validate.email(emailEl.value)) {
            emailEl.closest('.pfm-field').classList.add('pfm-field--error');
            PFM.toast.show('Please enter a valid email address.', 'danger');
            return;
        }
        if (!hasIdUploaded) {
            PFM.toast.show('Please upload a photo of the main contact\'s driver\'s license or ID before continuing.', 'danger');
            return;
        }

        if (saver && saver.flush) saver.flush();
        setTimeout(function () {
            window.location.href = <?= json_encode(pfm_step_url(4)) ?>;
        }, 250);
    });
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
