<section class="py-16 lg:py-24 bg-gradient-to-b from-orange-50 via-white to-slate-50 relative overflow-hidden" style="background: linear-gradient(to bottom, #fff7ed, #ffffff, #f8fafc);">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-orange-200 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-100 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
            <?php if (!empty($offer['solution_badge_text'])): ?>
            <div class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 text-sm font-semibold px-4 py-2 rounded-full mb-4">
                <i data-lucide="flame" class="w-4 h-4"></i>
                <span><?= e($offer['solution_badge_text']) ?></span>
            </div>
            <?php endif; ?>

            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-6 leading-tight">
                <?= e($offer['solution_headline'] ?? '') ?>
                <span class="gradient-text"><?= e($offer['solution_headline_highlight'] ?? '') ?></span>
            </h2>

            <?php if (!empty($offer['solution_description'])): ?>
            <p class="text-lg text-slate-600 leading-relaxed">
                <?= e($offer['solution_description']) ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- Benefits Grid -->
        <?php if (!empty($offer['benefits'])): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto mb-12">
            <?php foreach ($offer['benefits'] as $benefit): ?>
            <div class="bg-white rounded-xl p-6 shadow-lg border border-orange-100 hover:shadow-xl hover:border-orange-200 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-orange-500/25" style="background: linear-gradient(to bottom right, #fb923c, #ef4444);">
                    <i data-lucide="<?= e($benefit['icon'] ?? 'check') ?>" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2"><?= e($benefit['title']) ?></h3>
                <p class="text-slate-600 text-sm leading-relaxed"><?= e($benefit['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="text-center">
            <button onclick="scrollToBundle()" class="btn-primary-cta px-8 py-4 text-lg font-bold rounded-xl inline-flex items-center gap-2">
                <span>See Pricing Options</span>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
</section>
