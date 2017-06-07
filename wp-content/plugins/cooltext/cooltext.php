<?php
/*
Plugin Name: CoolText
Plugin URI: http://www.megalocode.com/cooltext-wordpress/
Description: CoolText Wordpress Plugin allows you to add incredible text animations to your website
Author: Thomas Dolso
Version: 1.2.0
Author URI: http://www.megalocode.com/
Tags: text effects, text animations, text rotation
License: CodeCanyon
License URI: http://codecanyon.net/licenses/regular
License URI: http://codecanyon.net/licenses/extended
*/



global $wpdb, $wp_version;
define("WP_COOLTEXT_TABLE", $wpdb->prefix . "cooltext_plugin");
define('WP_COOLTEXT_SITE', 'http://www.megalocode.com/cooltext-wordpress');
define('WP_COOLTEXT_HELP', 'http://www.megalocode.com/cooltext-wordpress/docs');

if ( ! defined( 'WP_CoolText_BASENAME' ) )
	define( 'WP_CoolText_BASENAME', plugin_basename( __FILE__ ) );
	
if ( ! defined( 'WP_CoolText_PLUGIN_NAME' ) )
	define( 'WP_CoolText_PLUGIN_NAME', trim( dirname( WP_CoolText_BASENAME ), '/' ) );
	
if ( ! defined( 'WP_CoolText_PLUGIN_URL' ) )
	define( 'WP_CoolText_PLUGIN_URL', WP_PLUGIN_URL . '/' . WP_CoolText_PLUGIN_NAME );

if ( ! defined( 'WP_CoolText_ADMIN_URL' ) )
	define( 'WP_CoolText_ADMIN_URL', get_option('siteurl') . '/wp-admin/options-general.php?page=cooltext-admin' );



function cooltextInstall() 
{
	global $wpdb;
	if($wpdb->get_var("show tables like '". WP_COOLTEXT_TABLE . "'") != WP_COOLTEXT_TABLE) 
	{
		$sql = "CREATE TABLE " . WP_COOLTEXT_TABLE . " (
		  id_cool mediumint(9) NOT NULL AUTO_INCREMENT,
		  selector TEXT NOT NULL,
		  replacement TEXT NOT NULL,
		  PRIMARY KEY (`id_cool`)
		);";
		$wpdb->query($sql);
	}
}



function cooltextAdminOptions() 
{
	global $wpdb;
	$current_page = isset($_GET['ac']) ? $_GET['ac'] : '';
	switch($current_page)
	{
		case 'edit':
			include('cooltext_edit.php');
			break;
		case 'add':
			include('cooltext_add.php');
			break;
		default:
			include('cooltext_list.php');
			break;
	}
}



function cooltextAddToMenu() 
{
	add_options_page(
		'CoolText',
		'CoolText',
		'manage_options',
		'cooltext-admin',
		'cooltextAdminOptions'
	);
}

if (is_admin()) 
{
	add_action('admin_menu', 'cooltextAddToMenu');
}



function cooltextGetBehaviors() 
{
	global $wpdb;
	
	$sSql = "select * from " . WP_COOLTEXT_TABLE;
	$data = $wpdb->get_results($sSql);
	if (!empty($data))
	{
//		ob_clean();
		echo "<script>";
		echo 'var cooltext_replacements = [];';
		foreach ($data as $row) 
		{
			$rep = str_replace(" ", "", stripslashes($row->replacement));
			$rep = str_replace("=\"", ":|", stripslashes($rep));
			$rep = str_replace("\"", "\",", stripslashes($rep));
			$rep = str_replace("|", "\"", stripslashes($rep));
			$rep = substr($rep, 0, strlen($rep)-1);

			echo 'cooltext_replacements.push({';
			echo '"selector":"' . $row->selector . '",';
			echo $rep;
			echo '});';
		}
		echo "</script>";
	}
//	die;
}

add_action ( 'wp_head', 'cooltextGetBehaviors');




function cooltextShortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		"sequence" => '',
		"separator" => '',
		"mouseover" => '',
		"mouseout" => '',
		"click" => '',
		"visible" => '',
		"settings" => ''
	), $atts));

	$ret_str = '<div class="cooltext" style="display:inline-block" ';
	if ($sequence != "")
		$ret_str .= 'data-sequence="' . $sequence . '" ';
	if ($separator != "")
		$ret_str .= 'data-separator="' . $separator . '" ';
	if ($mouseover != "")
		$ret_str .= 'data-mouseover="' . $mouseover . '" ';
	if ($mouseout != "")
		$ret_str .= 'data-mouseout="' . $mouseout . '" ';
	if ($click != "")
		$ret_str .= 'data-click="' . $click . '" ';
	if ($visible != "")
		$ret_str .= 'data-visible="' . $visible . '" ';
	if ($settings != "")
		$ret_str .= 'data-settings="' . $settings . '" ';
	$ret_str .= '>' . $content . '</div>';

	return $ret_str;
}

add_shortcode("cooltext", "cooltextShortcode");



function cooltextAddJs() 
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('tweenmax', WP_CoolText_PLUGIN_URL.'/js/TweenMax.min.js');
	wp_enqueue_script('cooltext_animations', WP_CoolText_PLUGIN_URL.'/js/cooltext.wp.animations.js');
	wp_enqueue_script('cooltext', WP_CoolText_PLUGIN_URL.'/js/cooltext.wp.js');
}



function cooltextDeactivation() 
{
}


// LayerSlider/RevolutionSlider Compatibility Fix
// The 99999 is to ensure that TweenMax is included after TweenLite used by LayerSlider or RevolutionSlider
add_action('wp_enqueue_scripts', 'cooltextAddJs', 99999);


register_activation_hook(__FILE__, 'cooltextInstall');
register_deactivation_hook(__FILE__, 'cooltextDeactivation');


?>