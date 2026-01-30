<?php
$services_query = new WP_Query([
    'post_type' => 'service',
    'posts_per_page' => 6,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);
?>

<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex justify-between flex-col sm:flex-row !items-baseline">
            <div class="mb-8 sm:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    Our SEO Services That <br>
                    <span class="text-[#155DFC]">Drive Scalable Growth</span>
                </h2>
                <p class="text-slate-500">End-to-end solutions for high-growth teams.</p>
            </div>
            <div class="text-center mt-0 mb-10 sm:mb-8 sm:mt-12">
                <a href="<?php echo get_post_type_archive_link('service'); ?>" class="group inline-block border border-slate-300 text-slate-700 px-8 py-3.5 rounded-full font-semibold transition-all duration-300 hover:border-black hover:bg-black hover:text-white">
                    View Full Catalog <span class="inline-block transition-transform duration-300 group-hover:translate-x-2">→</span>
                </a>
            </div>
        </div>

        <?php if ($services_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <?php
                // Added md: prefix to spans so they only apply on desktop
                $col_spans = ['md:col-span-2', '', '', '', 'md:col-span-2', ''];
                $index = 0;

                while ($services_query->have_posts()) :
                    $services_query->the_post();
                    $col_span = $col_spans[$index] ?? '';
                ?>
                    <div class="p-8 bg-slate-50 <?php echo $col_span; ?> rounded-2xl hover:shadow-lg transition border border-transparent hover:border-slate-200">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-[60px] flex items-center justify-center mb-6 overflow-hidden">
                                <?php the_post_thumbnail('thumbnail', ['class' => 'icon-img']); ?>
                            </div>
                        <?php else : ?>
                            <div class="w-10 h-10 bg-white rounded-lg shadow-sm flex items-center justify-center mb-6 text-brand-orange">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>

                        <h3 class="text-xl font-bold text-slate-900 mb-2"><?php the_title(); ?></h3>
                        <div class="text-sm text-slate-500 mb-6"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="text-sm font-semibold flex items-center gap-1">
                            Learn more &rarr;
                        </a>
                    </div>
                <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <?php
                $static_services = [
                    [
                        'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                        'title' => 'Managed Content',
                        'desc' => 'Full service strategy and content creation that ranks, scales, and drives revenue reliably.',
                    ],
                ];

                foreach ($static_services as $service) :
                ?>
                    <div class="p-8 bg-slate-50 rounded-2xl hover:shadow-lg transition border border-transparent hover:border-slate-200">
                        <div class="w-10 h-10 bg-white rounded-lg shadow-sm flex items-center justify-center mb-6 text-brand-orange">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $service['icon']; ?>"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2"><?php echo $service['title']; ?></h3>
                        <p class="text-sm text-slate-500 mb-6"><?php echo $service['desc']; ?></p>
                        <a href="#" class="text-sm font-semibold text-brand-orange flex items-center gap-1">
                            Learn more &rarr;
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>