<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers\PickadateHelper;
use Sagenda\Helpers\DateHelper;
use Sagenda\Helpers\ArrayHelper;
use Sagenda\Helpers\UrlHelper;
use Sagenda\Models\Entities\Booking;
use Sagenda\Models\Entities\BookableItem;

include_once( SAGENDA_PLUGIN_DIR . 'helpers/PickadateHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/UrlHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/DateHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'helpers/ArrayHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/BookableItem.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
*/
class CalendarController {

  /**
  * @var string - name of the view to be displayed
  */
  private $view = "calendar.twig" ;

  /**
  * Display the calendar form
  * @param    Array   The shortcode parameters
  * @param  object  $twig   TWIG template renderer
  */
  public function showCalendar($twig, $shorcodeParametersArray)
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

    if(isset($_GET['EventIdentifier']))
    {
      $subscriptionController = new SubscriptionController();
      return $subscriptionController->callSubscription($twig);
    }

    $sagendaAPI = new sagendaAPI();

    return $twig->render($this->view, array(
      'SAGENDA_PLUGIN_URL'          => SAGENDA_PLUGIN_URL,
      'searchForEventsBetween'      => __( 'Search for all the events between', 'sagenda-wp' ),
      'token'                       => get_option('mrs1_authentication_code'),
      // 'bearerToken'                 => $sagendaAPI->convertAPITokenToBearerToken(get_option('mrs1_authentication_code')),
      'weekStartsOn'                => get_option('start_of_week'),
      'languageCultureShortName'    => get_locale(),
      'dateFormat'                  => DateHelper::convertDateFormatFromPHPToMomentjs(get_option( 'date_format' )),
      'timeFormat'                  => DateHelper::convertTimeFormatFromPHPToMomentjs(get_option( 'time_format' )),
      'sagendaTranslationNext'      => __( 'Next', 'sagenda-wp' ),
      'sagendaTranslationToday'     => __( 'Today', 'sagenda-wp' ),
      'sagendaTranslationPrevious'  => __( 'Previous', 'sagenda-wp' ),
      'sagendaTranslationMonth'     => __( 'Month', 'sagenda-wp' ),
      'sagendaTranslationWeek'      => __( 'Week', 'sagenda-wp' ),
      'sagendaTranslationDay'       => __( 'Day', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionTitle'       => __( 'Title', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionTitleMrs'       => __( 'Mrs.', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionTitleMr'       => __( 'Mr.', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionTitleMiss'       => __( 'Miss', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionTitleDr'       => __( 'Dr', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionFirstName'       => __( 'First Name', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionLastName'       => __( 'Last Name', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionEmail'       => __( 'Email', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionPhone'       => __( 'Phone Number', 'sagenda-wp' ),
      'sagendaTranslationSubscriptionDescription'       => __( 'Description', 'sagenda-wp' ),
    ));
  }
}
