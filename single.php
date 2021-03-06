<?php
/**
 * Single Post template file
 *
 * This file is the single template file, used on single blog posts, per
 * the {@link http://codex.wordpress.org/Template_Hierarchy Template Hierarchy}.
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/comments_open		 	comments_open()
 * @link 		http://codex.wordpress.org/Function_Reference/comments_template	 	comments_template()
 * @link		http://codex.wordpress.org/Function_Reference/get_header 			get_header()
 * @link 		http://codex.wordpress.org/Function_Reference/get_footer 			get_footer()
 * @link 		http://codex.wordpress.org/Function_Reference/have_posts 			have_posts()
 * @link 		http://codex.wordpress.org/Function_Reference/post_password_required 	post_password_required()
 * @link 		http://codex.wordpress.org/Function_Reference/the_content		 	the_content()
 * @link 		http://codex.wordpress.org/Function_Reference/the_ID			 	the_ID()
 * @link 		http://codex.wordpress.org/Function_Reference/the_post 				the_post()
 * @link 		http://codex.wordpress.org/Function_Reference/wp_link_pages			wp_link_pages()
 * 
 * @uses		apptheme_no_posts()					Defined in /functions.php
 *
 * @package 	App Theme
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
 * a specific context only, via "header-single.php"
 */
get_header(); 
?>

<div id="content">	
	<div class="row">
		<div class="column six">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1><?php the_title(); ?></h1>

			<div id="post-<?php the_ID(); ?>" <?php post_class('postwrapper'); ?>>

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

			</div><!-- /.postwrapper -->

			<?php 
			if ( comments_open() && ! post_password_required() ) {
				/**
				 * Include the comments template
				 * 
				 * Includes the comments.php template part file
				 */
				comments_template(); 
			}
			?>
			
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
 * a specific context only, via "footer-single.php"
 */
get_footer(); 
?>