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
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer">
			<div class="footer-container ">
				<div class="brand">
					<span class="image">
						<img src="/wp-content/uploads/2014/11/csis.png" >
					</span>
					<span class="tagline">
						<?php echo get_bloginfo( 'description', 'display' ) ?>
					</span>
				</div>
				 <hr/>
				<div class="connect">
					<div class="social">
						<div class="section-title">
							<?php echo __('Follow Us', 'transparency')?>
						</div>
						<p>
							<a href="https://www.facebook.com/AsiaMaritimeTransparencyInitiative" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="https://twitter.com/AsiaMTI" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
						</p>
					</div>

					<div class="contact">
						<div class="section-title">
							<?php echo __('Contact', 'transparency')?>
						</div>
						<div class="email">
		          <a href="mailto:?subject=<?php echo get_bloginfo( 'title', 'display' ) ?>">
						AMTI@csis.org
							</a>
						</div>

						<p>1616 Rhode Island Avenue, NW<br/>
							Washington, DC 20036
						</p>
					</div>
				</div>

				<div class="subscribe">
					<div class="section-title">
						<?php echo __('Subscribe', 'transparency')?>
					</div>
					<p>
						Get the AMTI Brief, our monthly feature on political, military, and environmental developments in the South and East China Seas and the claimants bordering them.
					</p>

						<a class="button" href="mailto:amti@csis.org?subject=Subscribe to newsletter&body=Please add me to the AMTI mailing list:
						%0A
						Name:%0AAffiliation:%0AAddress:%0APhone Number (optional):">Sign Up</a>

				</div>

				<div class="footer-menu">
					<div class="section-title">
						<?php echo __('Explore', 'transparency')?>
					</div>
					<?php





						wp_nav_menu( array('menu' => 'Footer Menu') );
					?>
				</div>


			</div>
			</div>


		<div class="site-info">
			<div class="site-info-container">
				 <?php echo date('Y') . __(' The Asia Maritime Transparency Initiative and The Center for Strategic and International Studies', 'transparency'); ?> | <a href="https://www.csis.org/privacy-policy" target="_blank" rel="nofollow">Privacy Policy</a>
		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
