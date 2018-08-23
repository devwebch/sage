<?php
use Roots\Sage\Extras;
?>
<section class="section section--one-column">
    <div class="<?php echo (is_front_page()) ? 'container' : 'wrapper'; ?>">
        <div class="row">
            <div class="col"><?php the_sub_field('column_1'); ?></div>
        </div>
    </div>
</section>