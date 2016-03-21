<?php
//defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class DateTimeHelper{

  /*
  @var $dateFormat - input WordPress date format such as : https://codex.wordpress.org/Formatting_Date_and_Time
  return a converted date format for JS DateTime picker  : http://amsul.ca/pickadate.js/date/
  */
  public static function convertWPtoJSDate($dateFormat)
  {
    $dateFormat = str_replace("d", "dd", $dateFormat);
    $dateFormat = str_replace("j", "d", $dateFormat);
    $dateFormat = str_replace("S", "d", $dateFormat);
    $dateFormat = str_replace("D", "ddd", $dateFormat);
    $dateFormat = str_replace("l", "dddd", $dateFormat);
    $dateFormat = str_replace("m", "mm", $dateFormat);
    $dateFormat = str_replace("n", "m", $dateFormat);
    $dateFormat = str_replace("M", "mmm", $dateFormat);
    $dateFormat = str_replace("F", "mmmm", $dateFormat);
    $dateFormat = str_replace("y", "yy", $dateFormat);
    $dateFormat = str_replace("Y", "yyyy", $dateFormat);
    return $dateFormat;
  }

}
