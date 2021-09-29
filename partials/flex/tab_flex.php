<?php if(have_rows('tabs')):  ?>
<div class="container tab_flex" >
	<div class="row " >
		<div class="col-12" >
			<ul class="nav" role="tablist">
				<?php $NavCount=0; while(have_rows('tabs')): the_row(); ?>
				<li class="col-12 col-md text-center nav-item">
					<a class="nav-link <?php if( $NavCount==0 ){ echo 'active'; } ?>" id="nav-<?php echo $NavCount; ?>" data-toggle="tab" href="#tab-<?php echo $NavCount; ?>" role="tab" aria-controls="nav-<?php echo $NavCount; ?>" aria-selected="true">
						<i class="far fa-<?php the_sub_field('icon'); ?>"></i><br>
						<?php the_sub_field('title'); ?>
					</a>
				</li>
				<?php $NavCount++; endwhile; ?>
				<div class="indicator" ></div>
			</ul><!-- .nav -->
			
			<div class="tab-content" id="group-content">
				<?php $TabCount=0; while(have_rows('tabs')): the_row(); ?>
				<div class="tab-pane fade <?php if( $TabCount==0 ){ echo 'show active'; } ?>" id="tab-<?php echo $TabCount; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $TabCount; ?>">
					<?php the_sub_field('content'); ?>
				</div><!-- .tab-pane -->
				<?php $TabCount++; endwhile; wp_reset_postdata(); ?>
			</div><!-- .#group-content -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->
<?php endif; ?>