<h3>Follow StellaFit</h3>
<?php get_template_part('/partials/socials'); ?>
<br/>

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

<div class="sidebarBlock" >
	<div class="content" >
        <h3>Categories</h3>
        <ul class="sidebar-posts">
            <?php 
            $cats = get_categories($args);
            foreach($cats as $category): ?>
            <li>
                <?php the_field('icon', $category); ?>
                <a href="/category/<?php echo $category->slug; ?>" >
                    <span class="text-left" ><?php echo $category->name; ?></span>
                    <span class="text-right" ><?php echo $category->category_count; ?></span>
                </a>

            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div><!-- .sidebarBlock -->

<div class="sidebarBlock" >
    <div class="content">
        <h3>Search</h3>
        <?php get_search_form(); ?>
    </div>
</div><!-- .sidebarBlock -->