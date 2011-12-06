<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom Widgets, custom hooks, and Theme settings.
 *
 * For more information on hooks, actions, and filters, 
 * see {@link http://codex.wordpress.org/Plugin_API Plugin API}.
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */

/**
 * Bootstrap the UpThemes Framework
 */
require_once( 'admin/admin.php' );

/**
 * Theme initialization/setup function
 * 
 * Add Theme support for Custom Navigation Menus,
 * set $content_width global, load Theme textdomain.
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/_2						__()
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
			'jquery-fancybox', 
			$ap_script_path . 'jquery.fancybox.js', 
			array( 'jquery' ) 
		);
		wp_enqueue_script( 
			'jquery-easing', 
			$ap_script_path . 'jquery.easing.1.3.js', 
			array( 'jquery' ) 
		);
		wp_enqueue_script( 
			'apptheme-embedquicktime', 
			$ap_script_path . 'apptheme.embedquicktime.js', 
			array( 'jquery-embedquicktime', 'jquery-fancybox', 'jquery-easing' ) 
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
	// Enqueue IE stylesheet
	wp_enqueue_style(
		'ap-ie',
		$ap_css_path . '/css/main-IE6.css'
	);
	// Add IE conditionals
	global $wp_styles;
	$wp_styles->add_data( 'ap-ie', 'conditional', 'IE 6' );
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
 */
function apptheme_filter_body_class( $classes ) {	
	/**
	 * Globalize $up_options
	 * 
	 * @global	array	$up_options	Theme options
	 */
	global $up_options;
	if( isset( $up_options->mirror ) && true == $up_options->mirror ) {
		$classes[] = 'mirror';
	}
	return $classes;
}
// Hook custom classes into 'body_class'
add_filter( 'body_class', 'apptheme_filter_body_class' );


/**
 * Output Post Content/Excerpt
 * 
 * Contextually outputs post content or excerpt. On
 * search results or category archive index pages, 
 * outputs the post excerpt; otherwise, outputs post
 * content.
 * 
 * Template file: N/A
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/_2					Codex reference: __()
 * @link	http://codex.wordpress.org/Function_Reference/is_category			Codex reference: is_category()
 * @link	http://codex.wordpress.org/Function_Reference/is_search				Codex reference: is_search()
 * @link	http://codex.wordpress.org/Function_Reference/the_content			Codex reference: the_content()
 * @link	http://codex.wordpress.org/Function_Reference/the_excerpt			Codex reference: the_excerpt()
 * 
 * @since	AppTheme 1.0
 */
function the_ap_content(){
	/**
	 * Globalize $post
	 * 
	 * @global	object	$post	Post object
	 */
	global $post;	
	?>
  <div class="content-wrapper">
		<?php 
		if ( is_search() || is_category() ) { 
			// If the current page is a
			// search results or category
			// archive index page, output
			// the post excerpt
			the_excerpt(); 
		} else { 
			// Otherwise, output the post
			// content
			the_content( __( 'Continue reading', 'apptheme' ) . ' &raquo;' ); 
		}
		?>
  </div>					

<?php 

}


/**
 * Output No Post content
 * 
 * Outputs content to display when the current
 * query returns no posts. 
 * 
 * Template files: index.php, search.php, single.php, page.php
 * 
 * @link 	http://codex.wordpress.org/Function_Reference/_e					Codex reference: _e()
 * @link	http://codex.wordpress.org/Function_Reference/get_search_form		Codex reference: get_search_form()
 * @link	http://codex.wordpress.org/Function_Reference/is_category			Codex reference: is_category()
 * @link	http://codex.wordpress.org/Function_Reference/is_search				Codex reference: is_search()
 * @link	http://codex.wordpress.org/Function_Reference/the_content			Codex reference: the_content()
 * @link	http://codex.wordpress.org/Function_Reference/the_excerpt			Codex reference: the_excerpt()
 * 
 * @since	AppTheme 1.0
 */
function no_posts(){
	
	/**
	 * Globalize $wp_query, $post
	 * 
	 * @todo	Why are we globalizing these, just to output static strings?
	 * 
	 * @global	object	$wp_query	Query object
	 * @global	object	$post		Post object
	 */
	global $wp_query, $post;
?>
	
  <h1><?php _e( 'Not Found', 'apptheme' ); ?></h1>
  <p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'apptheme' ); ?></p>
  <?php get_search_form(); ?>

<?php
}


/**
 * Output Navigation menu fallback
 * 
 * Outputs a message if either no custom navigation
 * menu is applied to the current Theme location, or
 * if the wp_nav_menu() function does not exist (i.e.
 * if the current version of WordPress is < 3.0). 
 * 
 * Template files: header.php
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/_2		__()
 * 
 * @since	AppTheme 1.0
 */
function apptheme_pagemenu(){

	echo '<div id="navigation">' . __( 'Please configure your menu in the admin panel: Appearance > Menus', 'apptheme' ) . '</div>';

}


/**
 * Output Above-Loop Navigation
 * 
 * Outputs previous/next post links above the
 * Loop output. 
 * 
 * Template files: index.php, search.php
 * 
 * @link	http://codex.wordpress.org/Function_Reference/next_posts_link		Codex reference: next_posts_link()
 * @link	http://codex.wordpress.org/Function_Reference/previous_posts_link	Codex reference: previous_posts_link()
 * 
 * @since	AppTheme 1.0
 */
function navigation_above(){ 
	
	/**
	 * Globalize $wp_query, $post
	 * 
	 * @todo	Why are we globalizing these, just to output static strings?
	 * 
	 * @global	object	$wp_query	Query object
	 * @global	object	$post		Post object
	 */
	global $wp_query, $post;	
?>
			<div class="navigation above clearfix">
				<div class="alignleft"><?php next_posts_link( '&laquo; Previous Posts' ) ?></div>
				<div class="alignright"><?php previous_posts_link( 'Next Posts &raquo;' ) ?></div>
			</div><!-- /.navigation -->      
<?php
}


/**
 * Output Below-Loop Navigation
 * 
 * Outputs previous/next post links below the
 * Loop output. 
 * 
 * Template files: index.php, search.php
 * 
 * @link	http://codex.wordpress.org/Function_Reference/next_posts_link		Codex reference: next_posts_link()
 * @link	http://codex.wordpress.org/Function_Reference/previous_posts_link	Codex reference: previous_posts_link()
 * 
 * @since	AppTheme 1.0
 */
function navigation_below(){ 
	
	/**
	 * Globalize $wp_query, $post
	 * 
	 * @todo	Why are we globalizing these, just to output static strings?
	 * 
	 * @global	object	$wp_query	Query object
	 * @global	object	$post		Post object
	 */
	global $wp_query, $post;	
?>
			<div class="navigation below clearfix">
				<div class="alignleft"><?php next_posts_link( '&laquo; Previous Posts' ) ?></div>
				<div class="alignright"><?php previous_posts_link( 'Next Posts &raquo;' ) ?></div>
			</div><!-- /.navigation -->      
<?php
}


/**
 * Output User-Defined Footer Text
 * 
 * Outputs footer text as defined by the user
 * in the Theme Options. 
 * 
 * Template files: N/A
 * 
 * @since	AppTheme 1.0
 */
function theme_footer() {
	
	/**
	 * Globalize $up_options
	 * 
	 * @todo	Why aren't we using this in footer.php?
	 * 
	 * @global	array	$up_options	Theme options
	 */
	global $up_options;
	echo $up_options->footer_text;	
}

/**
 * Output custom comments list for pings
 * 
 * Callback: wp_list_comments() Pings
 * 
 * wp_list_comments() Callback function for 
 * Pings (Trackbacks/Pingbacks)
 * 
 * Template files: comments.php
 * 
 * @link	http://codex.wordpress.org/Function_Reference/comment_author_link	Codex reference: comment_author_link()
 * @link	http://codex.wordpress.org/Function_Reference/comment_class			Codex reference: comment_class()
 * @link	http://codex.wordpress.org/Function_Reference/comment_ID			Codex reference: comment_ID()
 * 
 * @since	AppTheme 1.0
 */
function apptheme_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}