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

if (!function_exists('pfm_normalize_phone')) {

    /**
     * Strip a phone value back to raw digits before storing it.
     *
     * Phone fields go INTO the wizard already raw (admin "Add Member"
     * form stores 10 digits) but are then displayed through
     * pfm_format_phone() on Step 3 / Step 6 / admin review, so the
     * value the customer sees in the input — and that the JS live-
     * formatter rewrites in place on every keystroke — is shaped
     * like "(503) 555-0212". Auto-save and submit handlers were
     * dumping that formatted string straight into members.phone1
     * and clients.main_contact_phone. The existing PFM admin's
     * legacy phone input mask then chokes on the parentheses /
     * dashes and renders "((50) 3) - 555-" — broken on Larissa's
     * 2026-06-26 Round 4 test (clients 737836 + member 38727).
     *
     * Canonical storage is raw digits; format-on-display handles
     * the rest. This helper strips every non-digit so either a raw
     * value, an already-formatted display value, or even a value
     * with an extension ("503-555-1212 x123") collapses to a clean
     * digit-only string. Empty / null pass through as null so the
     * caller can write NULL to the column when the customer cleared
     * the field.
     *
     * @param  string|null $raw
     * @return string|null  Raw digits, or null when the input was
     *                      empty / null.
     */
    function pfm_normalize_phone(?string $raw): ?string
    {
        if ($raw === null) {
            return null;
        }
        $digits = preg_replace('/\D+/', '', $raw) ?? '';
        return $digits !== '' ? $digits : null;
    }
}
