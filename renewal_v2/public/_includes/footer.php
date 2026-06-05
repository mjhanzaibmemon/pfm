<?php
/**
 * Shared visible footer + closing tags. Loads wizard.js at the very end so
 * the DOM is parsed before the script runs.
 */
?>
        </div><!-- /.pfm-container -->
    </main>

    <footer class="pfm-footer" role="contentinfo">
        <div class="pfm-container">
            Questions? Email
            <a href="mailto:<?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?>"><?= htmlspecialchars(PFM_RNW_SUPPORT_EMAIL) ?></a>
            &middot; Portland Flower Market
        </div>
    </footer>
</div><!-- /.pfm-shell -->

<?php
// Note: wizard.js is loaded in header.php (inside <head>) so that the
// global window.PFM is available BEFORE any per-step inline <script>
// runs. Don't load it again here — duplicate load would re-bind handlers.
?>
</body>
</html>
