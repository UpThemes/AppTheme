<?php
/**
 * Template part file that contains the homepage-rightbottom sidebar content
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
 * Output homepage-rightbottom dynamic sidebar
 */
if ( ! dynamic_sidebar( 'homepage-rightbottom' ) ) : 
	?>

<h2>And we kick ass</h2>
<ul>
    <li>Esse cillum dolore eu fugiat nulla.</li>
    <li>nisi ut aliquip ex ea commodo</li>
    <li>Soccaecat cupidatat non proident</li>
</ul>

	<?php 
endif; 
?>