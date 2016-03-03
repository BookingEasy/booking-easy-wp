<?php

/**
* @wordpress-plugin
* Plugin Name:       Sagenda
* Plugin URI:        http://plugin-name.com/
* Description:       A plugin.
* Version:           1.2.0 - Test rebuild on Herbet
* Author:            Sagenda
* Author URI:        http://author.com/
* License:           MIT
* Domain Path:        /languages
*/

/*
* Translations
*/
add_action( 'plugins_loaded', 'my_herbert_plugin_load_textdomain' );
function my_herbert_plugin_load_textdomain() {
  load_plugin_textdomain( 'sagenda-wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/getherbert/framework/bootstrap/autoload.php';
