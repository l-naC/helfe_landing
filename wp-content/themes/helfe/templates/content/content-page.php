<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! helfe_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'templates/header/header', 'post' ); ?>
	</header>
	<?php endif; ?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'helfe' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<div class="entry-footer row">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Post title. Only visible to screen readers. */
						__( '<i class="far fa-edit"></i> Editer <span class="screen-reader-text">%s</span>', 'helfe' ),
						array(
							'i'	 	=> array(
								'class' => array(),
							),
							'span' 	=> array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link col-2 d-flex justify-content-end">',
				'</span>',
				0,
				'btn btn-outline-primary'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
