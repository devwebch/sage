<?php

namespace Roots\Sage\Setup;

/**
 * Theme setup
 */
function setup()
{
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');
    add_theme_support('soil-disable-asset-versioning');
    add_theme_support('soil-disable-trackbacks');
    add_theme_support('soil-js-to-footer');

    add_theme_support('custom-logo', array(
        'width' => 300,
        'flex-height' => true,
        'header-text' => array('brand')
    ));

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('sage', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
        'primary_navigation'    => __('Primary Navigation', 'sage'),
        'mobile_navigation'     => __('Mobile Navigation', 'sage')
    ]);

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style(get_theme_file_uri('dist/styles/app.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

function init()
{
  add_rewrite_rule('^sw\.js?', '/wp-content/themes/sage/dist/sw.js', 'top');
  add_rewrite_rule('^workbox-sw\.prod\.v2\.1\.2\.js', '/wp-content/themes/sage/dist/workbox-sw.prod.v2.1.2.js', 'top');
  add_rewrite_rule('^workbox-sw\.prod\.v2\.1\.2\.js\.map', '/wp-content/themes/sage/dist/workbox-sw.prod.v2.1.2.js.map', 'top');
}
add_action('init', __NAMESPACE__ . '\\init');

/**
 * Image sizes
 */
add_image_size( 'post-thumbnail', 750, 300, true );

/**
 * Register sidebars
 */
function widgets_init()
{
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>'
    ]);

    register_sidebar([
        'name'          => __('Footer 1', 'sage'),
        'id'            => 'sidebar-footer-1',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name'          => __('Footer 2', 'sage'),
        'id'            => 'sidebar-footer-2',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>'
    ]);
    register_sidebar([
        'name'          => __('Footer 3', 'sage'),
        'id'            => 'sidebar-footer-3',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>'
    ]);
}

add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar()
{
    static $display;

    isset($display) || $display = !in_array(true, [
        // The sidebar will NOT be displayed if ANY of the following return true.
        // @link https://codex.wordpress.org/Conditional_Tags
        is_404(),
        is_front_page(),
        is_single(),
        is_page_template('template-homepage.php'),
        is_page_template('template-custom.php'),
        is_page_template('template-full-width.php'),
        is_page_template('template-full-width-naked.php'),
        is_page_template('template-elementor.php'),
    ]);

    return apply_filters('sage/display_sidebar', $display);
}

/**
 * Determine which wrapper to use
 */
add_filter('sage/wrap_base', __NAMESPACE__ . '\\wrapper_filter');
function wrapper_filter($templates)
{
    if (is_front_page() || is_page_template('template-homepage.php') || is_page_template('template-elementor.php')) {
        array_unshift($templates, 'base-homepage.php');
    }
    return $templates;
}

/**
 * Theme assets
 */
function assets()
{
    // Main stylesheet
    wp_enqueue_style('sage/css', get_theme_file_uri('dist/styles/app.css'), false, null);

    // Fonts
    wp_enqueue_style('sage/fonts', 'https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:400,700', false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Main script
    wp_enqueue_script('sage/js', get_theme_file_uri('dist/scripts/app.js'), ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
