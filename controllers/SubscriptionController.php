<?php namespace Sagenda\Controllers;

use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers\UrlHelper;

include_once( SAGENDA_PLUGIN_DIR . 'helpers/UrlHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );

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
  * Display the subscription form
  * @param  object  $twig       TWIG template renderer
  * @param  object  $booking    Booking object
  */
  public function showSubscription($twig, $booking)
  {
    $booking = $this->fillBookingWithFormValues($booking);
    $result = $this->setBookingWithSubmissionCheck($booking);
    if($result['didSucceed'] == true)
    {
      $informationMessageController = new InformationMessageController();
      return $informationMessageController->showMessage($twig, $booking, $result[ReturnUrl]);
    }
    else {
      return $twig->render($this->view, array(
        'subscription'                  => __( 'Subscription', 'sagenda-wp' ),
        'email'                         => __('Email', 'sagenda-wp'),
        'firstname'                     => __('First Name', 'sagenda-wp'),
        'lastname'                      => __('Last Name', 'sagenda-wp'),
        'title'                         => __('Title', 'sagenda-wp'),
        'titleMr'                       => __('Mr.', 'sagenda-wp'),
        'titleMrs'                      => __('Mrs.', 'sagenda-wp'),
        'titleMiss'                     => __('Miss', 'sagenda-wp'),
        'titleDr'                       => __('Dr', 'sagenda-wp'),
        'booking'                       => $booking,
        'warning'                       => $result['Message'],
        'phone'                         => __('Phone Number', 'sagenda-wp'),
        'description'                   => __('Description', 'sagenda-wp'),
        'submit'                        => __('Submit', 'sagenda-wp'),
        'back'                          => __('Back', 'sagenda-wp'),
        'help'                          => __( 'Help', 'sagenda-wp' ),
        'helpURL'                       => UrlHelper::getHelpUrl(get_bloginfo('language')),
        'YourSelectedBooking'                          => __( 'Your selected booking :', 'sagenda-wp' ),
        'EventName'                          => __( 'Event Name', 'sagenda-wp' ),
        'PaymentAmount'                          => __( 'Payment Amount', 'sagenda-wp' ),
        'LetsBookIt'                          => __( 'Now, let\'s book it! Please fill out the form below.', 'sagenda-wp' ),



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
        $redirectUrl = $result[ReturnUrl];
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
      $booking->FirstName = $_POST['firstname'];
    }

    if(isset($_POST['lastname']))
    {
      $booking->LastName = $_POST['lastname'];
    }

    if(isset($_POST['courtesy']))
    {
      $booking->Courtesy = $_POST['courtesy'];
    }

    if(isset($_POST['description']))
    {
      $booking->Description = $_POST['description'];
    }

    if(isset($_POST['email']))
    {
      $booking->Email = $_POST['email'];
    }

    if(isset($_POST['phone']))
    {
      $booking->PhoneNumber = $_POST['phone'];
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
