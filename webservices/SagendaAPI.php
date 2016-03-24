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
  */
  public function validateAccount($token)
  {
    $response = Unirest\Request::get($this->apiUrl."ValidateAccount/".$token);

    print_r ( $response);
  }

  /**
  * Get the bookable items for the given account
  * @param  string  $token   The token identifing the sagenda's account
  */
  public function getBookableItemList($token)
  {
    return Unirest\Request::get($this->apiUrl."Events/GetBookableItemList/".$token)->body;
  }

}
