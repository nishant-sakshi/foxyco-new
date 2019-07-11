<?php
session_start();


if( isset($_POST['submit']) && $_POST['submit'] != '' )
{
	$fullname = $_REQUEST['fullname'];
	$email = $_REQUEST['email'];
	$phone_number = $_REQUEST['phone_number'];
	$touch_about = $_REQUEST['touch_about'];
	$message = $_REQUEST['message'];
	
	global $wpdb;
		
		$insert="INSERT INTO ".$wpdb->prefix."tbl_contact_us (`id`, `name`, `email`, `phone_number`,`touch_about`,`message`) VALUES (NULL,'".$fullname."', '".$email."', '".$phone_number."','".$touch_about."','".$message."');";
		
		$result = $wpdb->get_results($insert); 
		
		$mailcontent="<style>
		table td{
			border:none;
			padding:5px;
			font-size:12px;
			font-family:Arial, Helvetica, sans-serif;
		}
		.pp{
			font-size:12px;
			font-family:Arial, Helvetica, sans-serif;
		}
	</style>";
	
	$mailcontent.="
	<html>
		<body>
			<table cellpadding=\"3\" cellspacing=\"3\" border=0>

				<tr>
					<td>
						<span class='pp'>Dear Administrator</span>,<br><br>
					</td>
				</tr>

				<tr>
					<td colspan=\"2\">
						<span class='pp'>You have received Contact request from  Foxyco:- </span><br><br>
					</td>
				</tr>
				
				<tr>
					<td align=\"left\" width=\"30%\">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name:</strong></td>
					<td align=\"left\" width=\"70%\">&nbsp;&nbsp;&nbsp;&nbsp;".(ucwords($fullname))."</td>
				</tr>
				
				
				<tr>
					<td align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Email:</strong></td>
					<td align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;".$email."</td>
				</tr>
				
				<tr>
					<td align=\"left\" width=\"30%\">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Phone Number:</strong></td>
					<td align=\"left\" width=\"70%\">&nbsp;&nbsp;&nbsp;&nbsp;".$phone_number."</td>
				</tr>
				
				<tr>
					<td align=\"left\" width=\"30%\">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Touch About:</strong></td>
					<td align=\"left\" width=\"70%\">&nbsp;&nbsp;&nbsp;&nbsp;".(ucwords($touch_about))."</td>
				</tr>
				
				<tr>
					<td align=\"left\" width=\"30%\">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Message:</strong></td>
					<td align=\"left\" width=\"70%\">&nbsp;&nbsp;&nbsp;&nbsp;".$message."</td>
				</tr>
				
				<tr>
					<td align=\"left\" colspan=\"2\">&nbsp;</td>
				</tr>
				
				<tr>
					<td align=\"left\" colspan=\"2\"><strong>Thank You</strong></td>
				</tr>
			
								
			</table>

		</body>
	</html>";
		
		$to = array('chad@trickytribeconcepts.com', 'mg@trickytribeconcepts.com');
		
		$limite 	= "_parties_".md5 (uniqid (rand()));
		$headers 	= "From: ".ucwords($fullname)." <".$email.">\r\n";
		$headers 	.= "MIME-Version: 1.0\r\n";
		$headers 	.= "Content-type: text/html; charset=UTF-8\r\n";
		
		$sentmail1 = wp_mail( $to, "contact inquiry from Foxyco", $mailcontent, $headers );
		
		$_SESSION["msg"] = "thankyou";
		header("Location: ".esc_url( home_url( '/contact' )));
		exit;
}

/**
 * Template Name: Conact Us Page
 */

get_header(); 


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
        <div class="row text-center">
          <div class="contact-page">
    	<div class="col-sm1">
        	<h1>inquiries</h1>
            <div class="address-box">
            	<div class="mail-info">
                	<?php if( have_rows('private_events')): 
          				  while( have_rows('private_events')): the_row(); ?>
                          
                    <p><span class="pad-bot6">General Inquiries</span>
                        <?php the_sub_field('events_text')?>
                        <a href="mailto:<?php the_sub_field('private_email')?>"><?php the_sub_field('private_email')?></a>
                    </p>
                    <?php endwhile; endif; ?> 
                    
                    <?php if( have_rows('private_events')): 
          				  while( have_rows('private_events')): the_row(); ?>
                          
                    <p>
                    	<a href="tel:<?php the_sub_field('phone_number')?>"><?php the_sub_field('phone_number')?></a>
                    </p>
                    <?php endwhile; endif; ?> 
                    
                    <!--<?php if( have_rows('job_opportunities')): 
          				  while( have_rows('job_opportunities')): the_row(); ?>
                    <p>Job Opportunities <a href="mailto:<?php the_sub_field('job_email')?>"><?php the_sub_field('job_email')?></a></p>                    <?php endwhile; endif; ?>-->
                    
                    <!--<?php if( have_rows('media_and_marketing')): 
          				  while( have_rows('media_and_marketing')): the_row(); ?>
                    <p><span>media and marketing</span><a href="mailto:<?php the_sub_field('marketing_email')?>"><?php the_sub_field('marketing_email')?></a></p>-->
                    
					<!--Added for alignment-->
						<br />
						<br />
						<br />
						<br />
					<!--End padding-->
					
                    <?php endwhile; endif; ?> 
                </div>
                <div class="address-info">
                	<p><span>dallas</span></p>
                    
                    <?php if( have_rows('location_addresss',6)): 
                      while( have_rows('location_addresss',6)): the_row();?>
                      
                    <p><?php the_sub_field('location_addresss',6)?></p>
                    
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm2">
        	<h1>contact</h1>
            <div class="contact-form">
            <?php if($_SESSION["msg"] == "thankyou") {  ?>
                    <div class="thankyou-msg">
                        Thank you! Request sent successfully.
                    </div>             	 
                    <?php $_SESSION["msg"] = ""; 
					
					} ?>
            <form name="frmcatering" id="frmcatering" method="post" class="validate" enctype="multipart/form-data">
            	<ul>
                	<li><input name="fullname" id="fullname" class="required" type="text" placeholder="name*"></li>
                    <li><input name="email" id="email" type="email" class="required" placeholder="Email*"></li>
                    <li><input name="phone_number" id="phone_number" type="text" placeholder="phone numbers"></li>
                    <li>
                    	<select name="touch_about" id="touch_about">
                        	<option value="" selected="selected">what are you getting in touch about?</option>
                            <option value="Private Events">Private Events</option>
                            <option value="Corporate Event">Corporate Event</option>
                            <option value="Employment">Employment</option>
                            <option value="Catering">Catering</option>
                            <option value="Other">Other</option>
                        </select>
                    </li>
                    <li><textarea name="message" id="message" cols="" rows="" placeholder="your message"></textarea></li>
                    <li><input name="submit" id="submit" type="submit" value="send messsage"></li>
                </ul>
            </form>
            </div>
        </div>
    </div>
          
        </div>
      </div>
      <div class="bot-cv"></div>
    </section>

    
    
    <section class="footer-bg"></section>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery-1.7.1.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.validate.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/validate.js"></script>   

<?php get_footer(); ?>
