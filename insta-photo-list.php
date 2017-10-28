<?php
/*
*	Plugin name: Instagram Photo List
*	Plugin URI: http://www.iodevllc.com
*	Description: Your Instagram photos in a WordPress website
* Version: 0.1 beta
*	Author:	Mher Margaryan
*	Author URI: http://www.iodevllc.com
*/

if (!defined('ABSPATH')) {
  exit('You are not allowed to be here...');
}

// Global options variable
$ipl_options = get_option('ipl_settings');

// Require scripts
require_once(plugin_dir_path(__FILE__).'/includes/insta-photo-list-scripts.php');

// Require shortcodes
require_once('includes/insta-photo-list-shortcodes.php');

// Require settings
if (is_admin()) {
  require_once(plugin_dir_path(__FILE__).'/includes/insta-photo-list-settings.php');
}
