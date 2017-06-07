<?php if ( !defined( 'ABSPATH' ) ) exit;

/*

	1 - REGISTER CSS

		1.1 - Major styles

			- style.css

		1.2 - Responsive

			- /assets/css/responsive.css

		1.3 - Other styles

			- wp-mediaelement.css

		1.4 - Admin styles

*/

	if ( !is_admin() ) {

		function st_theme_styles() {
	
			global
				$st_Options,
				$st_Settings;


				/*-------------------------------------------
					1.1 - Major styles
				-------------------------------------------*/

				wp_enqueue_style( 'st-style', get_stylesheet_uri(), false, null, 'all' );


				/*-------------------------------------------
					1.2 - Responsive styles
				-------------------------------------------*/
	
				if ( !function_exists( 'st_kit' ) ) {
					wp_enqueue_style( 'st-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', false, null, 'all' ); }


				/*-------------------------------------------
					1.3 - Other styles
				-------------------------------------------*/
	
				if ( $st_Options['js']['mediaelement'] ) {
					wp_enqueue_style( 'wp-mediaelement' ); }


		}

		add_action( 'wp_enqueue_scripts', 'st_theme_styles' );

	}

	if ( is_admin() ) {

		function st_admin_styles() {

			/*-------------------------------------------
				1.4 - Admin styles
			-------------------------------------------*/

			wp_enqueue_style( 'st-theme-admin', get_template_directory_uri() . '/framework/assets/css/st-admin.css', false, null, 'all' );

		}

		add_action( 'admin_enqueue_scripts', 'st_admin_styles' );

	}

?>