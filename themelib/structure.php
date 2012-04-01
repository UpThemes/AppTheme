<?php

/**
 * Sets up new post types, taxonomies, menus, etc.
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2012, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.5
 */

/**
 * Register 'app' post type
 * 
 * Creates the post type and labels for the 'app' post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type register_post_type()
 * @since 1.5
 *
 */
function apptheme_register_cpt_app() {

    $labels = array( 
        'name' => _x( 'Apps', 'app' ),
        'singular_name' => _x( 'App', 'app' ),
        'add_new' => _x( 'Add New', 'app' ),
        'add_new_item' => _x( 'Add New App', 'app' ),
        'edit_item' => _x( 'Edit App', 'app' ),
        'new_item' => _x( 'New App', 'app' ),
        'view_item' => _x( 'View App', 'app' ),
        'search_items' => _x( 'Search Apps', 'app' ),
        'not_found' => _x( 'No apps found', 'app' ),
        'not_found_in_trash' => _x( 'No apps found in Trash', 'app' ),
        'parent_item_colon' => _x( 'Parent App:', 'app' ),
        'menu_name' => _x( 'Apps', 'app' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'A post type for iPhone apps.',
        'supports' => array( 'title', 'editor', 'revisions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => get_template_directory_uri() . '/themelib/images/app_cpt_menu.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'app', $args );

}

add_action( 'init', 'apptheme_register_cpt_app' );

/**
 * Set up metabox UI for entering app metadata
 * 
 * Adds a UI for metaboxes to the app post type edit screen.
 *
 * @uses class WCK_CFC_Wordpress_Creation_Kit()
 * @since 1.5
 *
 */
function apptheme_setup_app_metaboxes(){

	$appdata = array( 
		array( 'type' => 'radio', 'title' => 'App Store Status', 'options' => array( 'Coming Soon', 'Currently Available' ) ),
		array( 'type' => 'text', 'title' => 'App Price' ), 
		array( 'type' => 'text', 'title' => 'App Store URL' ),
		array( 'type' => 'upload', 'title' => 'App Demo Video', 'description' => 'Requires a .mov file with a size of 230x346.' ), 
		array( 'type' => 'upload', 'title' => 'App Icon', 'description' => '(61x65) Upload or Select an image for the app icon.' ),
		array( 'type' => 'upload', 'title' => 'App Image #1', 'description' => 'This image will appear in the iPhone container.' ), 
		array( 'type' => 'textarea', 'title' => 'App Image #1 Caption' ), 
		array( 'type' => 'upload', 'title' => 'App Thumbnail #2', 'description' => '(86x86) Upload or Select an image for the second thumbnail for this app.' ), 
		array( 'type' => 'upload', 'title' => 'App Image #2', 'description' => 'Upload or Select an image for the second large image preview for this app.' ),
		array( 'type' => 'textarea', 'title' => 'App Image #2 Caption' ),
		array( 'type' => 'upload', 'title' => 'App Thumbnail #3', 'description' => '(86x86) Upload or Select an image for the third thumbnail for this app.' ), 
		array( 'type' => 'upload', 'title' => 'App Image #3', 'description' => 'Upload or Select an image for the second large image preview for this app.' ),
		array( 'type' => 'textarea', 'title' => 'App Image #3 Caption' )
	);

	$args = array(
		'metabox_id' => 'appinfo',
		'metabox_title' => 'App Information',
		'post_type' => 'app',
		'single' => true,
		'meta_name' => 'appinfo',
		'meta_array' => $appdata
	);

	new WCK_CFC_Wordpress_Creation_Kit( $args );
	
}

add_action('after_setup_theme','apptheme_setup_app_metaboxes');