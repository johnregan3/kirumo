<?php
/**
 * Post Footer Template
 *
 * @package Kirumo
 */
?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : ?>
			<div>
				<span class="genericon genericon-month"></span><?php kirumo_posted_on(); ?>
			</div>
		<?php endif; ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<div>
				<span class="comments-link"><span class="genericon genericon-comment"></span><?php comments_popup_link( __( 'Leave a comment', 'kirumo' ), __( '1 Comment', 'kirumo' ), __( '% Comments', 'kirumo' ) ); ?></span>
			</div>
		<?php endif; ?>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'kirumo' ) );
				if ( $categories_list && kirumo_categorized_blog() ) :
			?>
			<div class="cat-links">
				<span class="genericon genericon-category"></span><?php printf( __( 'Posted in %1$s', 'kirumo' ), $categories_list ); ?>
			</div>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'kirumo' ) );
				if ( $tags_list ) :
			?>
			<div class="tags-links">
				<span class="genericon genericon-tag"></span><?php printf( __( 'Tagged %1$s', 'kirumo' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'kirumo' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->