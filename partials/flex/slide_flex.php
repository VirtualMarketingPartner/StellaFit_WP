<section class="container-fluid slide_flex" >
    <div class="container" >
        <div class="row" >
            <div class="col-12 offset-md-1 col-md-10" >
                <div class="row vcenter" >
                    <div class="col-12 col-md-4" >
                        <div class="image-wrapper" style="background-image:url(<?php the_sub_field('image'); ?>);" ></div>
                    </div>
                    <div class="col-12 offset-md-1 col-md-7" >
                        <div class="hero-text" >
                            <div class="content" >
								<h2><?php the_sub_field('header'); ?></h2>

								<div id="slideshow" class="carousel slide carousel-fade" data-ride="carousel" >
									<div class="carousel-inner" >
										<?php if(have_rows('slideshow')): while( have_rows('slideshow')): $count = get_row_index(); the_row(); ?>
										<div class="carousel-item <?php if( $count== 0 ){echo 'active'; } ?>" >
											<?php the_sub_field('content'); ?>
										</div><!-- .carousel-item -->
										<?php endwhile; endif; ?>
									</div><!-- .carousel-inner -->
									<div class="carousel-navigation text-center text-md-right" >
										<a class="carousel-prev button" href="#slideshow" role="button" data-slide="prev" >
											<i class="fa-solid fa-arrow-left-long"></i>
											<span class="sr-only" >Previous</span>
										</a>
										<a class="carousel-next button" href="#slideshow" role="button" data-slide="next" >
											<i class="fa-solid fa-arrow-right-long"></i>
											<span class="sr-only" >Next</span>
										</a>
									</div><!-- .carousel-nav -->
								</div><!-- #slideshow -->
                            </div><!-- .content -->
                        </div><!-- .hero-text -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>