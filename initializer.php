<?php
namespace Sagenda;
use Sagenda\Controllers\SearchController;
use Sagenda\Controllers\SubscriptionController;
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SearchController.php' );
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SubscriptionController.php' );
// TODO : did we need include once if we already use namespace?

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
* This class instanciate most of the needed objects needed to make sagenda's wp plugin run.
*/
class initializer {

  function initApp()
  {
    $twig = self::initTwig();

    $subscriptionController = new SubscriptionController();
    return $subscriptionController->showSubscription($twig);
    //$searchController = new SearchController();
    //return $searchController->showSearch($twig);
  }

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
