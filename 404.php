<?php
/**
 * Error 404 template file
 *
 * This file is the error 404 template file, used on Error 404 pages, per
 * the {@link http://codex.wordpress.org/Template_Hierarchy Template Hierarchy}.
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/_e					_e()
 * @link		http://codex.wordpress.org/Function_Reference/get_header 			get_header()
 * @link 		http://codex.wordpress.org/Function_Reference/get_footer 			get_footer()
 * @link 		http://codex.wordpress.org/Function_Reference/get_sidebar 			get_sidebar()
 * @link 		http://codex.wordpress.org/Function_Reference/home_url	 			home_url()
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
 * a specifric context only, via "header-404.php"
 */
get_header();
?>
  
<div id="content">

	<div class="inner">

		<h1 class="single-cat"><?php _e( 'Page Not Found', 'apptheme' ); ?></h1>

		<p><?php _e( 'The page you were looking for doesn\'t seem to exist. We\'ve been improving this site and the page might have been moved to another place.', 'apptheme' ); ?></p>

		<a class="backtohome" href="<?php echo home_url(); ?>"><?php _e( 'Back to Home', 'apptheme' ); ?></a>

	</div><!-- /#inner -->

</div><!-- /#maincontent -->

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
 * a specific context only, via "footer-404.php"
 */
get_footer(); 
?>