<?php
/**
 * New-Customer Application — Step 6 — Review & Submit
 *
 * Sibling to public/steps/6-review.php. Everything shown here comes
 * from draft_data alone (there is no clients/members row to overlay),
 * so the renewal page's effective-value merging and legacy-BLOB probes
 * don't exist. Pricing is derived from the Step 2 business category via
 * NewApplication::getLevelForCategory + StripeClient::pricingBreakdown
 * (the same breakdown function the renewal flow uses).
 *
 * Submit is gated twice: this page shows any problems from
 * NewApplication::validateForSubmit() and disables the button, and
 * api/submit-application.php runs the same validation again as the
 * authoritative check.
 */
declare(strict_types=1);

$PFM_STEP       = 6;
$PFM_STEP_TITLE = 'Review & Submit';
$PFM_REQUIRES   = 'draft';

require __DIR__ . '/../_includes/apply_bootstrap.php';
require_once RNW_ROOT . '/lib/PhoneFormat.php';
require_once RNW_ROOT . '/lib/ApplicationDocumentUpload.php';

function PFM_money(float $n): string {
    return '$' . number_format($n, 2);
}

$org          = $application->draftData['org']     ?? [];
$contact      = $application->draftData['contact'] ?? [];
$extraBuyers  = $application->draftData['buyers']  ?? [];
if (!is_array($extraBuyers)) {
    $extraBuyers = [];
}
$docs         = ApplicationDocumentUpload::getAll($application);
$customerNote = (string) ($application->draftData['customer_note'] ?? '');

$buyerCount = $application->totalBuyerCount();

$busCatName = '';
$busSubcatName = '';
$catId    = (int) ($org['bus_cat_id']    ?? 0);
$subcatId = (int) ($org['bus_subcat_id'] ?? 0);
if ($catId > 0) {
    $row = Db::one('SELECT bus_cat FROM bus_categories WHERE bus_cat_id = ?', [$catId]);
    $busCatName = (string) ($row['bus_cat'] ?? '');
}
if ($subcatId > 0) {
    $row = Db::one('SELECT bus_subcategory FROM bus_subcats WHERE bus_subcat_id = ?', [$subcatId]);
    $busSubcatName = (string) ($row['bus_subcategory'] ?? '');
}

$mailingParts = array_filter([
    trim((string) ($org['mailing_address'] ?? '')),
    trim((string) ($org['city']  ?? '')),
    trim((string) ($org['state'] ?? '')),
    trim((string) ($org['zip_code'] ?? '')),
], static fn($v) => $v !== '');
$mailingLine = $mailingParts ? implode(', ', $mailingParts) : '';

$level   = NewApplication::getLevelForCategory($catId);
$pricing = $level !== null ? StripeClient::pricingBreakdown($level, $buyerCount) : null;

$problems = $application->validateForSubmit();

$docLabel = static function (string $key): string {
    if ($key === 'main_contact_id')  return "Main contact ID";
    if ($key === 'business_license') return 'Business Registry';
    return 'Additional document';
};

require RNW_ROOT . '/public/_includes/header.php';
require RNW_ROOT . '/public/_includes/progress-bar.php';
?>

<div class="pfm-card">
    <div class="pfm-card__header">
        <h2 class="pfm-card__title">Review Your Application</h2>
        <p class="pfm-card__subtitle">
            Please double-check everything below. Use the Edit links to go back and fix anything,
            or click Submit at the bottom to continue to payment.
        </p>
    </div>

    <?php if (!empty($problems)): ?>
        <div class="pfm-alert pfm-alert--danger" role="alert">
            <strong>A few things need attention before you can submit:</strong>
            <ul style="margin: 6px 0 0 18px; padding: 0;">
                <?php foreach ($problems as $p): ?>
                    <li>
                        <?= htmlspecialchars($p['message']) ?>
                        <?php if ($p['code'] !== 'duplicate_name'): ?>
                            <a href="<?= htmlspecialchars(pfm_apply_step_url($p['step'])) ?>">Fix on Step <?= (int) $p['step'] ?> &rarr;</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="pfm-review">
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Organization</h3>
                <a href="<?= htmlspecialchars(pfm_apply_step_url(2)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Company</div>
                <div class="pfm-review__val"><?= htmlspecialchars((string) ($org['co_name'] ?? '') ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Business category</div>
                <div class="pfm-review__val">
                    <?php
                        $catLine = $busCatName;
                        if ($busSubcatName !== '') {
                            $catLine = $catLine !== '' ? "{$catLine} — {$busSubcatName}" : $busSubcatName;
                        }
                        echo htmlspecialchars($catLine !== '' ? $catLine : '—');
                    ?>
                </div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Mailing address</div>
                <div class="pfm-review__val"><?= htmlspecialchars($mailingLine ?: '—') ?></div>
            </div>
            <?php
                $links = [];
                if (($org['website_url'] ?? '') !== '')    { $links[] = 'Website: '   . htmlspecialchars((string) $org['website_url']); }
                if (($org['acct_instagram'] ?? '') !== '') { $links[] = 'Instagram: ' . htmlspecialchars((string) $org['acct_instagram']); }
                if (($org['acct_facebook'] ?? '') !== '')  { $links[] = 'Facebook: '  . htmlspecialchars((string) $org['acct_facebook']); }
            ?>
            <?php if ($links): ?>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Online presence</div>
                <div class="pfm-review__val"><?= implode('<br>', $links) ?></div>
            </div>
            <?php endif; ?>
        </section>

        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Main Contact</h3>
                <a href="<?= htmlspecialchars(pfm_apply_step_url(3)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Name</div>
                <div class="pfm-review__val"><?= htmlspecialchars((string) ($contact['name'] ?? '') ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Title</div>
                <div class="pfm-review__val"><?= htmlspecialchars((string) ($contact['title'] ?? '') ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Email</div>
                <div class="pfm-review__val"><?= htmlspecialchars((string) ($contact['email'] ?? '') ?: '—') ?></div>
            </div>
            <div class="pfm-review__row">
                <div class="pfm-review__key">Phone</div>
                <div class="pfm-review__val"><?= htmlspecialchars(!empty($contact['phone']) ? pfm_format_phone((string) $contact['phone']) : '—') ?></div>
            </div>
        </section>

        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Buyers (<?= (int) $buyerCount ?>)</h3>
                <a href="<?= htmlspecialchars(pfm_apply_step_url(4)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <p class="pfm-text-muted pfm-mt-0" style="font-size:0.85rem;">
                Includes the main contact &mdash; edit them on Step 3, or any other buyer on Step 4.
            </p>
            <ul class="pfm-buyer-list pfm-mb-0">
                <li class="pfm-buyer pfm-buyer--primary">
                    <div class="pfm-buyer__avatar"><?= htmlspecialchars(strtoupper(substr((string) ($contact['name'] ?? '?') ?: '?', 0, 1))) ?></div>
                    <div class="pfm-buyer__info">
                        <p class="pfm-buyer__name">
                            <?= htmlspecialchars((string) ($contact['name'] ?? '')) ?>
                            <span class="pfm-badge pfm-badge--primary"
                                  style="display:inline-block; margin-left:8px; padding:2px 8px; background:#727cf5; color:#fff; border-radius:10px; font-size:0.7rem; font-weight:600; vertical-align:middle;">
                                Primary Contact
                            </span>
                        </p>
                        <p class="pfm-buyer__meta">
                            <?= htmlspecialchars((string) ($contact['email'] ?? '')) ?>
                            <?php if (!empty($contact['phone'])): ?>
                                &middot; <?= htmlspecialchars(pfm_format_phone((string) $contact['phone'])) ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </li>
                <?php foreach ($extraBuyers as $b): ?>
                    <?php $bName = (string) ($b['name'] ?? ''); ?>
                    <li class="pfm-buyer">
                        <div class="pfm-buyer__avatar"><?= htmlspecialchars(strtoupper(substr($bName !== '' ? $bName : '?', 0, 1))) ?></div>
                        <div class="pfm-buyer__info">
                            <p class="pfm-buyer__name"><?= htmlspecialchars($bName) ?></p>
                            <p class="pfm-buyer__meta">
                                <?= htmlspecialchars((string) ($b['email'] ?? '')) ?>
                                <?php if (!empty($b['phone'])): ?>
                                    &middot; <?= htmlspecialchars(pfm_format_phone((string) $b['phone'])) ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Documents</h3>
                <a href="<?= htmlspecialchars(pfm_apply_step_url(5)) ?>" class="pfm-review__edit">Edit &rarr;</a>
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
                                <?= htmlspecialchars($docLabel((string) $k)) ?> &middot;
                                <?= number_format(($d['size'] ?? 0) / 1024, 0) ?>&nbsp;KB
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

        <?php if (trim($customerNote) !== ''): ?>
        <section class="pfm-review__section">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Your Note</h3>
                <a href="<?= htmlspecialchars(pfm_apply_step_url(5)) ?>" class="pfm-review__edit">Edit &rarr;</a>
            </div>
            <div class="pfm-text-muted" style="white-space: pre-wrap;"><?= htmlspecialchars($customerNote) ?></div>
        </section>
        <?php endif; ?>

        <?php if ($pricing): ?>
        <section class="pfm-review__section" style="background: #fff;">
            <div class="pfm-review__head">
                <h3 class="pfm-review__title">Membership Total</h3>
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
                Payment is processed securely by Stripe on the next step. Your application
                is reviewed by our team after payment.
            </p>
        </section>
        <?php endif; ?>
    </div>

    <div class="pfm-nav">
        <a href="<?= htmlspecialchars(pfm_apply_step_url(5)) ?>" class="pfm-btn pfm-btn--ghost" data-pfm-back>
            &larr; Back
        </a>
        <button type="button" id="pfm-submit" class="pfm-btn pfm-btn--primary pfm-btn--lg"
                <?= (!empty($problems) || $pricing === null) ? 'disabled' : '' ?>>
            Submit &amp; Continue to Payment &rarr;
        </button>
    </div>
</div>

<script>
(function () {
    var submitBtn = document.getElementById('pfm-submit');
    submitBtn.addEventListener('click', function () {
        if (!confirm('Submit your application and continue to secure Stripe payment?')) return;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="pfm-spinner"></span>&nbsp; Preparing payment…';

        PFM.api.post('submit-application.php', {})
            .then(function (data) {
                window.location.href = data.redirect_url || <?= json_encode(pfm_apply_step_url(7)) ?>;
            })
            .catch(function (err) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit & Continue to Payment →';
                PFM.toast.show(err.message || 'Submission failed.', 'danger', 8000);
            });
    });
})();
</script>

<?php require RNW_ROOT . '/public/_includes/footer.php'; ?>
