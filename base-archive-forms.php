<?php get_template_part('templates/head'); ?>
<?php
	if(! is_user_logged_in()) {
		//wp_login_form();
	} else {
	      get_template_part('templates/dash_header');
	      get_template_part('templates/forms'); 
	}
?>

