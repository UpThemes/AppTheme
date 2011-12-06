<?php
/**
 * Search template file
 *
 * This file is the search template file, used on search results index pages per 
 * the {@link http://codex.wordpress.org/Template_Hierarchy Template Hierarchy}.
 * 
 * @link		http://codex.wordpress.org/Function_Reference/get_header 			get_header()
 * @link 		http://codex.wordpress.org/Function_Reference/get_footer 			get_footer()
 * @link 		http://codex.wordpress.org/Function_Reference/get_search_query		get_search_query()
 * @link 		http://codex.wordpress.org/Function_Reference/have_posts 			have_posts()
 * @link 		http://codex.wordpress.org/Function_Reference/the_content		 	the_content()
 * @link 		http://codex.wordpress.org/Function_Reference/the_ID			 	the_ID()
 * @link 		http://codex.wordpress.org/Function_Reference/the_permalink			the_permalink()
 * @link 		http://codex.wordpress.org/Function_Reference/the_post 				the_post()
 * @link 		http://codex.wordpress.org/Function_Reference/the_title			 	the_title()
 * 
 * @uses		navigation_above()			Defined in /functions.php
 * @uses		navigation_below()			Defined in /functions.php
 * @uses		no_posts()					Defined in /functions.php
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
 * a specific context only, via "header-search.php"
 */
get_header( 'search' ); 
?>    

<div id="content">	
	<div class="row">
		<?php 
		/**
		 * Output above-loop navigation links
		 */
		navigation_above(); 
		?>
		<div class="column six">
		
		  <h1><?php _e( 'Search Results for', 'apptheme' ); ?> <em id="search-terms">'<?php echo get_search_query(); ?>'</em></h1>
		
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		  
			<div id="post-<?php the_ID(); ?>" class="postwrapper">
					  
			  <?php the_content(); ?>
	
			</div><!-- /.postwrapper -->
													
		  <?php endwhile; ?>
		  
		  <?php else : ?>
	  
		  <?php 
		  /**
		   * Output no-post content
		   */
		  no_posts(); 
		  ?>
	  
		  <?php endif; ?>
		  
		</div><!-- .column.six -->
		<?php 
		/**
		 * Output below-loop navigation links
		 */
		navigation_below(); 
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
 * a specific context only, via "footer-search.php"
 */
get_footer( 'search' ); 
?>