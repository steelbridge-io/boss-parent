<?php
	$args = array (
		'post_type'=>'forms',
		'order'=>'DESC',
		'orderby'=>'ID'
	);
	$q = new WP_Query($args);	
	
?>
	<div class='container archive'>

	<div id="folders">

	 <iframe src="https://drive.google.com/embeddedfolderview?id=0BzEibuO-Qo9-MW9ZT2tpWm0tSFk#grid" width="700" height="500" frameborder="0"></iframe>	

	 </div>


	<!-- <div id='folders'>
	
			<?php 
				$slugs = array();
				while($q->have_posts()) : $q->the_post(); ?>
				<?php 
				$id = get_the_id(); 
				$terms = get_the_terms($id,'form-category');
				foreach($terms as $term) {
					$slugs[] = $term->slug;
				}
				
				?>
			<?php endwhile ?>
			<?php wp_reset_postdata(); ?>
	<?php file_put_contents(ABSPATH . '/wp-content/uploads/logs/log.txt',print_r($slugs,true)); ?>
	<?php 
		$slugs = array_unique($slugs);
		sort($slugs);
		foreach($slugs as $slug) {
			$folder = str_replace('-',' ',$slug);
			$link = "/form-category/$slug";
			echo "<div class='folder'><a href='$link'><h1 class='folder_icon'>b</h1><h4>$folder</h4></a></div>";
		}
	?>
	</div><!-- folders -->
		<a href='/dashboard/'>
		<div class='back_button'>
			<h4>Back to Dashboard</h4>
		</div>
		</a>
	</div>
