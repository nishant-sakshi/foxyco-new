<?php
/**
 * Foxyco functions and definitions
 */

function foxyco_setup() {
	load_theme_textdomain( 'foxyco' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'foxyco-featured-image', 2000, 1200, true );
	add_image_size( 'foxyco-thumbnail-avatar', 100, 100, true );

	
	register_nav_menus( array(
		'headermenu'    => __( 'Header Menu', 'foxyco' ),
		'footermenu' => __( 'Footer Menu', 'foxyco' ),
	) );
}
add_action( 'after_setup_theme', 'foxyco_setup' );


/**
 * Register widget area.
 */
function foxyco_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'foxyco' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'foxyco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Open Table Widget', 'foxyco' ),
		'id'            => 'opentablewidet',
		'description'   => __( 'Open Table Widget', 'foxyco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'foxyco_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Stock Barrel 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function foxyco_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'foxyco' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'foxyco_excerpt_more' );


/**
 * Enqueue scripts and styles.
 */
function foxyco_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'foxyco-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'foxyco_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Carmel Forge 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function carmelforge_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'carmelforge_front_page_template' );


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

// Admin menu start
if ( ! function_exists( 'foxyco_contact_usMenu' ) ) :
	function foxyco_contact_usMenu()
	{
		// Donors menu
		add_menu_page(__('Contact Us'), __('Contact Us'), 'manage_options', 'manage_contact_us.php', '', 'dashicons-businessman', 21 );
		//add_submenu_page('manage_donors.php', __('Make a Reservation'), __('Make a Reservation'), 'manage_options', 'manage_reservation.php', '' );
	}
	
	add_action('admin_menu', 'foxyco_contact_usMenu');
endif;
// Admin menu end


add_filter ( 'nav_menu_css_class', 'so_37823371_menu_item_class', 10, 4 );

function so_37823371_menu_item_class ( $classes, $item, $args, $depth ){
  $classes[] = 'nav-item';
  return $classes;
}