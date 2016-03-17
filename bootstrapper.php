<?php
namespace Sagenda;
use Sagenda\Controllers\SearchController;
include_once( SAGENDA_PLUGIN_DIR . 'Controllers/SearchController.php' );
// TODO : did we need include once if we already use namespace?

class bootstrapper {

  function initApp()
  {
    $twig = self::initTwig();
    //$searchController = new Sagenda\Controllers\SearchController();
    $searchController = new SearchController();
    return $searchController->showSearch($twig);
  }

  private static function initTwig()
  {
    include_once(SAGENDA_PLUGIN_DIR.'/assets/vendor/twig/lib/Twig/Autoloader.php');
    \Twig_Autoloader::register();
    $loader = new \Twig_Loader_Filesystem(SAGENDA_PLUGIN_DIR.'/views');

    // TODO : should we use caching system?
    //$twig = new Twig_Environment($loader, array('cache' => '/path/to/compilation_cache',));
    return new \Twig_Environment($loader);
  }

}
