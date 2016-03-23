<?php namespace Sagenda\Controllers;

class SubscriptionController
{

  public function showSubscription($twig)
  {
    echo $twig->render($view, array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'warningNoBookingFound'         => __('No event found for the bookable item within the selected date range.', 'sagenda-wp'),
    ));
  }
}
