<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Gallery

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-gallery-holder"><?php
	
		/*===============================================
		
			G A L L E R Y
			With different sizes dipends of some reasons
		
		===============================================*/
	
			if ( empty( $st_Settings['shortcodes'] ) || isset( $st_Settings['shortcodes'] ) && $st_Settings['shortcodes'] != 'no' ) {
	
				$st_['ids'] = st_get_post_meta( $post->ID, 'gallery_value', true, '' );
		
				if ( $st_['ids'] ) {
					echo do_shortcode( '[st-gallery ids="' . $st_['ids'] . '"]' ); }

			}

		?>
	
	</div>