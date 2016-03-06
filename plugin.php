<?php

/**
* @wordpress-plugin
* Plugin Name:       Sagenda
* Plugin URI:        http://www.sagenda.com/
* Description:       Sagenda is a free Online Booking / Scheduling / Reservation System, which gives customers the opportunity to choose the date and the time of an appointment according to your preferences.
* Version:           1.2.0 - Test rebuild on Herbet
* Author:            Sagenda
* Author URI:        http://www.sagenda.com/
* License:           GPLv2
* Domain Path:       /languages
*/

/*
* Translations
*/
add_action( 'plugins_loaded', 'sagenda_plugin_load_textdomain' );
function sagenda_plugin_load_textdomain() {
  load_plugin_textdomain( 'sagenda-wp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/getherbert/framework/bootstrap/autoload.php';
