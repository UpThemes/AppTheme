<?php get_header() ?>

  <div id="main">
  
    <div id="maincontent" class="equal">
    
      <div class="inner">
      
      <?php top_content_ads(); ?>

      <?php if (have_posts()) : ?>
      
      <h1 class="single-cat"><?php single_cat_title(); ?></h1>
  
      <?php while (have_posts()) : the_post(); ?>
      
      <?php ap_post(); ?>
  
      <?php endwhile; ?>
  
      <?php else : ?>
      
      <?php no_posts(); ?>
      
      <?php endif; ?>
      
      <?php navigation_below(); ?>

      <?php top_content_ads(); ?>

      <a class="backtotop" href="#"><?php _e('Back to Top'); ?></a>
        
      </div><!-- /#inner -->
      
    </div><!-- /#maincontent -->
      
	  <?php get_sidebar() ?>

  </div><!-- /#main -->
  
<?php get_footer() ?>