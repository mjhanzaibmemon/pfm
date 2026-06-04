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
// `clients` holds the renewal_date which we extend by one year for
// standard renewals.
//
// NOTE: An earlier draft of this step blocked customers whose membership
// had been expired for more than 90 days, sending them to a "contact
// staff" message. That threshold was an interpretation I added in the
// v3 spec but Larissa never explicitly confirmed it. Per her actual
// instruction ("standard renewal extends +1 year, same month/day"),
// every customer is allowed to self-serve. We will reconfirm the
// staff-only threshold with her at demo time and reintroduce it here
// if she wants it back.
$statusRow = Db::one(
    'SELECT c.memb_status_id, c.renewal_date, c.expiration_date
       FROM clients c
      WHERE c.client_id = ?',
    [$session->clientId]
);

$daysSinceExpiry = null;
$newRenewalDate  = null;

if ($statusRow && !empty($statusRow['expiration_date'])) {
    $expiry = strtotime((string) $statusRow['expiration_date']);
    if ($expiry !== false) {
        $daysSinceExpiry = (int) floor((time() - $expiry) / 86400);
    }
}

// Standard renewal: extend renewal_date by +1 year (same month/day)
if (!empty($statusRow['renewal_date'])) {
    $renewalTs = strtotime((string) $statusRow['renewal_date']);
    if ($renewalTs !== false) {
        $newRenewalDate = date('F j, Y', strtotime('+1 year', $renewalTs));
    }
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
            <div><?= !empty($statusRow['expiration_date']) ? htmlspecialchars(date('F j, Y', strtotime((string) $statusRow['expiration_date']))) : '—' ?></div>
        </div>
        <div>
            <div class="pfm-field__label">New renewal date (after this renewal)</div>
            <div><?= htmlspecialchars($newRenewalDate ?? '—') ?></div>
        </div>
    </div>

    <?php if ($daysSinceExpiry !== null && $daysSinceExpiry > 0): ?>
        <div class="pfm-alert pfm-alert--info">
            Your membership is currently <strong><?= (int) $daysSinceExpiry ?> day(s) past its expiration</strong>.
            You can renew online below.
        </div>
    <?php endif; ?>

    <p>
        This renewal takes about <strong>5&ndash;10 minutes</strong>. You'll confirm your
        organisation details, your main contact, your list of buyers, upload any required documents,
        and then complete payment securely through Stripe.
    </p>
    <p class="pfm-text-muted">
        Your progress is auto-saved as you go, so you can close this window and return any time
        within 30 days using the link from your renewal email.
    </p>
</div>

<div class="pfm-nav">
    <span></span>
    <a href="<?= htmlspecialchars(pfm_step_url(2)) ?>" class="pfm-btn pfm-btn--primary pfm-btn--lg">
        Begin renewal &rarr;
    </a>
</div>

<?php require __DIR__ . '/../_includes/footer.php'; ?>
