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
			
				$usa = get_post_meta($post->ID, '_island-tracker_usa', true);
				$china = get_post_meta($post->ID, '_island-tracker_china', true);
				$taiwan = get_post_meta($post->ID, '_island-tracker_taiwan', true);
				$vietnam = get_post_meta($post->ID, '_island-tracker_vietnam', true);
				$philippines = get_post_meta($post->ID, '_island-tracker_philippines', true);
				$malaysia = get_post_meta($post->ID, '_island-tracker_malaysia', true);

				if(!empty($usa)) {
				    echo '<strong>'.esc_html__( 'U.S. Board of Geographic Names:', 'transparency' ).' </strong> '.esc_attr($usa)."<br />";
				}
				if(!empty($china)) {
				    echo '<strong>'.esc_html__( 'China:', 'transparency' ).' </strong> '.esc_attr($china)."<br />";
				}
				if(!empty($philippines)) {
				    echo '<strong>'.esc_html__( 'Philippines:', 'transparency' ).' </strong> '.esc_attr($philippines)."<br />";
				}
				if(!empty($taiwan)) {
				    echo '<strong>'.esc_html__( 'Taiwan:', 'transparency' ).' </strong> '.esc_attr($taiwan)."<br />";
				}
				if(!empty($malaysia)) {
				    echo '<strong>'.esc_html__( 'Malaysia:', 'transparency' ).' </strong> '.esc_attr($malaysia)."<br />";
				}
				if(!empty($vietnam)) {
				    echo '<strong>'.esc_html__( 'Vietam:', 'transparency' ).' </strong> '.esc_attr($vietnam)."<br />";
				}
			?>
			</p>
			<p>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><button><?php echo __('Explore', 'transparency'); ?></button></a>
			</p>

		</div>
	</div>
</article><!-- #post-## -->