 <div class="container column_flex" >
	<div class="row" >
		<div class="col-12" >
            <div class="row" >
                <div class="col-12" >
                    <div class="text-wrapper animate slow" >
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
            </div>
            <?php $count = count(get_sub_field('columns'));  if(have_rows('columns')): ?>
            <div class="row" >
                <?php while(have_rows('columns')): the_row(); 
                $colSize = get_sub_field('column_size'); ?>
                <div class="col-12 col-md-6 col-lg <?php 
                        if($colSize == 4){ echo "col-lg-12"; }else  
                        if($colSize == 2){ echo "col-lg-6"; }else  
                        if($colSize == 3){ echo "col-lg-4"; }else 
                        if($colSize == 1){ echo "col-lg-3"; }?>" >
                    <?php the_sub_field('content'); ?>
                </div><!-- .col -->
                <?php endwhile; ?>
            </div><!-- .row -->

            <div class="row" >
                <div class="col" >
                    <?php the_sub_field('after_content'); ?>
                </div><!-- .col -->
            </div><!-- .row -->
            <?php endif; ?>
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->