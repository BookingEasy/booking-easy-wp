<?php namespace Sagenda\Controllers;
//defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
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
  * @var string - Define the date format requested by Pickadate component to inject value to "data-value" parameter.
  */
  private $pickadateDateFormat = "Y/m/d";

  /**
  * Display the search events form
  * @param  object  $twig   TWIG template renderer
  */
  public function showSearch($twig)
  {
    echo "SearchController";

    $sagendaAPI = new sagendaAPI();
    $bookableItems = $sagendaAPI->getBookableItems(get_option('mrs1_authentication_code'));

    $selectedId = 0;
    if(isset($_POST['bookableItems']))
    {
      $selectedId = $_POST['bookableItems'];
    }
    $locationValue = $bookableItems[$selectedId]->Location;
    $descriptionValue = $bookableItems[$selectedId]->Description;
    $bookableItemId = $bookableItems[$selectedId]->Id;

    if(isset($_GET['EventIdentifier']))
    {
      $booking = new Booking();
      $booking->ApiToken = get_option('mrs1_authentication_code');
      $booking->EventScheduleId = $_GET['EventScheduleId'];
      $booking->DateDisplay = $_GET['DateDisplay'];
      $booking->BookableItemId = $bookableItemId;
      $booking->EventIdentifier = $_GET['EventIdentifier'];
      // DateDisplay
      $subscriptionController = new SubscriptionController();
      $subscriptionController->showSubscription($twig, $booking);
      return;
    }


    $isError = false ;
    $isWarrning = false;

    $fromDate = date($this->pickadateDateFormat);
    if(isset($_POST['fromDate']))
    {
      // TODO : find a way to convert or to get the "data-value" and not "value"
      //$fromDate = \DateTime::createFromFormat('dd mmmm yyyy', $_POST['fromDate']);
      //$fromDate = $fromDate->format($this->pickadateDateFormat);
    }

    $toDate = date($this->pickadateDateFormat, mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));


    //->format("d M Y")
    $fromDateWS = "24 Jan 2016";
    $toDateWS = "24 Jan 2017";


    $availability = $sagendaAPI->getAvailability(get_option('mrs1_authentication_code'), $fromDateWS, $toDateWS, $bookableItemId);

    $test = "SelectedID =".$selectedId ." bookableItemId =". $bookableItemId." token =". get_option('mrs1_authentication_code') . "_POSTfromDate =". $_POST['fromDate'];
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
      'pickerTranslated'              => PickadateHelper::getPickadateCultureCode(),
      'help'                          => __( 'Help', 'sagenda-wp' ),
      'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
      'fromDate'                      => $fromDate,
      'toDate'                        => $toDate,
      'locationValue'                 => $locationValue,
      'descriptionValue'              => $descriptionValue,
      'selectedId'                    => $selectedId,
      'test'                => $test,
      'bookableItems'                 => $bookableItems,
      'availability'                  => $availability,
      'isError'                       => $isError,
      'errorMessage'                  => $errorMessage,
    ));


  }
}
