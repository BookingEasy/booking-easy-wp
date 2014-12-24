<?php

/**
 * Description of Booking Easy
 * This Class is User for interaction with the Web Service
 * @author zohaib
 */
include_once( SAGENDA_PLUGIN_DIR . 'classes/SubscribeForEvent.php');

class MyReservationService {

    protected $apiUrl = 'http://www.sagenda.net/api/'; //Live Server

    public function __construct() {
        
    }

    protected function curlRequest($url) {
        
    }

    public function ValidateAuthCode($authCode) {
        try {
            $curl = curl_init();
            $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
            //The URL to fetch. This can also be set when initializing a session with curl_init().
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . 'ValidateAccount/' . $authCode);
            //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            //The number of seconds to wait while trying to connect.	
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
            //The contents of the "User-Agent: " header to be used in a HTTP request.
            curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            //To fail silently if the HTTP code returned is greater than or equal to 400.
            curl_setopt($curl, CURLOPT_FAILONERROR, TRUE);
            //To follow any "Location: " header that the server sends as part of the HTTP header.
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            //To automatically set the Referer: field in requests where it follows a Location: redirect.
            curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
            //The maximum number of seconds to allow cURL functions to execute.	
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            $contents = curl_exec($curl);
            curl_close($curl);
            $results = json_decode($contents);

            if (curl_errno($c)) {
                return 2;
            }
            return $results->Success;
        } catch (Exception $exc) {
            return 2;
        }
    }

    public function getBookableItems($authCode) {
        try {

            $curl = curl_init();
            $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
            //The URL to fetch. This can also be set when initializing a session with curl_init().
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . 'Events/GetBookableItemList/' . $authCode);
            //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            //The number of seconds to wait while trying to connect.	
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
            //The contents of the "User-Agent: " header to be used in a HTTP request.
            curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            //To fail silently if the HTTP code returned is greater than or equal to 400.
            curl_setopt($curl, CURLOPT_FAILONERROR, TRUE);
            //To follow any "Location: " header that the server sends as part of the HTTP header.
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            //To automatically set the Referer: field in requests where it follows a Location: redirect.
            curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
            //The maximum number of seconds to allow cURL functions to execute.	
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            $contents = curl_exec($curl);
            curl_close($curl);
            $results = json_decode($contents);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function getEventsList($authCode, $startDate = "07-13-2014", $endDate = "07-30-2014", $bookableItemId = 0) {
        try {
            $curl = curl_init();
            $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
            //The URL to fetch. This can also be set when initializing a session with curl_init().
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . 'Events/GetAvailability/' . $authCode . '/' . $startDate . '/' . $endDate . '/?bookableItemId=' . $bookableItemId);
            //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            //The number of seconds to wait while trying to connect.	
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
            //The contents of the "User-Agent: " header to be used in a HTTP request.
            curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            //To fail silently if the HTTP code returned is greater than or equal to 400.
            curl_setopt($curl, CURLOPT_FAILONERROR, TRUE);
            //To follow any "Location: " header that the server sends as part of the HTTP header.
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            //To automatically set the Referer: field in requests where it follows a Location: redirect.
            curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
            //The maximum number of seconds to allow cURL functions to execute.	
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            $contents = curl_exec($curl);

            // Check if any error occurred

            if (curl_errno($this->curl)) {
                echo 'error:' . curl_error($this->curl);
                return 2;
            }
            // Decode json object
            curl_close($this->curl);
            $results = json_decode($contents);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return $results;
    }

    public function subscribeToEvent(SubscribeForEvent $SEvent) {
        try {
            $Booking = array("ApiToken" => $SEvent->getApiToken(), "EventIdentifier" => $SEvent->getEventIdentifier(), "BookableItemId" => $SEvent->getBookableItemId(), "EventScheduleId" => $SEvent->getEventScheduleId(), "Courtesy" => $SEvent->getCourtesy(), "FirstName" => $SEvent->getFirstName(), "LastName" => $SEvent->getLastName(), "PhoneNumber" => $SEvent->getPhoneNumber(), "Email" => $SEvent->getEmail(), "Description" => $SEvent->getDescription());
            $json_data = json_encode($Booking);
            $curl = curl_init();
            $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . 'Events/SetBooking');
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);

            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json_data))
            );

            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);


            $contents = curl_exec($curl);
            echo $contents;
            $results = json_decode($contents);
            curl_close($ch);

            if ($result->Success) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function subscribeToEventOld(SubscribeForEvent $SEvent) {
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

//Old Methods with File get contents    
    public function ValidateAuthCodeOld($authCode) {
        try {
            if (false === ( $json = @file_get_contents($this->apiUrl . 'ValidateAccount/' . $authCode))) {
                return 2;
            }
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        if ($results != FALSE)
            return $results->Success;
        else
            return 0;
    }

    public function getBookableItemsOld($authCode) {
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetBookableItemList/' . $authCode);
            $results = json_decode($json);
        } catch (Exception $exc) {
            
        }
        return $results;
    }

    public function getEventsListOld($authCode, $startDate = "07-13-2014", $endDate = "07-30-2014", $bookableItemId = 0) {
        try {
            $json = @file_get_contents($this->apiUrl . 'Events/GetAvailability/' . $authCode . '/' . $startDate . '/' . $endDate . '/?bookableItemId=' . $bookableItemId);
            $results = json_decode($json);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        return $results;
    }

}

?>
