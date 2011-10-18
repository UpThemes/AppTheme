<?php get_header() ?>    

<div id="content">	
	<div class="row">

		<?php navigation_above(); ?>

		<div class="column six">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" class="postwrapper">

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
				<?php the_excerpt(); ?>
	
			</div><!-- /.postwrapper -->
													
			<?php endwhile; ?>
			
				<?php else : ?>
		
			<?php no_posts(); ?>
		
			<?php endif; ?>
			
		</div>

		<?php navigation_below(); ?>

	</div>
</div>
  
<?php get_footer() ?>