<?php 

/**
 * Initializes scripts/styles and registers menus, sidebars.
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2012, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.5
 */

/**
 * Theme initialization/setup function
 * 
 * Add Theme support for Custom Navigation Menus,
 * set $content_width global, load Theme textdomain.
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/_2										__()
 * @link 	http://codex.wordpress.org/Function_Reference/register_nav_menu			register_nav_menu()
 * @link 	http://codex.wordpress.org/Function_Reference/register_sidebar			register_sidebar()
 * @link 	http://codex.wordpress.org/Function_Reference/wp_enqueue_script 		wp_enqueue_script()
 *
 * @since AppTheme 1.0
 */
function apptheme_init(){

	/**
	 * Globalize $content_width
	 * 
	 * @global	int	$content_width	Width of post content area
	 */
	global $content_width;
	// Set default value for $content_width
	if ( ! isset( $content_width ) ) {
		$content_width = 450;
	}

	/**
	 * Register Theme locations for custom nav menus
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'apptheme' )
	) );
	
	/*
	 * Enable translation
	 * 
	 * Declare Theme textdomain and define
	 * location for translation files.
	 * 
	 * Translations can be added to the /languages
	 * directory.
	 *
	 * @since	AppTheme 1.5
	 */
	load_theme_textdomain( 'apptheme', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . '/languages/' . $locale . '.php';
	if ( is_readable( $locale_file ) ) {
		require_once( $locale_file );
	}
	
	/**
	 * Add support for feedlinks
	 */

	add_theme_support( 'automatic-feed-links' );

}
// Hook into 'after_setup_theme'
add_action( 'after_setup_theme', 'apptheme_init' );


/**
 * Register Dynamic Sidebars
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/_2					Codex reference: __()
 * @link 	http://codex.wordpress.org/Function_Reference/register_sidebar		Codex reference: register_sidebar()
 */
function apptheme_register_sidebars() {

	/**
	 * Register Homepage Left Bottom Dynamic Sidebar
	 */
	register_sidebar( array(
		'name'          => sprintf( __( 'Homepage Left Bottom' ), 'apptheme' ),
		'id'            => 'homepage-leftbottom',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	) );
	
	/**
	 * Register Homepage Right Bottom Dynamic Sidebar
	 */
	register_sidebar( array(
		'name'          => sprintf( __( 'Homepage Right Bottom' ), 'apptheme' ),
		'id'            => 'homepage-rightbottom',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	) );
}
// Hook into 'widgeets_init'
add_action( 'widgets_init', 'apptheme_register_sidebars' );

/**
 * Enqueue Theme custom scripts
 * 
 * Enqueues custom scripts used by the Theme
 * on the front end.
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/wp_enqueue_script 		wp_enqueue_script()
 * 
 * @since	AppTheme 1.5
 */
function apptheme_enqueue_scripts() {
	// Only enqueue scripts on the front end
	if ( ! is_admin() ) {
		// Enqueue core-bundled scripts
		wp_enqueue_script( 'jquery' );
		// Enqueue Theme-bundled scripts
		$ap_script_path = get_template_directory_uri() . '/js/';
		wp_enqueue_script( 
			'jquery-embedquicktime', 
			$ap_script_path . 'jquery.embedquicktime.js', 
			array( 'jquery' ) 
		);
		wp_enqueue_script( 
			'view-js', 
			$ap_script_path . 'view.js', 
			array( 'jquery' )
		);
		wp_enqueue_script( 
			'jquery-easing', 
			$ap_script_path . 'jquery.easing.1.3.js', 
			array( 'jquery' ) 
		);
		wp_enqueue_script( 
			'apptheme', 
			$ap_script_path . 'apptheme.js', 
			array( 'jquery-embedquicktime' ) 
		);
		// Enqueue the comment-reply script on 
		// single blog post pages with comments 
		// open and threaded comments
		if ( 
			// WordPress conditional the returns true if
			// the current page is a Single Blog Post, 
			// Static Page, or Attachment page
			is_singular() 
			// WordPress conditional that returns true if
			// comments are open for the current post
		 && comments_open() 
			// Returns the value for the specified option.
			// 'thread_comments' is a Boolean option where
			// comments are threaded if TRUE, and flat if 
			// FALSE
			 && get_option( 'thread_comments' ) 
		) { 
			// enqueue the javascript that performs 
			//in-link comment reply fanciness
			wp_enqueue_script( 'comment-reply' ); 
		}
		
	}
}
// Hook into 'wp_enqueue_scripts'
add_action( 'wp_enqueue_scripts', 'apptheme_enqueue_scripts' );


/**
 * Enqueue Theme custom stylesheets
 * 
 * Enqueues custom stylesheets used by the Theme
 * on the front end.
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/wp_enqueue_style 		wp_enqueue_style()
 * 
 * @since	AppTheme 1.5
 * 
 * @todo	When {@link http://core.trac.wordpress.org/ticket/16024 this ticket} gets closed, add conditionals and enqueue currently hard-coded IE scripts
 */
function apptheme_enqueue_styles() {
	// Define stylesheet path
	$ap_css_path = get_template_directory_uri( '/' );
	// Enqueue print stylesheet
	wp_enqueue_style(
		'ap-print',
		$ap_css_path . '/print.css',
		array(),
		false,
		'print'
	);
}
// Hook into 'wp_enqueue_scripts'
add_action( 'wp_enqueue_scripts', 'apptheme_enqueue_styles' );

/**
 * Add layout CSS class to the HTML body tag
 * 
 * Filter Hook: body_class
 * 
 * Filter 'body_class' to include
 * class for page layout.
 * 
 * @since	AppTheme 1.5
 * @uses	upfw_get_options()
 */
function apptheme_filter_body_class( $classes ) {	

	$up_options = upfw_get_options();

	if( 'right' == $up_options->mirror ) {
		$classes[] = 'mirror';
	}
	return $classes;
}
// Hook custom classes into 'body_class'
add_filter( 'body_class', 'apptheme_filter_body_class' );
