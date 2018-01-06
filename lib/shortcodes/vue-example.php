<?php
function vue_example_run($atts)
{
    $attributes = shortcode_atts(array(
        'title' => 'Default title'
    ), $atts);

    return '<example title="' . $attributes['title'] . '"></example>';
}

add_shortcode('vue-example', 'vue_example_run');