<section class="relative min-h-screen bg-gradient-to-br from-slate-50 via-white to-orange-50 overflow-hidden" style="background: linear-gradient(to bottom right, #f8fafc, #ffffff, #fff7ed);">
    <!-- Subtle Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 right-20 w-72 h-72 bg-orange-100 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-100 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 pt-14 lg:pt-8 pb-8 lg:py-16">
        <!-- Trust Bar -->
        <div class="flex flex-wrap justify-center gap-4 lg:gap-8 mb-6 lg:mb-8 text-slate-600 text-xs lg:text-sm">
            <div class="flex items-center gap-1.5">
                <i data-lucide="truck" class="w-4 h-4 text-green-600"></i>
                <span class="font-medium">FREE Express Shipping</span>
            </div>
            <div class="flex items-center gap-1.5">
                <i data-lucide="shield" class="w-4 h-4 text-green-600"></i>
                <span class="font-medium"><?= e($offer['guarantee_days'] ?? 60) ?>-Day Guarantee</span>
            </div>
            <div class="flex items-center gap-1.5">
                <i data-lucide="clock" class="w-4 h-4 text-green-600"></i>
                <span class="font-medium">Ships in 24hrs</span>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6 lg:gap-12 items-center">
            <!-- Left: Content -->
            <div class="text-center lg:text-left order-2 lg:order-1">
                <!-- Sale Badge -->
                <?php if (!empty($offer['hero_badge_text'])): ?>
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-full text-xs lg:text-sm font-bold mb-4 lg:mb-6 shadow-lg shadow-orange-500/25" style="background: linear-gradient(to right, #f59e0b, #f97316);">
                    <i data-lucide="flame" class="w-4 h-4"></i>
                    <span><?= e($offer['hero_badge_text']) ?></span>
                </div>
                <?php endif; ?>

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-slate-900 leading-[1.1] mb-4 lg:mb-6">
                    <?= e($offer['hero_headline'] ?? '') ?><br />
                    <span class="text-orange-500"><?= e($offer['hero_headline_highlight'] ?? '') ?></span>
                    <?php if (!empty($offer['hero_subheadline'])): ?>
                    <br /><span><?= e($offer['hero_subheadline']) ?></span>
                    <?php endif; ?>
                </h1>

                <p class="text-base lg:text-xl text-slate-600 mb-5 lg:mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    <?= e($offer['hero_description'] ?? '') ?>
                </p>

                <!-- MOBILE: Value Box -->
                <?php if ($popularBundle): ?>
                <div class="lg:hidden bg-slate-900 rounded-xl p-4 mb-5 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-slate-400 text-xs uppercase tracking-wide"><?= e($popularBundle['quantity']) ?>-Pack <?= e($popularBundle['name']) ?></div>
                            <div class="text-2xl font-black">
                                $<?= formatPrice($popularBundle['price']) ?>
                                <span class="text-slate-400 line-through text-base font-normal">$<?= formatPrice($popularBundle['original_price']) ?></span>
                            </div>
                        </div>
                        <div class="bg-green-500 rounded-lg px-3 py-2 text-center">
                            <div class="font-black text-lg">$<?= formatPrice($popularBundle['per_unit_price']) ?></div>
                            <div class="text-[10px] uppercase tracking-wide">per unit</div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Social Proof -->
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-5 lg:mb-8 flex-wrap">
                    <div class="flex -space-x-2">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=40&h=40&fit=crop&crop=face" class="w-9 h-9 lg:w-11 lg:h-11 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" class="w-9 h-9 lg:w-11 lg:h-11 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face" class="w-9 h-9 lg:w-11 lg:h-11 rounded-full border-2 border-white shadow-sm object-cover" alt="" />
                    </div>
                    <div class="flex items-center gap-1">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                        <i data-lucide="star" class="w-4 h-4 lg:w-5 lg:h-5 fill-yellow-400 text-yellow-400"></i>
                        <?php endfor; ?>
                    </div>
                    <span class="text-slate-700 text-xs lg:text-sm font-semibold"><?= e($offer['stats_rating'] ?? '4.9') ?>/5 from <?= e($offer['stats_reviews_count'] ?? '2,847') ?> reviews</span>
                </div>

                <!-- Bundle Selector Card -->
                <div class="bg-white rounded-2xl p-5 lg:p-6 mb-4 lg:mb-6 shadow-xl border border-slate-200">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-slate-900 font-bold">Choose Your Bundle:</p>
                        <span class="text-xs text-orange-600 font-semibold bg-orange-50 px-2 py-1 rounded-full">Save up to <?= e($offer['urgency_max_savings'] ?? '28%') ?></span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 lg:gap-3">
                        <?php foreach ($offer['bundles'] as $index => $bundle): ?>
                        <button
                            onclick="selectBundle(<?= $bundle['id'] ?>)"
                            class="bundle-card relative p-3 lg:p-4 rounded-xl border-2 transition-all duration-300 <?= ($selectedBundle && $selectedBundle['id'] == $bundle['id']) ? 'border-orange-500 bg-orange-50 shadow-lg scale-105' : 'border-slate-200 hover:border-slate-300 bg-white' ?>"
                            data-bundle-id="<?= $bundle['id'] ?>"
                        >
                            <?php if (!empty($bundle['badge_text'])): ?>
                            <span class="absolute -top-2.5 left-1/2 -translate-x-1/2 bg-orange-500 text-white text-[8px] lg:text-[10px] px-1.5 lg:px-2 py-0.5 rounded-full font-bold whitespace-nowrap">
                                <?= e($bundle['badge_text']) ?>
                            </span>
                            <?php endif; ?>
                            <div class="text-xl lg:text-2xl font-bold text-slate-900"><?= e($bundle['quantity']) ?></div>
                            <div class="text-slate-500 text-[10px] lg:text-xs">Pack<?= $bundle['quantity'] > 1 ? 's' : '' ?></div>
                            <div class="text-orange-600 font-bold text-sm lg:text-base mt-1">$<?= formatPrice($bundle['price']) ?></div>
                            <?php if ($bundle['savings_percent'] > 0): ?>
                            <div class="text-green-600 text-[10px] lg:text-xs font-bold bg-green-100 rounded px-1 mt-1">
                                SAVE <?= e($bundle['savings_percent']) ?>%
                            </div>
                            <?php endif; ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Primary CTA -->
                <button
                    onclick="scrollToBundle()"
                    class="btn-primary-cta w-full font-extrabold text-lg lg:text-xl px-8 py-4 lg:py-5 rounded-xl flex items-center justify-center gap-2"
                >
                    <i data-lucide="zap" class="w-5 h-5"></i>
                    <span><?= e($offer['hero_cta_text'] ?? 'Get My Bundle – From $18/unit') ?></span>
                </button>

                <!-- Stock urgency -->
                <p class="mt-3 text-center text-sm text-slate-600">
                    <strong class="text-slate-900">847 sold today</strong> — Only <strong class="text-red-600"><?= e($offer['urgency_stock_count'] ?? 47) ?> left</strong> at sale price
                </p>
            </div>

            <!-- Right: Product Image -->
            <div class="order-1 lg:order-2 relative">
                <div class="relative z-10">
                    <!-- MOBILE: Savings badge -->
                    <?php if ($bestValueBundle): ?>
                    <div class="absolute top-3 right-3 z-20 lg:hidden">
                        <div class="bg-green-500 text-white px-3 py-2 rounded-lg shadow-lg text-center">
                            <div class="text-[10px] uppercase">Save</div>
                            <div class="text-xl font-extrabold"><?= e($bestValueBundle['savings_percent'] ?? 28) ?>%</div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="aspect-[4/3] lg:aspect-square max-w-md mx-auto rounded-2xl lg:rounded-3xl overflow-hidden shadow-2xl border border-slate-100 relative">
                        <?php if (!empty($offer['hero_image_url'])): ?>
                        <img
                            src="<?= e($offer['hero_image_url']) ?>"
                            alt="<?= e($offer['name'] ?? 'Product') ?>"
                            class="w-full h-full object-cover"
                        />
                        <?php else: ?>
                        <div class="w-full h-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                            <i data-lucide="package" class="w-24 h-24 text-white/50"></i>
                        </div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 lg:bottom-6 left-4 lg:left-6 right-4 lg:right-6 text-white">
                            <div class="text-xs lg:text-sm font-medium opacity-90">Premium Quality</div>
                            <div class="text-xl lg:text-2xl font-bold"><?= e($offer['brand_name'] ?? $offer['name'] ?? 'Product') ?></div>
                        </div>
                    </div>

                    <!-- Desktop floating features -->
                    <div class="hidden lg:block absolute top-4 -left-8 bg-white rounded-xl p-3 shadow-lg border border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i data-lucide="flame" class="w-5 h-5 text-orange-500"></i>
                            </div>
                            <div>
                                <div class="text-slate-900 font-bold text-sm">8+ Hours</div>
                                <div class="text-slate-500 text-xs">Per Charge</div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden lg:block absolute bottom-8 -right-8 bg-white rounded-xl p-3 shadow-lg border border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i data-lucide="zap" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <div>
                                <div class="text-slate-900 font-bold text-sm">3 Seconds</div>
                                <div class="text-slate-500 text-xs">Heat Up</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
