<?php
/**
* Plugin Name: Hello hello sziasztok
* Plugin URI: https://www.youtube.com/channel/UCg9Wtxv8U5wndTTjJulIjeA
* Description: 
* Version: 1.0
* Author: Elek Zoltán
* Author URI: https://www.youtube.com/channel/UCg9Wtxv8U5wndTTjJulIjeA
**/

function register_the_magic() {
  var_dump(plugins_url('assets/css/style.css',__FILE__ ));
  wp_register_style('hhh', plugins_url('assets/css/style.css',__FILE__ ));
  wp_enqueue_style('hhh');
  
}

add_action( 'admin_init','register_the_magic');


add_action('admin_footer', 'my_admin_footer_function');
function my_admin_footer_function() {
  if(is_admin()){
  echo '<div class="elekmodal">
      <div>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/zC7ZMi4JgeA?autoplay=1&loop=1&autopause=0&playlist=zC7ZMi4JgeA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <div class="elekcontainer-old">
      <div class="elekimg"></div>
      <div class="elekimg top left"></div>
      <div class="elekimg top right "></div>
      <div class="elekimg right"></div>
    </div>
    <div class="elekcontainer">
      <div class="elekimg elekimg-1"></div>
      <div class="elekimg elekimg-2"></div>
      <div class="elekimg elekimg-3"></div>
      <div class="elekimg elekimg-4"></div>
    </div>
    <div class="elekimg-1"></div>
    <div class="elekimg-2"></div>
    <div class="elekimg-3"></div>
    <div class="elekimg-4"></div>
    <div class="elekimg-5"></div>
    <div class="elekimg-6"></div>
  '
    ;

    }
}
