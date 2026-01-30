<?php
$case_studies_query = new WP_Query([
    'post_type' => 'case_study',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<section class="py-24 bg-[#fafafa]">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Proven Results</h2>
        <p class="text-slate-500 mb-12">Real studies from our partners and agencies.</p>

        <?php if ($case_studies_query->have_posts()) : ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php while ($case_studies_query->have_posts()) :
                    $case_studies_query->the_post();
                    $percentage = get_post_meta(get_the_ID(), '_case_study_percentage', true);
                    $subtitle = get_post_meta(get_the_ID(), '_case_study_subtitle', true);
                    $category = get_post_meta(get_the_ID(), '_case_study_category', true);

                    // Category color mapping
                    $category_colors = [
                        'E-commerce' => 'bg-blue-100 text-blue-800',
                        'SaaS' => 'bg-purple-100 text-purple-800',
                        'Local Business' => 'bg-green-100 text-green-800',
                        'Enterprise' => 'bg-red-100 text-red-800',
                        'Startup' => 'bg-yellow-100 text-yellow-800',
                        'Agency' => 'bg-indigo-100 text-indigo-800',
                    ];

                    $category_class = $category_colors[$category] ?? 'bg-gray-100 text-gray-800';
                ?>
                    <article class="group cursor-poMontserrat relative">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <!-- Category Badge -->
                            <?php if ($category) : ?>
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $category_class; ?>">
                                        <?php echo $category; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div class="bg-slate-100 rounded-xl overflow-hidden mb-4 relative h-64 border border-slate-200">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', [
                                        'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500'
                                    ]); ?>
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-r from-blue-900 to-blue-700 flex items-center justify-center">
                                        <div class="text-white text-center p-6">
                                            <div class="text-3xl font-bold mb-2"><?php echo $percentage ?: '340%'; ?></div>
                                            <div class="text-sm opacity-80">Growth</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Title and content on left -->
                            <div class="flex justify-between items-start pt-4 border-t border-slate-100">
                                <div class="title-desc-wrapper">
                                    <h2 class="font-bold text-[24px] text-slate-900 group-hover:text-brand-orange transition-colors mb-2">
                                        <?php the_title(); ?>
                                    </h2>
                                    <div class="case-excerpt">
                                        <?php
                                        $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15);
                                        if ($excerpt) :
                                        ?>
                                            <p class="text-sm text-slate-600">
                                                <?php echo $excerpt; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="percentage-holder">
                                    <div class="text-right">
                                        <div class="text-3xl font-bold text-black mb-1">
                                            <?php echo $percentage ?: '340%'; ?>
                                        </div>
                                        <?php if ($subtitle) : ?>
                                            <p class="text-sm text-slate-500">
                                                <?php echo esc_html($subtitle); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="<?php echo get_post_type_archive_link('case_study'); ?>"
                    class="group inline-block border border-slate-300 text-slate-700 px-8 py-3.5 rounded-full font-semibold 
          transition-all duration-300 hover:border-black hover:bg-black hover:text-white">
                    View All Case Studies
                    <span class="inline-block transition-transform duration-300 group-hover:translate-x-2">→</span>
                </a>
            </div>

        <?php else : ?>
            <!-- Fallback static case studies with correct positioning -->
            <div class="grid md:grid-cols-3 gap-8">
                <?php
                $fallback_cases = [
                    [
                        'category' => 'E-commerce',
                        'category_class' => 'bg-blue-100 text-blue-800',
                        'title' => 'E-commerce Scaler',
                        'percentage' => '340%',
                        'subtitle' => 'From 20k to 100k Monthly Visits',
                        'excerpt' => 'Increased organic traffic and conversions for an e-commerce store selling outdoor gear.',
                        'image' => 'https://placehold.co/600x400/1e293b/FFF?text=Traffic+Graph',
                    ],
                    [
                        'category' => 'SaaS',
                        'category_class' => 'bg-purple-100 text-purple-800',
                        'title' => 'SaaS Domination',
                        'percentage' => '600%',
                        'subtitle' => 'Organic Signups increased',
                        'excerpt' => 'Scaled organic user acquisition for a B2B SaaS platform through targeted content strategy.',
                        'image' => 'https://placehold.co/600x400/1e293b/FFF?text=Event+Growth',
                    ],
                    [
                        'category' => 'Local Business',
                        'category_class' => 'bg-green-100 text-green-800',
                        'title' => 'Local Enterprise',
                        'percentage' => '105%',
                        'subtitle' => 'Crushing reliable leads locally',
                        'excerpt' => 'Dominating local search results for a chain of dental clinics across 5 cities.',
                        'image' => 'https://placehold.co/600x400/1e293b/FFF?text=Office+Team',
                    ],
                ];

                foreach ($fallback_cases as $case) : ?>
                    <article class="group cursor-poMontserrat relative">
                        <a href="#" class="block">
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $case['category_class']; ?>">
                                    <?php echo $case['category']; ?>
                                </span>
                            </div>

                            <div class="bg-slate-100 rounded-xl overflow-hidden mb-4 relative h-64 border border-slate-200">
                                <img src="<?php echo $case['image']; ?>"
                                    alt="<?php echo $case['title']; ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <!-- Title and content on left -->
                            <div class="flex flex-col">
                                <h2 class="font-bold text-slate-900 group-hover:text-brand-orange transition-colors mb-2">
                                    <?php echo $case['title']; ?>
                                </h2>

                                <!-- Original excerpt/description -->
                                <p class="text-sm text-slate-600 mb-4">
                                    <?php echo $case['excerpt']; ?>
                                </p>
                            </div>

                            <!-- Percentage and subtitle on right -->
                            <div class="flex justify-between items-start pt-4 border-t border-slate-100">
                                <div></div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-black mb-1">
                                        <?php echo $case['percentage']; ?>
                                    </div>
                                    <p class="text-sm text-slate-500">
                                        <?php echo $case['subtitle']; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>