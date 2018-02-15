<article <?php post_class(); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('post-thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
        <div class="read-more">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary read-more-link"><?php _e('Continued', 'sage'); ?></a>
        </div>
    </div>
</article>
