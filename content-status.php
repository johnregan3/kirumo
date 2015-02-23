<?php
/**
 * @package Kirumo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large' );
		} ?>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<span class="genericon genericon-status post-format-icon"></span><div class="post-format-content"><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'kirumo' ) ); ?></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kirumo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php get_template_part( 'content', 'footer-short' ); ?>
</article><!-- #post-## -->
