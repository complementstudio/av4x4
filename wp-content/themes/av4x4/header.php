<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
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
		get_template_part( 'page-modules/homepage_slider' );
	}
?>
<div>
	<div class="header_section clearfix">
		<div class="<?=(is_front_page()) ? 'header_bg' : ''?> clearfix">


			<div class="clearfix header_contact">
				<div class="wrapper">

					<ul class="list-inline list-unstyled pull-right">
						<li>We are your Idaho 4x4 resource, call us today <span>(208) 863-1718 </span></li>
						<li ><a href="javascript:void (0)" class="chat_button"> Chat with a AV4x4 expert! </a></li>
						<li><a href="javascript:void (0)"><i class="ion-social-facebook"></i> </a></li>
						<li><a href="javascript:void (0)" ><i class="ion-social-instagram"></i> </a></li>
						<li><a href="javascript:void (0)"><i class="ion-social-youtube"></i> </a></li>
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