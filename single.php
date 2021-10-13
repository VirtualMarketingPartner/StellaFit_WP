
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('/partials/postHero'); ?>

<section class="container-fluid post" >
		<div class="container" >
			
			<div class="row" >
				<div class="col-12 col-md-8 post-body" >
                    <div class="text-wrapper" >
                    <p class="sub-title" ><?php the_date(); ?></p>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div><!-- .text-wrapper -->
				</div><!-- .col .post-body -->

                <div class="col-12 col-md-4 offset-lg-1 col-lg-3 post-sidebar" >
                    <?php get_sidebar(); ?>
                </div>
				
			</div><!-- .row -->
			
		</div><!-- .container -->
	</section><!-- .post -->



	<?php wp_reset_postdata(); endwhile; endif; ?>
<?php get_footer(); 