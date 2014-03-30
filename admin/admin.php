<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 * The purpose of this class is to manage the admin side operations and interface
 * @author zohaib
 */
class Admin {

//put your code here
    private static $instance = null;

    public static function init() {
        if (!self::$instance) {
            self::$instance = new self();
        } else {
            throw new Exception("Already initalized.");
        }
    }

    private function __construct() {
        // register_activation_hook(__FILE__, array($this, 'mrs_set_default_options'));
        add_action('admin_menu', array($this, 'mrs_wp_settings_menu'));
        //add_action('wp_head', array($this, 'mrs_wp_output'));
        add_action('wp_enqueue_scripts', array($this, 'theme_js'));
        add_action('wp_enqueue_scripts', array($this, 'theme_styles'));
    }

    function mrs_wp_settings_menu() {
        add_options_page('My Reservation System', 'My Reservation System', 'manage_options', 'mrs_set_default_options', array($this,'show_mrs_settings'));
    }
    
    function show_mrs_settings () {
        $tab = 'mrs-settings';
        include_once( ABSPATH . 'wp-content/plugins/mrs-wp/admin/templates/config.php');
    }

    function mrs_wp_output() {
        
    }

    function mrs_admin_theme_js() {

        wp_register_script('mrs', ABSPATH . 'wp-content/plugins/mrs-wp/js/mrs.js');
        wp_enqueue_script('mrs');
    }

    function theme_styles() {
        wp_register_style('style',ABSPATH . 'wp-content/plugins/mrs-wp/css/mrs.css', array(), '1.0', 'all');
        wp_enqueue_style('style');
    }

}

?>