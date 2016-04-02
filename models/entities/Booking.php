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
    if (!empty($this->ApiToken)
    &&  !empty($this->BookableItemId)
    &&  !empty($this->EventScheduleId)
    &&  !empty($this->Courtesy)
    &&  !empty($this->FirstName)
    &&  !empty($this->LastName)
    &&  !empty($this->PhoneNumber)
    &&  !empty($this->Email)
    &&  !empty($this->EventIdentifier))
    {
      return true;
    }
    return false;
  }
}
