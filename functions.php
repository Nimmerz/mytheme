<?php
/**
 * my_newtheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_newtheme
 */

if ( ! function_exists( 'my_newtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


	if (!is_admin()) {
		function blog_styles() {
			wp_enqueue_style('normalize', get_template_directory_uri().'/stylesheets/normalize.css');
			wp_enqueue_style('flexslider', get_template_directory_uri().'/stylesheets/flexslider.css');
			wp_enqueue_style('Arial', get_template_directory_uri().'/fonts/stylesheet.css');

			wp_enqueue_style('bootstrap', get_template_directory_uri().'/bower_components/bootstrap/dist/css/bootstrap.min.css');
			wp_enqueue_style('font-awesome', get_template_directory_uri().'/bower_components/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('flexboxgrid', get_template_directory_uri().'/bower_components/flexboxgrid/css/flexboxgrid.min.css');
			wp_enqueue_style('main', get_template_directory_uri().'/stylesheets/screen.min.css');
		}
		add_action('wp_enqueue_scripts', 'blog_styles');
	}
	add_theme_support( 'menus' );

	add_filter('excerpt_more', function($more) {
		return '...';
	});
	function new_excerpt_length($length) {
		return 50;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

function my_newtheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on my_newtheme, use a find and replace
	 * to change 'my_newtheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'my_newtheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('slides', 692, 250, true);	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'my_newtheme' ),
		'social' => esc_html__( 'Social menu', 'my_newtheme' ),
	) );

	    register_nav_menus ([
    	"footer_menu" => "footer"
    	]);


    		register_sidebar(array(
		'id' => 'footer_sidebar', 
		'name' => 'footer_column', 
		'description' => 'footer_panel',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));

        		register_sidebar(array(
		'id' => 'contact_sidebar', 
		'name' => 'contact_column', 
		'description' => 'contact_panel',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));

	    		register_sidebar(array(
		'id' => 'contact_sidebar1', 
		'name' => 'contact_column1', 
		'description' => 'contact_panel1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));		

	    $args = array( 
	'show_all' => False, 
	'end_size' => 0, 
	'mid_size' => 2, 
	'prev_next' => True, 
	'prev_text' => ' ', 
	'next_text' => ' ', 
	'add_args' => False, 
	'add_fragment' => '', 
	'screen_reader_text' => __( ' ' ), 
	);		

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	// // add_theme_support( 'custom-background', apply_filters( 'my_newtheme_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'my_newtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_newtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_newtheme_content_width', 600 );
}
add_action( 'after_setup_theme', 'my_newtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_newtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'my_newtheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'my_newtheme_widgets_init' );

		 // bootstrap scripts
		 function my_scripts(){
		  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js');
		  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
		 }
 
		 add_action( 'wp_enqueue_scripts', 'my_scripts' );	

function my_scripts_method1() {
		  wp_deregister_script( 'jquery-core' );
		  wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
		  wp_enqueue_script( 'jquery' );
		 }    
		 add_action( 'wp_enqueue_scripts', 'my_scripts_method1' );
/**
 * Enqueue scripts and styles.
 */
function my_newtheme_scripts() {
	wp_enqueue_style( 'my_newtheme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'my_newtheme-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' );

    wp_enqueue_style( 'my_newtheme-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:400,300,700');

	wp_enqueue_script( 'my_newtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'my_newtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_newtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
