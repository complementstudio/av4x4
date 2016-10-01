<?php
/**
 * av4x4 functions and definitions
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
add_theme_support( 'menus' );
function av4x4_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

}
add_action( 'after_setup_theme', 'av4x4_setup' );

function av4x4_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'twentyfifteen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'av4x4_widgets_init' );

function footer_social() {
    global $wpdb;
    $table_name = $wpdb->prefix . "av4x4_settings";
    $query = "SELECT * FROM {$table_name} LIMIT 1";
    $results = $wpdb->get_results( $query );
    $data = json_decode($results[0]->settings);
?>
    <div class="last_block">
        <ul class="list-unstyled list-inline social_icons_btn">
            <li> Connect with AV4x4</li>
            <li><a href="<?=$data->fb?>"><i class="ion-social-facebook"></i> </a></li>
            <li><a href="<?=$data->inst?>" ><i class="ion-social-instagram"></i> </a></li>
            <li><a href="<?=$data->youtube?>"><i class="ion-social-youtube"></i> </a></li>
        </ul>
    </div>
<?php
}
add_shortcode('contact_social', 'footer_social');

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

function footer_menu_1() {

    $max_count = 24;
    $our_posts = get_posts(array(
        'post_type' => 'services',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'posts_per_page' => $max_count,
        'cat' =>  3,
    ));

    $our_main_serv_count = count($our_posts);
    if($our_main_serv_count <= $max_count) {
        $show_other_count = $max_count - $our_main_serv_count;
        $other_posts = get_posts(array(
            'post_type' => 'services',
            'category__not_in' =>  3,
            'posts_per_page' => $show_other_count,
        ));
        $services = array_merge($our_posts,$other_posts);
    }

    foreach($services as $service) {
        $searchedValue = $menu->id;
        $menu_title = !empty($menu->post_title) ? $menu->post_title : $menu->n_title;
        $sub_menus = array_filter(
            $menus,
            function ($e) use (&$searchedValue) {
                return $e->menu_parent == $searchedValue;
            }
        );
        ?>
        <div  class="first_block">
            <a href="<?=$menu->n_name?>" class="menu_title"><?=$menu_title?></a>
            <?php if(!empty($sub_menus)) : ?>
                <ul class="list-unstyled footer_menu">
                    <?php foreach($sub_menus as $sub_menu) : ?>
                        <?php
                        $menu_title = !empty($sub_menu->post_title) ? $sub_menu->post_title : $sub_menu->n_title;
                        ?>
                        <li><a href="<?=$sub_menu->n_name?>"><?=$menu_title?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php
    }

}
add_shortcode('footer_menu_1', 'footer_menu_1');
function footer_menu_2($attr) {
    global $wpdb;
    $name = $attr["name"];
    $query = "SELECT
                    *
                FROM
                    (
                        SELECT
                            d.*, e. NAME,
                            e.slug
                        FROM
                            (
                                SELECT
                                    p.id,
                                    txr.term_taxonomy_id,
                                    p.post_title,
                                    p.post_name,
                                    p.menu_order,
                                    n.post_name AS n_name,
                                    n.post_title AS n_title,
                                    pp.meta_value AS menu_parent,
                                    pt.meta_value AS type
                                FROM
                                    wp_term_relationships AS txr
                                INNER JOIN wp_posts AS p ON txr.object_id = p.ID
                                LEFT JOIN wp_postmeta AS m ON p.ID = m.post_id
                                LEFT JOIN wp_postmeta AS pl ON p.ID = pl.post_id
                                AND pl.meta_key = '_menu_item_object_id'
                                LEFT JOIN wp_postmeta AS pp ON p.ID = pp.post_id
                                AND pp.meta_key = '_menu_item_menu_item_parent'
                                LEFT JOIN wp_postmeta AS pt ON p.ID = pt.post_id
                                AND pt.meta_key = '_menu_item_object'
                                LEFT JOIN wp_posts AS n ON pl.meta_value = n.ID
                                WHERE
                                    p.post_status = 'publish'
                                AND p.post_type = 'nav_menu_item'
                                AND m.meta_key = '_menu_item_url'
                                ORDER BY
                                    pp.meta_value
                            ) d
                        LEFT JOIN wp_terms AS e ON d.term_taxonomy_id = e.term_id
                    ) i
                WHERE
                    i.slug = '{$name}'";
    $menus = $wpdb->get_results( $query );
    foreach($menus as $key=>$menu) {
        if($menu->menu_parent != 0) {
            return;
        }
        $searchedValue = $menu->id;
        $menu_title = !empty($menu->post_title) ? $menu->post_title : $menu->n_title;
        $sub_menus = array_filter(
            $menus,
            function ($e) use (&$searchedValue) {
                return $e->menu_parent == $searchedValue;
            }
        );
        ?>
        <a href="<?=$menu->n_name?>" class="menu_title"><?=$menu_title?></a>
        <?php if(!empty($sub_menus)) : ?>
            <ul class="list-unstyled footer_menu">
                <?php foreach($sub_menus as $sub_menu) : ?>
                    <?php
                    $menu_title = !empty($sub_menu->post_title) ? $sub_menu->post_title : $sub_menu->n_title;
                    ?>
                    <li><a href="<?=$sub_menu->n_name?>"><?=$menu_title?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php
    }

}
add_shortcode('footer_menu_2', 'footer_menu_2');

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

function av4x4_global_views()
{
    $labels = array(
        'name' => 'Global views',
        'singular_name' => 'Global views',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new Global views',
        'edit_item' => 'Edit Global views',
        'new_item' => 'New Global views',
        'view_item' => 'See Global views',
        'search_items' => 'Search Global views',
        'not_found' => 'No results',
        'not_found_in_trash' => 'No results',
        'parent_item_colon' => '',
        'menu_name' => 'Global views'

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
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type('av4x4_global_views', $args);
}
add_action('init', 'av4x4_global_views');

function new_submenu_class($menu) {
    $menu = preg_replace('/ class="sub-menu"/','/ class="list-unstyled menu_dropdown" /',$menu);
    $menu = preg_replace('/ class="sub-menu"/','/ class="list-unstyled menu_dropdown" /',$menu);
    return $menu;
}

add_filter('wp_nav_menu','new_submenu_class');

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

