<?php
$title              = get_sub_field('title');
$sub_title          = get_sub_field('sub_title');
$text_color         = get_sub_field('text_color');
$background_color   = get_sub_field('background');

$style = '';
if ( $text_color ) { $style .= ' color: ' . $text_color . ';'; }
if ( $background_color ) { $style .= ' background-color: ' . $background_color . ';'; }
?>
<section class="section section--cta" style="<?php echo $style; ?>">
    <div class="<?php echo (is_front_page()) ? 'container' : 'wrapper'; ?>">
        <div class="row align-items-center">
            <div class="col text-center">
                <h2 class="section__title <?php echo ($sub_title) ?: 'mb-0'; ?>"><?php echo $title; ?></h2>
                <?php if ( $sub_title ): ?>
                    <h3 class="section__sub-title"><?php echo $sub_title; ?></h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>