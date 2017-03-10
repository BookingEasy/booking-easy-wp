<?php namespace Sagenda\Helpers;

/**
* This helper class will give ease the usage of URL.
*/
class UrlHelper{

  /**
  * Give the URL of the help page on sagenda.com according to given language
  * @param  string  $wpCultureCode - input from WordPress as culture short format (WP Locale) : https://make.wordpress.org/polyglots/teams/
  * @return string  URL of help page on Sagenda.com
  */
  public static function getHelpUrl($wpCultureCode)
  {
    $tempCode = $wpCultureCode;

    if(strlen($wpCultureCode)>2)
    {
      $tempCode = substr($wpCultureCode, 0, 2);
    }

    switch ($tempCode) {
      case 'fr':
      $url = "http://www.sagenda.com/fr/iteration-info-vous-presente-sagenda/tutoriel-frontoffice/";
      break;
      default :  $url = "http://www.sagenda.com/introducing-sagenda/frontend-tutorial/";
    }

    return $url;
  }

  /**
  * Try to get a value by POST if not working use GET
  * @param  string  $value - name of the var to get
  * @return string  var content
  */
  public static function getInput($value)
  {
    if(isset($_POST[$value]))
    {
      $selectedId = $_POST[$value];
    }
    else
    {
      if(isset($_GET[$value]))
      {
        $selectedId = $_GET[$value];
      }
    }
    return $selectedId;
  }

}
