<?php
/**
 * Step 7 — Payment
 *
 * Handles three arrival paths:
 *   A. Customer arrived from Step 6 — submit-application.php already
 *      created a Stripe Checkout session and redirected directly to Stripe.
 *      Most customers never see this page on the first attempt.
 *   B. Customer hits this URL fresh (status = submitted | awaiting_payment)
 *      — we (re)create a Stripe Checkout session and let them retry.
 *   C. Customer came back from Stripe with ?cancelled=1 — show a friendly
 *      "no charge made, click to retry" screen.
 */
declare(strict_types=1);

$PFM_STEP       = 7;
$PFM_STEP_TITLE = 'Payment';
$PFM_REQUIRES   = 'submitted';

require __DIR__ . '/../_includes/step_bootstrap.php';

$cancelled  = isset($_GET['cancelled']);
// $session for the deferred-commit refactor. By the time the payment
// step renders, submit-application.php has already drained buyer_ops
// to the members table, so this is effectively a no-op — but keeping
// the arg keeps every wizard-side call site in one shape.
$buyerCount = BuyerManager::countActive($session->clientId, $session);

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
        <h2 class="pfm-card__title">Secure Payment</h2>
        <p class="pfm-card__subtitle">Pay your renewal securely through Stripe.</p>
    </div>

    <?php if ($cancelled): ?>
        <div class="pfm-alert pfm-alert--info">
            No charge was made &mdash; your renewal is still saved.
            Click <strong>Continue to Stripe</strong> below whenever you're ready to complete payment.
        </div>
    <?php endif; ?>

    <?php if ($pricing): ?>
        <div class="pfm-pricing pfm-mb-2">
            <div class="pfm-pricing__row">
                <div><?= htmlspecialchars((string) $pricing['level_name']) ?></div>
                <div><?= '$' . number_format((float) $pricing['base_price'], 2) ?></div>
            </div>
            <?php if ($pricing['extra_buyers'] > 0): ?>
            <div class="pfm-pricing__row">
                <div>
                    <?= (int) $pricing['extra_buyers'] ?> additional buyer<?= $pricing['extra_buyers'] === 1 ? '' : 's' ?>
                    @ <?= '$' . number_format((float) $pricing['extra_per_buyer'], 2) ?> each
                </div>
                <div><?= '$' . number_format((float) $pricing['extra_charge'], 2) ?></div>
            </div>
            <?php endif; ?>
            <div class="pfm-pricing__row pfm-pricing__row--total">
                <div>Total due today</div>
                <div><?= '$' . number_format((float) $pricing['total_dollars'], 2) ?></div>
            </div>
        </div>
    <?php endif; ?>

    <p>
        We don't store your card details. Stripe handles the entire payment securely,
        and as soon as your payment goes through we'll move your renewal into our review queue.
    </p>

    <div class="pfm-nav">
        <span></span>
        <button type="button" id="pfm-pay" class="pfm-btn pfm-btn--primary pfm-btn--lg">
            Continue to Stripe &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var btn = document.getElementById('pfm-pay');
    btn.addEventListener('click', function () {
        btn.disabled = true;
        btn.innerHTML = '<span class="pfm-spinner"></span>&nbsp; Connecting to Stripe…';

        PFM.api.post('create-payment.php', {})
            .then(function (data) {
                if (data.redirect_url) {
                    window.location.href = data.redirect_url;
                } else {
                    throw new Error('Stripe did not return a redirect URL.');
                }
            })
            .catch(function (err) {
                btn.disabled = false;
                btn.textContent = 'Continue to Stripe →';
                PFM.toast.show(err.message || 'Could not start payment.', 'danger', 8000);
            });
    });
})();
</script>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
