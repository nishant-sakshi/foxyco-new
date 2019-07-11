<?php
/**
 * Template Name: Menu Page
 */

get_header(); 

$RS_Menu = get_posts(
			array(
					'post_type'   => 'menus',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'orderby' => 'ID',
					'order' => 'ASC',
				)
			);

//echo "<pre>"; print_r($RS_Menu); exit;
?>

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
    <div class="menu-page">
    	<div class="menu-center">
        	<ul>
            <?php if( have_rows('menu')): 
         	while( have_rows('menu')): the_row(); ?>
            <?php $menu_pdf = get_sub_field('menu_pdf'); ?>
            	<li>
                	<a href="<?php echo $menu_pdf['url']; ?>" target="_blank"><?php the_sub_field('menu_name')?></a>
                </li>
            <?php endwhile; endif; ?>          
            </ul>
        </div>
    </div>
    </div>
    <div class="bot-cv"></div>
    </section>
    
    
    <section class="footer-bg"></section>



<?php get_footer(); ?>
