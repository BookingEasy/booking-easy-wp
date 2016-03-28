<?php namespace Sagenda\Controllers;

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

    echo $twig->render($this->view, array(
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

      'phone'                         => __('Phone Number', 'sagenda-wp'),
      'description'                   => __('Description', 'sagenda-wp'),
      'submit'                        => __('Submit', 'sagenda-wp'),
      'backToCalendar'                => __('Back to Calendar', 'sagenda-wp'),

      'submit'                   => __('Submit', 'sagenda-wp'),
      'submit'                   => __('Submit', 'sagenda-wp'),
    ));
  }
}
