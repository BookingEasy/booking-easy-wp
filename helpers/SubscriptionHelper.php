<?php namespace Sagenda\Helpers;

/**
* This helper class will give ease the usage of Subscription.
*/
class SubscriptionHelper
{
 // pas certain de faire un helper...

  /**
  * Collect booking information and lauch the Subscription view
  * @param  object  $twig   TWIG template renderer
  */
  public function callSubscription($twig, $bookableItem)
  {
    $booking = new Booking();
    $booking->ApiToken = get_option('mrs1_authentication_code');
    $booking->EventScheduleId = sanitize_text_field($_GET['EventScheduleId']);
    $booking->DateDisplay = sanitize_text_field($_GET['DateDisplay']); // TODO : replace this by start end date with API v2.0
    $booking->BookableItemId = $bookableItem->Id;
    $booking->BookableItemName= sanitize_text_field($_GET['bookableItemName']);
    $booking->EventIdentifier = sanitize_text_field($_GET['EventIdentifier']);
    $booking->EventTitle = sanitize_text_field($_GET['eventTitle']);
    //payment Related
    $booking->IsPaidEvent = sanitize_text_field($_GET['isPaidEvent']);
    $booking->PaymentAmount = sanitize_text_field($_GET['paymentAmount']);
    $booking->PaymentCurrency = sanitize_text_field($_GET['paymentCurrency']);
    $booking->HostUrlLocation = sanitize_text_field($_GET['currentUrl']);
    //TODO : add payment info
    $subscriptionController = new SubscriptionController();
    return $subscriptionController->showSubscription($twig, $booking );
  }


}
