<?php
/**
 * Template part for displaying islands in the island tracker.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo get_the_post_thumbnail( $_post->ID, 'large' ); ?>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<?php
				if ( is_single() ) :
				  the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>
			<p>
			<?
			
				$custom = get_post_custom();

				if(isset($custom['us'])) {
				    echo '<strong>U.S. Board of Geographic Names:</strong> '.$custom['us'][0]."<br />";
				}
				if(isset($custom['china'])) {
				    echo '<strong>China:</strong> '.$custom['china'][0]."<br />";
				}
				if(isset($custom['philippines'])) {
				    echo '<strong>Philippines:</strong> '.$custom['philippines'][0]."<br />";
				}
				if(isset($custom['taiwan'])) {
				    echo '<strong>Taiwan:</strong> '.$custom['taiwan'][0]."<br />";
				}
				if(isset($custom['malaysia'])) {
				    echo '<strong>Malaysia:</strong> '.$custom['malaysia'][0]."<br />";
				}
				if(isset($custom['vietnam'])) {
				    echo '<strong>Vietnam:</strong> '.$custom['vietnam'][0]."<br />";
				}
			?>
			</p>
			<p>
				<a href="<?php echo esc_url( get_permalink() ); ?>">Click here to explore.</a>
			</p>

		</div>
	</div>
</article><!-- #post-## -->