<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

$discussion = ! is_page() && helfe_can_show_post_thumbnail() ? helfe_get_discussion_data() : null; ?>

<?php if ( ! is_home() ) :
the_title( '<h1 class="entry-title mt-5">', '</h1>' ); 
endif; ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta row mb-3">
	<?php helfe_posted_by(); ?>
	<?php helfe_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			helfe_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php helfe_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
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
</div><!-- .entry-meta -->
<?php endif; ?>
