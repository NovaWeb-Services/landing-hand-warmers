<section class="bg-gradient-to-b from-white via-blue-50 to-white py-12 lg:py-24 relative overflow-hidden pb-28 lg:pb-24" style="background: linear-gradient(to bottom, #ffffff, #eff6ff, #ffffff);">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1418985991508-e47386d96a71?w=1920&h=1080&fit=crop"
            alt="Winter landscape"
            class="w-full h-full object-cover opacity-10"
        />
    </div>

    <!-- Background Effects -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-orange-100 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- MOBILE: Urgent savings banner -->
            <div class="lg:hidden bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl p-4 mb-6 relative overflow-hidden">
                <div class="flex items-center justify-center gap-2 text-sm font-bold mb-1">
                    <span>WINTER SALE – SAVE UP TO <?= e($offer['urgency_max_savings'] ?? '28%') ?></span>
                </div>
                <div class="text-2xl font-extrabold">As Low As $<?= formatPrice($bestValueBundle['per_unit_price'] ?? 18) ?>/Unit</div>
                <div class="text-orange-100 text-xs mt-1">+ Free Shipping on Multi-Packs</div>
            </div>

            <!-- Section Header -->
            <div class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 lg:px-4 py-1.5 lg:py-2 rounded-full text-xs lg:text-sm font-bold mb-4 lg:mb-6">
                <i data-lucide="zap" class="w-4 h-4"></i>
                <span>Don't Scroll Past This</span>
            </div>

            <h2 class="text-2xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-4 lg:mb-6">
                Still Thinking About It? <br class="hidden lg:block" /><span class="text-orange-500">Your Hands Are Getting Colder.</span>
            </h2>

            <p class="text-base lg:text-xl text-slate-600 mb-6 lg:mb-8 max-w-2xl mx-auto">
                <strong class="text-slate-900"><?= e($offer['stats_reviews_count'] ?? '2,847') ?>+ customers</strong> already made the smart choice. Join them — or keep suffering through another frozen winter.
            </p>

            <!-- Quick Benefits - Scrollable on mobile -->
            <div class="flex lg:flex-wrap lg:justify-center gap-2 lg:gap-3 mb-6 lg:mb-10 overflow-x-auto pb-2 scrollbar-hide">
                <div class="flex items-center gap-1.5 lg:gap-2 bg-white border border-slate-200 rounded-full px-3 lg:px-4 py-1.5 lg:py-2 shadow-sm whitespace-nowrap flex-shrink-0">
                    <i data-lucide="check" class="w-3 h-3 lg:w-4 lg:h-4 text-green-500"></i>
                    <span class="text-slate-700 text-xs lg:text-sm">8+ hours of warmth</span>
                </div>
                <div class="flex items-center gap-1.5 lg:gap-2 bg-white border border-slate-200 rounded-full px-3 lg:px-4 py-1.5 lg:py-2 shadow-sm whitespace-nowrap flex-shrink-0">
                    <i data-lucide="check" class="w-3 h-3 lg:w-4 lg:h-4 text-green-500"></i>
                    <span class="text-slate-700 text-xs lg:text-sm">Heats in 3 seconds</span>
                </div>
                <div class="flex items-center gap-1.5 lg:gap-2 bg-white border border-slate-200 rounded-full px-3 lg:px-4 py-1.5 lg:py-2 shadow-sm whitespace-nowrap flex-shrink-0">
                    <i data-lucide="check" class="w-3 h-3 lg:w-4 lg:h-4 text-green-500"></i>
                    <span class="text-slate-700 text-xs lg:text-sm"><?= e($offer['guarantee_days'] ?? 60) ?>-day guarantee</span>
                </div>
                <div class="flex items-center gap-1.5 lg:gap-2 bg-white border border-slate-200 rounded-full px-3 lg:px-4 py-1.5 lg:py-2 shadow-sm whitespace-nowrap flex-shrink-0">
                    <i data-lucide="check" class="w-3 h-3 lg:w-4 lg:h-4 text-green-500"></i>
                    <span class="text-slate-700 text-xs lg:text-sm">FREE shipping</span>
                </div>
                <div class="flex items-center gap-1.5 lg:gap-2 bg-white border border-slate-200 rounded-full px-3 lg:px-4 py-1.5 lg:py-2 shadow-sm whitespace-nowrap flex-shrink-0">
                    <i data-lucide="check" class="w-3 h-3 lg:w-4 lg:h-4 text-green-500"></i>
                    <span class="text-slate-700 text-xs lg:text-sm">Ships same day</span>
                </div>
            </div>

            <!-- Bundle Quick Select - Full width on mobile -->
            <div class="bg-white rounded-xl lg:rounded-2xl p-4 lg:p-6 mb-6 lg:mb-8 shadow-xl border-2 border-orange-200 lg:inline-block">
                <div class="flex items-center justify-between lg:justify-center mb-3 lg:mb-4">
                    <p class="text-slate-900 text-sm font-bold">Select Your Bundle:</p>
                    <span class="lg:hidden text-xs text-red-600 font-medium"><i data-lucide="zap" class="w-3 h-3 inline"></i> Limited</span>
                </div>
                <div class="grid grid-cols-3 gap-2 lg:flex lg:gap-3 justify-center">
                    <?php foreach ($offer['bundles'] as $bundle): ?>
                    <button
                        onclick="selectBundle(<?= $bundle['id'] ?>)"
                        class="bundle-select-btn px-4 lg:px-6 py-2.5 lg:py-3 rounded-xl font-bold transition-all duration-300 text-sm lg:text-base <?= ($selectedBundle && $selectedBundle['id'] == $bundle['id']) ? 'bg-orange-500 text-white shadow-lg scale-105' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>"
                        data-bundle-id="<?= $bundle['id'] ?>"
                    >
                        <?= e($bundle['quantity']) ?>-Pack
                    </button>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3 lg:mt-4 text-slate-900">
                    <span class="text-2xl lg:text-3xl font-extrabold">$<span class="selected-price"><?= formatPrice($selectedBundle['price'] ?? 0) ?></span></span>
                    <span class="text-slate-500 text-xs lg:text-sm ml-2"><?= e($selectedBundle['name'] ?? '') ?></span>
                </div>
            </div>

            <!-- Main CTA - Full width on mobile -->
            <div>
                <button onclick="openCheckoutModal()" class="btn-primary-cta w-full lg:w-auto text-white font-extrabold text-lg lg:text-xl px-8 lg:px-12 py-4 lg:py-5 rounded-xl inline-flex items-center justify-center gap-2 lg:gap-3">
                    <span>Get Warm Hands Now – $<span class="selected-price"><?= formatPrice($selectedBundle['price'] ?? 0) ?></span></span>
                    <i data-lucide="arrow-right" class="w-5 h-5 lg:w-6 lg:h-6"></i>
                </button>

                <!-- Trust Badges -->
                <div class="flex items-center justify-center gap-3 lg:gap-6 mt-4 lg:mt-6 flex-wrap">
                    <div class="flex items-center gap-1.5 text-slate-500 text-xs lg:text-sm">
                        <i data-lucide="shield" class="w-4 h-4"></i>
                        <span><?= e($offer['guarantee_days'] ?? 60) ?>-Day Guarantee</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-slate-500 text-xs lg:text-sm">
                        <i data-lucide="truck" class="w-4 h-4"></i>
                        <span>Free Shipping</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-slate-500 text-xs lg:text-sm">
                        <i data-lucide="package" class="w-4 h-4"></i>
                        <span>Ships Today</span>
                    </div>
                </div>
            </div>

            <!-- Social Proof Reminder -->
            <div class="mt-6 lg:mt-10">
                <div class="flex items-center justify-center gap-2 flex-wrap">
                    <div class="flex -space-x-2">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=40&h=40&fit=crop&crop=face" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                        <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-700 text-xs font-bold border-2 border-white shadow-sm">+</div>
                    </div>
                    <span class="text-slate-600 text-xs lg:text-sm">
                        <strong class="text-orange-600">847 people</strong> bought today
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
