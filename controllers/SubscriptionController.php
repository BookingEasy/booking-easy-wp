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
      'subscription'                  => __( 'Subscription', 'sagenda-wp' ),
      'email'                         => __('Email', 'sagenda-wp'),
      'firstname'                     => __('First Name', 'sagenda-wp'),
      'lastname'                      => __('Last Name', 'sagenda-wp'),
      'title'                         => __('Title', 'sagenda-wp'),
      'phone'                         => __('Phone Number', 'sagenda-wp'),

    ));
  }
}
