<?php
/**
 * av4x4 functions and definitions
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since av4x4 1.0
 */


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since av4x4 1.0
 */

function av4x4_scripts() {
    // Add Genericons font, used in the main stylesheet.
    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array());
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array() );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array());
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array());
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array());
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array());
    wp_enqueue_style( 'main', get_template_directory_uri() . '/sass/main.css', array());


    wp_enqueue_script( 'jquery-2.1.4', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery.flexslider-min', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array(), '1.0.0', false );
    wp_enqueue_script( 'common-js', get_template_directory_uri() . '/js/common.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'av4x4_scripts' );

function random_feedback() {
    $feedback = get_posts(array(
        'post_type' => 'feedback',
        'orderby' => 'rand',
        'numberposts' => 1,
    ));
    $image_id = get_post_thumbnail_id($feedback[0]->ID);
    $image_url = wp_get_attachment_image_src($image_id,'full', true);
    $image_url_thumb = wp_get_attachment_image_src($image_id,'high', true);
    ?>
    <div class="client_feedback_section clearfix">
        <div class="feedback_wrapper">
            <div class="img_content">
                <img src="<?=$image_url_thumb[0]?>" alt="client image">
            </div>
            <div class="text_contnet">
                <p><?=$feedback[0]->post_content?></p>
                <span><?=$feedback[0]->post_title?></span>
            </div>

        </div>
    </div>
    <?php
}
add_shortcode('feedback', 'random_feedback');

function feedback()
{
    $labels = array(
        'name' => 'Feedback',
        'singular_name' => 'Feedback',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new feedback',
        'edit_item' => 'Edit Feedback',
        'new_item' => 'New Feedback',
        'view_item' => 'See Feedback',
        'search_items' => 'Search Feedback',
        'not_found' => 'No results',
        'not_found_in_trash' => 'No results',
        'parent_item_colon' => '',
        'menu_name' => 'Feedbacks'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor','thumbnail')
    );
    register_post_type('feedback', $args);
}
add_action('init', 'feedback');

function custom_reviews()
{
    $labels = array(
        'name' => 'Custom Reviews',
        'singular_name' => 'Custom Reviews',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new Custom Reviews',
        'edit_item' => 'Edit Custom Reviews',
        'new_item' => 'New Custom Reviews',
        'view_item' => 'See Custom Reviews',
        'search_items' => 'Search Custom Reviews',
        'not_found' => 'No results',
        'not_found_in_trash' => 'No results',
        'parent_item_colon' => '',
        'menu_name' => 'Custom Reviews'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','excerpt')
    );
    register_post_type('custom_reviews', $args);
}
add_action('init', 'custom_reviews');

function av4x4_team()
{
    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Team',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new Team member',
        'edit_item' => 'Edit Team member',
        'new_item' => 'New Team member',
        'view_item' => 'See Team member',
        'search_items' => 'Search Team members',
        'not_found' => 'No results',
        'not_found_in_trash' => 'No results',
        'parent_item_colon' => '',
        'menu_name' => 'Team'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail')
    );
    register_post_type('av4x4_team', $args);
}
add_action('init', 'av4x4_team');

function redirect($url){
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';
    echo $string;
}

function av4x4_theme_settings()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'av4x4_settings';
    if ($wpdb->get_var("show tables like '{$table_name}'") != $table_name) {
        $sql = 'CREATE TABLE `' . $table_name . '` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `settings` text NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

function av4x4_settings_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . "av4x4_settings";
    if(isset($_GET["button_text"])) {
        $settings = array(
            "slogan" => $_GET["slogan"],
            "phone" => $_GET["phone"],
            "button_text" => $_GET["button_text"],
            "button_link" => $_GET["button_link"],
            "fb" => $_GET["fb"],
            "inst" => $_GET["inst"],
            "youtube" => $_GET["youtube"],
            "map_lat" => $_GET["map_lat"],
            "map_long" => $_GET["map_long"],
        );
        $settings_json = json_encode($settings);
        $sql = "UPDATE `wp_av4x4_settings` SET `settings`='" . $settings_json . "' WHERE (`id`=1)";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        redirect("/wp-admin/admin.php?page=av4x4-settings");
    }
    $query = "SELECT * FROM {$table_name} LIMIT 1";
    $results = $wpdb->get_results( $query );
    $data = json_decode($results[0]->settings);
    include("admin-parts/av4x4-settings.php");
}

function av4x4_settings_menu()
{
    add_menu_page(
        'av4x4 settings',
        'av4x4 settings',
        'manage_options',
        'av4x4-settings',
        'av4x4_settings_page','dashicons-hammer'
    );
}


add_action('after_switch_theme', 'av4x4_theme_settings');
add_action('admin_menu', 'av4x4_settings_menu');


add_theme_support('post-thumbnails');