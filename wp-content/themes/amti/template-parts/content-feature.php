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
		<div class="col-xs-2">
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

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">

			<?php

				$terms = get_the_terms( $post->ID , 'categories' );
				echo '<br />Posted in: ';
		    foreach ( $terms as $term ) {
		                    $term_link = get_term_link( $term, 'features' );
		                    if( is_wp_error( $term_link ) )
		                    continue;
		                echo '<a href="' . $term_link . '">' . $term->name . '&nbsp;</a>';
		  }
				?>

		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

		<div class="entry-meta">
		<?php
		$terms = get_the_terms( $post->ID , 'categories' );
		echo get_the_date();
		echo ' | ';
		echo 'Category: ';
		foreach ( $terms as $term ) {
										$term_link = get_term_link( $term, 'features' );
										if( is_wp_error( $term_link ) )
										continue;
								echo '<a href="' . $term_link . '">' . $term->name . '&nbsp;</a>';
	}
			echo '<div class="entry-content">';
			echo get_the_excerpt();
			echo '</div>';
		?>
		</div>
	</div><!-- .entry-content -->
</div>
</div>
</article><!-- #post-## -->
