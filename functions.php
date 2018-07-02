<?php

function LittletonVogel_resources() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'LittletonVogel_resources');

// Get Top Ancestor
function get_top_ancestor_id() {

    global $post;

    if ($post->post_parent) {
        $ancestors = array_reverse( get_post_ancestors($post->ID) );
        return $ancestors[0];
    }

    return $post->ID;
}

// Does Page Have Children?
function has_children() {

    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);

}

// Theme Setup
function LearnWebCode_setup() {

    // Navigation Menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu' ),
        'footer' => __( 'Footer Menu' ),
    ));

    // Add Featured Image Support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));
}

add_action('after_setup_theme', 'LearnWebCode_setup');

// jpeg compression setting
function custom_jpeg_quality( $quality ) {
    return 95;
}

add_filter( 'jpeg_quality', 'custom_jpeg_quality' );