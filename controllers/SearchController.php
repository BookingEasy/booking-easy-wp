<?php namespace Sagenda\Controllers;

class SearchController {

  public function showSearch($twig)
  {
    echo $twig->render('search.twig', array(
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'from'                          => __( 'From', 'sagenda-wp' ),
      'to'                            => __( 'To', 'sagenda-wp' ),
      'bookableItems'                 => __( 'Please choose a bookable item', 'sagenda-wp' ),
      'location'                      => __( 'Location', 'sagenda-wp' ),
      'description'                   => __( 'Description', 'sagenda-wp' ),
      'createAFreeBookingAccount'     => __( 'Create a free Booking Account on Sagenda!', 'sagenda-wp' ),
      'search'                        => __( 'Search', 'sagenda-wp' ),
      'clickAnEventToBookIt'          => __( 'Click an event to book It:', 'sagenda-wp' ),

      ));
    }
}
