<?php if ( !defined( 'ABSPATH' ) ) exit;

/*

	- general
	- global
	- js
	- menu
	- sidebars
	- widgets
	- metaboxes
	- shortcodes
	- breadcrumbs
	- networks
	- networks_path
	- panel

*/

/*===============================================

	T H E M E   O P T I O N S
	Unique options of the theme

===============================================*/

	global $st_Options;

	$st_Options = array (
	
		'general'		=>	array (
								'name'				=>	'grimag_',
								'label'				=>	'Grimag',
								'version'			=>	'1.2.3',
								'url'				=>	'http://strictthemes.com/to/Grimag',
								'url-demo'			=>	'http://strictthemes.com/to/LivePreview-Grimag',
								'documentation'		=>	'http://strictthemes.com/documentation',
								'developer'			=>	'StrictThemes',
								'developer-url'		=>	'http://strictthemes.com',
								'stkit-min'			=>	'1.8.8',
								),
		'global'		=>	array (
								'content_width'		=>	837,
								'rss'				=>	true,
								'lang'				=>	true,
								'excerpt'			=>	25, // words
								'excerpt-in-search'	=>	true,
								'tag-cloud'			=>	13, // px
								'post-formats'		=>	array(
															'enabled'		=>	true,
															'post-title'	=>	true, // metabox option
															'aside'			=>	array(
																						'status'		=>	false,
																						'label'			=>	__( 'Aside', 'strictthemes' ),
																					),
															'image'			=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Image', 'strictthemes' ),
																					),
															'gallery'		=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Gallery', 'strictthemes' ),
																					),
															'audio'			=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Audio', 'strictthemes' ),
																					),
															'video'			=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Video', 'strictthemes' ),
																					),
															'link'			=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Link', 'strictthemes' ),
																					),
															'quote'			=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Quote', 'strictthemes' ),
																					),
															'status'		=>	array(
																						'status'		=>	true,
																						'label'			=>	__( 'Status', 'strictthemes' ),
																					),
															'chat'			=>	array(
																						'status'		=>	false,
																						'label'			=>	__( 'Chat', 'strictthemes' ),
																					),
															),
								'images'			=>	array(
															'thumbnail'		=>	array(
																						'status'		=>	true,
																						'width'			=>	150,
																						'height'		=>	150,
																						'crop'			=>	true,
																						),
															'medium'			=>	array(
																						'status'		=>	true,
																						'width'			=>	300,
																						'height'		=>	300,
																						'crop'			=>	true,
																						),
															'large'				=>	array(
																						'status'		=>	true,
																						'width'			=>	1200,
																						'height'		=>	9999,
																						'crop'			=>	false,
																						),
															'archive-image'		=>	array(
																						'status'		=>	true,
																						'width'			=>	837,
																						'height'		=>	9999,
																						'crop'			=>	false,
																						),
															'post-image'		=>	array(
																						'status'		=>	true,
																						'width'			=>	667,
																						'height'		=>	9999,
																						'crop'			=>	false,
																						),
															'project-thumb'		=>	array(
																						'status'		=>	true,
																						'width'			=>	262,
																						'height'		=>	180,
																						'crop'			=>	true,
																						),
															'project-medium'		=>	array(
																						'status'		=>	true,
																						'width'			=>	574,
																						'height'		=>	408,
																						'crop'			=>	true,
																						),
															),
								'custom-background'	=>	true,
								'custom-header'		=>	false,
								'title-tag'			=>	true,
								'demo'				=>	array(
																'status'		=>	true,
																'frontpage'		=>	'Blog',
																'posts_per_page'=>	7,
																'content'		=>	array( // content parts
																						'pages'			=>	true,
																						'categories'	=>	true,
																						'menu'			=>	true,
																						'widgets'		=>	true,
																						'settings'		=>	true,
																						),
																'options'		=>	array( // other options which must be updated
																						'bp-active-components',
																						'bp-pages',
																						'widget_bp_core_members_widget',
																						'widget_bp_core_recently_active_widget',
																						),
														),
								),
		'ctp'			=>	array (
								'post'			=>	'st_project',
								'category'		=>	'st_category',
								'tag'			=>	'st_tag',
								),
		'js'			=>	array (
								'st'			=>	true,
								'menu'			=>	true,
								'theme'			=>	true,
								'prettyPhoto'	=>	true,
								'mediaelement'	=>	true,
								'ie'			=>	true,
								),
		'menu'			=>	array (
								'primary'		=>	true,
								'secondary'		=>	true,
								),
		'sidebars'		=>	array (
								'default'		=>	true,
								'post-sidebar'	=>	true,
								'homepage'		=>	0,
								'ads'			=>	array(
														__( 'Appears on the header of all pages.', 'strictthemes' ),
														__( 'Appears on the middle of homepage.', 'strictthemes' ),
														__( 'Appears on the bottom of all pages.', 'strictthemes' )
													),
								'projects'		=>	false,
								'footer'		=>	4,
								'bbPress'		=>	true,
								'buddyPress'	=>	true,
								),
		'widgets'		=>	array (
								'sharrre'		=>	false,
								'contact-info'	=>	false,
								'contact-info-v2'=>	true,
								'flickr'		=>	true,
								'recent-posts'	=>	false,
								'recent-posts-v2'=>	true,
								'subscribe'		=>	false,
								'subscribe-v2'	=>	true,
								),
		'metaboxes'		=>	array (
								'sidebar'		=>	true,
								'post-options'	=>	true,
								),
		'shortcodes'	=>	array (
								'status'		=>	true,
								'column'		=>	true,
								'ul'			=>	true,
								'button'		=>	true,
								'alert'			=>	true,
								'highlight'		=>	true,
								'dropcap'		=>	true,
								'pullquote'		=>	true,
								'toggle'		=>	true,
								'accordion'		=>	true,
								'tabs'			=>	true,
								'googlemap'		=>	true,
								'pricing-table'	=>	true,
								'sidebar'		=>	true,
								'clear'			=>	true,
								'notice'		=>	true,
								'skill'			=>	true,
								'icon-box'		=>	true,
								'gallery'		=>	true,
								),
		'breadcrumbs'	=>	true,
		'networks'		=>	array (
								'life_500px',
								'life_Behance',
								'life_Blogger',
								'life_Delicious',
								'life_DeviantART',
								'life_Digg',
								'life_Dopplr',
								'life_Dribbble',
								'life_Evernote',
								'life_Facebook',
								'life_Flickr',
								'life_Forrst',
								'life_GitHub',
								'life_GooglePlus',
								'life_Grooveshark',
								'life_Instagram',
								'life_Lastfm',
								'life_LinkedIn',
								'life_MySpace',
								'life_Path',
								'life_Picasa',
								'life_Pinterest',
								'life_Posterous',
								'life_Reddit',
								'life_RSS',
								'life_Skype',
								'life_SoundCloud',
								'life_Spotify',
								'life_Stumbleupon',
								'life_Tumblr',
								'life_Twitter',
								'life_Viddler',
								'life_Vimeo',
								'life_Virb',
								'life_WordPress',
								'life_Youtube',
								'life_Zerply'
								),
		'networks_path'	=>	'18/social/color/',
		'compatibility'	=>	array(
								'yoast'			=>	true,
							),
		'tags_empty'	=>	array(), // needed
		'tags_allowed'	=>	array(
								'a'			=>	array(
													'class'				=> array(),
													'id'				=> array(),
													'href'				=> array(),
													'title'				=> array(),
													'target'			=> array(),
													),
								'b'			=>	array(),
								'br'		=>	array(),
								'blockquote'=>	array(
													'cite'				=> array(),
													),
								'code'		=>	array(),
								'div'		=>	array(
													'class'				=> array(),
													'id'				=> array(),
													),
								'em'		=>	array(),
								'h1'		=>	array(),
								'h2'		=>	array(),
								'h3'		=>	array(),
								'h4'		=>	array(),
								'h5'		=>	array(),
								'h6'		=>	array(),
								'i'			=>	array(),
								'img'		=>	array(
													'alt'				=> array(),
													'class'				=> array(),
													'id'				=> array(),
													'src'				=> array(),
													'title'				=> array(),
													),
								'iframe'	=>	array(
													'src'				=> array(),
													'width'				=> array(),
													'height'			=> array(),
													'scrolling'			=> array(),
													'frameborder'		=> array(),
													'allowfullscreen'	=> array(),
													),
								'link'		=>	array(
													'href'				=> array(),
													'rel'				=> array(),
													'type'				=> array(),
													),
								'p'			=>	array(),
								'pre'		=>	array(),
								'q'			=>	array(
													'cite'				=> array(),
													),
								'script'	=>	array(
													'type'				=> array(),
													'src'				=> array(),
													'id'				=> array(),
													),
								'span'		=>	array(
													'class'				=> array(),
													'id'				=> array(),
													),
								'strike'	=>	array(),
								'strong'	=>	array(),
								'table'		=>	array(
													'class'				=> array(),
													'id'				=> array(),
													),
								'td'		=>	array(),
								'tr'		=>	array(),
								),
		'panel'			=>	array(
								'major'			=>	array (
														'status'	=>	true,
														'general'	=>	array(
																			'status'		=>	true,
																			'logo_img'		=>	true,
																			'favicon'		=>	true,
																			'copyrights'	=>	true,
																			'dev_link'		=>	true,
																			'analytics'		=>	true,
																			),
														'blog'		=>	array(
																			'status'		=>	true,
																			'template'		=>	array(
																									'default'			=>	array (
																																'label'			=> __( 'Default', 'strictthemes' ),
																																'status'		=> true,
																																'desc'			=> __( 'This is standard template.', 'strictthemes' ),
																																),
																									't1'				=>	array (
																																'label'			=> '1',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't2'				=>	array (
																																'label'			=> '2',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't3'				=>	array (
																																'label'			=> '3',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't4'				=>	array (
																																'label'			=> '4',
																																'status'		=> true,
																																'desc'			=> __( 'Template with thumbnails.', 'strictthemes' ),
																																),
																									't5'				=>	array (
																																'label'			=> '5',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't6'				=>	array (
																																'label'			=> '6',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't7'				=>	array (
																																'label'			=> '7',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									't8'				=>	array (
																																'label'			=> '8',
																																'status'		=> true,
																																'desc'			=> __( 'Minimalistic template. Also it used on search page.', 'strictthemes' ),
																																),
																									't9'				=>	array (
																																'label'			=> '9',
																																'status'		=> false,
																																'desc'			=> '',
																																),
																									),
																			'featured'		=> array(
																									'sticky-status'		=>	true,
																									'sticky'			=>	'5',
																									'not-in-blogroll'	=>	true,
																									),
																			),
														'post'		=> array(
																			'status'			=>	true,
																			'after_title'		=>	true,
																			'before_post'		=>	true,
																			'post_feat_image'	=>	true,
																			'excerpt'			=>	true,
																			'post_meta'			=>	array(
																										'status'		=>	true,
																										'author_info'	=>	true,
																										'post_views'	=>	true,
																										'nice_time'		=>	true
																										),
																			'after_post'		=>	true,
																			'post_comments'		=>	true,
																			'related'			=>	true,
																			),
														'page'		=> array(
																			'status'			=>	true,
																			'page_comments'		=>	true
																			),
														'sidebar'		=> array(
																			'status'			=>	true,
																			'additional'		=>	true
																			),
														),
								'layout'		=>	array(
														'status'	=> true,
														'general'	=>	array(
																			'status'			=>	true,
																			'layout_type'		=>	true,
																			'layout_design'		=>	true,
																			),
														'header'	=>	array(
																			'status'			=>	false
																			),
														'footer'	=>	array(
																			'status'			=>	true,
																			'scheme'			=>	array(
																										'status'			=>	true,
																										'default'			=>	'5',
																									),
																			),
														'social'	=>	array(
																			'status'			=>	true,
																			),
														),
								'projects'		=>	array (
														'status'	=>	false,
														'general'	=>	array(
																			'status'			=>	false,
																			'slugs'				=>	false,
																			),
														'portfolio'	=>	array(
																			'status'			=>	false,
																			'projects_qty'		=>	false,
																			'templates'			=>	array (
																										'status'		=>	false,
																										'default'		=>	array (
																																'status'		=>	false,
																																'label'			=>	__( 'Default', 'strictthemes' ),
																																'dummy'			=>	false,
																																),
																										't1'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'1',
																																'dummy'			=>	false,
																																),
																										't2'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'2',
																																'dummy'			=>	false,
																																),
																										't3'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'3',
																																'dummy'			=>	false,
																																),
																										't4'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'4',
																																'dummy'			=>	false,
																																),
																										't5'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'5',
																																'dummy'			=>	false,
																																),
																										't6'			=>	array (
																																'status'		=>	false,
																																'label'			=>	'6',
																																'dummy'			=>	false,
																																)
																										),
																			'template-default'	=>	't1',
																			),
														'taxonomy'	=>	array(
																			'status'			=>	false,
																			),
														),
								'fonts'			=>	array(
														'status'	=>	true,
														'general'	=>	array(
																			'status'			=>	true,
																			'font_size'			=>	true,
																			'font_type'			=>	true,
																			'font_custom'		=>	true,
																			),
														),
								'style'			=>	array(
														'status'	=>	true,
														'general'	=>	array(
																			'status'			=>	true,
																			'styles'			=>	array(
																										'status'		=>	true,
																										'light' 		=>	array (
																																'status'		=>	'default',
																																'label'			=>	__( 'Light', 'strictthemes' ),
																																),
																										'dark'			=>	array (
																																'status'		=>	true,
																																'label'			=>	__( 'Dark', 'strictthemes' ),
																																),
																										),
																			'colors'			=>	array(
																										'status'		=>	true,
																										'default'		=>	'',
																										'primary'		=>	array(
																																'hex'			=>	'494158',
																																'colors'		=>	array(
																																						'h1, h2, h3, h4, h5, h6',
																																						'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
																																						'a:hover',
																																						'#logo h2, #logo h2 a, #logo h2 img',
																																						'.nav-next a, .nav-previous a',
																																						'#but-prev-next a',
																																						'#wp-pagenavibox .wp-pagenavi *',
																																						'.widget_custom_menu > li > ul > li.current-menu-item > a',
																																						'.dark #but-prev-next a:hover',
																																						'.dark #wp-pagenavibox .wp-pagenavi a:hover',
																																						),
																																'backgrounds'	=>	array(
																																						'body.dark', // needed
																																						'caption',
																																						'th',
																																						'#menu',
																																						'#footer',
																																						'.status-header',
																																						'.pricing-table-gray .pricing-table-title',
																																						'.pricing-table-gray .pricing-table-price',
																																						'.pricing-table-gray .button',
																																						'.pricing-table-dark .pricing-table-title',
																																						'.pricing-table-dark .pricing-table-price',
																																						'.pricing-table-dark .button',
																																						'.notice',
																																						'#sidebar .widget',
																																						'.more-link:hover',
																																						'#layout .mejs-volume-slider',
																																						'.widget_nav_menu',
																																						'.widget_nav_menu h5',
																																						'#buddypress div.item-list-tabs ul li.selected a span',
																																						'#buddypress div.item-list-tabs ul li.current a span',
																																						'#buddypress div.item-list-tabs ul li a span',
																																						'#buddypress div.item-list-tabs ul li a:hover span'
																																						),
																																'border-top'	=>	array(
																																						'#buddypress div.item-list-tabs ul li a span:after'
																																						),
																																'border-bottom'	=>	array(
																																						),
																																),
																										'primary-alt-a'	=>	array(
																																'steps'			=>	'120',
																																'color'	=>	array(
																																						'body.dark #content-layout',
																																						'#sidebar .widget',
																																						'#footer',
																																						'.sidebar-footer > div .widget',
																																						'body.dark #bbpress-forums .bbp-forum-info .bbp-forum-content',
																																						'body.dark #bbpress-forums p.bbp-topic-meta',
																																						'body.dark span.bbp-author-ip',
																																						'body.dark #buddypress .activity-list .activity-content .activity-header',
																																						'body.dark #buddypress .activity-list .activity-content .comment-header',
																																						'body.dark #buddypress div.activity-meta a:not(:hover)',
																																						'body.dark #buddypress a.activity-time-since:not(:hover)',
																																						'body.dark #buddypress .acomment-options a:not(:hover)',
																																						'body.dark #buddypress div.activity-comments div.acomment-meta'
																																						),
																																),
																										'secondary'		=>	array(
																																'hex'			=>	'77bb66',
																																'colors'		=>	array(
																																						'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover',
																																						'a',
																																						'.st-ul li.st-current, .st-ul li.st-current:hover',
																																						'.widget_display_stats dd',
																																						'.sidebar-footer .widget-info p a.mailto',
																																						),
																																'backgrounds'	=>	array(
																																						//'::selection',
																																						'input[type="button"]',
																																						'input[type="submit"], button',
																																						'#header-holder-2',
																																						'#search-form-header',
																																						'#search-form-header span',
																																						'#copyrights-holder',
																																						'.term-title h1:before',
																																						'a.button',
																																						'.toggle-closed .toggle-title span',
																																						'.pricing-table-featured .pricing-table-title',
																																						'.pricing-table-featured .pricing-table-price',
																																						'.pricing-table-featured .button',
																																						'.skill-bar',
																																						'.st-gallery ol li.st-gallery-tab-current',
																																						'.more-link',
																																						'#layout .mejs-time-loaded',
																																						'#sidebar .sidebar .widget_display_search',
																																						'#sidebar .widget_search',
																																						'.tagcloud a',
																																						'.widget_custom_menu > li > a:hover',
																																						'.widget_custom_menu > li.wHover',
																																						'#sidebar .widget-posts',
																																						'.widget-posts-icon:hover',
																																						'#buddypress div.item-list-tabs ul li.selected a',
																																						'#buddypress div.item-list-tabs ul li.current a',
																																						'#buddypress div#subnav.item-list-tabs ul li.selected a',
																																						'#buddypress div#subnav.item-list-tabs ul li.current a',
																																						'#buddypress input[type="submit"]',
																																						'#buddypress input[type="button"]',
																																						'#buddypress input[type="reset"]',
																																						'#buddypress input[type="submit"]:hover',
																																						'#buddypress input[type="button"]:hover',
																																						'#buddypress input[type="reset"]:hover'
																																						),
																																'border-top'	=>	array(
																																						'.st-ul li.st-current, .st-ul li.st-current:hover',
																																						'#buddypress div.item-list-tabs ul li.current a:after'
																																						),
																																'border-right'	=>	array(
																																						),
																																'border-bottom'	=>	array(
																																						'#menu',
																																						'#buddypress div#subnav',
																																						),
																																'border-left'	=>	array(
																																						),
																																),
																										),
																			'background-image'	=>	'',
																			'responsive'		=>	true,
																			),
														'custom'	=>	array(
																			'status'			=>	true,
																			),
														),
								'misc'			=>	array(
														'status'	=>	true,
														'general'	=>	array(
																			'status'		=>	true,
																			),
														'admin_bar'	=>	true,
														'hidpi'		=>	true,
														'redirect'	=>	true,
														'stickymenu'=>	true,
														'adsense'	=>	true,
														'sidebar-alt'=>	true,
														),
								'import'		=>	array(
														'status'	=>	false,
														),
								'update'		=>	array(
														'status'	=>	false,
														'general'	=>	array(
																			'status'		=>	true,
																			'source'		=>	'themeforest',
																			),
														),
								),
	); // $st_Options

?>