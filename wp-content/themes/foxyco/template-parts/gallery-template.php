<?php
/**
 * Template Name: Gallery Page
 */

get_header(); ?>

<!-- Header -->
    <?php if( have_rows('banner_images')): 
          while( have_rows('banner_images')): the_row(); ?>
    <?php $BannerImg = get_sub_field('banner_image'); ?>
    
    <header class="main-banner" style="background-image:url(<?php echo $BannerImg['url']; ?>);">
    
    <?php endwhile; endif; ?> 
    
    <?php if( have_rows('banner_text')): 
          while( have_rows('banner_text')): the_row(); ?>
        <div class="title-text">
        	<h1><?php the_sub_field('banner_text')?></h1>
        </div> 
    <?php endwhile; endif; ?>          
    </header>

    <!-- Services -->
    <section id="middile">
    <div class="top-cv"></div>
      <div class="container">
		<div class="gallery-main">
            <ul class="gallery-box imageGallery1">
			<?php if( have_rows('gallery_images')): 
          			while( have_rows('gallery_images')): the_row(); ?>
                    <?php $GalleryImg = get_sub_field('image'); ?>
            	<?php /*?><li><a href="<?php echo $GalleryImg['url']; ?>"><img src="<?php echo $GalleryImg['url']; ?>" alt="" title=""/></a></li><?php */?>
                <li><img src="<?php echo $GalleryImg['url']; ?>" alt="" title=""/></li>
                
			<?php endwhile; endif; ?> 
            </ul>
        </div>
    
       </div>
      
      <div class="bot-cv"></div>
    </section>

    
    
    <section class="instagram-main">
    <h3>share your TASTY INSTAGRAM SHOTS</h3>
    	<?php echo do_shortcode('[insta-gallery id="1"]'); ?>
    </section>



<?php get_footer(); ?>
