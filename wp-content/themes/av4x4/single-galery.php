<?php
/**
 * The Template for displaying all single Galery Item
 *
 * @package WordPress
 * @subpackage av4x4
 * @since Twenty Fourteen 1.0
 */

get_header();
$current_Galery_item = wp_get_single_post(get_the_ID());
$page_id = $current_Galery_item->ID;
$others = get_posts(
	array( 'showposts' => -1,
		'post_type' => 'galery',
		'numberposts' => 4,
		'orderby' => 'rand',
        'exclude' => array($page_id)
	)
);
$others_like_this_items = array();

foreach($others as $other){
    setup_postdata($other);
    $galery_item_slider = get_field( 'galery_item_slider', get_the_ID());
    $others_like_this_item = array(
        'image' => $galery_item_slider[0]['galery_item_slider_image']['sizes']['medium']
    );

            $others_like_this_item['url'] = get_site_url().'/'.$other->post_type.'/'.$other->post_name;
                $others_like_this_items[] = $others_like_this_item;

}
$galery_item_title = $current_Galery_item->post_title;
$galery_item_details_subtitle = get_field( 'galery_title', $page_id );
$galery_item_description = get_field( 'galery_item_description', $page_id );
$galery_item_used_parts = get_field( 'galery_item_used_parts', $page_id );
$galery_Item_brands = get_field( 'galery_Item_brands', $page_id );
$galery_item_slider = get_field( 'galery_item_slider', $page_id );

?>

<div class="home_content clearfix">
 <div class="customer_gallery clearfix">
     <div class="wrapper">
         <h2 class="customer_gallery_title"> CUSTOMER GALLERY</h2>
         <div class="thumbnail_slider_block">
             <div id="slider" class="flexslider">
                 <ul class="slides">
                  <?php foreach($galery_item_slider as $slide) : ?>
                      <li>
                         <img src="<?=$slide['galery_item_slider_image']['sizes']['medium_large']?>" />
                     </li>
                 <?php endforeach; ?>
                 </ul>
             </div>
             <div id="carousel" class="flexslider">
                 <ul class="slides">
                      <?php foreach($galery_item_slider as $slide) : ?>
                      <li>
                         <img src="<?=$slide['galery_item_slider_image']['sizes']['thumbnail']?>" />
                     </li>
                 <?php endforeach; ?>
                 </ul>
             </div>
         </div>
         <div class="thumbnail_slider_text">
            <h2><?=$galery_item_title?></h2>
             <p><?=$galery_item_description?></p>
             <h3> Parts Used</h3>
             <ul class="list-unstyled parts_list">
             <?php foreach($galery_item_used_parts as $part) : ?>
                 <li><a href="<?=(!empty($part['url'])) ? $part['url'] : '#'?>">  <?=$part['galery_item_used_parts_title']?> </a></li>
                 <?php endforeach; ?>
             </ul>
             <h3>4x4 Brands</h3>
             <ul class="list-inline list-unstyled brends_list">
              <?php foreach($galery_Item_brands as $brend) : ?>
                     <li ><a href="<?=(!empty($brend['url'])) ? $brend['url'] : '#'?>" style="background-image: url(<?=$brend['galery_Item_brands_image']['sizes']['thumbnail']?>)"></a></li>
              <?php endforeach; ?>
             </ul>
         </div>
         <div class="clearfix"></div>
         <div class="other_sliders_section">
             <h2> OTHERS LIKE THIS ONE</h2>
             <?php foreach($others_like_this_items as $others_like_this_item) : ?>
                 <div class="other_slider_block" style="background-image: url(<?=$others_like_this_item['image']?>)">
                     <a href="<?=$others_like_this_item['url']?>"></a>
                 </div>
              <?php endforeach; ?>
         </div>
     </div>
 </div>

    <div class="meet_team_page">
        <div class="meet_team_page">
            <div class="clearfix view_pakages_section">
                <div class="left_block">
                    <div>
                        <p>We love 4x4’s and have the experience and crew to help
                            guide you on finding the best parts and packages for your
                            4x4.  Let our crew help you find the best fit.
                        </p>
                    </div>
                </div>
                <div class="right_block">
                    <a href="javascript:void(0)" class="view_pakages_btn"><span>CONTACT US FOR A</span>
                        <span>FREE CONSULTATION</span>
                    </a>
                    <p>Call us at (208) 123-4567 or chat below</p>
                </div>
            </div>
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
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
