<?php
/**
 * New-Customer Application — Step 8 — Confirmation
 *
 * Sibling to public/steps/8-confirmation.php. Stripe's success_url sends
 * the applicant here with ?session_id=…; if the application isn't yet
 * marked paid we ask Stripe directly (ApplicationStripe::confirmAndSync)
 * — the same no-webhook-required strategy as the renewal flow — and
 * show either the thank-you card or a self-refreshing "processing" view.
 *
 * $PFM_REQUIRES = 'any' on purpose: the sync itself moves the state, so
 * the bootstrap must not redirect away before we've polled Stripe.
 */
declare(strict_types=1);

$PFM_STEP       = 8;
$PFM_STEP_TITLE = 'Confirmation';
$PFM_REQUIRES   = 'any';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/ApplicationStripe.php';

// Nothing to show for an application that never got as far as payment.
if ($application->status === NewApplication::STATUS_DRAFT) {
    header('Location: ' . pfm_apply_step_url(6));
    exit;
}
if ($application->status === NewApplication::STATUS_CANCELLED) {
    header('Location: /renewal_v2/public/apply/index.php');
    exit;
}

$stripeSessionId = isset($_GET['session_id']) ? trim((string) $_GET['session_id']) : '';

if (!$application->isPaid() && $stripeSessionId !== '') {
    try {
        ApplicationStripe::confirmAndSync($stripeSessionId);
    } catch (Throwable $e) {
        error_log('[new_application] Step 8 confirmAndSync failed: ' . $e->getMessage());
    }
    // Re-read: the sync may have changed this application (or not — the
    // session id in the URL could belong to a different application).
    $application = NewApplication::loadById($application->id) ?? $application;
}

// Not paid and no session id to poll → back to payment.
if (!$application->isPaid() && $stripeSessionId === '') {
    header('Location: ' . pfm_apply_step_url(7));
    exit;
}

$isDeclined     = $application->status === NewApplication::STATUS_DECLINED;
$showThankYou   = $application->isPaid() && !$isDeclined;
$showProcessing = !$application->isPaid();

$amount    = $application->amountCharged !== null ? number_format($application->amountCharged, 2) : null;
$paidAt    = $application->paidAt ? date('F j, Y \a\t g:ia', strtotime((string) $application->paidAt)) : null;
$paymentId = $application->paymentId ?? '';

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<?php if ($isDeclined): ?>

<div class="pfm-card pfm-text-center">
    <h2 class="pfm-card__title pfm-mt-0">This application is no longer active</h2>
    <p class="pfm-text-muted">
        Please contact the Portland Flower Market at
        <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>
        or 503-289-1500 for details.
    </p>
</div>

<?php elseif ($showThankYou): ?>

<div class="pfm-card pfm-text-center">
    <div style="font-size: 4rem; margin: 8px 0 4px;">&#127801;</div>
    <h2 class="pfm-card__title pfm-mt-0">Thank you!</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Your application has been submitted and your payment was received successfully.
    </p>

    <div class="pfm-pricing pfm-mt-2" style="text-align: left;">
        <div class="pfm-pricing__row">
            <div>Payment received</div>
            <div><?= $amount ? '$' . htmlspecialchars($amount) : '&mdash;' ?></div>
        </div>
        <?php if ($paidAt): ?>
        <div class="pfm-pricing__row">
            <div>Paid on</div>
            <div><?= htmlspecialchars($paidAt) ?></div>
        </div>
        <?php endif; ?>
        <div class="pfm-pricing__row">
            <div>Reference Number</div>
            <div style="font-family: monospace; font-weight: 600;">
                <?= htmlspecialchars($application->getReferenceNumber()) ?>
            </div>
        </div>
        <?php if ($paymentId !== ''): ?>
        <div class="pfm-pricing__row">
            <div>Transaction ID</div>
            <div style="font-family: monospace; font-size: 0.82rem;">
                <?= htmlspecialchars($paymentId) ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="pfm-alert pfm-alert--info pfm-mt-2" style="text-align: left;">
        <div>
            <strong>What happens next?</strong>
            <ul style="margin: 8px 0 0 18px; padding: 0;">
                <li>Our team will review your application within 1&ndash;2 business days.</li>
                <li>Once approved, you will receive an email stating that your
                    Buyer&rsquo;s Pass application has been approved.</li>
            </ul>
        </div>
    </div>

    <p class="pfm-text-muted pfm-mt-2 pfm-mb-0">
        Questions? Email
        <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>
        and reference the reference number above.
    </p>
</div>

<?php else: /* payment not yet confirmed by Stripe */ ?>

<?php
$retryCount      = max(0, (int) ($_GET['retry'] ?? 0));
$maxRetries      = 6; // ~30 seconds of polling
$showAutoRefresh = $retryCount < $maxRetries;
if ($showAutoRefresh) {
    $nextUrl = pfm_apply_step_url(8, ['session_id' => $stripeSessionId, 'retry' => $retryCount + 1]);
    echo '<meta http-equiv="refresh" content="5;url=' . htmlspecialchars($nextUrl, ENT_QUOTES) . '">';
}
?>

<div class="pfm-card pfm-text-center">
    <div class="pfm-spinner" style="width: 32px; height: 32px; margin: 16px auto;"></div>
    <h2 class="pfm-card__title pfm-mt-0">Processing your payment…</h2>
    <p class="pfm-text-muted">
        Stripe is still confirming your payment with us. This usually takes only a few seconds.
    </p>

    <?php if ($showAutoRefresh): ?>
        <p class="pfm-text-muted" style="font-size: 0.88rem;">
            This page will refresh automatically. Attempt <?= (int) $retryCount + 1 ?> of <?= (int) $maxRetries ?>.
        </p>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning pfm-mt-2" style="text-align: left;">
            We've been waiting longer than usual to confirm your payment. If your card was
            charged, our team will still see it and process your application &mdash; there's
            nothing to worry about. You can safely close this page.
        </div>
        <a href="<?= htmlspecialchars(pfm_apply_step_url(8, ['session_id' => $stripeSessionId])) ?>"
           class="pfm-btn pfm-btn--primary pfm-mt-2">
            Try again
        </a>
    <?php endif; ?>

    <p class="pfm-text-muted pfm-mt-2 pfm-mb-0" style="font-size: 0.85rem;">
        Questions? Email
        <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>.
    </p>
</div>

<?php endif; ?>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
