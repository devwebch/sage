<?php
function example_run($atts)
{
    $a = shortcode_atts(array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts);

    return "foo = {$a['foo']}";
}

add_shortcode('example', 'example_run');