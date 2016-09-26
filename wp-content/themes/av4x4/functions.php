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
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array());
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array());
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array());
    wp_enqueue_style( 'main', get_template_directory_uri() . '/sass/main.css', array());


    wp_enqueue_script( 'jquery-2.1.4', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'common-js', get_template_directory_uri() . '/js/common.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'av4x4_scripts' );

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
    register_post_type('concert', $args);
}
add_action('init', 'feedback');


add_theme_support('post-thumbnails');