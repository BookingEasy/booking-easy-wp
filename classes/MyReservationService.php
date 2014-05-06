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

    public function getEventsList($authCode, $startDate = "05-05-2014", $endDate = "05-30-2014") {
        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetAvailability/' . $authCode . '/' . $startDate . '/' . $endDate);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function subscribeToEvent(SubscribeForEvent $SEvent) {
        try {
            $Booking = array("ApiToken" => $SEvent->getApiToken(), "EventIdentifier" => $SEvent->getEventIdentifier(), "BookableItemId" => $SEvent->getBookableItemId(), "EventScheduleId" => $SEvent->getEventScheduleId(), "Courtesy" => $SEvent->getCourtesy(), "FirstName" => $SEvent->getFirstName(), "LastName" => $SEvent->getLastName(), "PhoneNumber" => $SEvent->getPhoneNumber(), "Email" => $SEvent->getEmail(), "Description" => $SEvent->getDescription());
            $json_data = json_encode($Booking);
            $post = file_get_contents($this->apiUrl . 'Events/SetBooking', null, stream_context_create(array(
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
            $result = json_decode($post);
            if ($result->Success) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function subscribeForEvent() {
        $Booking = array("ApiToken" => get_option('mrs1_authentication_code'), "EventIdentifier" => "NS82LzIwMTQgMTE6NTkgUE07NTMzZTc3OTFjMWQyN2ZjZGMwODY0MmY3", "BookableItemId" => "52da20b1850ffb3318550763", "EventScheduleId" => "533e7791c1d27fcdc08642f7", "Courtesy" => "Mr", "FirstName" => "Zohaib", "LastName" => "Zahid", "PhoneNumber" => "0765562992", "Email" => "zohaib.mir@gmail.com", "Description" => "Hello Testing");
        $json_data = json_encode($Booking);
        $post = file_get_contents($this->apiUrl . 'Events/SetBooking', null, stream_context_create(array(
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
//        $service_url = $this->apiUrl . 'Events/SetBooking/';
//
//        $curl = curl_init($service_url);
//        $curl_post_data = array("ApiToken" => get_option('mrs1_authentication_code'),
//            "StartDate" => "04-30-2014",
//            "BookableItemId" => "52da20b1850ffb3318550763",
//            "EventScheduleId" => "533e7791c1d27fcdc08642f7",
//            "Courtesy" => "Mr",
//            "FirstName" => "Zohaib",
//            "LastName" => "Zahid",
//            "PhoneNumber" => "0765562992",
//            "Email" => "zohaib.mir@gmail.com",
//            "Description" => "Hello Testing"
//        );
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
//
//        $curl_response = curl_exec($curl);
//
//        if (false === $curl_response) {
//            $info = curl_getinfo($curl);
//
//            curl_close($curl);
//
//            die(var_export($info));
//        }
//
//        curl_close($curl);
//
//        $decoded = json_decode($curl_response);
//
//        if (isset($decoded->response->status) && 'ERROR' == $decoded->response->status) {
//            die($decoded->response->errormessage);
//        }
    }

}

?>
