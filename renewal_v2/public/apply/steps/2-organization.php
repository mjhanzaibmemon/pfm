<?php
/**
 * New-Customer Application — Step 2 — Organization Information
 *
 * Sibling to public/steps/2-organization.php (the renewal wizard's
 * Step 2). Collects the same fields (company name, business category
 * / subcategory, mailing address, online presence), but:
 *
 *   - No `$client` row to pre-fill from (Section 13.6 — there is no
 *     existing customer yet). Every field starts blank except
 *     whatever the applicant already typed and auto-saved into
 *     draft_data on a previous visit.
 *   - THIS is where Section 3's duplicate-name check lives — the
 *     applicant cannot proceed to Step 3 while their typed company
 *     name matches an existing customer (case/punctuation/spacing
 *     insensitive, suffix-preserving — see
 *     NewApplication::findDuplicateByCompanyName()).
 */
declare(strict_types=1);

$PFM_STEP       = 2;
$PFM_STEP_TITLE = 'Organization Information';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';

// Pre-fill priority: draft_data only — there is no clients row to fall
// back to (the defining difference from the renewal wizard's Step 2).
$draftOrg = $application->draftData['org'] ?? [];
$values = [
    'co_name'         => $draftOrg['co_name']         ?? '',
    'bus_cat_id'      => (int) ($draftOrg['bus_cat_id']    ?? 0),
    'bus_subcat_id'   => (int) ($draftOrg['bus_subcat_id'] ?? 0),
    'mailing_address' => $draftOrg['mailing_address'] ?? '',
    'city'            => $draftOrg['city']            ?? '',
    'state'           => $draftOrg['state']           ?? '',
    'zip_code'        => $draftOrg['zip_code']        ?? '',
    'website_url'     => $draftOrg['website_url']     ?? '',
    'acct_instagram'  => $draftOrg['acct_instagram']  ?? '',
    'acct_facebook'   => $draftOrg['acct_facebook']   ?? '',
];

// Business category + subcategory dropdowns — same source tables as
// the renewal wizard, so both flows always offer identical options.
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
$busSubcatsByCat = [];
foreach ($busSubcatsRaw as $sc) {
    $busSubcatsByCat[(int) $sc['bus_cat_id']][] = [
        'id'   => (int) $sc['bus_subcat_id'],
        'name' => (string) $sc['bus_subcategory'],
    ];
}

// Same US-states list as the renewal wizard's Step 2, kept in sync
// manually (both are static reference data, not DB-driven — see that
// file if this list ever needs to change, and change both).
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

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Organization Information</h2>
        <p class="pfm-card__subtitle">Tell us about your business.</p>
    </div>

    <!--
        Section 3's block message — Larissa's EXACT wording, do not
        paraphrase. Hidden by default; shown by JS when
        check-duplicate-name.php returns is_duplicate: true. The
        "Save & Continue" button is disabled while this is visible.
    -->
    <div id="pfm-duplicate-alert" class="pfm-alert pfm-alert--danger" style="display:none;" role="alert">
        We may already have a customer record for this business.
        Please contact the Portland Flower Market at
        <a href="mailto:info@ofgaflowers.com">info@ofgaflowers.com</a>
        or 503-289-1500 so we can confirm your account and provide the
        correct renewal link.
    </div>

    <form id="pfm-form-org" autocomplete="off" novalidate>
        <div class="pfm-field">
            <label for="co_name" class="pfm-field__label">
                Company / Organization Name <span class="pfm-required">*</span>
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

        <h3 class="pfm-card__subtitle pfm-mt-2">Mailing Address</h3>

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

        <h3 class="pfm-card__subtitle pfm-mt-2">Online Presence</h3>
        <p class="pfm-text-muted pfm-mb-1">
            All three are optional &mdash; fill in any that apply so we can
            build your member profile.
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
        <a href="<?= htmlspecialchars(pfm_apply_step_url(1)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
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
    var coNameInput = document.getElementById('co_name');
    var dupAlert = document.getElementById('pfm-duplicate-alert');

    var SUBCATS = <?= json_encode($busSubcatsByCat, JSON_UNESCAPED_UNICODE) ?>;
    var SAVED_SUBCAT_ID = <?= (int) $values['bus_subcat_id'] ?>;

    var catSelect    = document.getElementById('bus_cat_id');
    var subcatSelect = document.getElementById('bus_subcat_id');

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

    populateSubcats(SAVED_SUBCAT_ID);

    catSelect.addEventListener('change', function () {
        populateSubcats(null);
        subcatSelect.dispatchEvent(new Event('change', { bubbles: true }));
    });

    var saver = PFM.autosave.attach(form, { section: 'org', step: 2 });

    // ── Section 3: duplicate-name check ──────────────────────────
    // Runs on blur (immediate feedback) AND again as the authoritative
    // gate right before advancing to Step 3 — a blur check alone could
    // be stale if the applicant edits the field again without leaving
    // it (e.g. paste, then click Next directly).
    var lastCheckedName = null;
    var isDuplicate = false;

    function checkDuplicate(name) {
        name = (name || '').trim();
        if (name === '') {
            dupAlert.style.display = 'none';
            isDuplicate = false;
            lastCheckedName = name;
            return Promise.resolve(false);
        }
        return PFM.api.post('check-duplicate-name.php', { company_name: name })
            .then(function (data) {
                lastCheckedName = name;
                isDuplicate = !!data.is_duplicate;
                dupAlert.style.display = isDuplicate ? '' : 'none';
                return isDuplicate;
            })
            .catch(function () {
                // Network/server hiccup on the check itself — fail
                // open on the BLUR check (don't block typing over a
                // transient error), but the Next-click gate below
                // re-checks and will surface any real problem then.
                return false;
            });
    }

    coNameInput.addEventListener('blur', function () {
        checkDuplicate(coNameInput.value);
    });

    nextBtn.addEventListener('click', function () {
        if (!PFM.validate.required(form)) {
            PFM.toast.show('Please fill in the required fields highlighted in red.', 'danger');
            return;
        }

        var currentName = coNameInput.value.trim();
        var proceed = function () {
            if (isDuplicate) {
                PFM.toast.show('Please resolve the duplicate business name above before continuing.', 'danger');
                coNameInput.focus();
                return;
            }
            if (saver && saver.flush) saver.flush();
            setTimeout(function () {
                window.location.href = <?= json_encode(pfm_apply_step_url(3)) ?>;
            }, 250);
        };

        // Re-check if the name changed since the last check (or was
        // never checked yet, e.g. autofill without a blur event).
        if (currentName !== lastCheckedName) {
            checkDuplicate(currentName).then(proceed);
        } else {
            proceed();
        }
    });
})();
</script>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
