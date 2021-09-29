<?php
	$contentCol = get_sub_field('content_width'); 
	$imageCol = get_sub_field('image_width'); 
	$imageSize = get_sub_field('image_cover');
?>
<div class="container combo_flex" >
	<div class="row vcenter" >
		<?php if( get_sub_field('layout') == 'image-left' ): ?>
		<div class="col-12 col-md-<?php echo $imageCol; ?>" >
			<div class="image-wrapper animate" style="background-image:url(<?php the_sub_field('image'); ?>); background-size:<?php echo $imageSize; ?>" ></div>
		</div><!-- .col -->
		<div class="col-12 col-md-<?php echo $contentCol; ?>" >
			<div class="text-wrapper animate slow" >
			<?php the_sub_field('content'); ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
		
		<?php elseif( get_sub_field('layout') == 'image-right' ): ?>
		<div class="col-12 col-md-<?php echo $contentCol; ?>" >
			<div class="text-wrapper animate slow" >
			<?php the_sub_field('content'); ?>
			</div><!-- .text-wrapper -->
		</div><!-- .col -->
		<div class="col-12 col-md-<?php echo $imageCol; ?>" >
			<div class="image-wrapper animate" style="background-image:url(<?php the_sub_field('image'); ?>); background-size:<?php echo $imageSize; ?>" ></div>
		</div><!-- .col -->
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->