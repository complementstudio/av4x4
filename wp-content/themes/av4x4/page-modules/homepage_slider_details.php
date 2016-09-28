<?php
/**
 * The template for displaying Homepage slider details
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
?>
<?php if ( function_exists( 'get_field' ) ) : ?>

    <?php

    $slider_title         = get_field( 'slider_title', get_the_ID() );
    $slider_description   = get_field( 'slider_description', get_the_ID() );
    $button_top_text      = get_field( 'button_top_text', get_the_ID() );
    $button_buttom_text   = get_field( 'button_buttom_text', get_the_ID() );
    ?>
    <div class="wrapper bg_text">
        <p><?=$slider_title?></p>
    </div>
    <div class="header_bottom_section" >
        <div class="black_section">
            <!--<div class="wrapper">-->
            <div class="text_section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/header_bottom_bg.png')">
               <?=$slider_description?>
            </div>
            <div class="button_section">
                <a href="javascript:void(0)" class="contact_button"><span><?=$button_top_text?></span>
                    <span><?=$button_buttom_text?></span>
                </a>
            </div>
            <!--</div>-->
        </div>
    </div>
<?php endif; ?>