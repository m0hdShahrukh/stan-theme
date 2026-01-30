<section class="hero-section bg-[#1a2b47] text-white relative overflow-hidden">
    <div class="container mx-auto px-6 pt-16 pb-32 text-center relative z-20">
        <div class="before:content-[''] before:absolute before:top-[-10%] before:left-[20%] before:w-[60%] before:h-[50%] before:bg-[#155DFC33] before:blur-[80px]">
            <div class="inline-block px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-xs text-slate-300 mb-6">
                <img draggable="false" role="img" class="emoji" src="https://cdn-icons-png.flaticon.com/512/14035/14035769.png"> <?php echo get_theme_mod('hero_badge', '✨ Scalable Enterprise Solutions'); ?>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-gray-100 leading-tight">
                <?php echo get_theme_mod('hero_title', 'SEO that scales <br><span class="text-blue-200">on autopilot.</span>'); ?>
            </h1>

            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto mb-10">
                <?php echo get_theme_mod('hero_description', 'We help agencies and enterprise brands scale their SEO operations white-labeling, fully managed content strategies without the headache of hiring, training, or managing writers.'); ?>
            </p>
        </div>

        <div class="flex flex-col md:flex-row justify-center gap-4 mb-20">
            <a href="/how-it-works" class="bg-white text-brand-dark px-8 py-3.5 rounded-full font-bold hover:bg-slate-100">
                Start Your Growth Engine <img draggable="false" role="img" class="emoji" src="https://cdn-icons-png.flaticon.com/512/3114/3114931.png">
            </a>
            <a href="/pricing" class="border border-slate-600 text-white px-8 py-3.5 rounded-full font-bold hover:bg-slate-800">
              <img draggable="false" role="img" class="emoji" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAthJREFUWIW1l81LFlEYxc8dyA9IDVr4URFKupM0aRNtsl0tgiii/8HSdi2tKKjctCiKbFO0qRa1qZ1FYFpE+dEyFbICNYt8E9IWvxb3Tl7n/brj+/bAMMzc5znn3Jm5zz1jFBhAjaTDkrol7ZbULKnWDS9JmpE0JmlI0lNjTCYUuxhxKzAILBMey8BtYFcpxNXAVWA1B8E3YAJ45o4JYDFH3ipwGajayKwnEmAfgX6gs0Bdp8uZStSOAA2h5B3AnFc8B/QAm1JMoAI4DSx4OLNAe8jMffJXwcpz4zUCox7ep7x47p1PeskPgMqNknu4VcCjxKSycYGBRFK6D6e4iNce/rlkQhvwxw3Ol/LYC4howq4egMw6DuCOp66n3OQeT5/HcyO+Wctak5kCKgKA9gNnQ3ITdZXAjOP6BWwWcNJT1R8IdNflvwXaUoq44PGdiGR7exxPAnGMO3dJGgN6U2jwOboFvHFqFkMRgHtkx0NgS0CtAX64mtFIdleTpM8pZpErjsk+jX2FkowxeFzNkda21K8lCpCknZJeAMeL5MVcdZEvrgwCJCmSVGx1/OOKZM2EJDWWgXxWUrcx5n6RvJjrZyRp2l1sK5H8saROY8zLQkmAkbTdXU5HksbdxVYK7PUF4rekPklHjTEhK6lLUrxaxiNZDxfHkUBS3PmDpL3GmGvu6w4Jn2NIQM0GWvFBrPOpDiSN67JbsRsY9BrKqTSgKQWc8Xhu+QOtrJnPeaAcKyJJ7m/HK0BLMuGKp26E/2tILuVLGkn09pJFkG3Jhsln9YAGrHGM4x2wowTyJtab0i9AU7Gi9oSIBaCXFOYDa8v7vHeOwyxsyz2ABqwx9WMaOA/syVNjgC6XM5OoHQbqQycQA1Zi13qG7PiOtfDxr9mku5eMFeAipdh7oB64jm0coZEBbgLNxfCDt2Bs1zok6YCkDkktkupk2/KS7Kb2XtJz2d/z5RDcvyoLZGMfD0lGAAAAAElFTkSuQmCC">
                View Our Process
            </a>
        </div>

        <div class="relative max-w-4xl mx-auto">
            <div class="bg-black border border-slate-700 rounded-xl shadow-2xl p-4 md:p-8 relative overflow-hidden">


                <?php
                $chart_type = get_theme_mod('hero_chart_type', 'css');
                $chart_image_id = get_theme_mod('hero_chart_image', '');

                if ($chart_type === 'image' && $chart_image_id) :
                    $chart_image = wp_get_attachment_image($chart_image_id, 'full', false, [
                        'class' => 'w-full h-auto rounded-lg',
                        'alt' => 'SEO Growth Chart'
                    ]);
                ?>
                    <div class="mt-8">
                        <?php echo $chart_image; ?>
                    </div>
                <?php else : ?>
                    <!-- Default CSS Chart -->
                    <div class="flex items-end justify-between h-48 md:h-64 gap-2 mt-8">
                        <div class="w-full bg-blue-600/20 rounded-t-md h-[40%]"></div>
                        <div class="w-full bg-blue-600/30 rounded-t-md h-[55%]"></div>
                        <div class="w-full bg-blue-600/40 rounded-t-md h-[45%]"></div>
                        <div class="w-full bg-blue-600/60 rounded-t-md h-[70%]"></div>
                        <div class="w-full bg-blue-600/80 rounded-t-md h-[85%]"></div>
                        <div class="w-full bg-blue-500 rounded-t-md h-[60%]"></div>
                        <div class="w-full bg-blue-400 rounded-t-md h-[95%]"></div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-3/4 h-full bg-blue-500/20 blur-[100px] -z-10 rounded-full"></div>
        </div>
    </div>

    <!-- Dynamic Client Logos -->
    <?php if (get_theme_mod('show_client_logos', true)) : ?>
        <?php
        $logos_opacity = get_theme_mod('logos_opacity', 50);
        $logos_grayscale = get_theme_mod('logos_grayscale', true);

        $logo_style = sprintf(
            'opacity: %s; filter: %s;',
            $logos_opacity / 100,
            $logos_grayscale ? 'grayscale(1)' : 'none'
        );
        ?>

        <div class="border-t border-slate-800 py-[60px]">
            <p class="text-center !text-[14px] text-gray-500 font-semibold pb-8">Trusted by Industry-Leading Agencies & Fast-Growing Brands</p>
            <div class="container mx-auto px-6">
                <?php
                $client_logos = new WP_Query([
                    'post_type' => 'client_logo',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                ]);
                ?>

                <?php if ($client_logos->have_posts()) : ?>
                    <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16" style="<?php echo $logo_style; ?>">
                        <?php while ($client_logos->have_posts()) :
                            $client_logos->the_post();
                            $logo_url = get_post_meta(get_the_ID(), '_client_logo_url', true);
                            $logo_alt = get_post_meta(get_the_ID(), '_client_logo_alt', true);
                            $alt_text = $logo_alt ?: get_the_title() . ' Logo';
                        ?>
                            <div class="flex items-center justify-center h-12">
                                <?php if ($logo_url) : ?>
                                    <a href="<?php echo esc_url($logo_url); ?>"
                                        target="_blank"
                                        rel="noopener nofollow"
                                        class="block h-full hover:opacity-100 transition-opacity duration-300"
                                        title="<?php echo esc_attr($alt_text); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', [
                                                'class' => 'h-full w-auto object-contain max-w-[120px]',
                                                'style' => 'max-height: 48px;',
                                                'alt' => $alt_text,
                                            ]); ?>
                                        <?php else : ?>
                                            <div class="text-white font-bold text-xl h-full flex items-center justify-center">
                                                <?php the_title(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                <?php else : ?>
                                    <div class="h-full flex items-center justify-center hover:opacity-100 transition-opacity duration-300">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', [
                                                'class' => 'h-full w-auto object-contain max-w-[250px]',
                                                'style' => 'max-height: 48px;',
                                                'alt' => $alt_text,
                                            ]); ?>
                                        <?php else : ?>
                                            <div class="text-white font-bold text-xl">
                                                <?php the_title(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <!-- Fallback Static Logos with Placeholder Images -->
                    <div class="flex flex-wrap justify-center gap-8 md:gap-16" style="<?php echo $logo_style; ?>">
                        <?php
                        $fallback_logos = [
                            ['name' => 'RISE', 'color' => '3B82F6'],
                            ['name' => 'leo', 'color' => '10B981'],
                            ['name' => 'scalenut', 'color' => '8B5CF6'],
                            ['name' => 'surfer', 'color' => 'EF4444'],
                            ['name' => 'ahrefs', 'color' => 'F59E0B'],
                        ];

                        foreach ($fallback_logos as $logo) :
                            $placeholder_url = sprintf(
                                'https://placehold.co/120x48/%s/FFF?text=%s&font=montserrat',
                                $logo['color'],
                                urlencode($logo['name'])
                            );
                        ?>
                            <div class="h-12 flex items-center justify-center">
                                <img src="<?php echo $placeholder_url; ?>"
                                    alt="<?php echo esc_attr($logo['name']); ?> Logo"
                                    class="h-full w-auto max-w-[120px] object-contain"
                                    loading="lazy">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>