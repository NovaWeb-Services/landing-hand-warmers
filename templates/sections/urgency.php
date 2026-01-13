<section class="py-12 lg:py-16 bg-gradient-to-r from-slate-900 to-slate-800 text-white" style="background: linear-gradient(to right, #0f172a, #1e293b);">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 bg-red-500/20 text-red-400 px-4 py-2 rounded-full text-sm font-bold mb-6">
                <i data-lucide="alert-circle" class="w-4 h-4"></i>
                <span>LIMITED TIME OFFER</span>
            </div>

            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-4">
                <?= e($offer['urgency_headline'] ?? 'Sale Ends Soon!') ?>
            </h2>
            <p class="text-xl text-slate-300 mb-8">
                <?= e($offer['urgency_subheadline'] ?? 'Don\'t miss out on these incredible savings') ?>
            </p>

            <!-- Countdown -->
            <div class="flex justify-center gap-4 mb-8">
                <div class="bg-slate-800 rounded-xl p-4 min-w-[80px]">
                    <div id="countdown-hours" class="text-3xl font-black">00</div>
                    <div class="text-xs text-slate-400 uppercase">Hours</div>
                </div>
                <div class="bg-slate-800 rounded-xl p-4 min-w-[80px]">
                    <div id="countdown-minutes" class="text-3xl font-black">00</div>
                    <div class="text-xs text-slate-400 uppercase">Minutes</div>
                </div>
                <div class="bg-slate-800 rounded-xl p-4 min-w-[80px]">
                    <div id="countdown-seconds" class="text-3xl font-black">00</div>
                    <div class="text-xs text-slate-400 uppercase">Seconds</div>
                </div>
            </div>

            <button onclick="scrollToBundle()" class="btn-primary-cta px-10 py-5 text-xl font-bold rounded-xl inline-flex items-center gap-2">
                <i data-lucide="zap" class="w-6 h-6"></i>
                <span>Claim Your Discount Now</span>
            </button>

            <p class="mt-4 text-slate-400 text-sm">
                Only <strong class="text-white"><?= e($offer['urgency_stock_count'] ?? 47) ?> units</strong> left at this price
            </p>
        </div>
    </div>
</section>
