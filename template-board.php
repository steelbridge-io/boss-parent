<?php
/*
Template Name: Board Members
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<?php
	function getHeadshot ()
	{
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
		else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/headshot-filler.gif" alt="filler image" />';
		}
	}
?>

<div id="leadership">

	<div id="board" class="clearfix">

		<ul>
		<?php
			$bd = array(
				'post_type'			=> 'team-member',
				'department'		=> 'board',
				'order'				=> 'ASC',
				'orderby'           => 'menu_order',
			);


			// The Query
			$query_bd = new WP_Query( $bd );

			// The Loop
			while ( $query_bd->have_posts() ) {
				$query_bd->the_post();

			$title5 	= get_post_meta($post->ID, 'wpcf-title', TRUE);
	        $prog2 		= get_post_meta($post->ID, 'wpcf-program', TRUE);

		?>

			<li class="clearfix">
				
				<div class="headshot pic pull-left">
					<?php getHeadshot(); ?>
					<ul>
						<li><?php echo get_the_title(); ?></li>
						<li><?php echo $title5; ?></li>
						<li><?php echo $prog2; ?></li>					
					</ul>
				</div>

				<?php the_content(); ?>
			</li>

		<?php }  

			// Restore original Post Data
			wp_reset_postdata();

		?>
		</ul>
	</div><!-- end of #board -->


</div><!-- end of #leadership -->

