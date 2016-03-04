<?php namespace Sagenda\Controllers;

//use Herbert\Framework\Models\Post;


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
