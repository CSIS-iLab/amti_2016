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
				    echo '<strong>'.__('U.S. Board of Geographic Names:', 'transparency').'</strong> '.$custom['us'][0]."<br />";
				}
				if(isset($custom['china'])) {
				    echo '<strong>'.__('China:', 'transparency').'</strong> '.$custom['china'][0]."<br />";
				}
				if(isset($custom['philippines'])) {
				    echo '<strong>'.__('Philippines:', 'transparency').'</strong> '.$custom['philippines'][0]."<br />";
				}
				if(isset($custom['taiwan'])) {
				    echo '<strong>'.__('Taiwan:', 'transparency').'</strong> '.$custom['taiwan'][0]."<br />";
				}
				if(isset($custom['malaysia'])) {
				    echo '<strong>'.__('Malaysia:', 'transparency').'</strong> '.$custom['malaysia'][0]."<br />";
				}
				if(isset($custom['vietnam'])) {
				    echo '<strong>'.__('Vietnam:', 'transparency').'</strong> '.$custom['vietnam'][0]."<br />";
				}
			?>
			</p>
			<p>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><button><?php echo __('Explore', 'transparency'); ?></button></a>
			</p>

		</div>
	</div>
</article><!-- #post-## -->