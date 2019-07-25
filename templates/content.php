<article <?php post_class( 'clearfix' ); ?>>
  <?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  	   echo '<div class="archive-thumb">'; 
       the_post_thumbnail('thumbnail'); 
       echo '</div><!-- /.archive-thumb -->';
  	}  
  ?>
  
  <header>
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php 
      if ( is_tax( 'job-type') || is_search() ) {
        // Do nothing...please
      } else {
        get_template_part('templates/entry-meta');
    } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
