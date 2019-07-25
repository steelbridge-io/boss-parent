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
 <div class="section-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>Latest News</h1>
        </div>
      </div>
    </div>
  </div><!-- /.section-header -->


  <div class="header-bg"></div>

<div class="wrap container" role="document">
  <div class="content">
	<div class="feat-story row">

	<?php
        // WP_Query arguments 
        $args = array ('posts_per_page'=>'1');

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();

              $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
              $sub    = types_render_field( 'subtitle', array() );
              $cat    = get_the_category(); 

              $post = get_post( $post->ID );
              $slug = $post->post_name;

        ?>

            <a class="col-md-8 col-md-push-4 " href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <div class="post-box featured <?php echo $cat[0]->cat_name; ?>-post" style="background: #E5E1D6 url(<?php echo $imgsrc[0]; ?>) top center no-repeat; background-size: cover; "></div>
            </a>

            <div class="story-info feat col-md-4 col-md-pull-8 " >
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><h2><?php the_title(); ?></h2></a>
              <h4><?php echo $sub; ?></h4>
              <span class="story-cat"><?php // the_category(); ?></span>
              <span class="post-born"><?php the_time('F j, Y'); ?></span>
              <?php the_excerpt(); ?>
              <a class="button" href="<?php the_permalink(); ?>">Read More</a>

            </div>



        <?php }
        } else { ?>

          <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>

        <?php }
        // Restore original Post Data
        wp_reset_postdata();

        ?>


	</div><!-- feat story -->

	<div class="row latest-news" >


        <?php
        // WP_Query arguments 
        $args = array (
          'offset'                => '1',
          'posts_per_page'        => '6'
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();

              $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
              $cat = get_the_category(); 
        ?>
                    <div class="<?php echo $cat[0]->cat_name; ?>-post post-box col-xs-12 col-sm-6 col-lg-4" style="background: #E5E1D6 url(<?php echo $imgsrc[0]; ?>) 50% 50% no-repeat; background-size: cover; ">
                        <div class="story-info col-xs-12" >

                          <span class="story-cat"><?php the_category(); ?></span>

                          <span class="story-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><h3><?php the_title(); ?></h3></a><?php the_time('F j, Y'); ?></span>
                          
                      </div>
                    </div>

        <?php }
        } else { ?>

          <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>

        <?php }
        // Restore original Post Data
        wp_reset_postdata();

        ?>

      </div><!-- end/ .latest-news -->

 <div id="remaining" class="row">
        <div class="col-sm-6">
          <a class="button" href="<?php echo get_site_url(); ?>/?cat=5">News Archive</a>
        </div>
        <div class="col-sm-6">
          <a class="button" href="<?php echo get_site_url(); ?>/?cat=290">Events Archive</a>
        </div>
      </div>


  </div><!-- content -->
    <?php get_template_part('templates/footer'); ?>
</div><!-- wrap -->

</body>
</html>
