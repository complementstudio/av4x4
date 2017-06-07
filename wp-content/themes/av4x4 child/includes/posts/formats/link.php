<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Link

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-link-holder"><?php

		/*===============================================
		
			L I N K
			Post Format
		
		===============================================*/
		
			$st_['link'] = st_get_post_meta( $post->ID, 'link_value', true, '' );
		
			if ( $st_['link'] ) {
		
				if ( st_get_post_meta( $post->ID, 'link_redirect_value', true, '' ) ) {
					$st_['link'] = st_get_redirect_page_url() . $st_['link']; }
		
				$st_['link_title'] = st_get_post_meta( $post->ID, 'link_title_value', true, $st_['link'] );
		
				echo '<a target="_blank" href="' . $st_['link'] . '">' . st_get_post_meta( $post->ID, 'link_title_value', true, $st_['link'] ) . '</a>';
	
			}
	
		?>
	
	</div>