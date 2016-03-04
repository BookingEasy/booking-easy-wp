<?php namespace Sagenda\Controllers;

//use Herbert\Framework\Models\Post;


class SearchController {

  /**
   * Display the choosen search*.twig views.
   *
   * @return array
   */
  public function showSearch()
  {
    $view = "search";

    if (true)
      {
        $view = "searchResult";
      }


    return view('@Sagenda/'.$view.'.twig',
    [
      'searchForEventsBetween'        => __( 'Search for all the events between', 'sagenda-wp' ),
      'from'                          => __( 'From', 'sagenda-wp' ),
      'to'                            => __( 'To', 'sagenda-wp' ),
      'bookableItems'                 => __( 'Please choose a bookable item', 'sagenda-wp' ),
      'location'                      => __( 'Location', 'sagenda-wp' ),
      'description'                   => __( 'Description', 'sagenda-wp' ),
      'createAFreeBookingAccount'     => __( 'Create a free Booking Account on Sagenda!', 'sagenda-wp' ),
      'search'                        => __( 'Search', 'sagenda-wp' ),
      'clickAnEventToBookIt'          => __( 'Click an event to book It:', 'sagenda-wp' ),
    ]
  );
  }

}
