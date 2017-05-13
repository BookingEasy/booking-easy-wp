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

    // echo "this is booking part <br>";
    // print_r($booking);
    // echo "<br>";
    // echo"<br>--is paid event-------<br>";
    // print_r($booking->IsPaidEvent);
    // echo"<br>---------------------<br>";

    if($withPayment == "1")
    {
      $wsName = "SetBookingWithPayment";
    }
    // echo "<br>";
    // echo"<br>--is paid event -- withPayment-------<br>";
    // print_r($withPayment);
    // echo"<br>---------------------<br>";

      $result = Unirest\Request::post($this->apiUrl."Events/".$wsName,
      //$result = \Unirest\Request::post("https://sagenda-sagenda-v1.p.mashape.com/Events/".$wsName,
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


    // echo "<br>";
    // echo"<br>--withPayment output result-------<br>";
    // print_r($result);
    // echo"<br>---Redirect------------------<br>";
    // print_r($apiOutput->ReturnUrl);
    // echo"<br>-----------------------------<br>";

    if($apiOutput->ReturnUrl != ""){
      //header('Location: ' .$apiOutput->ReturnUrl, true, 301);
     // die();

      //redirect($apiOutput->ReturnUrl);
      // wp_redirect( $apiOutput->ReturnUrl );
      // exit;

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
    $dateFrom = self::setDateTimeFormatByProofingValue($booking->From);
    //  $dateFrom = \DateTime::createFromFormat('d M Y h:i A', $booking->From)->format(get_option( 'date_format' )." ".get_option( 'time_format' ));
    $dateTo = self::setDateTimeFormatByProofingValue($booking->To);

      //$dateTo = \DateTime::createFromFormat('h:i A', $booking->To)->format(get_option( 'time_format' ));

      $booking->DateDisplay = $dateFrom." - ".$dateTo;
    }

    //print_r($bookings);

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
      return \DateTime::createFromFormat('d M Y h:i A', $datetime)->format(get_option( 'date_format' )." ".get_option( 'time_format' ));
  }

  /**
  * Set the date format according to WP values
  * @param  string  $date   date to be setup
  */
  private static function setDate($date)
  {
      return \DateTime::createFromFormat('d M Y', $date)->format(get_option( 'date_format' ));
  }

    /**
    * Set the time format according to WP values
    * @param  string  $time   time to be setup
    */
  private static function setTime($time)
  {
      return \DateTime::createFromFormat('h:i A', $time)->format(get_option( 'time_format' ));
  }
}
