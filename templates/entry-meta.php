<ul class="list-inline">
    <li class="list-inline-item">
        <i class="far fa-calendar-alt"></i> <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
    </li>
    <li class="list-inline-item">
        <i class="far fa-user"></i> <span class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></span>
    </li>
</ul>
