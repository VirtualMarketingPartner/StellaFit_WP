<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
$style = get_sub_field('style');
$bgColor = get_sub_field('color');
$bgImage = get_sub_field('hero_image'); 
$minHeight = get_sub_field('hero_height');
$fit = get_sub_field('small_image');
$rgb = get_sub_field('hero_rgb');
?>

<?php if ($style == 'bg'): ?>
<section class="container-fluid bg hero" style="background-image:url(<?= $bgImage ?>); background-position:<?php the_sub_field('hero_position'); ?>; min-height:<?= $minHeight; ?>px;" >
	<div class="container" >
		<div class="row" >
			<div class="hero-text animate" style="min-height:<?= $minHeight; ?>px;" >
				<div class="col-12" >
					<div class="text-wrapper animate" >
						<?php if(get_sub_field('content')): the_sub_field('content'); endif; ?>
					</div><!-- .text-wrapper -->
				</div><!-- .col -->
			</div><!-- .hero-text -->
		</div><!-- .row -->
	</div><!-- .container -->
	<div class="overlay" ></div>
</section><!-- .hero -->	

<?php elseif($style == 'color'): ?>
	<section class="container-fluid bg hero <?= $bgColor; ?>" style="min-height:<?= $minHeight; ?>px;" >
	<div class="container" >
		<div class="row" >
			<div class="hero-text animate" style="min-height:<?= $minHeight; ?>px;" >
				<div class="col-12" >
					<div class="text-wrapper animate" >
						<?php if(get_sub_field('content')): the_sub_field('content'); endif; ?>
					</div><!-- .text-wrapper -->
				</div><!-- .col -->
			</div><!-- .hero-text -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .hero -->

<?php elseif($style == 'none'): ?>
<section class="hero-spacer" ></section><!-- .hero-spacer -->
	
<?php endif; endwhile; ?>

<?php else: ?>
	<section class="hero-spacer" ></section><!-- .hero-spacer -->
<?php endif; ?>