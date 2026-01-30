<?php
// Comparison features - can be customized via theme mods or ACF
$comparison_features = [
    [
        'feature' => 'White Label Dashboard',
        'competitors' => false,
        'us' => true,
    ],
    [
        'feature' => 'Dedicated Account Manager',
        'competitors' => false,
        'us' => true,
    ],
    [
        'feature' => 'Native English Writers',
        'competitors' => false,
        'us' => true,
    ],
    [
        'feature' => 'Flat Monthly Pricing',
        'competitors' => false,
        'us' => true,
    ],
];

// Get custom features from theme mods if available
for ($i = 1; $i <= 4; $i++) {
    $feature = get_theme_mod("comparison_feature_{$i}", '');
    $competitors = get_theme_mod("comparison_competitors_{$i}", false);
    $us = get_theme_mod("comparison_us_{$i}", true);
    
    if ($feature) {
        $comparison_features[$i-1]['feature'] = $feature;
        $comparison_features[$i-1]['competitors'] = (bool)$competitors;
        $comparison_features[$i-1]['us'] = (bool)$us;
    }
}
?>

<section class="py-24 bg-white border-t-[#f7f7f7] border-t-2">
    <div class="container mx-auto px-6 max-w-4xl">
        <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">Why Agencies Switch to Us</h2>

        <div class="border border-slate-100 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow">
            <!-- Table Header -->
            <div class="grid grid-cols-3 mb-6 pb-6 border-b border-slate-100 text-sm font-semibold text-slate-400 uppercase tracking-wider text-center">
                <div class="text-left">Feature</div>
                <div>Stan Ventures</div>
                <div class="text-brand-orange">FATJOE</div>
            </div>

            <!-- Table Rows -->
            <div class="space-y-6">
                <?php foreach ($comparison_features as $feature) : ?>
                <div class="grid grid-cols-3 items-center text-center hover:bg-slate-50 -mx-2 px-2 py-3 rounded-lg transition-colors">
                    <div class="text-left font-medium text-slate-800">
                        <?php echo $feature['feature']; ?>
                    </div>
                    
                    <div class="flex justify-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm transition-transform hover:scale-110">
                            <?php if ($feature['competitors']) : ?>
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    ✕
                                </div>
                            <?php else : ?>
                                <div class="w-6 h-6 rounded-full bg-red-100 text-red-500 flex items-center justify-center">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0IiByeD0iMTIiIGZpbGw9IiNGMTVBMjQiLz4KPHBhdGggZD0iTTE2LjY2NjcgOC41TDEwLjI1IDE0LjkxNjdMNy4zMzMzNyAxMiIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjE2NjY3IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="flex justify-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm transition-transform hover:scale-110">
                            <?php if ($feature['us']) : ?>
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center">
                                    ✕
                                </div>
                            <?php else : ?>
                                <div class="w-6 h-6 rounded-full bg-red-100 text-red-500 flex items-center justify-center">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0IiByeD0iMTIiIGZpbGw9IiNGMTVBMjQiLz4KPHBhdGggZD0iTTE2LjY2NjcgOC41TDEwLjI1IDE0LjkxNjdMNy4zMzMzNyAxMiIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjE2NjY3IiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Table Footer -->
            <div class="mt-8 pt-8 border-t border-slate-100 text-center">
                <p class="text-sm text-slate-500 mb-4">
                    Based on surveys of 50+ agencies comparing 10+ SEO service providers
                </p>
                <a href="/comparison-details" class="inline-block text-brand-orange font-semibold hover:text-brand-orangeHover transition-colors">
                    See Full Comparison Report →
                </a>
            </div>
        </div>
    </div>
</section>