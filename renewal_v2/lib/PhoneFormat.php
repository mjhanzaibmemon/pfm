<?php
declare(strict_types=1);

/**
 * Phone number display helpers.
 *
 * Per v3 spec line 397 (Step 3 Main Contact field spec) and line 768
 * (validation rules):
 *   - Stored as 10 raw digits in the database
 *   - Displayed as (XXX) XXX-XXXX
 *
 * Storage was already cleaned in earlier project work (see larissa_rebuild.md
 * "Phone Number Formatting Fix" — REGEXP_REPLACE stripped non-digits from
 * 4,924 staging + 4,906 production records). So 99% of existing rows are
 * 10-digit clean; this helper handles the display side.
 *
 * Functions are kept procedural (no class) so any template can call
 * `pfm_format_phone($digits)` without needing to instantiate or `use`.
 */

if (!function_exists('pfm_format_phone')) {

    /**
     * Format a phone number for display as (XXX) XXX-XXXX.
     *
     * Behaviour:
     *   - 10 digits             → (503) 878-2626   (US format)
     *   - 11 digits leading 1   → 1 (503) 878-2626 (US with country code)
     *   - Anything else         → returned as-is   (graceful — non-US phones
     *                              like Muhammad's 11-digit "0313261879"
     *                              still display readable rather than mangled)
     *   - Empty / null          → empty string
     *
     * Idempotent: passing an already-formatted value like "(503) 878-2626"
     * extracts the 10 digits and re-formats — safe to call multiple times.
     */
    function pfm_format_phone(?string $raw): string
    {
        if ($raw === null || $raw === '') {
            return '';
        }

        $digits = preg_replace('/[^0-9]/', '', $raw) ?? '';
        $len    = strlen($digits);

        // NANPA rule (North American Numbering Plan): valid US/Canada
        // area codes (digits 1-3 of a 10-digit number) NEVER start with
        // 0 or 1. If the first digit is 0/1, this isn't a US number —
        // return raw so non-US numbers like "0313261879" (Pakistan) or
        // "07911123456" (UK) display readable instead of mangled into
        // a fake "(031) 326-1879".
        if ($len === 10 && $digits[0] >= '2') {
            return sprintf(
                '(%s) %s-%s',
                substr($digits, 0, 3),
                substr($digits, 3, 3),
                substr($digits, 6, 4)
            );
        }

        // 11 digits leading "1" is the US country-code form (1-503-...).
        // The area code (digits 2-4) must still pass the NANPA rule.
        if ($len === 11 && $digits[0] === '1' && $digits[1] >= '2') {
            return sprintf(
                '1 (%s) %s-%s',
                substr($digits, 1, 3),
                substr($digits, 4, 3),
                substr($digits, 7, 4)
            );
        }

        // Anything else (wrong length, non-US area code, etc.) — show
        // the raw value rather than guessing.
        return $raw;
    }
}
