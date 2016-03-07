<?php namespace Sagenda\Controllers;

class SubscriptionController {

  public function showSubscription()
  {
    return view('@Sagenda/subscription.twig',
    [
      'title'         => __( 'Please fill out all the required fields', 'sagenda-wp' )
    ]
  );
}
}
