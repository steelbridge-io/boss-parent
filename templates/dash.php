<?php
	$args = array (
		'post_type'=>'forms',
		'order'=>'DESC',
		'orderby'=>'ID'
	);
	$q = new WP_Query($args);	
	
?>
	<div id='dash_container' class='container'>

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
	<div id='newsletters'>	
	<h1>Employee Newsletters</h1>
	<?php 
		$args = array (
			'post_type'=>'newsletter',
			'order'=>'DESC',
			'orderby'=>'ID',
			'posts_per_page'=>1
		);
		$q = new WP_Query($args);
		while($q->have_posts()) : $q->the_post();
			$ID = get_the_id();
			$pdf = get_field('newsletter_file',$ID);
			$url = $pdf['url'];
			$thumb = get_field('thumbnail',$ID);
			$title = get_the_title();
			$date = get_the_date('l, F d, Y',$ID);
			// removed <img src=$thumb />
			echo "<div class='newsletter'><a href=$url>";
			if($thumb) {
				echo "<img src=$thumb />";
			}
			echo "<p>$title</p><p>$date</p></a></div>";
		endwhile

	?>
	</div>
	<div id="dash_calendar">
	<iframe src="https://calendar.google.com/calendar/embed?src=calendar%40self-sufficiency.org&ctz=America/Los_Angeles" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
	</div>
	</div>
