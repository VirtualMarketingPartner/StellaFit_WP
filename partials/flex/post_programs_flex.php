<?php $sidebar = get_sub_field('sidebar'); 
$type = get_sub_field('posts');
$excerpt = get_sub_field('excerpt');
$range = get_sub_field('number_posts');
$paginated = get_sub_field('include_archive');
$style = get_sub_field('style');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$count = get_sub_field('number_posts');
$layout = get_sub_field('layout');
?>

<div class="container<?php if($layout == 'carousel'){echo '-fluid postCarousel' ;} ?> post_flex">
	<div class="row">
		<div class="col-12 <?php if ($sidebar) { echo 'col-md-8';} ?> post-body">

			<div class="row post-card-row animate" >
				<?php
				if ($paginated) : // if pagination is set use the default number of posts
					$args = array('post_type' => $type, 'order'=>'ASC', 'paged' => $paged);
				else : // otherwise, check the count
					$args = array('post_type' => $type, 'order'=>'ASC', 'posts_per_page' => $count, 'paged' => $paged);
				endif;

				$post_query = new WP_Query($args); ?>
				
				<!-- PROGRAMS AS CAROUSEL -->
				<?php if($layout == 'carousel'): ?>
				<div class="col-12" >
					<div class="row vcenter" id="carouselWrapper">
						<div class="col-12 col-md-2 offset-md-3" >
							<?php the_sub_field('content'); ?>
							<br />
							<div class="carousel-navigation text-center text-md-right" >
								<a class="carousel-prev button" href="#postCarouselarousel" role="button" data-slide="prev" >
									<i class="fa-solid fa-arrow-left-long"></i>
									<span class="sr-only" >Previous</span>
								</a>
								<a class="carousel-next button" href="#postCarousel" role="button" data-slide="next" >
									<i class="fa-solid fa-arrow-right-long"></i>
									<span class="sr-only" >Next</span>
								</a>
							</div><!-- .carousel-nav -->
						</div>
						<div class="col-12 col-md-7" >
							<div class="row" >
								<div class="col-12" >
								<div id="postCarousel" class="carousel slide" >
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
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													</div>
												</div><!-- .card -->
												<?php endwhile; else: ?>
												<div class="card">
													<div class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></div>
													<div class="card-body" >
													<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													</div>
												</div><!-- .card -->
												<?php endif; ?>
											<?php if($i % 3 == 0 || $i == $num ){ ?>
												</div><!-- .carousel-item <?php echo $i; ?> -->
											<?php }
											$i++; endwhile; wp_reset_postdata(); 
										?>
										</div><!-- .carousel-inner -->
									</div><!-- #postCarousel -->
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
							<a href="<?php the_permalink(); ?>" class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></a>
							<div class="card-body" >
								<h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
								<?php if ($excerpt) : ?>
									<p><?php the_excerpt(); ?></p>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" ><?php the_field('read_more','options'); ?></a>
							</div>
						</div>
					</div>
					<?php endwhile; else: ?>
						<div class="col <?php echo $colMD; ?>" >
						<div class="card">
							<a href="<?php the_permalink(); ?>" class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></a>
							<div class="card-body" >
								<h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
								<?php if ($excerpt) : ?>
									<p><?php the_excerpt(); ?></p>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" ><?php the_field('read_more','options'); ?></a>
							</div>
						</div>
					</div>
					<?php endif; ?>

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
			<div class="col-12 col-md-8 text-right" >
				<?php next_posts_link('<div class="circle button prev" role="button" data-slide="next" >
					<i class="fa-solid fa-arrow-left-long"></i>
					<span class="sr-only" >Prev</span>
				</div>', $post_query->max_num_pages); ?>
				<p style="display: inline-block">More Posts</p>
				<?php previous_posts_link('<div class="circle button" role="button" data-slide="next" >
					<i class="fa-solid fa-arrow-right-long"></i>
					<span class="sr-only" >Next</span>
				</div>', $post_query->max_num_pages); ?>
			</div>
		</div><!-- .row -->
	<?php endif; ?>

</div><!-- .container -->

<script type="text/javascript" >

jQuery(window).load(function() {

$('#postCarousel').carousel({
	interval: false,
});

});
</script>