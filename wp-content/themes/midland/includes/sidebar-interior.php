<!-- this is the sidebar for new interior page -->
<div class="sidebar-right">
  <div class="side-menu-top">
    <?php wp_nav_menu( array( 'menu' => 'interior-north-sidebar' ) );?>
  </div>
  
  <?php if (is_page('lennox-promotions')){ 
  
  }else{?>
  
  
    <?php if(get_field('int_sidebar', 'options')): ?>
    <div class="side-image-links">
  
    <?php while(has_sub_field('int_sidebar', 'options')): 
      $siImage = get_sub_field('si_image', 'options'); 
    
      $pageLink = get_sub_field('page_link', 'options'); 
      $offLink = get_sub_field('offsite_link', 'options');  
    
      if($pageLink !=""){
        $hasLink = $pageLink;
        $linkType = "page";
      }elseif($offLink !=""){
        $hasLink = $offLink;
        $linkType = "offsite";
      }else{
         $hasLink = "";
      }
    
   
    
      if($hasLink != ""){
      ?>
      <div class="li-single sin-linked" data-link="<?php echo $hasLink ?>" data-type="<?php echo $linkType ?>">
        <img alt="<?php echo $siImage['alt']; ?>" title="<?php echo $siImage['title']; ?>" src="<?php echo $siImage['url']; ?>" />
      </div>
      <?php }else{ ?>
      <div class="li-single">
        <img alt="<?php echo $siImage['alt']; ?>" title="<?php echo $siImage['title']; ?>" src="<?php echo $siImage['url']; ?>" />
      </div>
      <?php } ?>
    <?php endwhile; ?>
  
    </div>
    <?php endif; ?>
  <?php } ?>
  
  
  <?php if (is_page('reviews')){
  
  }else{ ?>
  
  <div class="reviews">
    <?php the_widget('PagesLink'); ?> 
  </div>
  <?php } ?>
</div>

<script type="text/javascript">

	$(function () {
	  $('.sin-linked').click(function(){
	    var $sinLinked = $(this);
	    var $linkTo = $sinLinked.attr('data-link');
	    var linkType = $sinLinked.attr('data-type');;
	    if(linkType == 'offsite'){
	      window.open($linkTo);
	    }else{
	      location.href =  $linkTo;  
	    }
	  });
	  
	}); // end doc ready for home page
		
</script>
	