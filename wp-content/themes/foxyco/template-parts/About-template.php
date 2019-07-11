<?php
/**
 * Template Name: About us Page
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
        <div class="row text-center">
          <div class="about-us">
          	<div class="about-text">
        		<?php the_field('content')?>
            </div>
            
            <?php if( have_rows('about_image')): 
          	while( have_rows('about_image')): the_row(); ?>
    		<?php $AboutImg = get_sub_field('about_image'); ?>
				<div class="about-pic"><p><img src="<?php echo $AboutImg['url']; ?>" alt=""></p></div>
			<?php endwhile; endif; ?> 
		    </div>
          
        </div>
      </div>
      <div class="bot-cv"></div>
    </section>

    
    
    <section class="footer-bg"></section>



<?php get_footer(); ?>
