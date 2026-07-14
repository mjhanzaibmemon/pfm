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
require_once __DIR__ . '/../../lib/PhoneFormat.php';

// Small inline helper used by the pricing-block markup below.
function PFM_money(float $n): string {
    return '$' . number_format($n, 2);
}

// ── Gather everything for display ───────────────────────────────────
$draftOrg     = $session->draftData['org']     ?? [];
$draftContact = $session->draftData['contact'] ?? [];
// $session passed so the review reflects pending buyer_ops (adds /
// removes / modifies queued at Step 4 but not yet drained to members).
$buyers       = BuyerManager::getActive($session->clientId, $session);
$buyerCount   = count($buyers);
$docs         = DocumentUpload::getAll($session);
$customerNote = $session->draftData['customer_note'] ?? '';

// Legacy carry-over probes — mirror Step 3 (Bug 2) and Step 5 so the
// review pane doesn't say "No documents uploaded" when there are
// perfectly valid on-file BLOBs from a previous renewal or a legacy
// admin ID upload. Discovered in Muhammad's 2026-07-07 Reset
// walkthrough: Step 5 correctly showed both docs as "on file" but
// Step 6 review counted only the current session's uploads.
$hasLegacyId = (int) (Db::scalar(
    'SELECT IF(main_contact_img_id IS NULL OR OCTET_LENGTH(main_contact_img_id) = 0, 0, 1)
       FROM clients WHERE client_id = ?',
    [$session->clientId]
) ?? 0) === 1;
// Business Registry carry-over is intentionally NOT surfaced here.
// Larissa's 2026-07-08 Round 5 item 3 tightened the policy to require
// a fresh upload every renewal cycle, so if the customer reaches Step 6
// there IS a business_license upload in this session — the Step 5 gate
// would have blocked them otherwise. Showing a "on file — carried over"
// line here would be misleading.

// Which wizard-uploaded slots do we already have this session, so the
// Main Contact ID "on file" line-item doesn't duplicate a fresh upload.
$uploadedIdThisSession = isset($docs['main_contact_id']);

// Overlay draft_data.contact onto the main_contact row in $buyers so
// the Active Buyers section renders the customer's Step 3 edits before
// submit — mirrors the same overlay Step 4 does. Larissa's 2026-06-30
// Round 4 QA on session 49 hit this too: her renamed main contact
// appeared in the Main Contact block (which reads $draftContact
// directly) but the buyer list below still showed the pre-edit name
// because it iterates $buyers which pulls straight from members.
if (!empty($draftContact)) {
    foreach ($buyers as &$__b) {
        if (empty($__b['main_contact'])) {
            continue;
        }
        if (isset($draftContact['name'])) {
            $__nameCandidate = trim((string) $draftContact['name']);
            if ($__nameCandidate !== '') {
                $__b['member_name'] = $__nameCandidate;
            }
        }
        if (isset($draftContact['email'])) {
            $__b['email'] = trim((string) $draftContact['email']);
        }
        if (isset($draftContact['phone'])) {
            $__b['phone1'] = pfm_normalize_phone($draftContact['phone']);
        }
    }
    unset($__b);
}

// Effective values (draft override → live DB)
$mainContact = Db::one(
    "SELECT member_name, email, phone1 FROM members
     WHERE client_id = ? AND main_contact = b'1' LIMIT 1",
    [$session->clientId]
);

$effOrg = [
    'co_name'         => $draftOrg['co_name']         ?? $client['co_name']         ?? '',
    'bus_cat_id'      => (int) ($draftOrg['bus_cat_id']    ?? $client['bus_cat_id']    ?? 0),
    'bus_subcat_id'   => (int) ($draftOrg['bus_subcat_id'] ?? $client['bus_subcat_id'] ?? 0),
    'mailing_address' => $draftOrg['mailing_address'] ?? $client['mailing_address'] ?? '',
    'city'            => $draftOrg['city']            ?? $client['city']            ?? '',
    'state'           => $draftOrg['state']           ?? $client['state']           ?? '',
    'zip_code'        => $draftOrg['zip_code']        ?? $client['zip_code']        ?? '',
    'website_url'     => $draftOrg['website_url']     ?? $client['website_url']     ?? '',
    'acct_instagram'  => $draftOrg['acct_instagram']  ?? $client['acct_instagram']  ?? '',
    'acct_facebook'   => $draftOrg['acct_facebook']   ?? $client['acct_facebook']   ?? '',
];
$effContact = [
    'name'  => $draftContact['name']  ?? $mainContact['member_name']       ?? '',
    'email' => $draftContact['email'] ?? $mainContact['email']             ?? '',
    'phone' => $draftContact['phone'] ?? $mainContact['phone1']            ?? '',
    'title' => $draftContact['title'] ?? $client['main_contact_title']     ?? '',
];

// Look up the category / subcategory display labels — same source the
// wizard's Step 2 dropdowns pull from (bus_categories + bus_subcats).
$busCatName    = '';
$busSubcatName = '';
if ($effOrg['bus_cat_id'] > 0) {
    $row = Db::one(
        'SELECT bus_cat FROM bus_categories WHERE bus_cat_id = ?',
        [$effOrg['bus_cat_id']]
    );
    $busCatName = (string) ($row['bus_cat'] ?? '');
}
if ($effOrg['bus_subcat_id'] > 0) {
    $row = Db::one(
        'SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = ?',
        [$effOrg['bus_subcat_id']]
    );
    $busSubcatName = (string) ($row['bus_subcategory'] ?? '');
}

// Compose the single-line mailing-address string used in the review row.
$mailingParts = array_filter([
    trim((string) $effOrg['mailing_address']),
    trim((string) $effOrg['city']),
    trim((string) $effOrg['state']),
    trim((string) $effOrg['zip_code']),
], static fn($v) => $v !== '');
$mailingLine  = $mailingParts ? implode(', ', $mailingParts) : '';

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
                <h3 class="pfm-review__title">Organization</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(2)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Company</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effOrg['co_name'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Business category</div>
                <div class="pfm-review__val">
                    <?php
                        $catLine = trim($busCatName);
                        if ($busSubcatName !== '') {
                            $catLine = $catLine !== '' ? "{$catLine} &mdash; {$busSubcatName}" : $busSubcatName;
                        }
                        echo $catLine !== '' ? $catLine : '—';
                    ?>
                </div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Mailing address</div>
                <div class="pfm-review__val"><?= htmlspecialchars($mailingLine ?: '—') ?></div>
            </div>
            <?php if ($effOrg['website_url'] !== '' || $effOrg['acct_instagram'] !== '' || $effOrg['acct_facebook'] !== ''): ?>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Online presence</div>
                <div class="pfm-review__val">
                    <?php
                        $links = [];
                        if ($effOrg['website_url']    !== '') { $links[] = 'Website: '   . htmlspecialchars($effOrg['website_url']); }
                        if ($effOrg['acct_instagram'] !== '') { $links[] = 'Instagram: ' . htmlspecialchars($effOrg['acct_instagram']); }
                        if ($effOrg['acct_facebook']  !== '') { $links[] = 'Facebook: '  . htmlspecialchars($effOrg['acct_facebook']); }
                        echo implode('<br>', $links);
                    ?>
                </div>
            </div>
            <?php endif; ?>
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
                <div class="pfm-review__key">Title</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['title'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Email</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['email'] ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Phone</div>
                <div class="pfm-review__val"><?= htmlspecialchars($effContact['phone'] ? pfm_format_phone($effContact['phone']) : '—') ?></div>
            </div>
        </section>

        <!-- Buyers — includes the main contact (counted toward the active
             member roster per legacy renewal pricing rules). -->
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Active Buyers (<?= (int) $buyerCount ?>)</h3>
                <a href="<?= htmlspecialchars(pfm_step_url(4)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <p class="pfm-text-muted pfm-mt-0" style="font-size:0.85rem;">
                Includes the main contact &mdash; edit them on Step 3, or any other buyer on Step 4.
            </p>
            <?php if ($buyerCount === 0): ?>
                <div class="pfm-alert pfm-alert--warning pfm-mb-0">
                    You need at least one active buyer to continue. Please add one in Step 4.
                </div>
            <?php else: ?>
                <ul class="pfm-buyer-list pfm-mb-0">
                    <?php foreach ($buyers as $b): ?>
                        <?php $isPrimary = !empty($b['main_contact']); ?>
                        <li class="pfm-buyer <?= $isPrimary ? 'pfm-buyer--primary' : '' ?>">
                            <div class="pfm-buyer__avatar"><?= strtoupper(substr((string) ($b['member_name'] ?? '?'), 0, 1)) ?></div>
                            <div class="pfm-buyer__info">
                                <p class="pfm-buyer__name">
                                    <?= htmlspecialchars((string) ($b['member_name'] ?? '')) ?>
                                    <?php if ($isPrimary): ?>
                                        <span class="pfm-badge pfm-badge--primary"
                                              style="display:inline-block; margin-left:8px; padding:2px 8px; background:#727cf5; color:#fff; border-radius:10px; font-size:0.7rem; font-weight:600; vertical-align:middle;">
                                            Primary Contact
                                        </span>
                                    <?php endif; ?>
                                </p>
                                <p class="pfm-buyer__meta">
                                    <?= htmlspecialchars((string) ($b['email'] ?? '')) ?>
                                    <?php if (!empty($b['phone1'])): ?>
                                        &middot; <?= htmlspecialchars(pfm_format_phone((string) $b['phone1'])) ?>
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
            <?php
            // Build a combined list. Main Contact ID may be carried over
            // from clients.main_contact_img_id, so include it as an "on
            // file" line item when no fresh ID was uploaded this session.
            // Business Registry is intentionally NOT surfaced here as a
            // carry-over — Larissa's 2026-07-08 Round 5 policy requires
            // a fresh Business Registry upload every renewal cycle, so
            // if the customer reached this page the business_license
            // slot already has a fresh file in $docs.
            $showLegacyId = $hasLegacyId && !$uploadedIdThisSession;
            $hasAnything  = !empty($docs) || $showLegacyId;
            ?>
            <?php if (!$hasAnything): ?>
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
                    <?php if ($showLegacyId): ?>
                        <li class="pfm-file">
                            <span>&#128206;</span>
                            <span class="pfm-file__name">
                                Main Contact ID
                            </span>
                            <span class="pfm-file__meta">on file &mdash; carried over from previous renewal</span>
                        </li>
                    <?php endif; ?>
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
                    <div>Base membership (<?= (int) $pricing['included_buyers'] ?> included &mdash; main contact + buyers)</div>
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
