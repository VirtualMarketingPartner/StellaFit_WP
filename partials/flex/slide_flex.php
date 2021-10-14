
<?php $type = get_sub_field('type'); ?>

<section class="container-fluid slide_flex" >
	<?php if( $type = 'quote'): ?>
		<?php if(have_rows('quotes')): while(have_rows('quotes')): ?>
			<p>Quotation</p>
		<?php endwhile; endif; ?>

	<?php elseif( $type = 'traditional' ): ?>

		<?php if(have_rows('slideshow')): while(have_rows('slideshow')): ?>
			<p>Traditional</p>
		<?php endwhile; endif; ?>
	<?php endif; ?>
</section><!-- .slide_flex -->