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

    public function getEventsList($authCode, $startDate = "04-08-2014", $endDate = "04-10-2014") {
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

    //$json = file_get_contents($this->apiUrl . 'Events/SetBooking/' . $jsonobj);
}

?>
