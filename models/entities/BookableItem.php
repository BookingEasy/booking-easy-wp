<?php namespace Sagenda\Entities;

class BookableItem
{
  public $Id = "";
  public $Name = "";
  public $Location = "";
  public $Description = "";

  public function toJson()
  {
    return json_encode($this);
  }
}
