<?php while (have_posts()) : the_post(); 
	
	$loc 			= types_render_field( 'job-loc', array() );
	$cname 			= types_render_field( 'contact-name', array() );
	$cpos 			= types_render_field( 'contact-position', array() );
	$phone 			= types_render_field( 'phone-number', array() );
	$email 			= types_render_field( 'contact-email', array() );
	$req 			= types_render_field( 'requirements', array() );
	$type 			= types_render_field( 'type', array() );
	$solo			= types_render_field( 'misc', array('option'=>'0') );
	$group			= types_render_field( 'misc', array('option'=>'1') );
	$age			= types_render_field( 'misc', array('option'=>'2') );
	$cred			= types_render_field( 'misc', array('option'=>'3') );
	
	$post = get_post( $post->ID );
	$slug = $post->post_name;


?>

  <article <?php post_class('jobs volunteers'); ?>>
    
    <div class="entry-content">
    	<div class="prog-meta row">
			<div class="col-sm-6">

				<table>
					<tr>
						<th>Location</th><td><?php echo $loc; ?></td>
					</tr>
					<tr>
						<th>Contact</th>
						<td><strong><?php echo $cname; ?> </strong><br /><?php echo $cpos; ?><td>
					</tr>
					<tr>
						<th>Phone</th><td><?php echo $phone; ?></td>
					</tr>	
					<tr>
						<th>Email</th><td><?php echo $email; ?></td>
					</tr>
				</table>
			</div>

			<div class="col-sm-6">
				<table>
					<tr>
						<th>Duration</th><td><?php echo $type; ?></td>
					</tr>
					<tr>
						<th>Individuals</th><td><?php echo $solo; ?></td>
					</tr>
					<tr>
						<th>Groups</th><td><?php echo $group; ?></td>
					</tr>					
					<tr>
						<th>Ages</th><td><?php echo $age; ?></td>
					</tr>	
					<tr>
						<th>Credits</th><td><?php echo $cred; ?></td>
					</tr>					
				</table>

			</div>

		</div><!-- /.prog-meta -->
	
		<?php
			if (!empty($req)) {
				echo '<div class="help-box">';
				echo '<h4>Requirements</h4><div>' . $req . '</div></div>';
			}
		?>


		<?php the_content(); ?>

    </div><!-- end of .entry-content -->
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>

<?php endwhile; ?>