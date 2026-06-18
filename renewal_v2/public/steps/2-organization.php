<?php
/**
 * Step 2 — Organisation Information
 *
 * Collects:
 *   - company name
 *   - business category + subcategory (cascading dropdowns matching the
 *     existing PFM admin's bus_categories / bus_subcats tables)
 *   - mailing address (mailing_address + city + state + zip_code)
 *
 * Decision history:
 *   - Business Type free-text field replaced with the category /
 *     subcategory dropdowns after Larissa's Phase 6 round-1 QA on
 *     2026-06-11. Her video showed the truncation issue (the
 *     business_type column is VARCHAR(14) — too short to type
 *     "homebased floral") and she noted the wizard "did not show
 *     dropdowns for business type/category/subcategory like the
 *     original new member/customer section does."
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
    'bus_cat_id'      => (int) ($draftOrg['bus_cat_id']    ?? $client['bus_cat_id']    ?? 0),
    'bus_subcat_id'   => (int) ($draftOrg['bus_subcat_id'] ?? $client['bus_subcat_id'] ?? 0),
    'mailing_address' => $draftOrg['mailing_address'] ?? $client['mailing_address'] ?? '',
    'city'            => $draftOrg['city']            ?? $client['city']            ?? '',
    'state'           => $draftOrg['state']           ?? $client['state']           ?? '',
    'zip_code'        => $draftOrg['zip_code']        ?? $client['zip_code']        ?? '',
    'website_url'     => $draftOrg['website_url']     ?? $client['website_url']     ?? '',
    'acct_instagram'  => $draftOrg['acct_instagram']  ?? $client['acct_instagram']  ?? '',
    'acct_facebook'   => $draftOrg['acct_facebook']   ?? $client['acct_facebook']   ?? '',
];

// Business category + subcategory dropdowns — match the existing admin
// form so the wizard saves the same canonical bus_cat_id / bus_subcat_id
// values staff use everywhere else. Pulled live so any future admin-side
// additions to either table appear here automatically.
$busCategories = Db::all(
    "SELECT bus_cat_id, bus_cat
       FROM bus_categories
      WHERE (active IS NULL OR active = b'1')
        AND bus_cat IS NOT NULL AND bus_cat <> ''
      ORDER BY bus_cat ASC"
);
$busSubcatsRaw = Db::all(
    "SELECT bus_subcat_id, bus_cat_id, bus_subcategory, sort_by
       FROM bus_subcats
      WHERE (active IS NULL OR active = b'1')
        AND bus_subcategory IS NOT NULL AND bus_subcategory <> ''
      ORDER BY bus_cat_id, sort_by, bus_subcategory"
);
// Group subcategories by their parent category for the JS dropdown wiring.
$busSubcatsByCat = [];
foreach ($busSubcatsRaw as $sc) {
    $busSubcatsByCat[(int) $sc['bus_cat_id']][] = [
        'id'   => (int) $sc['bus_subcat_id'],
        'name' => (string) $sc['bus_subcategory'],
    ];
}

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

    <div class="pfm-alert pfm-alert--info">
        <strong>Review and update your information.</strong>
        If anything below has changed since your last renewal — company name,
        business type, or mailing address — please update it now. The changes
        you save here are sent to staff for review along with your renewal.
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
                <label for="bus_cat_id" class="pfm-field__label">
                    Business Category <span class="pfm-required">*</span>
                </label>
                <select id="bus_cat_id" name="bus_cat_id" class="pfm-input" data-pfm-required>
                    <option value="">— Select —</option>
                    <?php foreach ($busCategories as $cat): ?>
                        <option value="<?= (int) $cat['bus_cat_id'] ?>"
                            <?= $values['bus_cat_id'] === (int) $cat['bus_cat_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars((string) $cat['bus_cat'], ENT_QUOTES) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="pfm-field__error">Please select a business category.</div>
            </div>

            <div class="pfm-field">
                <label for="bus_subcat_id" class="pfm-field__label">
                    Business Subcategory <span class="pfm-required">*</span>
                </label>
                <select id="bus_subcat_id" name="bus_subcat_id" class="pfm-input" data-pfm-required>
                    <option value="">— Select a category first —</option>
                </select>
                <div class="pfm-field__error">Please select a business subcategory.</div>
            </div>
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

        <!-- ── Online presence (added 2026-06-17 per Larissa's request) ── -->
        <h3 class="pfm-card__subtitle pfm-mt-2">Online Presence</h3>
        <p class="pfm-text-muted pfm-mb-1">
            All three are optional &mdash; fill in any that apply so we can
            keep your member profile up to date.
        </p>

        <div class="pfm-field">
            <label for="website_url" class="pfm-field__label">
                Company Website
            </label>
            <input type="url" id="website_url" name="website_url"
                   class="pfm-input" maxlength="500"
                   placeholder="https://www.example.com"
                   value="<?= htmlspecialchars($values['website_url'], ENT_QUOTES) ?>">
        </div>

        <div class="pfm-grid pfm-grid--2">
            <div class="pfm-field">
                <label for="acct_instagram" class="pfm-field__label">
                    Instagram
                </label>
                <input type="text" id="acct_instagram" name="acct_instagram"
                       class="pfm-input" maxlength="500"
                       placeholder="@yourhandle or full URL"
                       value="<?= htmlspecialchars($values['acct_instagram'], ENT_QUOTES) ?>">
            </div>

            <div class="pfm-field">
                <label for="acct_facebook" class="pfm-field__label">
                    Facebook
                </label>
                <input type="text" id="acct_facebook" name="acct_facebook"
                       class="pfm-input" maxlength="500"
                       placeholder="page name or full URL"
                       value="<?= htmlspecialchars($values['acct_facebook'], ENT_QUOTES) ?>">
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

    // Subcategory map: { catId: [{id, name}, ...], ... }
    var SUBCATS = <?= json_encode($busSubcatsByCat, JSON_UNESCAPED_UNICODE) ?>;
    var SAVED_SUBCAT_ID = <?= (int) $values['bus_subcat_id'] ?>;

    var catSelect    = document.getElementById('bus_cat_id');
    var subcatSelect = document.getElementById('bus_subcat_id');

    // Populate the subcategory dropdown for the currently-selected category.
    // Restores the saved selection on first load so the user's previous
    // subcategory survives a refresh / step navigation.
    function populateSubcats(preselectId) {
        var catId = parseInt(catSelect.value, 10) || 0;
        var list  = SUBCATS[catId] || [];
        subcatSelect.innerHTML = '';
        if (!catId) {
            subcatSelect.innerHTML = '<option value="">— Select a category first —</option>';
            return;
        }
        if (!list.length) {
            subcatSelect.innerHTML = '<option value="">— No subcategories on file —</option>';
            return;
        }
        subcatSelect.appendChild(new Option('— Select —', ''));
        list.forEach(function (sc) {
            var opt = new Option(sc.name, String(sc.id));
            if (preselectId && parseInt(preselectId, 10) === sc.id) {
                opt.selected = true;
            }
            subcatSelect.appendChild(opt);
        });
    }

    // Initial render — restore saved subcat if the saved category matches.
    populateSubcats(SAVED_SUBCAT_ID);

    // When the category changes, repopulate without a preselection and fire
    // a synthetic event so the auto-save picks up both changed fields.
    catSelect.addEventListener('change', function () {
        populateSubcats(null);
        subcatSelect.dispatchEvent(new Event('change', { bubbles: true }));
    });

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
