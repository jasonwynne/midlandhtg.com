<!-- this is the sidebar for new interior page -->
<div class="sidebar-right">
  <div class="side-menu-top">
    <?php wp_nav_menu( array( 'menu' => 'interior-north-sidebar' ) );?>
  </div>
  
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
  
  <div class="reviews">
  <!-- <?php do_shortcode('[reviews_all]'); ?> -->
 
  </div>
  
</div>