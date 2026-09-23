<?php
/**
 * New-Customer Application — Step 1 — Welcome
 *
 * Sibling to public/steps/1-welcome.php (the renewal wizard's Step 1),
 * but much simpler: a brand-new applicant has no existing membership
 * to display, no renewal date to compute, and none of the >90-day
 * staff-handling gate (that gate exists specifically because a
 * RENEWAL customer's clock started at some point in the past — a new
 * applicant's clock hasn't started at all yet).
 *
 * Just orients the applicant and moves them into Step 2 (Organization).
 */
declare(strict_types=1);

$PFM_STEP       = 1;
$PFM_STEP_TITLE = 'Welcome';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Welcome to the Portland Flower Market.</h2>
        <p class="pfm-card__subtitle">Let's get your Buyer's Pass application started.</p>
    </div>

    <p>
        This application takes about <strong>10&ndash;15 minutes</strong>. You'll tell us
        about your organization, your main contact, the buyers who will
        be using your Buyer's Pass, and upload a couple of required
        documents. At the end, you'll complete payment securely through
        Stripe.
    </p>

    <div class="pfm-alert pfm-alert--info">
        Your application will be reviewed by our team after you submit
        and pay. We'll be in touch within a couple of business days —
        our confirmation email has more detail on next steps.
    </div>

    <p class="pfm-text-muted">
        Your progress is auto-saved as you go, so you can close this
        window and return any time using the same browser.
    </p>

    <div class="pfm-mt-2">
        <h3 class="pfm-card__subtitle" style="margin-bottom: 8px;">What you'll need on hand</h3>
        <ul style="padding-left: 18px; line-height: 1.8; margin: 0;">
            <li>Your business name, category, and mailing address</li>
            <li>Main contact name, phone, and email</li>
            <li>Names and contact info for anyone else who will use the Buyer's Pass</li>
            <li>A copy of your driver's license or photo ID</li>
            <li>Proof of active business registration with the Secretary of State</li>
        </ul>
    </div>
</div>

<div class="pfm-nav">
    <span></span>
    <a href="<?= htmlspecialchars(pfm_apply_step_url(2)) ?>" class="pfm-btn pfm-btn--primary pfm-btn--lg">
        Start application &rarr;
    </a>
</div>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
