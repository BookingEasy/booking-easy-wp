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
include_once( ABSPATH . 'wp-content/plugins/mrs-wp/classes/MyReservationService.php');
include_once( ABSPATH . 'wp-content/plugins/mrs-wp/classes/SubscribeForEvent.php');

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
        add_action('wp_enqueue_scripts', array($this, 'mrs_theme_styles'));
        add_action('wp_head', array($this, 'pluginname_ajaxurl'));
        add_action('wp_enqueue_scripts', array($this, 'LoadJqueryandJS'));
        add_shortcode('mrs_reservation', array($this, 'mrs1_book_event_form'));
        add_action('wp_ajax_getEventsList', array($this, 'getEventsList_callback'));
        add_action('wp_ajax_nopriv_getEventsList', array($this, 'getEventsList_callback'));
        add_action('wp_ajax_subscribeForEvent', array($this, 'subscribeForEvent_callback'));
        add_action('wp_ajax_nopriv_subscribeForEvent', array($this, 'subscribeForEvent_callback'));
    }

    function LoadJqueryandJS() {

        wp_register_script('mrs', MRS1_PLUGIN_URL . 'js/mrs.js', array('jquery'), false, true);
        wp_register_script('mrs2', MRS1_PLUGIN_URL . 'js/bootstrap.min.js', array('jquery'), true, false);
        wp_register_script('mrs3', MRS1_PLUGIN_URL . 'js/bootstrap-datepicker.js', array('jquery'), true, false);
        wp_enqueue_script('jquery');
        wp_enqueue_script('mrs');
        wp_enqueue_script('mrs2');
        wp_enqueue_script('mrs3');
    }

    function pluginname_ajaxurl() {
        ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
        <?php
    }

    function mrs_theme_styles() {
        wp_register_style('style', '/wp-content/plugins/mrs-wp/css/mrs.css');
        wp_enqueue_style('style');
    }

    function mrs1_book_event_form() {
        $bookableItems = $this->getBookableItems();
        include_once( ABSPATH . 'wp-content/plugins/mrs-wp/templates/reservation.php');
    }

    function getBookableItems() {
        $mrsService = new MyReservationService();
        $authCode = get_option('mrs1_authentication_code');
        return $mrsService->getBookableItems($authCode);
    }

    function getEventsList_callback() {
        $mrsService = new MyReservationService();
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $authCode = get_option('mrs1_authentication_code');
        $events = $mrsService->getEventsList($authCode, $startDate, $endDate);
        $eventslist = "<ul class='events'>";


        foreach ($events as $event) {
            $eventslist .= "<li class='eventlist-item'><label class='checkbox-inline'> <input type='radio' name='event-item' value='" . $event->EventScheduleId . "' id='" . $event->EventScheduleId . "'>" . $event->Title . "</label></li>";
        }
        $eventslist .= "</ul>";
        echo $eventslist;
        die();
    }

    function subscribeForEvent_callback() {
//         $obeEvent = new SubscribeForEvent();
//        $obeEvent->setStartDate($_POST["startDate"]);
//        $obeEvent->setBookableItemId($_POST["BookableItemId"]);
//        $obeEvent->setEventScheduleId($_POST["EventScheduleId"]);
//        $obeEvent->setCourtesy($_POST["Courtesy"]);
//        $obeEvent->setFirstName($_POST["FirstName"]);
//        $obeEvent->setLastName($_POST["LastName"]);
//        $obeEvent->setPhoneNumber($_POST["PhoneNumber"]);
//        $obeEvent->setEmail($_POST["email"]);
//        $obeEvent->setDescription($_POST["Description"]);
        $mrsService = new MyReservationService();
        echo $mrsService->subscribeToEvent($_POST["startDate"], $_POST["BookableItemId"], $_POST["EventScheduleId"], $_POST["Courtesy"], $_POST["FirstName"], $_POST["LastName"], $_POST["PhoneNumber"], $_POST["Email"], $_POST["Description"]);

        die();
    }

}
?>
