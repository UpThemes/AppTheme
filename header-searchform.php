			<form method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
			  <fieldset>
					<label for="s"><?php _e('Search'); ?></label>
          <input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
					<button type="submit" name="submit-search" class="submit-image">Submit</button>
				</fieldset>
			</form>