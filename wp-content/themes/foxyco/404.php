<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
        <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'stockbarrel' ); ?></h1>
    </div>
</section>
<?php get_footer();
