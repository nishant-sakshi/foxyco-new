<?php
/**
 * The template for displaying the footer
 */
?>
<!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
        <div class="col-md-3">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <!--<a href="<?php echo of_get_option('facebook_link'); ?>" target="_blank">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/fb-icon.png" alt="">
                </a>-->
              </li>
              <li class="list-inline-item">
                <a href="<?php echo of_get_option('instagram_link'); ?>" target="_blank">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/insta-icon.png" alt="">
                </a>
              </li>
              <li class="list-inline-item">
                <a href="<?php echo of_get_option('twitter_link'); ?>" target="_blank">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/tw-icon.png" alt="">
                </a>
              </li>
            </ul>
          </div>
          
          
	      
          
          <div class="col-md-6">
          <div class="footer-logos">
          <div class="f-logo">
          <a href="http://trickytribeconcepts.com/" target="_blank">Tricky Tribe<br>Concepts</a>
          </div>
          <div class="f-logo">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/footer-logo.png" alt="">
            </div>
            <div class="f-logo">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/footer-logo-SB.jpg" alt="">
            </div>
          </div>
          </div>
          
          <div class="col-md-3">
            <?php /*?><ul class="list-inline quicklinks">
              <li><a href="#">ABOUT</a></li>
			  <li><a href="#">Press</a></li>
              <li><a href="#">contact</a></li>
            </ul><?php */?>
            
            <?php 
				if( has_nav_menu( 'footermenu' ) ) :
					wp_nav_menu( array( 'theme_location' => 'footermenu', 'container' => '', 'menu_class' => '', 'container_class'=>'', 'depth' => 0, 'items_wrap' => '<ul id="%1$s" class="%2$s list-inline quicklinks">%3$s</ul>' ) );
				endif;
			?>
          </div>
        </div>
      </div>
    </footer>

    

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/agency.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/easyResponsiveTabs.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/simpleLightbox.min.js"></script>
<script>
$(document).ready(function() {
  $('.imageGallery1 a').simpleLightbox();
})
</script> 

<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/jquery.fancybox.pack.js"></script>
<script>
$(document).ready(function() 
{
	$(".opentablewidget").fancybox({
		'modal':true,
		'width': 240,
		'height': 320,
		'type': 'iframe',
		'autoSize':false,
		afterShow : function() 
		{
			$('.fancybox-skin').append('<a title="Close" class="fancybox-item fancybox-close" href="javascript:$.fancybox.close();"></a>');
		}
	});	
});
</script>
  
 

<?php wp_footer(); ?>

</body>
</html>
