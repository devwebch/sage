<section class="section section--cta">
    <div class="container">
        <div class="row align-items-center">
            <div class="col text-center">
                <h2 class="section__title"><?php the_sub_field('title'); ?></h2>
                <?php if ( get_sub_field('sub_title') ): ?>
                    <h3 class="section__sub-title"><?php the_sub_field('sub_title'); ?></h3>
                <?php endif; ?>
                <?php the_sub_field('icon'); ?>
            </div>
        </div>
    </div>
</section>