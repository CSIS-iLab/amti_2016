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
	<div class="entry-meta">
		<?php
			echo "Published: ".get_the_date();
			echo get_the_term_list( $post->ID, 'categories', ' | Categories: ', ', ' );
		?>
	</div>

	<div class="entry-content">
		<?php
			the_content();
			echo do_shortcode('[ssba]');
		?>
	</div><!-- .entry-content -->
	<footer>
		<a href="/features"><button>More Features</button></a>
	</footer>
</article><!-- #post-## -->
