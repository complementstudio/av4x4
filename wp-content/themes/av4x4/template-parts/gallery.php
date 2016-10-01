<?php
/**
 * Template Name: Galery
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header();
$page_id = get_the_ID();

$title = 'CUSTOMER GALLERY';
$description = '';
if ( function_exists( 'get_field' ) ) {
    $title         = get_field( 'galery_title', $page_id );
    $description   = get_field( 'galery_description', $page_id );
}
$our_galery = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'galery',
        'posts_per_page' => 25,
        'orderby' => 'rand',

    )
);
$our_galery_items = array();
foreach($our_galery as $val){
    $our_galery_item = array(
        'title' => $val->post_title,
        'subtitle' => get_field('galery_item_details_subtitle', $val->ID),
        'description' => get_field('galery_item_details_subtitle', $val->ID),
        'url' => get_site_url().'/'.$val->post_type.'/'.$val->post_name,
    );
    $galery_item_slider = get_field( 'galery_item_slider', $val->ID );
    $our_galery_item['image'] = $galery_item_slider[0]['galery_item_slider_image'];

    $our_galery_items[] = $our_galery_item;
}

?>
    <div class="home_content customer_gallery clearfix">
        <div class="wrapper">
            <div class="recent_work_section clearfix ">
                <div class="clearfix header_section">
                    <h2><?=$title?></h2>
                    <?=$description;?>
                </div>

                <?php foreach($our_galery_items as $val) : ?>
                    <div class="work_img_block">
                        <img src="<?=$val['image']['sizes']['medium_large']?>" alt="<?=$val['title']?>">
                        <a href="<?=$val['url']?>">
                            <span><?=$val['title']?></span>
                            <span><?=$val['subtitle']?></span>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        <?php echo do_shortcode("[sc name='Gallery']"); ?>
        <?php echo do_shortcode("[feedback]"); ?>
        <div class="slider_section clearfix">
            <div class="wrapper">
                <div class="clearfix header_section">
                    <h2>THE GARAGE</h2>
                    <p>There are always incredible projects going on at AV4x4. We build some of the most amazing 4x4's available anywhere. Check it out! </p>
                </div>
                <?php
                get_template_part( 'page-modules/garage_slider' );?>
            </div>
        </div>
    </div>
<?php
get_footer();
