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
	<header>
		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="post-share">
			<a href="https://www.facebook.com/sharer.php?<?php echo esc_url( get_permalink() ); ?>">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x facebook"></i>
				  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				</span>
			</a>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x twitter"></i>
			  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x linkedin"></i>
			  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x google"></i>
			  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x printer"></i>
			  <i class="fa fa-print fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x email"></i>
			  <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
			</span>
		</div>
		<div class="entry-meta">
			<?php transparency_posted_on(); ?><br />
			<?php transparency_entry_footer(); ?>
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

	<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="post-share">
			<a href="https://www.facebook.com/sharer.php?<?php echo esc_url( get_permalink() ); ?>">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x facebook"></i>
				  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				</span>
			</a>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x twitter"></i>
			  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x linkedin"></i>
			  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x google"></i>
			  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x printer"></i>
			  <i class="fa fa-print fa-stack-1x fa-inverse"></i>
			</span>
			<span class="fa-stack">
			  <i class="fa fa-circle fa-stack-2x email"></i>
			  <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
			</span>
		</div>
		<?php
		endif; ?>

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
</article><!-- #post-## -->
