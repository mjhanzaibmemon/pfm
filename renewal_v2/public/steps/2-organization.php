<?php
/**
 * Step 2 — Organisation Information
 *
 * Per v3 spec: collect only company name, business type, and business
 * license. Optional address / phone fields were removed at Larissa's
 * request (the existing client row keeps the rest).
 *
 * Pre-fills from `clients`. Auto-saves to draft_data['org'] on blur.
 * On Next, validates required fields and advances to Step 3.
 */
declare(strict_types=1);

$PFM_STEP       = 2;
$PFM_STEP_TITLE = 'Organisation Information';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';

// Pre-fill priority:
//   1. Anything already in draft_data['org'] (so partial edits persist)
//   2. Existing `clients` row values
$draftOrg = $session->draftData['org'] ?? [];
$values = [
    'co_name'          => $draftOrg['co_name']          ?? $client['co_name']          ?? '',
    'business_type'    => $draftOrg['business_type']    ?? $client['business_type']    ?? '',
    'business_license' => $draftOrg['business_license'] ?? $client['business_license'] ?? '',
];

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Organisation Information</h2>
        <p class="pfm-card__subtitle">Please confirm or update your company details below.</p>
    </div>

    <form id="pfm-form-org" autocomplete="off" novalidate>
        <div class="pfm-field">
            <label for="co_name" class="pfm-field__label">
                Company / Organisation Name <span class="pfm-required">*</span>
            </label>
            <input type="text" id="co_name" name="co_name"
                   class="pfm-input" data-pfm-required maxlength="255"
                   value="<?= htmlspecialchars($values['co_name'], ENT_QUOTES) ?>">
            <div class="pfm-field__error">Please enter your company name.</div>
        </div>

        <div class="pfm-grid pfm-grid--2">
            <div class="pfm-field">
                <label for="business_type" class="pfm-field__label">
                    Business Type <span class="pfm-required">*</span>
                </label>
                <input type="text" id="business_type" name="business_type"
                       class="pfm-input" data-pfm-required maxlength="14"
                       placeholder="e.g. RETAIL, WHOLESALE, HOME/SHOP"
                       value="<?= htmlspecialchars($values['business_type'], ENT_QUOTES) ?>">
                <div class="pfm-field__hint">Short description of how your business operates.</div>
                <div class="pfm-field__error">Please enter your business type.</div>
            </div>

            <div class="pfm-field">
                <label for="business_license" class="pfm-field__label">
                    Business License #
                </label>
                <input type="text" id="business_license" name="business_license"
                       class="pfm-input" maxlength="100"
                       value="<?= htmlspecialchars($values['business_license'], ENT_QUOTES) ?>">
                <div class="pfm-field__hint">Optional but recommended.</div>
            </div>
        </div>
    </form>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_step_url(1)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
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
    var form = document.getElementById('pfm-form-org');
    var nextBtn = document.getElementById('pfm-next');

    // Debounced auto-save → draft_data.org.*
    var saver = PFM.autosave.attach(form, { section: 'org', step: 2 });

    nextBtn.addEventListener('click', function () {
        if (!PFM.validate.required(form)) {
            PFM.toast.show('Please fill in the required fields highlighted in red.', 'danger');
            return;
        }
        // Force a final save before navigating
        if (saver && saver.flush) saver.flush();
        // Give the auto-save a moment to complete then go
        setTimeout(function () {
            window.location.href = <?= json_encode(pfm_step_url(3)) ?>;
        }, 250);
    });
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
