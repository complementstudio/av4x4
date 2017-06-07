<?php if ( !defined( 'ABSPATH' ) ) exit;
/*

	Post format: Status

*/

	/*--- After title data -----------------------------*/

	if ( is_single() && !empty( $st_Settings['after_title'] ) && $st_Settings['after_title'] == 'yes' ) {
		echo '<div id="title-after">' . do_shortcode( $st_Settings['after_title_data'] ) . '</div><div class="clear"><!-- --></div>'; }


	/*--- Excerpt -----------------------------*/

	if ( is_single() && !empty( $st_Settings['excerpt'] ) && $st_Settings['excerpt'] == 'yes' && $post->post_excerpt ) {
		echo '<div class="clear"><!-- --></div><div id="post-excerpt">' . wpautop( $post->post_excerpt ) . '</div>'; } ?>


	<div class="st-format-status-holder"><?php
	
		/*===============================================
		
			S T A T U S
			Post Format
		
		===============================================*/
	
			$st_['user_id'] = get_the_author_meta( 'ID' );
			$st_['upic'] = get_avatar( get_the_author_meta( 'user_email' ), '60' );												
			$st_['name'] = get_the_author_meta( 'display_name' );
		
		
			/*--- Status -----------------------------*/
		
			$st_['status'] = st_get_post_meta( $post->ID, 'status_value', true, '' );
		
			if ( $st_['status'] ) {
		
				echo "\n" .
					'<div class="status-header">' . $st_['upic'] . '<a href="' . get_author_posts_url( $st_['user_id'] ) . '">' . $st_['name'] . '</a><div class="clear"><!-- --></div></div>' .
					'<div class="status-content">' . wpautop( $st_['status'] ) . '<div class="clear"><!-- --></div></div>';
	
			}

	
		?>
	
	</div>