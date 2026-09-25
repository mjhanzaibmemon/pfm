<?php
/**
 * New-Customer Application — Step 4 — Buyers
 *
 * Sibling to public/steps/4-buyers.php (the renewal wizard's Step 4),
 * but architecturally MUCH simpler by design — this is the step where
 * Section 13.1's core finding matters most:
 *
 *   BuyerManager's entire "pending ops" model (add/remove/modify/
 *   commitPendingOps, per-buyer API endpoints hitting the `members`
 *   table with member_id references) exists to diff a customer's
 *   Step-4 edits against ALREADY-COMMITTED `members` rows tied to an
 *   existing client_id. A new applicant has no existing buyers to
 *   diff against — there is nothing "committed" yet at all. The
 *   entire buyer list is just a flat array inside
 *   `new_applications.draft_data['buyers']` until the future approval
 *   endpoint (Section 13.8) materializes real `members` rows for the
 *   first time.
 *
 * Consequence: this step needs NO per-action API endpoints
 * (add-buyer.php / remove-buyer.php / modify-buyer.php /
 * restore-buyer.php all have no equivalent here). Every add/edit/
 * remove is a pure client-side array mutation, persisted by replacing
 * the whole `buyers` key via the EXISTING save-draft.php (the same
 * endpoint Steps 2 and 3 already use) — no new backend code required
 * for buyer management itself.
 *
 * The main contact (Step 3's data) is shown here as a read-only
 * "Primary Contact" card, sourced live from draft_data['contact'] —
 * NOT duplicated into draft_data['buyers']. This avoids a sync problem
 * (editing the name on Step 3 could otherwise silently diverge from a
 * stale copy sitting in the buyers array). At approval time (Section
 * 13.8), the main contact becomes the members row with
 * main_contact=1, and draft_data['buyers'] becomes the additional
 * members rows.
 *
 * Pricing: a new applicant has no existing clients.pricing_level_id
 * to read (Section 13.4 territory) — the membership level instead
 * derives from the business category selected on Step 2
 * (bus_categories.memb_lev_id), confirmed against production data
 * during this step's design (every bus_categories row carries a
 * memb_lev_id pointing at members_level, with its own matching
 * stripe_price_id).
 */
declare(strict_types=1);

$PFM_STEP       = 4;
$PFM_STEP_TITLE = 'Buyers';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/PhoneFormat.php';

$MAX_BUYERS = 50; // matches BuyerManager::MAX_BUYERS — see this file's
                  // header comment for why this step doesn't require()
                  // BuyerManager.php at all (nothing here reads/writes
                  // the `members` table).

// Main contact, read live from Step 3's draft data — not a copy.
$mainContact = $application->draftData['contact'] ?? [];
$mcName  = (string) ($mainContact['name']  ?? '');
$mcEmail = (string) ($mainContact['email'] ?? '');
$mcPhone = (string) ($mainContact['phone'] ?? '');

// Additional buyers — a flat array, each: {name, email, phone, note}.
// No member_id — these don't exist as real records yet. The browser
// tracks rows by array index for edit/remove during this session.
$buyers = $application->draftData['buyers'] ?? [];
if (!is_array($buyers)) {
    $buyers = [];
}
$totalCount = 1 + count($buyers); // +1 for the main contact

// ── Pricing preview, derived from Step 2's business category ───────
$orgDraft = $application->draftData['org'] ?? [];
$busCatId = (int) ($orgDraft['bus_cat_id'] ?? 0);
$pricing  = null;
$levelRow = NewApplication::getLevelForCategory($busCatId);
if ($levelRow !== null) {
    $pricing = [
        'level_name'      => (string) $levelRow['pricing_level'],
        'base_price'      => (float)  $levelRow['curr_price'],
        'included_buyers' => (int)    $levelRow['num_of_buyers'],
        'extra_per_buyer' => (float)  $levelRow['price_after'],
    ];
}

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Your Buyers</h2>
        <p class="pfm-card__subtitle">
            Add anyone else who will use your Buyer's Pass. Your main
            contact (from the previous step) is automatically included.
            You can have up to <?= (int) $MAX_BUYERS ?> total.
        </p>
    </div>

    <div class="pfm-counter">
        Total buyers: <strong id="pfm-buyer-count"><?= (int) $totalCount ?></strong> of <?= (int) $MAX_BUYERS ?>
        <span class="pfm-text-muted" style="font-size: 0.85rem;">(includes main contact)</span>
    </div>

    <?php if ($pricing !== null): ?>
        <div class="pfm-counter" id="pfm-pricing-line" style="background: var(--pfm-pink-soft, #fff5f7); margin-top: 8px; font-size: 0.95rem;">
            <?php
                $included     = (int)   $pricing['included_buyers'];
                $base         = (float) $pricing['base_price'];
                $perExtra     = (float) $pricing['extra_per_buyer'];
                $extraInitial = max(0, $totalCount - $included);
                $totalInitial = $base + ($extraInitial * $perExtra);
                $extraCharge  = $extraInitial * $perExtra;
            ?>
            <strong id="pfm-pricing-count"><?= (int) $totalCount ?></strong> buyers
            <span class="pfm-text-muted" style="font-size:0.85rem;">(including main contact)</span> &mdash;
            <?php if ($extraInitial > 0): ?>
                base + <span id="pfm-pricing-extra-n"><?= $extraInitial ?></span> additional =
                $<span id="pfm-pricing-base"><?= number_format($base, 2) ?></span>
                + $<span id="pfm-pricing-extra-charge"><?= number_format($extraCharge, 2) ?></span>
                = <strong>$<span id="pfm-pricing-total"><?= number_format($totalInitial, 2) ?></span> total</strong>
            <?php else: ?>
                base =
                <strong>$<span id="pfm-pricing-total"><?= number_format($base, 2) ?></span> total</strong>
                <span class="pfm-text-muted" style="font-size: 0.85rem;">
                    (<?= $included ?> included; $<?= number_format($perExtra, 2) ?> each additional)
                </span>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning pfm-mt-1">
            We couldn't determine your membership pricing yet — please
            confirm a Business Category on the previous step.
        </div>
    <?php endif; ?>

    <ul class="pfm-buyer-list" id="pfm-buyer-list">
        <!-- Main contact — read-only here, edited on Step 3 -->
        <li class="pfm-buyer pfm-buyer--primary">
            <div class="pfm-buyer__avatar"><?= htmlspecialchars(strtoupper(substr($mcName !== '' ? $mcName : '?', 0, 1))) ?></div>
            <div class="pfm-buyer__info">
                <p class="pfm-buyer__name">
                    <?= htmlspecialchars($mcName !== '' ? $mcName : 'Unnamed contact') ?>
                    <span class="pfm-badge pfm-badge--primary"
                          style="display:inline-block; margin-left:8px; padding:2px 8px; background:#727cf5; color:#fff; border-radius:10px; font-size:0.7rem; font-weight:600; vertical-align:middle;">
                        Primary Contact
                    </span>
                </p>
                <p class="pfm-buyer__meta">
                    <span class="pfm-buyer__label">Email:</span>
                    <?= $mcEmail !== '' ? htmlspecialchars($mcEmail) : '<span class="pfm-text-muted"><em>not provided</em></span>' ?>
                </p>
                <p class="pfm-buyer__meta">
                    <span class="pfm-buyer__label">Phone:</span>
                    <?= $mcPhone !== '' ? htmlspecialchars(pfm_format_phone($mcPhone)) : '<span class="pfm-text-muted"><em>not provided</em></span>' ?>
                </p>
            </div>
            <div class="pfm-buyer__actions">
                <a class="pfm-btn pfm-btn--ghost pfm-btn--sm" href="<?= htmlspecialchars(pfm_apply_step_url(3)) ?>"
                   title="Edit the main contact on Step 3">
                    Edit on Step 3 &rarr;
                </a>
            </div>
        </li>

        <?php foreach ($buyers as $idx => $b): ?>
            <?php
                $bName  = (string) ($b['name']  ?? '');
                $bEmail = (string) ($b['email'] ?? '');
                $bPhone = (string) ($b['phone'] ?? '');
                $bNote  = (string) ($b['note']  ?? '');
            ?>
            <li class="pfm-buyer" data-buyer-idx="<?= (int) $idx ?>"
                data-buyer-name="<?= htmlspecialchars($bName, ENT_QUOTES) ?>"
                data-buyer-email="<?= htmlspecialchars($bEmail, ENT_QUOTES) ?>"
                data-buyer-phone="<?= htmlspecialchars($bPhone, ENT_QUOTES) ?>"
                data-buyer-note="<?= htmlspecialchars($bNote, ENT_QUOTES) ?>">
                <div class="pfm-buyer__avatar"><?= htmlspecialchars(strtoupper(substr($bName !== '' ? $bName : '?', 0, 1))) ?></div>
                <div class="pfm-buyer__info">
                    <p class="pfm-buyer__name"><?= htmlspecialchars($bName !== '' ? $bName : 'Unnamed buyer') ?></p>
                    <p class="pfm-buyer__meta">
                        <span class="pfm-buyer__label">Email:</span>
                        <?= $bEmail !== '' ? htmlspecialchars($bEmail) : '<span class="pfm-text-muted"><em>not provided</em></span>' ?>
                    </p>
                    <p class="pfm-buyer__meta">
                        <span class="pfm-buyer__label">Phone:</span>
                        <?= $bPhone !== '' ? htmlspecialchars(pfm_format_phone($bPhone)) : '<span class="pfm-text-muted"><em>not provided</em></span>' ?>
                    </p>
                    <?php if ($bNote !== ''): ?>
                        <p class="pfm-buyer__meta">
                            <span class="pfm-buyer__label">Note:</span> <?= htmlspecialchars($bNote) ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="pfm-buyer__actions">
                    <button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-pfm-edit>Edit</button>
                    <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-remove>Remove</button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <div id="pfm-add-form" class="pfm-card" style="background: var(--pfm-pink-soft); padding: 16px 18px; margin-bottom: 0;">
        <h3 class="pfm-mt-0 pfm-mb-1">Add a Buyer</h3>
        <div class="pfm-grid pfm-grid--2">
            <div class="pfm-field">
                <label class="pfm-field__label">Full Name <span class="pfm-required">*</span></label>
                <input type="text" id="pfm-new-name" class="pfm-input" maxlength="255">
            </div>
            <div class="pfm-field">
                <label class="pfm-field__label">Email</label>
                <input type="email" id="pfm-new-email" class="pfm-input" maxlength="255">
            </div>
            <div class="pfm-field">
                <label class="pfm-field__label">Phone</label>
                <input type="tel" id="pfm-new-phone" class="pfm-input" maxlength="100">
            </div>
            <div class="pfm-field">
                <label class="pfm-field__label">Note (optional)</label>
                <input type="text" id="pfm-new-note" class="pfm-input" maxlength="255">
            </div>
        </div>
        <div class="pfm-mt-1">
            <button type="button" id="pfm-add-btn" class="pfm-btn pfm-btn--primary pfm-btn--sm">+ Save buyer</button>
        </div>
    </div>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_apply_step_url(3)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
            &larr; Back
        </a>
        <span data-pfm-savestate class="pfm-nav__save"></span>
        <button type="button" class="pfm-btn pfm-btn--primary" id="pfm-next">
            Continue &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var list      = document.getElementById('pfm-buyer-list');
    var counter   = document.getElementById('pfm-buyer-count');
    var addBtn    = document.getElementById('pfm-add-btn');
    var nameIn    = document.getElementById('pfm-new-name');
    var emailIn   = document.getElementById('pfm-new-email');
    var phoneIn   = document.getElementById('pfm-new-phone');
    var noteIn    = document.getElementById('pfm-new-note');
    var maxBuyers = <?= (int) $MAX_BUYERS ?>;
    var nextBtn   = document.getElementById('pfm-next');

    // The whole buyers array lives here client-side and is persisted
    // as one unit via save-draft.php — no per-buyer API calls (see
    // this file's top doc-comment for why that's correct for a new
    // application, not a shortcut).
    var buyers = <?= json_encode(array_values($buyers), JSON_UNESCAPED_UNICODE) ?>;

    var pricing = <?= $pricing !== null ? json_encode([
        'base_price'      => (float) $pricing['base_price'],
        'included_buyers' => (int)   $pricing['included_buyers'],
        'extra_per_buyer' => (float) $pricing['extra_per_buyer'],
    ]) : 'null' ?>;

    function totalCount() {
        return 1 + buyers.length; // +1 = main contact, always present
    }

    function fmtMoney(n) { return Number(n).toFixed(2); }

    function refreshPricing() {
        if (!pricing) return;
        var node = document.getElementById('pfm-pricing-line');
        if (!node) return;
        var count       = totalCount();
        var extra       = Math.max(0, count - pricing.included_buyers);
        var extraCharge = extra * pricing.extra_per_buyer;
        var total       = pricing.base_price + extraCharge;
        var html = '<strong>' + count + '</strong> buyers &mdash; ';
        if (extra > 0) {
            html += 'base + <strong>' + extra + '</strong> additional = '
                  + '$' + fmtMoney(pricing.base_price)
                  + ' + $' + fmtMoney(extraCharge)
                  + ' = <strong>$' + fmtMoney(total) + ' total</strong>';
        } else {
            html += 'base = <strong>$' + fmtMoney(total) + ' total</strong>'
                  + ' <span class="pfm-text-muted" style="font-size: 0.85rem;">'
                  + '(' + pricing.included_buyers + ' buyers included; '
                  + '$' + fmtMoney(pricing.extra_per_buyer) + ' each additional)'
                  + '</span>';
        }
        node.innerHTML = html;
    }

    function persistBuyers() {
        // Full-array replace via the SAME save-draft.php Steps 2/3
        // already use — no new endpoint needed for this step.
        PFM.api.post('save-draft.php', { data: JSON.stringify({ buyers: buyers }) })
            .catch(function (err) {
                PFM.toast.show(err.message || 'Could not save buyers.', 'danger');
            });
    }

    function refreshUI() {
        counter.textContent = totalCount();
        addBtn.disabled = totalCount() >= maxBuyers;
        refreshPricing();
    }

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    function formatPhoneForDisplay(raw) {
        var s = String(raw == null ? '' : raw);
        var d = s.replace(/\D+/g, '');
        if (d.length === 10 && d.charAt(0) !== '0') {
            return '(' + d.slice(0, 3) + ') ' + d.slice(3, 6) + '-' + d.slice(6);
        }
        if (d.length === 11 && d.charAt(0) === '1' && d.charAt(1) !== '0') {
            return '1 (' + d.slice(1, 4) + ') ' + d.slice(4, 7) + '-' + d.slice(7);
        }
        return s;
    }

    function buildRow(idx, b) {
        var li = document.createElement('li');
        li.className = 'pfm-buyer';
        li.setAttribute('data-buyer-idx', String(idx));
        li.setAttribute('data-buyer-name',  b.name  || '');
        li.setAttribute('data-buyer-email', b.email || '');
        li.setAttribute('data-buyer-phone', b.phone || '');
        li.setAttribute('data-buyer-note',  b.note  || '');
        renderRowBody(li, b);
        bindRow(li);
        return li;
    }

    function renderRowBody(li, b) {
        var name  = b.name  || '';
        var email = b.email || '';
        var phone = b.phone || '';
        var note  = b.note  || '';
        li.innerHTML =
            '<div class="pfm-buyer__avatar">' + escapeHtml((name.charAt(0) || '?').toUpperCase()) + '</div>' +
            '<div class="pfm-buyer__info">' +
                '<p class="pfm-buyer__name">' + escapeHtml(name || 'Unnamed buyer') + '</p>' +
                '<p class="pfm-buyer__meta"><span class="pfm-buyer__label">Email:</span> ' +
                    (email ? escapeHtml(email) : '<span class="pfm-text-muted"><em>not provided</em></span>') + '</p>' +
                '<p class="pfm-buyer__meta"><span class="pfm-buyer__label">Phone:</span> ' +
                    (phone ? escapeHtml(formatPhoneForDisplay(phone)) : '<span class="pfm-text-muted"><em>not provided</em></span>') + '</p>' +
                (note ? '<p class="pfm-buyer__meta"><span class="pfm-buyer__label">Note:</span> ' + escapeHtml(note) + '</p>' : '') +
            '</div>' +
            '<div class="pfm-buyer__actions">' +
                '<button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-pfm-edit>Edit</button>' +
                '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-remove>Remove</button>' +
            '</div>';
    }

    function reindexRows() {
        // After a removal, every row after it shifts down one array
        // index — refresh each li's data-buyer-idx to match so a
        // subsequent edit/remove targets the right array element.
        list.querySelectorAll('.pfm-buyer:not(.pfm-buyer--primary)').forEach(function (li, i) {
            li.setAttribute('data-buyer-idx', String(i));
        });
    }

    function bindRow(li) {
        var removeBtn = li.querySelector('[data-pfm-remove]');
        if (removeBtn) {
            removeBtn.addEventListener('click', function () {
                if (!confirm('Remove this buyer?')) return;
                var idx = parseInt(li.getAttribute('data-buyer-idx'), 10);
                buyers.splice(idx, 1);
                li.remove();
                reindexRows();
                refreshUI();
                persistBuyers();
                PFM.toast.show('Buyer removed.', 'info');
            });
        }
        var editBtn = li.querySelector('[data-pfm-edit]');
        if (editBtn) {
            editBtn.addEventListener('click', function () { editBuyer(li); });
        }
    }

    function editBuyer(li) {
        if (li.classList.contains('pfm-buyer--editing')) return;
        var infoEl    = li.querySelector('.pfm-buyer__info');
        var actionsEl = li.querySelector('.pfm-buyer__actions');
        if (!infoEl || !actionsEl) return;

        var idx = parseInt(li.getAttribute('data-buyer-idx'), 10);
        var currentName  = li.getAttribute('data-buyer-name')  || '';
        var currentEmail = li.getAttribute('data-buyer-email') || '';
        var currentPhone = li.getAttribute('data-buyer-phone') || '';
        var currentNote  = li.getAttribute('data-buyer-note')  || '';

        var infoSnapshot    = infoEl.innerHTML;
        var actionsSnapshot = actionsEl.innerHTML;
        li.classList.add('pfm-buyer--editing');

        infoEl.innerHTML =
            '<div class="pfm-grid pfm-grid--2" style="gap:10px;">' +
                '<label class="pfm-field" style="margin:0;"><span class="pfm-field__label">Full Name *</span>' +
                    '<input type="text" class="pfm-input" data-edit-name maxlength="255" value="' + escapeHtml(currentName) + '"></label>' +
                '<label class="pfm-field" style="margin:0;"><span class="pfm-field__label">Email</span>' +
                    '<input type="email" class="pfm-input" data-edit-email maxlength="255" value="' + escapeHtml(currentEmail) + '"></label>' +
                '<label class="pfm-field" style="margin:0;"><span class="pfm-field__label">Phone</span>' +
                    '<input type="tel" class="pfm-input" data-edit-phone maxlength="100" value="' + escapeHtml(currentPhone) + '"></label>' +
                '<label class="pfm-field" style="margin:0;"><span class="pfm-field__label">Note</span>' +
                    '<input type="text" class="pfm-input" data-edit-note maxlength="255" value="' + escapeHtml(currentNote) + '"></label>' +
            '</div>';
        actionsEl.innerHTML =
            '<button type="button" class="pfm-btn pfm-btn--primary pfm-btn--sm" data-edit-save>Save</button> ' +
            '<button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-edit-cancel>Cancel</button>';

        actionsEl.querySelector('[data-edit-cancel]').addEventListener('click', function () {
            infoEl.innerHTML = infoSnapshot;
            actionsEl.innerHTML = actionsSnapshot;
            li.classList.remove('pfm-buyer--editing');
            bindRow(li);
        });

        actionsEl.querySelector('[data-edit-save]').addEventListener('click', function () {
            var newName  = (infoEl.querySelector('[data-edit-name]').value  || '').trim();
            var newEmail = (infoEl.querySelector('[data-edit-email]').value || '').trim();
            var newPhone = (infoEl.querySelector('[data-edit-phone]').value || '').trim();
            var newNote  = (infoEl.querySelector('[data-edit-note]').value  || '').trim();

            if (newName === '') {
                PFM.toast.show('Buyer name cannot be empty.', 'danger');
                return;
            }

            buyers[idx] = { name: newName, email: newEmail, phone: newPhone, note: newNote };
            li.setAttribute('data-buyer-name',  newName);
            li.setAttribute('data-buyer-email', newEmail);
            li.setAttribute('data-buyer-phone', newPhone);
            li.setAttribute('data-buyer-note',  newNote);

            renderRowBody(li, buyers[idx]);
            li.classList.remove('pfm-buyer--editing');
            bindRow(li);
            persistBuyers();
            PFM.toast.show('Buyer updated.', 'success');
        });
    }

    // Bind rows already rendered server-side on first paint.
    list.querySelectorAll('.pfm-buyer:not(.pfm-buyer--primary)').forEach(bindRow);
    refreshUI();

    addBtn.addEventListener('click', function () {
        var name = nameIn.value.trim();
        if (!name) {
            PFM.toast.show('Please enter the buyer\'s name.', 'danger');
            nameIn.focus();
            return;
        }
        if (totalCount() >= maxBuyers) {
            PFM.toast.show('You\'ve reached the maximum of ' + maxBuyers + ' buyers.', 'warning');
            return;
        }

        var newBuyer = {
            name:  name,
            email: emailIn.value.trim(),
            phone: phoneIn.value.trim(),
            note:  noteIn.value.trim(),
        };
        buyers.push(newBuyer);
        list.appendChild(buildRow(buyers.length - 1, newBuyer));

        nameIn.value = emailIn.value = phoneIn.value = noteIn.value = '';
        refreshUI();
        persistBuyers();
        PFM.toast.show('Buyer added.', 'success');
        nameIn.focus();
    });

    nextBtn.addEventListener('click', function () {
        // Unsaved buyer info left in the Add form?
        var typedName  = nameIn.value.trim();
        var typedEmail = emailIn.value.trim();
        var typedPhone = phoneIn.value.trim();
        var typedNote  = noteIn.value.trim();
        if (typedName || typedEmail || typedPhone || typedNote) {
            PFM.toast.show(
                'You\'ve typed a buyer but haven\'t saved them yet. Click "+ Save buyer" first, ' +
                'or clear the form fields to continue.',
                'warning', 7000
            );
            nameIn.focus();
            return;
        }

        // Persist the current step number, then advance. Main contact
        // (from Step 3) always counts as one buyer, so there is no
        // "at least one buyer" gate needed here the way the renewal
        // wizard has one — Step 3 already guaranteed that.
        PFM.api.post('save-draft.php', { data: JSON.stringify({ buyers: buyers }), step: 4 })
            .then(function () {
                window.location.href = <?= json_encode(pfm_apply_step_url(5)) ?>;
            })
            .catch(function (err) {
                PFM.toast.show(err.message || 'Could not save. Please try again.', 'danger');
            });
    });
})();
</script>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
