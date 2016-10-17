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
	<div class="row">
		<div class="hidden-xs col-xs-2">
			<?php echo get_the_post_thumbnail( $_post->ID, 'thumbnail' ); ?>
		</div>
		<div class="col-xs-10">
	<header>
		<?php

		// Echo title, date, excerpt, and featured image
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</h2></a>' );
		endif;

?>
	</header><!-- .entry-header -->

		<div class="entry-meta">
		<?php
		echo get_the_date();
		echo get_the_term_list( $post->ID, 'categories', ' | '.__('Categories:', 'transparency').' ', ', ' );
		?>
		</div>
		<?php
			echo '<div class="entry-content">';
			echo get_the_excerpt();
			echo '</div>';
		?>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-## -->
