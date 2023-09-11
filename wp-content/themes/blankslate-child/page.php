<?php get_header(); ?>

<main>
    <?php if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); ?>
            </article>
    <?php endwhile;
    endif; ?>
    <?php get_template_part('/templates/parts/footer-cans'); ?>
</main>
<?php get_footer(); ?>