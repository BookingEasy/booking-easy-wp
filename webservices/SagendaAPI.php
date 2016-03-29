<?php namespace Sagenda\Webservices;
use Unirest;
require_once( SAGENDA_PLUGIN_DIR . 'assets/vendor/mashape/unirest-php/src/Unirest.php' );

/**
* This class will be responsible for accessing the Sagenda's RESTful API
*/
class SagendaAPI
{
  /**
  * @var string - url of the API
  */
  protected $apiUrl = 'http://sagenda.net/api/'; //Live Server
  //protected $apiUrl = 'http://localhost:49815/api/'; //local Server
  //protected $apiUrl = 'https://sagenda-dev.apphb.com/api/'; //staging test for payment Server
  //protected $apiUrl = 'http://3363a2c1.ngrok.io/api/'; //ngrok test for payment Server

  /**
  * Validate the Sagenda's account with the token in order to check if we get access
  * @param  string  $token   The token identifing the sagenda's account
  * @return array array('didSucceed' => boolean -> true if ok, 'Message' => string -> the detail message);
  */
  public function validateAccount($token)
  {
    $result = Unirest\Request::get($this->apiUrl."ValidateAccount/".$token)->body;
    //print_r($result);
    $message = __('Successfully connected','sagenda-wp');
    $didSucceed = true;
    //TODO : use a better checking error code system than string comparaison
    if($result->Message == "Error: API Token is invalid")
    {
      $message = __('Your token is wrong; please try again or generate another one in Sagenda’s backend.', 'sagenda-wp');
      $didSucceed = false;
    }
    return array('didSucceed' => $didSucceed, 'Message' => $message);
  }

  /**
  * Get the bookable items for the given account
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function getBookableItems($token)
  {
    return Unirest\Request::get($this->apiUrl."Events/GetBookableItemList/".$token)->body;
  }

  /**
  * Get the bookable items for the given account
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function setBooking($booking)
  {
    return Unirest\Request::post($this->apiUrl."Events/SetBooking",
    $booking->toJson())->body;
  }

  /*
  "{\"ApiToken\":\"'.$token.'\",
    \"BookableItemId\":\"560b6e82ec90a85ec48d99bc\",
    \"EventScheduleId\":\"56ae391febb599af9ce6fc19\",
    \"Courtesy\":\"Mr.\",
    \"FirstName\":\"John\",
    \"LastName\":\"Smith\",
    \"PhoneNumber\":\"011021254639696\",
    \"Email\":\"johnsmith@yopmail.com\",
    \"Description\":\"This is a test paid event\",
    \"EventIdentifier\":\"Mi83LzIwMTYgNTowMCBBTTs1NmFlMzkxZmViYjU5OWFmOWNlNmZjMTk==\"
  }"*/

  /**
  * Get the bookable items for the given account
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function getAvailability($token, $fromDate, $toDate, $bookableItemId)
  {
    return Unirest\Request::get($this->apiUrl."Events/GetAvailability/".$token."/".$fromDate."/".$toDate."?bookableItemId=".$bookableItemId)->body;
  }
}
