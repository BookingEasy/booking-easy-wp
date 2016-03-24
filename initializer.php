<?php
namespace Sagenda;
use Sagenda\Controllers\SearchController;
use Sagenda\Controllers\SubscriptionController;
use Sagenda\webservices\sagendaAPI;
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SearchController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SubscriptionController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/sagendaAPI.php' );
// TODO : did we need include once if we already use namespace?

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* This class instanciate most of the needed objects needed to make sagenda's wp plugin run.
*/
class initializer {

  /**
  * Responsible to initialize the correct view
  * @return the view according to TWIG rendering
  */
  function initApp()
  {
    $twig = self::initTwig();

    $token = 'c8c49993b8814a99bb494a3f2420d277';
    //$sagendaAPI = new sagendaAPI();
    //$sagendaAPI->validateAccount(c8c49993b8814a99bb494a3f2420d277);
    //$sagendaAPI->getBookableItemList();


    //$subscriptionController = new SubscriptionController();
    //return $subscriptionController->showSubscription($twig);
    $searchController = new SearchController($token);
    return $searchController->showSearch($twig);
  }

  /**
  * Responsible to initialize the TWIG instance (template rendering)
  * @return an instanciate TWIG object
  */
  private static function initTwig()
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
