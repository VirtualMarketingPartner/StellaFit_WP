<?php 
	$content = get_sub_field('content');
	$style = get_sub_field('tab_content'); 
?>
<?php if( $content ): ?>
<div class="container" >
	<div class="row" >
		<div class="col-12 offset-md-1 col-md-10" >
			<div class="text-wrapper animate slow" >
				<?= $content ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if(have_rows('tabs')): ?>
<div class="container tab_flex" style="padding-bottom: 150px;" >
	<div class="row " >
		<div class="col-12 offset-md-1 col-md-10" >
			<ul class="nav" role="tablist">
				<?php while(have_rows('tabs')): $NavCount = get_row_index();  the_row();
				$icon = get_sub_field('icon'); 
				$tabLabel = get_sub_field('title');
				$tabContent = get_sub_field('content');
				$urlParam = (isset($_GET['fav']) && trim($_GET['fav']) == $tabLabel );
				?>

				<li class="col-12 col-md text-center nav-item">
					<a class="nav-link <?php if($urlParam){echo 'active'; } ?>" id="nav-<?= $NavCount; ?>" data-toggle="tab" href="#tab-<?= $NavCount; ?>" role="tab" aria-controls="nav-<?= $NavCount; ?>" aria-selected="true">
						<?php if( $icon ): ?><i class="fa-duotone fa-<?= $icon ?>"></i><br><?php endif; ?>
						<?= $tabLabel ?>
					</a>
				</li>
				<?php endwhile; ?>
				<div class="indicator" ></div>
			</ul><!-- .nav -->
			
			<div class="tab-content" id="group-content">
				<?php while(have_rows('tabs')): $TabCount = get_row_index(); the_row(); 
				$icon = get_sub_field('icon'); 
				$tabLabel = get_sub_field('title');
				$tabContent = get_sub_field('content');
				$urlParam = (isset($_GET['fav']) && trim($_GET['fav']) == $tabLabel );
				?>
				
				<div class="tab-pane fade <?php if($urlParam){echo 'show active'; } ?>" id="tab-<?= $TabCount; ?>" role="tabpanel" aria-labelledby="nav-<?= $TabCount; ?>">
					<?php if($style == 'posts'): ?>
						
						<?php $posts = get_sub_field('posts'); if( $posts ): ?>
						<div class="row" >
							<?php foreach( $posts as $post ): setup_postdata($post); 
							$postType = get_post_type();
							?>
							<div class="col-12 col-md-6 col-lg-4" >
								<div class="card" style="padding: 10px; min-height: 120px; margin: 10px auto;" >
									<div class="row postItemBody">
										<?php if($postType == 'videos' || $postType == 'podcasts'): ?>
											<div class="video-wrapper iframe-container" ><?php the_content(); ?></div>
										
										<?php else: ?>
											<?php if( has_post_thumbnail() ): ?>
											<div class="col-12 col-md-4">
												<a href="<?php the_permalink(); ?>" class="image-wrapper" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>); min-height: 100px; background-color: #f5f5f5; background-position: center center; background-size: cover; background-repeat:no-repeat;"></a>
											</div>
											<?php else: ?>
											<div class="col-12 col-md-4">
												<a href="<?php the_permalink(); ?>" class="image-wrapper" style="min-height: 100px; background-color: #f5f5f5; background-position: center center; background-size: contain; background-repeat:no-repeat;"></a>
											</div>
										<?php endif; ?>

										<?php endif; ?>
										<div class="col-12 col-md-8">
											<h4><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<br />
											<a class="button inverted" href="<?php the_permalink(); ?>">
												<?php
												if($postType == 'recipes'): ?>
													<?php the_field('see_recipe', 'options'); ?>
												<?php elseif($postType == 'podcasts'): ?>
													<?php the_field('listen_now', 'options'); ?>
												<?php elseif($postType == 'videos'): ?>
													<?php the_field('watch_now', 'options'); ?>
												<?php else: ?>
													<?php the_field('read_more', 'options'); ?>
												<?php endif; 
												?>
											</a>
										</div>
									</div><!-- .postItemBody -->
								</div><!-- .card -->
							</div><!-- .col -->
							<?php endforeach; wp_reset_postdata(); ?>
						</div>
						<?php endif;?>


					<?php elseif( $style == 'custom' ): ?>
						<?php echo the_sub_field('custom_content'); ?>
					<?php endif; ?>
				</div><!-- .tab-pane -->
				<?php endwhile; wp_reset_postdata(); ?>
			</div><!-- .#group-content -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->
<?php endif; ?>


<script type="text/javascript" >
	jQuery(function($){
		$(window).on("load resize scroll", function() {
			
			if( !$('.nav li a').hasClass('active') ){
				$('.nav li:first-child a').addClass('active');
				
			}else{
			}

			//  slide indicator for tabs
			var currentNav = $('.nav li a.active').parent('li');
			var startNavPos = $(currentNav).position(); 
			var startNavLeft = startNavPos.left + 5;
			var startNavWidth = $(currentNav).width();
			//set default size & pos
			$('.tab_flex .indicator').css({
				left: +startNavLeft,
				width: startNavWidth
			});

			//set hover size & pos
			$('.nav li').hover(function () {
				var currentNavPos = $(this).position();
				var currentNavLeft = currentNavPos.left + 5;
				var currentNavWidth = $(this).width();
				$('.tab_flex .indicator').css({
					left: +currentNavLeft,
					width: currentNavWidth
				});
			});
			
	
		});
	});

</script>