<?php
/**
 * The template for displaying Recent work section
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
?>
<?php
$galery = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'GALERY',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'posts_per_page' => -1,
        'cat' =>  4,
    )
);
$recent_work_section = array();
foreach($galery as $val){
    $recent_work_section_item = array(
        'title' => $val->post_title,
        'subtitle' => get_field('galery_item_details_subtitle', $val->ID),
        'description' => get_field('galery_item_details_subtitle', $val->ID),
        'url' => $val->guid,
    );
    $galery_item_slider = get_field( 'galery_item_slider', $val->ID );
    $recent_work_section_item['image'] = $galery_item_slider[0]['galery_item_slider_image'];


    $recent_work_section[] = $recent_work_section_item;
}
?>
<div class="recent_work_section clearfix">
    <div class="wrapper">
        <div class="clearfix header_section">
            <h2>RECENT WORK</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non est ac lorem ornare ultrices eu a tortor.
                Aliquam et pretium risus. Donec ut cursus magna, sed consectetur quam. Donec a rhoncus nunc. Sed quis lacinia sapien,
                eget fermentum justo. Ut feugiat elit non nisi feugiat, vitae finibus lectus aliquet.
                Nullam eleifend tortor ac nunc tristique, vitae suscipit turpis condimentum. Curabitur pretium lacus eleifend.
            </p>
        </div>
    </div>
    <?php foreach($recent_work_section as $val) : ?>
        <div class="work_img_block">
            <img src="<?=$val['image']['sizes']['medium']?>" alt="<?=$val['title']?>">
            <a href="<?=$val['url']?>">
                <span><?=$val['title']?></span>
                <span><?=$val['subtitle']?></span>
            </a>
        </div>

    <?php endforeach; ?>

</div>
