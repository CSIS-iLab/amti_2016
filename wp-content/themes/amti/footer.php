<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Transparency
 */

?>
	<a href="#" class="topbutton"><span class="hidden-xs"><?php echo __('Back to Top', 'transparency'); ?></span><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="container">
				<div id="footer-widgets" class="widget-area row" role="complementary">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div><!-- #footer-widgets -->
			</div>
		<?php endif; ?>

		<div class="site-info">
			<div class="container">
				&copy; <?php echo date('Y') . __(' The Asia Maritime Transparency Initiative and The Center for Strategic and International Studies', 'transparency'); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
