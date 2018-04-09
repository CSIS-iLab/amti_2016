<?php
/**
 * Template part for displaying islands.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>

		<div id="island-track-head">

		<div class="row" >
		<div class="col-xs-12 col-md-8" id="header-img">

			
				<?php echo get_the_post_thumbnail( $_post->ID, 'large' ); ?>
		
			
		</div>
		<div class="col-xs-12  col-md-4" id="header-info">

			<?php 
				$occupation = get_post_meta($post->ID, '_island-tracker_occupation', true);
				$status = get_post_meta($post->ID, '_island-tracker_status', true);
				$area = get_post_meta($post->ID, '_island-tracker_area', true);
				$gps = get_post_meta($post->ID, '_island-tracker_gps', true);

				$usa = get_post_meta($post->ID, '_island-tracker_usa', true);
				$china = get_post_meta($post->ID, '_island-tracker_china', true);
				$taiwan = get_post_meta($post->ID, '_island-tracker_taiwan', true);
				$vietnam = get_post_meta($post->ID, '_island-tracker_vietnam', true);
				$philippines = get_post_meta($post->ID, '_island-tracker_philippines', true);
				$malaysia = get_post_meta($post->ID, '_island-tracker_malaysia', true);
				$links = get_post_meta($post->ID, '_island-tracker_links', true);
			?>
						<div>
			<?php
				if ( is_single() ) :
				  the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h1 class="entry-title">', '</h1>' );
				endif;
			?>
			<div class="excerpt"><?php echo get_the_excerpt(); ?>
				<hr>
			</div>
		</div>

		<div class="row" id="data-output">
			<div id="tracker-names" class=" col-xs-12 col-sm-6 col-md-12">
		
				<?php

				
				if(!empty($china)) {
				    echo '<div><span class="name-label">'.esc_html__( 'China:', 'transparency' ).' </span> '.esc_attr($china)."</div>";
				}
				if(!empty($philippines)) {
				    echo '<div><span class="name-label">'.esc_html__( 'Philippines:', 'transparency' ).' </span> '.esc_attr($philippines)."</div>";
				}
				if(!empty($taiwan)) {
				    echo '<div><span class="name-label">'.esc_html__( 'Taiwan:', 'transparency' ).' </span> '.esc_attr($taiwan)."</div>";
				}
				if(!empty($malaysia)) {
				    echo '<div><span class="name-label">'.esc_html__( 'Malaysia:', 'transparency' ).' </span> '.esc_attr($malaysia)."</div>";
				}
				if(!empty($vietnam)) {
				    echo '<div><span class="name-label">'.esc_html__( 'Vietnam:', 'transparency' ).' </span> '.esc_attr($vietnam)."</div>";
				}
				?>
				
			
		</div>
		<hr>
			<div id="tracker-info" class="col-xs-12 col-sm-6 col-md-12">

			
				<?php 

				if(!empty($occupation)) {
				    echo '<div><span>'.esc_html__( 'Occupied by:', 'transparency' ).' </span> '.esc_attr($occupation)."</div>";
				}
				if(!empty($status)) {
				    echo '<div><span>'.esc_html__( 'Legal Status:', 'transparency' ).' </span> '.esc_attr($status)."</div>";
				}
				if(!empty($gps)) {
				    echo '<div><span>'.esc_html__( 'GPS:', 'transparency' ).' </span> '.esc_attr($gps)."</div>";
				}
				if(!empty($area)) {
				    echo '<div class="reclam-title"><span>'.esc_html__( 'Total area of reclamation:', 'transparency' ).' </span> '.esc_attr($area)."</div>";
				}
			?>
			
			
		</div>
			
		</div>
		</div>
	</div>


	</header><!-- .entry-header -->
<?php 


?>
<div class="anchor-links">

	</div>
	
	<div class="entry-content">
		<?php
			the_content();
		?>
		<hr>
		

			<?php $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);  if ( $repeatable_fields ) : ?>

				<?php echo '<h3 class="relinks">'.esc_html__( 'Analysis of Outpost', 'transparency' ).'</h3>'; ?>
				
			    <div class="relatedlist">
			    	  <div class="row">
			        <?php foreach ( $repeatable_fields as $field ) { ?>
			      
			        <div class="col-xs-12">
			            <?php 
			            if($field['name'] != '') 
			            	echo 
			            	'<a href="'. esc_url( $field['url'] ) . '" alt="'. esc_attr( $field['name'] ) . '">
			            		<span class="field">'. esc_attr( $field['name'] ) .'
			            		</span>
			            	</a>'; ?>

					</div><!-- .col-xs-12 -->
					<?php } ?> 
				<?php endif; ?>
				</div><!-- .row -->
				</div><!-- .list -->
	
	</div><!-- .entry-content -->
	

	<footer>
		<nav class="navigation posts-navigation" role="navigation">
			<?php
				$terms = get_the_terms( $post->ID , 'countries' );
				if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE != "en") {
					$langQuery = "/?lang=".ICL_LANGUAGE_CODE;
				}
		  ?>
			<h2 class="screen-reader-text">Posts navigation</h2>
			<div class="nav-links"><div class="nav-previous"><a href="/island-tracker/<?php echo $terms[0]->slug.$langQuery; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo sprintf( __('Return to %s\'s Island Tracker', 'transparency'), $terms[0]->name );?></a></div></div>
		</nav>
	</footer>
</article><!-- #post-## -->
