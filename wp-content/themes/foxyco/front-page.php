<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage foxyco
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Welcome To Foxyco</title>
<link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet"> 
<!--font-family: 'Oswald', sans-serif;-->

<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/landing/css/style.css" rel="stylesheet">
</head>

<body>
    <div id="sitemain">
        <div class="main-bg">
            <div class="foxyco">
                <div class="bg"></div>
                <div class="main">
                    <h2>WELCOME TO</h2>
                    <div class="thumb"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/landing/images/foxyco-logo.png"></div>
                    <a href="http://foxycodallas.com/home" target="_blank">go to website</a>
                </div>
            </div>
            
            <div class="stock-barrel">
                <div class="bg"></div>
                <div class="main">            
                    <h2>WELCOME TO</h2>
                    <div class="thumb"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/landing/images/stock-barrel-logo.png"></div>
                    <a href="http://stockandbarreldallas.com/home" target="_blank">go to website</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>