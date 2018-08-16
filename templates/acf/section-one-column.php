<?php
$background;
$color;
$btn_color;

if ( get_sub_field('text_color') ) { $color = " color: " . get_sub_field('text_color') . ";"; }
if ( get_sub_field('color_2') ) { $btn_color = " color: " . get_sub_field('color_2') . ";"; }


if ( get_sub_field('color_1') && !get_sub_field('color_2')) {
    $background = " background: " . get_sub_field('color_1') . ";";
}
if ( get_sub_field('color_1') && get_sub_field('color_2')) {
    $background = " background-image: linear-gradient(140deg, " . get_sub_field('color_1') . " 0%, " . get_sub_field('color_2') . " 100%);";
}

?>
<section class="section section--one-column" style="<?php echo $background . $color; ?>">
    <div class="<?php echo (is_front_page()) ? 'container' : 'wrapper'; ?>">
        <div class="row align-items-center">
            <div class="col text-center">
                <h2 class="section__title"><?php the_sub_field('title'); ?></h2>
                <?php if ( get_sub_field('sub_title') ): ?>
                    <h3 class="section__sub-title"><?php the_sub_field('sub_title'); ?></h3>
                <?php endif; ?>
                <?php if ( get_sub_field('content') ): ?>
                    <div class="section__description">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( get_sub_field('btn_link') ): ?>
                    <a href="<?php the_sub_field('btn_link'); ?>" class="btn btn-outline-dark" style="<?php echo $btn_color; ?>"><?php the_sub_field('btn_label') ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>