<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

 if ( ! function_exists( 'helfe_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function helfe_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			'<i class="far fa-clock"></i>',
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'helfe_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function helfe_posted_by() {
		printf(
			/* translators: 1: SVG icon. 2: Post author, only visible to screen readers. 3: Author link. */
			'<span class="byline col">%1$s 
				<span class="screen-reader-text">%2$s</span>
				<span class="author vcard">
					<a class="url fn n" href="%3$s">%4$s</a>
				</span>
			</span>',
			__( 'Posted by', 'helfe' ),
			'<i class="far fa-user"></i>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'helfe_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function helfe_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link col">';
			echo '<i class="fas fa-comments"></i> ';

			/* translators: %s: Post title. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'helfe' ), get_the_title() ) );

			echo '</span><br>';
		}
	}
endif;

if ( ! function_exists( 'helfe_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function helfe_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by
			helfe_posted_by();

			// Posted on
			// helfe_posted_on();

			/* translators: Used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'helfe' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
					'<br><span class="cat-links col">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					'<i class="far fa-file-archive"></i> ',
					__( 'Posted in', 'helfe' ),
					$categories_list . '<br>'
				); // WPCS: XSS OK.
			}

			/* translators: Used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', __( ', ', 'helfe' ) );
			if ( $tags_list ) {
				printf(
					/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of tags. */
					'<br><span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
					'<',
					'<i class="fas fa-tag"></i> ',
					__( 'Tags:', 'helfe' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Comment count.
		if ( ! is_singular() ) {
			helfe_comment_count();
		}

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
	}
endif;

if ( ! function_exists( 'helfe_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function helfe_post_thumbnail() {
		if ( ! helfe_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'helfe_get_user_avatar_markup' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 */
	function helfe_get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="comment-user-avatar comment-author vcard">%s</div>', get_avatar( $id_or_email, helfe_get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'helfe_discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 */
	function helfe_discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol class="discussion-avatar-list">', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				helfe_get_user_avatar_markup( $id_or_email )
			);
		}
		echo '</ol><!-- .discussion-avatar-list -->', "\n";
	}
endif;

if ( ! function_exists( 'helfe_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function helfe_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' 	=> null,
					'title_reply'  	=> null,
					'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-outline-primary" value="%4$s" />',
					'comment_field' => '<p class="comment-form-comment form-group">
					<label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br />
					<textarea class="form-control" id="comment" name="comment" aria-required="true" rows="3"></textarea>
					</p>',
				)
			);
		}
	}
endif;

if ( ! function_exists( 'helfe_add_reply_link_css' ) ) :
	/* Add CSS classes to 'Reply Link' Button */
	function helfe_add_reply_link_css($class){
		$class = str_replace("class='comment-reply-link'", "class='comment-reply-link btn btn-outline-primary'", $class);
		return $class;
	}
	add_filter('comment_reply_link', 'helfe_add_reply_link_css');
endif;

if ( ! function_exists( 'helfe_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function helfe_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					'<i class="fas fa-chevron-left"></i>',
					__( 'Newer posts', 'helfe' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'helfe' ),
					'<i class="fas fa-chevron-right"></i>'
				),
			)
		);
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
	 *
	 * @since Helfe 1.0
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Helfe 1.0
		 */
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Returns the size for avatars used in the theme.
 */
function helfe_get_avatar_size() {
	return 50;
}
