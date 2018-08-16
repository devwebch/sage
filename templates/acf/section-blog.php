<?php
use Roots\Sage\Extras;
?>
<section class="section section--blog">
    <div class="<?php echo (is_front_page()) ? 'container' : 'wrapper'; ?>">
        <div class="row">
            <div class="col content">
                <?php if ( get_sub_field('title') ): ?>
                    <h2 class="section__title text-center"><?php the_sub_field('title'); ?></h2>
                <?php endif; ?>
                <?php if ( get_sub_field('sub_title') ): ?>
                    <h3 class="section__sub-title text-center"><?php the_sub_field('sub_title'); ?></h3>
                <?php endif; ?>

                <?php
                $posts_query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                ]);
                ?>
                <div class="row">
                    <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
                        <div class="col">
                            <div class="icon-block"><i class="far fa-bookmark"></i>
                                <div class="icon-block__content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php echo Extras\short_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>