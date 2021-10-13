<div class="container post_flex" >
	<div class="row" >
		<div class="col-12" >
			<div class="text-wrapper animate slow" >
				<?php the_sub_field('content'); ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
	</div><!-- .row -->
	
	<div class="row" >
		<div class="col-12 col-md-8 post-body" >
		<div class="post-card-row" >
		<?php 
			$type = get_sub_field('posts');
			$range = get_sub_field('number_posts');
			$post_query = new WP_Query( array('post_type'=>$type, 'posts_per_page'=>$range, 'sort_by'=>'ASC') ); ?>
		<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?> 
		
		<?php 
		$col = get_sub_field('col_num');
		$colMD = "col-md-12";
		if($col == 1){ $colMD = "col-md-12"; } else 
		if($col == 2){ $colMD = "col-md-6"; } else 
		if($col == 3){ $colMD = "col-md-4"; } else 
		if($col == 4){ $colMD = "col-md-3"; }
		?>
		
		<?php if( $type == 'post' ): ?>
		<div class="col-12 <?php echo $colMD; ?>" >
			<div class="card" >
				<div class="card-body" >
					<p class="sub-title" ><?php echo get_the_date('M d, Y'); ?></p>
					<a class="title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					<?php the_excerpt(); ?>
					<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
				</div><!-- .card-body -->
			</div><!-- .card -->
		</div><!-- .col -->

		<?php else: // else if not a specified type ?>
			<div class="col-12 <?php echo $colMD; ?>" >
			<div class="card" >
				<div class="card-body" >
					<p class="sub-title" ><?php echo get_the_date('M d, Y'); ?></p>
					<a class="title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
					<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
				</div><!-- .card-body -->
			</div><!-- .card -->
		</div><!-- .col -->
		
		<?php endif; endwhile; wp_reset_postdata(); ?>
	</div><!-- .post-card-row -->
		</div><!-- .post-body -->

		<div class="col-12 col-md-4 offset-lg-1 col-lg-3 post-sidebar" >
			<?php get_sidebar(); ?>
		</div><!-- .post-sidebar -->
	</div><!-- .row -->

</div><!-- .container -->
