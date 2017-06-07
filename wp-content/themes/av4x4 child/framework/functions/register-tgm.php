<?php if ( !defined( 'ABSPATH' ) ) exit;

/*

	1 - TGM

		1.1 - Include
		1.2 - Textdomain
		1.3 - Hook

*/

/*= 1 ===========================================

	T G M
	Plugin activation class

===============================================*/

	/*-------------------------------------------
		1.1 - Include
	-------------------------------------------*/

	get_template_part( '/framework/functions/classes/class-tgm-plugin-activation' );


	/*-------------------------------------------
		1.2 - Textdomain
	-------------------------------------------*/

	/* n/a */


	/*-------------------------------------------
		1.3 - Hook
	-------------------------------------------*/

	function st_register_required_plugins() {
	
		$plugins = array(

			array(
				'name'     				=> 'Envato Market',
				'slug'     				=> 'envato-market',
				'source'   				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' 				=> true,
				'version' 				=> '',
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'					=> 'WP-PageNavi',
				'slug'					=> 'wp-pagenavi',
				'required'				=> false,
			),

			array(
				'name'					=> 'WordPress SEO by Yoast',
				'slug'					=> 'wordpress-seo',
				'required'				=> false,
			),

			array(
				'name'					=> 'Contact Form 7',
				'slug'					=> 'contact-form-7',
				'required'				=> false,
			),

			array(
				'name'					=> 'bbPress',
				'slug'					=> 'bbpress',
				'required'				=> false,
			),

			array(
				'name'					=> 'BuddyPress',
				'slug'					=> 'buddypress',
				'required'				=> false,
			),

			array(
				'name'					=> 'Social Share Buttons & Analytics by GetSocial',
				'slug'					=> 'wp-share-buttons-analytics-by-getsocial',
				'required'				=> false,
			),

			array(
				'name'     				=> 'ST Kit',
				'slug'     				=> 'stkit',
				'source'   				=> 'http://strictthemes.com/to/download-stkit',
				'required' 				=> true,
				'version' 				=> '',
				'force_activation' 		=> true,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

		);
	
		$config = array(
			'id'				=> 'grimag',
			'domain'       		=> 'grimag',
			'default_path' 		=> '',
			'parent_slug' 		=> 'themes.php',
			'menu'				=> 'tgmpa-install-plugins',
			'has_notices'      	=> true,
			'dismissable'		=> true,
			'dismiss_msg'		=> '',
			'is_automatic'    	=> true,
			'message' 			=> '',
		);
	
		tgmpa( $plugins, $config );
	
	}

	add_action( 'tgmpa_register', 'st_register_required_plugins' );



?>