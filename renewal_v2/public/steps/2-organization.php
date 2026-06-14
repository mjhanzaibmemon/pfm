<?php
/**
 * Step 2 — Organisation Information
 *
 * Collects:
 *   - company name
 *   - business type
 *   - mailing address (mailing_address + city + state + zip_code)
 *
 * Decision history:
 *   - Business License # text field removed after Larissa's Phase 6
 *     video — "we don't need business license number." The Business
 *     Registry document upload is in Step 5; the existing
 *     clients.business_license column is left untouched for legacy data.
 *   - Mailing address was REMOVED during initial Phase 3 build by
 *     mis-applying Decision 3 ("Store Front and Home Base addresses
 *     are not needed — only mailing"). Larissa caught this in her
 *     Phase 6 budget reply on 2026-06-12: only Store Front + Home Base
 *     were meant to go; mailing was meant to stay. Added back here.
 *   - Store Front and Home Base addresses remain OUT per Decision 3.
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
    'co_name'         => $draftOrg['co_name']         ?? $client['co_name']         ?? '',
    'business_type'   => $draftOrg['business_type']   ?? $client['business_type']   ?? '',
    'mailing_address' => $draftOrg['mailing_address'] ?? $client['mailing_address'] ?? '',
    'city'            => $draftOrg['city']            ?? $client['city']            ?? '',
    'state'           => $draftOrg['state']           ?? $client['state']           ?? '',
    'zip_code'        => $draftOrg['zip_code']        ?? $client['zip_code']        ?? '',
];

// US states + DC + Pacific territories for the State dropdown.
// Order: 50 states alphabetical, then DC, then PR/VI/GU/AS/MP — matches
// the convention the existing PFM admin form uses.
$US_STATES = [
    'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas',
    'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware',
    'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho',
    'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
    'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
    'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi',
    'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
    'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
    'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma',
    'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
    'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah',
    'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia',
    'WI' => 'Wisconsin', 'WY' => 'Wyoming',
    'DC' => 'District of Columbia',
    'PR' => 'Puerto Rico', 'VI' => 'U.S. Virgin Islands', 'GU' => 'Guam',
    'AS' => 'American Samoa', 'MP' => 'Northern Mariana Islands',
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

        <!-- ── Mailing address ──────────────────────────────────────── -->
        <h3 class="pfm-card__subtitle pfm-mt-2">Mailing Address</h3>
        <p class="pfm-text-muted pfm-mb-1">
            Where we send your membership card and any mailed correspondence.
            Update this if it has changed since your last renewal.
        </p>

        <div class="pfm-field">
            <label for="mailing_address" class="pfm-field__label">
                Street Address <span class="pfm-required">*</span>
            </label>
            <input type="text" id="mailing_address" name="mailing_address"
                   class="pfm-input" data-pfm-required maxlength="255"
                   placeholder="123 Main St"
                   value="<?= htmlspecialchars($values['mailing_address'], ENT_QUOTES) ?>">
            <div class="pfm-field__error">Please enter your mailing street address.</div>
        </div>

        <div class="pfm-grid pfm-grid--3">
            <div class="pfm-field">
                <label for="city" class="pfm-field__label">
                    City <span class="pfm-required">*</span>
                </label>
                <input type="text" id="city" name="city"
                       class="pfm-input" data-pfm-required maxlength="100"
                       value="<?= htmlspecialchars($values['city'], ENT_QUOTES) ?>">
                <div class="pfm-field__error">Please enter your city.</div>
            </div>

            <div class="pfm-field">
                <label for="state" class="pfm-field__label">
                    State <span class="pfm-required">*</span>
                </label>
                <select id="state" name="state" class="pfm-input" data-pfm-required>
                    <option value="">— Select —</option>
                    <?php foreach ($US_STATES as $code => $name): ?>
                        <option value="<?= htmlspecialchars($code, ENT_QUOTES) ?>"
                            <?= $values['state'] === $code ? 'selected' : '' ?>>
                            <?= htmlspecialchars("$code — $name", ENT_QUOTES) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="pfm-field__error">Please select your state.</div>
            </div>

            <div class="pfm-field">
                <label for="zip_code" class="pfm-field__label">
                    ZIP Code <span class="pfm-required">*</span>
                </label>
                <input type="text" id="zip_code" name="zip_code"
                       class="pfm-input" data-pfm-required maxlength="10"
                       placeholder="97201"
                       pattern="\d{5}(-\d{4})?"
                       value="<?= htmlspecialchars($values['zip_code'], ENT_QUOTES) ?>">
                <div class="pfm-field__hint">5 digits (or ZIP+4: 97201-1234).</div>
                <div class="pfm-field__error">Please enter a valid ZIP code.</div>
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
