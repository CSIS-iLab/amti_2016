<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Transparency
 */

get_header();

// Begin the post loop so we can get the post title and featured image to display in the header
while ( have_posts() ) : the_post();

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
	<header class="entry-header">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<hr>
		</div>
		<div class="backstretch">
			<img src="<?php echo $feat_image; ?>" />
		</div>
	</header>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12 col-md-9" role="main">

			<!-- START: Post Content -->
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
				</article>
				<!-- END: Post Content -->

				<?php

					the_post_navigation( array(
						'prev_text'                  => __( '<h4>Previous Post</h4>%title' ),
						'next_text'                  => __( '<h4>Next Post</h4>%title' ),
			            'screen_reader_text' => __( 'Continue Reading' ),
			        ) );

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
