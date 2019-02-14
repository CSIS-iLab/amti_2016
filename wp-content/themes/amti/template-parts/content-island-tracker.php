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
				<?php echo '<a href="' . esc_url( get_permalink() ) . '">'; ?>
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
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



			<?php

				$usa = get_post_meta($post->ID, '_island-tracker_usa', true);
				$china = get_post_meta($post->ID, '_island-tracker_china', true);
				$taiwan = get_post_meta($post->ID, '_island-tracker_taiwan', true);
				$vietnam = get_post_meta($post->ID, '_island-tracker_vietnam', true);
				$philippines = get_post_meta($post->ID, '_island-tracker_philippines', true);
				$malaysia = get_post_meta($post->ID, '_island-tracker_malaysia', true);

				if(!empty($usa)) {
				    echo '<div><strong>'.esc_html__( 'U.S. Board of Geographic Names:', 'transparency' ).' </strong> ';
						echo esc_attr($usa);
						echo "</div>";
				}
				if(!empty($china)) {
				    echo '<div><strong>'.esc_html__( 'China:', 'transparency' ).' </strong> ';
						echo esc_attr($china);
						echo "</div>";
				}
				if(!empty($philippines)) {
				    echo '<div><strong>'.esc_html__( 'Philippines:', 'transparency' ).' </strong> ';
						echo esc_attr($philippines);
						echo "</div>";
				}
				if(!empty($taiwan)) {
				    echo '<div><strong>'.esc_html__( 'Taiwan:', 'transparency' ).' </strong> ';
						echo esc_attr($taiwan);
						echo "</div>";
				}
				if(!empty($malaysia)) {
				    echo '<div><strong>'.esc_html__( 'Malaysia:', 'transparency' ).' </strong> ';
						echo esc_attr($malaysia);
						echo "</div>";
				}
				if(!empty($vietnam)) {
				    echo '<div><strong>'.esc_html__( 'Vietnam:', 'transparency' ).' </strong> ';
						echo esc_attr($vietnam);
						echo "</div>";
				}
			?>



				<button><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo __('Explore', 'transparency'); ?></a></button>


		</div>
	</div>
</article><!-- #post-## -->
