<?php get_template_part('templates/head'); ?>
<?php
	if(! is_user_logged_in()) {
		//wp_login_form();
	} else {
	      get_template_part('templates/dash_header');
	}
	$page = get_queried_object();
	$slug = $page->slug;
	$title = str_replace('-',' ',$slug);
	$args = array (
		'post_type'=>'forms',
		'tax_query'=>array(
			array(
				'taxonomy'=>'form-category',
				'field'=>'slug',
				'terms'=>"$slug"
			),
		),
		'order'=>'DESC',
		'orderby'=>'ID'
	);
	$q = new WP_Query($args);	
?>
	<div class='container archive archive-dash'>
	<h1><?php echo $title; ?></h1>
	<table id='forms'>
		<thead>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>File</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
			<?php while($q->have_posts()) : $q->the_post(); ?>
			<tr>
				<?php 
				$id = get_the_id(); 
				$file = get_field('file',$id);
				$url = $file['url'];
				$title = get_the_title();
				$fname = $file['filename'];
				$date = get_the_date('l, F d, Y',$id);
				$terms = get_the_terms($id,'form-category');
				?>
				<td><?php echo $title ?></td>
				<td><?php echo $date ?></td>
				<td><?php echo "<p>$fname</p>";?></td>
				<td><a id='view' href="<?php echo $url; ?>">View</a></td>
			</tr>
			<?php endwhile ?>
			<?php wp_reset_postdata(); ?>
		</tbody>
	</table>
		<a href='/dashboard/'>
		<div class='back_button'>
			<h4>Back to Dashboard</h4>
		</div>
		</a>
	</div>
