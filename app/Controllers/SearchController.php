<?php namespace Sagenda\Controllers;

//use Herbert\Framework\Models\Post;


class SearchController {

  public function showSearch()
  {
    return view('@Sagenda/search.twig',
    [
      'title'         => __( 'Please fill out all the required fields', 'sagenda-wp' )
    ]
  );
}
}
