<?php
$image                  = get_sub_field('image');
$image_in_background    = get_sub_field('background_image');
$container_class        = ($image_in_background) ? 'container-fluid' : 'container';
$section_class          = ($image_in_background) ? 'pt-0 pb-0' : '';
$sub_title              = get_sub_field('sub_title');
?>
<section class="section section--content-image <?php echo $section_class; ?>">
    <div class="<?php echo $container_class; ?>">
        <div class="row align-items-center">
            <div class="col-md-6 content">
                <h2 class="section__title"><?php the_sub_field('title'); ?></h2>
                <?php if ($sub_title): ?>
                    <h3 class="section__sub-title"><?php echo $sub_title; ?></h3>
                <?php endif; ?>
                <?php the_sub_field('content'); ?>
                <?php if (get_sub_field('link')): ?>
                    <a href="<?php the_sub_field('link'); ?>" class="btn btn-default btn-orange">En savoir plus</a>
                <?php endif; ?>
            </div>
            <?php if (!$image_in_background): ?>
                <div class="col-md-6 image mb-4 mb-md-0 text-right">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
            <?php else: ?>
                <div class="col-md-6 mb-4 mb-md-0 background" style="background-image: url(<?php echo $image; ?>);"></div>
            <?php endif; ?>
        </div>
    </div>
</section>