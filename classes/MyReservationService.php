<?php

/**
 * Description of MyReservationService
 * This Class is User for interaction with the Web Service
 * @author zohaib
 */
include_once( ABSPATH . 'wp-content/plugins/mrs-wp/classes/SubscribeForEvent.php');

class MyReservationService {

    protected $apiUrl = 'https://mrs2.apphb.com/api/';

    public function __construct() {
        
    }

    public function ValidateAuthCode($authCode) {
        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . 'ValidateAccount/' . $authCode);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results->Success;
    }

    public function getBookableItems($authCode) {
        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetBookableItemList/' . $authCode);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function getEventsList($authCode, $startDate = "04-14-2014", $endDate = "04-30-2014") {
        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetAvailability/' . $authCode . '/' . $startDate . '/' . $endDate);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function subscribeToEvent($startDate, $BookableItemId, $EventScheduleId, $Courtesy, $FirstName, $LastName, $PhoneNumber, $Email, $Description) {
        try {
            $obeEvent = new SubscribeForEvent();
            $obeEvent->setStartDate($startDate);
            $obeEvent->setBookableItemId($BookableItemId);
            $obeEvent->setEventScheduleId($EventScheduleId);
            $obeEvent->setCourtesy($Courtesy);
            $obeEvent->setFirstName($FirstName);
            $obeEvent->setLastName($LastName);
            $obeEvent->setPhoneNumber($PhoneNumber);
            $obeEvent->setEmail($Email);
            $obeEvent->setDescription($Description);
            $jsonobj = str_replace('\\u0000', "", json_encode($obeEvent));
            $jsonobj = str_replace('SubscribeForEvent', "", $jsonobj);
            $json = file_get_contents($this->apiUrl . 'Events/SetBooking/' . $jsonobj);
            return $json;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function subscribeForEvent() {
        $Booking = array("ApiToken" => get_option('mrs1_authentication_code'), "StartDate" => "04-16-2014", "BookableItemId" => "52da20b1850ffb3318550763", "EventScheduleId" => "533e7791c1d27fcdc08642f7", "Courtesy" => "Mr", "FirstName" => "Zohaib", "LastName" => "Zahid", "PhoneNumber" => "0765562992", "Email" => "zohaib.mir@gmail.com", "Description" => "Hello Testing");
        $json_data = json_encode($Booking);        
        //$json = file_put_contents($this->apiUrl.'Events/SetBooking/'.$jsonobj); 
        
        $post = file_get_contents($this->apiUrl.'Events/SetBooking', null, stream_context_create(array(
                    'http' => array(
                        'protocol_version' => 1.1,
                        'user_agent' => 'MRS2',
                        'method' => 'POST',
                        'header' => "Content-type: application/json\r\n" .
                        "Connection: close\r\n" .
                        "Content-length: " . strlen($json_data) . "\r\n",
                        'content' => $json_data,
                    ),
                )));        
        if ($post) {
            echo $post;
        } else {
            echo "POST failed";
        }


        print_r($response);
    }

    //$json = file_get_contents($this->apiUrl . 'Events/SetBooking/' . $jsonobj);
}

?>
