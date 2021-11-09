<?php 
$bgColor = 'grey';
$bgImage = get_the_post_thumbnail_url();
$minHeight = '400';
?>

<?php if($bgImage) : ?>
<section class="container-fluid bg hero <?php echo $bgColor; ?>" style="background-image:url(<?php echo $bgImage ?>); min-height:<?php echo $minHeight; ?>px; background-size:cover; background-repeat:no-repeat; background-position: center center; background-attachment: fixed;" >
</section><!-- .hero -->

<?php else:  
    // do nothing
endif; ?>