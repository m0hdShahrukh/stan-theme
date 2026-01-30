<?php get_header(); ?>

<div class="container mx-auto px-6 py-16">
    <h1 class="text-4xl font-bold text-slate-900 mb-8"><?php bloginfo('name'); ?> Blog</h1>
    
    <?php if (have_posts()) : ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="h-48 overflow-hidden">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-3">
                            <a href="<?php the_permalink(); ?>" class="hover:text-brand-orange transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="text-slate-500 text-sm mb-4">
                            <?php echo get_the_date(); ?>
                        </div>
                        <div class="text-slate-600 mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-brand-orange font-semibold hover:text-brand-orangeHover transition-colors">
                            Read More →
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
            ]);
            ?>
        </div>
        
    <?php else : ?>
        <p class="text-slate-600 text-center py-12">No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>