<?php
	$contentCol = 8; //get_sub_field('content_width'); 
	$imageCol = 4; //get_sub_field('image_width'); 
	$image = get_sub_field('image');
	$imageSize =  cover; //get_sub_field('image_cover');
	$imagePos = get_sub_field('image_position');
?>
<div class="container combo_flex" >
	<div class="row vcenter" >
		<?php if( get_sub_field('layout') == 'image-left' ): ?>
		<div class="col-12 col-md-<?php echo $imageCol; ?>" >
			<div class="image-wrapper animate" style="background-image:url(<?php echo $image; ?>); background-size:<?php echo $imageSize; ?>; background-position:<?php echo $imagePos; ?>" ></div>
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
		<div class="image-wrapper animate" style="background-image:url(<?php echo $image; ?>); background-size:<?php echo $imageSize; ?>; background-position:<?php echo $imagePos; ?>" ></div>
		</div><!-- .col -->
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->