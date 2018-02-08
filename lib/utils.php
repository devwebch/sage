<?php

namespace Roots\Sage\Utils;

use Roots\Sage\Assets;

/**
 * Component Loader
 * @param $slug
 * @param array $params
 * @param bool $output
 * @return mixed
 */
function get_component($slug, array $params = array(), $output = true)
{
    if (!$output) ob_start();
    if (!$template_file = locate_template("components/{$slug}.php", false, false)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $template_file), E_USER_ERROR);
    }
    extract($params, EXTR_SKIP);
    require($template_file);
    if (!$output) return ob_get_clean();
}

/**
 * Pagination
 */
function pagination($args = array())
{

    $defaults = array(
        'range' => 4,
        'custom_query' => FALSE,
        'previous_string' => __('Previous', 'sage'),
        'next_string' => __('Next', 'sage'),
        'before_output' => '<div class="pagination-wrapper"><ul class="pagination">',
        'after_output' => '</ul></div>'
    );

    $args = wp_parse_args(
        $args,
        apply_filters('wp_bootstrap_pagination_defaults', $defaults)
    );

    $args['range'] = (int)$args['range'] - 1;
    if (!$args['custom_query'])
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int)$args['custom_query']->max_num_pages;
    $page = intval(get_query_var('paged'));
    $ceil = ceil($args['range'] / 2);

    if ($count <= 1)
        return FALSE;

    if (!$page)
        $page = 1;

    if ($count > $args['range']) {
        if ($page <= $args['range']) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ($page >= ($count - $ceil)) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ($page >= $args['range'] && $page < ($count - $ceil)) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }

    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr(get_pagenum_link($previous));

    $firstpage = esc_attr(get_pagenum_link(1));
    if ($firstpage && (1 != $page))
        $echo .= '<li class="page-item"><a href="' . $firstpage . '" class="page-link">' . __('First', 'sage') . '</a></li>';

    if ($previous && (1 != $page))
        $echo .= '<li class="page-item"><a href="' . $previous . '" title="' . __('previous', 'sage') . '" class="page-link">' . $args['previous_string'] . '</a></li>';

    if (!empty($min) && !empty($max)) {
        for ($i = $min; $i <= $max; $i++) {
            if ($page == $i) {
                $echo .= '<li class="page-item active"><a class="page-link">' . str_pad((int)$i, 2, '0', STR_PAD_LEFT) . '</a></li>';
            } else {
                $echo .= sprintf('<li class="page-item"><a href="%s" class="page-link">%002d</a></li>', esc_attr(get_pagenum_link($i)), $i);
            }
        }
    }

    $next = intval($page) + 1;
    $next = esc_attr(get_pagenum_link($next));
    if ($next && ($count != $page))
        $echo .= '<li class="page-item"><a href="' . $next . '" title="' . __('next', 'sage') . '" class="page-link">' . $args['next_string'] . '</a></li>';

    $lastpage = esc_attr(get_pagenum_link($count));
    if ($lastpage) {
        $echo .= '<li class="page-item"><a href="' . $lastpage . '" class="page-link">' . __('Last', 'sage') . '</a></li>';
    }

    if (isset($echo))
        echo $args['before_output'] . $echo . $args['after_output'];
}
