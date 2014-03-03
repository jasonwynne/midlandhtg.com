<?php

/**************************** Code to show list of review ********************/
global $wpdb;
$key = get_option( 'rb_api_key');
$page_limit = get_option( 'rb_no_of_reviews');
$threshold = get_option( 'rb_threshold');
if($_GET['offset']) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

/************************** Fetching data from api ***************************/

$url = REPUTATION_API_URL."apiKey=$key&noOfReviews=$page_limit&threshold=$threshold&offset=$offset";
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
	if(count($results->reviews)>0){
		?>
        <div class="top-section-wp">
		<div class="business_name">
			<?php echo $results->business_info->business_name; ?>
		</div>
		<div class="business_add">
			<?php echo $results->business_info->business_address; ?>
		</div>
		<div class="business_add">
			<?php echo $results->business_info->business_phone; ?>
		</div>
		<div class="total_rating_section">
			<span class="total-rating"><?php echo $results->business_info->total_rating->total_avg_rating; ?></span>
			<label class='rating'>
				<img src='<?php echo WP_PLUGIN_URL.'/reputation-bug/images/'.round($results->business_info->total_rating->total_avg_rating); ?>star.png'>
			</label>
			<span class="total-review"><?php echo $results->business_info->total_rating->total_no_of_reviews.' '.REVIEWS_LABEL; ?></span>
		</div>
		<a class="write-review" target="_blank" href="<?php echo $results->business_info->external_url; ?>"><?php echo WRITE_A_REVIEW_LABEL; ?></a>
        </div>
    <div id="rb_list">
        <div class="slider1">
            <?php
            $count = 0;
            foreach($results->reviews as $result) {
				$description = $result->description;
				if($result->review_from!=0){
					if (strlen ( $description ) > TEXT_LENGTH_REP) {
						$description = substr ( $description, 0, TEXT_LENGTH_REP ) . "..." . "<a target='_blank'  href=" . $result->review_url . ">".READ_MORE."</a>";
					}
				}
                echo "<div class='slide'>
				<div class='logo-block'>
				<label class='review_logo'><img src='".WP_PLUGIN_URL.'/reputation-bug/images/'.$result->review_source."logo.png'></label>
				</div>
								<div class='dec-block'>
                        <label class='cust-name'>".$result->customer_name.(!empty($result->customer_last_name)?' '.$result->customer_last_name:'')."</label>
							
                       
						 <label class='rating'><img src='".WP_PLUGIN_URL.'/reputation-bug/images/'.$result->rating."star.png'></label>
						
						<label class='date'>".date('m/d/y',strtotime($result->date_of_submission))."</label>
						 <label class='dec'>".$description."</label>
						</div>
                      			
								
                        
						
                    </div>";
                $count++;
            }
            ?>
            
        </div>
    </div>
    <?php
	if(count($results->reviews) >= $page_limit || $offset!=0){
    echo "<div class='pagination'>";
    if($offset==0) {
        echo "<a class='viewevent disabled' >Previous</a>";
    } else {
        echo "<a class='viewevent' href='".add_query_arg('offset',$offset-$page_limit ,get_permalink(get_option("reviews_all_id")))."'>Previous</a>";   
    }
    if($page_limit==$count){
        echo "<a class='viewevent' href='".add_query_arg('offset',$offset+$page_limit ,get_permalink(get_option("reviews_all_id")))."'>Next</a>";   
    }else{
        echo "<a class='viewevent disabled' >Next</a>";
    }
    echo "</div>";
	}
	}
}elseif(curl_getinfo($ch,CURLINFO_HTTP_CODE)==201) {
    echo '<div id="rb_list">No Record Exist</div>';
} else {
    echo CURL_ERROR;//'Curl error: ' . curl_error($ch);
}
curl_close($ch);

wp_enqueue_style('review_all_css',plugins_url( '/css/review_all.css' , __FILE__ ));
wp_enqueue_script('slide_js',plugins_url( '/js/jquery.bxslider.js' , __FILE__ ));
wp_enqueue_script( 'reputation_bug_widget',plugins_url( '/js/reputation_bug_widget.js' , __FILE__ ));
