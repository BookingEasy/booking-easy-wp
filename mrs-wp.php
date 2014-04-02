<?php

/**
 * @package MyReservation
 */
/*
  Plugin Name: My Reservation System
  Plugin URI: https://github.com/MyRerservationSystem/mrs-wp
  Description: This is an Online Reservation System, which gives customers the opportunity to choose the date and and the time of an appointment according to one's own preferences and the booking can now be done online. Go to your Plugin configuration page, and save your Authntication token.
  Version: 2.0
  Author: Zohaib, David
  Author URI: http://www.my-reservation-system.com/
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
include_once( ABSPATH . 'wp-content/plugins/mrs-wp/admin/admin.php' );
include_once( ABSPATH . 'wp-content/plugins/mrs-wp/classes/PluginInstall.php');

class MyReservationSystem {

    public function __construct() {

        PluginInstall::init();
        Admin::init();
        add_filter('admin_footer_text', array($this, 'concent_custom_admin_footer'));
    }

    function concent_custom_admin_footer() {
        echo '<span id="footer-thankyou">Developed by <a href="http://www.ding.se/" target="_blank">IterationCorp</a></span>.';
    }

}

$objReservation = new MyReservationSystem();
?>