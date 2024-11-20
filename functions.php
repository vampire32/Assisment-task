<?php
/**
 * custom theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package custom_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function custom_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on custom theme, use a find and replace
		* to change 'custom-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'custom-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'custom-theme' ),
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
			'custom_theme_custom_background_args',
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
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function custom_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'custom_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'custom_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function custom_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'custom-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'custom-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'custom_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

// jquery
 function load_jquery() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'load_jquery');

// font awsome
function my_theme_enqueue_styles() {
    // Enqueue Font Awesome from CDN
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function custom_theme_scripts() {
	wp_enqueue_style( 'custom-theme-style', get_template_directory_uri() . '/inc/assets/styles/styles.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/assets/styles/bootstrap.css', array(), _S_VERSION );
	wp_enqueue_style( 'css-new', get_template_directory_uri() . '/inc/assets/styles/css-new.css', array(), _S_VERSION );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/assets/styles/all.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/inc/assets/styles/slicknav.css', array(), _S_VERSION );


	wp_style_add_data( 'custom-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'custom-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/jquery.slicknav.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_theme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// custom menu
function wpb_custom_new_menu() {
	register_nav_menus(
	  array(
		'primary' => __( 'Header Menu' ),
		'footer' => __( 'Footer Menu' )
	  )
	);
  }
  add_action( 'init', 'wpb_custom_new_menu' );
  function my_acf_json_save_point($path)
  {
	  return get_stylesheet_directory() . '/parent-acf-json';
  }
  function my_acf_json_load_point($path)
  {
	  return get_stylesheet_directory() . '/parent-acf-json';
  }
  add_filter('acf/settings/save_json', 'my_acf_json_save_point');
  add_filter('acf/settings/load_json', 'my_acf_json_load_point');



//   custom post 

  function load_cpt_template($template)
{
	global $post;

	if ($post) {
		$post_type = $post->post_type;
		$new_template = locate_template(array("single-pages/single-{$post_type}.php"));
		if (!empty($new_template)) {
			return $new_template;
		}
	}

	return $template;
}
add_filter('single_template', 'load_cpt_template');

function load_cpt_archive_template($template)
{
    if (is_post_type_archive()) {
        $post_type = get_query_var('post_type');
        $new_template = locate_template(["archive-pages/archive-{$post_type}.php"]);
        if (!empty($new_template)) {
            return $new_template;
        }
    }

    return $template;
}
add_filter('archive_template', 'load_cpt_archive_template');

require_once get_template_directory() . '/CPT/init.php';

function register_project_api_endpoint() {
    // Register custom endpoint
    register_rest_route( 'custom-api/v1', '/projects', array(
        'methods' => 'GET',
        'callback' => 'get_projects_data',
        'permission_callback' => '__return_true', 
    ));
}
add_action( 'rest_api_init', 'register_project_api_endpoint' );

function get_projects_data() {

    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
    );
    
    $projects_query = new WP_Query( $args );
    $projects = array();

 
    if ( $projects_query->have_posts() ) {
        while ( $projects_query->have_posts() ) {
            $projects_query->the_post();

          
            $title = get_the_title();
            $url = get_permalink();
            $start_date = get_field('project_start_date'); 
            $end_date = get_field('project_end_date'); 

       
            $start_date_formatted = $start_date ? date('F j, Y', strtotime($start_date)) : null;
            $end_date_formatted = $end_date ? date('F j, Y', strtotime($end_date)) : null;

       
            $projects[] = array(
                'title'       => $title,
                'url'         => $url,
                'start_date'  => $start_date_formatted,
                'end_date'    => $end_date_formatted,
            );
        }
        wp_reset_postdata();
    }

    return rest_ensure_response( $projects );
}