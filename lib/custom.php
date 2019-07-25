<?php
/**
 * Custom functions
 */

// RETRIEVE TAG BY NAME
function get_tag_id_by_name($tag_name) {
	global $wpdb;
	return $wpdb->get_var("SELECT term_id FROM ".$wpdb->terms." WHERE `name` =  '".$tag_name."'");
}

add_filter('roots_wrap_base', 'roots_wrap_base_cpts'); // Add our function to the roots_wrap_base filter

  function roots_wrap_base_cpts($templates) {
    $cpt = get_post_type(); // Get the current post type
    if ($cpt) {
       array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
    }
    return $templates; // Return our modified array with base-$cpt.php at the front of the queue
  }

// FIX FOR PROGRAMS CTP TAG ARCHIVE DISPLAY
// REF: http://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('nav_menu_item', 'post','programs');
    $query->set('post_type',$post_type);
	return $query;
    }
}


// Add [box] Shortcode
function attn_box( $atts , $content = null ) {

  // Attributes
  extract( shortcode_atts(
    array(
      'header' => '',
      'id' => '',
      'class' => '',
    ), $atts )
  );

  // Code
return '<div class="attn-box ' . $class . '" id="' . $id . '"><h3>' . $header . '</h3><div class="attn-content">' . $content . '</div></div>';
}
add_shortcode( 'box', 'attn_box' );


// Add [attn] Shortcode
function help_block( $atts , $content = null ) {

  // Attributes
  extract( shortcode_atts(
    array(
      'id' => '',
      'class' => '',
    ), $atts )
  );

  // Code
return '<div class="help-box ' . $class . '" id="' . $id . '">' . $content . '</div>';
}
add_shortcode( 'attn', 'help_block' );



//Fix SSL on Post Thumbnail URLs
function ssl_post_thumbnail_urls($url, $post_id) {
        //Skip file attachments
        if( !wp_attachment_is_image($post_id) )
                return $url;

        //Correct protocol for https connections
        list($protocol, $uri) = explode('://', $url, 2);
        if( is_ssl() ) {
                if( 'http' == $protocol )
                        $protocol = 'https';
        } else {
                if( 'https' == $protocol )
                        $protocol = 'http';
        }

        return $protocol.'://'.$uri;
}
add_filter('wp_get_attachment_url', 'ssl_post_thumbnail_urls', 10, 2);

// Add conditional for sub-pages
function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we arn't at the page, and the page is not an ancestor
}


function pdf2jpg($file) {
	$newImg = get_attached_file($file).'[0]';
	$writeImg = substr($newImg,0,-7).'convert.jpg';
	$im = new Imagick();
	$im->setResolution(300,300);
	$im->readImage($newImg);
	$im->setImageColorspace(255);
	$im->setCompressionQuality(95);
	$im->setImageFormat('jpeg');
	$im->writeImage($writeImg);
	$im->clear();
	$im->destroy();
}
//add_action('add_attachment','pdf2jpg');

add_filter('wp_handle_upload_prefilter','cc_is_private');

function cc_is_private($file) {
	add_filter('upload_dir','cc_private_file');
	return $file;
}

function cc_private_file($dir) {
	$id = $_REQUEST['post_id'];
	if(get_post_type($id)=='newsletter'||get_post_type($id)=='forms'||get_post_type($id)=='dashboard-page') {
		$dir['path'] = $dir['basedir'] . '/private';	
		$dir['url'] = $dir['baseurl'] . '/private';	
	}
	return $dir;
}



function dashboard_logged_in() {
	if((is_page('Dashboard') || is_post_type_archive('forms') || is_post_type_archive('newsletter')) && ! is_user_logged_in()) {
	       	echo "<div id='dash_login_wrap'>";	
		echo "<img src='https://selfsufficient.wpengine.com/wp-content/themes/BOSS/assets/img/boss-logo_06.gif' />";
		wp_login_form(array('form_id'=>'dash_login'));
		echo "</div>";
	}
}
add_action('template_redirect','dashboard_logged_in');

acf_add_options_page('Orange Header');

function boss_login_redirect( $redirect_to, $request, $user ) {
	$site = get_site_url();
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			file_put_contents(ABSPATH.'/wp-content/uploads/logs/redirlog.txt',$site);
			return $site . '/dashboard-page/select-dashboard';
		} else {
			return $site . '/dashboard';
		}
	} else {
		return $redirect_to;
	}
}

add_filter('login_redirect','boss_login_redirect',10,3);

function form_add_default($post_id) {
	$cats = get_the_terms($post_id,'form-category');
	if(empty($cats)) {
		wp_set_object_terms($post_id,'general-forms','form-category');
		file_put_contents(ABSPATH . '/wp-content/uploads/logs/catlog.txt','empty');	
	}
}
add_action('save_post','form_add_default');

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

?>
