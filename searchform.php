<?php
/**
 * Search form template part file
 *
 * This file is the markup for the search form, called
 * via get_search_form().
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/get_template_directory_uri	get_template_directory_uri()
 * @link 		http://codex.wordpress.org/Function_Reference/home_url						home_url()
 * @link		http://codex.wordpress.org/Function_Reference/the_search_query				the_search_query()
 *
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 * @since 		AppTheme 1.0
 */ 
?>

<form method="get" class="search-form" action="<?php echo home_url(); ?>/">
  <fieldset>
		<input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
		<input type="submit" value="Search Site" name="submit-search" class="submit"/>
	</fieldset>
</form>