<?php
/*
Template Name: Search Page
*/
?>


<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="search" placeholder="<?php the_field('search','options'); ?>" />
		<label class="screen-reader-text" for="search">
			<?php the_field('search','options'); ?>
		</label>
		<a class="button" id="searchsubmit" title="search" >
			<i class="fas fa-search"></i>
		</a>
    </div>
</form>
