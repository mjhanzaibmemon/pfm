<?php
/**
 * POST /api/save-draft.php
 *
 * Auto-save endpoint — called by wizard.js on field blur and step navigation.
 * Shallow-merges the posted data into the session's draft_data.
 *
 * Request (POST):
 *   data  JSON string of fields to save (e.g. '{"org_name":"Acme","city":"Portland"}')
 *   step  Optional: current step number (1–8) to advance the progress bar
 *
 * Response (JSON):
 *   { success: true, data: { current_step: 3 } }
 */

declare(strict_types=1);
require_once __DIR__ . '/../_includes/api_bootstrap.php';

api_require_method('POST');
api_require_csrf();

$session = api_require_session();
api_require_draft($session);

// Parse the data payload
$rawData = trim((string) ($_POST['data'] ?? ''));
if ($rawData === '') {
    api_error('No data provided.', 400, 'missing_data');
}

$data = json_decode($rawData, true);
if (!is_array($data)) {
    api_error('data must be a valid JSON object.', 400, 'invalid_json');
}

// Sanitise: remove keys that callers should never set directly
$forbidden = ['documents', '__meta'];
foreach ($forbidden as $key) {
    unset($data[$key]);
}

// Parse optional step
$step = null;
if (isset($_POST['step']) && ctype_digit((string) $_POST['step'])) {
    $step = (int) $_POST['step'];
    if ($step < 1 || $step > 8) {
        $step = null;
    }
}

$session->saveDraft($data, $step);

api_ok(['current_step' => $session->currentStep]);
