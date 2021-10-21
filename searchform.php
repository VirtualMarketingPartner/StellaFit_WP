<?php
/*
Template Name: Search Page
*/
?>


<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="search" placeholder="<?php the_field('search', 'options'); ?>" />
		<i class="far fa-arrow-right"></i>
		<label class="screen-reader-text" for="search">
			<?php the_field('search', 'options'); ?>
		</label>
	</div>
</form>