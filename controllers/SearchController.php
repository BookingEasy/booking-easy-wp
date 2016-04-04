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
  //private $pickadateDateFormat = "Y/m/d";
  private $pickadateDateFormat = "F j, Y"; // Avril 13, 2016

  /**
  * @var string - Define the date format requested by Sagenda API v1
  */
  private $sagendaAPIv1DateFormat = "d M Y";


  /**
  * Display the search events form
  * @param  object  $twig   TWIG template renderer
  */
  public function showSearch($twig)
  {
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
      $booking->DateDisplay = $_GET['DateDisplay']; // TODO : replace this by start end date
      $booking->BookableItemId = $bookableItemId;
      $booking->EventIdentifier = $_GET['EventIdentifier'];

      $subscriptionController = new SubscriptionController();
      $subscriptionController->showSubscription($twig, $booking );
    }
    else {

      $isError = false ;
      $isWarrning = false;

      $fromDate = date($this->pickadateDateFormat);
      $toDate = date($this->pickadateDateFormat, mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));

      if(isset($_POST['toDate']))
      {
        $toDateWS = \DateTime::createFromFormat($this->pickadateDateFormat, $_POST['toDate'])->format($this->sagendaAPIv1DateFormat);
      }


      $fromDateWS = "24 Jan 2016";


      $availability = $sagendaAPI->getAvailability(get_option('mrs1_authentication_code'), $fromDateWS, $toDateWS, $bookableItemId);


      if($this->needPickerTranslation())
      {
        $pickerTranslated = PickadateHelper::getPickadateCultureCode();
      }

    }


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
      'pickerTranslated'              => $pickerTranslated,
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

  /**
  * Check if a translation is needed for the picker if the WP settings is not in English
  * @return   boolean           true if need translation, false if WP is set in English
  */
  private function needPickerTranslation()
  {
    //echo "LANGUAGE".strtolower(substr(get_bloginfo('language'), 0, 2));
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
