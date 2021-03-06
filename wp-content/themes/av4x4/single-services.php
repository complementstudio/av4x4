<?php
/**
 * The Template for displaying all single Service Item
 *
 * @package WordPress
 * @subpackage av4x4
 * @since Twenty Fourteen 1.0
 */

get_header();

$our_services = get_posts(
	array( 'showposts' => -1,
		'post_type' => 'services',
		'posts_per_page' => 8,
		'orderby' => 'rand'
	)
);
$current_service = wp_get_single_post(get_the_ID());
$image_id = get_post_thumbnail_id($current_service->ID);
$image_url_thumb = wp_get_attachment_image_src($image_id,'original', true);
?>

	<div class="home_content clearfix services_details">
		<div class="wrapper">
			<div class="service_description clearfix">
				<h2 class="section_title"> CUSTOM DESIGN & FAB</h2>
				<div class="other_services_list">
					<p> OTHER SERVICES</p>
					<ul class="list-unstyled">
						<?php foreach($our_services as $post) : ?>
							<li><a href="<?=$post->guid?>">    <?=$post->post_title?> </a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="details_content">
					<div class="img_block" style="background-image: url(<?=(!empty($image_url_thumb[0]) ? $image_url_thumb[0] : '')?>)"></div>
					<div class="text_section">
						<?=$current_service->post_content?>
					</div>
				</div>

			</div>
			<?php get_template_part( 'page-modules/customer_images_section' );?>


		</div>
		<?php echo do_shortcode('[sc name="Single service"]'); ?>
	</div>
<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
