<?php
namespace Sagenda;
use Sagenda\Controllers\SearchController;
use Sagenda\Controllers\SubscriptionController;
use Sagenda\Controllers\AdminTokenController;
use Sagenda\webservices\SagendaAPI;
use Sagenda\Entities\Booking;
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SearchController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SubscriptionController.php' );
//require_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );
include_once( SAGENDA_PLUGIN_DIR . 'controllers/AdminTokenController.php' );

// TODO : did we need include once if we already use namespace?

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* This class instanciate most of the needed objects needed to make sagenda's wp plugin run.
*/
class initializer {

  /**
  * Responsible to initialize the frontend views
  * @return the view according to TWIG rendering
  */
  function initFrontend()
  {
    $twig = self::initTwig();

    /*$booking = new Booking();
    $booking->ApiToken = "1";
    $booking->BookableItemId = "2";
    $booking->EventScheduleId = "3";
    $booking->Courtesy = "4";
    $booking->FirstName = "5";
    $booking->LastName = "6";
    $booking->PhoneNumber = "7";
    $booking->Email = "8";
    $booking->Description = "9";
    $booking->EventIdentifier = "10";

    echo $booking->toJson();*/


    //$sagendaAPI = new sagendaAPI();
    //$sagendaAPI->validateAccount($token);
    //$sagendaAPI->getBookableItemList();


    //$subscriptionController = new SubscriptionController();
    //return $subscriptionController->showSubscription($twig);
    $searchController = new SearchController($token);
    return $searchController->showSearch($twig);
  }

  /**
  * Responsible to initialize the backend view
  * @return the view according to TWIG rendering
  */
  function initAdminSettings()
  {
    $adminTokenController = new AdminTokenController();
    return $adminTokenController->showAdminTokenSettingsPage(self::initTwig());
  }

  /**
  * Responsible to initialize the TWIG instance (template rendering)
  * @return an instanciate TWIG object
  */
  public static function initTwig()
  {
    include_once(SAGENDA_PLUGIN_DIR.'/assets/vendor/twig/lib/Twig/Autoloader.php');
    \Twig_Autoloader::register();
    $loader = new \Twig_Loader_Filesystem(SAGENDA_PLUGIN_DIR.'/views');

    // TODO : should we use caching system?
    //$twig = new Twig_Environment($loader, array('cache' => '/path/to/compilation_cache',));

    // TODO : remove debug before production
    $twig = new \Twig_Environment($loader
    , array('debug' => true,)
    );
    //$twig->addExtension(new Twig_Extension_Debug());
    return $twig;
  }
}
