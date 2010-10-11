<?php 
/*
Plugin Name: SDAC Post Slideshow
Plugin URI: http://www.sandboxdev.com/blog-and-cms-development/wordpress/wordpress-plugins/
Description: SDAC Post Slideshow
Author: Jennifer Zelazny/SDAC Inc.
Version: 1.0
Author URI: http://www.sandboxdev.com
*/

# SDAC ADD IN CUSTOM QUICKTAG
add_action('admin_print_scripts', 'sdac_ps_quicktags');
function sdac_ps_quicktags() {
	wp_enqueue_script(
		'sdac_ps_quicktags',
		plugins_url( 'js/sdac-ps_quicktags.js?v001', __FILE__ ),
		array('quicktags')
	);
}

# SDAC POST CUSTOM FIELDS
add_action( 'admin_menu', 'sdac_ps_post_meta_box' );
function sdac_ps_post_meta_box() {
	$sdac_options = add_meta_box( 'sdac_ps_url', 'Post Slideshow', 'sdac_ps_meta_box', 'post', 'normal', 'high' );
}

# LOAD CUSTOM STYLES IN CUSTOM ADMIN
add_action( 'admin_print_styles', 'sdac_ps_admin_styles' );
function sdac_ps_admin_styles() {
	wp_enqueue_style( 'sdac-admin-css', plugins_url( 'css/sdac-ps_admin.css', __FILE__ ) );
}

# LOAD CUSTOM SCRIPTS IN CUSTOM ADMIN
add_action( 'admin_print_scripts', 'sdac_ps_admin_scripts' );
function sdac_ps_admin_scripts() {
	wp_enqueue_script( 'jquery' );
}

# SET UP META BOXES
function sdac_ps_meta_box( $post, $meta_box ) {
	if ( $post_id = (int) $post->ID ) {
		$sdac_ps_title = get_post_meta( $post_id, 'sdac_ps_title', true );
		if ( !is_array( $sdac_ps_title ) || count( $sdac_ps_title ) <= 0 ) {
			$sdac_ps_title = array( '' );
		}
		$sdac_ps_excerpt = get_post_meta( $post_id, 'sdac_ps_excerpt', true );
		if ( !is_array( $sdac_ps_excerpt ) || count( $sdac_ps_excerpt ) <= 0 ) {
			$sdac_ps_excerpt = array( '' );
		}
		$sdac_ps_url = get_post_meta( $post_id, 'sdac_ps_url', true );
		if ( !is_array( $sdac_ps_url ) || count( $sdac_ps_url ) <= 0 ) {
			$sdac_ps_url = array( '' );
		}
		$sdac_ps_image_url = get_post_meta( $post_id, 'sdac_ps_image_url', true );
		if ( !is_array( $sdac_ps_image_url ) || count( $sdac_ps_image_url ) <= 0 ) {
			$sdac_ps_image_url = array( '' );
		}
		$sdac_ps_slide_width_override = (string) get_post_meta( $post_id, 'sdac_ps_slide_width_override', true );
		$sdac_ps_slide_height_override = (string) get_post_meta( $post_id, 'sdac_ps_slide_height_override', true );
		$sdac_ps_image_width_override = (string) get_post_meta( $post_id, 'sdac_ps_image_width_override', true );
		$sdac_ps_image_height_override = (string) get_post_meta( $post_id, 'sdac_ps_image_height_override', true );
		$sdac_ps_text_width_override = (string) get_post_meta( $post_id, 'sdac_ps_text_width_override', true );
		
	} else {
		$sdac_ps_title = array( '' );
		$sdac_ps_excerpt = array( '' );
		$sdac_ps_url = array( '' );
		$sdac_ps_image_url = array( '' );
		$sdac_ps_slide_width_override = '';
        $sdac_ps_slide_width_override = format_to_edit( $sdac_ps_slide_width_override );
        $sdac_ps_slide_height_override = '';
        $sdac_ps_slide_height_override = format_to_edit( $sdac_ps_slide_height_override );
        $sdac_ps_image_width_override = '';
        $sdac_ps_image_width_override = format_to_edit( $sdac_ps_image_width_override );
        $sdac_ps_image_height_override = '';
        $sdac_ps_image_height_override = format_to_edit( $sdac_ps_image_height_override );
        $sdac_ps_text_width_override = '';
        $sdac_ps_text_width_override = format_to_edit( $sdac_ps_text_width_override );
  	}
?>
<div id="sdac_ps">
	<div id="sdac_ps_general">
		<h4>General Settings</h4>
		<p>By default, the slideshows are 575px wide x 304px high.  The image is set to 300px x 300px.  The text area is 250px wide.  There is also a 10px margin to the right of the image for spacing.</p>
		<div id="sdac_overrides">
			<h4>Override Defaults</h4>
			<div>
				<label>Slide Width:</label>
				<input type="text" name="sdac_ps_slide_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_slide_width_override ); ?>">
			</div>
			<div>
				<label>Slide Height:</label>
				<input type="text" name="sdac_ps_slide_height_override" class="text" value="<?php echo esc_attr( $sdac_ps_slide_height_override ); ?>">
			</div>
			<div>
				<label>Image Width:</label>
				<input type="text" name="sdac_ps_image_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_image_width_override ); ?>">
			</div>
			<div>
				<label>Image Height:</label>
				<input type="text" name="sdac_ps_image_height_override" class="text" value="<?php echo esc_attr( $sdac_ps_image_height_override ); ?>">
			</div>
			<div>
				<label>Text Width:</label>
				<input type="text" name="sdac_ps_text_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_text_width_override ); ?>">
			</div>
		</div>	
	</div>
	<div id="add"><a href="#" class="sdac_ps_add">Add Another Slide (+)</a></div>
		<?php if ( count($sdac_ps_title) > 0 ) : foreach ( $sdac_ps_title as $i => $title ) :  if ( $i % 2 ) $class = 'even'; else $class = 'odd'; ?>
		<div class="sdac_ps_field <?php echo $class;?>">
			<h4>Slide #<span class="index"><?php echo $i + 1;?></span></h4>
			<div>
				<label>Slide Title #<span class="index"><?php echo $i + 1;?></span>:</label>
				<input type="text" name="sdac_ps_title[]" class="text" value="<?php echo esc_attr( $sdac_ps_title[$i] ); ?>">
			</div>
			<div>
				<label>Slide Excerpt #<span class="index"><?php echo $i + 1;?></span>:</label>
				<textarea name="sdac_ps_excerpt[]" class="text"><?php echo esc_attr($sdac_ps_excerpt[$i]); ?></textarea>
			</div>
			<div>
				<label>Slide URL #<span class="index"><?php echo $i + 1;?></span>:</label>
				<input type="text" name="sdac_ps_url[]" class="text" value="<?php echo esc_attr( $sdac_ps_url[$i] ); ?>">
			</div>
			<div>
				<label>Slide Image URL #<span class="index"><?php echo $i + 1;?></span>:</label>
				<input type="text" name="sdac_ps_image_url[]" class="text" value="<?php echo esc_attr( $sdac_ps_image_url[$i] ); ?>">
			</div>
			<div class="remove">
				<a class="sdac_ps_remove" href="#">Remove (-)</a>
			</div>
		</div>
	<?php
		wp_nonce_field( 'sdac_ps_slide_width_override', 'sdac_ps_slide_width_override_nonce', false );
		wp_nonce_field( 'sdac_ps_slide_height_override', 'sdac_ps_slide_height_override_nonce', false );
		wp_nonce_field( 'sdac_ps_image_width_override', 'sdac_ps_image_width_override_nonce', false );
		wp_nonce_field( 'sdac_ps_image_height_override', 'sdac_ps_image_height_override_nonce', false );
		wp_nonce_field( 'sdac_ps_text_width_override', 'sdac_ps_text_width_override_nonce', false );
		wp_nonce_field( 'sdac_ps_title', 'sdac_ps_title_nonce', false );
		wp_nonce_field( 'sdac_ps_excerpt', 'sdac_ps_excerpt_nonce', false );
		wp_nonce_field( 'sdac_ps_url', 'sdac_ps_url_nonce', false );
		wp_nonce_field( 'sdac_ps_image_url', 'sdac_ps_image_url_nonce', false );	
	endforeach; endif;
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		function sdac_ps_reindex(){
			var index = 1;
			$(".sdac_ps_field").each(function(){
				$("span.index", this).html( '' + index + '' );
				index++;
			});
			sdac_ps_behaviors();
		}
		function sdac_ps_behaviors() {
			$(".sdac_ps_field .sdac_ps_remove").unbind("click").click(function(){
				if ( $(".sdac_ps_field").size() > 1 ) {
					$(this).parent().parent().remove();
				} else {
					$(".sdac_ps_field input").val('').eq(0).focus();
					$(".sdac_ps_field textarea").val('').eq(0).focus();
				} 
				sdac_ps_reindex();
				return false;
			});
		}
		$(".sdac_ps_add").unbind("click").click(function(){
			var new_field = $(".sdac_ps_field:first").clone();
			$(".sdac_ps_field:first").parent().append(new_field);
			$("input", new_field).val('');
			$("textarea", new_field).val('');
			sdac_ps_reindex();
			return false;
		});
		sdac_ps_behaviors();
	});
	</script>
<?php
}

# SAVE ALL DATA
add_action( 'save_post', 'sdac_ps_save_meta', 1, 2 );
add_action( 'publish_post', 'sdac_ps_save_meta', 1, 2 );
add_action( 'draft_post', 'sdac_ps_save_meta', 1, 2 );
function sdac_ps_save_meta( $post_id ) {
	if ( 
		!wp_verify_nonce( $_POST['sdac_ps_title_nonce'], 'sdac_ps_title' ) 
		)
		return;
	if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	if ($post->post_type == 'revision') {
		return;
	}
	
	// clean up
	$sdac_ps_title = array();
	foreach ( $_POST['sdac_ps_title'] as $i => $title ) {
		$sdac_ps_title[] = esc_attr( $title );
	}
	update_post_meta( $post_id, 'sdac_ps_title', $sdac_ps_title );
	
	$sdac_ps_excerpt = array();
	foreach ( $_POST['sdac_ps_excerpt'] as $i => $excerpt ) {
		$sdac_ps_excerpt[] = esc_attr( $excerpt );
	}
	update_post_meta( $post_id, 'sdac_ps_excerpt', $sdac_ps_excerpt );
	
	$sdac_ps_url = array();
	foreach ( $_POST['sdac_ps_url'] as $i => $url ) {
		$sdac_ps_url[] = esc_url ( $url );
	}
	update_post_meta( $post_id, 'sdac_ps_url', $sdac_ps_url );
	
	$sdac_ps_image_url = array();
	foreach ( $_POST['sdac_ps_image_url'] as $i => $image_url ) {
		$sdac_ps_image_url[] = esc_url ( $image_url );
	}
	update_post_meta( $post_id, 'sdac_ps_image_url', $sdac_ps_image_url );
	
	$sdac_ps_slide_width_override = esc_attr( $_POST['sdac_ps_slide_width_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slide_width_override', $sdac_ps_slide_width_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slide_width_override', $sdac_ps_slide_width_override );		
		}
	$sdac_ps_slide_height_override = esc_attr( $_POST['sdac_ps_slide_height_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slide_height_override', $sdac_ps_slide_height_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slide_height_override', $sdac_ps_slide_height_override );		
		}
	$sdac_ps_image_width_override = esc_attr( $_POST['sdac_ps_image_width_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_image_width_override', $sdac_ps_image_width_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_image_width_override', $sdac_ps_image_width_override );		
		}
	$sdac_ps_image_height_override = esc_attr( $_POST['sdac_ps_image_height_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_image_height_override', $sdac_ps_image_height_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_image_height_override', $sdac_ps_image_height_override );		
		}
	$sdac_ps_text_width_override = esc_attr( $_POST['sdac_ps_text_width_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_text_width_override', $sdac_ps_text_width_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_text_width_override', $sdac_ps_text_width_override );		
		}	
	
}


# LOAD CSS TO POST/PAGE WITH SHORTCODE
add_action( 'wp_print_styles', 'sdac_ps_load_css_js' );
function sdac_ps_load_css_js() {
	global $wp_query; 
	if ( !empty($wp_query->posts) ) { 
		foreach ( $wp_query->posts as $post ) { 
			if ( preg_match("#\[post-slidesho[^\]]*\]#is", $post->post_content ) ) {
				wp_enqueue_style( 'sdac-post-css', plugins_url( 'css/sdac-ps_post.css', __FILE__ ) );
				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'jquery-cycle', plugins_url( 'js/jquery.cycle.min.js', __FILE__ ) );
   				add_action( 'wp_head', 'sdac_ps_wp_head' );
     		} 
   		} 
	} 
}


# CREATE THE NEEDED JS FOR THE SLIDESHOW
function sdac_ps_wp_head() {
	global $post;
	// Add in JS for Cycle
	echo '
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$("#sdac_ps").cycle({ 
    				timeout: 0, 
    				pager:  \'#sdac_ps_nav\' 
				});
			});
		</script>
		';
	// Add in CSS Overrides (if any)
	if ( get_post_meta( $post->ID, 'sdac_ps_slide_width_override', true ) || get_post_meta( $post->ID, 'sdac_ps_slide_height_override', true ) || get_post_meta( $post->ID, 'sdac_ps_image_width_override', true ) || get_post_meta( $post->ID, 'sdac_ps_image_height_override', true ) || get_post_meta( $post->ID, 'sdac_ps_text_width_override', true ) ) {
		if ( get_post_meta( $post->ID, 'sdac_ps_slide_width_override', true ) ) {
			$style .= '#sdac_ps, #sdac_ps .sdac_ps_slide {width:'.get_post_meta( $post->ID, 'sdac_ps_slide_width_override', true ).'px !important;}
			';
		}
		if ( get_post_meta( $post->ID, 'sdac_ps_slide_height_override', true ) ) {
			$style .= '#sdac_ps, #sdac_ps .sdac_ps_slide {height:'.get_post_meta( $post->ID, 'sdac_ps_slide_height_override', true ).'px !important;}
			';
		}
		if ( get_post_meta( $post->ID, 'sdac_ps_image_width_override', true ) ) {
			$style .= '#sdac_ps .sdac_ps_image {width:'.get_post_meta( $post->ID, 'sdac_ps_image_width_override', true ).'px !important;}
			';
		}
		if ( get_post_meta( $post->ID, 'sdac_ps_image_height_override', true ) ) {
			$style .= '#sdac_ps .sdac_ps_image {height:'.get_post_meta( $post->ID, 'sdac_ps_image_height_override', true ).'px !important;}
			';
		}
		if ( get_post_meta( $post->ID, 'sdac_ps_text_width_override', true ) ) {
			$style .= '#sdac_ps .sdac_ps_text {width:'.get_post_meta( $post->ID, 'sdac_ps_text_width_override', true ).'px !important;}
			';
		}
		echo '<style type="text/css">
				'.$style.'
			</style>
			';
	}		
		
}

# CREATE THE SHORTCODE OUTPUT
add_shortcode( 'post-slideshow', 'sdac_ps_output' );
function sdac_ps_output() {
	global $post;
	if ( get_post_meta($post->ID, 'sdac_ps_title', true) ) {
		foreach ( get_post_meta($post->ID, 'sdac_ps_title', true ) as $i => $title ) {
			$excerpt = get_post_meta($post->ID, 'sdac_ps_excerpt', true );
			$url = get_post_meta( $post->ID, 'sdac_ps_url', true );
			$image_url = get_post_meta( $post->ID, 'sdac_ps_image_url', true );
 			$slides .= '
 				<div class="sdac_ps_slide">
 					<div class="sdac_ps_image">
 						<img src="'.$image_url[$i].'" alt="'.$title.'" />
 					</div>
 					<div class="sdac_ps_text">
 					';
 					if ( $url[$i] ) { 
 						$slides .= '<h3><a href="'.$url[$i].'">'.$title.'</a></h3>';
 					} else {
 						$slides .= '<h3>'.$title.'</h3>';
 					}
 					$slides .= '<p>'.$excerpt[$i].'</p>
 					</div>
 				</div>';
 		}
 	}
    $output = '
    	<div id="sdac_ps">
    		'.$slides.'
    	</div>
    	<div id="sdac_ps_nav"></div>
    	';
    
	return $output;
}
