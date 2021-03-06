<?php
/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
?>

<?php get_header(); ?>

<main class="page-wrapper results_inner_page">

    <?php while ( have_posts() ) : the_post();

        get_template_part('template-parts/content', get_post_type());

    endwhile; ?>

    <?php get_template_part('template-parts/section', 'cta'); ?>

    <?php get_template_part('template-parts/section', 'results'); ?>

</main>

<?php get_footer(); ?>
