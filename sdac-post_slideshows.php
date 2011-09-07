<?php 
/*
Plugin Name: SDAC Post Slideshow
Plugin URI: http://www.sandboxdev.com
Description: SDAC Post Slideshow
Author: Jennifer Zelazny/SDAC Inc.
Author URI: http://www.sandboxdev.com
Version: 1.1.3
---------------------------------------------------
Released under the GPL license
http://www.opensource.org/licenses/gpl-license.php
---------------------------------------------------
This is an add-on for WordPress
http://wordpress.org/
---------------------------------------------------
This plugin is distributed  WITHOUT ANY WARRANTY; 
without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
---------------------------------------------------
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
	$sdac_post_options = add_meta_box( 'sdac_ps_url', 'Post Slideshow', 'sdac_ps_meta_box', 'post', 'normal', 'high' );
	$sdac_page_options = add_meta_box( 'sdac_ps_url', 'Page Slideshow', 'sdac_ps_meta_box', 'page', 'normal', 'high' );
}

# LOAD CUSTOM STYLES IN CUSTOM ADMIN
add_action( "admin_print_styles", 'sdac_ps_admin_styles' );
function sdac_ps_admin_styles() {
	wp_enqueue_style( 'sdac-admin-css', plugins_url( 'css/sdac-ps_admin.css', __FILE__ ) );
}

# LOAD CUSTOM SCRIPTS IN CUSTOM ADMIN
add_action( "admin_print_scripts", 'sdac_ps_admin_scripts' );
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
		$sdac_ps_slideshow_bg_color_override = (string) get_post_meta( $post_id, 'sdac_ps_slideshow_bg_color_override', true );
		$sdac_ps_slideshow_border_color_override = (string) get_post_meta( $post_id, 'sdac_ps_slideshow_border_color_override', true );
		$sdac_ps_fx_override = (string) get_post_meta( $post_id, 'sdac_ps_fx_override', true );
		$sdac_ps_timeout_override = (string) get_post_meta( $post_id, 'sdac_ps_timeout_override', true );
		$sdac_ps_speed_override = (string) get_post_meta( $post_id, 'sdac_ps_speed_override', true );
		$sdac_ps_pause_override = (string) get_post_meta( $post_id, 'sdac_ps_pause_override', true );
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
		$sdac_ps_slideshow_bg_color_override = '';
        $sdac_ps_slideshow_bg_color_override = format_to_edit( $sdac_ps_slideshow_bg_color_override );
        $sdac_ps_slideshow_border_color_override = '';
        $sdac_ps_slideshow_border_color_override = format_to_edit( $sdac_ps_slideshow_border_color_override );
		$sdac_ps_fx_override = '';
        $sdac_ps_fx_override = format_to_edit( $sdac_ps_fx_override );
        $sdac_ps_timeout_override = '';
        $sdac_ps_timeout_override = format_to_edit( $sdac_ps_timeout_override );
        $sdac_ps_speed_override = '';
        $sdac_ps_speed_override = format_to_edit( $sdac_ps_speed_override );
        $sdac_ps_pause_override = '';
        $sdac_ps_pause_override = format_to_edit( $sdac_ps_pause_override );
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
		<p>Slideshow and <span class="info"><strong>slide defaults are in grey</strong></span> next to the labels below.</p>
		<p>Find out more about jQuery Cycle's  <a href="http://jquery.malsup.com/cycle/options.html" target="_blank">slideshow options</a>.</p>
		<div class="sdac_ps_col">
			<h4>Override Slideshow Defaults</h4>
			<div>
				<label>Background Color: <span class="info">#ddd</span></label>
				<input type="text" name="sdac_ps_slideshow_bg_color_override" class="text" value="<?php echo esc_attr( $sdac_ps_slideshow_bg_color_override ); ?>">
			</div>
			<div>
				<label>Border Color: <span class="info">#bbb</span></label>
				<input type="text" name="sdac_ps_slideshow_border_color_override" class="text" value="<?php echo esc_attr( $sdac_ps_slideshow_border_color_override ); ?>">
			</div>
			<div>
				<label>FX: <span class="info">fade</span></label> 
				<select name="sdac_ps_fx_override">
					<option value="<?php echo esc_attr( $sdac_ps_fx_override ); ?>"><?php echo esc_attr( $sdac_ps_fx_override ); ?></option>
					<option value="">---</option>
					<option value="fade">fade</option>
					<option value="shuffle">shuffle</option>
					<option value="zoom">zoom</option>
					<option value="turnDown">turnDown</option>
					<option value="turnUp">turnUp</option>
					<option value="turnLeft">turnLeft</option>
					<option value="turnRight">turnRight</option>
					<option value="curtainX">curtainX</option>
					<option value="curtainY">curtainY</option>
					<option value="wipe">wipe</option>
				</select>
			</div>
			<div>
				<label>Timeout: <span class="info">0</span></label>
				<input type="text" name="sdac_ps_timeout_override" class="text" value="<?php echo esc_attr( $sdac_ps_timeout_override ); ?>">
			</div>
			<div>
				<label>Speed: <span class="info">1000</span></label>
				<input type="text" name="sdac_ps_speed_override" class="text" value="<?php echo esc_attr( $sdac_ps_speed_override ); ?>">
			</div>
			<div>
				<label>Pause: <span class="info">0</span></label>
				<select name="sdac_ps_pause_override">
					<option value="<?php echo esc_attr( $sdac_ps_pause_override ); ?>"><?php echo esc_attr( $sdac_ps_pause_override ); ?></option>
					<option value="">---</option>
					<option value="0">0</option>
					<option value="1">1</option>
				</select>
			</div>
		</div>
		<div class="sdac_ps_col">
			<h4>Override Slide Defaults</h4>
			<div>
				<label>Slide Width: <span class="info">575</span></label>
				<input type="text" name="sdac_ps_slide_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_slide_width_override ); ?>">
			</div>
			<div>
				<label>Slide Height: <span class="info">304</span></label>
				<input type="text" name="sdac_ps_slide_height_override" class="text" value="<?php echo esc_attr( $sdac_ps_slide_height_override ); ?>">
			</div>
			<div>
				<label>Image Width: <span class="info">300</span></label>
				<input type="text" name="sdac_ps_image_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_image_width_override ); ?>">
			</div>
			<div>
				<label>Image Height: <span class="info">300</span></label>
				<input type="text" name="sdac_ps_image_height_override" class="text" value="<?php echo esc_attr( $sdac_ps_image_height_override ); ?>">
			</div>
			<div>
				<label>Text Width: <span class="info">250</span></label>
				<input type="text" name="sdac_ps_text_width_override" class="text" value="<?php echo esc_attr( $sdac_ps_text_width_override ); ?>">
			</div>
		</div>
		<div class="clearjz"></div>
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
		wp_nonce_field( 'sdac_ps_slideshow_bg_color_override', 'sdac_ps_slideshow_bg_color_override_nonce', false );
		wp_nonce_field( 'sdac_ps_slideshow_border_color_override', 'sdac_ps_slideshow_border_color_override_nonce', false );
		wp_nonce_field( 'sdac_ps_fx_override', 'sdac_ps_fx_override_nonce', false );
		wp_nonce_field( 'sdac_ps_timeout_override', 'sdac_ps_timeout_override_nonce', false );
		wp_nonce_field( 'sdac_ps_speed_override', 'sdac_ps_speed_override_nonce', false );
		wp_nonce_field( 'sdac_ps_pause_override', 'sdac_ps_pause_override_nonce', false );
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
	</div>
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
			if ( $(".sdac_ps_field").size() >= 25 ) {
				if ( $(".note", $(this).parent()).size() <= 0 ) {
					$(this).parent().append('<span class="note" style="padding-left:1em;color:#c22;">You may only create up to 25 custom slides.</span>');
				}
				return false;
			}
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
		$sdac_ps_excerpt[] = wp_filter_post_kses( $excerpt );
	}
	update_post_meta( $post_id, 'sdac_ps_excerpt', $sdac_ps_excerpt );
	
	$sdac_ps_url = array();
	foreach ( $_POST['sdac_ps_url'] as $i => $url ) {
		$sdac_ps_url[] = esc_url_raw ( $url );
	}
	update_post_meta( $post_id, 'sdac_ps_url', $sdac_ps_url );
	
	$sdac_ps_image_url = array();
	foreach ( $_POST['sdac_ps_image_url'] as $i => $image_url ) {
		$sdac_ps_image_url[] = esc_url_raw ( $image_url );
	}
	update_post_meta( $post_id, 'sdac_ps_image_url', $sdac_ps_image_url );
	
	$sdac_ps_slideshow_bg_color_override = wp_filter_post_kses( $_POST['sdac_ps_slideshow_bg_color_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slideshow_bg_color_override', $sdac_ps_slideshow_bg_color_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slideshow_bg_color_override', $sdac_ps_slideshow_bg_color_override );		
		}
	$sdac_ps_slideshow_border_color_override = wp_filter_post_kses( $_POST['sdac_ps_slideshow_border_color_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slideshow_border_color_override', $sdac_ps_slideshow_border_color_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slideshow_border_color_override', $sdac_ps_slideshow_border_color_override );		
		}	
	$sdac_ps_fx_override = wp_filter_post_kses( $_POST['sdac_ps_fx_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_fx_override', $sdac_ps_fx_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_fx_override', $sdac_ps_fx_override );		
		}
	$sdac_ps_timeout_override = absint( $_POST['sdac_ps_timeout_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_timeout_override', $sdac_ps_timeout_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_timeout_override', $sdac_ps_timeout_override );		
		}
	$sdac_ps_speed_override = absint( $_POST['sdac_ps_speed_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_speed_override', $sdac_ps_speed_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_speed_override', $sdac_ps_speed_override );		
		}
	$sdac_ps_pause_override = absint( $_POST['sdac_ps_pause_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_pause_override', $sdac_ps_pause_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_pause_override', $sdac_ps_pause_override );		
		}
	
	$sdac_ps_slide_width_override = absint( $_POST['sdac_ps_slide_width_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slide_width_override', $sdac_ps_slide_width_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slide_width_override', $sdac_ps_slide_width_override );		
		}
	$sdac_ps_slide_height_override = absint( $_POST['sdac_ps_slide_height_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_slide_height_override', $sdac_ps_slide_height_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_slide_height_override', $sdac_ps_slide_height_override );		
		}
	$sdac_ps_image_width_override = absint( $_POST['sdac_ps_image_width_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_image_width_override', $sdac_ps_image_width_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_image_width_override', $sdac_ps_image_width_override );		
		}
	$sdac_ps_image_height_override = absint( $_POST['sdac_ps_image_height_override'] );
		if ( !add_post_meta( $post_id, 'sdac_ps_image_height_override', $sdac_ps_image_height_override, true ) ) {
			update_post_meta( $post_id, 'sdac_ps_image_height_override', $sdac_ps_image_height_override );		
		}
	$sdac_ps_text_width_override = absint( $_POST['sdac_ps_text_width_override'] );
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
			if ( preg_match("#\[post-slideshow[^\]]*\]#is", $post->post_content ) ) {
   				wp_enqueue_script( 'jquery' );
				wp_enqueue_script( 'jquery-cycle', plugins_url( 'js/jquery.cycle.min.js', __FILE__ ) );
   				add_action( 'wp_head', 'sdac_ps_wp_head' );
     		} 
   		} 
	} 
}


# CREATE THE NEEDED JS/CSS FOR THE SLIDESHOW
function sdac_ps_wp_head() {
	// Add in CSS Overrides (if any)
	echo '
		<!-- Start Slideshow CSS -->
		<style type="text/css">
			.sdac_ps_nav {margin:10px 0 10px 0;}
			.sdac_ps_nav a {border: 1px solid #ccc; background: #eee; text-decoration: none; margin: 0 5px 0 0; padding: 3px 5px 3px 5px;}
			.sdac_ps_nav a.activeSlide {background: #ddd;}
			.sdac_ps_nav a:focus {outline: none;}
		</style>
		<!-- End Slideshow CSS -->
		<script type="text/javascript">var sdac_post_slideshows = new Array();</script>
		';
}

# CREATE JS NEEDED FOR CUSTOM CYCLE
add_filter( 'the_content', 'sdac_ps_content_js' );
function sdac_ps_content_js( $content ) {
	global $post;
	// Set Defaults
	if ( get_post_meta( $post->ID, 'sdac_ps_fx_override', true) ) {
		$fx = esc_attr( get_post_meta($post->ID, 'sdac_ps_fx_override', true) );
	} else {
		$fx = 'fade';
	}
	if ( get_post_meta( $post->ID, 'sdac_ps_timeout_override', true) ) {
		$timeout = esc_attr( get_post_meta($post->ID, 'sdac_ps_timeout_override', true) );
	} else {
		$timeout = 0;
	}
	if ( get_post_meta( $post->ID, 'sdac_ps_speed_override', true) ) {
		$speed = absint( get_post_meta($post->ID, 'sdac_ps_speed_override', true) );
	} else {
		$speed = 1000;
	}
	if ( get_post_meta( $post->ID, 'sdac_ps_pause_override', true) ) {
		$pause = absint( get_post_meta($post->ID, 'sdac_ps_pause_override', true) );
	} else {
		$pause = 0;
	}
	$content .= '<script type="text/javascript">sdac_post_slideshows.push({fx: \''.$fx.'\', timeout: '.$timeout.', speed: '.$speed.', pause: '.$pause.',})</script>';
	static $returned_slideshow_js = null;
	if ( $returned_slideshow_js )
		return $content;
	// Add in JS for Cycle
	$content .= '
		<!-- Start Slideshow JS -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".sdac_ps").each(function(idx, ele) {
        			var $nav = $(\'<div class="sdac_ps_nav"></div>\').insertAfter(this);
        			$(this).cycle({
            			fx: sdac_post_slideshows[idx].fx,
            			timeout: sdac_post_slideshows[idx].timeout,
            			speed: sdac_post_slideshows[idx].speed,
            			pause: sdac_post_slideshows[idx].pause,
            			pager:  $nav
            		});
       		 	});
    		});
		</script>
		<!-- End Slideshow JS -->
		';
	$returned_slideshow_js = true;
	return $content;	
}

# CREATE THE SHORTCODE OUTPUT
add_shortcode( 'post-slideshow', 'sdac_ps_output' );
function sdac_ps_output( $atts ) {
	extract( shortcode_atts( array(
		'post_id' =>  get_the_ID(),
		'timeout' =>  0,
		'fx' => 'fade',
		'speed' => 1000,
		'pause' => 0
	), $atts ) );
	if ( get_post_meta($post_id, 'sdac_ps_title', true) ) {
		// Slideshow Style
		$slideshow_style = 'overflow:hidden;';
 		if ( get_post_meta( $post_id, 'sdac_ps_slide_width_override', true ) ) {
 			$slideshow_style .= 'width:'.absint( get_post_meta( $post_id, 'sdac_ps_slide_width_override', true ) ).'px;';
 		} else {
 			$slideshow_style .='width:575px;';
 		}	
 		if ( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ) {
 			$slideshow_style .= 'height:'.absint( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ).'px;';
 		} else {
 			$slideshow_style .='height:304px;';
 		}
 		if ( get_post_meta( $post_id, 'sdac_ps_slideshow_bg_color_override', true ) ) {
 			$slideshow_style .= 'background:'.esc_attr( get_post_meta( $post_id, 'sdac_ps_slideshow_bg_color_override', true ) ).';';	
 		} else {
 			$slideshow_style .='background:#ddd;';
 		}
 		if ( get_post_meta( $post_id, 'sdac_ps_slideshow_border_color_override', true ) ) {
 			$slideshow_style .= 'border:1px solid '.esc_attr( get_post_meta( $post_id, 'sdac_ps_slideshow_border_color_override', true ) ).';';	
 		} else {
 			$slideshow_style .= 'border:1px solid #bbb;';
 		}
 		// Slide Style
 		$slide_style = 'overflow:hidden;padding:2px;';
 		if ( get_post_meta( $post_id, 'sdac_ps_slide_width_override', true ) ) {
 			$slide_style .= 'width:'.absint( get_post_meta( $post_id, 'sdac_ps_slide_width_override', true ) ).'px;';
 		} else {
 			$slide_style .= 'width:575px';
 		}
 		if ( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ) {
 			$slide_style .= 'height:'.absint( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ).'px;';
 		} else {
 			$slide_style .= 'height:304px;';
 		}
 		// Slide Image
 		$slide_image_style = 'float:left;display:inline;margin-right:15px;overflow:hidden;';
 		if ( get_post_meta( $post_id, 'sdac_ps_image_width_override', true ) ) {
 			$slide_image_style .= 'width:'.absint( get_post_meta( $post_id, 'sdac_ps_image_width_override', true ) ).'px;';
 		} else {
 			$slide_image_style .= 'width:300px;';
 		}
 		if ( get_post_meta( $post_id, 'sdac_ps_image_height_override', true ) ) {
 			$slide_image_style .= 'height:'.absint( get_post_meta( $post_id, 'sdac_ps_image_height_override', true ) ).'px;';
 		} else {
 			$slide_image_style .= 'height:300px;';
 		}
 		// Slide Text
 		$slide_text_style = 'float:left;display:inline;';
 		if ( get_post_meta( $post_id, 'sdac_ps_text_width_override', true ) ) {
 			$slide_text_style .= 'width:'.absint( get_post_meta( $post_id, 'sdac_ps_text_width_override', true ) ).'px;';
 		} else {
 			$slide_text_style .= 'width:250px;';
 		}
 		if ( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ) {
 			$slide_text_style .= 'height:'.absint( get_post_meta( $post_id, 'sdac_ps_slide_height_override', true ) ).'px;';
 		} else {
 			$slide_text_style .= 'height:304px;';
 		}	
		$slides ='';
		foreach ( get_post_meta( $post_id, 'sdac_ps_title', true ) as $i => $title ) {
			$excerpt = get_post_meta( $post_id, 'sdac_ps_excerpt', true );
			$url = get_post_meta( $post_id, 'sdac_ps_url', true );
			$image_url = get_post_meta( $post_id, 'sdac_ps_image_url', true );

 			$slides .= '
 				<div class="sdac_ps_slide" style="'.$slide_style.'">
 					<div class="sdac_ps_image" style="'.$slide_image_style.'">
 						<img src="'.esc_url( $image_url[$i] ).'" alt="'.esc_attr( $title ).'" />
 					</div>
 					<div class="sdac_ps_text" style="'.$slide_text_style.'">
 					';
 					if ( $url[$i] ) { 
 						$slides .= '<h3><a href="'.esc_url( $url[$i] ).'">'.esc_attr( $title ).'</a></h3>';
 					} else {
 						$slides .= '<h3>'.esc_attr( $title ).'</h3>';
 					}
 					$slides .= '<p>'.html_entity_decode( $excerpt[$i], ENT_QUOTES ).'</p>
 					</div>
 				</div>';
 		}
 	}
    $output = '
    	<div class="sdac_ps" style="'.$slideshow_style.'">
    		'.$slides.'
    	</div>
    	';
    
	return $output;
}
