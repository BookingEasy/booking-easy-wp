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
            $json = @file_get_contents($this->apiUrl .'ValidateAccount/' . $authCode);
            $results = json_decode($json);
        } catch (Exception $exc) {
            $results = false;
        }
        return $results;
    }

    public function getBookableItems($authCode) {
        
    }

    public function getEventsList($bookableItemID) {
        
    }

    public function subscribeToEvent() {
        
    }

}
?>
