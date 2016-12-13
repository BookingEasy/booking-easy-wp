<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers\PickadateHelper;
use Sagenda\Helpers\ArrayHelper;
use Sagenda\Helpers\UrlHelper;
use Sagenda\Models\Entities\Booking;
use Sagenda\Models\Entities\BookableItem;

include_once( SAGENDA_PLUGIN_DIR . 'helpers/PickadateHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/UrlHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/ArrayHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/BookableItem.php' );

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
  private $numaricDateFormat = "d m Y";


  /**
  * Display the search events form
  * @param    Array   The shortcode parameters
  * @param  object  $twig   TWIG template renderer
  */
  public function showSearch($twig, $shorcodeParametersArray)
  {
    if (get_option('mrs1_authentication_code') == null)
    {
      return $twig->render($this->view, array(
        'isError'                  => true,
        'hideSearchForm'           => true,
        'errorMessage'             => __( "You didn't configure Sagenda properly please enter your authentication code in Settings", 'sagenda-wp' ),
      ));
      return;
    }

    $bookableItemSelectedByShortcode = ArrayHelper::getElementIfSetAndNotEmpty($shorcodeParametersArray, 'bookableitem');

    $sagendaAPI = new sagendaAPI();
    $bookableItems = $sagendaAPI->getBookableItems(get_option('mrs1_authentication_code'));

    $selectedBookableItem = $this->getSelectedBookableItem($bookableItemSelectedByShortcode, $bookableItems);

    if($this->isEventClicked())
    {
      $this->callSubscription($twig, $selectedBookableItem->Id);
    }
    else
    {
      if($this->needPickerTranslation())
      {
        $pickerTranslated = PickadateHelper::getPickadateCultureCode();
      }

      $fromDate = $this->getFromDate();
      $toDate = $this->getToDate();

      return $twig->render($this->view, array(
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
        'helpURL'                       => UrlHelper::getHelpUrl(get_bloginfo('language')),
        'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
        'fromDate'                      => $fromDate,
        'toDate'                        => $toDate,
        'locationValue'                 => $selectedBookableItem->Location,
        'descriptionValue'              => $selectedBookableItem->Description,
        'selectedId'                    => $selectedBookableItem->SelectedId,
        'bookableItems'                 => $bookableItems,
        'availability'                  => $sagendaAPI->getAvailability(get_option('mrs1_authentication_code'), $this->convertPickadateToWebserviceDateFormat($fromDate), $this->convertPickadateToWebserviceDateFormat($toDate), $selectedBookableItem->Id),
        'errorMessage'                  => $errorMessage,
        'bookableItemSelectedByShortcode'=> $bookableItemSelectedByShortcode,
        'currentUrl'                      =>home_url()
      ));
    }
  }

  /**
  * Get the selected bookable item, priority is selected by shortcode (if any), if not then selected by dropdownlist.
  * @param    String    The name of the bookable item selected by shortcode such as [sagenda-wp bookableitem="name"]
  * @param    Array     List of bookableitems
  * @return   Object    The selected bookable item
  */
  private function getSelectedBookableItem($bookableItemSelectedByShortcode, $bookableItems)
  {
    if(isset($bookableItemSelectedByShortcode))
    {
      $selectedId = $this->findBookableItemElementInList($bookableItems, $bookableItemSelectedByShortcode);
    }
    else {
      $selectedId = 0;
      if(isset($_POST['bookableItems']))
      {
        $selectedId = $_POST['bookableItems'];
      }
    }

    $bookableItem = new BookableItem();
    $bookableItem->Location = $bookableItems[$selectedId]->Location;
    $bookableItem->Description = $bookableItems[$selectedId]->Description;
    $bookableItem->Id = $bookableItems[$selectedId]->Id;
    $bookableItem->SelectedId = $selectedId;
    return $bookableItem;
  }

  /**
  * Find the index of the given bookable items name in list.
  * @param    Array   A list of bookable items.
  * @param    String  The bookable item name searched.
  * @return   0 to n index of the found element, -1 if not found.
  */
  private function findBookableItemElementInList($bookableItems, $name)
  {
    $i = 0;
    foreach ($bookableItems as $value) {
      if(strtolower($value->Name) == strtolower($name))
      return $i;
      $i = $i+1;
    }
    return -1;
  }

  /**
  * Inform if the user has clicked an event in order to trigger subscription.
  * @return   boolean true if event is selected, false if event is not selected by the user.
  */
  private function isEventClicked()
  {
    return isset($_GET['EventIdentifier']);
  }

  /**
  * Collect booking information and lauch the Subscription view
  * @param  object  $twig   TWIG template renderer
  */
  private function callSubscription($twig, $bookableItemId)
  {
    $booking = new Booking();
    $booking->ApiToken = get_option('mrs1_authentication_code');
    $booking->EventScheduleId = $_GET['EventScheduleId'];
    $booking->DateDisplay = $_GET['DateDisplay']; // TODO : replace this by start end date with API v2.0
    $booking->BookableItemId = $bookableItemId;
    $booking->EventIdentifier = $_GET['EventIdentifier'];

    $booking->EventTitle = $_GET['eventTitle'];
    //payment Related
    $booking->IsPaidEvent = $_GET['isPadEvent'];
    $booking->PaymentAmount = $_GET['paymentAmount'];
    $booking->PaymentCurrency = $_GET['paymentCurrency'];
    $booking->HostUrlLocation = $_GET['currentUrl'];
    //TODO : add payment info
    $subscriptionController = new SubscriptionController();
    $subscriptionController->showSubscription($twig, $booking );
  }

  /**
  * Get the "From" Date accoding to POST form sumit and give a default value if no form has been submitted
  * @return   date  The "From" date
  */
  private function getFromDate()
  {
    //echo "<br>-->>>>>get from date = ";
    if(isset($_POST['fromDate_submit']))
    {
      //echo $_POST['fromDate_submit'];
      //echo "<br>";
      return $_POST['fromDate_submit'];
    }
    else
    {
      //echo "<br>";
      //print_r(date($this->numaricDateFormat, mktime(0, 0, 0, date("m"), date("d"), date("Y"))));
      return date($this->numaricDateFormat, mktime(0, 0, 0, date("m"), date("d"), date("Y")));
    }
  }

  /**
  * Get the "To" Date accoding to POST form sumit and give a default value if no form has been submitted
  * @return   date  The "To" date
  */
  private function getToDate()
  {
    //echo "<br>-->>>>>get to date = ";
    if(isset($_POST['toDate_submit']))
    {
      //echo $_POST['toDate_submit'];
      //echo "<br>";
      return $_POST['toDate_submit'];
    }
    else
    {
      //echo "<br>";
      //print_r(date($this->numaricDateFormat, mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"))));
      return date($this->numaricDateFormat, mktime(0, 0, 0, date("m"), date("d") + 7, date("Y")));
    }
  }

  /**
  * Make a pickadate Dateformat ready to be used by Webserivce
  * @param    date  Pickadate date
  * @return   date  Formatted date for WS
  */
  private function convertPickadateToWebserviceDateFormat($pickadateDate)
  {
    // echo " <br>======= --->>>>>>>>> convert pickadate=";
    // echo"<br>----------------Format--------------------------<br>";
    // print_r($this->sagendaAPIv1DateFormat);
    // echo"<br>--pickadateDate---------------------------------<br>";
    // print_r($pickadateDate);
    // echo"<br>-pickadateDateFormat----------------------------<br>";
    // print_r($pickadateDateFormat);
    // echo"<br>------------------Call date converter-----------<br>";
    $convDate = $this->GetConvertedDateToEng($pickadateDate);
    // print_r($convDate);
    //echo"<br>------------------Call date converter-----------<br>";
    //print_r(\DateTime::createFromFormat($this->pickadateDateFormat, $pickadateDate)->format($this->sagendaAPIv1DateFormat));


    return \DateTime::createFromFormat($this->pickadateDateFormat, $convDate)->format($this->sagendaAPIv1DateFormat);
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

  private function GetConvertedDateToEng($inputDate){
    //print_r($inputDate);
    $token = explode(" ", $inputDate);
    //print_r($token);

    $month = "Jan";

    switch ($token[1])
    {
      case 1:
      $month = "Jan";
      break;
      case 2:
      $month = "Feb";
      break;
      case 3:
      $month = "Mar";
      break;
      case 4:
      $month = "Apr";
      break;
      case 5:
      $month = "May";
      break;
      case 6:
      $month = "June";
      break;
      case 7:
      $month = "July";
      break;
      case 8:
      $month = "Aug";
      break;
      case 9:
      $month = "Sept";
      break;
      case 10:
      $month = "Oct";
      break;
      case 11:
      $month = "Nov";
      break;
      case 12:
      $month = "Dec";
      break;
      default:
      $month = "Jan";
    }

    $dateBuild = $month." ".$token[0].", ".$token[2];

    return $dateBuild;
  }
}
