<?php $sidebar = get_sub_field('sidebar'); ?>

<div class="container post_flex ">
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
						<div class="postItem <?php if (!$sidebar) { echo 'card'; } ?>">
							<div class="row postItemBody">
								<?php 
								$catID = get_the_category($id);
								$cat = $catID[0]->name;
								?>
								<div class="col-12 col-md-3">
									<a href="<?php the_permalink(); ?>" class="imageWrapper circle" style="background-image:url(<?php echo the_field( $cat , 'options'); ?>);"></a>
								</div>
								<div class="col-12 col-md-9">
									<p class="sub-title"><?php echo get_the_date('M d, Y'); ?></p>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php if ($excerpt) : ?>
										<p><?php the_excerpt(); ?></p>
									<?php endif; ?>
									<a href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
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
						<a href="<?php the_permalink(); ?>" class="articleThumb" >
							<div class="articleText" >
								<p class="date"><?php echo get_the_date('M d, Y'); ?></p>
								<p class="title" ><?php the_title(); ?></p>
								<p class="readMore"><?php the_field('read_more', 'options'); ?></p>
							</div>
							<div class="overlay" ></div>
							<div class="articleImg" style="background-image:url(<?php echo $bgImage; ?>); background-color:var(--<?php echo $bgColor; ?> );background-position:<?php echo $bgPos; ?>" ></div>
						</a>
					<?php endwhile; endif; ?>
					</div>

					<!-- RECIPES -->
					<?php elseif ($type == 'recipes') : ?>
						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="col-12 <?php echo $colMD; ?>">
							<div class="postItem <?php if (!$sidebar) { echo 'card'; } ?>">
								<div class="row postItemBody">
									<?php if( has_post_thumbnail() ): ?>
										<div class="col-12 col-md-4">
										<a href="<?php the_permalink(); ?>" class="imageWrapper rectangle" style="background-image:url(<?php echo $thumb[0]; ?>);"></a>
									</div>
									<?php endif; ?>
									<div class="col-12 col-md-8">
									<p class="date"><?php echo get_the_date('M d, Y'); ?></p>
										<a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php if( the_excerpt ): ?>
											<p><?php the_excerpt(); ?></p>
										<?php endif; ?>
										<a class="button inverted" href="<?php the_permalink(); ?>">
											<?php the_field('see_recipe', 'options'); ?>
										</a>
									</div>
								</div><!-- .postItemBody -->
							</div><!-- .postItem -->
						</div><!-- .col -->

						<?php elseif ($type == 'videos') : ?>
						<div class="col-12 <?php echo $colMD; ?>">
							<div class="card" >
								<div class="video-wrapper iframe-container" ><?php the_content(); ?></div>
								<div class="card-body" >
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<a class="button inverted" href="<?php the_permalink(); ?>"><?php the_field('watch_now', 'options'); ?></a>
								</div><!-- .card-body -->
							</div><!-- .card -->
						</div><!-- .col -->

					<?php else : // else if not a specified type 
					?>
					<div class="col-12 <?php echo $colMD; ?>">
						<div class="card">
							<div class="card-body">
								<p class="sub-title"><?php echo get_the_date('M d, Y'); ?></p>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<a href="<?php the_permalink(); ?>"><?php the_field('read_more', 'options'); ?></a>
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

	<?php if ($paginated) : 
		$pageMe = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$total_post_count = wp_count_posts();
		$published_post_count = $total_post_count->publish;
		$total_pages = ceil( $published_post_count / $posts_per_page );
		?>
		
		<div class="row" id="pagination">
			<div class="col-12 col-md-8 text-center" >
				<?php next_posts_link('<div class="circle button prev" role="button" data-slide="next" >
					<i class="fa-solid fa-caret-left"></i>
					<span class="sr-only" >Previous Set of Pages</span>
				</div>', $post_query->max_num_pages); ?>
				
				<span class="sub-title" >Page <?= $pageMe; ?> of <?= $total_pages; ?></span>

				<?php previous_posts_link('<div class="circle button" role="button" data-slide="next" >
					<i class="fa-solid fa-caret-right"></i>
					<span class="sr-only" >Next Set of Pages</span>
				</div>', $post_query->max_num_pages); ?>
			</div>
		</div><!-- .row -->
	<?php endif; ?>

	
										

</div><!-- .container -->