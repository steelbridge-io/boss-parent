<?php while (have_posts()) : the_post(); 
  
  $sub        = types_render_field( 'subtitle', array() );
  $date       = types_render_field( 'date-start', array() );
  $time       = types_render_field( 'time', array() );
  $place      = types_render_field( 'location-name', array() );
  $addr       = types_render_field( 'location-address', array() );

  $post = get_post( $post->ID );
  $slug = $post->post_name;

?>

  <article <?php post_class(); ?>>
    <header>
      <div class="post-thumb">
        <?php 
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail();
          } 
        ?> 
      </div><!-- /.post-thumb -->
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <h4 class="subtitle"><?php echo $sub; ?></h4>

      <div class="post-meta row">
        <div class="col-xs-12">
          <table>
            <tr>
              <th>Categories</th><td><?php the_category(', '); ?></td>
            </tr>
            <tr>
              <th>Author</th><td><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></td>
            </tr>          
            <tr>
              <th>Post Date</th><td><time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></td>
            </tr>
          </table> 
          <?php 
              if ( in_category( 'events' )) {
              echo "<table>";
              echo "<tr><th>Event Date</th><td>" . $date . "</td></tr>";
              echo "<tr><th>Event Time</th><td>" . $time . "</td></tr>";
              echo "<tr><th>Location</th><td><strong>" . $place . "</strong><br />" . $addr . "</td></tr>";         
              echo "</table>";
            }
          ?>
        </div>
      </div><!-- /.post-meta -->

    </header>
    <div class="entry-content">
      <?php echo sharing_display(); ?>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
