<section id="bundle-section" class="py-16 lg:py-24 bg-gradient-to-b from-slate-50 to-white" style="background: linear-gradient(to bottom, #f8fafc, #ffffff);">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                Choose Your <span class="text-orange-500">Bundle</span>
            </h2>
            <p class="text-lg text-slate-600">Select the perfect pack for your needs</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <?php foreach ($offer['bundles'] as $index => $bundle): ?>
            <div
                onclick="selectBundle(<?= $bundle['id'] ?>)"
                class="bundle-card relative bg-white rounded-2xl border-2 cursor-pointer transition-all duration-300 hover:shadow-xl overflow-hidden <?= ($selectedBundle && $selectedBundle['id'] == $bundle['id']) ? 'border-orange-500 shadow-xl ring-4 ring-orange-100 scale-105' : 'border-slate-200 hover:border-slate-300' ?> <?= !empty($bundle['is_popular']) ? 'md:-mt-4 md:mb-4' : '' ?>"
                data-bundle-id="<?= $bundle['id'] ?>"
            >
                <!-- Badge -->
                <?php if (!empty($bundle['badge_text'])): ?>
                <div class="<?= e($bundle['badge_color'] ?? 'bg-orange-500') ?> text-white text-xs font-bold py-2 text-center">
                    <?= e($bundle['badge_text']) ?>
                </div>
                <?php endif; ?>

                <div class="p-6">
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-1"><?= e($bundle['name']) ?></h3>
                        <p class="text-slate-500 text-sm"><?= e($bundle['subtitle'] ?? '') ?></p>
                    </div>

                    <!-- Price -->
                    <div class="text-center mb-6">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <?php if (floatval($bundle['original_price']) > floatval($bundle['price'])): ?>
                            <span class="text-slate-400 line-through text-lg">
                                $<?= formatPrice($bundle['original_price']) ?>
                            </span>
                            <?php endif; ?>
                            <span class="text-4xl font-black text-slate-900">$<?= formatPrice($bundle['price']) ?></span>
                        </div>
                        <p class="text-slate-500 text-sm">$<?= formatPrice($bundle['per_unit_price']) ?> per unit</p>
                        <?php if ($bundle['savings_percent'] > 0): ?>
                        <p class="text-green-600 font-bold text-sm mt-2 bg-green-100 inline-block px-3 py-1 rounded-full">
                            You save $<?= formatPrice($bundle['savings_amount']) ?> (<?= e($bundle['savings_percent']) ?>% off)
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Features -->
                    <?php if (!empty($bundle['features'])): ?>
                    <ul class="space-y-3 mb-6">
                        <?php foreach ($bundle['features'] as $feature): ?>
                        <li class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 shrink-0"></i>
                            <span><?= e($feature) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <!-- Select Button -->
                    <button
                        class="bundle-select-btn w-full py-4 rounded-xl font-bold transition-all text-lg <?= ($selectedBundle && $selectedBundle['id'] == $bundle['id']) ? 'bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-lg shadow-orange-500/25' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>"
                        data-bundle-id="<?= $bundle['id'] ?>"
                    >
                        <?= ($selectedBundle && $selectedBundle['id'] == $bundle['id']) ? 'Selected' : 'Select This Bundle' ?>
                    </button>

                    <?php if (!empty($bundle['cost_per_day'])): ?>
                    <p class="text-center text-xs text-slate-500 mt-3">
                        Only <?= e($bundle['cost_per_day']) ?> over the product lifetime
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Checkout CTA -->
        <div class="mt-12 text-center">
            <button onclick="openCheckoutModal()" class="btn-primary-cta px-12 py-5 text-xl font-bold rounded-xl inline-flex items-center gap-3">
                <span>Claim Your Offer - $<span class="selected-price"><?= formatPrice($selectedBundle['price'] ?? 0) ?></span></span>
                <i data-lucide="arrow-right" class="w-6 h-6"></i>
            </button>
            <div class="flex items-center justify-center gap-6 mt-4 text-sm text-slate-500">
                <span class="flex items-center gap-1"><i data-lucide="shield" class="w-4 h-4 text-green-600"></i> <?= e($offer['guarantee_days'] ?? 60) ?>-Day Guarantee</span>
                <span class="flex items-center gap-1"><i data-lucide="truck" class="w-4 h-4 text-green-600"></i> Free Shipping</span>
            </div>
        </div>
    </div>
</section>
