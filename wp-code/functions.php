<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function my_lightbox() {
wp_enqueue_script( 'lightboxjs', get_stylesheet_directory_uri() . '/js/lightbox.js');
}
add_action( 'wp_enqueue_scripts', 'my_lightbox' );

function my_new_script() {
wp_enqueue_script( 'contentjs', get_stylesheet_directory_uri() . '/js/content.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'my_new_script' );

//add bootstrap style sheet to theme
function wpbootstrap_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'wpbootstrap_enqueue_styles');

function my_leaflet_head_style () {
    wp_register_style('leaflet_head_style','https://unpkg.com/leaflet@1.7.1/dist/leaflet.css',null,null);
    wp_enqueue_style('leaflet_head_style');
}
add_action('wp_enqueue_scripts','my_leaflet_head_style');

function my_leaflet_tile () {
    wp_enqueue_script('tilejs',get_stylesheet_directory_uri() . '/js/tile.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts','my_leaflet_tile');

function my_leaflet_head_script () {
    wp_register_script('leaflet_head','https://unpkg.com/leaflet@1.7.1/dist/leaflet.js',null,null,true);
    wp_enqueue_script('leaflet_head');
}
add_action('wp_enqueue_scripts','my_leaflet_head_script');





