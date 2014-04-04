<?php

/**
 * Description of MyReservationService
 * This Class is User for interaction with the Web Service
 * @author zohaib
 */
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
            $json = @file_get_contents($this->apiUrl . '/Events/GetBookableItemList/' . $authCode);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function getEventsList($authCode, $starDat = "02-25-2014", $endDate = "03-30-2014") {
        // /api/Events/GetAvailability/{apitoken}/{from date}/{to date}   

        $results = false;
        try {
            $json = @file_get_contents($this->apiUrl . '/Events/GetAvailability/' . $authCode . '/'.$starDat.'/'.$endDate);
            $results = json_decode($json);            
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function subscribeToEvent() {
        
    }

}

?>
