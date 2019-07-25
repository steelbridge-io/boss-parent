<?php while (have_posts()) : the_post(); 
	
	$contact 	= get_the_terms($post->ID, 'program-site' );
	$addr 		= types_render_field( 'address', array() );
	$phone 		= types_render_field( 'phone', array() );
	$serving 	= types_render_field( 'services', array() );
	$pop 		= types_render_field( 'populations', array() );
	$cap 		= types_render_field( 'capacity', array() );
	$success	= types_render_field( 'success', array() );

	$post = get_post( $post->ID );
	$slug = $post->post_name;


?>


  <article <?php post_class(); ?>>
    
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">

    	<?php 
    		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			}
			// else {
			//	echo '<img class="wp-post-image" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/default-prof-pic.gif" alt="filler image" />';
			// }
		?>

    	<div class="prog-meta row">
	    	<div id="contact-details" class="col-sm-6">
	    		<h4>Contact Details</h4>

							<?php // Loop to connect with related Contact person 
								// WP_Query arguments
								$args = array (
									'post_type'		=> 'team-member',
									'program-sites'	=>  $slug,
									'posts_per_page' => 1,
								);					
														
								// The Query
								$query_contact = new WP_Query( $args );
							?>

	    		<table>
	    			<tr>
						<th>Address</th><td><?php echo $addr; ?></td>
	    			</tr>
	    			<tr>
						<th>Contact</th>
						<td>
							
							<?php	
								// The Loop
								if ( $query_contact->have_posts() ) {
									while ( $query_contact->have_posts() ) {
											$query_contact->the_post();
											 echo the_title(); 
								
									}
								} else { // if no post found
									echo "N/A";
							 	}
							
							// Restore original Post Data
								wp_reset_postdata();
							?>
						</td>
	    			</tr>
	    			<tr>
						<th>Phone</th><td><?php echo $phone; ?></td>
	    			</tr>
	    			<tr>
						<th>Email</th>
						<td>
							<?php
								$email = array();

								// The Loop
								if ( $query_contact->have_posts() ) {
									while ( $query_contact->have_posts() ) {
											$query_contact->the_post();
											$email[] = types_render_field( 'email', array() );								
									}
								}
								
								$email = array_filter( array_map('trim', $email), 'strlen' );
								if( ! empty( $email ) ) {
									echo implode(", ", $email);
								} else {
									echo '<a href="' . get_permalink(245) . '">Contact Us</a>';
								}
							
							// Restore original Post Data
								wp_reset_postdata();
							?>


						</td>
	    			</tr>
	    		</table>
	    	</div>
	    	<div id="prog-info" class="col-sm-6">
	    		<h4>Program Information</h4>
	    		<table>
	    			<tr>
						<th>Services</th>
						<td>
							<?php the_tags('','<br />'); ?>
						</td>
	    			</tr>
	    			<tr>
						<th>Participants</th><td><?php echo $pop; ?></td>
	    			</tr>
	    			<tr>
						<th>Capacity</th><td><?php echo $cap; ?></td>
	    			</tr>
	    		</table>
	    	</div>
    	</div><!-- end of .prog-meta .row -->
    
    	<div class="prog-desc row">
      		<div class="col-sm-12">
      			<h3>Description</h3>
      			<?php the_content(); ?>
      		</div>	
    	</div>

    	<div class="prog-serv row">
      		<div class="col-sm-12">
      			<h3>Services</h3>
      			<?php echo $serving; ?>
      		</div>	
    	</div>

    	<?php // Program Success Stories
    		if (!empty($success) ) {
    			echo '<div class="prog-success row"><div class="col-sm-12"><div class="attn-box">';
    			echo '<div class="attn-content"><h3>Success Stories</h3>' . $success . '</div>'; 
    			echo '</div></div></div><!-- / .prog-success -->';
    		
    		} else {}
    	?>

    	<?php echo sharing_display(); ?>


    	<div class="prog-yarpp row">
    		<div class="col-sm-12">
    			<h4>Related Posts</h4>
				<?php related_posts(); ?> 
    		</div>
    	</div><!-- / .prog-yarpp -->

    </div><!-- end of .entry-content -->
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>