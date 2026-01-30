<?php get_header(); ?>

<article class="container mx-auto px-6 py-16 max-w-4xl">
    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8"><?php the_title(); ?></h1>
    
    <div class="prose prose-lg max-w-none">
        <?php the_content(); ?>
    </div>
</article>

<?php get_footer(); ?>