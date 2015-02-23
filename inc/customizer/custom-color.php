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
function kirumo_customize_register_color( $wp_customize ) {

	/* Add a new setting for this color. */
	$wp_customize->add_setting(
		'color_primary',
		array(
			'default'    => '0074a2',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		)
	);

	/* Add a control for this color. */
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'custom_colors_primary',
			array(
				'label'    => esc_html__( 'Primary Link Color', 'kirumo' ),
				'section'  => 'colors',
				'settings' => 'color_primary',
				'priority' => 10,
			)
		)
	);
}

/* Add options to the theme customizer. */
add_action( 'customize_register', 'kirumo_customize_register_color' );


/**
 * Primary Link Color CSS Output
 */
if ( ! function_exists( 'kirumo_header_style' ) ) :

	function kirumo_header_style() {
		$primary_color = get_theme_mod( 'color_primary' ); ?>

		<style type="text/css">
		<?php if ( '' == $primary_color ) : ?>
			a,
			a:active,
			a:hover,
			a:visited,
			a:visited:hover,
			.site-title a:hover,
			.main-navigation a:hover,
			.footer-wrap a:hover {
				color: #0074a2;
			}
			.comment-list .comment-reply-link:hover,
			a.button,
			a.button:hover,
			button:hover,
			input[type="submit"]:hover {
				background: #0074a2;
			}
		<?php else : ?>
			a,
			a:active,
			a:hover,
			a:visited,
			a:visited:hover,
			.site-title a:hover,
			.main-navigation a:hover,
			.footer-wrap a:hover {
				color: <?php echo $primary_color; ?>;
			}
			.comment-list .comment-reply-link:hover,
			a.button,
			a.button:hover,
			button:hover,
			input[type="submit"]:hover {
				background: <?php echo $primary_color; ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // kirumo_header_style

add_action( 'wp_head', 'kirumo_header_style' );


