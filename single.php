<?php get_header() ?>    

<div id="content">	
	<div class="row">
		<div class="column six">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" class="postwrapper">
						
				<?php the_content(); ?>
			
				<?php wp_link_pages( 'before=<p class="clearfix">' ); ?>
	
			</div><!-- /.postwrapper -->

			<?php 
			if ( comments_open() && ! post_password_required() ) {
			comments_template(); 
			}
			?>
			
			<?php endwhile; ?>
			
				<?php else : ?>
		
			<?php no_posts(); ?>
		
			<?php endif; ?>
			
		</div>
	</div>
</div>

<?php get_footer() ?>