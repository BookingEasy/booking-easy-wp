<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
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

// Plugin path management
define('SAGENDA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SAGENDA_PLUGIN_URL', plugins_url('/', __FILE__));
include_once( SAGENDA_PLUGIN_DIR . 'bootstrapper.php' );

// Shortcode management
function sagenda_main( $atts ){
	$bootstrapper = new Sagenda\bootstrapper();
	echo $bootstrapper->initApp();
}
add_shortcode( 'sagenda-wp', 'sagenda_main' );

// Head reference injection for WP -> Twitter Bootstrap -> pickadate
add_action('wp_head','head_code');
function head_code(){
	// Twitter bootstrap
	$headcode = '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/bootstrap/bootstrap-wrapper.css" >';
	// Optional theme
	//$headcode .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';
	// compiled and minified JavaScript
	$headcode .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';

	// pickadate
	$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/themes/default.css" id="theme_base">';
	$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/themes/default.date.css" id="theme_date">';
	//$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/themes/default.time.css" id="theme_time">';

	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/picker.js"></script>';
	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/picker.date.js"></script>';
	//$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/picker.time.js"></script>';
	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/legacy.js"></script>';



	echo $headcode;
}
