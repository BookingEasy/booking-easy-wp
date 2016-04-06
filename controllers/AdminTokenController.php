<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );

/**
* This controller will be responsible for displaying the free events in frontend in order to be searched and booked by the visitor.
*/
class AdminTokenController
{
  /**
  * @var string - name of the view to be displayed
  */
  private $view = "adminToken.twig" ;

  /**
  * Display the search events form
  * @param  object  $twig   TWIG template renderer
  */
  public function showAdminTokenSettingsPage($twig)
  {
    $tokenValue = $this->getAuthenticationToken();
    $this->saveAuthenticationToken();

    $sagendaAPI = new sagendaAPI();
    $result = $sagendaAPI->validateAccount($tokenValue);

    $bootstrapAlertType = "danger";
    $connectedStatus = __( 'NOT CONNECTED', 'sagenda-wp' );

    if($result['didSucceed'])
    {
      $bootstrapAlertType = "success";
      $connectedStatus  = __( 'CONNECTED', 'sagenda-wp' );
    }

    echo $twig->render($this->view, array(
      'sagendaAuthenticationSettings'         => __( 'Sagenda Authentication Settings', 'sagenda-wp' ),
      'sagendaAuthenticationCode'             => __( 'Sagenda Authentication Code', 'sagenda-wp' ),
      'saveChanges'                           => __( 'Save Changes', 'sagenda-wp' ),
      'currentStatus'                         => __( 'Current Status', 'sagenda-wp' ),
      'clickHereToGetYourAuthenticationCode'  => __( 'Click here to get your Authentication code.', 'sagenda-wp' ),
      'shortCodeInfo'                         => __( '[sagenda-wp] add this shortcode either in a post or page where you want to display the Sagenda form.', 'sagenda-wp' ),
      'shortCodeInfoInPHP'                    => __( 'If you want to use a shortcode outside of the WordPress post or page editor, you can use this snippet to output it from the shortcode’s handler(s): <pre>echo do_shortcode([sagenda-wp])</pre>', 'sagenda-wp' ),
      'registeringInfo'                       => __( 'NOTE: You first need to register on Sagenda and then you will get a Authentication token which you will use to validate this Sagenda Plugin.', 'sagenda-wp' ),
      'readMore'                              => __( 'Read more', 'sagenda-wp' ),
      'createAccount'                         => __( 'Create a free account ', 'sagenda-wp' ),
      'aboutIntegrationTitle'                 => __( 'About integration in your WP WebSite :', 'sagenda-wp' ),
      'howToGetTheTokenTitle'                 => __( 'How to get the token :', 'sagenda-wp' ),
      'usefulLinksTitle'                      => __( 'Useful links :', 'sagenda-wp' ),
      'result'                                => $result,
      'bootstrapAlertType'                    => $bootstrapAlertType,
      'connectedStatus'                       => $connectedStatus,
      'tokenValue'                            => $tokenValue,
    ));
  }

  /**
  * Get the authentication code from db or formulary
  * @return string  user authentication code
  */
  private function getAuthenticationToken()
  {
    if(isset($_POST['sagendaAuthenticationCode']))
    {
      return $_POST['sagendaAuthenticationCode'];
    }
    else
    {
      return get_option('mrs1_authentication_code');
    }
  }

  /**
  * Save the authentication code from formulary to db
  */
  private function saveAuthenticationToken()
  {
    if(isset($_POST['sagendaAuthenticationCode']))
    {
      update_option('mrs1_authentication_code', $_POST['sagendaAuthenticationCode']);
    }
  }
}
