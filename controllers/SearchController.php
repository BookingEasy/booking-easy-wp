<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers;
use Sagenda\Helpers\PickadateHelper;
use Sagenda\Models\Entities\Booking;
use Sagenda\Models\Entities;
include_once( SAGENDA_PLUGIN_DIR . 'Helpers/PickadateHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/sagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
*/
class SearchController {

  /**
  * @var string - name of the view to be displayed
  */
  private $view = "searchResult.twig" ;

  /**
  * @var string - Define the date format requested by Pickadate component to inject value to "data-value" parameter such as : April 13, 2016
  */
  private $pickadateDateFormat = "F j, Y";

  /**
  * @var string - Define the date format requested by Sagenda API v1
  */
  private $sagendaAPIv1DateFormat = "d M Y";


  /**
  * Display the search events form
  * @param    Array   The shortcode parameters
  * @param  object  $twig   TWIG template renderer
  */
  public function showSearch($twig, $shorcodeParametersArray)
  {
    $sagendaAPI = new sagendaAPI();
    $bookableItems = $sagendaAPI->getBookableItems(get_option('mrs1_authentication_code'));

    //TODO : refactor this using a bookableItem Object in another method
    $selectedId = 0;
    if(isset($_POST['bookableItems']))
    {
      $selectedId = $_POST['bookableItems'];
    }

    $locationValue = $bookableItems[$selectedId]->Location;
    $descriptionValue = $bookableItems[$selectedId]->Description;
    $bookableItemId = $bookableItems[$selectedId]->Id;

    //TODO : reduce nesting
    if(isset($_GET['EventIdentifier']))
    {
      $booking = new Booking();
      $booking->ApiToken = get_option('mrs1_authentication_code');
      $booking->EventScheduleId = $_GET['EventScheduleId'];
      $booking->DateDisplay = $_GET['DateDisplay']; // TODO : replace this by start end date
      $booking->BookableItemId = $bookableItemId;
      $booking->EventIdentifier = $_GET['EventIdentifier'];
      $subscriptionController = new SubscriptionController();
      $subscriptionController->showSubscription($twig, $booking );
    }
    else {

      if($this->needPickerTranslation())
      {
        $pickerTranslated = PickadateHelper::getPickadateCultureCode();
      }

      $fromDate = $this->getFromDate();
      $toDate = $this->getToDate();

      echo $twig->render($this->view, array(
        'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
        'fromLabel'                     => __( 'From', 'sagenda-wp' ),
        'toLabel'                       => __( 'To', 'sagenda-wp' ),
        'bookableItemsLabel'            => __( 'Please choose a bookable item', 'sagenda-wp' ),
        'locationLabel'                 => __( 'Location', 'sagenda-wp' ),
        'descriptionLabel'              => __( 'Description', 'sagenda-wp' ),
        'createAFreeBookingAccount'     => __( 'Create a free Booking Account on Sagenda!', 'sagenda-wp' ),
        'search'                        => __( 'Search', 'sagenda-wp' ),
        'clickAnEventToBookIt'          => __( 'Click an event to book It:', 'sagenda-wp' ),
        'dateFormat'                    => PickadateHelper::getPickadateDateFormat(),
        'pickerTranslated'              => $pickerTranslated,
        'help'                          => __( 'Help', 'sagenda-wp' ),
        'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
        'fromDate'                      => $fromDate,
        'toDate'                        => $toDate,
        'locationValue'                 => $locationValue,
        'descriptionValue'              => $descriptionValue,
        'selectedId'                    => $selectedId,
        'bookableItems'                 => $bookableItems,
        'availability'                  => $sagendaAPI->getAvailability(get_option('mrs1_authentication_code'), $this->convertPickadateToWebserviceDateFormat($fromDate), $this->convertPickadateToWebserviceDateFormat($toDate), $bookableItemId),
        'errorMessage'                  => $errorMessage,
      ));
    }
  }

  /**
  * Get the "From" Date accoding to POST form sumit and give a default value if no form has been submitted
  * @return   date  The "From" date
  */
  private function getFromDate()
  {
    if(isset($_POST['fromDate']))
    {
      return $_POST['fromDate'];
    }
    else
    {
      return date($this->pickadateDateFormat, mktime(0, 0, 0, date("m"), date("d"), date("Y")));
    }
  }

  /**
  * Get the "To" Date accoding to POST form sumit and give a default value if no form has been submitted
  * @return   date  The "To" date
  */
  private function getToDate()
  {
    if(isset($_POST['toDate']))
    {
      return $_POST['toDate'];
    }
    else
    {
      return date($this->pickadateDateFormat, mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));
    }
  }

  /**
  * Make a pickadate Dateformat ready to be used by Webserivce
  * @param    date  Pickadate date
  * @return   date  Formatted date for WS
  */
  private function convertPickadateToWebserviceDateFormat($pickadateDate)
  {
    return \DateTime::createFromFormat($this->pickadateDateFormat, $pickadateDate)->format($this->sagendaAPIv1DateFormat);
  }

  /**
  * Check if a translation is needed for the picker if the WP settings is not in English
  * @return   boolean           true if need translation, false if WP is set in English
  */
  private function needPickerTranslation()
  {
    if(strlen(get_bloginfo('language'))>=2)
    {
      if(strcmp(strtolower(substr(get_bloginfo('language'), 0, 2)),"en") <> 0)
      {
        return true;
      }
    }
    return false;
  }
}
