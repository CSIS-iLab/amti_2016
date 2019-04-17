<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="hidden-xs col-sm-4 image-container">

			<?php
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($r->ID), $size = 'large')[0];

			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><img src="' . $image .'"/ ></a>';

			 ?>
		</div>
		<div class="col-sm-8">

			<header>
				<?php
				// Echo title, date, excerpt, and featured image
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
						transparency_posted_on();
						echo " | ".__('Categories:', 'transparency')." ".get_the_category_list(', ');
		  			?>

				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					echo get_the_excerpt();
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
