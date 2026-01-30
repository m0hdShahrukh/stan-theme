<section class="relative overflow-hidden">
    <!-- Blue radial background glow -->
    <div class="absolute inset-0 -z-10 bg-[#fafafa]"></div>

    <div class="py-16 border-y border-slate-100">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-slate-100">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div>
                <div class="text-4xl md:text-5xl font-extrabold text-brand-orange mb-2">
                    <?php echo get_theme_mod("stat_{$i}_number", $i == 1 ? '120k+' : ($i == 2 ? '98%' : '3.2M')); ?>
                </div>
                <div class="text-slate-900 font-semibold">
                    <?php echo get_theme_mod("stat_{$i}_label", $i == 1 ? 'Jobs delivered' : ($i == 2 ? 'Satisfaction' : 'Revenue generated')); ?>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>