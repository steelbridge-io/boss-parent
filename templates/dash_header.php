<?php if(get_field('staff_enabled','option')) : ?>
<header class="dash navbar navbar-inverse banner enabled" role="banner">
<a href="<?php echo get_the_permalink(get_field('header_link','option')); ?>">
<div id="orange" style="background-image:url(<?php the_field('header_background','option'); ?>);">
	<p><?php the_field('header_text','option'); ?></p>
  </div>
</a>
<?php else: ?>
<header class="dash navbar navbar-inverse banner" role="banner">
<?php endif; ?>
<div class="container dash">
      <div id="dash-topnav-wrap">
          <nav id="dash-top-menu" >
        <?php
            wp_nav_menu(array('theme_location' => 'dashboard_secondary', 'menu_class' => 'nav'));
        ?>    
              
        </nav>  
    </div>
      
        
      <a class="navbar-brand dash" href="<?php echo home_url('/') ?>"></a>
      
    <div id="dash-nav-wrap">
        <?php
            wp_nav_menu(array('theme_location' => 'dashboard_primary', 'menu_class' => 'nav nav-pills'));
        ?>
    </div>
      
</div>
</header>

