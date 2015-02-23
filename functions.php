<?php
/**
 * Kirumo functions and definitions
 *
 * @package Kirumo
 */

if ( ! function_exists( 'kirumo_setup' ) ) :

	if ( ! isset( $content_width ) ) {
		$content_width = 1000;
	}
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kirumo_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kirumo, use a find and replace
		 * to change 'kirumo' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'kirumo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'mobile' => __( 'Mobile Menu', 'kirumo' ),
				'header' => __( 'Header Menu', 'kirumo' ),
				'social' => __( 'Social Menu', 'kirumo' ),
			)
		);

		// Enable support for Post Thumbnails (Featured Images).
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'front-page', 1000, '', false );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// Setup the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
			'kirumo_custom_background_args',
				array(
					'default-color' => 'e8e8e8',
					'default-image' => '',
				)
			)
		);

		//Add font to TinyMCE editor
		$font_url = 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
endif; // kirumo_setup

add_action( 'after_setup_theme', 'kirumo_setup' );


/**
 * Register widgetized areas and update sidebars with default widgets.
 */
function kirumo_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'kirumo' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Horizontal Widgets', 'kirumo' ),
			'id'            => 'sidebar-horizontal',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'kirumo' ),
			'id'            => 'sidebar-footer',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'kirumo_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function kirumo_scripts() {
	wp_enqueue_style( 'kirumo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kirumo-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'kirumo-scripts', get_template_directory_uri() . '/inc/js/kirumo.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'kirumo_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/customizer/custom-header.php';

/**
 * Implement the Custom Color feature.
 */
require get_template_directory() . '/inc/customizer/custom-color.php';

/*
 * Implement the Custom footer feature.
 */
require get_template_directory() . '/inc/customizer/custom-footer.php';

/*
 * Implement the Custom Header/Footer colors.
 */
require get_template_directory() . '/inc/customizer/custom-header-footer-color.php';

/*
 * Include custom walkers for menus
 */
require get_template_directory() . '/inc/custom-walkers.php';

/**
 * Add support for Vertical Featured Images
 */
if ( ! function_exists( 'kirumo_vertical_check' ) ) :
	function kirumo_vertical_check( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

		$image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'large' );

		$width  = $image_data[1];
		$height = $image_data[2];

		if ( $height > $width ) {
			$html = str_replace( 'attachment-', 'vertical-image attachment-', $html );
		}
		return $html;
	}
endif;

add_filter( 'post_thumbnail_html', 'kirumo_vertical_check', 10, 5 );

