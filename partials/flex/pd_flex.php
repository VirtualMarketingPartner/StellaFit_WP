
<div class="container pd_flex" >
	<div class="row" >
		<div class="col-12 col-md-6" >
		<?php the_sub_field('content'); ?>

        <?php if(have_rows('pd_repeater')):  while(have_rows('pd_repeater')): the_row(); ?>
			<div class="expand" >
				<a class="expand-header" >
				<i class="far fa-angle-right indicator"></i> 
					<?php the_sub_field('pd_label'); ?>
				</a>
				<div class="expand-content" >
					<?php the_sub_field('pd_content'); ?>
				</div><!-- .expand-content -->
			</div><!-- .expand -->
		<?php endwhile; endif; ?>
        </div><!-- .col -->

        <div class="col-12 col-md-6" >
        <div class="image-wrapper shape animate" style="background-image:url(<?php the_sub_field('pd_image'); ?>); background-size:cover; background-position:center center; height: 500px;" ></div>
        </div>
	</div><!-- .row -->
</div><!-- .container -->