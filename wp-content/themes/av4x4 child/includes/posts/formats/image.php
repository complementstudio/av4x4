<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Image

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-image-holder"><?php
	
		/*===============================================
		
			F E A T U R E D   I M A G E
			With different sizes dipends of some reasons
		
		===============================================*/
		
			if ( has_post_thumbnail() ) {
		
				$st_['large_image_url'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
	
	
				/*-------------------------------------------
					on Post page:
					- sidebar(+)
					- sidebar(-)
				-------------------------------------------*/
		
				if ( is_single() ) {
			
					// if sidebar (+)
					if ( !$st_['sidebar_position'] || $st_['sidebar_position'] && $st_['sidebar_position'] != 'none' ) {
						echo '<a href="' . $st_['large_image_url'][0] . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_post_thumbnail( $post->ID, 'post-image', ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'post-image', 'array', 'size-original' ) : '' ) ) . '</a>'; }
		
					// if sidebar (-)
					else {
						echo '<a href="' . $st_['large_image_url'][0] . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_post_thumbnail( $post->ID, 'large', ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'large', 'array', 'size-original' ) : '' ) ) . '</a>'; }
			
				}
	
	
				/*-------------------------------------------
					on Arhive page:
					- blog page, sidebar(+)
					- blog page, sidebar(-)
					- archive
				-------------------------------------------*/
			
				else {
			
					// if blog
					if ( !empty( $st_['is_blog'] ) ) {
			
						// if sidebar (+)
						if ( !$st_['sidebar_position'] || $st_['sidebar_position'] && $st_['sidebar_position'] != 'none' ) {
							echo '<a href="' . $st_['large_image_url'][0] . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_post_thumbnail( $post->ID, 'archive-image', ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'archive-image', 'array', 'size-original' ) : '' ) ) . '</a>'; }
			
						// if sidebar (-)
						else {
							echo get_the_post_thumbnail( $post->ID, 'large', ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'large' ) : '' ) ); }
			
					}
			
					// if archive
					else {
		
						echo '<a href="' . $st_['large_image_url'][0] . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_post_thumbnail( $post->ID, 'archive-image', ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'archive-image', 'array', 'size-original' ) : '' ) ) . '</a>';
		
					}
			
				}
	
	
			}
	
		?>
	
	</div>