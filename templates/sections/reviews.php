<?php if (!empty($offer['reviews'])): ?>
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                Real Results from <span class="text-orange-500">Real Customers</span>
            </h2>
            <div class="flex justify-center items-center gap-4">
                <div class="flex">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                    <i data-lucide="star" class="w-6 h-6 fill-amber-400 text-amber-400"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-xl font-bold text-slate-900"><?= e($offer['stats_rating'] ?? '4.9') ?></span>
                <span class="text-slate-500">based on <?= e($offer['stats_reviews_count'] ?? '2,847') ?> reviews</span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <?php foreach ($offer['reviews'] as $review): ?>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow">
                <div class="flex items-start gap-4 mb-4">
                    <?php if (!empty($review['avatar_url'])): ?>
                    <img src="<?= e($review['avatar_url']) ?>" alt="<?= e($review['name']) ?>" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow">
                    <?php else: ?>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($review['name']) ?>&background=random" alt="<?= e($review['name']) ?>" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow">
                    <?php endif; ?>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-bold text-slate-900"><?= e($review['name']) ?></span>
                            <?php if (!empty($review['is_verified'])): ?>
                            <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-medium">Verified</span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($review['location'])): ?>
                        <div class="text-sm text-slate-500"><?= e($review['location']) ?></div>
                        <?php endif; ?>
                        <div class="flex items-center gap-2 mt-1">
                            <div class="flex">
                                <?php for ($i = 0; $i < ($review['rating'] ?? 5); $i++): ?>
                                <i data-lucide="star" class="w-4 h-4 fill-amber-400 text-amber-400"></i>
                                <?php endfor; ?>
                            </div>
                            <?php if (!empty($review['use_case'])): ?>
                            <span class="text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded"><?= e($review['use_case']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if (!empty($review['title'])): ?>
                <h4 class="font-bold text-slate-900 text-lg mb-2">"<?= e($review['title']) ?>"</h4>
                <?php endif; ?>
                <p class="text-slate-600 leading-relaxed mb-4"><?= e($review['content']) ?></p>

                <div class="flex items-center justify-between text-sm text-slate-500 pt-4 border-t border-slate-100">
                    <?php if (!empty($review['bundle_purchased'])): ?>
                    <span class="bg-orange-50 text-orange-700 px-2 py-1 rounded text-xs font-medium">
                        Purchased: <?= e($review['bundle_purchased']) ?>
                    </span>
                    <?php else: ?>
                    <span></span>
                    <?php endif; ?>
                    <span class="flex items-center gap-1">
                        <i data-lucide="thumbs-up" class="w-4 h-4"></i>
                        <span>Helpful (<?= e($review['helpful_count'] ?? 0) ?>)</span>
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
