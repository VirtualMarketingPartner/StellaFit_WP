<?php if(have_rows('sidebar', 'options')): while(have_rows('sidebar', 'options')): the_row(); ?>
<div class="sidebarBlock" >
    <?php if(get_sub_field('image')): ?>
        <div class="image-wrapper" style="background-image:url(<?php the_sub_field('image'); ?>);"></div>
    <?php endif; ?>
    <?php if(get_sub_field('content')): ?>
        <div class="content" >
            <?php the_sub_field('content'); ?>
        </div>
    <?php endif; ?>
</div><!-- .sidebarBlock -->
<?php endwhile; endif; ?>