<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor in a calendar.
*/
class CalendarController
{
  /**
  * @var string - name of the view to be displayed
  */
  private $view = "calendar.twig" ;

  /**
  * Display the calendar form
  * @param  object  $twig                       TWIG template renderer
  * @param  string  $shorcodeParametersArray    shortcode
  */
  public function showCalendar($twig, $shorcodeParametersArray)
  {
    //$sagendaAPI = new sagendaAPI();

    echo $twig->render($this->view, array(
      'test'         => __( 'test', 'sagenda-wp' ),
      'SAGENDA_PLUGIN_URL'             => __(SAGENDA_PLUGIN_URL),

    ));
  }
}
