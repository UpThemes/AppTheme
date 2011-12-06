<?php
/**
 * Front Page template file
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
 * Globalize $up_options
 * 
 * @global	array	$up_options		Theme Options
 */
global $up_options;

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
get_header( 'front-page' );
?>

<div id="content">	
	<div class="row">
		<div class="column six">
			<?php if($up_options->short_descr){ ?><p><?php echo $up_options->short_descr; ?></p><?php } ?>
			<?php if($up_options->addl_descr){ ?><p><?php echo $up_options->addl_descr; ?></p><?php } ?>
		</div>
	</div><!-- .row -->
	<div class="row">
		<div class="column oneandahalf">
			<p><a href="<?php if($up_options->screenshot_1) {echo $up_options->screenshot_1;} else { echo get_template_directory_uri() . "/uploads/screenshot-1.png"; } ?>" class="link" rel="group2" title="<?php echo $up_options->screenshot_1_caption; ?>"><img src="<?php if($up_options->screenshot_1_thumb) {echo $up_options->screenshot_1_thumb;} else { echo get_template_directory_uri() . "/uploads/screenshot-1-thumb.png"; } ?>" alt="" /><span class="img">open image</span></a></p>
		</div><!-- .column.oneandahalf -->
		<div class="column oneandahalf">
			<p><a href="<?php if($up_options->screenshot_2) {echo $up_options->screenshot_2;} else { echo get_template_directory_uri() . "/uploads/screenshot-2.png"; } ?>" class="link" rel="group2" title="<?php echo $up_options->screenshot_2_caption; ?>"><img src="<?php if($up_options->screenshot_2_thumb) {echo $up_options->screenshot_2_thumb;} else { echo get_template_directory_uri() . "/uploads/screenshot-2-thumb.png"; } ?>" alt="" /><span class="img">open image</span></a></p>
		</div><!-- .column.oneandahalf -->
		<div class="column three">
			<?php if($up_options->availability == 1 && $up_options->applink){ ?>
				<p><a href="<?php echo $up_options->applink; ?>" class="appstore"><?php _e( 'Available in the app store', 'apptheme' ); ?></a></p>
			<?php } else { ?>
				<p><a class="appstore-soon"><?php _e( 'Soon available in the apple store', 'apptheme' ); ?></a></p>
			<?php } ?>
		</div><!-- .column.three -->
	</div><!-- .row -->
	<div class="row">
		<div class="column three">
			<?php  
			/**
			 * Include the homepage-leftbottom sidebar template part file
			 * 
			 * Calls the sidebar-homepage-leftbottom template part file.
			 * 
			 * Codex reference: http://codex.wordpress.org/Function_Reference/get_sidebar
			 * 
			 * Child Themes can replace this template part file globally, 
			 * via "sidebar-homepage-leftbottom.php"
			 */
			get_sidebar( 'homepage-leftbottom' ); 
			?>
		</div><!-- .column.three -->
		<div class="column three">
			<?php 
			/**
			 * Include the homepage-rightbottom sidebar template part file
			 * 
			 * Calls the sidebar-homepage-rightbottom template part file.
			 * 
			 * Codex reference: http://codex.wordpress.org/Function_Reference/get_sidebar
			 * 
			 * Child Themes can replace this template part file globally, 
			 * via "sidebar-homepage-rightbottom.php"
			 */
			get_sidebar( 'homepage-rightbottom' ); 
			?>
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
get_footer( 'front-page' ); 
?>