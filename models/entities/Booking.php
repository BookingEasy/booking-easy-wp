<?php  namespace Sagenda\Entities;

class Booking
{
  public $ApiToken = "";
  public $BookableItemId = "";
  public $EventScheduleId = "";
  public $Courtesy = "";
  public $FirstName = "";
  public $LastName = "";
  public $PhoneNumber = "";
  public $Email = "";
  public $Description = "";
  public $EventIdentifier = "";

  public function toJson()
  {
    return json_encode($this);
  }
}
