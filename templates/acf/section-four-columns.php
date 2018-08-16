<?php
use Roots\Sage\Extras;
?>
<section class="section section--two-columns">
    <div class="<?php echo (is_front_page()) ? 'container' : 'wrapper'; ?>">
        <div class="row">
            <div class="col-md-3"><?php the_sub_field('column_1'); ?></div>
            <div class="col-md-3"><?php the_sub_field('column_2'); ?></div>
            <div class="col-md-3"><?php the_sub_field('column_3'); ?></div>
            <div class="col-md-3"><?php the_sub_field('column_4'); ?></div>
        </div>
    </div>
</section>