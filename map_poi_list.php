<div class="row"> 
<?php foreach($map->pois as $poi) : ?>

<?php
	$postid 	= ($poi->postid) ? $poi->postid : $post->ID;
	$post_ 		= get_post($postid);

	$url 		= get_template_directory_uri(); 
	$title 		= get_the_title($postid);
    $addr 		= get_post_meta($postid, 'wpcf-address', true);
    $serve 		= get_post_meta($postid, 'wpcf-services', true);
    $people		= get_post_meta($postid, 'wpcf-populations', true);
    $thumb 		= wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'thumbnail' );
	$url2 = $thumb['0'];
	$tags 		= get_the_tag_list('', ', ', '', $post_->ID);
	$content	= apply_filters('the_content', $post_->post_content);
	$permalink 	= get_permalink($postid);
?>
		<?php if ($post_) : ?>

		<article  class="list-sites col-xs-12 col-sm-6 col-md-4 clearfix" role="article">

			<!--<div class="profile-thumb">

				<?php /*
					if ( has_post_thumbnail($postid) ):
						echo '<img src="' . $url2 . '" />';			
					else :
						echo '<img src="' . $url . '/assets/img/default-prof-pic.gif" alt="Default Image" title="Default Image" />';
					endif; */	
				?>
		        
		    </div>--><!-- end of .profile-thumb -->
		    
		    
		    <div class="wrapper">
		    
		        <header class="entry-header">
		            
		            <h3 class="entry-title scroll-top">
		            	<a href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
		            </h3>

		            <table>
		            	<tr class="services">
		            		<th><span class="glyphicon glyphicon-map-marker"></span></th>
		            		<td><a href="#top-link" onclick='mapp0.getPoiById(<?php echo $postid; ?>).open(false); return false;'  ><?php echo $addr; ?></a></td>
		            	</tr class="addr">
		            		<th><span class="glyphicon glyphicon-tags"></span></th>
		            		<td><?php echo $tags; ?></td>
		            	<tr>
		            	</tr>
		            </table>

		        </header><!-- .entry-header -->

			</div><!-- end of .wrapper -->

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endif; ?>

<?php endforeach; ?>
</div><!-- end .row -->

