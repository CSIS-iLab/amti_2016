<?php
/**
 * Template part for displaying features.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

		// Get post meta
		$the_excerpt = get_the_excerpt();
		$terms = get_the_terms( $post->ID , 'categories' );

		// Echo title, date, excerpt, and featured image
		if ( is_single() ) :
		  the_title( '<h1 class="entry-title">', '</h1>' );
		  else :
		    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</h2>' );
		    echo '<div style="float: right;">' . get_the_post_thumbnail( $_post->ID, 'thumbnail' ) . '</a></div><br/><b>' . get_the_date() . ' | </b>' .$the_excerpt;
		  endif;

		  // Echo the feature categories
		    echo '<br />Posted in: ';
		    foreach ( $terms as $term ) {
		                    $term_link = get_term_link( $term, 'features' );
		                    if( is_wp_error( $term_link ) )
		                    continue;
		                echo '<a href="' . $term_link . '">' . $term->name . '&nbsp;</a>';
		  } ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php transparency_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
