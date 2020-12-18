<?php defined('ABSPATH') or die('No script kiddies please!');
/**
 * @wordpress-plugin
 * Plugin Name:       Sagenda
 * Plugin URI:        http://www.sagenda.com/
 * Description:       Sagenda is a free Online Booking / Scheduling / Reservation System, which gives customers the opportunity to choose the date and the time of an appointment according to your preferences.
 * Version:           1.3.5
 * Author:            sagenda
 * Author URI:        http://www.sagenda.com/
 * License:           GPLv2
 * Domain Path:       /languages
 */

/**
 * Plugin path management - you can re-use those constants in the plugin
 */
define('SAGENDA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SAGENDA_PLUGIN_URL', plugins_url('/', __FILE__));


/**
 * Load tranlations of the plugin
 */
function sagenda_load_textdomain()
{
	load_plugin_textdomain('sagenda-wp', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'sagenda_load_textdomain');

/**
 * Shortcode management
 * @param  string  $atts   a list of parameter allowing more options to the shortcode
 */
function sagenda_main($atts)
{
	if (sagenda_is_CURL_Enabled() === true) {
		if (sagenda_is_PHP_version_OK() == true) {
			include_once(SAGENDA_PLUGIN_DIR . 'initializer.php');
			$initializer = new Sagenda\Initializer();
			return $initializer->initFrontend($atts);
		}
	}
}
add_shortcode('sagenda-wp', 'sagenda_main');

/**
 * Check the version of PHP used by the server. Display a message in case of error. Unirest project require php >=5.4
 * @return true if version is ok, false if version is too old.
 */
function sagenda_is_PHP_version_OK()
{
	if (version_compare(phpversion(), '7.2.0', '<')) {
		echo "You are runing an outdated version of PHP !" . "<br>";
		echo "Your version is : " . phpversion() . "<br>";
		echo "Minimal version : " . "7.2.0<br>";
		echo "Recommended version : 7.3 - 8.x  (all version <7.3 are \"End of life\" and don't have security fixes!)" . "<br>";
		echo "Please read offical PHP recommendations <a href=\"http://php.net/supported-versions.php\">http://php.net/supported-versions.php</a><br>";
		echo "Please update your PHP version form your admin panel. If you don't know how to do it please contact your WebMaster or your Hosting provider!";
		return false;
	}
	return true;
}

/**
 * Check if CURL is enabled on the server, required for calling web services.
 * @return true if curl is enabled
 */
function sagenda_is_CURL_Enabled()
{
	if (!function_exists('curl_version')) {
		echo "You need to install cURL module in your PHP server in order to make WebServices calls!" . "<br>";
		echo "More info there : <a href=\"http://php.net/manual/en/curl.installation.php\">http://php.net/manual/en/curl.installation.php</a><br>";
		return false;
	}
	return true;
}

function sagenda_include_custom_script()
{
	wp_enqueue_script('bootstrapValidator', SAGENDA_PLUGIN_URL . 'assets/vendor/bootstrap-validator/validator.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script('uikit', SAGENDA_PLUGIN_URL . 'assets/uikit/uikit.min.js');
	wp_enqueue_script('uikitIcons', SAGENDA_PLUGIN_URL . 'assets/uikit/uikit-icons.min.js');
	wp_enqueue_script('picker', SAGENDA_PLUGIN_URL . 'assets/vendor/pickadate/lib/compressed/picker.js');
	wp_enqueue_script('pickerDate', SAGENDA_PLUGIN_URL . 'assets/vendor/pickadate/lib/compressed/picker.date.js');
	wp_enqueue_script('pickerLegacy', SAGENDA_PLUGIN_URL . 'assets/vendor/pickadate/lib/legacy.js');

	wp_enqueue_style( 'sagenda', SAGENDA_PLUGIN_URL . 'assets/vendor/bootstrap/bootstrap-wrapper.css');
	wp_enqueue_style( 'uikit', SAGENDA_PLUGIN_URL . 'assets/uikit/uikit.min.css');

	wp_enqueue_style( 'pickadateDefault', SAGENDA_PLUGIN_URL . 'assets/vendor/pickadate/lib/compressed/themes/default.css');
	wp_enqueue_style( 'pickadateDate', SAGENDA_PLUGIN_URL . 'assets/vendor/pickadate/lib/compressed/themes/default.date.css');
}
add_action('wp_enqueue_scripts', 'sagenda_include_custom_script');

/**
 * Action hooks for adding admin page
 */
function sagenda_admin()
{
	if (sagenda_is_CURL_Enabled() === true) {
		if (sagenda_is_PHP_version_OK() === true) {
			include_once(SAGENDA_PLUGIN_DIR . 'initializer.php');
			$initializer = new Sagenda\Initializer();
			echo $initializer->initAdminSettings();
		}
	}
}

function sagenda_admin_actions()
{
	add_options_page("Sagenda", "Sagenda", "manage_options", "Sagenda", "sagenda_admin");
}
add_action('admin_menu', 'sagenda_admin_actions');
