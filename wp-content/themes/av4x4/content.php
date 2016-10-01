<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

$image_id = get_post_thumbnail_id($post->ID);
$image_url = wp_get_attachment_image_src($image_id,'full', true);
$image_url_thumb = wp_get_attachment_image_src($image_id,'high', true);
if(has_post_thumbnail()) {
	$style = "style='width:70%;float:left;'";
} else {
	$style = "";
}
?>

	<div class="home_content clearfix">
		<div class="customer_review_page cst_page">
			<div class="wrapper">
				<div class="review_title" <?=$style?>>
					<h2><?=the_title();?></h2>
					<?=the_content();?>
				</div>
				<?php if(has_post_thumbnail()) : ?>
				<img src="<?=$image_url_thumb[0]?>" style="width: 30%"/>
				<?php endif; ?>
			</div>
		</div>
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
