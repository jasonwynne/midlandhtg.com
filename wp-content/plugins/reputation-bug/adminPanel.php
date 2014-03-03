<?php

/********************** Code for admin setting page ************************/
/********************** Adding js/css file *********************************/
wp_enqueue_script( 
    'reputation_bug_admin_validate'
    ,plugins_url( '/js/jquery.validate.js' , __FILE__ )
);
wp_enqueue_script( 
    'reputation_bug_admin'
    ,plugins_url( '/js/reputation_bug_admin.js' , __FILE__ )
);
global $wpdb;
$error = array();
$success = '';
/******************** Code to API settings form post *********************/
if($_POST['formtype'] === md5('reputation_bug')) {
    extract($_POST);
    if(empty($key)) {
        $error[] = REPOTATION_API_KEY_INSERT_ERROR;
    }
    if(empty($reviews)) {
        $error[] = REPOTATION_NO_OF_REVIEWS_INSERT_ERROR;
    }
    if(empty($scroll_limit)) {
        $error[] = REPOTATION_SCROLL_LIMIT_INSERT_ERROR;
    } elseif($scroll_limit > 10) {
        $error[] = REPOTATION_SCROLL_LIMIT_EXCEED_ERROR;
    }
    if(empty($thershold)) {
        $error[] = REPOTATION_THERSHOLD_INSERT_ERROR;
    }elseif($thershold > 5 ) {
        $error[] = REPOTATION_THERSHOLD_EXCEED_ERROR;
    }
    if(empty($error)) {
        update_option( 'rb_api_key', $key );
        update_option( 'rb_scroll_limit', $scroll_limit );
        update_option( 'rb_threshold', $thershold );
        update_option( 'rb_no_of_reviews', $reviews );
        $success = REPOTATION_API_SETTINGS_CHANGE_SUCCESS;
    }
}

/****************************** Showing Error/Success Message ******************/

if($error) {
    echo '<ul class="error_message">';
    foreach($error as $err) {
        echo '<li>'.$err.'</li>';
    }
    echo '</ul>';
    $error = '';
}
if($success) {
    echo    '<ul class ="success_message">
                <li>'.$success.'</li>
            </ul>';
}
?>
<!---------------------------- Code to showing api setting form ----------------->
<div id = "reputation_bug_div" >
    <div><?php _e(REVIEW_MODULE_INSTRUCTION);?></div><br>
    <form method="post" id = "reputation_bug_form">
        <div class="form-group">
            <div class="labelbox"><label><?php _e(REPOSITE_BUG_KEY);?><span>*</span> :</label></div>
            <div class="inputbox">
                <input type="text" placeholder="API Key" name="key" id="key" tabindex = "2" maxlength="32" value="<? echo get_option( 'rb_api_key');?>"/>
                <span>
                    <label for="key" generated="true" class="error"></label>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class="labelbox">
                <label><?php _e(REPOSITE_BUG_SIDEWIDGET_SCROLL_LIMIT);?><span>*</span> :</label>
            </div>
            <div class="inputbox">
                <input type="text" placeholder="API Review Scroll Limit" name="scroll_limit" id="scroll_limit" maxlength="2" tabindex = "2" value="<? echo get_option( 'rb_scroll_limit');?>"/>
                <span>
                    <label for="scroll_limit" generated="true" class="error"></label>
                </span>
                 
            </div>
        </div>
        <div class="form-group">
            <div class="labelbox">
                <label><?php _e(REPOSITE_BUG_NO_OF_REVIEWS);?><span>*</span> :</label>
            </div>
            <div class="inputbox">
                <input type="text" placeholder="API Review Scroll Limit" name="reviews" id="reviews" maxlength="2" tabindex = "2" value="<? echo get_option( 'rb_no_of_reviews');?>"/>
                <span>
                    <label for="reviews" generated="true" class="error"></label>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class="labelbox">
                <label><?php _e(REPOSITE_BUG_THRESHOLD_LIMIT);?><span>*</span> :</label>
            </div>
            <div class="inputbox">
                <input type="text" placeholder="API Review Threshold Limit" name="thershold" id="thershold"  maxlength="1" tabindex = "2" value="<? echo get_option( 'rb_threshold');?>"/>
                <span>
                    <label for="thershold" generated="true" class="error"></label>
                </span>
            </div>
        </div>
        <div class="btn-group_1">
            <input type="submit" value= "Submit" />
            <input type="hidden" name ="formtype" value="<?php echo md5('reputation_bug');?>" />
        </div>
    </form>
</div>
<?php
wp_enqueue_style('review_admin_css',plugins_url( '/css/review_admin.css' , __FILE__ ));