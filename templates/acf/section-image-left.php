<section class="section section--content-image">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 col-xl-7 background" style="background-image: url(<?php the_sub_field('image'); ?>);"></div>
            <div class="col-md-6 col-xl-5 content">
                <h2 class="section__title"><?php the_sub_field('title'); ?></h2>
                <h3 class="section__sub-title"><?php the_sub_field('sub_title'); ?></h3>
                <p><?php the_sub_field('description'); ?></p>
                <a href="<?php echo (get_sub_field('link')) ? get_sub_field('link') : '#'; ?>" class="btn btn-outline-primary">En savoir plus</a>
            </div>
        </div>
    </div>
</section>