<?php $sidebar = get_sub_field('sidebar'); ?>

<div class="container post_flex">
	<div class="row">
		<div class="col-12 <?php if ($sidebar) { echo 'col-md-8';} ?> post-body">
			<?php 
			$type = get_sub_field('posts');
			$excerpt = get_sub_field('excerpt');
			$range = get_sub_field('number_posts');
			$paginated = get_sub_field('include_archive');
			$style = get_sub_field('style');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$count = get_sub_field('number_posts');
			$layout = get_sub_field('layout');
			?>

			<div class="row post-card-row <?php if($layout == 'carousel'){echo 'postCarousel' ;} ?>" >
				<?php
				if ($paginated) : // if pagination is set use the default number of posts
					$args = array('post_type' => $type, 'paged' => $paged);
				else : // otherwise, check the count
					$args = array('post_type' => $type, 'posts_per_page' => $count, 'paged' => $paged);
				endif;

				$post_query = new WP_Query($args); ?>
				
				<!-- PROGRAMS AS CAROUSEL -->
				<?php if($layout == 'carousel'): ?>
				<div class="col-12" >
					<div class="row" >
						<div class="col-12 col-md-3" >
							<?php the_sub_field('content'); ?>
							<br />
							<div class="carousel-navigation text-center text-md-right" >
								<a class="carousel-prev button" href="#carousel" role="button" data-slide="prev" >
									<i class="fa-solid fa-arrow-left-long"></i>
									<span class="sr-only" >Previous</span>
								</a>
								<a class="carousel-next button" href="#carousel" role="button" data-slide="next" >
									<i class="fa-solid fa-arrow-right-long"></i>
									<span class="sr-only" >Next</span>
								</a>
							</div><!-- .carousel-nav -->
						</div>
						<div class="col-12 col-md-9" >
							<div class="row" >
								<div class="col-12" >
								<div id="carousel" class="carousel slide" data-ride="carousel" >
										<div class="carousel-inner" >
										<?php 
											$i = 1; 
											while ($post_query->have_posts()): $post_query->the_post(); 
											$num = $post_query->post_count; 	
											if( $i % 3 == 1 || $i == 1 ){ ?>
												<div class="carousel-item <?php if( $i == 1 ){echo 'active'; } ?>">
											<?php } ?> 
												<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
													$style = get_sub_field('style');
													$bgColor = get_sub_field('color');
													$bgImage = get_sub_field('hero_image'); 
													$bgPos = get_sub_field('hero_position');
												?>
												<div class="card">
													<div class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></div>
													<div class="card-body" >
														<p class="title" ><?php the_title(); ?></p>
													</div>
												</div><!-- .card -->
												<?php endwhile; endif; ?>
											<?php if($i % 3 == 0 || $i == $num ){ ?>
												</div><!-- .carousel-item <?php echo $i; ?> -->
											<?php }
											$i++; endwhile; wp_reset_postdata(); 
										?>
										</div><!-- .carousel-inner -->
									</div><!-- #carousel -->
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .col -->

					</div><!-- .row -->
				</div><!-- .col -->
				<?php else: ?>

				<!-- PROGRAMS AS CARDS -->
				<div class="col" >
					<div class="row" >
						<?php the_sub_field('content'); ?>
					</div><!-- .row -->
					<div class="row" >
					<?php  while ($post_query->have_posts()) : $post_query->the_post(); ?>
					<?php
					$col = get_sub_field('col_num');
					$colMD = "col-md-12";
					if ($col == 1) {
						$colMD = "col-md-12";
					} else if ($col == 2) {
						$colMD = "col-md-6";
					} else if ($col == 3) {
						$colMD = "col-md-4";
					} else  if ($col == 4) {
						$colMD = "col-md-3";
					}?>
					<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
						$style = get_sub_field('style');
						$bgColor = get_sub_field('color');
						$bgImage = get_sub_field('hero_image'); 
						$bgPos = get_sub_field('hero_position');
					?>
					<div class="col <?php echo $colMD; ?>" >
						<div class="card">
							<div class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></div>
							<div class="card-body" >
								<p class="title" ><?php the_title(); ?></p>
							</div>
						</div>
					</div>
					<?php endwhile; endif; ?>

					<?php endwhile; wp_reset_postdata(); ?>
					</div><!-- .row -->
				</div><!-- .col -->

				<?php endif; ?>
			</div><!-- .post-card-row -->
		</div><!-- .post-body -->

		<?php if ($sidebar) : ?>
		<div class="col-12 offset-md-1 col-md-3">
			<?php get_template_part('partials/sidebar'); ?>
		</div><!-- .col -->
		<?php endif; ?>
	</div><!-- .row -->

	<?php if ($paginated) : ?>
	<div class="row" id="pagination">
		<div class="col-12 col-md-6 text-left">
			<p><?php next_posts_link('<i class="fas fa-arrow-to-left"></i> More', $post_query->max_num_pages); ?></p>
		</div><!-- .col -->

		<div class="col-12 col-md-6 text-right">
			<p><?php previous_posts_link('Less <i class="fas fa-arrow-to-right"></i>', $post_query->max_num_pages); ?></p>
		</div><!-- .col -->
	</div><!-- .row -->
	<?php endif; ?>

</div><!-- .container -->