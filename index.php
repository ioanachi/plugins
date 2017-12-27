<?php
// Plugin Name:Ioana
// Plugin URI: https://ioana.com/
// Description: Ioana's first plugin
// Version: 2.0
// Author: Automattic
// Author URI: https://automattic.com/wordpress-plugins/
// License: GPLv2 or later
// Text Domain: ioana
if(!is_admin()){
add_filter('the_title','test_title');
}


function test_title($data){
  if(is_page()){
    return "<img src=". '"'.plugins_url( 'src/img/briefcase.jpg' , __FILE__ ).'"'.">".$data;
  }

  return "<img src=". '"'.plugins_url( 'src/img/car.jpg' , __FILE__ ).'"'.">".$data;
}


function car_func( $atts ) {
    return "<img src=". '"'.plugins_url( 'src/img/car.jpg' , __FILE__ ).'"'.">";
}
add_shortcode( 'car', 'car_func' );


function ioana_categories($atts){
  $categories = get_categories(['parent'  => 0]);
  
    $list= "<ul>";
      for ($i=0; $i < count($categories); $i++) {
        $list .="<li>";
        $list .=$categories[$i]->name;
        $list .="</li>";
};
    $list .= "</ul>";
  return $list;
}
add_shortcode( 'list', 'ioana_categories' );

 ?>
