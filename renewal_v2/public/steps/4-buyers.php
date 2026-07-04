<?php
/**
 * Step 4 — Buyers list
 *
 * Server-renders the current active buyers (and any session-removed ones),
 * then JS adds inline add/edit/remove/restore. Live count display enforces
 * the 50-buyer cap (server-side cap also enforced in BuyerManager).
 */
declare(strict_types=1);

$PFM_STEP       = 4;
$PFM_STEP_TITLE = 'Buyers';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';
require_once __DIR__ . '/../../lib/PhoneFormat.php';

// Show only currently-active buyers on first load. If the customer removes
// someone during THIS session, the row stays visible (with a Restore button)
// via JavaScript until they refresh — that's the in-session undo.
//
// Historically-removed buyers (from previous renewals / staff edits) are
// intentionally NOT shown here — they would just be confusing noise. If the
// customer wants to bring an old buyer back, they can simply add them fresh
// with the same name (and staff can merge in admin if needed).
$buyers      = BuyerManager::getActive($session->clientId);
$activeCount = count($buyers);
$maxBuyers   = BuyerManager::MAX_BUYERS;

require_once __DIR__ . '/../../lib/PhoneFormat.php';

// Overlay draft_data.contact onto the main_contact row so Step 4
// reflects Step 3 edits before the customer has submitted. Without
// this, changing the main contact's name (or email / phone) on
// Step 3 and clicking Continue produces a Step 4 card that still
// carries the pre-edit values from the members table — Larissa's
// 2026-06-30 Round 4 QA caught it on session 49 (Primary Contact
// card showed "Larissa Test Contact" even though Step 3 had been
// saved as "...Name updated at renewal").
//
// The DB values are still authoritative post-submit; submit-
// application.php writes both members.member_name/email/phone1 and
// the clients.main_contact_* mirror. This overlay is purely the
// pre-submit live-preview layer.
$draftContactPreview = $session->draftData['contact'] ?? [];
if (!empty($draftContactPreview)) {
    foreach ($buyers as &$__b) {
        if (empty($__b['main_contact'])) {
            continue;
        }
        if (isset($draftContactPreview['name'])) {
            $__nameCandidate = trim((string) $draftContactPreview['name']);
            if ($__nameCandidate !== '') {
                $__b['member_name'] = $__nameCandidate;
            }
        }
        if (isset($draftContactPreview['email'])) {
            $__b['email'] = trim((string) $draftContactPreview['email']);
        }
        if (isset($draftContactPreview['phone'])) {
            // Normalise to raw digits so the display path (pfm_format_phone)
            // and the data-buyer-phone attribute (used by the inline Edit
            // form) both see the same canonical shape submit-application
            // is going to store.
            $__b['phone1'] = pfm_normalize_phone($draftContactPreview['phone']);
        }
    }
    unset($__b);
}

// ── Pricing for the live "X buyers — base + Y additional = $A + $B = $T" line ──
// Per v3 spec line 494: "Counter updates in real time: '4 buyers — base + 1
// additional = $50 + $15 = $65 total'". Fetch the level row once on page load,
// pass the constants to JS, and let JS recompute as buyers are added/removed
// (no per-action API call needed — pricing is dollar-deterministic from count).
//
// Wrapped in try/catch because clients with no pricing_level_id throw; the page
// still works without the live total (the count + cap line still renders).
try {
    require_once __DIR__ . '/../../lib/StripeClient.php';
    $level    = StripeClient::getClientLevel($session->clientId);
    $pricing  = [
        'level_name'      => (string) $level['pricing_level'],
        'base_price'      => (float)  $level['curr_price'],
        'included_buyers' => (int)    $level['num_of_buyers'],
        'extra_per_buyer' => (float)  $level['price_after'],
    ];
} catch (\Throwable $e) {
    error_log('[renewal_v2] Step 4 pricing fetch failed for client '
        . $session->clientId . ': ' . $e->getMessage());
    $pricing = null;
}

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Your Buyers</h2>
        <p class="pfm-card__subtitle">
            Add, update, or remove the people who buy on behalf of your organisation.
            Your main contact (set on Step 3) is also counted as a buyer.
            You can have up to <?= (int) $maxBuyers ?> active members in total.
        </p>
    </div>

    <div class="pfm-counter">
        Active buyers: <strong id="pfm-buyer-count"><?= (int) $activeCount ?></strong> of <?= (int) $maxBuyers ?>
        <span class="pfm-text-muted" style="font-size: 0.85rem;">(includes main contact)</span>
    </div>

    <?php if ($pricing !== null): ?>
        <!-- Live pricing line — updated by refreshPricing() in JS as buyers
             are added/removed. Format per v3 spec line 494 (L1 compact).
             Server-renders the initial value so the line is correct on
             first paint even before JS boots. -->
        <div class="pfm-counter" id="pfm-pricing-line" style="background: var(--pfm-pink-soft, #fff5f7); margin-top: 8px; font-size: 0.95rem;">
            <?php
                $included      = (int)   $pricing['included_buyers'];
                $base          = (float) $pricing['base_price'];
                $perExtra      = (float) $pricing['extra_per_buyer'];
                $extraInitial  = max(0, (int) $activeCount - $included);
                $totalInitial  = $base + ($extraInitial * $perExtra);
                $extraCharge   = $extraInitial * $perExtra;
            ?>
            <strong id="pfm-pricing-count"><?= (int) $activeCount ?></strong> buyers
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
    <?php endif; ?>

    <!--
        Buyer card layout (2026-06-17 redesign per user test feedback —
        previously only name + a "email · phone" meta line was visible,
        which made admin-added buyers look almost empty because the
        Add Member admin form often skips email/phone). The new card
        surfaces every field the buyer record carries — name, email,
        phone, note — each labelled, with subtle placeholder text for
        empty values so the customer can tell at a glance which fields
        need filling in.
    -->
    <ul class="pfm-buyer-list" id="pfm-buyer-list">
        <?php foreach ($buyers as $b): ?>
            <?php
                $bName    = (string) ($b['member_name'] ?? '');
                $bEmail   = (string) ($b['email']       ?? '');
                $bPhone   = (string) ($b['phone1']      ?? '');
                $bNote    = (string) ($b['note']        ?? '');
                $isPrimary = !empty($b['main_contact']);
            ?>
            <li class="pfm-buyer <?= $b['is_active'] ? '' : 'pfm-buyer--removed' ?> <?= $isPrimary ? 'pfm-buyer--primary' : '' ?>"
                data-member-id="<?= (int) $b['member_id'] ?>"
                data-active="<?= $b['is_active'] ? '1' : '0' ?>"
                data-primary="<?= $isPrimary ? '1' : '0' ?>"
                data-buyer-name="<?= htmlspecialchars($bName, ENT_QUOTES) ?>"
                data-buyer-email="<?= htmlspecialchars($bEmail, ENT_QUOTES) ?>"
                data-buyer-phone="<?= htmlspecialchars($bPhone, ENT_QUOTES) ?>"
                data-buyer-note="<?= htmlspecialchars($bNote, ENT_QUOTES) ?>">
                <div class="pfm-buyer__avatar"><?= strtoupper(substr($bName !== '' ? $bName : '?', 0, 1)) ?></div>
                <div class="pfm-buyer__info">
                    <p class="pfm-buyer__name">
                        <?= htmlspecialchars($bName !== '' ? $bName : 'Unnamed buyer') ?>
                        <?php if ($isPrimary): ?>
                            <span class="pfm-badge pfm-badge--primary"
                                  style="display:inline-block; margin-left:8px; padding:2px 8px; background:#727cf5; color:#fff; border-radius:10px; font-size:0.7rem; font-weight:600; vertical-align:middle;">
                                Primary Contact
                            </span>
                        <?php endif; ?>
                    </p>
                    <p class="pfm-buyer__meta">
                        <span class="pfm-buyer__label">Email:</span>
                        <?php if ($bEmail !== ''): ?>
                            <?= htmlspecialchars($bEmail) ?>
                        <?php else: ?>
                            <span class="pfm-text-muted"><em>not provided</em></span>
                        <?php endif; ?>
                    </p>
                    <p class="pfm-buyer__meta">
                        <span class="pfm-buyer__label">Phone:</span>
                        <?php if ($bPhone !== ''): ?>
                            <?= htmlspecialchars(pfm_format_phone($bPhone)) ?>
                        <?php else: ?>
                            <span class="pfm-text-muted"><em>not provided</em></span>
                        <?php endif; ?>
                    </p>
                    <?php if ($bNote !== ''): ?>
                        <p class="pfm-buyer__meta">
                            <span class="pfm-buyer__label">Note:</span>
                            <?= htmlspecialchars($bNote) ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="pfm-buyer__actions">
                    <?php if ($isPrimary): ?>
                        <!-- Main contact row: edited on Step 3, not here. Surface a small link
                             so the customer knows where to go if they want to change it. -->
                        <a class="pfm-btn pfm-btn--ghost pfm-btn--sm"
                           href="<?= htmlspecialchars(pfm_step_url(3)) ?>"
                           title="Edit the main contact on Step 3">
                            Edit on Step 3 &rarr;
                        </a>
                    <?php elseif ($b['is_active']): ?>
                        <button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-pfm-edit>Edit</button>
                        <button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-remove>Remove</button>
                    <?php else: ?>
                        <button type="button" class="pfm-btn pfm-btn--secondary pfm-btn--sm" data-pfm-restore>Restore</button>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Add-buyer inline form -->
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
        <a href="<?= htmlspecialchars(pfm_step_url(3)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
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
    var maxBuyers = <?= (int) $maxBuyers ?>;
    var nextBtn   = document.getElementById('pfm-next');

    function activeCount() {
        return list.querySelectorAll('[data-active="1"]').length;
    }
    function refreshCounter() {
        counter.textContent = activeCount();
        addBtn.disabled = activeCount() >= maxBuyers;
        nextBtn.style.opacity = activeCount() < 1 ? '0.6' : '';
        refreshPricing();
    }

    // ── Live pricing line update (v3 spec C7 — refreshes as buyers change) ──
    // Constants are passed from the server (PHP $pricing) at page load.
    // Calculation is the same as StripeClient::calculateAmountCents():
    //   total = base + max(0, buyerCount - included) * extra_per_buyer
    // The pricing display node is rebuilt rather than partially mutated so
    // the "base = $50 total" vs "base + 2 additional = ..." layouts can
    // switch cleanly as the count crosses the included threshold.
    var pricing = <?= $pricing !== null ? json_encode([
        'base_price'      => (float) $pricing['base_price'],
        'included_buyers' => (int)   $pricing['included_buyers'],
        'extra_per_buyer' => (float) $pricing['extra_per_buyer'],
    ]) : 'null' ?>;

    function fmtMoney(n) {
        return Number(n).toFixed(2);
    }

    function refreshPricing() {
        if (!pricing) return; // graceful — pricing block didn't render
        var node = document.getElementById('pfm-pricing-line');
        if (!node) return;

        var count       = activeCount();
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
    refreshCounter();

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }

    // Phone formatter — mirrors lib/PhoneFormat.php's
    // pfm_format_phone() rule so server-rendered cards (initial paint
    // + Step 6 review + admin review) and JS-rendered cards (new
    // wizard buyer added, inline-edited buyer) read identically:
    //   10 digits, first digit != 0 -> (XXX) XXX-XXXX
    //   11 digits leading 1, area not 0 -> 1 (XXX) XXX-XXXX
    //   else -> raw input (leading-zero international numbers and
    //           partial entries stay readable).
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

    // ── Add buyer ────────────────────────────────────────
    addBtn.addEventListener('click', function () {
        var name = nameIn.value.trim();
        if (!name) {
            PFM.toast.show('Please enter the buyer\'s name.', 'danger');
            nameIn.focus();
            return;
        }
        if (activeCount() >= maxBuyers) {
            PFM.toast.show('You\'ve reached the maximum of ' + maxBuyers + ' buyers.', 'warning');
            return;
        }
        addBtn.disabled = true;

        PFM.api.post('add-buyer.php', {
            name: name,
            email: emailIn.value.trim(),
            phone: phoneIn.value.trim(),
            note: noteIn.value.trim(),
        }).then(function (data) {
            // Render the new buyer row using the same labelled layout
            // PHP renders on the initial Step 4 paint (Name + Email +
            // Phone + Note rows, each labelled, with a muted
            // "not provided" placeholder for blank fields and the phone
            // formatted via the NANPA rule from lib/PhoneFormat.php).
            // Earlier this branch built a single-line compact card that
            // also bypassed the phone formatter — Larissa's 2026-06-27
            // setup added two wizard buyers and saw their raw digits
            // "5035559999" sit underneath the main contact's formatted
            // "(503) 555-1234", an obvious inconsistency in the same
            // list. A refresh would have fixed it (PHP re-renders from
            // the DB on next paint), but the customer shouldn't have to
            // refresh to get a consistent view.
            var emailRaw = emailIn.value.trim();
            var phoneRaw = phoneIn.value.trim();
            var noteRaw  = noteIn.value.trim();
            var phoneDisplay = formatPhoneForDisplay(phoneRaw);

            var li = document.createElement('li');
            li.className = 'pfm-buyer';
            li.setAttribute('data-member-id', String(data.member_id));
            li.setAttribute('data-active', '1');
            li.setAttribute('data-primary', '0');
            li.setAttribute('data-buyer-name',  name);
            li.setAttribute('data-buyer-email', emailRaw);
            li.setAttribute('data-buyer-phone', phoneRaw);
            li.setAttribute('data-buyer-note',  noteRaw);
            li.innerHTML =
                '<div class="pfm-buyer__avatar">' + escapeHtml(name.charAt(0).toUpperCase()) + '</div>' +
                '<div class="pfm-buyer__info">' +
                    '<p class="pfm-buyer__name">' + escapeHtml(name) + '</p>' +
                    '<p class="pfm-buyer__meta">' +
                        '<span class="pfm-buyer__label">Email:</span> ' +
                        (emailRaw ? escapeHtml(emailRaw) :
                            '<span class="pfm-text-muted"><em>not provided</em></span>') +
                    '</p>' +
                    '<p class="pfm-buyer__meta">' +
                        '<span class="pfm-buyer__label">Phone:</span> ' +
                        (phoneRaw ? escapeHtml(phoneDisplay) :
                            '<span class="pfm-text-muted"><em>not provided</em></span>') +
                    '</p>' +
                    (noteRaw ?
                        '<p class="pfm-buyer__meta">' +
                            '<span class="pfm-buyer__label">Note:</span> ' + escapeHtml(noteRaw) +
                        '</p>'
                        : '') +
                '</div>' +
                '<div class="pfm-buyer__actions">' +
                    '<button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-pfm-edit>Edit</button>' +
                    '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-remove>Remove</button>' +
                '</div>';
            list.appendChild(li);
            bindRow(li);

            nameIn.value = emailIn.value = phoneIn.value = noteIn.value = '';
            refreshCounter();
            PFM.toast.show('Buyer added.', 'success');
        }).catch(function (err) {
            PFM.toast.show(err.message || 'Could not add buyer.', 'danger');
        }).finally(function () {
            addBtn.disabled = activeCount() >= maxBuyers;
            nameIn.focus();
        });
    });

    // ── Remove / Restore ────────────────────────────────
    function bindRow(li) {
        li.querySelectorAll('[data-pfm-remove]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if (!confirm('Remove this buyer?')) return;
                var id = li.getAttribute('data-member-id');
                PFM.api.post('remove-buyer.php', { member_id: id })
                    .then(function () {
                        li.setAttribute('data-active', '0');
                        li.classList.add('pfm-buyer--removed');
                        li.querySelector('.pfm-buyer__actions').innerHTML =
                            '<button type="button" class="pfm-btn pfm-btn--secondary pfm-btn--sm" data-pfm-restore>Restore</button>';
                        bindRow(li);
                        refreshCounter();
                        PFM.toast.show('Buyer removed.', 'info');
                    })
                    .catch(function (err) { PFM.toast.show(err.message || 'Could not remove.', 'danger'); });
            });
        });
        li.querySelectorAll('[data-pfm-restore]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                if (activeCount() >= maxBuyers) {
                    PFM.toast.show('You\'ve reached the maximum of ' + maxBuyers + ' buyers.', 'warning');
                    return;
                }
                var id = li.getAttribute('data-member-id');
                PFM.api.post('restore-buyer.php', { member_id: id })
                    .then(function () {
                        li.setAttribute('data-active', '1');
                        li.classList.remove('pfm-buyer--removed');
                        li.querySelector('.pfm-buyer__actions').innerHTML =
                            '<button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-pfm-edit>Edit</button>' +
                            '<button type="button" class="pfm-btn pfm-btn--danger pfm-btn--sm" data-pfm-remove>Remove</button>';
                        bindRow(li);
                        refreshCounter();
                        PFM.toast.show('Buyer restored.', 'success');
                    })
                    .catch(function (err) { PFM.toast.show(err.message || 'Could not restore.', 'danger'); });
            });
        });
        li.querySelectorAll('[data-pfm-edit]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                editBuyer(li);
            });
        });
    }

    // Edit-in-place: swap the buyer card's info block for a 4-field form
    // (name + email + phone + note) inline. Save POSTs to modify-buyer.php
    // and rebuilds the display rows. Cancel restores the original markup.
    // Replaces the older prompt()-chain UX (jarring on mobile, no note
    // editing, didn't let staff see what they were typing in context).
    function editBuyer(li) {
        // Bail if this row is already showing the edit form.
        if (li.classList.contains('pfm-buyer--editing')) return;

        var infoEl    = li.querySelector('.pfm-buyer__info');
        var actionsEl = li.querySelector('.pfm-buyer__actions');
        if (!infoEl || !actionsEl) return;

        var memberId     = li.getAttribute('data-member-id');
        var currentName  = li.getAttribute('data-buyer-name')  || '';
        var currentEmail = li.getAttribute('data-buyer-email') || '';
        var currentPhone = li.getAttribute('data-buyer-phone') || '';
        var currentNote  = li.getAttribute('data-buyer-note')  || '';

        var infoSnapshot    = infoEl.innerHTML;
        var actionsSnapshot = actionsEl.innerHTML;

        li.classList.add('pfm-buyer--editing');

        infoEl.innerHTML =
            '<div class="pfm-grid pfm-grid--2" style="gap:10px;">' +
                '<label class="pfm-field" style="margin:0;">' +
                    '<span class="pfm-field__label">Full Name *</span>' +
                    '<input type="text" class="pfm-input" data-edit-name maxlength="255" value="' + escapeHtml(currentName) + '">' +
                '</label>' +
                '<label class="pfm-field" style="margin:0;">' +
                    '<span class="pfm-field__label">Email</span>' +
                    '<input type="email" class="pfm-input" data-edit-email maxlength="255" value="' + escapeHtml(currentEmail) + '">' +
                '</label>' +
                '<label class="pfm-field" style="margin:0;">' +
                    '<span class="pfm-field__label">Phone</span>' +
                    '<input type="tel" class="pfm-input" data-edit-phone maxlength="100" value="' + escapeHtml(currentPhone) + '">' +
                '</label>' +
                '<label class="pfm-field" style="margin:0;">' +
                    '<span class="pfm-field__label">Note</span>' +
                    '<input type="text" class="pfm-input" data-edit-note maxlength="255" value="' + escapeHtml(currentNote) + '">' +
                '</label>' +
            '</div>';

        actionsEl.innerHTML =
            '<button type="button" class="pfm-btn pfm-btn--primary pfm-btn--sm" data-edit-save>Save</button> ' +
            '<button type="button" class="pfm-btn pfm-btn--ghost pfm-btn--sm" data-edit-cancel>Cancel</button>';

        var restoreCard = function () {
            infoEl.innerHTML    = infoSnapshot;
            actionsEl.innerHTML = actionsSnapshot;
            li.classList.remove('pfm-buyer--editing');
            // Re-bind because we just swapped the buttons back in.
            bindRow(li);
        };

        actionsEl.querySelector('[data-edit-cancel]').addEventListener('click', restoreCard);

        actionsEl.querySelector('[data-edit-save]').addEventListener('click', function () {
            var newName  = (infoEl.querySelector('[data-edit-name]').value  || '').trim();
            var newEmail = (infoEl.querySelector('[data-edit-email]').value || '').trim();
            var newPhone = (infoEl.querySelector('[data-edit-phone]').value || '').trim();
            var newNote  = (infoEl.querySelector('[data-edit-note]').value  || '').trim();

            if (newName === '') {
                PFM.toast.show('Buyer name cannot be empty.', 'danger');
                return;
            }

            var fields = {};
            if (newName  !== currentName)  fields.member_name = newName;
            if (newEmail !== currentEmail) fields.email       = newEmail;
            if (newPhone !== currentPhone) fields.phone1      = newPhone;
            if (newNote  !== currentNote)  fields.note        = newNote;

            if (Object.keys(fields).length === 0) {
                restoreCard();
                return;
            }

            PFM.api.post('modify-buyer.php', {
                member_id: memberId,
                fields: JSON.stringify(fields),
            }).then(function () {
                // Persist the edited values back to the data-* attributes so
                // the next Edit click starts from the new values without a
                // full page reload.
                li.setAttribute('data-buyer-name',  newName);
                li.setAttribute('data-buyer-email', newEmail);
                li.setAttribute('data-buyer-phone', newPhone);
                li.setAttribute('data-buyer-note',  newNote);

                infoEl.innerHTML =
                    '<p class="pfm-buyer__name">' + escapeHtml(newName) + '</p>' +
                    '<p class="pfm-buyer__meta">' +
                        '<span class="pfm-buyer__label">Email:</span> ' +
                        (newEmail ? escapeHtml(newEmail) :
                            '<span class="pfm-text-muted"><em>not provided</em></span>') +
                    '</p>' +
                    '<p class="pfm-buyer__meta">' +
                        '<span class="pfm-buyer__label">Phone:</span> ' +
                        (newPhone ? escapeHtml(formatPhoneForDisplay(newPhone)) :
                            '<span class="pfm-text-muted"><em>not provided</em></span>') +
                    '</p>' +
                    (newNote ?
                        '<p class="pfm-buyer__meta">' +
                            '<span class="pfm-buyer__label">Note:</span> ' + escapeHtml(newNote) +
                        '</p>' : '');

                actionsEl.innerHTML = actionsSnapshot;
                li.classList.remove('pfm-buyer--editing');
                bindRow(li);

                PFM.toast.show('Buyer updated.', 'success');
            }).catch(function (err) {
                PFM.toast.show(err.message || 'Could not update.', 'danger');
            });
        });
    }

    // Bind existing rows
    list.querySelectorAll('.pfm-buyer').forEach(bindRow);

    // Continue button — guard against two common UX mistakes:
    //   1. No active buyers at all
    //   2. Customer typed buyer info but forgot to click "+ Save buyer"
    //      (we'd skip Step 4 with that buyer never saved to the DB)
    nextBtn.addEventListener('click', function () {
        // (a) Unsaved buyer info in the form?
        var typedName  = nameIn.value.trim();
        var typedEmail = emailIn.value.trim();
        var typedPhone = phoneIn.value.trim();
        var typedNote  = noteIn.value.trim();
        if (typedName || typedEmail || typedPhone || typedNote) {
            PFM.toast.show(
                'You\'ve typed a buyer but haven\'t saved them yet. Click "+ Save buyer" first, ' +
                'or clear the form fields to continue.',
                'warning',
                7000
            );
            nameIn.focus();
            return;
        }

        // (b) Must have at least one active buyer
        if (activeCount() < 1) {
            PFM.toast.show('You need at least one active buyer to continue.', 'danger');
            return;
        }

        // All good — proceed
        window.location.href = <?= json_encode(pfm_step_url(5)) ?>;
    });
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
