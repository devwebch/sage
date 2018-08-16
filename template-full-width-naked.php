<?php
/**
 * Template Name: Full width naked
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
    <?php get_template_part('templates/acf/page-sections'); ?>
<?php endwhile; ?>
