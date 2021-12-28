</div><!-- #content -->

<div id="footer">
	<div class="container-fluid" id="footer_row1">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4 text-center text-md-left">
					<a class="image-wrapper" id="footer-logo" href="<?php bloginfo('url'); ?>" style="background-image:url(<?php the_field('logo', 'options'); ?>);"></a>
					<?php the_field('footer_address', 'options'); ?>
				</div><!-- .col -->

				<div class="col-12 col-md-4 text-center text-md-left">
					<?php the_field('footer_phone', 'options'); ?>
					<?php get_template_part('partials/socials'); ?>
				</div><!-- .col -->

				<div class="col-12 col-md-3 text-center text-md-left">
					<h6>Menu</h6>
					<?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
				</div><!-- .col -->
			</div><!-- .row -->
			<hr>
			<div class="row">
				<div class="col-12 text-center copyright">
					<?php the_field('copyright', 'options'); ?>
				</div><!-- .col -->
			</div>
		</div><!-- .container -->
	</div><!-- #footer_row1 -->
</div><!-- #footer -->

<?php wp_footer(); ?>

</body>
<link rel="preload" href="/library/fonts/SeptemberMornings.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="https://use.typekit.net/fbr1gut.css">

</html>