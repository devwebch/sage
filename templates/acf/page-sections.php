<?php
// check if the flexible content field has rows of data
if (have_rows('page_sections')):
    // loop through the rows of data
    while (have_rows('page_sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'two_columns'): ?>
            <?php get_template_part('templates/acf/section', 'two-columns'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'three_columns'): ?>
            <?php get_template_part('templates/acf/section', 'three-columns'); ?>
        <?php endif; ?>
        <?php if (get_row_layout() == 'four_columns'): ?>
            <?php get_template_part('templates/acf/section', 'four-columns'); ?>
        <?php endif; ?>
    <?php endwhile;
else :
    // no layouts found
endif;
