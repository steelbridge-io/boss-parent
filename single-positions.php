<header>
<?php
	$terms = get_the_terms( $post->ID, 'job-type' );
							
	if ( $terms && ! is_wp_error( $terms ) ) : 

		$job_links = array();

		foreach ( $terms as $term ) {
			$job_links[] = $term->name;
		}
							
		$job_type = join( ", ", $job_links );
	?>
	<span class="subtitle"><?php echo $job_type; ?> Positions:</span>

<?php endif; ?>
  
  <h1 class="entry-title"><?php the_title(); ?></h1>
</header>


<?php get_template_part('templates/content', 'positions'); ?>