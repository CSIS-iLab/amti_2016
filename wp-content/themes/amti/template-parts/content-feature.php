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

		$the_excerpt = get_the_excerpt();

		 if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		 else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		 echo '<div style="float: left;">' . get_the_post_thumbnail( $_post->ID, 'medium' ) . '</div>';
		 	echo $the_excerpt;

		 endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php  transparency_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
			// the_content( sprintf(
				/* translators: %s: Name of current post. */
		//		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'transparency' ), array( 'span' => array( 'class' => array() ) ) ),
		//		the_title( '<span class="screen-reader-text">"', '"</span>', false )
		//	) );

		//	wp_link_pages( array(
		//		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'transparency' ),
		//		'after'  => '</div>',
		//	) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php transparency_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
