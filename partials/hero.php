<?php if(have_rows('hero')): while(have_rows('hero')): the_row(); 
$style = get_sub_field('style');
$bgColor = get_sub_field('color');
$bgImage = get_sub_field('hero_image'); 
$minHeight = get_sub_field('hero_height');
$fit = get_sub_field('small_image');
$rgb = get_sub_field('hero_rgb');
$opacity = get_sub_field('hero_overlay');
?>

<?php if($style == 'bg') : ?>
<section class="container-fluid bg hero <?php echo $bgColor; ?>" style="background-image:url(<?php echo $bgImage ?>); background-position:<?php the_sub_field('hero_position'); ?>; min-height:<?php echo $minHeight; ?>px; <?php if($fit){ echo 'background-size:contain;' ;} ?>" >
	<div class="container" >
		<div class="row" >
			<div class="hero-text" >
				<div class="col-12" >
					<div class="text-wrapper animate" >
						<?php if(get_sub_field('content')): the_sub_field('content'); 
						else: ?>
						<h1><?php the_title(); ?></h1>
						<?php endif; ?>
					</div><!-- .text-wrapper -->
				</div><!-- .col -->
			</div><!-- .hero-text -->
		</div><!-- .row -->
	</div><!-- .container -->
	<?php if($fit): ?>
	<div class="overlay" ></div>
	<?php endif; ?>
</section><!-- .hero -->

<?php elseif($style == 'color'): ?>
<section class="container-fluid bg hero <?php echo $bgColor; ?>" style="min-height:300px;"  >
	<div class="container" >
		<div class="row" >
			<div class="hero-text" >
				<div class="col-12" >
					<div class="text-wrapper animate" >
						<?php if(get_sub_field('content')): the_sub_field('content'); ?>
						<?php else: ?>
						<h1><?php the_title(); ?></h1>
						<?php endif; ?>
					</div><!-- .text-wrapper -->
				</div><!-- .col -->
			</div><!-- .hero-text -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .hero -->

<?php else: ?>
<section class="hero-spacer" ></section><!-- .hero-spacer -->
<?php endif; ?>

<?php endwhile; endif; ?>
