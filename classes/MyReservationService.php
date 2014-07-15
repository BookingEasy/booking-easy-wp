<?php

/**
 * Description of Booking Easy
 * This Class is User for interaction with the Web Service
 * @author zohaib
 */
include_once( SAGENDA_PLUGIN_DIR . 'classes/SubscribeForEvent.php');

class MyReservationService {
    
    protected $apiUrl = 'https://www.sagenda.net/api/'; //Live Server

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

    public function getEventsList($authCode, $startDate = "07-13-2014", $endDate = "07-30-2014", $bookableItemId = 0) {
        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetAvailability/' . $authCode . '/' . $startDate . '/' . $endDate . '/?bookableItemId=' . $bookableItemId);
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
                            'user_agent' => 'Booking Easy',
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

}

?>
