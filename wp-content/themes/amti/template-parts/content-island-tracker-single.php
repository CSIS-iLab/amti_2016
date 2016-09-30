<?php
/**
 * Template part for displaying islands.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php
		// Echo title
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo "<hr>";
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
	<footer>
		<nav class="navigation posts-navigation" role="navigation">
			<?php
				$terms = get_the_terms( $post->ID , 'countries' );
		  ?>
			<h2 class="screen-reader-text">Posts navigation</h2>
			<div class="nav-links"><div class="nav-previous"><a href="/island-tracker/<?php echo $terms[0]->slug; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Return to <?php echo $terms[0]->name; ?>'s Island Tracker</a></div></div>
		</nav>
	</footer>
</article><!-- #post-## -->
