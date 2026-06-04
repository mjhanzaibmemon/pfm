<?php
/**
 * Step 8 — Confirmation
 *
 * Shown after Stripe's success_url redirect (or any time the customer
 * navigates here while their session is awaiting_review/completed).
 *
 * The Stripe webhook (stripe-webhook.php) is the source of truth for
 * marking the session paid. This page just confirms what already happened
 * — it does NOT trust the success_url alone for state changes.
 *
 * Per v3 spec: the existing "Thank You for Your Buyer's Pass Application"
 * email (under members_status) is sent automatically — no new template.
 */
declare(strict_types=1);

$PFM_STEP       = 8;
$PFM_STEP_TITLE = 'Confirmation';
$PFM_REQUIRES   = 'paid';

require __DIR__ . '/../_includes/step_bootstrap.php';

$amount   = $session->amountCharged !== null ? number_format($session->amountCharged, 2) : null;
$paidAt   = $session->paidAt ? date('F j, Y \a\t g:ia', strtotime((string) $session->paidAt)) : null;
$paymentId = $session->paymentId ?? '';

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card pfm-text-center">
    <div style="font-size: 4rem; margin: 8px 0 4px;">&#127801;</div>
    <h2 class="pfm-card__title pfm-mt-0">Thank you!</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Your renewal has been submitted and your payment was received successfully.
    </p>

    <div class="pfm-pricing pfm-mt-2" style="text-align: left;">
        <div class="pfm-pricing__row">
            <div>Payment received</div>
            <div><?= $amount ? '$' . htmlspecialchars($amount) : '—' ?></div>
        </div>
        <?php if ($paidAt): ?>
        <div class="pfm-pricing__row">
            <div>Paid on</div>
            <div><?= htmlspecialchars($paidAt) ?></div>
        </div>
        <?php endif; ?>
        <?php if ($paymentId !== ''): ?>
        <div class="pfm-pricing__row">
            <div>Reference</div>
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
                <li>Our team will review your renewal within 1&ndash;2 business days.</li>
                <li>You'll receive our standard "Thank You for Your Buyer's Pass Application"
                    confirmation email at <strong><?= htmlspecialchars($session->draftData['contact']['email'] ?? '') ?></strong>.</li>
                <li>Once approved, your new membership card &amp; buyer passes will be ready
                    for pickup or shipping per your usual arrangement.</li>
            </ul>
        </div>
    </div>

    <p class="pfm-text-muted pfm-mt-2 pfm-mb-0">
        Questions? Email
        <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>
        and reference the payment ID above.
    </p>
</div>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
