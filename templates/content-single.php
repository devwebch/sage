<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="entry-thumbnail">
                <?php the_post_thumbnail('post-thumbnail'); ?>
            </div>
        <?php endif; ?>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php get_template_part('templates/entry-meta'); ?>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php comments_template('/templates/comments.php'); ?>
    </article>
<?php endwhile; ?>
