<?php
/**
 * adds supoprt for custom Link Color
 *
 * @package Kirumo
 */

/**
 * Registers the custom color in the Theme Customizer
 *
 * @param  object $wp_customize
 * @return void
 */
function kirumo_customize_register_header_footer_color( $wp_customize ) {

	/* Add a new setting for this color. */
	$wp_customize->add_setting(
		'header_footer_color',
		array(
			'default'    => '333333',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	/* Add a control for this color. */
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'custom_colors_header_footer',
			array(
				'label'    => esc_html__( 'Header & Footer Color', 'kirumo' ),
				'section'  => 'colors',
				'settings' => 'header_footer_color',
				'priority' => 10,
			)
		)
	);
}

/* Add options to the theme customizer. */
add_action( 'customize_register', 'kirumo_customize_register_header_footer_color' );


/**
 * Primary Link Color CSS Output
 */
if ( ! function_exists( 'kirumo_header_footer_color' ) ) :

	function kirumo_header_footer_color() {
		$header_footer_color = get_theme_mod( 'header_footer_color' ); ?>

		<style type="text/css">
		<?php if ( '' == $header_footer_color ) : ?>
			#mobile-menu,
			.mobile-header,
			#masthead,
			.footer-wrap,
			#nav-toggle,
			button,
			a.button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"] {
				background: #333;
			}
		<?php else : ?>
			#mobile-menu,
			.mobile-header,
			#masthead,
			.footer-wrap,
			#nav-toggle, button,
			a.button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"] {
				background: <?php echo $header_footer_color; ?>;;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // kirumo_header_style

add_action( 'wp_head', 'kirumo_header_footer_color' );


