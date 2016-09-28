<?php
/**
 * The template for displaying garage slider
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
?>
<?php
$garage = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'GARAGE',
    )
);
?>
<div class="home_slider">
    <?php foreach($garage as $slider_item) : ?>
        <div>
            <img src="<?=wp_get_attachment_image_src(get_post_thumbnail_id($slider_item->ID),'medium', true)[0];?>" alt="slider image">
            <p><?=$slider_item->post_content?></p>
            <a href="<?=$slider_item->guid?>"> READ MORE</a>
        </div>
    <?php endforeach; ?>
</div>
