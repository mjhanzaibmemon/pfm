/**
 * PFM Renewal v2 — Wizard JS
 *
 * Plain vanilla JavaScript (no jQuery dependency) — keeps the wizard
 * lightweight and matches what gets shipped with the legacy site without
 * pulling in extra runtime code.
 *
 * Public API exposed on window.PFM:
 *   PFM.api.post(endpoint, formData)     — POST with CSRF, returns parsed JSON
 *   PFM.api.upload(endpoint, file, key)  — multipart upload with CSRF
 *   PFM.autosave.attach(form, opts)      — debounced save-on-blur for a form
 *   PFM.nav.next(stepUrl, validate)      — go to next step after validating
 *   PFM.toast.show(message, level)       — non-blocking message
 */
(function (window, document) {
    'use strict';

    // ── 1. CSRF + base config ──────────────────────────────────
    function getCsrfToken() {
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? meta.getAttribute('content') : '';
    }

    function getApiBase() {
        const meta = document.querySelector('meta[name="pfm-api-base"]');
        return meta ? meta.getAttribute('content') : '/renewal_v2/public/api';
    }

    // ── 2. API helpers ─────────────────────────────────────────
    const api = {
        /**
         * POST form-encoded data to an API endpoint.
         * Automatically attaches CSRF token via X-CSRF-Token header.
         *
         * @param {string} endpoint  e.g. 'save-draft.php'
         * @param {Object|FormData} data
         * @returns {Promise<Object>}  Parsed JSON response
         */
        async post(endpoint, data) {
            const url = getApiBase() + '/' + endpoint;
            const csrf = getCsrfToken();

            let body;
            const headers = { 'X-CSRF-Token': csrf };

            if (data instanceof FormData) {
                body = data;
                // Don't set Content-Type — browser will set multipart boundary
            } else {
                body = new URLSearchParams(data || {}).toString();
                headers['Content-Type'] = 'application/x-www-form-urlencoded';
            }

            let response;
            try {
                response = await fetch(url, {
                    method: 'POST',
                    headers,
                    body,
                    credentials: 'same-origin',
                });
            } catch (err) {
                throw new Error('Network error: ' + (err.message || 'unable to reach server'));
            }

            // Try to parse JSON regardless of status — our API always returns JSON
            let payload = null;
            try { payload = await response.json(); } catch (e) { /* ignore */ }

            if (!response.ok || (payload && payload.success === false)) {
                const msg = (payload && payload.error) || ('Request failed (HTTP ' + response.status + ')');
                const err = new Error(msg);
                err.code = (payload && payload.error_code) || '';
                err.status = response.status;
                throw err;
            }

            return (payload && payload.data) || {};
        },

        /**
         * Upload a file with a slot key.
         * Wraps `upload-document.php` for clarity at call sites.
         *
         * @param {File} file
         * @param {string} key  Document slot identifier
         * @returns {Promise<Object>}  { key, original_name, mime_type, size, file_count }
         */
        upload(file, key) {
            const fd = new FormData();
            fd.append('file', file);
            fd.append('key', key);
            return this.post('upload-document.php', fd);
        },
    };

    // ── 3. Auto-save (debounced) ───────────────────────────────
    const autosave = {
        /**
         * Attach debounced auto-save to all named inputs inside `form`.
         *
         * @param {HTMLFormElement|string} formOrSelector
         * @param {Object} opts
         *   - section: string  Section key in draft_data (e.g. 'org', 'contact')
         *   - step:    number  Current step (1-8) — advances current_step in DB
         *   - debounce: number Milliseconds (default 500)
         *   - onSaved: function(data)
         *   - onError: function(err)
         */
        attach(formOrSelector, opts) {
            const form = typeof formOrSelector === 'string'
                ? document.querySelector(formOrSelector)
                : formOrSelector;
            if (!form) return;

            const config = Object.assign({
                section: '',
                step:    null,
                debounce: 500,
                onSaved: null,
                onError: null,
            }, opts || {});

            const statusEl = document.querySelector('[data-pfm-savestate]');
            const setStatus = (state, text) => {
                if (!statusEl) return;
                statusEl.className = 'pfm-nav__save pfm-nav__save--' + state;
                statusEl.textContent = text;
            };

            let timer = null;
            const flush = () => {
                clearTimeout(timer);
                const payload = {};
                if (config.section) {
                    payload[config.section] = collectForm(form);
                } else {
                    Object.assign(payload, collectForm(form));
                }

                setStatus('saving', 'Saving…');
                const post = { data: JSON.stringify(payload) };
                if (config.step) post.step = config.step;

                api.post('save-draft.php', post)
                    .then(data => {
                        setStatus('saved', 'Saved');
                        if (config.onSaved) config.onSaved(data);
                        // Fade saved indicator after a moment
                        setTimeout(() => { if (statusEl && statusEl.textContent === 'Saved') statusEl.textContent = ''; }, 2000);
                    })
                    .catch(err => {
                        setStatus('error', 'Save failed: ' + err.message);
                        if (config.onError) config.onError(err);
                    });
            };

            form.addEventListener('input', () => {
                clearTimeout(timer);
                timer = setTimeout(flush, config.debounce);
            }, true);

            // Flush on blur and before navigating away — catches the last typed char
            form.addEventListener('blur', flush, true);
            window.addEventListener('beforeunload', () => {
                if (timer) flush();
            });

            // Expose manual flush
            return { flush };
        },
    };

    /**
     * Collect all named form fields into a plain object.
     * Handles inputs, selects, textareas, checkboxes, radios.
     */
    function collectForm(form) {
        const out = {};
        const elements = form.elements || [];
        for (let i = 0; i < elements.length; i++) {
            const el = elements[i];
            if (!el.name) continue;

            if (el.type === 'checkbox') {
                out[el.name] = !!el.checked;
            } else if (el.type === 'radio') {
                if (el.checked) out[el.name] = el.value;
            } else if (el.type !== 'file' && el.type !== 'submit' && el.type !== 'button') {
                out[el.name] = el.value;
            }
        }
        return out;
    }

    // ── 4. Navigation ──────────────────────────────────────────
    const nav = {
        /**
         * Validate then go to next step.
         * If validate returns false (or throws), navigation is cancelled.
         *
         * @param {string} url
         * @param {function|null} validate  Optional sync validator
         */
        next(url, validate) {
            if (typeof validate === 'function') {
                try {
                    if (!validate()) return;
                } catch (err) {
                    toast.show(err.message || 'Please fix the highlighted fields.', 'danger');
                    return;
                }
            }
            window.location.href = url;
        },

        back(url) { window.location.href = url; },
    };

    // ── 5. Toasts ──────────────────────────────────────────────
    const toast = {
        show(message, level = 'info', durationMs = 4000) {
            let host = document.getElementById('pfm-toast-host');
            if (!host) {
                host = document.createElement('div');
                host.id = 'pfm-toast-host';
                host.style.cssText = [
                    'position:fixed', 'top:20px', 'right:20px', 'z-index:9999',
                    'display:flex', 'flex-direction:column', 'gap:8px',
                ].join(';');
                document.body.appendChild(host);
            }

            const el = document.createElement('div');
            el.className = 'pfm-alert pfm-alert--' + level;
            el.style.maxWidth = '360px';
            el.style.boxShadow = '0 4px 16px rgba(0,0,0,0.15)';
            el.textContent = message;
            host.appendChild(el);

            setTimeout(() => {
                el.style.transition = 'opacity 0.3s ease';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 350);
            }, durationMs);
        },
    };

    // ── 6. Field validation helpers ────────────────────────────
    const validate = {
        /**
         * Validate that all fields with `data-pfm-required` are non-empty.
         * Adds .pfm-field--error to the parent .pfm-field on failure.
         *
         * @param {HTMLElement|string} formOrSelector
         * @returns {boolean}
         */
        required(formOrSelector) {
            const form = typeof formOrSelector === 'string'
                ? document.querySelector(formOrSelector)
                : formOrSelector;
            if (!form) return true;

            let ok = true;
            const fields = form.querySelectorAll('[data-pfm-required]');
            for (let i = 0; i < fields.length; i++) {
                const el = fields[i];
                const wrapper = el.closest('.pfm-field') || el.parentElement;
                const empty = !el.value || !String(el.value).trim();
                if (empty) {
                    ok = false;
                    if (wrapper) wrapper.classList.add('pfm-field--error');
                } else {
                    if (wrapper) wrapper.classList.remove('pfm-field--error');
                }
            }
            return ok;
        },

        /** Validate one specific field by selector — same semantics as required(). */
        field(selector) {
            const el = document.querySelector(selector);
            if (!el) return true;
            const wrapper = el.closest('.pfm-field') || el.parentElement;
            const empty = !el.value || !String(el.value).trim();
            if (empty) {
                if (wrapper) wrapper.classList.add('pfm-field--error');
                return false;
            }
            if (wrapper) wrapper.classList.remove('pfm-field--error');
            return true;
        },

        email(value) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(value || '').trim());
        },
    };

    // ── 7. Format helpers ──────────────────────────────────────
    const format = {
        bytes(n) {
            const units = ['B', 'KB', 'MB'];
            let i = 0;
            while (n >= 1024 && i < units.length - 1) { n /= 1024; i++; }
            return n.toFixed(n >= 10 || i === 0 ? 0 : 1) + ' ' + units[i];
        },
        money(dollars) {
            return '$' + Number(dollars).toFixed(2);
        },
        initials(name) {
            return String(name || '?')
                .split(/\s+/)
                .filter(Boolean)
                .slice(0, 2)
                .map(w => w[0].toUpperCase())
                .join('');
        },
    };

    // ── 8. Expose public API ───────────────────────────────────
    window.PFM = {
        api,
        autosave,
        nav,
        toast,
        validate,
        format,
        collectForm,
    };

    // ── 9. Auto-attach behaviours when DOM ready ───────────────
    document.addEventListener('DOMContentLoaded', function () {
        // Auto-wire Back buttons
        document.querySelectorAll('[data-pfm-back]').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                window.history.length > 1 ? window.history.back() : (window.location.href = btn.getAttribute('href') || '#');
            });
        });

        // Highlight current field group on focus
        document.querySelectorAll('.pfm-input, .pfm-textarea, .pfm-select').forEach(el => {
            el.addEventListener('focus', () => {
                const w = el.closest('.pfm-field');
                if (w) w.classList.remove('pfm-field--error');
            });
        });
    });

})(window, document);
