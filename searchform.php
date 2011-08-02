			<form method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
			  <fieldset>
					<input type="text" name="s" class="s" value="<?php the_search_query(); ?>"/>
					<input type="submit" value="Search Site" name="submit-search" class="submit"/>
				</fieldset>
			</form>