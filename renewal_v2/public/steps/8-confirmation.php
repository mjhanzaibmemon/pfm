<?php
/**
 * Step 8 — Confirmation
 *
 * Shown after Stripe's success_url redirect (or any time the customer
 * navigates here once their session is awaiting_review/completed).
 *
 * Confirmation strategy (success_url polling — matches existing PFM pattern
 * in stripe_integration/payment-success.php; no Stripe webhook required):
 *
 *   1. Stripe redirects the customer here with ?session_id={CHECKOUT_SESSION_ID}
 *      in the URL (we wired that up in StripeClient::createCheckoutSession).
 *   2. If our renewal session is NOT yet marked paid, we call
 *      StripeClient::confirmAndSync($stripeSessionId) which:
 *        - asks Stripe API "is this checkout paid yet?"
 *        - if yes: marks our renewal session paid, generates the admin
 *          review token, and notifies staff (Phase 4 — currently config'd
 *          off until admin/review.php is ready)
 *        - if no:  returns null (rare; payment processing lag)
 *   3. If paid: show the "Thank You" card.
 *      If not paid yet: show "Processing payment…" with a meta-refresh
 *      that retries in 5 seconds.
 *
 * State requirement is intentionally permissive ('any') because the
 * confirmation logic itself transitions the session — the strict
 * 'paid' guard from earlier caused an infinite Step 7 ↔ Step 8 loop
 * when relying on a webhook that wasn't configured.
 *
 * Per v3 spec: the customer-facing "Thank You for Your Buyer's Pass
 * Application" email (under members_status) is sent by the existing PFM
 * system on status update — no new template here.
 */
declare(strict_types=1);

$PFM_STEP       = 8;
$PFM_STEP_TITLE = 'Confirmation';
// 'any' here — confirmAndSync handles the transition; we don't want
// step_bootstrap redirecting us elsewhere before we've had a chance to
// poll Stripe.
$PFM_REQUIRES   = 'any';

require __DIR__ . '/../_includes/step_bootstrap.php';

// ── 1. Try success-url confirmation if we have the Stripe session id ────
$stripeSessionId = isset($_GET['session_id']) ? trim((string) $_GET['session_id']) : '';
$pollingFailed   = false; // set if we tried to sync but it didn't return paid

if (!$session->isPaid() && $stripeSessionId !== '') {
    try {
        $synced = StripeClient::confirmAndSync($stripeSessionId);
        if ($synced !== null) {
            // Sync succeeded — refresh local session object from DB so the
            // template below sees the updated paidAt / amountCharged / etc.
            $session = $synced;
        } else {
            // Stripe says payment_status !== 'paid' yet
            $pollingFailed = true;
        }
    } catch (Throwable $e) {
        // Don't error out the page — log and treat as "still processing"
        error_log('[renewal_v2] Step 8 confirmAndSync failed: ' . $e->getMessage());
        $pollingFailed = true;
    }
}

// ── 2. Decide which view to render ───────────────────────────────────────
//   - Paid                                → Thank You card
//   - Not paid + we had a Stripe session_id → "Processing payment" (poll)
//   - Not paid + no session_id at all       → send them back to Step 7 to
//     retry, because there's nothing for us to poll
if (!$session->isPaid() && $stripeSessionId === '') {
    header('Location: ' . pfm_step_url(7));
    exit;
}

$showThankYou   = $session->isPaid();
$showProcessing = !$showThankYou; // tried to poll but Stripe hasn't confirmed yet

// Values for the Thank You view
$amount    = $session->amountCharged !== null
    ? number_format($session->amountCharged, 2) : null;
$paidAt    = $session->paidAt
    ? date('F j, Y \a\t g:ia', strtotime((string) $session->paidAt)) : null;
$paymentId = $session->paymentId ?? '';

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<?php if ($showThankYou): ?>

<div class="pfm-card pfm-text-center">
    <div style="font-size: 4rem; margin: 8px 0 4px;">&#127801;</div>
    <h2 class="pfm-card__title pfm-mt-0">Thank you!</h2>
    <p class="pfm-text-muted pfm-mt-0">
        Your renewal has been submitted and your payment was received successfully.
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

<?php else: /* showProcessing — payment not yet confirmed */ ?>

<?php
// Auto-refresh once every 5 seconds, up to a few attempts, then stop and
// show a friendly "please refresh manually" UI. We track attempts via a
// retry counter in the URL.
$retryCount = max(0, (int) ($_GET['retry'] ?? 0));
$maxRetries = 6; // ~30 seconds of polling
$showAutoRefresh = $retryCount < $maxRetries;
if ($showAutoRefresh) {
    $nextUrl = pfm_step_url(8)
        . '?session_id=' . rawurlencode($stripeSessionId)
        . '&retry=' . ($retryCount + 1);
    echo '<meta http-equiv="refresh" content="5;url=' . htmlspecialchars($nextUrl, ENT_QUOTES) . '">';
}
?>

<div class="pfm-card pfm-text-center">
    <div class="pfm-spinner" style="width: 32px; height: 32px; margin: 16px auto;"></div>
    <h2 class="pfm-card__title pfm-mt-0">Processing your payment…</h2>
    <p class="pfm-text-muted">
        Stripe is still confirming your payment with us. This usually takes only
        a few seconds.
    </p>

    <?php if ($showAutoRefresh): ?>
        <p class="pfm-text-muted" style="font-size: 0.88rem;">
            This page will refresh automatically. Attempt
            <?= (int) $retryCount + 1 ?> of <?= (int) $maxRetries ?>.
        </p>
    <?php else: ?>
        <div class="pfm-alert pfm-alert--warning pfm-mt-2" style="text-align: left;">
            We've been waiting longer than usual to confirm your payment. If your
            card was charged, the renewal team will still see it and process your
            renewal — there's nothing to worry about. You can safely close this
            page.
        </div>
        <a href="<?= htmlspecialchars(pfm_step_url(8)) . '?session_id=' . rawurlencode($stripeSessionId) ?>"
           class="pfm-btn pfm-btn--primary pfm-mt-2">
            Try again
        </a>
    <?php endif; ?>

    <p class="pfm-text-muted pfm-mt-2 pfm-mb-0" style="font-size: 0.85rem;">
        Questions? Email
        <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>.
    </p>
</div>

<?php endif; /* showProcessing */ ?>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
