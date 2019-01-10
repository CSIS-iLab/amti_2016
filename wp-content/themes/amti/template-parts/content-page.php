<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		<hr>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
		?>
		<?php
		    global $related;
		    $rel = $related->show( get_the_ID(), true );

		    // Display the title of each related post
		    if( is_array( $rel ) && count( $rel ) > 0 ) {
					echo '<div id="mapContainer">';
		        foreach ( $rel as $r ) {
		            if ( is_object( $r ) ) {
		                if ($r->post_status != 'trash') {
											$image = wp_get_attachment_image_src(get_post_thumbnail_id($r->ID), $size = 'large')[0];

		                    echo '<a href="' . esc_url(get_permalink($r->ID)) . '" class="map">
												<span class="background" style="background-image:url('.$image .'");>
												</span>
												<span class="title">' . get_the_title($r->ID) . '</span>
												</a>';

		                }
		            }
		        }
						echo '</div>';
		    }
		?>	</div><!-- .entry-content -->
</article><!-- #post-## -->
