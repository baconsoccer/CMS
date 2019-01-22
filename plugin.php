<?php
/*
Plugin Name: CMS Plugin
Plugin URI: http://my-awesomeness-emporium.com
description: >-
CMS Plugin!
Version: 1.0
Author: Levi Kramer
Author URI:
Text Domain: test-portfolio
License: GPL2
*/

// Exit if accessed directly.
if( !defined( 'ABSPATH' ) ) exit;


function test_register_post_type() {
    $labels = array( 'name' => _x( 'Portfolio', 'Post type general name', 'test-portfolio' ), 'singular_name' => _x( 'Portfolio Item', 'Post type singular name', 'test-portfolio' ),
        'menu_name' => _x( 'Portfolio Items', 'Admin Menu text', 'test-portfolio' ),
        'name_admin_bar' => _x( 'Portfolio Items', 'Add New on Toolbar', 'test-portfolio' ),
    );

 $args = array(
     'labels'             => $labels,
     'public'             => true,
     'publicly_queryable' => true,
     'show_ui'            => true,
     'show_in_menu'       => true,
     'query_var'          => true,
     'rewrite'            => array( 'slug' => 'portfolio' ),
     'capability_type'    => 'post',
     'has_archive'        => true,
     'hierarchical'       => false,
     'menu_position'      => null,
     'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
     'menu_icon'			 => 'dashicons-screenoptions',
 );


register_post_type( 'test_portfolio', $args );

}
add_action( 'init', 'test_register_post_type' );


function portfolio_taxonomy() {

$labels = array(
    'name' => _x( 'Item Types', 'taxonomy general name', 'test-portfolio' ),
    'singular_name' => _x( 'Item Type', 'taxonomy singular name', 'test-portfolio' ),
);

$args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'item-type' ),
);

register_taxonomy( 'portfolio-type', 'test_portfolio', $args );
}

add_action( 'init', 'portfolio_taxonomy' );
?>