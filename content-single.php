<?php
/**
 * @package Kirumo
 */

//get post format for genericon class
$format = get_post_format() ? get_post_format() : 'standard' ;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large' );
		} ?>

	<div class="entry-content">
		<span class="genericon genericon-<?php echo $format ?> post-format-icon"></span><div class="post-format-content"><?php the_content( __( 'Continue reading <span class="genericon genericon-next"></span>', 'kirumo' ) ); ?></div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kirumo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'content', 'footer' ); ?>
</article><!-- #post-## -->
