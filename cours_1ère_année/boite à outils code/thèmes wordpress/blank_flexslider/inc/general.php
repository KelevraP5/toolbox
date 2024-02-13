<?php

/**
 * blank functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blank
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

function blank_setup() {
    load_theme_textdomain( 'blank', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'blank' ),
        )
    );

}
add_action( 'after_setup_theme', 'blank_setup' );


function blank_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'blank_content_width', 640 );
}
add_action( 'after_setup_theme', 'blank_content_width', 0 );

function blank_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'blank' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'blank' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'blank_widgets_init' );


function blank_scripts() {

    if (is_page_template('template-home.php')){
        wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/asset/flexslider/flexslider.css', array(), _S_VERSION);
    }

    wp_deregister_script('jquery');

    if (is_page_template('template-home.php')){
        wp_enqueue_script('jquery','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js',array(), _S_VERSION, true);
        wp_enqueue_script('flexslider-js', get_template_directory_uri().'/asset/flexslider/jquery.flexslider-min.js', array(), _S_VERSION, true);
        wp_enqueue_script('home-js', get_template_directory_uri() . '/asset/js/home.js', array(), _S_VERSION, true);
    }
    wp_enqueue_style( 'blank-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'blank_scripts' );
