<?php

// Add UpThemes Framework
require_once('admin/admin.php');

function apptheme_init(){

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 450;
	}

	wp_enqueue_script('jquery');

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','apptheme' )
	) );

	register_sidebar( array(
			'name'          => sprintf(__('Homepage Left Bottom'), 'apptheme' ),
			'id'            => 'homepage-leftbottom',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>' ));
	
	register_sidebar( array(
			'name'          => sprintf(__('Homepage Right Bottom'), 'apptheme' ),
			'id'            => 'homepage-rightbottom',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>' ));

}

add_action('after_setup_theme','apptheme_init');

function the_ap_content(){
	
	global $post;
	
?>
  <div class="content-wrapper">
		<?php if(is_search() || is_category()){ ?>
      <?php echo the_excerpt(); ?>
    <?php }else{ ?>
      <?php echo the_content(__('Continue reading') . ' &raquo;'); ?>
    <?php } ?>
  </div>					

<?php 

}

function no_posts(){
	
	global $wp_query, $post;

?>
	
  <h1><?php _e('Not Found'); ?></h1>
  <p><?php _e('Sorry, but you are looking for something that isn\'t here.'); ?></p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php
}

function apptheme_pagemenu(){

	echo "<div id=\"navigation\">" . __("Please configure your menu in the admin panel: Appearance > Menus") . "</div>";

}

function navigation_above(){ 

	global $wp_query, $post;
	
?>

			<div class="navigation above clearfix">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Posts &raquo;') ?></div>
			</div><!-- /.navigation -->
      
<?php
}

function navigation_below(){ 

	global $wp_query, $post;
	
?>

			<div class="navigation below clearfix">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Posts &raquo;') ?></div>
			</div><!-- /.navigation -->
      
<?php
}

function theme_footer() {

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
 * Template file: comments.php
 * 
 * @link	http://codex.wordpress.org/Function_Reference/comment_author_link	Codex reference: comment_author_link()
 * @link	http://codex.wordpress.org/Function_Reference/comment_class	Codex reference: comment_class()
 * @link	http://codex.wordpress.org/Function_Reference/comment_ID	Codex reference: comment_ID()
 * 
 * @since	Micro 1.0
 */
function apptheme_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

?>