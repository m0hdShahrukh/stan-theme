<?php get_header(); ?>

<div class="container mx-auto px-6 py-16">
    <header class="mb-12 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
            <?php
            if (is_post_type_archive()) {
                post_type_archive_title();
            } elseif (is_tax()) {
                single_term_title();
            } elseif (is_day()) {
                echo 'Archive: ' . get_the_date();
            } elseif (is_month()) {
                echo 'Archive: ' . get_the_date('F Y');
            } elseif (is_year()) {
                echo 'Archive: ' . get_the_date('Y');
            } else {
                echo 'Archives';
            }
            ?>
        </h1>
        
        <?php if (term_description()) : ?>
            <div class="text-slate-600 max-w-2xl mx-auto">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
    </header>
    
    <?php if (have_posts()) : ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-slate-100">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="block h-48 overflow-hidden">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-500']); ?>
                        </a>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <?php if (get_post_type() === 'case_study') : ?>
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                    Case Study
                                </span>
                            <?php elseif (get_post_type() === 'service') : ?>
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                                    Service
                                </span>
                            <?php endif; ?>
                            
                            <?php if (get_post_type() === 'post') : ?>
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                    foreach ($categories as $category) : ?>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-800 text-xs font-semibold rounded-full">
                                            <?php echo $category->name; ?>
                                        </span>
                                    <?php endforeach;
                                endif;
                                ?>
                            <?php endif; ?>
                        </div>
                        
                        <h2 class="text-xl font-bold text-slate-900 mb-3">
                            <a href="<?php the_permalink(); ?>" class="hover:text-brand-orange transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="text-slate-600 text-sm mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-100">
                            <div class="text-slate-500 text-sm">
                                <?php echo get_the_date(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="text-brand-orange font-semibold hover:text-brand-orangeHover transition-colors">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => '<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Previous',
                'next_text' => 'Next <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                'class' => 'pagination',
            ]);
            ?>
        </div>
        
    <?php else : ?>
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-slate-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-2xl font-bold text-slate-700 mb-2">No posts found</h3>
            <p class="text-slate-500 mb-6">Try adjusting your search or filter to find what you're looking for.</p>
            <a href="<?php echo home_url(); ?>" class="inline-block bg-brand-orange text-white px-6 py-3 rounded-full font-semibold hover:bg-brand-orangeHover transition-colors">
                Return Home
            </a>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>