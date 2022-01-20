<?php if(have_rows('tabs')):  ?>
<div class="container tab_flex" >
	<div class="row " >
		<div class="col-12 offset-md-1 col-md-10" >
			<ul class="nav" role="tablist">
				<?php $NavCount == 0; while(have_rows('tabs')): the_row(); ?>
				<li class="col-12 col-md text-center nav-item">
					<a class="nav-link <?php if( $NavCount==0 ){ echo 'active'; } ?>" id="nav-<?= $NavCount; ?>" data-toggle="tab" href="#tab-<?= $NavCount; ?>" role="tab" aria-controls="nav-<?= $NavCount; ?>" aria-selected="true">
						<i class="fa-duotone fa-<?php the_sub_field('icon'); ?>"></i><br>
						<?php the_sub_field('title'); ?>
					</a>
				</li>
				<?php $NavCount++; endwhile; ?>
				<div class="indicator" ></div>
			</ul><!-- .nav -->
			
			<div class="tab-content" id="group-content">
				<?php $TabCount == 0; while(have_rows('tabs')): the_row(); ?>
				<div class="tab-pane fade <?php if( $TabCount==0 ){ echo 'show active'; } ?>" id="tab-<?= $TabCount; ?>" role="tabpanel" aria-labelledby="nav-<?= $TabCount; ?>">
					<?php the_sub_field('content'); ?>
				</div><!-- .tab-pane -->
				<?php $TabCount++; endwhile; wp_reset_postdata(); ?>
			</div><!-- .#group-content -->
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->
<?php endif; ?>


<script type="text/javascript" >
	jQuery(function($){
		$(window).on("load resize scroll", function() {
			
			//  slide indicator for tabs
			var currentNav = $('.nav li a.active').parent('li');
			var startNavPos = $(currentNav).position(); 
			var startNavLeft = startNavPos.left + 5;
			var startNavWidth = $(currentNav).width();
			//set default size & pos
			$('.tab_flex .indicator').css({
				left: +startNavLeft,
				width: startNavWidth
			});

			//set hover size & pos
			$('.nav li').hover(function () {
				var currentNavPos = $(this).position();
				var currentNavLeft = currentNavPos.left + 5;
				var currentNavWidth = $(this).width();
				$('.tab_flex .indicator').css({
					left: +currentNavLeft,
					width: currentNavWidth
				});
			});
			
	
		});
	});

</script>