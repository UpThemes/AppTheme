<?php
/**
 * Footer Template Part File
 * 
 * Template part file that contains the site footer and
 * closing HTML body elements
 *
 * This file is called by all primary template pages
 * 
 * Child Themes can override this template part file globally,
 * via "footer.php", or in a given specific context, via
 * "footer-{context}.php". For example, to replace this
 * template part file on static Pages, a Child Theme would
 * include the file "footer-page.php".
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/wp_footer		wp_footer()
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */

/**
 * Globalize $up_options
 * 
 * @global	array	$up_options		Theme Options
 */
$up_options = upfw_get_options();
?>
		</div><!-- #main -->
		
		<div id="footer">
			<p><?php echo $up_options->footer_text; ?></p>
		</div><!-- #footer -->
		
    </div><!-- #wrapper -->
	<?php 
	/**
	 * Fire the 'wp_footer' action hook
	 * 
	 * Codex reference: {@link http://codex.wordpress.org/Hook_Reference/wp_footer wp_footer}
	 * 
	 * This hook is used by WordPress core, Themes, and Plugins to 
	 * add scripts, CSS styles, meta tags, etc. to the document footer.
	 * 
	 * MUST come immediately before the closing </body> tag
	 * 
	 * @param	null
	 * @return	mixed	any output hooked into 'wp_footer'
	 */
	wp_footer(); 
	?>
</body>
</html>