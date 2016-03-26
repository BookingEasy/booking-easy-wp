<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
use Sagenda\Helpers;
use Sagenda\Helpers\PickadateHelper;
include_once( SAGENDA_PLUGIN_DIR . 'Helpers/PickadateHelper.php' );
include_once( SAGENDA_PLUGIN_DIR . 'webservices/sagendaAPI.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
*/
class AdminTokenController {

  /**
  * @var string - name of the view to be displayed
  */
  private $view = "adminToken.twig" ;

  /**
  * @var string - user account token
  */
  private $token = "" ;

  /**
  * Constructor
  * @param  string  $token
  */
  function __construct($token)
  {
    $this->token = $token;
  }

  /**
  * Display the search events form
  * @param  object  $twig   TWIG template renderer
  */
  public function showAdminTokenSettingsPage($twig)
  {
    //$sagendaAPI = new sagendaAPI();
    //$bookableItems = $sagendaAPI->getBookableItemList($this->token);

    echo $twig->render($this->view, array(
      'sagendaAuthenticationSettings'        => __( 'Sagenda Authentication Settings', 'sagenda-wp' ),
      'sagendaAuthenticationCode'     => __( 'Sagenda Authentication Code', 'sagenda-wp' ),
      'saveChanges'     => __( 'Save Changes', 'sagenda-wp' ),
      'currentStatus'     => __( 'Current Status', 'sagenda-wp' ),
      'Connected'     => __( 'CONNECTED', 'sagenda-wp' ),
      'NotConnected'     => __( 'NOT CONNECTED', 'sagenda-wp' ),


      'ClickHereToGetYourAuthenticationCode'     => __( 'Click here to get your Authentication code.', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),
      ''     => __( '', 'sagenda-wp' ),




    ));
  }
}
