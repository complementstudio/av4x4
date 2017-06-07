<?php if ( !defined( 'ABSPATH' ) ) exit;

/*

	1 - RETRIEVE DATA

	2 - SIDEBARS

		- Default Sidebar
		- Post Sidebar
		- Homepage Sidebars
		- Footer Sidebars
		- bbPress Sidebar
		- Additional Sidebars

*/

/*===============================================

	R E T R I E V E   D A T A
	Get a required data

===============================================*/

	global
		$st_Options,
		$st_Settings;

		$st_ = array();

		// Get a qty of additional sidebars
		$st_['qty'] = !empty( $st_Settings['sidebar_qty'] ) ? $st_Settings['sidebar_qty'] : 0;


/*===============================================

 	S I D E B A R S
	Register a new sidebars

===============================================*/

	// Default Sidebar
	if ( $st_Options['sidebars']['default'] && function_exists('register_sidebar') ) {
		register_sidebars(
			1,
			array(
				'name'				=> 'Default Sidebar',
				'description'		=> __( 'Appears on posts and pages except the optional Front Page, which has its own widgets.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// Post Sidebar
	if ( $st_Options['sidebars']['post-sidebar'] && function_exists('register_sidebar') ) {
		register_sidebars(
			1,
			array(
				'name'				=> 'Post Sidebar',
				'description'		=> __( 'Additional sidebar. Usually, it comes by left side of post. Appears on posts only.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// Ad Sidebars
	if ( $st_Options['sidebars']['ads'] && function_exists('register_sidebar') ) {

		$st_['count'] = 0;

		foreach ($st_Options['sidebars']['ads'] as $key ) {

			$st_['count']++;

			register_sidebars(
				1,
				array(
					'name'				=> 'Ad Sidebar ' . $st_['count'],
					'description'		=> $key,
					'before_widget'		=> "\n" . '<div class="widget">' . "\n",
					'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
					'before_title'		=> '<h5>',
					'after_title'		=> '</h5>' . "\n"
				)
			);

		}

	}


	// Projects Sidebar
	if ( $st_Options['sidebars']['projects'] && function_exists('register_sidebar') ) {
		register_sidebars(
			1,
			array(
				'name'				=> 'Projects Sidebar',
				'description'		=> __( 'Appears on projects and archives of projects depends of selected template.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// Footer Sidebars
	if ( $st_Options['sidebars']['footer'] && function_exists('register_sidebar') ) {
		register_sidebars(
			$st_Options['sidebars']['footer'],
			array(
				'name'				=> 'Footer Sidebar %d',
				'description'		=> __( 'Appears on all pages at the bottom of site.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// bbPress Sidebar
	if ( $st_Options['sidebars']['bbPress'] && function_exists('register_sidebar') ) {
		register_sidebars(
			1,
			array(
				'name'				=> 'bbPress Sidebar',
				'description'		=> __( 'Appears on bbPress forum pages.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// BuddyPress Sidebar
	if ( $st_Options['sidebars']['buddyPress'] && function_exists('register_sidebar') ) {
		register_sidebars(
			1,
			array(
				'name'				=> 'BuddyPress Sidebar',
				'description'		=> __( 'Appears on BuddyPress pages.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


	// Additional Sidebars
	if ( function_exists('register_sidebar') ) {
		register_sidebars(
			$st_['qty'],
			array(
				'name'				=> 'Custom bar %d',
				'description'		=> __( 'Appears on selected posts and pages.', 'strictthemes' ),
				'before_widget'		=> "\n" . '<div class="widget %2$s">' . "\n",
				'after_widget'		=> "\n" . '<div class="clear"><!-- --></div></div>' . "\n",
				'before_title'		=> '<h5>',
				'after_title'		=> '</h5>' . "\n"
			)
		);
	}


?>