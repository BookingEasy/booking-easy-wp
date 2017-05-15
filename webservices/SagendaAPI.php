<?php namespace Sagenda\Webservices;
use Unirest;
use Sagenda\Helpers\DateHelper;

include_once( SAGENDA_PLUGIN_DIR . 'assets/vendor/mashape/unirest-php/src/Unirest.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/DateHelper.php' );

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
  //protected $apiUrl = 'http://sagenda-dev.apphb.com/api/'; //staging test for payment Server
  //protected $apiUrl = 'http://5478cbc9.ngrok.io/api/'; //ngrok test for payment Server

  /**
  * Validate the Sagenda's account with the token in order to check if we get access
  * @param  string  $token   The token identifing the sagenda's account
  * @return array array('didSucceed' => boolean -> true if ok, 'Message' => string -> the detail message);
  */
  public function validateAccount($token)
  {
    $result = \Unirest\Request::get($this->apiUrl."ValidateAccount/".$token)->body;
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
  * @param  string          $token                The token identifing the sagenda's account
  */
  public function getBookableItems($token)
  {
    return \Unirest\Request::get($this->apiUrl."Events/GetBookableItemList/".$token)->body;
  }

  /**
  * Set a booking without payment
  * @param  string          $token                The token identifing the sagenda's account
  * @param  boolean     $withPayment    True if should manage payment, false if booking should not be paid online.
  */
  public function setBooking($booking, $withPayment)
  {
    $didSucceed = true;
    $wsName = "SetBooking";

    if($withPayment == "1")
    {
      $wsName = "SetBookingWithPayment";
    }

    $result = Unirest\Request::post($this->apiUrl."Events/".$wsName,
    array(
      "X-Mashape-Key" => "1qj2G3vQg5mshgOPxMAFsmrfleIap1lPGN8jsn8v0qG4AIuFJa",
      "Content-Type" => "application/json",
      "Accept" => "application/json"
    ),
    $booking->toJson());

    if($result->Message == "An error has occurred.")
    {
      $message = __("An error has occurred. Booking wasn't saved.", 'sagenda-wp');
      $didSucceed = false;
    }

    $apiOutput = json_decode($result->raw_body);

    if($apiOutput->ReturnUrl != "")
    {
      return array('didSucceed' => $didSucceed, 'Message' => $message, 'ReturnUrl' => $apiOutput->ReturnUrl);
    }

    return array('didSucceed' => $didSucceed, 'Message' => $message, 'ReturnUrl' => "");
  }

  /**
  * Get the bookable items for the given account
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function getAvailability($token, $fromDate, $toDate, $bookableItemId)
  {
    return self::setDateTimeFormat(\Unirest\Request::get($this->apiUrl."Events/GetAvailability/".$token."/".rawurlencode($fromDate)."/".rawurlencode($toDate)."?bookableItemId=".$bookableItemId));
  }

  /**
  * Set the date and time format according to WP values
  * @param  array  $bookings   List of bookings
  */
  private static function setDateTimeFormat($bookings)
  {
    if($bookings !== null)
    {
      if($bookings->body !== null)
      {
        foreach ($bookings->body as $booking)
        {
          $booking->DateDisplay = DateHelper::setDateTimeFormat($booking->From)." - ".DateHelper::setDateTimeFormat($booking->To);
        }
      }
    }

    return $bookings;
  }
}
