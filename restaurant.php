<?php
   /*
   Plugin Name: Restaurant Post Type
   Plugin URI: https://github.com/happyboredom/wpplugins
   Description: Restauarnat custom post type 
   Version: 1.0
   Author: InfoEntropy 
   Author URI: http://infoentropy.com
   License: GPL2
   */

function my_custom_post_restaurant() {
    $labels = array(
        'name'               => _x( 'Restaurants', 'post type general name' ),
        'singular_name'      => _x( 'Restaurant', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'restaurant' ),
        'add_new_item'       => __( 'Add New Restaurant' ),
        'edit_item'          => __( 'Edit Restaurant' ),
        'new_item'           => __( 'New Restaurant' ),
        'all_items'          => __( 'All Restaurants' ),
        'view_item'          => __( 'View Restaurant' ),
        'search_items'       => __( 'Search Restaurants' ),
        'not_found'          => __( 'No restaurants found' ),
        'not_found_in_trash' => __( 'No restaurants found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Restaurants'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our restaurants and specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'   => true,
    );
    register_post_type( 'restaurant', $args ); 
}

add_action( 'init', 'my_custom_post_restaurant' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to restaurant 
    register_taxonomy('location', 'restaurant', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Locations', 'taxonomy general name' ),
            'singular_name' => _x( 'Location', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Locations' ),
            'all_items' => __( 'All Locations' ),
            'parent_item' => __( 'Parent Location' ),
            'parent_item_colon' => __( 'Parent Location:' ),
            'edit_item' => __( 'Edit Location' ),
            'update_item' => __( 'Update Location' ),
            'add_new_item' => __( 'Add New Location' ),
            'new_item_name' => __( 'New Location Name' ),
            'menu_name' => __( 'Locations' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'locations', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );
?>
