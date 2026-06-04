<?php
/**
 * Step 6 — Review &amp; Submit
 *
 * Shows everything the customer entered/changed, with Edit links jumping
 * back to the relevant step. The Submit button hits submit-application.php
 * which (1) applies any org/contact edits to the live `clients` and `members`
 * tables in a transaction, (2) transitions the session to submitted, and
 * (3) creates a Stripe Checkout session, then returns the redirect URL.
 */
declare(strict_types=1);

$PFM_STEP       = 6;
$PFM_STEP_TITLE = 'Review &amp; Submit';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';

// Small inline helper used by the pricing-block markup below.
function PFM_money(float $n): string {
    return '$' . number_format($n, 2);
}

// ── Gather everything for display ───────────────────────────────────
$draftOrg     = $session->draftData['org']     ?? [];
$draftContact = $session->draftData['contact'] ?? [];
$buyers       = BuyerManager::getActive($session->clientId);
$buyerCount   = count($buyers);
$docs         = DocumentUpload::getAll($session);
$customerNote = $session->draftData['customer_note'] ?? '';

// Effective values (draft override → live DB)
$mainContact = Db::one(
    "SELECT member_name, email, phone1 FROM members
     WHERE client_id = ? AND main_contact = b'1' LIMIT 1",
    [$session->clientId]
);

$effOrg = [
    'co_name'          => $draftOrg['co_name']          ?? $client['co_name']          ?? '',
    'business_type'    => $draftOrg['business_type']    ?? $client['business_type']    ?? '',
    'business_license' => $draftOrg['business_license'] ?? $client['business_license'] ?? '',
];
$effContact = [
    'name'  => $draftContact['name']  ?? $mainContact['member_name'] ?? '',
    'email' => $draftContact['email'] ?? $mainContact['email']       ?? '',
    'phone' => $draftContact['phone'] ?? $mainContact['phone1']      ?? '',
];

// ── Pricing breakdown ───────────────────────────────────────────────
try {
    $pricing = StripeClient::pricingForClient($session->clientId, $buyerCount);
} catch (Throwable $e) {
    $pricing = null;
}

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Review Your Renewal</h2>
        <p class="pfm-card__subtitle">
            Please double-check everything below. Use the Edit links to go back and fix anything,
            or click Submit at the bottom to continue to payment.
        </p>
    </div>

    <div class="pfm-review">
        <!-- Organisation -->
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Organisation</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(2)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Company</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effOrg['co_name'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Business type</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effOrg['business_type'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Business license #</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effOrg['business_license'] ?: '—') ?></div>
            </div>
        </section>

        <!-- Main Contact -->
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Main Contact</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(3)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Name</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['name'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Email</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['email'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Phone</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['phone'] ?: '—') ?></div>
            </div>
        </section>

        <!-- Buyers -->
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Active Buyers (<?= (int) $buyerCount ?>)</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(4)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <?php if ($buyerCount === 0): ?>
                <div class="pfm-alert pfm-alert--warning pfm-mb-0">
                    You need at least one active buyer to continue. Please add one in Step 4.
                </div>
            <?php else: ?>
                <ul class="pfm-buyer-list pfm-mb-0">
                    <?php foreach ($buyers as $b): ?>
                        <li class="pfm-buyer">
                            <div class="pfm-buyer__avatar"><?= strtoupper(substr((string) ($b['member_name'] ?? '?'), 0, 1)) ?></div>
                            <div class="pfm-buyer__info">
                                <p class="pfm-buyer__name"><?= htmlspecialchars((string) ($b['member_name'] ?? '')) ?></p>
                                <p class="pfm-buyer__meta">
                                    <?= htmlspecialchars((string) ($b['email'] ?? '')) ?>
                                    <?php if (!empty($b['phone1'])): ?>
                                        &middot; <?= htmlspecialchars((string) $b['phone1']) ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

        <!-- Documents -->
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Documents</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(5)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <?php if (empty($docs)): ?>
                <div class="pfm-text-muted">No documents uploaded.</div>
            <?php else: ?>
                <ul class="pfm-file-list pfm-mb-0">
                    <?php foreach ($docs as $k => $d): ?>
                        <li class="pfm-file">
                            <span>&#128206;</span>
                            <span class="pfm-file__name"><?= htmlspecialchars($d['original_name']) ?></span>
                            <span class="pfm-file__meta">
                                <?= number_format(($d['size'] ?? 0) / 1024, 0) ?>&nbsp;KB
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

        <!-- Note -->
        <?php if (trim((string) $customerNote) !== ''): ?>
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Your Note</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(5)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-text-muted" style="white-space: pre-wrap;"><?= htmlspecialchars((string) $customerNote) ?></div>
        </section>
        <?php endif; ?>

        <!-- Pricing -->
        <?php if ($pricing): ?>
        <section class="pfm-review__section" style="background: #fff;">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Renewal Total</h3>
                <span class="pfm-text-muted" style="font-size: 0.82rem;">
                    <?= htmlspecialchars((string) $pricing['level_name']) ?>
                </span>
            </div>
            <div class="pfm-pricing">
                <div class="pfm-pricing__row">
                    <div>Base membership (<?= (int) $pricing['included_buyers'] ?> buyers included)</div>
                    <div><?= PFM_money($pricing['base_price']) ?></div>
                </div>
                <?php if ($pricing['extra_buyers'] > 0): ?>
                <div class="pfm-pricing__row">
                    <div>
                        <?= (int) $pricing['extra_buyers'] ?> additional buyer<?= $pricing['extra_buyers'] === 1 ? '' : 's' ?>
                        @ <?= PFM_money($pricing['extra_per_buyer']) ?> each
                    </div>
                    <div><?= PFM_money($pricing['extra_charge']) ?></div>
                </div>
                <?php endif; ?>
                <div class="pfm-pricing__row pfm-pricing__row--total">
                    <div>Total due</div>
                    <div><?= PFM_money($pricing['total_dollars']) ?></div>
                </div>
            </div>
            <p class="pfm-text-muted pfm-mt-1 pfm-mb-0" style="font-size: 0.82rem;">
                Payment is processed securely by Stripe on the next step.
            </p>
        </section>
        <?php endif; ?>
    </div>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_step_url(5)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
            &larr; Back
        </a>
        <button type="button" id="pfm-submit" class="pfm-btn pfm-btn--primary pfm-btn--lg"
                <?= $buyerCount === 0 ? 'disabled' : '' ?>>
            Submit &amp; Continue to Payment &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var submitBtn = document.getElementById('pfm-submit');
    submitBtn.addEventListener('click', function () {
        if (!confirm('Submit your renewal and continue to secure Stripe payment?')) return;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="pfm-spinner"></span>&nbsp; Preparing payment…';

        PFM.api.post('submit-application.php', {})
            .then(function (data) {
                if (data.redirect_url) {
                    window.location.href = data.redirect_url;
                } else {
                    // Fallback to Step 7 which will (re-)create payment
                    window.location.href = <?= json_encode(pfm_step_url(7)) ?>;
                }
            })
            .catch(function (err) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit & Continue to Payment →';
                PFM.toast.show(err.message || 'Submission failed.', 'danger', 8000);
            });
    });
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
