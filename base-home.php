<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="jumbotron">
        <?php //echo do_shortcode("[metaslider id=16]"); ?>
  </div>

  <div class="container">
    <div class="row" id="mission">
      <div class="col-xs-12">
        <h1>Boss fights for social justice.</h1>
        <p>We are dedicated to helping homeless, poor, and disabled people achieve health and self-sufficiency, and to fighting against the root causes of poverty and homelessness.</p>
      </div>
    </div><!-- END OF #mission -->
    
    <div class="row" id="features">
      
      <div class="col-md-4">
        <h2>Donate</h2>
        <h4>Invest in lives and communities</h4>
        <p>Your tax deductible donation of any size helps to lift families and individuals out of homelessness. Donations pay for housing, meals, employment and health services, counseling, and other life-changing support.</p>
        <p>Donate in honor of a birthday or anniversary (we’ll send a card acknowledging the gift)… See if your employer offers donation matching… Set up monthly giving!</p>
        <p class="cta"><a href="<?php get_site_url(); ?>/?page_id=64">Donate Today<i class="fi-arrow-right"></i></a></p>
      </div>

      <div class="col-md-4">
        <h2>Volunteer</h2>
        <h4>Make a difference today</h4>
        <p>Volunteers are needed throughout the year, both for one-time projects and ongoing needs. Volunteer on your own or organize a volunteer day with co-workers or classmates.</p>
        <p>Volunteers help with program activities, tutoring kids and adults, gardening, property maintenance, preparing meals, and collecting needed items. Volunteers touch lives and enrich the community!</p>
        <p class="cta"><a href="<?php get_site_url(); ?>/?job-type=volunteer">Explore Positions <i class="fi-arrow-right"></i></a></p>
     </div>
      
      <div class="col-md-4">
        <h2>Connect</h2>
        <p>Subscribe to our mailing list:</p>
        <?php gravity_form(7, false, false, false, '', false); ?>
       <!-- &nbsp;
        <h4>FOLLOW US:</h4> 
        <ul class="social-links">
          <li><a id="facebook" href="https://www.facebook.com/pages/Building-Opportunities-for-Self-Sufficiency-BOSS/131098503583991" target="_blank"></a></li>
          <li><a id="tweet" href="https://twitter.com/turnlivesaround" target="_blank"></a></li>
          <li><a id="youtube" href="https://www.youtube.com/user/casboss" target="_blank"></a></li>
        </ul>-->
      </div>
    
    </div><!-- END OF features -->


    <div class="content">
        <div class="row" id="social-media">
        	<div class="col-md-6">
				<div class="fb-page" data-href="https://www.facebook.com/boss.self.sufficiency/" data-width="500" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/boss.self.sufficiency/"><a href="https://www.facebook.com/boss.self.sufficiency/">Building Opportunities for Self-Sufficiency (BOSS)</a></blockquote></div></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=348313312035229";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            </div>
            <div class="col-md-6">
            	<a class="twitter-timeline" href="https://twitter.com/turnlivesaround" data-widget-id="656151047774142464">Tweets by @turnlivesaround</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>

        <div class="row latest-news" >

          <h3 class="col-xs-12">Latest News</h3>

          <?php

            $args = array(
              'posts_per_page' => 4
            );
            $home_query = new WP_Query( $args );

          ?>

          <?php if ( $home_query->have_posts() ) : while ( $home_query->have_posts()) :$home_query->the_post(); ?>

          <?php 

            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
            $cat = get_the_category(); 

          ?>

            <div class="<?php echo $cat[0]->cat_name; ?>-post post-box col-xs-12 col-sm-6" style="background: #E5E1D6 url(<?php echo $imgsrc[0]; ?>) 50% 50% no-repeat; background-size: cover; ">
              <div class="story-info col-xs-12" >

                <span class="story-cat"><?php the_category(); ?></span>

                <span class="story-title">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><h1><?php the_title(); ?></h1></a><br /><?php the_time('F j, Y'); ?></span>
                
              </div>
            </div>


          <?php endwhile; else: ?>

            <p>Sorry, there are no posts to display</p>

          <?php endif; ?>

          <div class="col-xs-6 col-xs-push-3">
            <a class="button lrg" href="<?php echo get_site_url(); ?>/?page_id=70">More Updates</a>
          </div>  

        </div><!-- END OF .latest-news -->

    </div><!-- END OF .content -->


    <?php get_template_part('templates/footer'); ?>
    
  </div><!-- END OF #container -->

</body>
</html>
