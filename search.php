<?php get_header() ?>    

            <div id="content">	
                <div class="row">
                    <div class="column six">
                    
	                  <h1>Search Results for <em id="search-terms">'<?php echo wp_specialchars(stripslashes($_GET['s']), true); ?>'</em></h1>
                    
					  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                      
                        <div id="post-<?php the_ID(); ?>" class="postwrapper">
                                  
                          <?php the_content(); ?>
                
                        </div><!-- /.postwrapper -->
                                                                
                      <?php endwhile; ?>
                      
                            <?php else : ?>
                  
                      <?php no_posts(); ?>
                  
                      <?php endif; ?>
                      
                    </div>
                </div>
            </div>
  
<?php get_footer() ?>