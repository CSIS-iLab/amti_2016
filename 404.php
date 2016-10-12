<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Transparency
 */

get_header(); ?>

<div class="error-404-header">
	<img src="/wp-content/uploads/2016/10/404_AMTI_2_transparent.png" />
</div>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">

				<section class="error-404 not-found">
					<div class="page-content">
						<p class="text-center"><?php esc_html_e( 'We can\'t seem to find the page you\'re looking for. Try one of the links below instead.', 'transparency' ); ?></p>
						<hr />

						<div class="row">
							<div class="col-xs-12 col-sm-4">
							<div class="widget widget_recent_entries">
								<h2 class="widgettitle">Navigation</h2>		

									<?php 
										wp_nav_menu( array('menu' => 'Footer Menu') );
									?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4">
								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
							</div>
							<div class="col-xs-12 col-sm-4">
								<?php
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
								?>
							</div>
						</div>


					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
