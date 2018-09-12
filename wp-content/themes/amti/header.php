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
