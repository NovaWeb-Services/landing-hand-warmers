<section class="bg-gradient-to-b from-slate-50 via-sky-50 to-slate-50 py-16 lg:py-24 relative overflow-hidden" style="background: linear-gradient(to bottom, #f8fafc, #f0f9ff, #f8fafc);">
    <!-- Background -->
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1491002052546-bf38f186af56?w=1920&h=1080&fit=crop" alt="" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-b from-sky-200/50 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
            <?php if (!empty($offer['problem_badge_text'])): ?>
            <div class="inline-flex items-center gap-2 bg-sky-100 text-sky-700 text-sm font-semibold px-4 py-2 rounded-full mb-4">
                <i data-lucide="snowflake" class="w-4 h-4"></i>
                <span><?= e($offer['problem_badge_text']) ?></span>
            </div>
            <?php endif; ?>

            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-6 leading-tight">
                <?= e($offer['problem_headline'] ?? '') ?> <span class="text-sky-600"><?= e($offer['problem_headline_highlight'] ?? '') ?></span>
            </h2>

            <?php if (!empty($offer['problem_description'])): ?>
            <p class="text-lg text-slate-600 leading-relaxed">
                <?= e($offer['problem_description']) ?>
            </p>
            <?php endif; ?>
        </div>

        <!-- Problem Grid -->
        <div class="grid md:grid-cols-2 gap-5 lg:gap-6 max-w-4xl mx-auto">
            <?php foreach ($offer['problems'] ?? [] as $problem): ?>
            <div class="group bg-white/90 backdrop-blur-sm border border-sky-200 rounded-xl p-5 lg:p-6 hover:shadow-lg hover:border-sky-300 transition-all duration-300">
                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-lg bg-sky-100 flex items-center justify-center flex-shrink-0 group-hover:bg-sky-200 transition-colors">
                        <i data-lucide="<?= e($problem['icon'] ?? 'alert-circle') ?>" class="w-5 h-5 text-sky-600"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2"><?= e($problem['title']) ?></h3>
                        <p class="text-slate-600 text-sm leading-relaxed"><?= e($problem['description']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Emotional Hook -->
        <?php if (!empty($offer['problem_hook_text'])): ?>
        <div class="text-center mt-12 lg:mt-16">
            <div class="inline-block bg-gradient-to-r from-sky-50 via-white to-orange-50 border border-amber-200 rounded-xl px-6 py-4 max-w-2xl shadow-lg">
                <p class="text-slate-800 text-base lg:text-lg">
                    <?= e($offer['problem_hook_text']) ?>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
