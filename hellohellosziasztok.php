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
  <div class="elekmodal">';

  if(get_option('elekzene_cb')==1){
    echo '<div>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/zC7ZMi4JgeA?autoplay=1&loop=1&autopause=0&playlist=zC7ZMi4JgeA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>';
  }

  if(get_option('sarkok_cb')==1){
    echo '<div class="elekcontainer-old">
      <div class="elekimg"></div>
      <div class="elekimg top left"></div>
      <div class="elekimg top right "></div>
      <div class="elekimg right"></div>
    </div>';
  }

  if(get_option('kozep_cb')==1){
    echo'<div class="elekcontainer">
      <div class="elekimg elekimg-1"></div>
      <div class="elekimg elekimg-2 top left"></div>
      <div class="elekimg elekimg-3 top right"></div>
      <div class="elekimg elekimg-4 right"></div>
    </div>';
  }

  if(get_option('futok_cb')==1){
  echo'<div class="elekimg elekimg-5"></div>
    <div class="elekimg elekimg-6"></div>';
  }

  if(get_option('csodagif_cb')==1){
    echo '
    <div class="tenor-gif-embed" data-postid="14316031" data-share-method="host" data-width="100%" data-aspect-ratio="1.7777777777777777"><a href="https://tenor.com/view/elek-zoltan-elek-zolt%c3%a1n-elek-zoltan-love-elek-zolt%c3%a1n-sz%c3%adv-elek-sz%c3%adv-gif-14316031">Elek Zoltan Elek Zoltán GIF</a> from <a href="https://tenor.com/search/elekzoltan-gifs">Elekzoltan GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    ';
  }
  echo '</div>';
}

function Elek_script() {
  wp_register_script('elek_script', plugin_dir_url( __FILE__ ) . '/assets/js/elek.js' );
  wp_enqueue_script( 'elek_script');
 }
 add_action('init', 'Elek_script');

function heoheo_register_settings() {
  register_setting( 'heoheo_options_group', 'elekzene_cb');
  register_setting( 'heoheo_options_group', 'csodagif_cb');
  register_setting( 'heoheo_options_group', 'kozep_cb');
  register_setting( 'heoheo_options_group', 'sarkok_cb');
  register_setting( 'heoheo_options_group', 'futok_cb');
}
add_action( 'admin_init', 'heoheo_register_settings' );

function heoheo_register_options_page() {
  add_options_page('Heoheoheo', 'Elek Zoltan', 'manage_options', 'heoheo', 'heoheo_options_page');
}
add_action('admin_menu', 'heoheo_register_options_page');

function heoheo_options_page()
{
?>
  <div>
    <?php screen_icon(); ?>
    <h2>Heo heo heo sziasztok!</h2>
    <form method="post" action="options.php">
      <?php settings_fields('heoheo_options_group'); 
        do_settings_sections('heoheo_options_group');?>
      <h3>Ez a plugin összecsokizza a WP-t</h3>
      <p>Ha változtatni szeretnél a csokoládé mértékén, ezt az alábbi beállításoknál megteheted. Egyébként kösz a letöltést :)</p>
      <table>
        <tr valign="top">
          <td><input type="checkbox" id="elekzene" name="elekzene_cb" value="1" <?php checked(1, get_option('elekzene_cb'), true);?>/></td>
          <td>Elek Zoltán muzsika</td>
        </tr>
        <tr valign="top">
          <td><input type="checkbox" id="csodagif" name="csodagif_cb" value="1" <?php checked(1, get_option('csodagif_cb'), true);?>/></td>
          <td>Csodálatos gif</td>
        </tr>
        <tr valign="top">
          <td><input type="checkbox" id="kozep" name="kozep_cb" value="1" <?php checked(1, get_option('kozep_cb'), true);?>/></td>
          <td>Középső képek</td>
        </tr>
        <tr valign="top">
          <td><input type="checkbox" id="sarkok" name="sarkok_cb" value="1" <?php checked(1, get_option('sarkok_cb'), true);?>/></td>
          <td>Sarok képek</td>
        </tr>
        <tr valign="top">
          <td><input type="checkbox" id="futok" name="futok_cb" value="1" <?php checked(1, get_option('futok_cb'), true);?>/></td>
          <td>Cikázó képek</td>
        </tr>
      </table>
      <?php  submit_button(); ?>
    </form>
  </div>
<?php
} ?>
