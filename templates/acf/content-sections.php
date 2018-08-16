<?php
// check if the flexible content field has rows of data
if (have_rows('content_sections')):
    // loop through the rows of data
    while (have_rows('content_sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'image_left'): ?>
            <?php get_template_part('templates/acf/section', 'image-left'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'image_right'): ?>
            <?php get_template_part('templates/acf/section', 'image-right'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'cta'): ?>
            <?php get_template_part('templates/acf/section', 'cta'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'icon_block'): ?>
            <?php get_template_part('templates/acf/section', 'blocks'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'one-column'): ?>
            <?php get_template_part('templates/acf/section', 'one-column'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'blog'): ?>
            <?php get_template_part('templates/acf/section', 'blog'); ?>
        <?php endif; ?>
    <?php endwhile;
else :
    // no layouts found
endif;
