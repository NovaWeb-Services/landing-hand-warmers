<section class="py-16 lg:py-24 bg-gradient-to-b from-white to-orange-50" style="background: linear-gradient(to bottom, #ffffff, #fff7ed);">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <div class="w-28 h-28 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl shadow-orange-500/30" style="background: linear-gradient(to bottom right, #fb923c, #ef4444);">
                <i data-lucide="shield" class="w-14 h-14 text-white"></i>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                <?= e($offer['guarantee_name'] ?? $offer['guarantee_days'] . '-Day Money-Back Guarantee') ?>
            </h2>
            <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                <?= e($offer['guarantee_description'] ?? 'Try it risk-free. If you\'re not completely satisfied, we\'ll refund your purchase - no questions asked.') ?>
            </p>
            <button onclick="scrollToBundle()" class="btn-primary-cta px-10 py-5 text-xl font-bold rounded-xl inline-flex items-center gap-2">
                <span>Start Risk-Free Today</span>
                <i data-lucide="arrow-right" class="w-6 h-6"></i>
            </button>
        </div>
    </div>
</section>
