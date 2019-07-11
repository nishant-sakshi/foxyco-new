<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>


 <!-- Header -->
    <?php if( have_rows('banner_images')): 
          while( have_rows('banner_images')): the_row(); ?>
    <?php $BannerImg = get_sub_field('banner_image'); ?>
    
    <header class="main-banner" style="background-image:url(<?php echo $BannerImg['url']; ?>);">
     <?php 
		endwhile;
		endif; ?>  
      
        <div class="title-text"><h1>Serving Modern American Cuisine</h1></div>
      
		
    </header>

<!-- Services -->
    <section id="middile">
    <div class="top-cv"></div>
      <div class="container">
        <div class="row text-center location-time">
          <div class="col-md-4">            
          	<h1>Location</h1>
            <div class="location-box location-box-bg">
            	<div class="inner">
            	<span>dallas</span>
                <p>&nbsp;</p>
                <?php if( have_rows('location_addresss')): 
                      while( have_rows('location_addresss')): the_row();?>
                
                <div class="address"><?php the_sub_field('location_addresss')?></div>
                <a href="<?php the_sub_field('location_link')?>" target="_blank">DIRECTIONS</a>
                <?php 
				endwhile;
                endif; ?>
                </div>
            </div>
            
          </div>
          
          <div class="col-md-4">            
          	<h1>Hours</h1>
            <div class="location-box">
            <div class="inner">
            	<?php if( have_rows('hours')): 
                      while( have_rows('hours')): the_row();?>
                      
            	<!--<span>LUNCH HOURS</span>                
                <div class="address"><?php the_sub_field('lunch_hours')?></div>
                <p>&nbsp;</p>-->
				<span>DINNER HOURS</span>                
                <div class="address"><?php the_sub_field('dinner_hours')?></div>
                <p>&nbsp;</p>
                <!--<span>BRUNCH HOURS</span>                
                <div class="address"><?php the_sub_field('brunch_hours')?></div>-->
                <a href="<?php the_sub_field('reservations_link')?>" target="_blank">reservations</a>
                <!--<a href="<?php the_sub_field('deliverys_link')?>" target="_blank">deliveries</a>-->
                <p>&nbsp;</p>
               <p><span>*We hold back our high tables for walk-in guests, every day, For groups over 9.</span></p>
				<?php 
				endwhile;
                endif; ?>
            </div>
            </div>
            
          </div>
          
          <div class="col-md-4">            
          	<h1>featured</h1>
            <?php if( have_rows('featured')): 
            	  while( have_rows('featured')): the_row(); ?>
                  
            <?php $featuredImg = get_sub_field('featured_image'); ?>
            
            <div class="location-box featuredn-bg" style="background-image:url(<?php echo $featuredImg['url']; ?>);">
            	<div class="inner">
            	<span><?php the_sub_field('featured_title')?><br><br></span>
                <div class="address"><?php the_sub_field('featured_hours')?></div>
                </div>
            <?php 
				endwhile;
                endif; ?>    
            </div>
            
          </div>
          
          
        </div>
        
        <div class="welcome">
        	<?php the_field('content')?>
</div>
      </div>
      
      
      
      <div class="bot-cv"></div>
    </section>

    
    
    <section class="instagram-main">
    <h3>share your TASTY INSTAGRAM SHOTS</h3>
    	<?php echo do_shortcode('[insta-gallery id="1"]'); ?>
    </section>

<?php get_footer(); ?>
