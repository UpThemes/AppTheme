<?php
/**
 * Header Template Part
 * 
 * Template part file that contains the HTML document head and 
 * opening HTML body elements, as well as the site header.
 *
 * This file is called by all primary template pages
 * 
 * Child Themes can override this template part file globally,
 * via "header.php", or in a given specific context, via
 * "header-{context}.php". For example, to replace this
 * template part file on static Pages, a Child Theme would
 * include the file "header-page.php".
 * 
 * @uses		apptheme_pagemenu()			Defined in /functions.php
 * @uses		up_title()					Defined in /admin/library/engines/seo-engine.php
 * @uses		upfw_rss()					Defined in /admin/admin.php
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/_e					_e()
 * @link 		http://codex.wordpress.org/Function_Reference/bloginfo				bloginfo()
 * @link 		http://codex.wordpress.org/Function_Reference/body_class			body_class()
 * @link 		http://codex.wordpress.org/Function_Reference/do_action				do_action()
 * @link 		http://codex.wordpress.org/Function_Reference/get_stylesheet_uri	get_stylesheet_uri()
 * @link 		http://codex.wordpress.org/Function_Reference/get_template_directory_uri	get_template_directory_uri()
 * @link 		http://codex.wordpress.org/Function_Reference/language_attributes	language_attributes()
 * @link 		http://codex.wordpress.org/Function_Reference/wp_enqueue_script		wp_enqueue_script()
 * @link 		http://codex.wordpress.org/Function_Reference/wp_head				wp_head()
 * @link 		http://codex.wordpress.org/Function_Reference/wp_nav_menu			wp_nav_menu()
 * 
 * @package 	AppTheme
 * @copyright	Copyright (c) 2011, UpThemes
 * @license		license.txt GNU General Public License, v3
 *
 * @since 		AppTheme 1.0
 */

$up_options = upfw_get_options();
?>

<!DOCTYPE html>
<html <?php  
/**
 * Output language attributes for the <html> tag
 * 
 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/language_attributes language_attributes}
 * 
 * Added inside the HTML <html> tag, and outputs various HTML
 * language attributes, such as language and text-direction.
 * 
 * @param	null
 * @return	string	e.g. dir="ltr" lang="en-US"
 */
language_attributes(); 
?>>
<head>
	<meta http-equiv="Content-Type" content="<?php 
	/**
	 * Output the site HTML type
	 *
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/bloginfo bloginfo}
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/get_bloginfo get_bloginfo}
	 * 
	 * bloginfo() prints (displays/outputs) the data requested. 
	 * get_bloginfo() returns, rather than display/output, the data
	 * 
	 * The 'html_type' parameter is the document HTML type
	 *  - Defined on the General Settings page in the administration panel
	 *  - Usually "text/html"
	 *
	 * @param	string	$show	e.g. 'html_type'; default: none
	 * @return	string			e.g. "text/html"
	 */
	bloginfo('html_type'); 
	?>" charset="<?php 
	/**
	 * Output the site HTML type
	 *
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/bloginfo bloginfo}
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/get_bloginfo get_bloginfo}
	 * 
	 * bloginfo() prints (displays/outputs) the data requested. 
	 * get_bloginfo() returns, rather than display/output, the data
	 * 
	 * The 'charset' parameter is the document character set
	 * 	- Defined in wp-config.php
	 *  - Usually "UTF-8"
	 *
	 * @param	string	$show	e.g. 'charset'; default: none
	 * @return	string			e.g. "UTF-8"
	 */
	bloginfo('charset'); 
	?>" />
	<?php
	/**
	 * Output the HTML <title> tag
	 * 
	 * Outputs the wp_title() function.
	 */
	echo "<title>";
	wp_title(false);
	echo "</title>";
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<?php wp_head(); ?>
	<?php
	/**
	 * @todo	When {@link http://core.trac.wordpress.org/ticket/16024 this ticket} gets closed, add conditionals and enqueue these IE scripts
	 */
	?>
	<!--[if IE 6]>    
		<script src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG.js"></script>
		<script>DD_belatedPNG.fix('#iphone, #iphone a, h1, .link .img');</script>
	<![endif]-->

</head>
<body <?php body_class(); ?>>

<div id="wrapper">

    <div id="header">
    	
    	<?php if ( $up_options->display_logo == "yes" ) : ?>
    		<a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo $up_options->logo; ?>"></a>
    	<?php endif; ?>

      <?php
            
			if ( function_exists( 'wp_nav_menu' ) ) {
			
			        $args = array(
			        	'container' 		=> false,
			        	'menu_id'				=> 'navigation',
			        	'theme_location'=> 'primary',
			        	'fallback_cb'		=> 'apptheme_pagemenu',
			        	'link_before'   => '<span>',
								'link_after'    => '</span>'
			        );
			        
				echo wp_nav_menu( $args );
			
			} else {
				
				apptheme_pagemenu();
				
			}		
			?>
			<?php the_post(); ?>

      <div id="title">
				<h1><?php apptheme_the_title(); ?></h1>
      </div><!-- #title -->
        
    </div><!-- #header -->

	<div id="main">
  
		<div id="iphone">
			<div class="img">

				<?php $appinfo = get_post_meta( $post->ID, 'appinfo', true ); ?>

				<?php if ( is_singular() ) : ?>

					<?php $video = $video ? $appinfo[0]['app-demo-video'] : $up_options->default_video; ?>
					<?php $image = $image ? $appinfo[0]['app-image-1'] : $up_options->default_image; ?>

					<?php if ( isset( $video ) ) : // if page or post has video ?>
						
						<div class="hvlog {width: '230', height: '346', controller: 'false', loop: 'true', pluginspage: 'http://www.apple.com/quicktime/download/'}">
							<a class="click-to-play" href="<?php echo $video; ?>" rel="enclosure"><?php _e( 'click to play', 'apptheme' ); ?></a>
							
							<?php if( isset( $image ) ): ?>
							<img src="<?php echo $image; ?>" alt="" />
							<?php endif; ?>

						</div>
					
					<?php elseif( isset( $image ) ) : // if page or post has image ?>

						<div>
							<a href="<?php echo $image; ?>" rel="group2"><img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" /></a>
						</div>

					<?php endif; ?>

				<?php endif; rewind_posts(); ?>
			</div><!-- #img -->
		</div><!-- #iphone -->