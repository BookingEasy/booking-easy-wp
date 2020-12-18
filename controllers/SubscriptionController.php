<?php namespace Sagenda\Controllers;

use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers\UrlHelper;
use Sagenda\Models\Entities\Booking;

include_once( SAGENDA_PLUGIN_DIR . 'helpers/UrlHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );
include_once( SAGENDA_PLUGIN_DIR . 'models/entities/Booking.php' );

/**
* This controller will be responsible for displaying the subscription form in frontend in order to register the visitor's booking.
*/
class SubscriptionController
{
  /**
  * @var string - name of the view to be displayed
  */
  private $view = "subscription.twig" ;

  /**
  * Collect booking information and lauch the Subscription view
  * @param  object  $twig   TWIG template renderer
  */
  public function callSubscription($twig)
  {
    $booking = new Booking();
    $booking->ApiToken = get_option('mrs1_authentication_code');
    $booking->EventScheduleId = sanitize_text_field($_GET['EventScheduleId']);
    $booking->DateDisplay = sanitize_text_field($_GET['DateDisplay']); // TODO : replace this by start end date with API v2.0
    $booking->BookableItemId = sanitize_text_field($_GET['bookableItemId']);
    $booking->BookableItemName= sanitize_text_field($_GET['bookableItemName']);
    $booking->EventIdentifier = sanitize_text_field($_GET['EventIdentifier']);
    $booking->EventTitle = sanitize_text_field($_GET['eventTitle']);
    //payment Related
    $booking->IsPaidEvent = sanitize_text_field($_GET['isPaidEvent']);
    $booking->PaymentAmount = sanitize_text_field($_GET['paymentAmount']);
    $booking->PaymentCurrency = sanitize_text_field($_GET['paymentCurrency']);
    $booking->HostUrlLocation = sanitize_text_field($_GET['currentUrl']);
    //TODO : add payment info
    //$subscriptionController = new SubscriptionController();
    return $this->showSubscription($twig, $booking );
  }

  /**
  * Display the subscription form
  * @param  object  $twig       TWIG template renderer
  * @param  object  $booking    Booking object
  */
  private function showSubscription($twig, $booking)
  {
    $booking = $this->fillBookingWithFormValues($booking);
    $result = $this->setBookingWithSubmissionCheck($booking);
    global $wp;
    
    if($result['didSucceed'] == true)
    {
      $informationMessageController = new InformationMessageController();
      return $informationMessageController->showMessage($twig, $booking, $result['ReturnUrl']);
    }
    else {
      return $twig->render($this->view, array(
        'subscription'                  => esc_html( 'Subscription', 'sagenda-wp' ),
        'email'                         => esc_html('Email', 'sagenda-wp'),
        'firstname'                     => esc_html('First Name', 'sagenda-wp'),
        'lastname'                      => esc_html('Last Name', 'sagenda-wp'),
        'title'                         => esc_html('Title', 'sagenda-wp'),
        'titleMr'                       => esc_html('Mr.', 'sagenda-wp'),
        'titleMrs'                      => esc_html('Mrs.', 'sagenda-wp'),
        'titleMiss'                     => esc_html('Miss', 'sagenda-wp'),
        'titleDr'                       => esc_html('Dr', 'sagenda-wp'),
        'booking'                       => $booking,
        'warning'                       => $result['Message'],
        'phone'                         => esc_html('Phone Number', 'sagenda-wp'),
        'description'                   => esc_html('Description', 'sagenda-wp'),
        'submit'                        => esc_html('Submit', 'sagenda-wp'),
        'back'                          => esc_html('Back', 'sagenda-wp'),
        'YourSelectedBooking'           => esc_html( 'Your selected booking :', 'sagenda-wp' ),
        'EventName'                     => esc_html( 'Event Name', 'sagenda-wp' ),
        'PaymentAmount'                 => esc_html( 'Payment Amount', 'sagenda-wp' ),
        'LetsBookIt'                    => esc_html( 'Now, let\'s book it! Please fill out the form below.', 'sagenda-wp' ),
        'backUrlQuery'                  => UrlHelper::removeQuery(UrlHelper::getQuery($_SERVER['REQUEST_URI']),"EventIdentifier"),
        'pageUrl'                       => home_url( $wp->request )."/",
      ));
    }
  }

  /**
  * Check if the booking is ready to for submission,
  * @param  object  $booking    Booking object
  */
  private function setBookingWithSubmissionCheck($booking)
  {
    $didSucceed = false;
    $result = "";
    $redirectUrl = "";
    if(isset($booking))
    {
      if($booking->isReadyForSubmission())
      {
        $result = $this->setBooking($booking);
        $redirectUrl = $result['ReturnUrl']."#sagenda";
        $didSucceed = true;
      }
      else {
        $message = __('Please fill out all the required fields','sagenda-wp');
      }
    }
    return array('didSucceed' => $didSucceed, 'Message' => $message, 'ReturnUrl'=>$redirectUrl );
  }

  /**
  * Fill the object Booking with user input from view.
  * @param  object  $booking    Booking object
  */
  private function fillBookingWithFormValues($booking)
  {
    if(isset($_POST['firstname']))
    {
      $booking->FirstName = sanitize_text_field($_POST['firstname']);
    }

    if(isset($_POST['lastname']))
    {
      $booking->LastName = sanitize_text_field($_POST['lastname']);
    }

    if(isset($_POST['courtesy']))
    {
      $booking->Courtesy = sanitize_text_field($_POST['courtesy']);
    }

    if(isset($_POST['description']))
    {
      $booking->Description = sanitize_text_field($_POST['description']);
    }

    if(isset($_POST['email']))
    {
      $booking->Email = sanitize_email($_POST['email']);
    }

    if(isset($_POST['phone']))
    {
      $booking->PhoneNumber = sanitize_text_field($_POST['phone']);
    }

    return $booking ;
  }

  /**
  * Submit the booking to the WebService
  * @param  object  $booking    Booking object
  */
  private function setBooking($booking)
  {
    $sagendaAPI = new sagendaAPI();
    return $sagendaAPI->setBooking($booking, $booking->IsPaidEvent);
  }
}
