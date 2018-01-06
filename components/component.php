<?php
/**
 * Created by PhpStorm.
 * User: SIMON
 * Date: 22.04.2016
 * Time: 11:07
 */

$title      = isset($title) ? $title : 'Default title';
$content    = isset($content) ? $content : 'Default content';
?>
<section class="component">
    <h3 class="component__title"><?php echo $title; ?></h3>
    <p class="component__content"><?php echo $content; ?></p>
</section><!-- /.component -->
