<?php
/**
 * Template Name: Contact Us
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header();

?>
<?php if ( function_exists( 'get_field' ) ) : ?>

    <?php

    $contact_us_title         = get_field( 'contact_us_title', get_the_ID() );
    $contact_us_description   = get_field( 'contact_us_description', get_the_ID() );
    $contact_us_images   = get_field( 'contact_us_images', get_the_ID() );
    $contact_us_address       = get_field( 'contact_us_address', get_the_ID() );
    $contact_form_7_code       = get_field( 'contact_form_7_code', get_the_ID() );
    ?>

    <div class="contact_page clearfix">
        <div class="wrapper">
            <div class=" header_section">
                <h2><?=$contact_us_title;?></h2>
                <p>
                    <?=$contact_us_description;?>
                </p>
            </div>
            <div class="contact_images_block clearfix">
                <div class="img_block">

                </div>
                <div class="img_block">

                </div>
                <div class="img_block">

                </div>
                <div class="img_block">

                </div>
            </div>
            <div class="shop_info">
           <?=$contact_us_address?>
            </div>
     <?=do_shortcode($contact_form_7_code)?>
        </div>
    </div>
<?php
    endif;
get_footer();
