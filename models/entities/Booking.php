<?php  namespace Sagenda\Models\Entities;

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

  public function isReadyForSubmission()
  {
    if (!empty($ApiToken)
    &&  !empty($BookableItemId)
    &&  !empty($EventScheduleId)
    &&  !empty($Courtesy)
    &&  !empty($FirstName)
    &&  !empty($LastName)
    &&  !empty($PhoneNumber)
    &&  !empty($Email)
    &&  !empty($EventIdentifier))
    {
      return true;
    }
    return false;
  }
}
