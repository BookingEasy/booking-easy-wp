<?php namespace Sagenda\Helpers;

/**
* This helper class will give ease the usage of URL.
*/
class UrlHelper{

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

  /**
  * Get the query part of an URL (after ?) and add a "&" at the end if query is not null
  * @param  string  $url - url to parse
  * @return string  content of the url with "?" and the following code
  */
 public static function getQuery($url)
 {
   if($url !== null)
   {
     return parse_url($url, PHP_URL_QUERY)."&";
   }
   return ;
 }

}
