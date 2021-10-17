<?php $sidebar = get_sub_field('sidebar'); ?>

<div class="container post_flex" >
	<div class="row" >
		<div class="col-12" >
			<div class="text-wrapper animate slow" >
				<?php the_sub_field('content'); ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
	</div><!-- .row -->
	
	<div class="row" >
		<div class="col-12 <?php if($sidebar){ echo 'col-md-8'; } ?> post-body" >
			<div class="row post-card-row" >
				<?php 
					$type = get_sub_field('posts');
					$range = get_sub_field('number_posts');
					$paginated = get_sub_field('include_archive');
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$count = get_sub_field('number_posts');

					if($paginated):// if pagination is set use the default number of posts
						$args = array('post_type'=>$type, 'paged'=>$paged );
					else: // otherwise, check the count
						$args = array('post_type'=>$type, 'posts_per_page'=>$count, 'paged'=>$paged);
					endif;

					$post_query = new WP_Query( $args ); ?>
				<?php $pCount=0; while ( $post_query->have_posts() ) : $post_query->the_post(); ?> 
				
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
					<div class="postItem" >
						<div class="postItemBody" >
							<p class="sub-title" ><?php echo get_the_date('M d, Y'); ?></p>
							<a class="title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
							<?php the_excerpt(); ?>
							<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
						</div><!-- .postItemBody -->
					</div><!-- .postItem -->
				</div><!-- .col -->

				<?php elseif( $type == 'news' ): ?>
				<div class="col-12" >
					<a class="title" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
				</div>

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
		<?php if($sidebar): ?>
			<div class="col-12 md-offset-1 col-md-3" >
				<?php get_template_part('sidebar'); ?>
			</div>
		<?php endif; ?>
	</div><!-- .row -->
	
	<?php if($paginated): ?>
	<div class="row" id="pagination" >
		<div class="col-12 col-md-6 text-left" >
			<p><?php next_posts_link( '<i class="fas fa-arrow-to-left"></i> More', $post_query->max_num_pages ); ?></p>
		</div><!-- .col -->

		<div class="col-12 col-md-6 text-right" >
			<p><?php previous_posts_link( 'Less <i class="fas fa-arrow-to-right"></i>', $post_query->max_num_pages ); ?></p>
		</div><!-- .col -->
	</div><!-- .row -->
	<?php endif; ?>

</div><!-- .container -->
