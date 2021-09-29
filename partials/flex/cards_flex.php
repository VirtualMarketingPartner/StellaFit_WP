<div class="container cards_flex" >
	<div class="row" >
		<div class="col-12" >
			<div class="text-wrapper animate slow" >
				<?php the_sub_field('content'); ?>
				
				<?php if(have_rows('cards')): ?>
					<div class="row card-row" >
						<?php while(have_rows('cards')): the_row(); ?>
						<div class="col" >
							<div class="card <?php if(get_sub_field('card_style') == 'dark'){echo 'bottom';} ?> animate" >
								<div class="card-body text-wrapper" >
									<?php if(get_sub_field('icon_type') == 'icon'): ?>
									<div class="icon" >
										<i class="<?php the_sub_field('icon'); ?>"></i>
									</div><!-- .icon --> 
									
									<?php elseif(get_sub_field('icon_type') == 'image'): ?>
									<div class="image-wrapper icon" style="background-image:url(<?php the_sub_field('image_icon'); ?>);"></div> 
									<?php else: ?>
									
									<?php endif; ?>
									
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