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
require_once __DIR__ . '/../../lib/PhoneFormat.php';

// ── Load existing main contact row ──────────────────────────────────
$mainContact = Db::one(
    "SELECT member_id, member_name, email, phone1
       FROM members
      WHERE client_id = ? AND main_contact = b'1'
      LIMIT 1",
    [$session->clientId]
);

// Prefill priority — each field falls through this chain in order:
//   1. draft_data.contact value (so partial edits survive a refresh)
//   2. members main_contact row value
//   3. clients.main_contact_* column (legacy storage, written by the
//      existing PFM admin form_clients_staff)
//   4. empty string
//
// The ?? null-coalesce was widening the wrong way here: if Step 3's
// auto-save fired with a cleared email field, draft_data.contact.email
// became '' (empty string, NOT null), and ?? happily returned the
// empty string instead of falling through to the DB. User's manual
// test on 2026-06-17 hit this exact scenario — members.email had
// the right address but the form rendered blank because the draft
// blanked it. Switched to a helper that treats empty string as
// missing, matching the user's expectation that a refresh shouldn't
// wipe a field that was filled in the existing record.
//
// title comes from clients.main_contact_title (the members row has
// no title column). Added 2026-06-17 per Larissa's request to capture
// the main contact's title (Owner / Administrator / etc.) during
// renewal.
$draftContact = $session->draftData['contact'] ?? [];
$pick = static function (...$candidates): string {
    foreach ($candidates as $v) {
        if ($v !== null && $v !== '') {
            return (string) $v;
        }
    }
    return '';
};
$values = [
    'name'  => $pick(
        $draftContact['name']  ?? null,
        $mainContact['member_name'] ?? null,
        $client['main_contact_name'] ?? null
    ),
    'email' => $pick(
        $draftContact['email'] ?? null,
        $mainContact['email']  ?? null,
        $client['main_contact_email'] ?? null
    ),
    // Phone is formatted with pfm_format_phone() so US numbers render in
    // (XXX) XXX-XXXX form on initial paint, matching what Step 6 and the
    // admin review screen already show. Non-US numbers (e.g. Pakistani
    // mobile leading 0) pass through untouched per the formatter's
    // NANPA-aware rules. The submit handler accepts the formatted value
    // back unchanged — phone1 storage is varchar(100), and downstream
    // displays normalise on read.
    'phone' => pfm_format_phone($pick(
        $draftContact['phone'] ?? null,
        $mainContact['phone1'] ?? null,
        $client['main_contact_phone'] ?? null
    )),
    'title' => $pick(
        $draftContact['title'] ?? null,
        $client['main_contact_title'] ?? null
    ),
];

// ── ID document state — three possible cases ───────────────────────
//
//   1. Uploaded fresh in THIS session  → $uploaded is set
//   2. Has a legacy ID on file from a previous renewal / admin entry
//      → $legacyIdName has the filename (clients.main_contact_img_file)
//   3. No ID at all                    → both null
//
// Larissa requested 2026-06-17: "if an existing ID is already on file,
// the customer should be able to see that it exists and have the
// option to upload a replacement, rather than being required to
// re-upload it every year." Case 2 is what makes that possible. The
// legacy ID is stored as a BLOB in clients.main_contact_img_id and
// can't be previewed inline, so we display its filename + size as a
// "ID on file" badge and let the customer skip the upload unless
// they want to replace it.
$idKey      = 'main_contact_id';
$uploaded   = $session->draftData['documents'][$idKey] ?? null;
$legacyIdName = (string) ($client['main_contact_img_file'] ?? '');
$legacyIdSize = (int)    ($client['main_contact_img_size'] ?? 0);
$hasLegacyId  = ($legacyIdName !== '' && $legacyIdSize > 0);
$idRequired   = !$uploaded && !$hasLegacyId;

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

        <div class="pfm-field">
            <label for="contact_title" class="pfm-field__label">
                Title <span class="pfm-required">*</span>
            </label>
            <input type="text" id="contact_title" name="title"
                   class="pfm-input" data-pfm-required maxlength="100"
                   placeholder="Owner"
                   value="<?= htmlspecialchars($values['title'], ENT_QUOTES) ?>">
            <div class="pfm-field__hint">
                The contact&rsquo;s role at the company &mdash; usually Owner, sometimes
                Administrator or similar.
            </div>
            <div class="pfm-field__error">Please enter the contact's title.</div>
        </div>
    </form>

    <!-- ── ID upload (required only when there's no ID on file yet) ── -->
    <h3 class="pfm-mt-2">
        Driver's License or Photo ID
        <?php if ($idRequired): ?>
            <span class="pfm-required">*</span>
        <?php endif; ?>
    </h3>

    <?php if ($hasLegacyId && !$uploaded): ?>
        <!-- Case 2: legacy ID on file — show as a carry-over badge + View link -->
        <div class="pfm-alert pfm-alert--success">
            <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <div style="flex:1; min-width:200px;">
                    <strong>ID on file:</strong>
                    <span style="font-family:monospace;"><?= htmlspecialchars($legacyIdName) ?></span>
                    <?php if ($legacyIdSize > 0): ?>
                        <span class="pfm-text-muted">(<?= number_format($legacyIdSize / 1024, 0) ?>&nbsp;KB)</span>
                    <?php endif; ?>
                </div>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="/renewal_v2/public/api/view-document.php?token=<?= urlencode($session->token) ?>&amp;key=legacy_main_contact_id"
                   target="_blank" rel="noopener">
                    View &nearr;
                </a>
            </div>
            <p class="pfm-mt-0" style="margin-bottom:0;">
                You don't need to re-upload your ID unless it has changed since your
                last renewal. Use the View button above to check which file we have on
                file, then drop a new file below if it needs replacing.
            </p>
        </div>
    <?php else: ?>
        <p class="pfm-text-muted pfm-mb-1">
            We require a photo of your driver's license or government-issued
            ID for the main contact. Accepted formats: PDF, JPG, PNG
            (max 10&nbsp;MB).
        </p>
    <?php endif; ?>

    <label class="pfm-upload" id="pfm-upload-id">
        <input type="file" id="pfm-id-file" accept="application/pdf,image/jpeg,image/png">
        <strong>
            <?= $hasLegacyId && !$uploaded ? 'Upload a replacement ID' : 'Click or drop a file here to upload' ?>
        </strong>
        <div class="pfm-upload__hint">Your ID image is stored securely and only used to verify your membership.</div>
    </label>

    <ul class="pfm-file-list" id="pfm-id-filelist" aria-live="polite">
        <?php if ($uploaded): ?>
            <li class="pfm-file" data-id-uploaded="1">
                <span>&#128206;</span>
                <span class="pfm-file__name"><?= htmlspecialchars($uploaded['original_name']) ?></span>
                <span class="pfm-file__meta"><?= number_format(($uploaded['size'] ?? 0) / 1024, 0) ?>&nbsp;KB</span>
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                   href="/renewal_v2/public/api/view-document.php?token=<?= urlencode($session->token) ?>&amp;key=<?= urlencode($idKey) ?>"
                   target="_blank" rel="noopener">View &nearr;</a>
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
    // If the customer already has a legacy ID on file we treat the slot as
    // satisfied — Next is allowed without a fresh upload, matching Larissa's
    // 2026-06-17 ask. A fresh upload still works and replaces the legacy
    // image when stored.
    var hasLegacyId   = <?= $hasLegacyId ? 'true' : 'false' ?>;

    // Auto-save contact fields → draft_data.contact.*
    var saver = PFM.autosave.attach(form, { section: 'contact', step: 3 });

    // Live phone formatting on input. Mirrors lib/PhoneFormat.php's
    // format-if-not-starting-with-0 rule: a 10-digit number whose first
    // digit is not "0" renders as (XXX) XXX-XXXX, an 11-digit leading
    // "1" (US country-code form) renders as 1 (XXX) XXX-XXXX, and
    // anything else (Pakistani 0…, partial entries) is left as-is so
    // international numbers stay readable and mid-typing doesn't get
    // mangled. Same formatter runs server-side on first paint.
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
                // Partial entry or leading-zero international — leave
                // the raw input alone so the cursor and user-typed
                // format stay intact.
                return;
            }
            if (formatted !== raw) {
                phoneIn.value = formatted;
                // Cursor at end — phone fields are short enough that
                // mid-string editing isn't worth the cursor-preservation
                // complexity.
                phoneIn.setSelectionRange(formatted.length, formatted.length);
            }
        });
    }

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
                var viewHref = '/renewal_v2/public/api/view-document.php?token=' +
                    encodeURIComponent(<?= json_encode($session->token) ?>) +
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
        // Email format check
        var emailEl = document.getElementById('contact_email');
        if (emailEl && emailEl.value && !PFM.validate.email(emailEl.value)) {
            emailEl.closest('.pfm-field').classList.add('pfm-field--error');
            PFM.toast.show('Please enter a valid email address.', 'danger');
            return;
        }
        // ID slot is satisfied if EITHER a fresh upload exists for this
        // session OR the customer already has a legacy ID on file from a
        // previous renewal. The "Remove" action on a fresh upload clears
        // hasIdUploaded but the legacy fallback remains, so the customer
        // can still proceed without re-uploading.
        if (!hasIdUploaded && !hasLegacyId) {
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
