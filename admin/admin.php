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
        add_action('admin_enqueue_scripts', array($this, 'mrs_admin_theme_js'));
        add_action('admin_enqueue_scripts', array($this, 'mrs_admin_theme_styles'));
        add_action('admin_init', array($this, 'mrs_admin_init'));
    }

    function mrs_wp_settings_menu() {
        add_options_page('My Reservation System', 'My Reservation System', 'manage_options', 'mrs_set_default_options', array($this, 'show_mrs_settings'));
    }

    function mrs_wp_output() {
        
    }

    function mrs_admin_theme_js() {

        wp_register_script('mrs', ABSPATH . 'wp-content/plugins/mrs-wp/js/mrs-admin.js', array('jquery'), false, true);
        wp_enqueue_script('mrs');
    }

    function mrs_admin_theme_styles() {
        wp_register_style('style', '/wp-content/plugins/mrs-wp/css/mrs-admin.css');
        wp_enqueue_style('style');
    }

    function show_mrs_settings() {
        $tab = 'mrs-settings';
        $options = get_option('mrs1_authentication_code');
        include_once( ABSPATH . 'wp-content/plugins/mrs-wp/admin/templates/config.php');
    }

    function mrs_admin_init() {
        add_action('admin_post_save_mrs1_options', array($this, 'process_mrs_options'));
    }

    function process_mrs_options() {
        $auth_code = "";
        if (!current_user_can('manage_options')) wp_die('Not allowed');
        check_admin_referer('mrs1');
        $options = get_option('mrs1_authentication_code');

        if (isset($_POST['mrs1_authentication_code'])) {

            $auth_code = $_POST['mrs1_authentication_code'];
        }

        update_option('mrs1_authentication_code', $auth_code);
        wp_redirect(add_query_arg('page', 'mrs_set_default_options', admin_url('options-general.php')));
        exit;
    }

}

?>