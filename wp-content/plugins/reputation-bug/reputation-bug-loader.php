<?php
/*
Plugin Name:Review API
Description:This plugin is used to view API reviews
Version: 1.0
*/
register_activation_hook(__FILE__,'reputation_bug_activeFunction');
register_deactivation_hook( __FILE__, 'reputation_bug_deActiveFunction');
require_once("reputation_bug_macros.php");

/************************* Code for admin section ****************/
add_action( 'admin_menu', 'reputation_bug_menu_contributor' );

function reputation_bug_menu_contributor() {
	global $wpdb;
	add_menu_page('Review API Settings', __('Review API Settings',contr), 'add_users', 'reputation-bug/adminPanel.php');    
}

/********************** Code for reputation bug widget ****************/
class PagesLink extends WP_Widget {
    function PagesLink() {
        $widget_ops = array('classname' => 'PagesLink', 'description' => 'Displays API Reviews On Sidebar' );
        $this->WP_Widget('PagesLink', 'Display API Reviews On Sidebar', $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        $number = $instance['count'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }
    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        if (!empty($title))
            echo $before_title . $title . $after_title;
        // WIDGET CODE GOES HERE
		$key = get_option( 'rb_api_key');
		$limit = get_option( 'rb_scroll_limit');
		$threshold = get_option( 'rb_threshold');
        $url = REPUTATION_API_URL."apiKey=$key&noOfReviews=$limit&threshold=$threshold&offset=0";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($cURL,CURLOPT_HTTPHEADER,array ("Accept: application/json"));
		$results = curl_exec($ch);
		if(curl_getinfo($ch,CURLINFO_HTTP_CODE)==200) {
			$results = json_decode($results);
			?>
			<div id="rb_list">
				<div class="slider">
					<?php foreach($results->reviews as $result) {
						$description = $result->description;
						if($result->review_from!=0){
							if (strlen ( $description ) > TEXT_LENGTH_REP) {
								$description = substr ( $description, 0, TEXT_LENGTH_REP ) . "..." . "<a target='_blank'  href=" . $result->review_url . ">".READ_MORE."</a>";
							}
						}
						echo "<div class='slide'>
						<div class='logo-block'>
						<label class='review_logo'><img src='".WP_PLUGIN_URL.'/reputation-bug/images/'.$result->review_source."logo.png'></label></div>
						<div class='dec-block'>
								<label class='cust-name'>".$result->customer_name.(!empty($result->customer_last_name)?' '.$result->customer_last_name:'')."</label>
								<label class='date'>".date('m/d/y',strtotime($result->date_of_submission))."</label>
								<label class='rating'><img src='".WP_PLUGIN_URL.'/reputation-bug/images/'.$result->rating."star.png'></label>
								<label class='dec'>".$description."</label>
								</div>
								
							</div>";
					}
					?>
					
				</div>
			</div>
			<?php
			echo "<a class='view-more' href='".get_permalink(get_option("reviews_all_id"))."'>view More</a>";
		} elseif(curl_getinfo($ch,CURLINFO_HTTP_CODE)==201) {
			echo '<div id="rb_list">No Record Exist</div>';
		} else {
			echo CURL_ERROR;
			//echo 'Curl error: ' . curl_error($ch);
		}
		curl_close($ch);
		?>
        <?php
		wp_enqueue_style('reputation_bug_widget_css',plugins_url( '/css/reputation_bug_widget.css' , __FILE__ ));
		wp_enqueue_script('slide_js',plugins_url( '/js/jquery.bxslider.js' , __FILE__ ));
		wp_enqueue_script( 'reputation_bug_widget',plugins_url( '/js/reputation_bug_widget.js' , __FILE__ ));
		
        echo $after_widget;
    }
}
add_action( 'widgets_init', create_function('', 'return register_widget("PagesLink");') );
///* Front end page creation starts from here*/
function create_pages($page_title,$page_code){
    global $wpdb;
    $the_page_title = $page_title;
    $the_page_name = $page_title;
    // the menu entry...
    delete_option($page_code."_title");
    add_option($page_code."_title", $the_page_title, '', 'yes');
    // the slug...
    delete_option($page_code."_name");
    add_option($page_code."_name", $the_page_name, '', 'yes');
    // the id...
    delete_option($page_code."_id");
    add_option($page_code."_id", '0', '', 'yes');
    $the_page = get_page_by_title( $the_page_title );
    if ( ! $the_page ) {
        // Create post object
        $_p = array();
        $_p['post_title'] = $the_page_title;
        $_p['post_content'] = "[" . $page_code . "]";
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'
        // Insert the post into the database
        $the_page_id = wp_insert_post( $_p );
    } else {
        // the plugin may have been previously active and the page may just be trashed...
        $the_page_id = $the_page->ID;
        //make sure the page is not trashed...
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post( $the_page );
    }
    delete_option( $page_code."_id" );
    add_option($page_code."_id", $the_page_id );
}

function remove_pages($page_code) {
    global $wpdb;
    $the_page_title = get_option( $page_code."_title" );
    $the_page_name = get_option( $page_code."_name" );
    //  the id of our page...
    $the_page_id = get_option( $page_code.'_id' );   /*get the page id*/
    if( $the_page_id ) {
        wp_delete_post( $the_page_id ); // this will trash, not delete
    }
    delete_option($page_code."_title");
    delete_option($page_code."_name");
    delete_option($page_code."_id");
}

/*function artist_activate
 *This function is hooked to the plugin activation hook
 */
function reputation_bug_activeFunction() {

    global $wpdb;
	create_pages('Reviews','reviews_all');
    add_option( 'rb_api_key', '' );
    add_option( 'rb_scroll_limit', 5 );
    add_option( 'rb_threshold', 1 );
	add_option( 'rb_no_of_reviews', 5 );
}

/*function rb_deactivate
 *This function is hooked to the plugin deactivation hook
 */
function reputation_bug_deActiveFunction() {
	global $wpdb;
	remove_pages('reviews_all');
    delete_option( 'rb_api_key' );
    delete_option( 'rb_scroll_limit' );
    delete_option( 'rb_threshold' );
	delete_option( 'rb_no_of_reviews' );
}


function reviews_all_shortcode(){
	require_once(plugin_dir_path(__FILE__) . "reviews_all.php");
}
add_shortcode("reviews_all", "reviews_all_shortcode");

// Load the auto-update class
add_action('init', 'check_update_action');
function check_update_action()
{
    require_once ('wp_autoupdate.php');
    $wptuts_plugin_current_version = '1.0';
    $wptuts_plugin_remote_path = PLUGIN_UPDATE_REMOTE_PATH.'/update.php' ;
    $wptuts_plugin_slug = plugin_basename(__FILE__);
    new wp_auto_update ($wptuts_plugin_current_version, $wptuts_plugin_remote_path, $wptuts_plugin_slug);
}
