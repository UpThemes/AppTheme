<?php

/**
 * Featured App template file
 *
 * This file is the front page template file, used on the site front page, per
 * the {@link http://codex.wordpress.org/Template_Hierarchy Template Hierarchy}.
 * 
 * @link		http://codex.wordpress.org/Function_Reference/_e		 			_e()
 * @link		http://codex.wordpress.org/Function_Reference/get_header 			get_header()
 * @link 		http://codex.wordpress.org/Function_Reference/get_footer 			get_footer()
 * @link 		http://codex.wordpress.org/Function_Reference/get_sidebar			get_sidebar()
 * @link 		http://codex.wordpress.org/Function_Reference/get_template_directory_uri	get_template_directory_uri()
 *
 * @package 	AppTheme
 * @copyright	Copyright (c) 2011, UpThemes
 * @license		license.txt GNU General Public License, v3
 * @since 		App Theme 1.4
 */ 

/**
 * Include the header template part file
 * 
 * MUST come first. 
 * Calls the header PHP file. 
 * Used in all primary template pages
 * 
 * @see {@link: http://codex.wordpress.org/Function_Reference/get_header get_header}
 * 
 * Child Themes can replace this template part file globally, via "header.php", or in
 * a specific context only, via "header-front-page.php"
 */
get_header();

$up_options = upfw_get_options();

?>

<div id="content">	
	<div class="row">
		<?php the_post(); ?>
		<div class="column six">
			<?php the_content(); ?>
		</div>
	</div><!-- .row -->
	<div class="row">
		<?php $appinfo = get_post_meta($post->ID,'appinfo',true); ?>
		<div class="column oneandahalf">
			<p><a href="<?php echo $appinfo[0]['app-image-2']; ?>" class="view" rel="group2" title="<?php echo $appinfo[0]['app-image-2-caption']; ?>"><img src="<?php echo $appinfo[0]['app-thumbnail-2']; ?>" alt="" /><span class="img"><?php _e('open image','apptheme'); ?></span></a></p>
		</div><!-- .column.oneandahalf -->
		<div class="column oneandahalf">
			<p><a href="<?php echo $appinfo[0]['app-image-3']; ?>" class="view" rel="group2" title="<?php echo $appinfo[0]['app-image-3-caption']; ?>"><img src="<?php echo $appinfo[0]['app-thumbnail-3']; ?>" alt="" /><span class="img"><?php _e('open image','apptheme'); ?></span></a></p>
		</div><!-- .column.oneandahalf -->
		<div class="column three">
			<?php if($appinfo[0]['app-store-status'] != 'Coming Soon' && $appinfo[0]['app-store-url']){ ?>
				<p><a href="<?php echo $appinfo[0]['app-store-url']; ?>" class="appstore"><?php _e( 'Available in the app store', 'apptheme' ); ?></a></p>
			<?php } else { ?>
				<p><a class="appstore-soon"><?php _e( 'Soon available in the App Store', 'apptheme' ); ?></a></p>
			<?php } ?>
		</div><!-- .column.three -->
	</div><!-- .row -->
</div><!-- #content -->   
        
<?php 
/**
 * Include the footer template part file
 * 
 * MUST come last. 
 * Calls the footer PHP file. 
 * Used in all primary template pages
 * 
 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/get_footer get_footer}
 * 
 * Child Themes can replace this template part file globally, via "footer.php", or in
 * a specific context only, via "footer-front-page.php"
 */
get_footer(); 
?>