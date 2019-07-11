<?php require_once('../../../wp-load.php'); ?>

<!DOCTYPE html>
<html lang="en">
<body>

<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet" type="text/css"> 
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,400i,500,600,700" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/style.css" rel="stylesheet" type="text/css">    
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/open-table.css" rel="stylesheet" type="text/css">    

	<?php dynamic_sidebar( 'opentablewidet' ); ?>
    
    
<link href="<?php echo esc_url( plugins_url( 'open-table-widget/assets/css/otw-datepicker.css') ); ?>" rel="stylesheet" type="text/css">

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( plugins_url( 'open-table-widget/assets/js/open-table-widget.js') ); ?>"></script>
<script type="text/javascript" src="<?php echo esc_url( plugins_url( 'open-table-widget/assets/js/datepicker.js') ); ?>"></script>

</body>