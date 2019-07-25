<div class='container archive'>
<?php 
		echo is_post_type_archive('forms');
		$args = array (
			'post_type'=>'newsletter',
			'order'=>'DESC',
			'orderby'=>'ID',
			'paged'=>get_query_var('paged')
		);
		$q = new WP_Query($args);
		while($q->have_posts()) : $q->the_post();
			$ID = get_the_id();
			$pdf = get_field('newsletter_file',$ID);
			$url = $pdf['url'];
			$thumb = get_field('thumbnail',$ID);
			$title = get_the_title();
			$date = get_the_date('l, F d, Y',$id);
			// removed <img src=$thumb />
			echo "<div class='newsletter'><a href=$url>";
			if($thumb) {
				echo "<img src=$thumb />";
			}
			echo "<p>$title</p><p>$date</p></a></div>";
		endwhile
	
	?>
<nav>
	<?php if(function_exists('wp_pagenavi')) {wp_pagenavi(array('query'=>$q));} ?>
</nav>
		<a href='/dashboard/'>
		<div class='back_button'>
			<h4>Back to Dashboard</h4>
		</div>
		</a>
</div>

