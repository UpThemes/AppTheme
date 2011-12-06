<?php
/**
 * Search form header template part file
 *
 * This file is the markup for the search form header.
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/_e							_e()
 * @link 		http://codex.wordpress.org/Function_Reference/get_template_directory_uri	get_template_directory_uri()
 * @link 		http://codex.wordpress.org/Function_Reference/home_url						home_url()
 * @link		http://codex.wordpress.org/Function_Reference/the_search_query				the_search_query()
 *
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 * @since 		AppTheme 1.0
 * 
 * @todo		Remove if unused
 */ 
?>

<form method="get" class="search-form" action="<?php echo home_url(); ?>/">
  <fieldset>
		<label for="s"><?php _e( 'Search', 'apptheme' ); ?></label>
		<input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
		<button type="submit" name="submit-search" class="submit-image"><?php e_( 'Submit', 'apptheme' ); ?></button>
	</fieldset>
</form>