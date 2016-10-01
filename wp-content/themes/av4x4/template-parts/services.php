<?php
/**
 * Template Name: services
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header();
$page_id = get_the_ID();

$title = 'OUR SERVICES';
$description = '';
 if ( function_exists( 'get_field' ) ) {
     $title         = get_field( 'service_title', $page_id );
     $description   = get_field( 'service_description', $page_id );
 }

$our_services_1 = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'services',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'cat' =>  3,
    )
);

$our_services_2 = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'services',
        'category__not_in' =>  3,
    )
);
$our_services = array_merge($our_services_1,$our_services_2);
?>

    <div class="home_content clearfix">
        <div class="our_services_block">
            <div class="wrapper">
                <div class="clearfix header_section">
                    <h2><?=$title?></h2>
                    <p>
                       <?=$description?>
                    </p>
                </div>
                <div class="service_blocks_content clearfix">

                    <?php foreach($our_services as $post) : ?>
                        <?php
                        setup_postdata($post);
                        $image_id = get_post_thumbnail_id($post->ID);
                        $image_url_thumb = wp_get_attachment_image_src($image_id,'high', true);
                        ?>
                        <div class="services_blocks" style="background-image: url(<?=(!empty($image_url_thumb[0])) ? $image_url_thumb[0] :  '' ?>)">
                            <a  href="<?=$post->guid?>"  class="text-content ">
                                <h3><?=$post->post_title?></h3>
                                <p><?=$post->post_excerpt?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <?php echo do_shortcode("[feedback]"); ?>
         <div class="slider_section clearfix">
            <div class="wrapper">
                <div class="clearfix header_section">
                    <h2>THE GARAGE</h2>
                    <p>There are always incredible projects going on at AV4x4. We build some of the most amazing 4x4's available anywhere. Check it out! </p>
                </div>
                <?php get_template_part( 'page-modules/garage_slider' );?>

            </div>
        </div>
    </div>

<?php
get_footer();
