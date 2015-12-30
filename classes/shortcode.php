<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shortcode
 *
 * @author Riyadh, zohaib
 */
include_once( SAGENDA_PLUGIN_DIR . 'classes/MyReservationService.php');
include_once( SAGENDA_PLUGIN_DIR . 'classes/SubscribeForEvent.php');

class ShortCode {

    public $version;
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
        global $wp_version;
        $this->version = $wp_version;
        add_action('wp_enqueue_scripts', array($this, 'mrs_theme_styles'));
        add_action('wp_head', array($this, 'pluginname_ajaxurl'));
        add_action('wp_enqueue_scripts', array($this, 'LoadJqueryandJS'));
        add_shortcode('sagenda-wp', array($this, 'mrs1_book_event_shortcode_form'));
        add_action('wp_ajax_getEventsList', array($this, 'getEventsList_callback'));
        add_action('wp_ajax_nopriv_getEventsList', array($this, 'getEventsList_callback'));
        add_action('wp_ajax_subscribeForEvent', array($this, 'subscribeForEvent_callback'));
        add_action('wp_ajax_nopriv_subscribeForEvent', array($this, 'subscribeForEvent_callback'));
        
        //for paid event
        add_action('wp_ajax_subscribeForPaidEvent', array($this, 'subscribeForPaidEvent_callback'));
        add_action('wp_ajax_nopriv_subscribeForPaidEvent', array($this, 'subscribeForPaidEvent_callback'));        
        //add_action('init','register_session');
    }

    //start session
    function register_session() {
    if(!session_id()) {
        session_start();
    }
}

    function LoadJqueryandJS() {

        if ($this->version > 3.4) {
            wp_register_script('mrs', SAGENDA_PLUGIN_URL . 'js/sagenda.js', array('jquery'), false, true);
            wp_register_script('mrs3', SAGENDA_PLUGIN_URL . 'js/sagenda-datepicker.js', array('jquery'), false, true);

            wp_enqueue_script('mrs3');
            wp_enqueue_script('mrs');
        } else {
            wp_register_script('mrs', SAGENDA_PLUGIN_URL . 'js/sagenda_1.js', array('jquery'), false, true);
            wp_enqueue_script('mrs');
        }

        //     wp_enqueue_script('mrs2');
        //   wp_register_script('mrs2', SAGENDA_PLUGIN_URL . 'js/sagenda.min.js', array('jquery'), false, true);
    }

    function pluginname_ajaxurl() {
        ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
        <?php
    }

    function mrs_theme_styles() {
        wp_register_style('sagenda', SAGENDA_PLUGIN_URL . 'css/sagenda.css');
        wp_enqueue_style('sagenda');
    }

    public function _isCurl() {
        return function_exists('curl_version');
    }

    function mrs1_book_event_form() {
        if ($this->_isCurl()) {
            $bookableItems = $this->getBookableItems();
            $mrsService = new MyReservationService();
            $options = get_option('mrs1_authentication_code');
            $connected = $mrsService->ValidateAuthCode($options);            
        } else {
            $connected = 3;
        }
        include_once( SAGENDA_PLUGIN_DIR . 'templates/reservation.php');
    }

    function mrs1_book_event_shortcode_form() {
        ob_start();
        $this->mrs1_book_event_form();

        $output_string = ob_get_contents();
        ob_end_clean();

        return $output_string;
    }

    function getAvailbleEvents($bookableId) {
        
    }

    function getBookableItems() {
        $mrsService = new MyReservationService();
        $authCode = get_option('mrs1_authentication_code');
        return $mrsService->getBookableItems($authCode);
    }

    function getEventsList_callback() {
        setlocale(LC_ALL, 'de_DE');
        $mrsService = new MyReservationService();
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $bookableItemId = $_POST["bookableItemId"];
        $bookableItem = $_POST["bookableItem"];
        $authCode = get_option('mrs1_authentication_code');
        $events = $mrsService->getEventsList($authCode, $startDate, $endDate, $bookableItemId);
        $eventslist = "<ul class='events'>";
        $isPaidEvent = "0";
        $paidEventText = "Free Event";
        if (count($events) > 0 && $events != 2 && $events != 3) {
            foreach ($events as $event) {
                if($event->IsPaidEvent == 1){
                    $isPaidEvent = "1";
                    $paidEventText = $event->PaymentAmount . " " .$event->PaymentCurrency;
                }
                else{
                    $isPaidEvent = "0";
                    $paidEventText = "Free Event";
                }
                    
                $eventslist .= "<li class='eventlist-item'>
                <label class='checkbox-inline'> 
                    <div class='event-details' name='event-item' 
                        value='" . $event->EventScheduleId . "' 
                        id='select-" . $event->EventIdentifier . "'
                        data-multiple-paymentamount='".$event->PaymentAmount."'
                        data-multiple-paymentcurrency='".$event->PaymentCurrency."'
                        data-multiple-ispaidevent='".$isPaidEvent."'
                        datamultiple-eventtitle='".$event->EventTitle."'
                        datamultiple-eventIdentifier='".$event->EventIdentifier."'
                        datamultiple-bookableItemId='".$bookableItemId."'
                        datamultiple-eventScheduleId='".$event->EventScheduleId."'
                        datamultiple-bookableItemName='".$bookableItem."'
                        datamultiple-paymentNote='".$event->PaymentNote."'
                        > " . 
                        "<span><strong>" .
                        $event->From . ' - ' . $event->To . " : " . 
                        //$bookableItem ." : ". 
                        $event->EventTitle. 
                        " : ".$paidEventText."</strong></span>" .
                    "</div>
                </li>";
            }
            
        } else {
            $eventslist .= "<li class='eventlist-item'><label class='checkbox-inline'> No events found for the bookable item within the selected date range. </label></li>";
        }
        $eventslist .= "</ul>";
        echo $eventslist;
        die();
    }

    function subscribeForEvent_callback() {
        $obeEvent = new SubscribeForEvent();
        $obeEvent->setEventIdentifier($_POST["EventIdentifier"]);
        $obeEvent->setBookableItemId($_POST["BookableItemId"]);
        $obeEvent->setEventScheduleId($_POST["EventScheduleId"]);
        $obeEvent->setCourtesy($_POST["Courtesy"]);
        $obeEvent->setFirstName($_POST["FirstName"]);
        $obeEvent->setLastName($_POST["LastName"]);
        $obeEvent->setPhoneNumber($_POST["PhoneNumber"]);
        $obeEvent->setEmail($_POST["Email"]);
        $obeEvent->setDescription($_POST["Description"]);
        
        $obeEvent->setHostUrlLocation($_POST["HostUrlLocation"]);

        $mrsService = new MyReservationService();

        echo $mrsService->subscribeToEvent($obeEvent);
        die();
    }

    //this is call back for paid event
    function subscribeForPaidEvent_callback() {
        $obeEvent = new SubscribeForEvent();
        $obeEvent->setEventIdentifier($_POST["EventIdentifier"]);
        $obeEvent->setBookableItemId($_POST["BookableItemId"]);
        $obeEvent->setEventScheduleId($_POST["EventScheduleId"]);
        $obeEvent->setCourtesy($_POST["Courtesy"]);
        $obeEvent->setFirstName($_POST["FirstName"]);
        $obeEvent->setLastName($_POST["LastName"]);
        $obeEvent->setPhoneNumber($_POST["PhoneNumber"]);
        $obeEvent->setEmail($_POST["Email"]);
        $obeEvent->setDescription($_POST["Description"]);
        
        $obeEvent->setHostUrlLocation($_POST["HostUrlLocation"]);

        $mrsService = new MyReservationService();

        echo $mrsService->subscribeForPaidEvent($obeEvent);
        die();
    }        

}
?>
