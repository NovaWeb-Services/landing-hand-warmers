<footer class="bg-slate-900 text-slate-400 py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <p class="font-bold text-white text-xl mb-1"><?= e($offer['brand_name'] ?? $offer['name'] ?? 'Brand') ?></p>
                <?php if (!empty($offer['contact_email'])): ?>
                <p class="text-sm"><?= e($offer['contact_email']) ?></p>
                <?php endif; ?>
                <?php if (!empty($offer['contact_phone'])): ?>
                <p class="text-sm"><?= e($offer['contact_phone']) ?></p>
                <?php endif; ?>
            </div>
            <div class="flex gap-6 text-sm">
                <a href="<?= e($offer['privacy_policy_url'] ?? '#') ?>" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="<?= e($offer['terms_url'] ?? '#') ?>" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="mailto:<?= e($offer['contact_email'] ?? '') ?>" class="hover:text-white transition-colors">Contact</a>
            </div>
            <div class="text-center md:text-right text-sm">
                <p>&copy; <?= date('Y') ?> <?= e($offer['brand_name'] ?? $offer['name'] ?? 'Brand') ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
