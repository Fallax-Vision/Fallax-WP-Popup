<?php
  /*
    Plugin Name: Fallax Popup Div Plugin
    Plugin URI: https://fallaxvision.com/
    Description: Creates a popup div that can be triggered by adding a class to any WordPress element.
    Version: 1.0
    Author: Fallax Vision
    Author URI: https://fallaxvision.com/
  */

  function popup_div_scripts() {
    wp_enqueue_style( 'popup-div-style', plugin_dir_url( __FILE__ ) . 'popup-div-style.css' );
    wp_enqueue_script( 'popup-div-script', plugin_dir_url( __FILE__ ) . 'popup-div-script.js', array( 'jquery' ), '1.0', true );
  }
  add_action( 'wp_enqueue_scripts', 'popup_div_scripts' );

  function popup_div_shortcode() {
    $content = '<div id="popup-div" class="popup_div_container"><div class="actual_popup">';
    $content .= '<h2>Get in Touch.</h2>';
    $content .= '<p>For any question, clarification, suggestion, or complaint, feel free to contact us. </p>';
    // this is how you can add a shortcode for fluent CRM form 👇
    $content .= do_shortcode('[fluentform id="1"]');
    $content .= '</div></div>';
    return $content;
  }
  add_shortcode( 'popup_div', 'popup_div_shortcode' );

  function popup_div_init() {
    add_filter( 'the_content', 'popup_div_add_class' );
  }
  add_action( 'init', 'popup_div_init' );

  function popup_div_add_class( $content ) {
    $content = str_replace( '<p>', '<p class="popup-div-trigger">', $content );
    return $content;
  }
?>