<section class="section section--content section--services">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 left">
                <h2 class="section__title"><?php the_sub_field('title') ?></h2>
                <h3 class="section__sub-title"><?php the_sub_field('sub_title') ?></h3>
                <a href="<?php echo (get_sub_field('link')) ? get_sub_field('link') : '#'; ?>" class="btn btn-outline-dark">En savoir plus</a>
            </div>
            <div class="col-lg-8 right">
                <div class="row">
                    <?php if (have_rows('blocks')): $count = 1; ?>
                        <?php while(have_rows('blocks')): the_row(); ?>
                            <?php if ($count == 3): ?>
                                </div><div class="row">
                            <?php endif; ?>
                            <div class="col-md-6">
                                <div class="icon-block">
                                    <i class="<?php the_sub_field('icon') ?>"></i>
                                    <div class="icon-block__content">
                                        <h3><?php the_sub_field('title') ?></h3>
                                        <p><?php the_sub_field('description') ?></p>
                                        <a href="<?php echo (get_sub_field('link')) ? get_sub_field('link') : '#'; ?>" class="">En savoir plus</a>
                                    </div>
                                </div>
                            </div>
                        <?php $count++; endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
