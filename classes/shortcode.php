<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shortcode
 *
 * @author zohaib
 */
class ShortCode {

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
        add_action('wp_enqueue_scripts', array($this, 'LoadJqueryandJS'));
        add_shortcode('mrs1_reservation', array($this, 'ch2ts_twitter_feed_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'theme_styles'));
        add_shortcode('submit-book-event', 'mrs1_book_event_form');
    }

    protected function LoadJqueryandJS() {
        wp_enqueue_script('jquery');
    }

    protected function mrs1_book_event_form() {
        
    }

    protected function ch2ts_twitter_feed_shortcode($atts) {
        $output = '';
        return $output;
    }

}

?>
