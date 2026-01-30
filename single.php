<?php get_header(); ?>

<article class="container mx-auto px-6 py-16 max-w-4xl">
    <header class="mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4"><?php the_title(); ?></h1>
        <div class="text-slate-500 text-sm">
            <?php echo get_the_date(); ?> • <?php echo get_the_category_list(', '); ?>
        </div>
    </header>
    
    <div class="prose prose-lg max-w-none">
        <?php the_content(); ?>
    </div>
    
    <footer class="mt-12 pt-8 border-t border-slate-200">
        <?php the_tags('<div class="tags"><span class="text-slate-500 mr-2">Tags:</span>', ', ', '</div>'); ?>
    </footer>
</article>

<?php get_footer(); ?>