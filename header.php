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

/**
 * Globalize $up_options
 * 
 * @global	array	$up_options		Theme Options
 */
global $up_options;
/**
* Globalize $post
* 
* @global	object	$post			Post object
*/
global $post;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
											"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php  
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
	?>; charset=<?php 
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
	 * Outputs the up_title() function if
	 * it exists; otherwise, falls back to 
	 * the wp_title() function with the
	 * Site Name appended
	 */
	if(function_exists('up_title')):
		echo "<title>".up_title()."</title>";
	else:
		echo "<title>";
		wp_title('');
		if(!is_home())echo ' - '.get_bloginfo('name');
		echo "</title>";
	endif;
		
	/**
	 * Fire the 'up_seo' custom action hook
	 * 
	 * @param	null
	 * @return	mixed	any output hooked into 'up_seo'
	 */
	do_action( 'up_seo' );
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link rel="start" href="<?php echo home_url(); ?>" title="Home" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php echo upfw_rss(); ?>" />
	<link rel="pingback" href="<?php 
	/**
	 * Output the pingback URL
	 *
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/bloginfo bloginfo}
	 * Codex reference: {@link http://codex.wordpress.org/Function_Reference/get_bloginfo get_bloginfo}
	 * 
	 * bloginfo() prints (displays/outputs) the data requested. 
	 * get_bloginfo() returns, rather than display/output, the data
	 * 
	 * The 'pingback_url' parameter is the URL used to send pingbacks
	 *
	 * @param	string	$show	e.g. 'pingback_url'; default: none
	 * @return	string			e.g. "{url}"
	 */
	bloginfo( 'pingback_url' ); 
	?>" />

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
            	'menu_id'			=> 'navigation',
            	'theme_location'	=> 'primary',
            	'fallback_cb'		=> 'apptheme_pagemenu',
            	'link_before'     	=> '<span>',
				'link_after'      	=> '</span>'
            );
            
			echo wp_nav_menu( $args );

		} else {
			
			apptheme_pagemenu();
			
		}		
		?>

        <div id="title">

     	<?php if( ! is_front_page() && ( is_single() || is_page() ) ) : ?>

        	<?php if( ( is_single() && isset( $up_options->disable_app_info_posts ) && 1 == $up_options->disable_app_info_posts ) || ( is_page() && isset( $up_options->disable_app_info_pages ) && 1 == $up_options->disable_app_info_pages ) ) : ?>
	            <h1 class="no-app-icon"><?php $post->post_title; ?></h1>
	        <?php 
			else : 
				?>
	        
	        	<h1><?php if( get_post_meta( $post->ID, 'app-name', true ) ) : ?>
					<?php echo get_post_meta( $post->ID, 'app-name', true ); ?>
	        	<?php else: ?>
		            <?php if ( $up_options->app_name ){ echo $up_options->app_name; } ?>
				<?php endif; ?></h1>

				<?php
				if( get_post_meta( $post->ID, 'app-link', true ) )
					$link = get_post_meta( $post->ID, 'app-link', true );
				else
					$link = $up_options->applink;
				?>
				
	        	<a href="<?php echo $link; ?>"><span>
	        	<?php if( get_post_meta( $post->ID, 'app-price', true ) ): ?>
					<?php echo get_post_meta( $post->ID, 'app-price', true ); ?>
	        	<?php else: ?>
		            <?php if( $up_options->app_price ){ echo $up_options->app_price; } ?>
				<?php endif; ?>
				</span></a>

	            <?php if( get_post_meta($post->ID, 'app-icon', true) ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo get_post_meta( $post->ID, 'app-icon', true ); ?>"); }
	   			</style>
	   			<?php elseif( $up_options->app_icon ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo $up_options->app_icon; ?>"); }
	   			</style>
	   			<?php endif; ?>
	            
	        <?php endif; ?>
        
        <?php else: ?>

	            <h1><?php if( $up_options->app_name ){ ?><?php echo $up_options->app_name; } else { bloginfo('name'); } ?></h1>
	            <a href="<?php echo $up_options->applink; ?>"><span><?php if( $up_options->app_price ){ ?><?php echo $up_options->app_price; ?><?php } ?></span></a>
	            
	            <?php if( $up_options->app_icon ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo $up_options->app_icon; ?>"); }
	   			</style>
	   			<?php endif; ?>
	   			
		<?php endif;  ?>

        </div><!-- #title -->
        
    </div><!-- #header -->

	<div id="main">
  
		<div id="iphone">
			<div class="img">
				<?php if ( ! is_front_page() && ( is_single() || is_page() ) && ( get_post_meta( $post->ID, 'video', true ) || get_post_meta( $post->ID, 'image', true ) ) ) : ?>
				
					<?php if ( get_post_meta( $post->ID,'video',true ) ) : // if page or post has video ?>

						<div class="hvlog {width: '230', height: '346', controller: 'false', loop: 'true', pluginspage: 'http://www.apple.com/quicktime/download/'}">
							<a href="<?php echo get_post_meta( $post->ID, 'video', true ); ?>" rel="enclosure"><?php _e( 'click to play', 'apptheme' ); ?></a>
							
							<?php if( get_post_meta( $post->ID, 'image', true ) ): ?>
							<img src="<?php echo get_post_meta( $post->ID, 'image', true ); ?>" alt="<?php the_title(); ?>" />
							<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/screenshot-2.png" alt="" />
							<?php endif; ?>
							
						</div>
					
					<?php elseif( get_post_meta( $post->ID, 'image', true ) ) : // if page or post has image ?>

						<div>
							<img src="<?php echo get_post_meta( $post->ID, 'image', true ); ?>" alt="<?php the_title(); ?>" />
						</div>

					<?php endif; ?>
					
				<?php elseif( is_front_page() && $up_options->video ): ?>
				
					<div class="hvlog {width: '230', height: '346', controller: 'false', loop: 'true', pluginspage: 'http://www.apple.com/quicktime/download/'}">
						<a href="<?php if( $up_options->video ){ echo $up_options->video; } else { echo get_template_directory_uri(); ?>/media/example.mov<?php } ?>" rel="enclosure"><?php _e( 'click to play', 'apptheme' ); ?></a>
						<img src="<?php echo $up_options->homepage_player_screenshot; ?>" alt="" />
					</div>
				
				<?php elseif( $up_options->homepage_player_screenshot ): ?>
				
					<div>
						<img src="<?php echo $up_options->homepage_player_screenshot; ?>" alt="" />
					</div>
								
				<?php endif; ?>
			</div><!-- #img -->
		</div><!-- #iphone -->