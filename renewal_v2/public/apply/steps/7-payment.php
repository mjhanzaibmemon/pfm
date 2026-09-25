<?php
/**
 * New-Customer Application — Step 7 — Payment
 *
 * Sibling to public/steps/7-payment.php. Arrival paths:
 *   A. From Step 6's Submit (?go=1) — auto-continues to Stripe, so the
 *      applicant doesn't need a second click (the renewal flow goes
 *      straight to Stripe from Submit too). If Stripe can't be reached
 *      the page stays and shows the error with the button re-enabled.
 *   B. Returning later (status submitted / awaiting_payment) — shows the
 *      total and a "Continue to Stripe" button; create-payment.php makes
 *      a fresh Checkout Session.
 *   C. Back from Stripe with ?cancelled=1 — "no charge was made".
 *
 * If the applicant already has a Stripe session, ask Stripe whether it
 * was paid (they may have paid and closed the tab) and, if so, send them
 * on to the confirmation page instead of asking them to pay again.
 */
declare(strict_types=1);

$PFM_STEP       = 7;
$PFM_STEP_TITLE = 'Payment';
$PFM_REQUIRES   = 'submitted';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationStripe.php';

if ($application->status === NewApplication::STATUS_AWAITING_PAYMENT
    && ApplicationStripe::reconcile($application)) {
    header('Location: ' . pfm_apply_step_url(8, ['session_id' => $application->stripeSessionId]));
    exit;
}

$cancelled = isset($_GET['cancelled']);
$autoGo    = isset($_GET['go']) && !$cancelled;

$level   = NewApplication::getLevelForCategory((int) ($application->draftData['org']['bus_cat_id'] ?? 0));
$pricing = $level !== null ? StripeClient::pricingBreakdown($level, $application->totalBuyerCount()) : null;

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Secure Payment</h2>
        <p class="pfm-card__subtitle">Pay your membership fee securely through Stripe.</p>
    </div>

    <?php if ($cancelled): ?>
        <div class="pfm-alert pfm-alert--info">
            No charge was made &mdash; your application is still saved.
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
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning">
            We couldn't determine your membership fee. Please contact
            <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>.
        </div>
    <?php endif; ?>

    <p>
        We don't store your card details. Stripe handles the entire payment securely,
        and as soon as your payment goes through your application moves into our review queue.
    </p>

    <div class="pfm-nav">
        <span></span>
        <button type="button" id="pfm-pay" class="pfm-btn pfm-btn--primary pfm-btn--lg"
                <?= $pricing === null ? 'disabled' : '' ?>>
            Continue to Stripe &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var btn = document.getElementById('pfm-pay');

    function startPayment() {
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
    }

    btn.addEventListener('click', startPayment);
    <?php if ($autoGo && $pricing !== null): ?>
    startPayment();
    <?php endif; ?>
})();
</script>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
