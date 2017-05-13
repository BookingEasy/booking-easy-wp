<?php namespace Sagenda\Webservices;
use Unirest;
include_once( SAGENDA_PLUGIN_DIR . 'assets/vendor/mashape/unirest-php/src/Unirest.php' );

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
  //protected $apiUrl = 'http://e35a3822.ngrok.io/api/'; //ngrok test for payment Server

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
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function getBookableItems($token)
  {
    return \Unirest\Request::get($this->apiUrl."Events/GetBookableItemList/".$token)->body;
  }

  /**
  * Set a booking without payment
  * @param  string    $token          The token identifing the sagenda's account
  * @param  boolean   $withPayment    True if should manage payment, false if booking should not be paid online.
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
    return self::setDateTimeFormat(\Unirest\Request::get($this->apiUrl."Events/GetAvailability/".$token."/".$fromDate."/".$toDate."?bookableItemId=".$bookableItemId));
  }

  /**
  * Set the date and time format according to WP values
  * @param  array  $bookings   List of bookings
  */
  private static function setDateTimeFormat($bookings)
  {
    foreach ($bookings->body as $booking)
    {
      $booking->DateDisplay = self::setDateTimeFormatByProofingValue($booking->From)." - ".self::setDateTimeFormatByProofingValue($booking->To);
    }
    return $bookings;
  }

  /**
  * Check input value before setting correct date format, time format or datetime format
  * @param  string  $date   date to be setup
  */
  private static function setDateTimeFormatByProofingValue($date)
  {
    if(strpos($date, 'AM') !== false || strpos($date, 'PM') !== false)
    {
      if(strlen($date) > 7)
      {
        return self::setDateTime($date);
      }
      return self::setTime($date);
    }
    else
    {
      return self::setDate($date);
    }
  }

  /**
  * Set the date and time format according to WP values
  * @param  string  $datetime   datetime to be setup
  */
  private static function setDateTime($datetime)
  {
    setlocale(LC_TIME, get_locale());
    $date = \DateTime::createFromFormat('d M Y h:i A', $datetime);
    $date = strftime(self::convertDateTimeFormatLetterToStrftimeFormatLetter(get_option( 'date_format' )), $date->getTimestamp());

    $time = \DateTime::createFromFormat('d M Y h:i A', $datetime)->format(get_option( 'time_format' ));

    return $date ." ". $time ;
  }

  /**
  * Set the date format according to WP values
  * @param  string  $date   date to be setup
  */
  private static function setDate($date)
  {
    setlocale(LC_TIME, get_locale());
    $date = \DateTime::createFromFormat('d M Y', $date);
    return strftime(self::convertDateTimeFormatLetterToStrftimeFormatLetter(get_option( 'date_format' )), $date->getTimestamp());
  }

  /**
  * Set the time format according to WP values
  * @param  string  $time   time to be setup
  */
  private static function setTime($time)
  {
    return \DateTime::createFromFormat('h:i A', $time)->format(get_option( 'time_format' ));
  }

  /**
  * In php object DateTime and strftime are not using the same abreviation for formatting char, this method helps to convert.
  * For example :
  * F => %B
  * @param  string  $value   the
  */
  private static function convertDateTimeFormatLetterToStrftimeFormatLetter($value)
  {
    $value = str_replace("F", "%B", $value);
    $value = str_replace("M", "%b", $value);
    $value = str_replace("j", "%e", $value);
    $value = str_replace("d", "%d", $value);
    $value = str_replace("Y", "%Y", $value);
    $value = str_replace("y", "%y", $value);
    $value = str_replace("m", "%m", $value);
    $value = str_replace("n", "%m", $value);

    $value = str_replace("G", "%k", $value);
    $value = str_replace("H", "%H", $value);
    $value = str_replace("g", "%l", $value);
    $value = str_replace("h", "%I", $value);
    $value = str_replace("i", "%M", $value);
    $value = str_replace("s", "%S", $value);

    return $value;
  }

}
