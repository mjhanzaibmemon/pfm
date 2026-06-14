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
            You can have up to <?= (int) $maxBuyers ?> active buyers.
        </p>
    </div>

    <div class="pfm-counter">
        Active buyers: <strong id="pfm-buyer-count"><?= (int) $activeCount ?></strong> of <?= (int) $maxBuyers ?>
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
            <strong id="pfm-pricing-count"><?= (int) $activeCount ?></strong> buyers &mdash;
            <?php if ($extraInitial > 0): ?>
                base + <span id="pfm-pricing-extra-n"><?= $extraInitial ?></span> additional =
                $<span id="pfm-pricing-base"><?= number_format($base, 2) ?></span>
                + $<span id="pfm-pricing-extra-charge"><?= number_format($extraCharge, 2) ?></span>
                = <strong>$<span id="pfm-pricing-total"><?= number_format($totalInitial, 2) ?></span> total</strong>
            <?php else: ?>
                base =
                <strong>$<span id="pfm-pricing-total"><?= number_format($base, 2) ?></span> total</strong>
                <span class="pfm-text-muted" style="font-size: 0.85rem;">
                    (<?= $included ?> buyers included; $<?= number_format($perExtra, 2) ?> each additional)
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <ul class="pfm-buyer-list" id="pfm-buyer-list">
        <?php foreach ($buyers as $b): ?>
            <li class="pfm-buyer <?= $b['is_active'] ? '' : 'pfm-buyer--removed' ?>"
                data-member-id="<?= (int) $b['member_id'] ?>"
                data-active="<?= $b['is_active'] ? '1' : '0' ?>">
                <div class="pfm-buyer__avatar"><?= strtoupper(substr((string) ($b['member_name'] ?? '?'), 0, 1)) ?></div>
                <div class="pfm-buyer__info">
                    <p class="pfm-buyer__name"><?= htmlspecialchars((string) ($b['member_name'] ?? 'Unnamed')) ?></p>
                    <p class="pfm-buyer__meta">
                        <?= htmlspecialchars((string) ($b['email'] ?? '')) ?>
                        <?php if (!empty($b['phone1'])): ?>
                            &middot; <?= htmlspecialchars(pfm_format_phone((string) $b['phone1'])) ?>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="pfm-buyer__actions">
                    <?php if ($b['is_active']): ?>
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
            // Render the new buyer row
            var li = document.createElement('li');
            li.className = 'pfm-buyer';
            li.setAttribute('data-member-id', String(data.member_id));
            li.setAttribute('data-active', '1');
            li.innerHTML =
                '<div class="pfm-buyer__avatar">' + escapeHtml(name.charAt(0).toUpperCase()) + '</div>' +
                '<div class="pfm-buyer__info">' +
                    '<p class="pfm-buyer__name">' + escapeHtml(name) + '</p>' +
                    '<p class="pfm-buyer__meta">' + escapeHtml(emailIn.value.trim()) +
                    (phoneIn.value.trim() ? ' &middot; ' + escapeHtml(phoneIn.value.trim()) : '') + '</p>' +
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

    function editBuyer(li) {
        var nameEl = li.querySelector('.pfm-buyer__name');
        var metaEl = li.querySelector('.pfm-buyer__meta');
        var memberId = li.getAttribute('data-member-id');
        var currentName = nameEl.textContent;
        var currentMeta = metaEl.textContent.split(' · ');
        var currentEmail = (currentMeta[0] || '').trim();
        var currentPhone = (currentMeta[1] || '').trim();

        var newName  = prompt('Update buyer name:', currentName);
        if (newName === null) return;
        var newEmail = prompt('Update buyer email:', currentEmail);
        if (newEmail === null) return;
        var newPhone = prompt('Update buyer phone:', currentPhone);
        if (newPhone === null) return;

        var fields = {};
        if (newName.trim()  !== currentName)  fields.member_name = newName.trim();
        if (newEmail.trim() !== currentEmail) fields.email       = newEmail.trim();
        if (newPhone.trim() !== currentPhone) fields.phone1      = newPhone.trim();

        if (Object.keys(fields).length === 0) return; // no change

        PFM.api.post('modify-buyer.php', {
            member_id: memberId,
            fields: JSON.stringify(fields),
        }).then(function () {
            nameEl.textContent = newName.trim() || currentName;
            metaEl.innerHTML = (newEmail.trim() ? escapeHtml(newEmail.trim()) : '') +
                (newPhone.trim() ? ' &middot; ' + escapeHtml(newPhone.trim()) : '');
            PFM.toast.show('Buyer updated.', 'success');
        }).catch(function (err) {
            PFM.toast.show(err.message || 'Could not update.', 'danger');
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
