<section class="bg-white py-16 lg:py-24">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-6">
                5 Reasons You'll <span class="text-orange-500">Love</span> These
            </h2>
            <p class="text-lg text-slate-600">
                Engineered for real cold. Tested by real people. Built to keep you warm.
            </p>
        </div>

        <!-- Benefits Grid -->
        <?php
        $mainBenefits = [
            ['icon' => 'zap', 'title' => 'Instant Heat', 'description' => 'From freezing to toasty in 3 seconds flat. No waiting. No suffering.', 'color' => 'text-orange-500', 'bgColor' => 'bg-orange-100'],
            ['icon' => 'battery', 'title' => 'All-Day Power', 'description' => '8+ hours per charge. One morning charge = one full day of warmth.', 'color' => 'text-blue-500', 'bgColor' => 'bg-blue-100'],
            ['icon' => 'leaf', 'title' => 'Zero Waste', 'description' => '500+ recharge cycles. Save $200+/year vs disposables.', 'color' => 'text-green-500', 'bgColor' => 'bg-green-100'],
            ['icon' => 'pocket', 'title' => 'Fits Anywhere', 'description' => 'Sleek aluminum design. Pockets, gloves, boots - you choose.', 'color' => 'text-purple-500', 'bgColor' => 'bg-purple-100'],
            ['icon' => 'thermometer', 'title' => 'Phone Charger Too', 'description' => '5000mAh power bank built-in. Emergency phone charging anywhere.', 'color' => 'text-teal-500', 'bgColor' => 'bg-teal-100'],
        ];
        ?>
        <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-5 mb-16">
            <?php foreach ($mainBenefits as $benefit): ?>
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 text-center hover:shadow-lg hover:border-slate-300 transition-all duration-300 group">
                <div class="<?= $benefit['bgColor'] ?> w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="<?= $benefit['icon'] ?>" class="<?= $benefit['color'] ?> w-7 h-7"></i>
                </div>
                <h3 class="text-slate-900 font-bold mb-2"><?= e($benefit['title']) ?></h3>
                <p class="text-slate-600 text-sm leading-relaxed"><?= e($benefit['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Use Cases -->
        <?php
        $useCases = [
            ['icon' => 'mountain', 'label' => 'Skiing & Snowboarding'],
            ['icon' => 'briefcase', 'label' => 'Outdoor Work'],
            ['icon' => 'heart', 'label' => 'Morning Walks'],
            ['icon' => 'plane', 'label' => 'Travel & Commute'],
        ];
        ?>
        <div class="grid lg:grid-cols-2 gap-6 lg:gap-8 mb-12">
            <!-- Image -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img
                    src="https://images.unsplash.com/photo-1551524559-8af4e6624178?w=800&h=600&fit=crop"
                    alt="Person enjoying winter outdoors"
                    class="w-full h-full object-cover"
                />
            </div>

            <!-- Use Cases Grid -->
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 lg:p-8 flex flex-col justify-center">
                <h3 class="text-slate-900 font-bold text-xl mb-2">Perfect For</h3>
                <p class="text-slate-600 text-sm mb-6">Whether you're working, playing, or just living life - stay warm.</p>
                <div class="grid grid-cols-2 gap-3">
                    <?php foreach ($useCases as $useCase): ?>
                    <div class="flex items-center gap-3 bg-white rounded-xl p-4 border border-slate-200">
                        <i data-lucide="<?= $useCase['icon'] ?>" class="w-5 h-5 text-orange-500"></i>
                        <span class="text-slate-700 text-sm font-medium"><?= e($useCase['label']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Trust Statement -->
        <div class="text-center">
            <p class="text-slate-500 text-sm">
                Trusted by <strong class="text-slate-900">50,000+</strong> customers who refuse to let cold slow them down.
            </p>
        </div>
    </div>
</section>
