<?php get_header() ?>
  
  <div id="main">
  
    <div id="maincontent" class="equal">
    
      <div class="inner">

	      <?php top_content_ads(); ?>
        
        <h1 class="single-cat"><?php _e('Page Not Found'); ?></h1>
        
        <p><?php _e('The page you were looking for doesn\'t seem to exist. We\'ve been improving this site and the page might have been moved to another place.'); ?></p>
        
        <a class="backtohome" href="<?php bloginfo('url'); ?>"><?php _e('Back to Home'); ?></a>

	      <?php bottom_content_ads(); ?>

      </div><!-- /#inner -->
    
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->

<?php get_footer() ?>