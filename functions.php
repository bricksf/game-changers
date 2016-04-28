<?php
/**
 * Game Changers functions and definitions
 *
 * @package Game Changers
 */

/**
 * Set the custom post types.
 */
//require_once locate_template('/inc/widget_guide.php');					// Image Upload Widget
require_once locate_template('/inc/custom-post-types.php');				// Custom Post Types Setup
require_once locate_template('/inc/custom-post-type-people.php');		// Custom Post Type Slides
require_once locate_template('/inc/shortcodes.php');					// Custom Shortcodes
//require_once locate_template('/inc/custom.php');						// Custom Functions

//add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');  
}
remove_filter ('the_content', 'wpautop');

/**
 * ACF Include on production
 */

$host = $_SERVER['HTTP_HOST'];
if($host == "gamechangers.brick.agency" or $host == "gamechangers.davidson.edu" ) {
	define( 'ACF_LITE' , true );
	require_once locate_template('/inc/advanced-custom-fields/acf.php' );
	require_once locate_template('/inc/acf-repeater/acf-repeater.php' );
	require_once locate_template('/inc/advanced-custom-fields.php' );
}
	require_once locate_template('/inc/advanced-custom-fields.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'game_changers_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function game_changers_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Game Changers, use a find and replace
	 * to change 'game-changers' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'game-changers', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'game-changers' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'game_changers_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // game_changers_setup
add_action( 'after_setup_theme', 'game_changers_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function game_changers_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'game-changers' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'game_changers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function game_changers_scripts() {
	wp_enqueue_style( 'game-changers-style', get_stylesheet_uri() );

	wp_enqueue_script( 'game-changers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'game-changers-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
//add_action( 'wp_enqueue_scripts', 'game_changers_scripts' );


function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'game-changers') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
