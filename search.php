
<?php get_header(); ?>

<div class="content" id="post_list">
	
	<section class="container-fluid" >
		<div class="container" >
			<div class="row" >
				<div class="col-sm-12 col-md-8" >
				<h1><?php printf(__('Search Results for: %s', 'materialwp'), '<span>' . get_search_query() . '</span>');?></h1>
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="row" >
							<div class="col" >
								<div class="postItem">
									<div class="row postItemBody">
										<?php 
										$catID = get_the_category($id);
										$cat = $catID[0]->name;
										?>
										<div class="col-12 col-md-3">
											<a href="<?php the_permalink(); ?>" class="imageWrapper" style="background-image:url(<?php echo the_field( $cat , 'options'); ?>);"></a>
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
							</div>
						</div>
					<?php endwhile; else: ?>

					<div class="row" >
						<div class="col" >
							<p><?php the_field('empty_search', 'options'); ?></p>
							<h3>Nothing to see here.</h3>
						</div>
					</div><!-- .row -->
				<?php endif; ?>
					<div class="row" id="pagination">
						<div class="col-12 col-md-8 text-right" >
							<?php next_posts_link('<div class="circle button prev" role="button" data-slide="next" >
								<i class="fa-solid fa-arrow-left-long"></i>
								<span class="sr-only" >Prev</span>
							</div>', $post_query->max_num_pages); ?>
							<p style="display: inline-block;">More Posts</p>
							<?php previous_posts_link('<div class="circle button" role="button" data-slide="next" >
								<i class="fa-solid fa-arrow-right-long"></i>
								<span class="sr-only" >Next</span>
							</div>', $post_query->max_num_pages); ?>
						</div>
					</div><!-- .row -->
				</div><!-- .col -->
				
				<div class="col-12 offset-md-1 col-md-3">
					<?php get_template_part('partials/sidebar'); ?>
				</div>	
			</div><!-- .row -->

		</div><!-- .container -->
	</section><!-- .insights -->
	
</div><!-- #post_list -->

<?php get_footer(); 
