<?php

  global $up_options,$post;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
											"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
/* Title Function */
    if(function_exists('up_title')):
        echo "<title>".up_title()."</title>";
    else:
        echo "<title>";
        wp_title('');
        if(!is_home())echo ' - '.get_bloginfo('name');
        echo "</title>";
    endif;
    
    /* SEO */
    do_action('up_seo');
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/print.css" media="print" />
<link rel="start" href="<?php bloginfo('url'); ?>" title="Home" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo upfw_rss(); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
    
<script src="<?php bloginfo('template_url'); ?>/js/jquery.embedquicktime.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
    
<script type="text/javascript">

$j = jQuery.noConflict();

	$j(document).ready(function() {
		$j.embedquicktime({
			jquery: 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', 
			plugin: '<?php bloginfo('template_url'); ?>/js/jquery.embedquicktime.js'
		});
		
		$j("a.link").fancybox({
			'zoomOpacity'  : true,
			'zoomSpeedIn'  : 300,
			'zoomSpeedOut' : 300
			});
	});
</script>

<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/main-IE6.css" />        
	<script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG.js"></script>
	<script>DD_belatedPNG.fix('#iphone, #iphone a, h1, .link .img');</script>
<![endif]-->

</head>
<?php if($up_options->mirror == true) $body_class = 'mirror'; else $body_class = ''; ?>
<body <?php body_class($body_class) ?>>

<div id="wrapper">	
    <div id="header">
    	
    	<?php if($up_options->display_logo=="yes"): ?>
    		<a id="logo" href="<?php bloginfo('wpurl'); ?>"><img src="<?php echo $up_options->logo; ?>"></a>
    	<?php endif; ?>

        <?php
            
		if(function_exists('wp_nav_menu')) {

            $args = array(
            	'container' 		=> false,
            	'menu_id'			=> 'navigation',
            	'theme_location'	=> 'primary',
            	'fallback_cb'		=> 'apptheme_pagemenu',
            	'link_before'     	=> '<span>',
				'link_after'      	=> '</span>'
            );
            
			echo wp_nav_menu($args);

		} else {
			
			apptheme_pagemenu();
			
		}
		
		?>

        <div id="title">

     	<?php if( is_single() || is_page() ): ?>

        	<?php if( (is_single() && $up_options->disable_app_info_posts == 1) || (is_page() && $up_options->disable_app_info_pages == 1) ): ?>
	            <h1 class="no-app-icon"><?php the_title(); ?></h1>
	        <?php else: ?>
	        
	        	<h1><?php if( get_post_meta($post->ID, 'app-name', true) ): ?>
					<?php echo get_post_meta($post->ID, 'app-name', true); ?>
	        	<?php else: ?>
		            <?php if($up_options->app_name){ echo $up_options->app_name; } ?>
				<?php endif; ?></h1>

				<?php
				if( get_post_meta($post->ID, 'app-link', true) )
					$link = get_post_meta($post->ID, 'app-link', true);
				else
					$link = $up_options->applink;
				?>
				
	        	<a href="<?php echo $link; ?>"><span>
	        	<?php if( get_post_meta($post->ID, 'app-price', true) ): ?>
					<?php echo get_post_meta($post->ID, 'app-price', true); ?>
	        	<?php else: ?>
		            <?php if($up_options->app_price){ echo $up_options->app_price; } ?>
				<?php endif; ?>
				</span></a>

	            <?php if( get_post_meta($post->ID, 'app-icon', true) ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo get_post_meta($post->ID, 'app-icon', true); ?>"); }
	   			</style>
	   			<?php elseif( $up_options->app_icon ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo $up_options->app_icon; ?>"); }
	   			</style>
	   			<?php endif; ?>
	            
	        <?php endif; ?>
        
        <?php else: ?>

	            <h1><?php if($up_options->app_name){ ?><?php echo $up_options->app_name; } else { bloginfo('name'); } ?></h1>
	            <a href="<?php echo $up_options->applink; ?>"><span><?php if($up_options->app_price){ ?><?php echo $up_options->app_price; ?><?php } ?></span></a>
	            
	            <?php if( $up_options->app_icon ): ?>
	   			<style type="text/css">
	   			#title h1{ background-image: url("<?php echo $up_options->app_icon; ?>"); }
	   			</style>
	   			<?php endif; ?>
	   			
		<?php endif;  ?>

        </div>
        
    </div>

  
  <div id="main">
  
    <div id="iphone">
        <div class="img">
        	<?php if( (is_single() || is_page()) && (get_post_meta($post->ID,'video',true) || get_post_meta($post->ID,'image',true)) ): ?>
        	
	        	<?php if( get_post_meta($post->ID,'video',true) ): // if page or post has video ?>

		            <div class="hvlog {width: '230', height: '346', controller: 'false', loop: 'true', pluginspage: 'http://www.apple.com/quicktime/download/'}">
		                <a href="<?php echo get_post_meta($post->ID,'video',true); ?>" rel="enclosure"><?php _e('click to play'); ?></a>
		                
		                <?php if( get_post_meta($post->ID,'image',true) ): ?>
		                <img src="<?php echo get_post_meta($post->ID,'image',true); ?>" alt="<?php the_title(); ?>" />
		                <?php else: ?>
	                	<img src="<?php bloginfo('template_directory'); ?>/images/screenshot-2.png" alt="" />
	                	<?php endif; ?>
	                	
		            </div>
	            
	            <?php elseif( get_post_meta($post->ID,'image',true) ): // if page or post has image ?>

		            <div>
		                <img src="<?php echo get_post_meta($post->ID,'image',true); ?>" alt="<?php the_title(); ?>" />
		            </div>

	            <?php endif; ?>
        		
        	<?php elseif( is_home() && $up_options->video ): ?>
        	
	            <div class="hvlog {width: '230', height: '346', controller: 'false', loop: 'true', pluginspage: 'http://www.apple.com/quicktime/download/'}">
	                <a href="<?php if($up_options->video){ echo $up_options->video; } else { bloginfo('template_directory'); ?>/media/example.mov<?php } ?>" rel="enclosure"><?php _e('click to play'); ?></a>
	                <img src="<?php echo $up_options->homepage_player_screenshot; ?>" alt="" />
	            </div>
	        
	        <?php elseif( $up_options->homepage_player_screenshot ): ?>
	        
	            <div>
	                <img src="<?php echo $up_options->homepage_player_screenshot; ?>" alt="" />
	            </div>
	            	        
            <?php endif; ?>
        </div>
    </div>	
