<?php if ( !defined( 'ABSPATH' ) ) exit;

	echo "\n";
	$st_['featcount']++;

	// Post format
	$st_['format'] = get_post_format( $post->ID ) ? get_post_format( $post->ID ) : 'standard';



	/*-------------------------------------------
		POST A
	-------------------------------------------*/

	if ( $st_['featcount'] == 1 ) {


		echo '<div class="posts-featured-' . ( $st_query_feat->found_posts == 1 ? 'alone' : 'a' ) . '-wrapper">';


			// Feat image
			if ( has_post_thumbnail() ) {
		
				$st_['id'] = get_post_thumbnail_id( $post->ID );
				$st_['thumb'] = wp_get_attachment_image_src( $st_['id'], $st_query_feat->found_posts == 1 ? 'large' : 'project-medium' );
				$st_['thumb'] = $st_['thumb'][0];
		
			}
		
			else {
		
				$st_['thumb'] = get_template_directory_uri() . '/assets/images/placeholder.png';
		
			}


			// Compose thumb
			echo '<a href="' . get_permalink() . '" class="post-thumb" ' . ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, $st_query_feat->found_posts == 1 ? 'large' : 'project-medium', 'attr' ) : '' ) . ' style="background-image: url(' . $st_['thumb'] . ')" data-format="' . $st_['format'] . '">&nbsp;</a>';


			// Other
			echo '<div class="posts-featured-details-wrapper"><div>' .

				'<h1><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>' .

				wpautop( do_shortcode( get_the_excerpt() ) );

				st_post_meta( true, false, false, 'number', false, true, __( 'More', 'strictthemes' ) );

			echo '</div></div>';

		echo '</div>' . "\n";


	}


	/*-------------------------------------------
		POSTS B,C,D,E
	-------------------------------------------*/

	elseif ( $st_['featcount'] < 6 ) {

		$st_['priority'] = $st_['priority'] == 'odd' ? 'even' : 'odd';

		echo '<div class="posts-featured-b-wrapper b-' . $st_['priority'] . '">';


			// Feat image
			if ( has_post_thumbnail() ) {
		
				$st_['id'] = get_post_thumbnail_id( $post->ID );
				$st_['thumb'] = wp_get_attachment_image_src( $st_['id'], 'project-thumb' );
				$st_['thumb'] = $st_['thumb'][0];
		
			}
		
			else {
		
				$st_['thumb'] = get_template_directory_uri() . '/assets/images/placeholder.png';
		
			}


			// Compose thumb
			echo '<a href="' . get_permalink() . '" class="post-thumb" ' . ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'project-thumb', 'attr' ) : '' ) . ' style="background-image: url(' . $st_['thumb'] . ')" data-format="' . $st_['format'] . '">&nbsp;</a>';


			// Other
			echo '<div class="posts-featured-details-wrapper"><div>' .

				'<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';

				st_post_meta( false, false, false, 'number', false, true, __( 'More', 'strictthemes' ) );

			echo '</div></div>';


		echo '</div>' . "\n";


	}


	/*-------------------------------------------
		POSTS F,G,H,I,J...
	-------------------------------------------*/

	else {

		$st_['postcount']++;
		$st_['priority'] = $st_['priority'] == 'odd' ? 'even' : 'odd';

		// Post's class
		$st_['class'] = '';
		if ( $st_['postcount'] == 1 ) { $st_['class'] = 'first'; }
		if ( $st_['postcount'] == 4 ) { $st_['class'] = 'last'; $st_['postcount'] = 0; }


		// Feat image
		if ( has_post_thumbnail() ) {
	
			$st_['id'] = get_post_thumbnail_id( $post->ID );
			$st_['thumb'] = wp_get_attachment_image_src( $st_['id'], 'project-thumb' );
			$st_['thumb'] = $st_['thumb'][0];
	
		}
	
		else {
	
			$st_['thumb'] = get_template_directory_uri() . '/assets/images/placeholder.png';
	
		}


		// Compose post
		echo '<div class="posts-featured-c-wrapper c-' . $st_['priority'] . ' ' . $st_['class'] . '">';


			// Compose thumb
			echo '<a href="' . get_permalink() . '" class="post-thumb" ' . ( function_exists( 'st_get_2x' ) ? st_get_2x( $post->ID, 'project-thumb', 'attr' ) : '' ) . ' style="background-image: url(' . $st_['thumb'] . ')" data-format="' . $st_['format'] . '">&nbsp;</a>';


			// Other
			echo '<div class="posts-featured-details-wrapper"><div>' .

				'<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';

				st_post_meta( false, false, false, 'number', false, true, __( 'More', 'strictthemes' ) );

			echo '</div></div>';


		echo '</div>' . "\n";


	}


?>