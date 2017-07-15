<?php
/**
 * whank functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package whank
 * @since whank 1.0
 */

if ( ! function_exists( 'whank_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whank_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on whank, use a find and replace
	 * to change 'whank' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'whank', get_template_directory() . '/languages' );

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
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menu .
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'whank' ),
		'sidenav'	=> esc_html__( 'Side Menu', 'whank' ),
		'social'	=> esc_html__( 'Social Menu', 'whank' ),
	) );

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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'whank_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'whank_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whank_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'whank_content_width', 780 );
}
add_action( 'after_setup_theme', 'whank_content_width', 0 );

/**
 * Register widget area.
 */
function whank_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'whank' ),
		'id'            => 'whank_right_sidebar',
		'description'   => esc_html__( 'Add widgets here for right sidebar.', 'whank' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whank_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whank_scripts() {
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'whank-style', get_stylesheet_uri() );

	wp_enqueue_script( 'whank-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'whank-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*Enqueue additional css - fontawesome, bootstrap, swiper*/
	wp_enqueue_style( 'fontawesome', WHANK_CSS_URL.'/font-awesome'.$suffix.'.css', array(), false, 'all' );
	wp_enqueue_style( 'bootstrap-style', WHANK_CSS_URL.'/bootstrap'.$suffix.'.css', array(), 3.3, 'all' );
	wp_register_style( 'swiper-style', WHANK_CSS_URL.'/swiper'.$suffix.'.css', array(), 3.4, 'all' );
	wp_enqueue_style( 'custom-style', WHANK_CSS_URL.'/custom.css', array(),'', 'all' );
	/*Enqueue scripts*/
	wp_register_script( 'swiper-script', WHANK_JS_URL. '/swiper.jquery'.$suffix.'.js', array('jquery'), '3.4', true );
	wp_enqueue_script( 'bootstrap-script', WHANK_JS_URL. '/bootstrap'.$suffix.'.js', array('jquery'), '3.3', true );
}
add_action( 'wp_enqueue_scripts', 'whank_scripts' );

/**
 * Define Directory Location Constants
 */
define( 'WHANK_PARENT_DIR', get_template_directory() );
define( 'WHANK_INCLUDES_DIR', WHANK_PARENT_DIR. '/inc' );
define( 'WHANK_CSS_DIR', WHANK_PARENT_DIR . '/css' );
define( 'WHANK', WHANK_PARENT_DIR . '/js' );
define( 'WHANK_LANGUAGES_DIR', WHANK_PARENT_DIR . '/languages' );

define( 'WHANK_ADMIN_DIR', WHANK_INCLUDES_DIR . '/admin' );
define( 'WHANK_WIDGETS_DIR', WHANK_INCLUDES_DIR . '/widgets' );

define( 'WHANK_ADMIN_IMAGES_DIR', WHANK_ADMIN_DIR . '/images' );
/**
 * Define URL Location Constants
 */
define( 'WHANK_PARENT_URL', get_template_directory_uri() );
define( 'WHANK_CHILD_URL', get_stylesheet_directory_uri() );

define( 'WHANK_INCLUDES_URL', WHANK_PARENT_URL. '/inc' );
define( 'WHANK_CSS_URL', WHANK_PARENT_URL . '/css' );
define( 'WHANK_JS_URL', WHANK_PARENT_URL . '/js' );
define( 'WHANK_LANGUAGES_URL', WHANK_PARENT_URL . '/languages' );

define( 'WHANK_ADMIN_URL', WHANK_INCLUDES_URL . '/admin' );
define( 'WHANK_WIDGETS_URL', WHANK_INCLUDES_URL . '/widgets' );

define( 'WHANK_ADMIN_IMAGES_URL', WHANK_ADMIN_URL . '/images' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
* Register Custom Navigation Walker
*/ 
require_once('wp-bootstrap-navwalker.php');

require get_template_directory() . '/inc/function.php';


