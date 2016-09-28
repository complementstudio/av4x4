<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

global $wpdb;
$table_name = $wpdb->prefix . "av4x4_settings";
$query = "SELECT * FROM {$table_name} LIMIT 1";
$results = $wpdb->get_results( $query );
$data = json_decode($results[0]->settings);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if(is_front_page()) {
	$class = 'header_bg';
	get_template_part( 'page-modules/homepage_slider' );
} else {
	$class = '';
}
?>
<div>
	<div class="header_section clearfix">
		<div class="<?=$class?> clearfix">


			<div class="clearfix header_contact">
				<div class="wrapper">

					<ul class="list-inline list-unstyled pull-right">
						<li><?=$data->slogan?> <span><?=$data->phone?></span></li>
						<li ><a href="<?=$data->button_link?>" class="chat_button"><?=$data->button_text?></a></li>
						<li><a href="<?=$data->fb?>"><i class="ion-social-facebook"></i> </a></li>
						<li><a href="<?=$data->inst?>" ><i class="ion-social-instagram"></i> </a></li>
						<li><a href="<?=$data->youtube?>"><i class="ion-social-youtube"></i> </a></li>
					</ul>
				</div>
			</div>
			<?php if(!is_front_page()) : ?>
			<div class="clearfix header_black_section">
				<?php endif; ?>
				<div class="header_menu clearfix">
					<div class="wrapper">
						<a href="<?=get_home_url()?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/header_logo.png" alt="logo" class="header_logo">
						</a>
						<span class="header_toggle_icon"><i class="ion-navicon"></i></span>

						<?php

						$defaults = array(
							'items_wrap'      => '<ul class="list-unstyled list-inline pull-right main_menu">%3$s</ul>',
						);
						wp_nav_menu($defaults);
						?>
					</div>
				</div>
				<?php if(is_page(7)) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="clearfix header_meet_crew">
							<div class="wrapper">
								<img src="<?=the_post_thumbnail_url( 'full' )?>" alt="crew image">
								<div class="text_block">
									<h2><?=the_title();?></h2>
									<?=the_content();?>
								</div>

							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if(!is_front_page()) : ?>
			</div>
		<?php endif; ?>

			<?php
			if(is_front_page()) {
				get_template_part( 'page-modules/homepage_slider_details' );
			}

			?>
		</div>
	</div>
</div>