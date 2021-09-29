</div><!-- #body -->

<div id="footer" >
	<div class="container-fluid" >
		<div class="container" >
			<div class="row" >
				<div class="col-12 col-md-5">
					<div class="row" >
						<div class="col-12 col-md-3" >
							<a class="image-wrapper" id="footer-logo" href="<?php bloginfo('url'); ?>" style="background-image:url(<?php the_field('footer_logo', 'options'); ?>);" ></a>
						</div><!-- .col -->
						
						<div class="col-12 col-md-9 text-center text-md-left" >
							<?php the_field('footer_address','options'); ?>
							<?php the_field('footer_phone', 'options'); ?>
							<?php get_template_part('partials/socials'); ?>
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .col -->
				
				<div class="col-12 col-md-7" >
					<div class="row" >
						<div class="col text-center text-md-right" >
							<?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
						</div><!-- .col -->
					</div><!--.row -->
					
					<div class="row" >
						<div class="col text-center text-md-right" >
							<br>
							<?php the_field('copyright','options'); ?>
						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .container-fluid -->
</div><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>