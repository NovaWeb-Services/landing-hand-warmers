<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($offer['meta_title'] ?? $offer['brand_name'] ?? 'Special Offer') ?></title>
    <meta name="description" content="<?= e($offer['meta_description'] ?? '') ?>">

    <!-- Pre-compiled Tailwind CSS (no CDN needed) -->
    <link rel="stylesheet" href="assets/styles.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tracking Pixels -->
    <?php if (!empty($offer['facebook_pixel_id'])): ?>
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?= e($offer['facebook_pixel_id']) ?>');
        fbq('track', 'PageView');
    </script>
    <?php endif; ?>

    <?php if (!empty($offer['google_analytics_id'])): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($offer['google_analytics_id']) ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= e($offer['google_analytics_id']) ?>');
    </script>
    <?php endif; ?>

</head>
<body class="bg-white antialiased pb-20 lg:pb-0">
    <?php
    // Helper function to format prices
    function formatPrice($value) {
        $num = is_string($value) ? floatval($value) : $value;
        return number_format($num, 2);
    }

    // Get popular bundle
    $popularBundle = null;
    $bestValueBundle = null;
    foreach ($offer['bundles'] as $bundle) {
        if (!empty($bundle['is_popular'])) $popularBundle = $bundle;
        if (!empty($bundle['is_best_value'])) $bestValueBundle = $bundle;
    }
    if (!$popularBundle && !empty($offer['bundles'])) {
        $popularBundle = $offer['bundles'][1] ?? $offer['bundles'][0];
    }

    // Initial selected bundle
    $selectedBundle = $popularBundle;
    ?>

    <!-- MOBILE STICKY URGENCY BAR -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-slate-900 text-white py-2.5 px-4">
        <div class="flex items-center justify-center gap-3 text-sm">
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                <span class="font-bold"><span id="live-viewers">23</span> people viewing</span>
            </div>
            <span class="opacity-50">|</span>
            <div class="flex items-center gap-1">
                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                <span class="font-mono font-bold" id="countdown-timer">2:14:33</span>
            </div>
        </div>
    </div>

    <!-- SECTION 1: HERO -->
    <?php include __DIR__ . '/sections/hero.php'; ?>

    <!-- SECTION 2: PROBLEM -->
    <?php if (!empty($offer['problems'])): ?>
        <?php include __DIR__ . '/sections/problem.php'; ?>
    <?php endif; ?>

    <!-- SECTION 3: SOLUTION -->
    <?php include __DIR__ . '/sections/solution.php'; ?>

    <!-- SECTION 4: BUNDLES -->
    <?php if (!empty($offer['bundles'])): ?>
        <?php include __DIR__ . '/sections/bundles.php'; ?>
    <?php endif; ?>

    <!-- SECTION 5: BENEFITS -->
    <?php include __DIR__ . '/sections/benefits.php'; ?>

    <!-- SECTION 6: HOW IT WORKS -->
    <?php if (!empty($offer['steps'])): ?>
        <?php include __DIR__ . '/sections/steps.php'; ?>
    <?php endif; ?>

    <!-- SECTION 7: REVIEWS / SOCIAL PROOF -->
    <?php if (!empty($offer['reviews'])): ?>
        <?php include __DIR__ . '/sections/reviews.php'; ?>
    <?php endif; ?>

    <!-- SECTION 8: COMPARISON -->
    <?php if (!empty($offer['comparisons'])): ?>
        <?php include __DIR__ . '/sections/comparison.php'; ?>
    <?php endif; ?>

    <!-- SECTION 9: URGENCY -->
    <?php include __DIR__ . '/sections/urgency.php'; ?>

    <!-- SECTION 10: FAQ -->
    <?php if (!empty($offer['faqs'])): ?>
        <?php include __DIR__ . '/sections/faq.php'; ?>
    <?php endif; ?>

    <!-- SECTION 11: GUARANTEE -->
    <?php if (!empty($offer['guarantee_name']) || !empty($offer['guarantee_days'])): ?>
        <?php include __DIR__ . '/sections/guarantee.php'; ?>
    <?php endif; ?>

    <!-- SECTION 12: FINAL CTA -->
    <?php include __DIR__ . '/sections/final-cta.php'; ?>

    <!-- SECTION 13: FOOTER -->
    <?php include __DIR__ . '/sections/footer.php'; ?>

    <!-- MOBILE STICKY CTA -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-t border-slate-200 p-3 shadow-2xl">
        <button
            onclick="openCheckoutModal()"
            class="btn-primary-cta w-full font-extrabold py-4 rounded-xl flex items-center justify-center gap-2"
        >
            <i data-lucide="zap" class="w-4 h-4"></i>
            <span>Claim Your Offer – $<span id="mobile-price"><?= formatPrice($selectedBundle['price'] ?? 0) ?></span></span>
        </button>
    </div>

    <!-- Checkout Modal -->
    <div id="checkout-modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <?php include __DIR__ . '/sections/checkout.php'; ?>
        </div>
    </div>

    <!-- Lucide Icons Init -->
    <script>lucide.createIcons();</script>

    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Page Scripts -->
    <script>
        // Initialize offer data
        window.offerData = <?= json_encode([
            'id' => $offer['id'],
            'slug' => $offer['slug'],
            'bundles' => $offer['bundles'],
            'stripe_publishable_key' => $offer['stripe_publishable_key'] ?? '',
            'stripe_account_id' => $offer['stripe_account_id'] ?? null,
        ]) ?>;
        window.checkoutApiUrl = '<?= e($checkoutApiUrl) ?>';

        // Countdown timer
        let hours = 2, minutes = 14, seconds = 33;
        function updateTimer() {
            if (seconds > 0) {
                seconds--;
            } else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else if (hours > 0) {
                hours--;
                minutes = 59;
                seconds = 59;
            }
            document.getElementById('countdown-timer').textContent =
                hours + ':' + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');

            // Update urgency section countdown
            const urgencyHours = document.getElementById('countdown-hours');
            const urgencyMinutes = document.getElementById('countdown-minutes');
            const urgencySeconds = document.getElementById('countdown-seconds');
            if (urgencyHours) urgencyHours.textContent = String(hours).padStart(2, '0');
            if (urgencyMinutes) urgencyMinutes.textContent = String(minutes).padStart(2, '0');
            if (urgencySeconds) urgencySeconds.textContent = String(seconds).padStart(2, '0');
        }
        setInterval(updateTimer, 1000);

        // Live viewers
        function updateViewers() {
            document.getElementById('live-viewers').textContent = 20 + Math.floor(Math.random() * 15);
        }
        setInterval(updateViewers, 5000);

        // Bundle selection
        let selectedBundleId = <?= $selectedBundle['id'] ?? 'null' ?>;
        function selectBundle(bundleId) {
            selectedBundleId = bundleId;
            const bundle = window.offerData.bundles.find(b => b.id === bundleId);
            if (bundle) {
                // Update all price displays
                document.querySelectorAll('.selected-price').forEach(el => {
                    el.textContent = parseFloat(bundle.price).toFixed(2);
                });
                document.getElementById('mobile-price').textContent = parseFloat(bundle.price).toFixed(2);

                // Update bundle card styles
                document.querySelectorAll('.bundle-card').forEach(card => {
                    if (parseInt(card.dataset.bundleId) === bundleId) {
                        card.classList.add('border-orange-500', 'bg-orange-50', 'shadow-lg', 'scale-105', 'ring-4', 'ring-orange-100');
                        card.classList.remove('border-slate-200');
                    } else {
                        card.classList.remove('border-orange-500', 'bg-orange-50', 'shadow-lg', 'scale-105', 'ring-4', 'ring-orange-100');
                        card.classList.add('border-slate-200');
                    }
                });

                // Update select buttons
                document.querySelectorAll('.bundle-select-btn').forEach(btn => {
                    if (parseInt(btn.dataset.bundleId) === bundleId) {
                        btn.classList.add('bg-gradient-to-r', 'from-orange-500', 'to-red-500', 'text-white', 'shadow-lg');
                        btn.classList.remove('bg-slate-100', 'text-slate-700');
                        btn.textContent = 'Selected';
                    } else {
                        btn.classList.remove('bg-gradient-to-r', 'from-orange-500', 'to-red-500', 'text-white', 'shadow-lg');
                        btn.classList.add('bg-slate-100', 'text-slate-700');
                        btn.textContent = 'Select This Bundle';
                    }
                });
            }
        }

        // Scroll to bundles
        function scrollToBundle() {
            document.getElementById('bundle-section')?.scrollIntoView({ behavior: 'smooth' });
        }

        // Checkout modal
        function openCheckoutModal() {
            const modal = document.getElementById('checkout-modal');
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        function closeCheckoutModal() {
            const modal = document.getElementById('checkout-modal');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        // FAQ toggles
        function toggleFaq(index) {
            const content = document.getElementById('faq-content-' + index);
            const icon = document.querySelector('.faq-icon-' + index);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                if (icon) icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                if (icon) icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>

    <!-- Checkout Logic -->
    <script src="assets/checkout.js"></script>
</body>
</html>
