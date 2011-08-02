<?php

// Add UpThemes Framework
require_once('admin/admin.php');

function apptheme_init(){

	wp_enqueue_script('jquery');

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','apptheme' )
	) );

	register_sidebar( array(
			'name'          => sprintf(__('Homepage Left Bottom'), $i ),
			'id'            => 'homepage-leftbottom',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>' ));
	
	register_sidebar( array(
			'name'          => sprintf(__('Homepage Right Bottom'), $i ),
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

?>