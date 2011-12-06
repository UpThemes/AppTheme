<?php
/**
 * Template part file that contains the homepage-leftbottom sidebar content
 *
 * This file is called by front-page.php
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/dynamic_sidebar		dynamic_sidebar()
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */

/**
 * Output homepage-leftbottom dynamic sidebar
 */
if ( ! dynamic_sidebar( 'homepage-leftbottom' ) ) : 
	?>

<h2>We're good</h2>
<ul>
    <li>Duis aute irure dolor in reprehenderit</li>
    <li>Sunt in culpa qui officia deserunt</li>
    <li>Ut enim ad minim <abbr title="iets">veniam</abbr></li>
</ul>

	<?php 
endif; 
?>