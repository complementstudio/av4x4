<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Quote

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-quote-holder"><?php
	
		/*===============================================
		
			Q U O T E
			Post Format
		
		===============================================*/
		
			$st_['quote'] = st_get_post_meta( $post->ID, 'quote_value', true, '' );
		
			if ( $st_['quote'] ) {
				echo '<blockquote><p>' . $st_['quote'] . '</p></blockquote>'; }

		?>
	
	</div>