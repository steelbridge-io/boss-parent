<?php
/*
Template Name: Program Map
*/
?>


<?php get_template_part('templates/page', 'header'); ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	<div id="mapp0_poi_list" class="mapp-poi-list" style="width:100%"></div>