<?php
/**
 * Master/Default template file
 *
 * This file is the master/default template file, used when no other file matches in
 * the {@link http://codex.wordpress.org/Template_Hierarchy Template Hierarchy}.
 * 
 * @link		http://codex.wordpress.org/Function_Reference/get_header 			get_header()
 * @link 		http://codex.wordpress.org/Function_Reference/get_footer 			get_footer()
 * @link 		http://codex.wordpress.org/Function_Reference/have_posts 			have_posts()
 * @link 		http://codex.wordpress.org/Function_Reference/the_excerpt		 	the_excerpt()
 * @link 		http://codex.wordpress.org/Function_Reference/the_ID			 	the_ID()
 * @link 		http://codex.wordpress.org/Function_Reference/the_permalink			the_permalink()
 * @link 		http://codex.wordpress.org/Function_Reference/the_post 				the_post()
 * @link 		http://codex.wordpress.org/Function_Reference/the_title			 	the_title()
 * 
 * @uses		apptheme_navigation_above()			Defined in /functions.php
 * @uses		apptheme_navigation_below()			Defined in /functions.php
 * @uses		apptheme_no_posts()					Defined in /functions.php
 * @uses		upfw_get_template_context()	Defined in /admin/functions.php
 *
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 * @since 		AppTheme 1.0
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
 * a specifric context only, via "header-{context}.php"
 */
get_header(); 
?>    

<div id="content">	
	<div class="row">

		<?php 
		/**
		 * Output above-loop navigation links
		 */
		apptheme_navigation_above(); 
		?>

		<div class="column six">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" class="postwrapper">

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
				<?php the_excerpt(); ?>
	
			</div><!-- /.postwrapper -->
													
			<?php endwhile; ?>
			
			<?php else : ?>
		
			<?php 
			/**
			 * Output no-post content
			 */
			apptheme_no_posts(); 
			?>
		
			<?php endif; ?>
			
		</div><!-- .column.six -->

		<?php 
		/**
		 * Output above-loop navigation links
		 */
		apptheme_navigation_below(); 
		?>

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
 * a specific context only, via "footer-{context}.php"
 */
get_footer(); 
?>