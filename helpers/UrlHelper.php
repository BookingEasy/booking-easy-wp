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

}
