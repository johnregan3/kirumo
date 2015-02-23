<?php
/**
 * Post Footer Template
 *
 * @package Kirumo
 */
?>

	<footer class="entry-meta">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<div>
			<span class="comments-link"><span class="genericon genericon-comment"></span><?php comments_popup_link( __( 'Leave a comment', 'kirumo' ), __( '1 Comment', 'kirumo' ), __( '% Comments', 'kirumo' ) ); ?></span>
		</div>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div>
				<span class="genericon genericon-month"></span><?php kirumo_posted_on(); ?>
			</div>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'kirumo' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->