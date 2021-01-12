<?php

require_once get_theme_file_path( '/lib/csf/cs-framework.php');
require_once get_theme_file_path( '/inc/metabox/section.php');
require_once get_theme_file_path( '/inc/metabox/page.php');
require_once get_theme_file_path( '/inc/metabox/banner-section.php');
require_once get_theme_file_path( '/inc/metabox/count-section.php');
require_once get_theme_file_path( '/inc/metabox/about-section.php');
require_once get_theme_file_path( '/inc/metabox/skill-section.php');
require_once get_theme_file_path( '/inc/metabox/service-section.php');
require_once get_theme_file_path( '/inc/metabox/action-section.php');
require_once get_theme_file_path( '/inc/metabox/protfolio-section.php');
require_once get_theme_file_path( '/inc/metabox/testimonial-section.php');
require_once get_theme_file_path( '/inc/metabox/contact-section.php');
require_once get_theme_file_path( 'inc/tgm.php');
require_once get_theme_file_path('class-wp-bootstrap-navwalker.php');


define( 'CS_ACTIVE_FRAMEWORK', false);
define( 'CS_ACTIVE_METABOX', true);
define( 'CS_ACTIVE_TAXONOMY', false);
define( 'CS_ACTIVE_SHORTCODE', false);
define( 'CS_ACTIVE_CUSTOMIZATION', false);

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'clyde_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clyde_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on clyde, use a find and replace
		 * to change 'clyde' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'clyde', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'mainmenu' => esc_html__( 'Primary', 'clyde' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'clyde_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_image_size("clyde-protfolio-size",1024,99999);
	}
endif;
add_action( 'after_setup_theme', 'clyde_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clyde_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'clyde_content_width', 640 );
}
add_action( 'after_setup_theme', 'clyde_content_width', 0 );

/**
 * Register widget area.
 */
function clyde_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom', 'clyde' ),
			'id'            => 'footer-bottom',
			'description'   => esc_html__( 'Add Footer Bottom Text.', 'clyde' ),
			'before_widget' => '',
			'after_widget'  => '',
		)
	);
}
add_action( 'widgets_init', 'clyde_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clyde_scripts() {

	wp_enqueue_style( 'clyde-fonts','//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');
	wp_enqueue_style( 'font-awesome','//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.css',null, _S_VERSION );
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css',null, _S_VERSION );
	wp_enqueue_style( 'owl-theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css',null, _S_VERSION );
	wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css',null, _S_VERSION );
	wp_enqueue_style( 'flaticon-css', get_template_directory_uri() . '/assets/css/flaticon.css',null, _S_VERSION );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/style.css',null, _S_VERSION );
	wp_enqueue_style( 'clyde-style', get_stylesheet_uri(), null, _S_VERSION );



	wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'jquery-animateNumber-js', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'scrollax-js', get_template_directory_uri() . '/assets/js/scrollax.min.js', array('jquery'), _S_VERSION, true );
	
	
	wp_enqueue_script( 'clyde-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clyde_scripts' );


function clyde_csf_init(){
	CSFramework_Metabox::instance(array( ));
}
add_action( 'init', 'clyde_csf_init');

function clyde_change_nav_menu($menus){
    $string_to_replace = home_url("/")."section/";
    if(is_front_page()){
        foreach ($menus as $menu) {
            $new_url = str_replace($string_to_replace, "#", $menu->url);
            if ($new_url!= $menu->url) {
                $new_url = rtrim($new_url,"/");
            }
            $menu->url = $new_url;
        }
    }
    return $menus;
}
add_filter( 'wp_nav_menu_objects','clyde_change_nav_menu');
