<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom Widgets, custom hooks, and Theme settings.
 *
 * For more information on hooks, actions, and filters, 
 * see {@link http://codex.wordpress.org/Plugin_API Plugin API}.
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2010, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */

/**
 * Bootstrap the UpThemes Framework
 */
require_once( 'admin/admin.php' );

/**
 * Bootstrap theme options files.
 */
require_once('theme-options/general-settings.php');

/**
 * Bootstrap theme-specific library loader.
 */
require_once('themelib/load.php');

/**
 * Bootstrap WP ThemeLib.
 */
require_once('lib/load.php');