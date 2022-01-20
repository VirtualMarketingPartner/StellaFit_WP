
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="container-fluid post recipe" >
		<div class="container" >
			
			<div class="row" >
				<div class="col-12 offset-md-2 col-md-8 post-body" >
                    <div class="text-wrapper" >
                        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
                        if($thumb): ?>
                            <div class="imageWrapper" style="background-image:url(<?php echo $thumb[0]; ?>);"></div>
                        <?php endif; ?>
                        <h1><?php the_title(); ?></h1>
                                
                        <?php the_content(); ?>

                        <?php if( get_field('yield') ): ?>
                            <p>
                                <strong>Yield: </strong> 
                                <?php the_field('yield'); ?></p>
                        <?php endif; ?>

                        <hr />
                        
                        <?php if( get_field('ingredients') ): ?>
                            <h2>Ingredients</h2>
                            <?php the_field('ingredients'); ?>
                        <?php endif; ?>
                        <?php if( get_field('instructions') ): ?>
                            <h2>Instructions</h2>
                            <?php the_field('instructions'); ?>
                        <?php endif; ?>
                        <?php if( get_field('notes') ): ?>
                            <h2>Notes</h2>
                            <?php the_field('notes'); ?>
                        <?php endif; ?>
                    </div><!-- .text-wrapper -->
					
				</div><!-- .col .post-body -->
				
			</div><!-- .row -->
			
		</div><!-- .container -->
	</section><!-- .post -->



	<?php wp_reset_postdata(); endwhile; endif; ?>
<?php get_footer(); 