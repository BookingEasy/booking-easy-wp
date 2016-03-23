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
  * @param  object  $twig   TWIG template renderer
  */
  public function showSubscription($twig)
  {
    echo $twig->render($this->view, array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
    ));
  }
}
