<?php
/**
 * Template Name: Left Sidebar
 *
 * @package Kirumo
 */

get_header(); ?>

	<div class="left-sidebar">
		<?php get_sidebar(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main " role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'large' );
						} ?>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'kirumo' ),
										'after'  => '</div>',
									)
								);
							?>
						</div><!-- .entry-content -->
						<?php edit_post_link( __( 'Edit', 'kirumo' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
					</article><!-- #post-## -->

				<?php endwhile; ?>

				<?php kirumo_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .left-sidebar -->
<?php get_footer(); ?>
