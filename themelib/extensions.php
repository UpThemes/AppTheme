<?php

/**
 * Extensions of WordPress functionality.
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2012, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.5
 */

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
function apptheme_no_posts(){
	
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
function apptheme_navigation_above(){ ?>
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
function apptheme_navigation_below(){ ?>
			<div class="navigation below clearfix">
				<div class="alignleft"><?php next_posts_link( '&laquo; Previous Posts' ) ?></div>
				<div class="alignright"><?php previous_posts_link( 'Next Posts &raquo;' ) ?></div>
			</div><!-- /.navigation -->      
<?php
}

/**
 * Filter the title output
 * 
 * Modifies the standard WordPress title to output
 * App-specific titles and app icons.
 *
 * 
 * @global	$post Globalizes the $post variable
 * @link	http://codex.wordpress.org/Function_Reference/the_title		Codex reference: the_title()
 * @link	http://codex.wordpress.org/Function_Reference/get_post_meta	Codex reference: get_post_meta()
 * 
 * @since	AppTheme 1.5
 */

function apptheme_filter_the_title( $title ){

	global $post;

	if( is_page() && get_post_meta( $post->ID, 'app-name', true ) ) :

   	$title = get_post_meta( $post->ID, 'app-name', true );

		if( get_post_meta( $post->ID, 'app-link', true ) )
			$link = get_post_meta( $post->ID, 'app-link', true );

      	$title .= "<a href=\"$link\"><span>";
      	
      if( get_post_meta( $post->ID, 'app-price', true ) ):
      	$title .= get_post_meta( $post->ID, 'app-price', true );
      endif;

			$title .= '</span></a>';

      if( get_post_meta($post->ID, 'app-icon', true) ):
	 			$title .= '<style type="text/css">';
	 			$title .= '.app-icon #title h1{ background-image: url("' . get_post_meta( $post->ID, 'app-icon', true ) . '"); }';
	 			$title .= '</style>';
 			endif;

	endif;
	
	return $title;

}

add_filter('apptheme_the_title','apptheme_filter_the_title');

/**
 * Return the page or post title
 * 
 * Modifies the standard WordPress title to output
 * App-specific titles and app icons.
 *
 * @return	string Page title
 * @link	http://codex.wordpress.org/Function_Reference/apply_filters		Codex reference: apply_filters()
 * 
 * @since	AppTheme 1.5
 */

function apptheme_get_the_title(){
	return apply_filters( 'apptheme_the_title', get_the_title() );
}

/**
 * Echo the page or post title
 * 
 * Modifies the standard WordPress title to output
 * App-specific titles and app icons.
 *
 * @return	string Page title
 * 
 * @since	AppTheme 1.5
 */
 
function apptheme_the_title(){
	echo apptheme_get_the_title();
}

/**
 * Filter the title class
 * 
 * Modifies the standard WordPress title to output
 * App-specific titles and app icons.
 *
 * @global	$post Globalizes the $post variable
 * 
 * @since	AppTheme 1.5
 */
 
function apptheme_icon_title_class( $classes ){

	global $post;

	if( get_post_meta($post->ID, 'app-icon', true) )
		$classes[] = "app-icon";
	else
		$classes[] = "no-app-icon";

	return $classes;

}

add_filter('body_class','apptheme_icon_title_class');