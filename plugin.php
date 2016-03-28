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
include_once( SAGENDA_PLUGIN_DIR . 'initializer.php' );

/**
* Shortcode management
* @param  string  $atts   a list of parameter allowing more options to the shortcode
*/
function sagenda_main( $atts ){
	$initializer = new Sagenda\Initializer();
	echo $initializer->initFrontend();
}
add_shortcode( 'sagenda-wp', 'sagenda_main' );


/**
* Include CSS, JavaScript in the head section of the plugin.
*/
function head_code(){
	// Twitter bootstrap
	$headcode = '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/bootstrap/bootstrap-wrapper.css" >';
	$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/bootstrap/bootstrap-theme-wrapper.css" >';
	$headcode .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';

	// pickadate
	$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/themes/default.css" id="theme_base">';
	$headcode .= '<link rel="stylesheet" href="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/themes/default.date.css" id="theme_date">';
	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/picker.js"></script>';
	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/compressed/picker.date.js"></script>';
	$headcode .= '<script src="'.SAGENDA_PLUGIN_URL.'assets/vendor/pickadate/lib/legacy.js"></script>';

	echo $headcode;
}

/**
* Add it in the frontend
*/
add_action('wp_head','head_code');

/**
* Add it in the backend
*/
add_action('admin_head', 'head_code');

/**
* Action hooks for adding admin page
*/
function sagenda_admin() {
	$initializer = new Sagenda\Initializer();
	echo $initializer->initAdminSettings();
}
function sagenda_admin_actions() {
    add_options_page("Sagenda", "Sagenda", 1, "Sagenda", "sagenda_admin");
}
add_action('admin_menu', 'sagenda_admin_actions');