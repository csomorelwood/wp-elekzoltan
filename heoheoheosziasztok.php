<?php
/**
* Plugin Name: Heoheoheosziasztok
* Plugin URI: https://www.youtube.com/channel/UCnW0zKQIPp11APUWRYBDbtA
* Description: Elek Zoltán összecsokizza a WP-t
* Version: 1.0
* Author: Csömör
* Author URI: https://profiles.wordpress.org/csomorelwood/
**/

function register_the_unlimited_power_of_elek_zoltan_raised_by_csomorelwood() {
  wp_register_style('hhh', plugins_url('assets/css/style.css',__FILE__ ));
  wp_enqueue_style('hhh');
  
}

add_action( 'init','register_the_unlimited_power_of_elek_zoltan_raised_by_csomorelwood');

add_action( 'wp_footer', 'heoheoheoszaisztok_add_wp_footer_scripts_by_csomorelwood' );
function heoheoheoszaisztok_add_wp_footer_scripts_by_csomorelwood() {
if ( is_page() ) {    
    heoheo_admin_footer_function_by_csomorelwood();
   }
}

add_action('admin_footer', 'heoheo_admin_footer_function_by_csomorelwood');
function heoheo_admin_footer_function_by_csomorelwood() {
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
    echo '<img src="'.plugin_dir_url( __FILE__ ) . '/assets/images/elekgif.gif'.'">';
  }
  echo '</div>';
}

function magical_script_from_the_god_himself_csomorelwood() {
  wp_register_script('elek_script', plugin_dir_url( __FILE__ ) . '/assets/js/elek.js' );
  wp_enqueue_script( 'elek_script');
 }
 add_action('init', 'magical_script_from_the_god_himself_csomorelwood');

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
