<?php get_template_part('templates/head'); ?>
<?php
	if(! is_user_logged_in()) {
		//wp_login_form();
	} else {
	      get_template_part('templates/dash_header');
	}
?>
<?php 
if(! is_user_logged_in()) {
    wp_redirect('/wp-login.php');
  }

   else {

  if (!current_user_can( 'manage_options' ) ) {
    
  wp_redirect('/dashboard');
  exit;
   }
   
  }


 ?>
<div class="container">
<div class="content row">
<div class="page-header" >
  <h1>
  	<?php 
  		if ( is_tax( 'job-type' ) ) {
  			echo roots_title() . " Positions";
  		} elseif ( is_category( 'news' ) ) {
  			echo '<span class="umph">BOSS</span> News Stories';
  		} elseif ( is_category( 'events' ) ) {
  			echo '<span class="umph">BOSS</span> Events';
  		} else {
    		echo roots_title();
    	}
   	?>
  </h1>
</div>

<?php if( is_tax() && ($desc = term_description()) ) { ?>
	<div class="tax-description">
		<?php echo $desc; ?>
    </div>
<?php } ?>
<?php
	$page = get_queried_object();
	if($page->post_title=='Select Dashboard') {
		echo "<a href='/dashboard'><div class='back_button'>BOSS Dashboard</div></a><br />";
		echo "<a href='/wp-admin'><div class='back_button'>Wordpress Dashboard</div></a>";
	}
?>

<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
</div>
</div>
