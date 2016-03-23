<?php namespace Sagenda\Controllers;
//defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

use Sagenda\Helpers;
use Sagenda\Helpers\PickadateHelper;
include_once( SAGENDA_PLUGIN_DIR . 'Helpers/PickadateHelper.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
*/
class SearchController {

  /**
  * @var string - name of the view to be displayed
  */
  private $view = "search.twig" ;

  /**
  * Display the search events form
  * @param  object  $twig   TWIG template renderer
  */
  public function showSearch($twig)
  {
    if(true) // TODO : will be triggered by the search action
    {
      $this->view = "searchResult.twig";
      //$this->view = "subscription.twig";
    }

    echo $twig->render($this->view, array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'fromLabel'                     => __( 'From', 'sagenda-wp' ),
      'toLabel'                       => __( 'To', 'sagenda-wp' ),
      'bookableItemsLabel'            => __( 'Please choose a bookable item', 'sagenda-wp' ),
      'locationLabel'                 => __( 'Location', 'sagenda-wp' ),
      'locationValue'                 => "This is a value",
      'descriptionLabel'              => __( 'Description', 'sagenda-wp' ),
      'descriptionValue'              => "This is a value",
      'createAFreeBookingAccount'     => __( 'Create a free Booking Account on Sagenda!', 'sagenda-wp' ),
      'search'                        => __( 'Search', 'sagenda-wp' ),
      'clickAnEventToBookIt'          => __( 'Click an event to book It:', 'sagenda-wp' ),
      'dateFormat'                    => PickadateHelper::getPickadateDateFormat(),
      'pickerTranslated'              => PickadateHelper::getPickadateCultureCode(),
      'help'                          => __( 'Help', 'sagenda-wp' ),
      'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
    ));
  }
}
