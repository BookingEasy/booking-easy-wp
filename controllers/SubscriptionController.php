<?php namespace Sagenda\Controllers;

class SubscriptionController
{
  /**
  * @var $view - string name of the view to be displayed
  */
  private $view = "subscription.twig" ;

  public function showSubscription($twig)
  {
    echo $twig->render($this->view, array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
    ));
  }
}
