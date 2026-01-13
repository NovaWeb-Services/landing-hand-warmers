<?php if (!empty($offer['faqs'])): ?>
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
                Got <span class="text-orange-500">Questions?</span>
            </h2>
            <p class="text-lg text-slate-600">We've got answers</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <?php foreach ($offer['faqs'] as $index => $faq): ?>
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-200">
                <button
                    onclick="toggleFaq(<?= $index ?>)"
                    class="faq-button w-full px-6 py-5 text-left flex items-center justify-between hover:bg-slate-50 transition-colors"
                >
                    <span class="font-bold text-slate-900 text-lg pr-4"><?= e($faq['question']) ?></span>
                    <i data-lucide="chevron-down" class="faq-icon-<?= $index ?> w-5 h-5 text-slate-400 transition-transform flex-shrink-0"></i>
                </button>
                <div id="faq-content-<?= $index ?>" class="faq-content hidden px-6 pb-5 text-slate-600 leading-relaxed">
                    <?= e($faq['answer']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
