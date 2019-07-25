<?php
/*
Template Name: Team Members
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

	<div id="featured" class="clearfix">
		<h3>Executive Director</h3>
		<ul>
		<?php
			$feat = array(
				'post_type'		=> 'team-member',
				'tag_id'		=> '30',
			);

			// The Query
			$query_feat = new WP_Query( $feat );

			// The Loop
			while ( $query_feat->have_posts() ) {
					$query_feat->the_post();

			$title 	= get_post_meta($post->ID, 'wpcf-title', TRUE);
			$phone 	= get_post_meta($post->ID, 'wpcf-phone-number', TRUE);
	        $email 	= get_post_meta($post->ID, 'wpcf-email', true);

		?>

			<li>
				<div class="headshot pic pull-left">
					<?php getHeadshot(); ?>
				
					<ul>
						<li><?php echo get_the_title(); ?></li>
						<li><?php echo $title; ?></li>
						<li><?php echo $phone; ?></li>
						<li><a href="mailto:<?php echo $email; ?>">Send email</a></li>
					</ul>

				</div>

				<?php the_content(); ?>

			</li>
		<?php }  

			// Restore original Post Data
			wp_reset_postdata();

		?>
		</ul>
	</div><!-- end of #featured -->

	
	<div id="admin" class="clearfix">
		<h3>Executive Management Team</h3>
		<ul>
		<?php
			$admin = array(
				'post_type'			=> 'team-member',
				'tag__not_in'		=> array(get_tag_id_by_name('featured')),
				'department'		=> 'admin',
				'order'				=> 'ASC',
				'orderby'           => 'menu_order',
			);


			// The Query
			$query_admin = new WP_Query( $admin );

			// The Loop
			while ( $query_admin->have_posts() ) {
				$query_admin->the_post();

				$title 	= get_post_meta($post->ID, 'wpcf-title', TRUE);
				$phone 	= get_post_meta($post->ID, 'wpcf-phone-number', TRUE);
		        $email 	= get_post_meta($post->ID, 'wpcf-email', TRUE);

		?>

			<li>
				<div class="headshot pic pull-left">
					<?php getHeadshot(); ?>
					<ul>
						<li><?php echo get_the_title(); ?></li>
						<li><?php echo $title; ?></li>
						<li><?php echo $phone; ?></li>
						<li><a href="mailto:<?php echo $email; ?>">Send email</a></li>
					</ul>
				</div>
			</li>

		<?php }  

			// Restore original Post Data
			wp_reset_postdata();

		?>
		</ul>
	</div><!-- end of #admin -->

</div><!-- end of #leadership -->

