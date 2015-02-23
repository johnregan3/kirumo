<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Kirumo
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses kirumo_header_style()
 * @uses kirumo_admin_header_style()
 * @uses kirumo_admin_header_image()
 *
 * @package Kirumo
 */

// Remove Header Text Color input
define( 'NO_HEADER_TEXT', true );

function kirumo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kirumo_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'admin-preview-callback' => 'kirumo_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'kirumo_custom_header_setup' );

if ( ! function_exists( 'kirumo_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see kirumo_custom_header_setup().
 */
function kirumo_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // kirumo_admin_header_image
