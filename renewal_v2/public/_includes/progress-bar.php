<?php
/**
 * Visual progress bar for wizard steps (1..8).
 * Expects: $PFM_STEP (1-8 — the current step)
 */
$pfmSteps = [
    1 => 'Welcome',
    2 => 'Organization',
    3 => 'Contact',
    4 => 'Buyers',
    5 => 'Documents',
    6 => 'Review',
    7 => 'Payment',
    8 => 'Done',
];
$pfmCurrent = (int) ($PFM_STEP ?? 1);
?>
<nav class="pfm-progress" aria-label="Renewal progress">
    <ol class="pfm-progress__steps">
        <?php foreach ($pfmSteps as $n => $label): ?>
            <?php
            $cls = 'pfm-progress__step';
            if ($n < $pfmCurrent)      $cls .= ' pfm-progress__step--done';
            elseif ($n === $pfmCurrent) $cls .= ' pfm-progress__step--current';
            ?>
            <li class="<?= $cls ?>" aria-current="<?= $n === $pfmCurrent ? 'step' : 'false' ?>">
                <span class="pfm-progress__num"><?= $n < $pfmCurrent ? '&#10003;' : $n ?></span>
                <span class="pfm-progress__label"><?= htmlspecialchars($label) ?></span>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
