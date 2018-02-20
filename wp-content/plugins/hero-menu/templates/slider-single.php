<div id='hero-menu-container'>
	<div class='feature-background' style='
		background-image:url("<?php echo $feat_image; ?>");
		background-position-x:<?php echo $feat_bgpos_x; ?>;
		background-position-y:<?php echo $feat_bgpos_y; ?>;
	'>
		<div class='overlay'>
			<div class='featuredItem-container'>
				<div class='featuredItem'>
					<div class='description'><?php echo $feat_description; ?></div>
					<div class='title'><a href='<?php echo $feat_link; ?>'><?php echo $feat_title; ?></a></div>
					<?php echo $date; ?>
					<?php echo $excerpt; ?>
					<a href='<?php echo $feat_link; ?>' class='seeMore'><?php echo __($feat_cta, 'heroMenu'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>