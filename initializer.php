<?php
namespace Sagenda;
use Sagenda\Controllers\SearchController;
use Sagenda\Controllers\SubscriptionController;
use Sagenda\Controllers\AdminTokenController;
use Sagenda\Controllers\InformationMessageController;
use Sagenda\webservices\SagendaAPI;
use Sagenda\Entities\Booking;
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SearchController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SubscriptionController.php' );
//require_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );
include_once( SAGENDA_PLUGIN_DIR . 'controllers/AdminTokenController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'controllers/InformationMessageController.php' );

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

    //switch ($this->currentController) {
    //  case 'search':
        $searchController = new SearchController($token);
        $this->booking = $searchController->showSearch($twig);
        $this->currentController = "subscription";
    //    break;

    //  case 'subscription':
        $subscriptionController = new SubscriptionController();
        $this->booking = $subscriptionController->showSubscription($twig, $this->booking);
        $this->currentController = "information";

    //  case 'information':
        $informationMessageController = new InformationMessageController();
        $informationMessageController->showSubscription($twig, $this->booking);

    /*  default:
        # code...
        break;
    }*/
  }

  private $currentController = "search" ;
  private $booking ;
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
