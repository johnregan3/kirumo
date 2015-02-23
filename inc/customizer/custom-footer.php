<?php
/**
 * Support Custom Footer
 *
 * @package Kirumo
 */

function kirumo_footer_customize_register( $wp_customize ) {


	class Kirumo_Footer_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() {
			?>

			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>

		<?php
		}
	}

	$wp_customize->add_setting(
		'custom_footer', array(
			'default' => '<a href="http://wordpress.org/" rel="generator" class="genericon genericon-wordpress" title="Proudly Powered by WordPress"></a> Theme: Kirumo by <a href="http://johnregan3.com" rel="designer">johnregan3</a>.',
		)
	);

	$wp_customize->add_section(
		'footer_text' , array(
		'title' => __( 'Footer Text', 'kirumo' ),
		'priority' => 80,
		)
	);

	$wp_customize->add_control(
		new Kirumo_Footer_Customize_Textarea_Control(
			$wp_customize, 'custom_footer', array(
				'label' => 'Footer Text',
				'section' => 'footer_text',
				'settings' => 'custom_footer',
			)
		)
	);

}

add_action( 'customize_register', 'kirumo_footer_customize_register' );