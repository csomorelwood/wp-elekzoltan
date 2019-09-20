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
  wp_register_style('hhh', plugins_url('assets/css/style.css',__FILE__ ));
  wp_enqueue_style('hhh');
  
}

add_action( 'init','register_the_magic');

add_action( 'wp_footer', 'using_front_page_conditional_tag' );
function using_front_page_conditional_tag() {
if ( is_page() ) {    
    my_admin_footer_function();
   }
}

add_action('admin_footer', 'my_admin_footer_function');
function my_admin_footer_function() {
  echo '
  <div id="leaves">
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
    <div class="leaf"></div>
  </div>
  <div class="elekmodal">
    <div>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/zC7ZMi4JgeA?autoplay=1&loop=1&autopause=0&playlist=zC7ZMi4JgeA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="elekcontainer-old">
      <div class="elekimg"></div>
      <div class="elekimg top left"></div>
      <div class="elekimg top right "></div>
      <div class="elekimg right"></div>
    </div>
    <div class="elekcontainer">
      <div class="elekimg elekimg-1"></div>
      <div class="elekimg elekimg-2 top left"></div>
      <div class="elekimg elekimg-3 top right"></div>
      <div class="elekimg elekimg-4 right"></div>
    </div>
    <div class="elekimg elekimg-5"></div>
    <div class="elekimg elekimg-6"></div>
  </div>
  '
    ;
}

function Elek_script() {
  wp_register_script('elek_script', plugin_dir_url( __FILE__ ) . '/assets/js/elek.js' );
  wp_enqueue_script( 'elek_script');
 }
 add_action('init', 'Elek_script');
