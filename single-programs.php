<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content" id="flexi">
	
	<?php get_template_part('/partials/hero'); ?>
	
	<?php if ( !empty( get_the_content() ) ): ?>
	<section class="container-fluid" >
		<div class="container" >
			<div class="row animate slow" >
			<div class="col-12 offset-md-1 col-md-10" >
					<?php the_content(); ?>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .container-fluid -->
	<?php endif; ?>
	
	<?php if(have_rows('flex')): while(have_rows('flex')): the_row();
	$bgImage = get_sub_field('bg_image'); 
	$rgb = get_sub_field('bg_rgb');
	$opacity = get_sub_field('bg_overlay');
	$template = get_row_layout();
	$type = get_sub_field('posts');
	?>
	<section class="container-fluid <?php if($type == 'post'){echo 'wave';} ?> <?php the_sub_field('bg'); ?>" <?php if(get_sub_field('bg') =='bg'): ?>
			 style="background-image:url(<?php echo $bgImage; ?>);"
			<?php endif; ?>>
		<?php if(get_sub_field('bg') =='bg'): ?>
			<?php if(get_sub_field('bg_rgb', 'options')): ?>
			<div class="overlay" style="background-color:rgba(<?php echo $rgb; ?>, .<?php echo $opacity; ?>);" ></div>
			<?php else: ?>
			<div class="overlay" style="background-color:rgba(0,0,0, .<?php echo $opacity; ?>);" ></div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if( $template == 'full_flex'): ?>
		<?php get_template_part('/partials/flex/full_flex'); ?>
		
		<?php elseif( $template == 'column_flex'): ?>
		<?php get_template_part('/partials/flex/column_flex'); ?>

		<?php elseif( $template == 'cards_flex'): ?>
		<?php get_template_part('/partials/flex/cards_flex'); ?>

		<?php elseif( $template == 'combo_flex'): ?>
		<?php get_template_part('/partials/flex/combo_flex'); ?>

		<?php elseif( $template == 'slide_flex'): ?>
		<?php get_template_part('/partials/flex/slide_flex'); ?>

		<?php elseif( $template == 'post_flex' && $type !== 'programs' ): ?>
		<?php get_template_part('/partials/flex/post_flex'); ?>

		<?php elseif( $template == 'post_flex' && $type == 'programs' ): ?>
		<?php get_template_part('/partials/flex/post_programs_flex'); ?>

		<?php elseif( $template == 'expand_flex'): ?>
		<?php get_template_part('/partials/flex/pd_flex'); ?>
		<?php endif; ?>
		
	</section><!-- .container-fluid -->
	
	<?php endwhile; endif; ?>
	
</div><!-- #flexi -->
<?php endwhile; endif; ?>
<?php get_footer(); 

