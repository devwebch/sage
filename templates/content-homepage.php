<section class="section section--jumbotron" style="background-image: url(<?php the_field('jumbotron_image'); ?>);">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-lg-6">
                <h3 class="section__sub-title"><?php the_field('jumbotron_sub_title'); ?></h3>
                <h1 class="section__title"><?php the_field('jumbotron_title'); ?></h1>
                <p class="section__introduction"><?php the_field('jumbotron_introduction'); ?></p>
            </div>
        </div>
    </div>
</section>

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
    <?php endwhile;
else :
    // no layouts found
endif;
?>
