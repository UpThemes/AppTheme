<?php
/**
 * Template part file that contains the default sidebar content
 *
 * This file is not called by the Theme
 * 
 * @todo		Remove if unused
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/dynamic_sidebar		dynamic_sidebar()
 * @link 		http://codex.wordpress.org/Function_Reference/wp_list_categories	wp_list_categories()
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */
 ?>
 <div id="sidebar-content">
	<ul id="sidebar-one" class="column">
		<?php if ( ! dynamic_sidebar( 'primary-aside' ) ) : ?>
			<li class="outer grid-x">
				<div class="inner">
					<h2>Categories</h2>
					<ul>
						<?php wp_list_categories( 'title_li=' ); ?>
					</ul>
				</div><!-- /.inner -->
			</li><!-- /.outer -->
		<?php endif; ?>
	</ul><!-- /#sidebar-one -->
</div><!-- /#sidebar-content -->