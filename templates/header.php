<header class="banner banner--transparent">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>

                <nav class="nav-primary">
                    <?php
                    if (has_nav_menu('primary_navigation')) :
                        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
                    endif;
                    ?>
                </nav>

                <div class="mobile-hamburger">
                    <span></span><span></span><span></span><span></span>
                </div>

                <div class="nav-mobile">
                    <?php wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav', 'depth' => 1]); ?>
                </div>
            </div>
        </div>
    </div>
</header>
