<footer class="content-info" role="contentinfo">
	
	<div class="row" id="footer-widgets">  
	    <?php dynamic_sidebar('sidebar-footer'); ?>
	</div><!-- END OF #footer-widgets -->  

    <div id="very-bottom" class="row">
        <nav id="footer-nav">
            <?php
              if (has_nav_menu('footer_navigation')) :
                wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav nav-pills'));
              endif;
            ?>
        </nav>
        <p id="copyright">
			1918 University Ave., Suite 2A, Berkeley, CA 94704, <span class="footer-block">Tel: (510) 649-1930, Fax: (510) 649-0627</span><br />
        	&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?>&trade;. All Rights Reserved.<br /> 
            A <a href="http://wellpixeled.com">WELLPIXELED</a> Website.
        </p>
    </div>

</footer>

<?php wp_footer(); ?>
