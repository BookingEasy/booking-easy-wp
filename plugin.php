<?php
/**
* @wordpress-plugin
* Plugin Name:       Sagenda
* Plugin URI:        http://www.sagenda.com/
* Description:       Sagenda is a free Online Booking / Scheduling / Reservation System, which gives customers the opportunity to choose the date and the time of an appointment according to your preferences.
* Version:           1.2.0 - Test rebuild from scratch
* Author:            sagenda
* Author URI:        http://www.sagenda.com/
* License:           GPLv2
* Domain Path:       /languages
*/

define('SAGENDA_PLUGIN_DIR', plugin_dir_path(__FILE__));
include_once( SAGENDA_PLUGIN_DIR . 'bootstrapper.php' );


function sagenda_main( $atts ){
	$bootstrapper = new Sagenda\bootstrapper();
	echo $bootstrapper->initApp();
}
add_shortcode( 'sagenda-wp', 'sagenda_main' );
