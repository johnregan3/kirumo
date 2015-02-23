<?php
/**
 * The Sidebar that appears horizontally on the front page
 *
 * Designed for exactly Three widgets
 *
 * @package Kirumo
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-horizontal' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
