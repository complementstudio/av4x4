<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Audio

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-audio-holder"><?php
	
		/*===============================================
		
			A U D I O
			Post Format
		
		===============================================*/
	
			$st_['mp3'] = st_get_post_meta( $post->ID, 'mp3_value', true, '' ) ? ' mp3="' . st_get_post_meta( $post->ID, 'mp3_value', true, '' ) . '"' : '';
			$st_['ogg'] = st_get_post_meta( $post->ID, 'ogg_value', true, '' ) ? ' ogg="' . st_get_post_meta( $post->ID, 'ogg_value', true, '' ) . '"' : '';
			$st_['audio'] = st_get_post_meta( $post->ID, 'audio_value', true, '' );
	
	
			/*--- Audio -----------------------------*/
		
			if ( $st_['audio'] ) {
				echo $st_['audio']; }
	
			elseif ( $st_['mp3'] || $st_['ogg'] ) {
				echo do_shortcode('[audio' . $st_['mp3'] . $st_['ogg'] . ' preload=none]'); }


		?>
	
	</div>