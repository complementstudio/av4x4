<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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
get_header(); ?>

?>

<div class="home_content clearfix">
	<div class="customer_review_page cst_page">
		<div class="wrapper">
			<div class="review_title" <?=$style?>>
<!--				<h2>--><?//=the_title();?><!--</h2>-->
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					// End the loop.
				endwhile;
				?>
			</div>
			<?php if(has_post_thumbnail()) : ?>
				<img src="<?=$image_url_thumb[0]?>" style="width: 30%"/>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();