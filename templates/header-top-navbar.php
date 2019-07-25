<?php if(get_field('public_enabled','option')) : ?>
	<header class="navbar navbar-inverse banner enabled" role="banner">
	<a href="<?php echo get_the_permalink(get_field('header_link','option')); ?>">
	<div id="orange" style="background-image:url(<?php the_field('header_background','option'); ?>);">
		<p><?php the_field('header_text','option'); ?></p>
  	</div>
	</a>
<?php else: ?>
	<header class="navbar navbar-inverse banner" role="banner">
<?php endif; ?>
  <div class="container">
    
      <div id="topnav-wrap" class="row">
          <nav id="top-menu" >
            
            <?php get_template_part('templates/searchform'); ?>
              
            <ul>
<?php /* ?>
              <li><a href="<?php echo get_site_url('', '/?page_id=64'); ?>">Donate</a></li>
<?php */ ?>
              <li><a href="<?php echo get_site_url('', '/?page_id=245'); ?>">Contact</a></li>
              <li>
                <ul class="social-links">
                  <li><a id="facebook" href="https://www.facebook.com/pages/Building-Opportunities-for-Self-Sufficiency-BOSS/131098503583991" target="_blank"></a></li>
                  <li><a id="tweet" href="https://twitter.com/turnlivesaround" target="_blank"></a></li>
                  <li><a id="youtube" href="https://www.youtube.com/user/casboss" target="_blank"></a></li>
                </ul>
              </li>
            </ul>

        </nav>  
    </div>
      
    <div class="navbar-header" class="row">
        
      <a class="navbar-brand" href="<?php echo home_url('/') ?>"></a>
    </div><!-- END OF .navbar-header -->
      
    <div id="main-nav-wrap">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
          endif;
        ?>
    </div>
      
  </div>
</header>
