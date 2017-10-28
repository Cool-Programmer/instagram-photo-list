<?php
  function ipl_enqueue_scripts()
  {
    wp_enqueue_style('ipl_main_stylesheet', plugins_url() . '/insta-photo-list/css/styles.css');
    wp_enqueue_script('ipl_main_javascript', plugins_url() . '/insta-photo-list/js/main.js', ['jquery']);
  }
  add_action('wp_enqueue_scripts', 'ipl_enqueue_scripts');
