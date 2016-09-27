<?php
/**
 * The template for displaying Homepage slider
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
?>
<?php if ( function_exists( 'get_field' ) ) : ?>

    <?php
    $slider_items          = get_field( 'slider_items', get_the_ID() );
    $team_title         = get_field( 'team_title', get_the_ID() );
    $team_description   = get_field( 'team_description', get_the_ID() );
    $team_button_text   = get_field( 'team_button_text', get_the_ID() );
    $team_content       = get_field( 'team_content', get_the_ID() );
    ?>
    <div class="header_slider"  style="position: absolute;top: 0;right: 0;left: 0">
        <?php foreach($slider_items as $slider_item) : ?>
            <div class="home_slider" style="background-image:url(<?=$slider_item['slider_item_image']?>);background-size: cover;background-repeat: no-repeat;"></div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>