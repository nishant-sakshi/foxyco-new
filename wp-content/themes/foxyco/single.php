<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage foxyco
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<header class="masthead" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/home-banner.jpg);">
      <div class="container">
        <div class="intro-text"></div>
      </div>
    </header>

<section id="middile">
    <div class="top-cv"></div>
      <div class="container">
      h1><?php the_title(); ?></h1>
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();
            the_content();
        endwhile; // End of the loop.
        ?>
    </div>
</section>

<?php get_footer();
