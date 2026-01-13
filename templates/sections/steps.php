<section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                How It <span class="text-orange-500">Works</span>
            </h2>
            <p class="text-lg text-slate-600">Simple to use, impossible to live without</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <?php foreach ($offer['steps'] as $index => $step): ?>
            <div class="relative text-center">
                <!-- Connector line -->
                <?php if ($step['step_number'] < count($offer['steps'])): ?>
                <div class="hidden md:block absolute top-10 left-[60%] w-[80%] h-0.5 bg-gradient-to-r from-orange-300 to-orange-100"></div>
                <?php endif; ?>

                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4 text-white font-black text-3xl shadow-lg shadow-orange-500/25" style="background: linear-gradient(to bottom right, #fb923c, #ef4444);">
                        <?= e($step['step_number']) ?>
                    </div>
                    <?php if (!empty($step['time_label'])): ?>
                    <div class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                        <?= e($step['time_label']) ?>
                    </div>
                    <?php endif; ?>
                </div>
                <h3 class="font-bold text-slate-900 text-xl mb-2"><?= e($step['title']) ?></h3>
                <p class="text-slate-600 leading-relaxed"><?= e($step['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <button onclick="scrollToBundle()" class="btn-primary-cta px-8 py-4 text-lg font-bold rounded-xl inline-flex items-center gap-2">
                <span>Get Started Now</span>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
</section>
