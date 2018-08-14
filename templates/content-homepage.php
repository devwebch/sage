<?php
$background;
if ( get_field('jumbotron_image') ) {
    $background = "background-image: url(" . get_field('jumbotron_image') . ");";
}
if ( get_field('jumbotron_color') ) {
    $background = "background: " . get_field('jumbotron_color') . ";";
}
?>
<section class="section section--jumbotron" style="<?php echo $background; ?>">
    <div class="container">
        <div class="row align-items-center content">
            <div class="col-md-6 mt-4 mb-4 mb-md-0 mt-md-0">
                <?php if ( get_field('jumbotron_sub_title') ): ?>
                    <h3 class="section__sub-title"><?php the_field('jumbotron_sub_title'); ?></h3>
                <?php endif; ?>
                <h1 class="section__title"><?php the_field('jumbotron_title'); ?></h1>
                <p class="section__introduction"><?php the_field('jumbotron_introduction'); ?></p>

                <?php if ( get_field('jumbotron_btn_link') ): ?>
                    <a href="<?php the_field('jumbotron_btn_link'); ?>" class="btn btn-default btn-orange">
                        <?php the_field('jumbotron_btn_label'); ?>
                        <i class="fas fa-magic ml-2"></i>
                    </a>
                <?php endif; ?>
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
        <?php if (get_row_layout() == 'one-column'): ?>
            <?php get_template_part('templates/acf/section', 'one-column'); ?>
        <?php endif; ?>
    <?php endwhile;
else :
    // no layouts found
endif;
?>
