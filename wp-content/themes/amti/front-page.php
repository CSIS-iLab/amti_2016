<?php/**
 * Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */
?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 <head>
 <meta charset="<?php bloginfo('charset'); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="profile" href="http://gmpg.org/xfn/11">
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

 <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
 <div id="page" class="site">
 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'transparency'); ?></a>

 	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
       	<div class="container">
         	<div class="row">
 	          	<div class="navbar-header">
 		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu-top-wrapper">
 		              <span class="sr-only">Toggle navigation</span>
 		              <span class="icon-bar"></span>
 		              <span class="icon-bar"></span>
 		              <span class="icon-bar"></span>
 		            </button>
 		            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
 		                              <h2><?php bloginfo('name'); ?></h2>
 		                            </a>
 	          	</div>

 				<!-- Bootstrap Navigation -->
         		<?php
                    wp_nav_menu(
    array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse navbar-responsive-collapse',
                        'container_id'      => 'main-menu-top-wrapper',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                        )
                    );
                ?>
 			</div>
 		</div><!-- /.container-fluid -->
     </nav>

 	<div id="content" class="site-content">


    <section class="primary">

      <img class="feature-image"  src="/wp-content/themes/amti/img/vietnam.png">

      <div class="feature-heading">

        <div class="feature-title">
          <div class="feature-subtitle">Latest Feature</div class="title-latest">
            Vietnam Expands Another Outpost
            <div class="date">June 13, 2018</div>
          </div>
      </div>

      <p class="feature-excerpt">
        Vietnam continues modest expansions to its outposts in the Spratly Islands, most recently on Ladd Reef. Satellite imagery shows that Hanoi has dredged a new channel and is expanding one of its two facilities (the other is a small lighthouse to the west) at the feature. <a href="x">CONTINUE READING</a>
      </p>

      <div class="recent-content">
        <div class="section-title">Recent Content</div>
        <div class="feature-list">
          <div class="feature">
            <div class="date"><span>jun</span> <span>22</span></div>
            <div class="title">Guerrilla Warfare Over the South China Sea: Updating Vietnam’s Doctrine</div>
            <div class="authors">by <a>Nguyen The Phuong</a></div>
          </div>
          <div class="feature">
            <div class="date"><span>jun</span> <span>22</span></div>
            <div class="title">Guerrilla Warfare Over the South China Sea: Updating Vietnam’s Doctrine</div>
            <div class="authors">by <a>Nguyen The Phuong</a></div>
          </div>
          <div class="feature">
            <div class="date"><span>jun</span> <span>22</span></div>
            <div class="title">Guerrilla Warfare Over the South China Sea: Updating Vietnam’s Doctrine</div>
            <div class="authors">by <a>Nguyen The Phuong</a></div>
          </div>
      </div>
      </div>

      <div class="margin-left">
      </div>

      <div class="margin-right">
      </div>

    </section>


    <section class="secondary">


          <img class="island-slideshow-image"  src="/wp-content/themes/amti/img/mischief.png">

        <div class="island-slideshow-caption">
          <span class="feature-subtitle">Photo:</span>
          <span class="feature-caption">Mischief Reef</span>
        </div>

        <div class="island-slideshow-slider">
          <span class="control">•</span>
          <span class="control active">•</span>
          <span class="control">•</span>
          <span class="control">•</span>
        </div>



      <div class="island-tracker">
        <div class="feature-title">
          Island Tracker
        </div>
        <p class="feature-excerpt">
          Five claimants occupy nearly 70 disputed reefs and islets spread across the South China Sea. They have built more than 90 outposts on these contested features, many of which have seen expansion in recent years.
        </p>
      </div>

      <div class="island-claimants">
        <p class="feature-description">Explore the database by selecting a claimant below.</p>
        <div class="islands">
          <div class="island">
              <img class="island-shape" src="/wp-content/themes/amti/img/island_tracker_icons/china-outline.svg">
              <div class="island-name">China</div>
          </div>
          <div class="island">
              <img class="island-shape" src="/wp-content/themes/amti/img/island_tracker_icons/malaysia-outline.svg">
              <div class="island-name">Malaysia</div>
          </div>
          <div class="island">
              <img class="island-shape" src="/wp-content/themes/amti/img/island_tracker_icons/phillipines-outline.svg">
              <div class="island-name">Phillipines

</div>
          </div>
          <div class="island">
              <img class="island-shape" src="/wp-content/themes/amti/img/island_tracker_icons/taiwan-outline.svg">
              <div class="island-name">Taiwan</div>
          </div>
          <div class="island">
              <img class="island-shape" src="/wp-content/themes/amti/img/island_tracker_icons/vietnam-outline.svg">
              <div class="island-name">Vietnam</div>
          </div>
        </div>
      </div>

        <div class="island-maps feature-heading">
          <div class="island-maps feature-title">
            Maps of the Asia Pacific
          </div>
          <p class="island-maps feature-description">
            AMTI’s interactive maps strive to provide the most complete, accurate, and up-to-date source of geospatial information on maritime Asia.
          </p>
        </div>


        <img class="island-maps feature-map"  src="/wp-content/themes/amti/img/map-territories.png">

      <div class="margin-left">
      </div>

      <div class="margin-right">
      </div>

      <div class="featured-in">
        <div class="section-title">
        Featured In
      </div>
      <div class="line"></div>
      <div class="logos">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/guardian.svg">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/nyt.svg">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/reuters.svg">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/smh.svg">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/wapo.svg">
<img class="logo" src="/wp-content/themes/amti/img/featured_in/wsj.svg">


      </div>
      </div>

    </section>


	</div>





		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if (is_active_sidebar('footer')) : ?>
				<div class="container">
					<div id="footer-widgets" class="widget-area row" role="complementary">
						<?php dynamic_sidebar('footer'); ?>
					</div><!-- #footer-widgets -->
				</div>
			<?php endif; ?>

			<div class="site-info">
				<div class="container">
					&copy; <?php echo date('Y') . __(' The Asia Maritime Transparency Initiative and The Center for Strategic and International Studies', 'transparency'); ?> | <a href="https://www.csis.org/privacy-policy" target="_blank" rel="nofollow">Privacy Policy</a>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

	<script src="http://amti.csis.test:35729/livereload.js?snipver=1"></script>

	</body>
	</html>
