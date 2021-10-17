
<?php if( have_rows('slideshow')): ?>

	<section class="container-fluid slide_flex" >
		<div id="slideshow" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators" >
				<?php while( have_rows('slideshow')): $count = get_row_index(); the_row(); ?>
				<li data-target="#slideshow" data-slide-to="<?php echo $count; ?>" class="<?php if($count==0){echo 'active'; } ?>" ></li>
				<?php endwhile; ?>
			</ol>
			<div class="carousel-inner" >
			<?php while( have_rows('slideshow')):  $count = get_row_index();  the_row(); ?>
				<div class="carousel-item <?php if( $count== 0 ){echo 'active'; } ?>" style="background-color:var(--white);" >
					<div class="container" >
						<div class="row" >
                            <div class="col-12 col-md-3" >
                                <div class="image-wrapper" style="background-image:url(<?php the_sub_field('image'); ?>);" ></div>
                            </div>
							<div class="col-12 col-md-9 lg-offset-1 col-lg-8" >
								<div class="hero-text animate" >
									<div class="content" >
										<?php the_sub_field('content'); ?>
									</div><!-- .content -->
								</div><!-- .hero-text -->
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .container -->
					
				</div><!-- .carousel-item -->
			<?php endwhile; ?>		
			</div><!-- .carousel-inner -->
		</div><!-- #slideshow -->
	</section><!-- .slide_flex -->
<?php endif; ?>