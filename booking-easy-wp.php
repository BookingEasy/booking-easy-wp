<?php

/**
 * @package booking easy 
 */
/*
  Plugin Name: Booking easy
  Plugin URI: https://github.com/BookingEasy/booking-easy-wp
  Description: This is an Online Booking System, which gives customers the opportunity to choose the date and and the time of an appointment according to one's own preferences and the booking can now be done online. Go to your Plugin configuration page, and save your Authntication token.
  Version: 
  Author: Zohaib, David
  Author URI: http://www.booking-easy.com/
  License: GPLv2 or later
 */

/*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
define("DirPath", plugins_url('', __FILE__));
define("MRS1_PLUGIN_URL", plugins_url('/', __FILE__));
if (!function_exists('is_plugin_active')) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
include_once( ABSPATH . 'wp-content/plugins/booking-easy-wp/admin/admin.php' );
include_once( ABSPATH . 'wp-content/plugins/booking-easy-wp/classes/PluginInstall.php');
include_once( ABSPATH . 'wp-content/plugins/booking-easy-wp/classes/shortcode.php' );

class MyBookingEasy {

    public function __construct() {

        PluginInstall::init();
       // if (is_admin()) {
            Admin::init();
            add_filter('admin_footer_text', array($this, 'bookingeasy_custom_admin_footer'));
        //} else {
            ShortCode::init();
        //}
    }

    function bookingeasy_custom_admin_footer() {
        echo '<span id="footer-thankyou">Developed by <a href="http://www.booking-easy.com/" target="_blank">IterationCorp</a></span>.';
    }

}

$objBookingEasy = new MyBookingEasy();
?>