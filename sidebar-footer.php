<?php
/**
 * The Sidebar that appears horizontally in the Footer
 *
 * Designed for exactly Three widgets
 *
 * @package Kirumo
 */
?>
	<div id="tertiary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-footer' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #tertiary -->
