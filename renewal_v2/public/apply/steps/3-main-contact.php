<?php
/**
 * New-Customer Application — Step 3 — Main Contact
 *
 * Sibling to public/steps/3-main-contact.php (the renewal wizard's
 * Step 3), substantially simpler by design:
 *
 *   - No `members` row to pre-fill from (no existing buyers at all yet
 *     — Step 4 is where the applicant creates their buyer list from
 *     scratch).
 *   - No `clients.main_contact_*` mirror fallback (no existing clients
 *     row — Section 13.6's defining constraint).
 *   - NONE of the renewal wizard's "legacy ID on file / annual-fresh
 *     rule" complexity (Round 7's temporary rule, the "reference only"
 *     badge, etc.) — that entire feature exists because a RENEWAL
 *     customer might have an ID from a PREVIOUS year on file. A new
 *     applicant has no previous year, so the ID upload is simply
 *     always required, unconditionally, every time. Much simpler.
 *
 * Uses ApplicationDocumentUpload (not DocumentUpload) via this
 * module's own upload/delete/view-document.php endpoints — see
 * lib/ApplicationDocumentUpload.php's header comment for why this is
 * a separate sibling class rather than a shared one.
 */
declare(strict_types=1);

$PFM_STEP       = 3;
$PFM_STEP_TITLE = 'Main Contact';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/PhoneFormat.php';
require_once RNW_ROOT . '/lib/ApplicationDocumentUpload.php';

// Pre-fill priority: draft_data.contact only — there is no clients or
// members row to fall back to.
$draftContact = $application->draftData['contact'] ?? [];
$values = [
    'name'  => $draftContact['name']  ?? '',
    'email' => $draftContact['email'] ?? '',
    'phone' => pfm_format_phone($draftContact['phone'] ?? ''),
    'title' => $draftContact['title'] ?? '',
];

// ID document state — much simpler than the renewal wizard's version:
// only one case matters (uploaded in this session, or not yet).
$idKey    = 'main_contact_id';
$uploaded = $application->draftData['documents'][$idKey] ?? null;

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Main Contact Person</h2>
        <p class="pfm-card__subtitle">Who should we contact about this membership?</p>
    </div>

    <div class="pfm-alert pfm-alert--info">
        The main contact should be listed on the Secretary of State
        registration. If not, please upload documentation showing their
        relationship to the company and authorization to apply.
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

        <div class="pfm-field">
            <label for="contact_title" class="pfm-field__label">
                Title <span class="pfm-required">*</span>
            </label>
            <input type="text" id="contact_title" name="title"
                   class="pfm-input" data-pfm-required maxlength="100"
                   placeholder="Owner"
                   value="<?= htmlspecialchars($values['title'], ENT_QUOTES) ?>">
            <div class="pfm-field__hint">
                Enter the main contact&rsquo;s role with the company, such as
                Owner, Manager, or Floral Designer.
            </div>
            <div class="pfm-field__error">Please enter the contact's title.</div>
        </div>
    </form>

    <h3 class="pfm-mt-2">
        Driver's License or Photo ID <span class="pfm-required">*</span>
    </h3>
    <p class="pfm-text-muted pfm-mb-1">
        We require a photo of your driver's license or government-issued
        ID for the main contact. Accepted formats: PDF, JPG, PNG
        (max 10&nbsp;MB).
    </p>

    <label class="pfm-upload" id="pfm-upload-id">
        <input type="file" id="pfm-id-file" accept="application/pdf,image/jpeg,image/png">
        <strong>Click or drop a file here to upload</strong>
        <div class="pfm-upload__hint">Your ID image is stored securely and only used to verify your application.</div>
    </label>

    <ul class="pfm-file-list" id="pfm-id-filelist" aria-live="polite">
        <?php if ($uploaded): ?>
            <li class="pfm-file" data-id-uploaded="1">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($uploaded['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($uploaded['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="/renewal_v2/public/apply/api/view-document.php?token=<?= urlencode($application->token) ?>&amp;key=<?= urlencode($idKey) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
                <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-delete-id>Remove</button>
            </li>
        <?php endif; ?>
    </ul>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_apply_step_url(2)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
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

    var saver = PFM.autosave.attach(form, { section: 'contact', step: 3 });

    // Live phone formatting — identical logic to the renewal wizard's
    // Step 3 (mirrors lib/PhoneFormat.php's rules).
    var phoneIn = document.getElementById('contact_phone');
    if (phoneIn) {
        phoneIn.addEventListener('input', function () {
            var raw    = phoneIn.value;
            var digits = raw.replace(/\D/g, '');
            var formatted;
            if (digits.length === 10 && digits.charAt(0) !== '0') {
                formatted = '(' + digits.slice(0, 3) + ') ' + digits.slice(3, 6) + '-' + digits.slice(6);
            } else if (digits.length === 11 && digits.charAt(0) === '1' && digits.charAt(1) !== '0') {
                formatted = '1 (' + digits.slice(1, 4) + ') ' + digits.slice(4, 7) + '-' + digits.slice(7);
            } else {
                return;
            }
            if (formatted !== raw) {
                phoneIn.value = formatted;
                phoneIn.setSelectionRange(formatted.length, formatted.length);
            }
        });
    }

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
        var allowed = ['application/pdf', 'image/jpeg', 'image/png'];
        if (allowed.indexOf(file.type) === -1) {
            PFM.toast.show('Only PDF, JPG, or PNG files are allowed.', 'danger');
            return;
        }
        if (file.size > 10 * 1024 * 1024) {
            PFM.toast.show('Maximum file size is 10 MB.', 'danger');
            return;
        }

        fileList.innerHTML = '<li class="pfm-file"><span class="pfm-spinner"></span>' +
            '<span class="pfm-file__name">Uploading ' + escapeHtml(file.name) + '…</span></li>';

        PFM.api.upload(file, idKey)
            .then(function (data) {
                hasIdUploaded = true;
                var viewHref = '/renewal_v2/public/apply/api/view-document.php?token=' +
                    encodeURIComponent(<?= json_encode($application->token) ?>) +
                    '&key=' + encodeURIComponent(idKey);
                fileList.innerHTML = '<li class="pfm-file" data-id-uploaded="1">' +
                    '<span>&#128206;</span>' +
                    '<span class="pfm-file__name">' + escapeHtml(data.original_name) + '</span>' +
                    '<span class="pfm-file__meta">' + PFM.format.bytes(data.size) + '</span>' +
                    '<a class="pfm-btn pfm-btn--ghost pfm-btn--sm" target="_blank" rel="noopener" href="' +
                        escapeHtml(viewHref) + '">View &nearr;</a>' +
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
            window.location.href = <?= json_encode(pfm_apply_step_url(4)) ?>;
        }, 250);
    });
})();
</script>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
