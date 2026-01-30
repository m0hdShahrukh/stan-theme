<!-- Testimonials Section (moved below stats) -->
<section class="py-20 bg-[radial-gradient(circle_at_50%_30%,#f4f4f4_0%,#ffffff_60%)]">
    <?php
    $testimonials_query = new WP_Query([
        'post_type' => 'testimonial',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    ?>

    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-8">
            <?php if ($testimonials_query->have_posts()) : ?>
                <?php while ($testimonials_query->have_posts()) : 
                    $testimonials_query->the_post();
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
                    $position = get_post_meta(get_the_ID(), '_testimonial_position', true);
                    
                    // Convert numeric rating to stars
                    $stars = '';
                    if ($rating) {
                        $stars = str_repeat('★', (int)$rating) . str_repeat('☆', 5 - (int)$rating);
                    } else {
                        $stars = '★★★★★'; // Default 5 stars
                    }
                ?>
                    <div class="bg-slate-50 p-10 rounded-3xl hover:shadow-xl transition-shadow bg-[linear-gradient(181deg,_#ffffff,_#0000000f)]
">
                        <div class="flex text-[24px] text-black mb-4" title="<?php echo (int)$rating; ?> out of 5 stars">
                            <?php echo $stars; ?>
                        </div>
                        <p class="text-[24px] text-slate-800 font-semibold mb-8 leading-relaxed">
                            "<?php echo wp_trim_words(get_the_content(), 30, '...'); ?>"
                        </p>
                        <div class="flex items-center gap-4">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="w-12 h-12 rounded-full overflow-hidden">
                                    <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover']); ?>
                                </div>
                            <?php else : ?>
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                    <?php echo strtoupper(substr(get_the_title(), 0, 1)); ?>
                                </div>
                            <?php endif; ?>
                            <div>
                                <div class="font-bold text-slate-900"><?php the_title(); ?></div>
                                <div class="text-sm text-slate-500">
                                    <?php echo $position ?: 'Satisfied Client'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback testimonials with star ratings -->
                <div class="bg-slate-50 p-10 rounded-3xl hover:shadow-xl transition-shadow bg-[linear-gradient(181deg,_#ffffff,_#0000000f)]
">
                    <div class="flex text-[24px] text-black mb-4">★★★★★</div>
                    <p class="text-[24px] text-slate-800 font-semibold mb-8 leading-relaxed">
                        "Done Ventures completely transformed our fulfillment process. We've scaled from 10 to 50 clients without hiring a single in-house SEO specialist."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                            J
                        </div>
                        <div>
                            <div class="font-bold text-slate-900">John Doe</div>
                            <div class="text-sm text-slate-500">Founder, SEO Elite</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-50 p-10 rounded-3xl hover:shadow-xl transition-shadow bg-[linear-gradient(181deg,_#ffffff,_#0000000f)]
">
                    <div class="flex text-[24px] text-black mb-4">★★★★★</div>
                    <p class="text-[24px] text-slate-800 font-semibold mb-8 leading-relaxed">
                        "The transparency and reporting are unmatched. My clients are happy, retention is up, and I can focus on sales while they handle the heavy lifting."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold">
                            J
                        </div>
                        <div>
                            <div class="font-bold text-slate-900">Jane Smith</div>
                            <div class="text-sm text-slate-500">CEO, Tech Market Care</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>