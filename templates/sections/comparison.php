<?php if (!empty($offer['comparisons'])): ?>
<section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                See How We <span class="text-orange-500">Compare</span>
            </h2>
            <p class="text-lg text-slate-600">The clear choice for anyone serious about quality</p>
        </div>

        <div class="max-w-4xl mx-auto overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-slate-200">
                        <th class="text-left py-4 px-4 font-bold text-slate-900">Feature</th>
                        <th class="text-center py-4 px-4">
                            <div class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-3 py-1 rounded-full font-bold">
                                <i data-lucide="flame" class="w-4 h-4"></i>
                                <?= e($offer['brand_name'] ?? 'Ours') ?>
                            </div>
                        </th>
                        <th class="text-center py-4 px-4 text-slate-400 font-medium">Brand X</th>
                        <th class="text-center py-4 px-4 text-slate-400 font-medium">Brand Y</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offer['comparisons'] as $comparison): ?>
                    <tr class="border-b border-slate-100 <?= !empty($comparison['is_highlighted']) ? 'bg-orange-50/50' : '' ?>">
                        <td class="py-4 px-4 text-slate-700 font-medium"><?= e($comparison['feature_name']) ?></td>
                        <td class="py-4 px-4 text-center">
                            <?php if (!empty($comparison['our_value_is_boolean']) && $comparison['our_value'] === 'true'): ?>
                            <i data-lucide="check" class="w-6 h-6 text-green-500 mx-auto"></i>
                            <?php elseif (!empty($comparison['our_value_is_boolean']) && $comparison['our_value'] === 'false'): ?>
                            <i data-lucide="x" class="w-6 h-6 text-red-400 mx-auto"></i>
                            <?php else: ?>
                            <span class="text-slate-900 font-bold"><?= e($comparison['our_value']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <?php if (!empty($comparison['competitor1_is_boolean']) && $comparison['competitor1_value'] === 'true'): ?>
                            <i data-lucide="check" class="w-5 h-5 text-slate-400 mx-auto"></i>
                            <?php elseif (!empty($comparison['competitor1_is_boolean']) && $comparison['competitor1_value'] === 'false'): ?>
                            <i data-lucide="x" class="w-5 h-5 text-red-300 mx-auto"></i>
                            <?php else: ?>
                            <span class="text-slate-500"><?= e($comparison['competitor1_value'] ?? '') ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <?php if (!empty($comparison['competitor2_is_boolean']) && $comparison['competitor2_value'] === 'true'): ?>
                            <i data-lucide="check" class="w-5 h-5 text-slate-400 mx-auto"></i>
                            <?php elseif (!empty($comparison['competitor2_is_boolean']) && $comparison['competitor2_value'] === 'false'): ?>
                            <i data-lucide="x" class="w-5 h-5 text-red-300 mx-auto"></i>
                            <?php else: ?>
                            <span class="text-slate-500"><?= e($comparison['competitor2_value'] ?? '') ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-12 text-center">
            <button onclick="scrollToBundle()" class="btn-primary-cta px-8 py-4 text-lg font-bold rounded-xl inline-flex items-center gap-2">
                <span>Choose Your Bundle</span>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
</section>
<?php endif; ?>
