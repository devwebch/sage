<?php
function vue_posts_run($atts)
{
    $attributes = shortcode_atts(array(
        'title' => 'Default title'
    ), $atts);

    return '<component-posts></component-posts>';
}

add_shortcode('vue-posts', 'vue_posts_run');