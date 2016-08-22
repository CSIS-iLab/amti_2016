<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Transparency
 */

if ( ! function_exists( 'transparency_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

/* Rewrote/simplified get_the_coauthor function -PF */

 function transparency_posted_on() {
 echo 'Posted on <a href="' . get_permalink() . '">' . get_the_date() . '</a> by&nbsp;';
 if ( function_exists( 'coauthors_posts_links' ) )
 coauthors_posts_links();
 else
 the_author();
 }
endif;

if ( ! function_exists( 'transparency_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function transparency_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'transparency' ) );
		if ( $categories_list && transparency_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'transparency' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'transparency' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'transparency' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'transparency' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'transparency' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function transparency_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'transparency_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'transparency_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so transparency_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so transparency_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in transparency_categorized_blog.
 */
function transparency_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'transparency_categories' );
}
add_action( 'edit_category', 'transparency_category_transient_flusher' );
add_action( 'save_post',     'transparency_category_transient_flusher' );
