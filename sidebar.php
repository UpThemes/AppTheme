<div id="sidebar-content">
  <ul id="sidebar-one" class="column">
		<li>
		  <?php top_sidebar_ads(); ?>
    </li>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('primary-aside') ) : else : ?>
		<li class="outer grid-x">
		  <div class="inner">
			  <h2>Categories</h2>
        <ul>
          <?php wp_list_categories('title_li='); ?>
        </ul>
      </div><!-- /.inner -->
    </li><!-- /.outer -->
   <?php endif; ?>
		<li>
		  <?php bottom_sidebar_ads(); ?>
    </li>
 </ul><!-- /#sidebar-one -->
</div><!-- /#sidebar-content -->