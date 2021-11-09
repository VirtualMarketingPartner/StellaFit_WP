<?php 
$layout = get_sub_field('layout');
if( $layout == 'overlap'): ?>
<div class="container-fluid cards_flex" >
		<div class="row" >
			<div class="container" >
				<div class="col-12" >
					<div class="text-wrapper animate slow" >
						<?php the_sub_field('content'); ?>
					</div>
				</div><!-- .col -->
			</div>
		</div><!-- .row -->

	<?php if(have_rows('cards')): ?>
	<div class="cards-wrapper">
		<div class="container" >
			<div class="row card-row">
				<?php while(have_rows('cards')): the_row(); ?>
				<?php $cardStyle = get_sub_field('card_style'); ?>
					<div class="col" >
						<div class="card <?php echo $cardStyle; ?> animate" >
							<div class="card-body text-wrapper" >
								<?php the_sub_field('content'); ?>
							</div><!-- .card-body -->
						</div><!-- .card -->
					</div><!-- .col -->
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .card-wrapper -->
	<?php endif; ?>

</div><!-- .container -->
<?php else: ?>
<div class="container" >
	<div class="row" >
		<div class="col-12" >
			<div class="text-wrapper animate slow" >
				<?php the_sub_field('content'); ?>
				
				<?php if(have_rows('cards')): ?>
					<div class="row card-row" >
						<?php while(have_rows('cards')): the_row(); ?>
						<?php $cardStyle = get_sub_field('card_style'); ?>
						<div class="col" >
							<div class="card <?php echo $cardStyle; ?> animate" >
								<div class="card-body text-wrapper" >
									<?php the_sub_field('content'); ?>
								</div><!-- .card-body -->
							</div><!-- .card -->
						</div><!-- .col -->
						<?php endwhile; ?>
					</div><!-- .row -->
				<?php endif; ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->
<?php endif; ?>

