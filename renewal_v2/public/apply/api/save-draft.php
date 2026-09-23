<?php
/**
 * POST /renewal_v2/public/apply/api/save-draft.php
 *
 * Sibling to public/api/save-draft.php — same auto-save contract
 * (called by the shared wizard.js on field blur / step navigation),
 * swapped to NewApplication. Shallow-merges the posted data into the
 * application's draft_data.
 *
 * Request (POST):
 *   data  JSON string of fields to save (e.g. '{"co_name":"Acme","city":"Portland"}')
 *   step  Optional: current step number (1–8) to advance the progress bar
 *
 * Response (JSON):
 *   { success: true, data: { current_step: 3 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/_includes/apply_api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$application = api_require_application();
api_require_draft($application);

$rawData = trim((string) ($_POST['data'] ?? ''));
if ($rawData === '') {
    api_error('No data provided.', 400, 'missing_data');
}

$data = json_decode($rawData, true);
if (!is_array($data)) {
    api_error('data must be a valid JSON object.', 400, 'invalid_json');
}

// Sanitise: remove keys that callers should never set directly
// (mirrors save-draft.php's own forbidden-keys guard)
$forbidden = ['documents', '__meta'];
foreach ($forbidden as $key) {
    unset($data[$key]);
}

$step = null;
if (isset($_POST['step']) && ctype_digit((string) $_POST['step'])) {
    $step = (int) $_POST['step'];
    if ($step < 1 || $step > 8) {
        $step = null;
    }
}

$application->saveDraft($data, $step);

api_ok(['current_step' => $application->currentStep]);
