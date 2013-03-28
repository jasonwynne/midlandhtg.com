<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;

if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Sidebar',
    'before_title'=>'<h4>',
    'after_title'=>'</h4>'
  ));
endif;

add_editor_style( 'editor-style.css' );

// Get the id of a page by its slug
function get_page_id($page_name){
  global $wpdb;
  $page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
  return $page_name;
}

// register external jquery library with wordpress & exclude from admin panel
function my_init_method() {
  if (is_admin() == false ):
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
    wp_enqueue_script( 'jquery' );
  endif;
}    
add_action('init', 'my_init_method');




?>