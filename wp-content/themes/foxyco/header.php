<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<meta name="viewport" content="width=device-width, initial-scale=1 initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Bootstrap core CSS -->
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet" type="text/css"> 
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,400i,500,600,700" rel="stylesheet"> 


<!-- Custom styles for this template -->
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/simpleLightbox.min.css">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/jquery.fancybox.css" type="text/css" media="screen" />
    

<?php wp_head(); ?>
</head>

<body id="page-top">
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo esc_url( home_url( '/home' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.png" alt=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        	<?php 
				if( has_nav_menu( 'headermenu' ) ) :
					wp_nav_menu( array( 'theme_location' => 'headermenu', 'container' => '', 'menu_class' => '', 'container_class'=>'', 'depth' => 0, 'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav text-uppercase ml-auto">%3$s</ul>' ) );
				endif;
			?>
          <!--<ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a href="about-us.html">About</a>
            </li>
            <li class="nav-item">
              <a href="menu.html">MENU</a>
            </li>
            <li class="nav-item">
              <a href="gallery.html">Gallery</a>
            </li>
            <li class="nav-item">
              <a href="#">PRESS</a>
            </li>
            <li class="nav-item">
              <a href="contact.html">Contact</a>
            </li>
          </ul>-->          
        </div>
        <div class="book-a-table">
	            <a href="<?php echo esc_url( get_template_directory_uri() ); ?>/open-table-widget.php?widgetID=1" class="opentablewidget fancybox.iframe">BOOK A Table</a>
            </div>
      </div>
    </nav>

   
