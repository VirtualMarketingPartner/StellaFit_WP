<?php $sidebar = get_sub_field('sidebar'); ?>

<div class="container post_flex">
	<div class="row">
		<div class="col-12">
			<div class="text-wrapper animate slow">
				<?php the_sub_field('content'); ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
	</div><!-- .row -->

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

			<div class="row post-card-row <?php if($type == 'news'){ echo 'grid';} ?>" >
				<?php
				if ($paginated) : // if pagination is set use the default number of posts
					$args = array('post_type' => $type, 'paged' => $paged);
				else : // otherwise, check the count
					$args = array('post_type' => $type, 'posts_per_page' => $count, 'paged' => $paged);
				endif;

				$post_query = new WP_Query($args); ?>
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

					<!-- BLOG POST -->
					<?php if ($type == 'post') : ?>
					<div class="col-12 <?php echo $colMD; ?>">
						<div class="postItem <?php if (!$sidebar) { echo 'card'; } ?> ">
							<div class="row postItemBody">
								<div class="col-12 col-md-3">
									<div class="imageWrapper circle" style="background-image:url(<?php echo $catImg; ?>);"></div>
								</div>
								<div class="col-12 col-md-9">
									<p class="sub-title"><?php echo get_the_date('M d, Y'); ?></p>
									<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php if ($excerpt) : ?>
										<p><?php the_excerpt(); ?></p>
									<?php else : ?>
										<br>
									<?php endif; ?>
									<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
								</div>
							</div><!-- .postItemBody -->
						</div><!-- .postItem -->
					</div><!-- .col -->

					<!-- NEWS -->
					<?php elseif ($type == 'news'): ?>
					<div class="gridItem" >
					<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
						$style = get_sub_field('style');
						$bgColor = get_sub_field('color');
						$bgImage = get_sub_field('hero_image'); 
						$bgPos = get_sub_field('hero_position');
					?>
						<div class="articleThumb" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?> );background-position:<?php echo $bgPos; ?>">
							<div class="articleText" >
								<p class="date"><?php echo get_the_date('M d, Y'); ?></p>
								<p class="title" ><?php the_title(); ?></p>
								<a href="<?php the_permalink();?>" ><?php the_field('read_more', 'options'); ?></a>
							</div>
							<div class="overlay" ></div>
						</div>
					<?php endwhile; endif; ?>
					</div>
					
					<!-- PROGRAMS -->
					<?php elseif($type == 'programs' && $layout == 'card'): ?>
						<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
							$style = get_sub_field('style');
							$bgColor = get_sub_field('color');
							$bgImage = get_sub_field('hero_image'); 
							$bgPos = get_sub_field('hero_position');
						?>
						<div class="card">
							<div class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></div>
							<div class="card-body" >
								<h1>Cards</h1>
								<p class="title" ><?php the_title(); ?></p>
							</div>
						</div>
					<?php endwhile; endif; ?>

					<!-- PROGRAMS AS A CAROUSEL -->
					<?php elseif ($type == 'programs' && $layout == 'carousel'): ?>
						<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
							$style = get_sub_field('style');
							$bgColor = get_sub_field('color');
							$bgImage = get_sub_field('hero_image'); 
							$bgPos = get_sub_field('hero_position');
						?>
						<div class="card">
							<div class="image-wrapper" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?>); background-position:<?php echo $bgPos; ?>"></div>
							<div class="card-body" >
								<h1>Carousel</h1>
								<p class="title" ><?php the_title(); ?></p>
							</div>
						</div>
					<?php endwhile; endif; ?>

					<?php else : // else if not a specified type 
					?>
					<div class="col-12 <?php echo $colMD; ?>">
						<div class="card">
							<div class="card-body">
								<p class="sub-title"><?php echo get_the_date('M d, Y'); ?></p>
								<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
							</div><!-- .card-body -->
						</div><!-- .card -->
					</div><!-- .col -->

				<?php endif; endwhile; wp_reset_postdata(); ?>
			</div><!-- .post-card-row -->
		</div><!-- .post-body -->
		<?php if ($sidebar) : ?>
			<div class="col-12 offset-md-1 col-md-3">
				<?php get_template_part('partials/sidebar'); ?>
			</div>
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