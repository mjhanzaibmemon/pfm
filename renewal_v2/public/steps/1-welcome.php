<?php
/**
 * Step 1 — Welcome
 *
 * Greets the customer, shows current membership details and renewal date,
 * routes them either:
 *   - Forward to Step 2 (Organisation) — for active or recently expired members
 *   - To a "contact staff" message — if membership expired more than 90 days ago
 *     (per v3 spec: Standard renewals extend +1 year same month/day; >90 days
 *      expired requires staff handling)
 */
declare(strict_types=1);

$PFM_STEP       = 1;
$PFM_STEP_TITLE = 'Welcome';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/step_bootstrap.php';

// ── Determine renewal display data from existing membership ────────
// `clients` holds the renewal_date and expiration_date which we use
// to render the customer's current cycle and compute the new
// renewal_date after this renewal.
//
// >90-day staff-handling gate: per Larissa's 2026-06-10 reply
// ("If a membership is more than 90 days expired, the customer
// should be directed to contact PFM staff before renewing."),
// customers whose expiration_date is more than 90 days in the past
// see a contact-staff message instead of the wizard.
//
// The same threshold is mirrored on the Confirm Receipt side
// (admin/confirm-receipt.php) where it switches the new renewal_date
// from "old + 1 year" to "today + 1 year" when the same condition
// holds — keeping the gate and the renewal-date math on the same
// 90-day rule.
$statusRow = Db::one(
    'SELECT c.memb_status_id, c.renewal_date, c.expiration_date
       FROM clients c
      WHERE c.client_id = ?',
    [$session->clientId]
);

$daysSinceExpiry = null;
$newRenewalDate  = null;

// expiration_date isn't always set on the clients row — staff who add a
// member through the legacy "Add Member" form often only fill in
// renewal_date and leave expiration_date blank. In the PFM data model
// renewal_date and expiration_date actually represent the same concept
// (the date the current period ends / the member is due to renew by);
// confirm-receipt.php's existing UPDATE advances renewal_date by one
// year on each completed renewal. So when expiration_date is missing,
// fall back to renewal_date directly — NOT renewal_date minus one year
// (an earlier draft of this fallback did the subtraction and made
// Step 1 read the date a full year early, which falsely tripped the
// >90-day staff-handling gate for any member whose renewal_date was
// just a few weeks in the past — Larissa's 2026-06-26 Round 4 test
// caught that on client 737836 with renewal_date = 2026-05-31).
$effExpirationDate = null;
if ($statusRow) {
    $rawExp = trim((string) ($statusRow['expiration_date'] ?? ''));
    $rawRen = trim((string) ($statusRow['renewal_date']    ?? ''));
    if ($rawExp !== '' && $rawExp !== '0000-00-00 00:00:00') {
        $effExpirationDate = $rawExp;
    } elseif ($rawRen !== '' && $rawRen !== '0000-00-00 00:00:00') {
        $effExpirationDate = $rawRen;
    }
}

if ($effExpirationDate !== null) {
    $expiry = strtotime($effExpirationDate);
    if ($expiry !== false) {
        $daysSinceExpiry = (int) floor((time() - $expiry) / 86400);
    }
}

$blockedTooExpired = ($daysSinceExpiry !== null && $daysSinceExpiry > 90);

// Standard renewal: extend renewal_date by +1 year (same month/day).
// When the >90-day gate fires, this preview value is replaced below by
// "today + 1 year" so the customer doesn't see a misleading old date.
if (!empty($statusRow['renewal_date'])) {
    $renewalTs = strtotime((string) $statusRow['renewal_date']);
    if ($renewalTs !== false) {
        $newRenewalDate = date('F j, Y', strtotime('+1 year', $renewalTs));
    }
}
if ($blockedTooExpired) {
    $newRenewalDate = date('F j, Y', strtotime('+1 year'));
}

// Membership level name (display only)
$levelRow = Db::one(
    'SELECT pricing_level, curr_price, num_of_buyers, price_after
       FROM members_level WHERE memb_lev_id = ?',
    [(int) ($client['pricing_level_id'] ?? 0)]
);

require __DIR__ . '/../_includes/header.php';
require __DIR__ . '/../_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Welcome back<?= !empty($client['co_name']) ? ', ' . htmlspecialchars($client['co_name']) : '' ?>.</h2>
        <p class="pfm-card__subtitle">Let's renew your Portland Flower Market membership.</p>
    </div>

    <div class="pfm-grid pfm-grid--2 pfm-mb-2">
        <div>
            <div class="pfm-field__label">Company</div>
            <div class="pfm-text-emphasis"><?= htmlspecialchars($client['co_name'] ?? '—') ?></div>
        </div>
        <div>
            <div class="pfm-field__label">Membership type</div>
            <div class="pfm-text-emphasis"><?= htmlspecialchars($levelRow['pricing_level'] ?? '—') ?></div>
        </div>
        <div>
            <div class="pfm-field__label">Current expiration date</div>
            <div><?= $effExpirationDate !== null ? htmlspecialchars(date('F j, Y', strtotime($effExpirationDate))) : '—' ?></div>
        </div>
        <div>
            <div class="pfm-field__label">New renewal date (after this renewal)</div>
            <div><?= htmlspecialchars($newRenewalDate ?? '—') ?></div>
        </div>
    </div>

    <?php if ($blockedTooExpired): ?>
        <div class="pfm-alert pfm-alert--warning">
            <strong>Your membership has been expired for <?= (int) $daysSinceExpiry ?> days.</strong>
            <p class="pfm-mt-1 pfm-mb-0">
                Memberships more than 90 days past expiration cannot be
                renewed online &mdash; please contact PFM staff and they
                will help you complete the renewal.
            </p>
        </div>

        <div class="pfm-card pfm-mt-2" style="background: #f8f9fa;">
            <h3 class="pfm-mt-0">Contact PFM staff</h3>
            <p class="pfm-mb-1">
                <strong>Phone:</strong>
                <a href="tel:+15032891500">503-289-1500</a>
            </p>
            <p class="pfm-mb-0">
                <strong>Email:</strong>
                <a href="mailto:info@ofgaflowers.com">info@ofgaflowers.com</a>
            </p>
        </div>
    <?php elseif ($daysSinceExpiry !== null && $daysSinceExpiry > 0): ?>
        <div class="pfm-alert pfm-alert--info">
            Your membership is currently <strong><?= (int) $daysSinceExpiry ?> day(s) past its expiration</strong>.
            You can renew online below.
        </div>
    <?php endif; ?>

    <?php if (!$blockedTooExpired): ?>
        <p>
            This renewal takes about <strong>5&ndash;10 minutes</strong>. You'll confirm your
            organization details, your main contact, your list of buyers, upload any required documents,
            and then complete payment securely through Stripe.
        </p>
        <p class="pfm-text-muted">
            Your progress is auto-saved as you go, so you can close this window and return any time
            within 30 days using the link from your renewal email.
        </p>
    <?php endif; ?>
</div>

<div class="pfm-nav">
    <span></span>
    <?php if ($blockedTooExpired): ?>
        <span class="pfm-text-muted"><em>Online renewal unavailable &mdash; please contact PFM staff.</em></span>
    <?php else: ?>
        <a href="<?= htmlspecialchars(pfm_step_url(2)) ?>" class="pfm-btn pfm-btn--primary pfm-btn--lg">
            Begin renewal &rarr;
        </a>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
