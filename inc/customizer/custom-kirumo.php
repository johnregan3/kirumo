<?php
/**
 * Implementation of custom Kirumo options
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Kirumo
 */

/**
 * Setup the Custom logo feature.
 *
 * @uses kirumo_theme_options()
 *
 * @package Kirumo
 */

function kirumo_theme_options( $wp_customize ) {

	$wp_customize->add_section( 'kirumo_options', array(
		'title'       => __( 'Kirumo Options', 'kirumo' ),
		'priority'    => 30,
		'description' => __( 'These settings affect only the Kirumo Theme', 'kirumo' ),
	) );

	$wp_customize->add_setting( 'kirumo_post_format_icons', array(
		'default' => 'show',
		) );

	$wp_customize->add_control( 'kirumo_post_format_icons', array(
		'label'      => __( 'Display Post Format Icons?', 'kirumo' ),
		'section'    => 'kirumo_options',
		'settings'   => 'kirumo_post_format_icons',
		'type'       => 'radio',
		'choices'    => array(
			'show' => 'Show',
			'hide' => 'Hide',
		),
	) );
}
add_action('customize_register', 'kirumo_theme_options');
