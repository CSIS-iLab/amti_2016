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
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php transparency_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'transparency' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'transparency' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php foreach( get_coauthors() as $coauthor ): ?>
				<div class="author well gap">
	    				<div class="media">
	        				<div class="pull-left">
							<?php echo get_avatar( $coauthor->user_email, '80' ); ?>
						</div>

						<div class="media-body">
	            					<div class="media-heading">
								<strong>About&nbsp;<?php echo $coauthor->display_name; ?></strong>
							</div>
							<p><?php echo $coauthor->description; ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

	<footer class="entry-footer">
		<?php transparency_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
