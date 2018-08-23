<header class="banner banner--transparent">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
            </div>
            <div class="col">
                <nav class="nav-primary">
                    <?php
                    if (has_nav_menu('primary_navigation')) :
                        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
                    endif;
                    ?>
                </nav>
                <div class="nav-mobile">
                    <?php wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav', 'depth' => 1]); ?>
                </div>
                <button class="hamburger hamburger--spin" type="button">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                </button>
            </div>
        </div>
    </div>
</header>
