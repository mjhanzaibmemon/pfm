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

<script src="/renewal_v2/public/assets/js/wizard.js"></script>
</body>
</html>
