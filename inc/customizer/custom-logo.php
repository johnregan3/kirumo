<?php
/**
 * Implementation of the Custom Logo feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Kirumo
 */

/**
 * Setup the Custom logo feature.
 *
 * @uses kirumo_custom_logo()
 *
 * @package Kirumo
 */

function kirumo_custom_logo( $wp_customize ) {

	$wp_customize->add_section( 'kirumo_logo_section', array(
		'title'       => __( 'Logo', 'kirumo' ),
		'priority'    => 30,
		'description' => __( 'Upload a logo to replace the default site name and description in the header', 'kirumo' ),
	) );

	$wp_customize->add_setting( 'kirumo_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kirumo_logo', array(
		'label'    => __( 'Logo', 'kirumo' ),
		'section'  => 'kirumo_logo_section',
		'settings' => 'kirumo_logo',
		)
	) );

	$wp_customize->add_setting( 'kirumo_mobile_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kirumo_mobile_logo', array(
		'label'    => __( 'Mobile Logo', 'kirumo' ),
		'section'  => 'kirumo_logo_section',
		'settings' => 'kirumo_mobile_logo',
		)
	) );
}
add_action('customize_register', 'kirumo_custom_logo');
