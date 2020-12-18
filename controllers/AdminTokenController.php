<?php namespace Sagenda\Controllers;
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
use Sagenda\webservices\sagendaAPI;
include_once( SAGENDA_PLUGIN_DIR . 'webservices/SagendaAPI.php' );

/**
* This controller will be responsible for displaying the Settings in WP backend.
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
    $color = "red";
    $connectedStatus = esc_html( 'NOT CONNECTED', 'sagenda-wp' );

    if($result['didSucceed'] && $tokenValue != null )
    {
      $color = "green";
      $connectedStatus  = esc_html( 'CONNECTED', 'sagenda-wp' );
    }

    return $twig->render($this->view, array(
      'SAGENDA_PLUGIN_URL'                    => SAGENDA_PLUGIN_URL,
      'sagendaAuthenticationSettings'         => esc_html( 'Sagenda Authentication Settings', 'sagenda-wp' ),
      'sagendaAuthenticationCode'             => esc_html( 'Sagenda Authentication Code', 'sagenda-wp' ),
      'saveChanges'                           => esc_html( 'Save Changes', 'sagenda-wp' ),
      'currentStatus'                         => esc_html( 'Current Status', 'sagenda-wp' ),
      'clickHereToGetYourAuthenticationCode'  => esc_html( 'Click here to get your Authentication code.', 'sagenda-wp' ),
      'shortCodeInfo'                         => __( '<strong>[sagenda-wp]</strong> add this shortcode either in a post or page where you want to display the Sagenda form.', 'sagenda-wp' ),
      'shortCodeInfoAdvanced'                 => __( '<strong>[sagenda-wp bookableitem="my bookable item name"]</strong> if you want to display only one bookable item on that page. Pay attention : if your bookable item is name "My Item", bookableitem="my item" or bookableitem="My Item" will be correct, but "bookableitem="myitem" not!', 'sagenda-wp' ),
      'shortCodeInfoInPHP'                    => esc_html( 'If you want to use a shortcode outside of the WordPress post or page editor, you can use this snippet to output it from the shortcode’s handler(s): <pre>echo do_shortcode([sagenda-wp])</pre>', 'sagenda-wp' ),
      'registeringInfo'                       => esc_html( 'NOTE: You first need to register on Sagenda and then you will get a Authentication token which you will use to validate this Sagenda Plugin.', 'sagenda-wp' ),
      'readMore'                              => esc_html( 'Read more', 'sagenda-wp' ),
      'createAccount'                         => esc_html( 'Create a free account ', 'sagenda-wp' ),
      'aboutIntegrationTitle'                 => esc_html( 'About integration in your WP WebSite :', 'sagenda-wp' ),
      'howToGetTheTokenTitle'                 => esc_html( 'How to get the token :', 'sagenda-wp' ),
      'usefulLinksTitle'                      => esc_html( 'Useful links :', 'sagenda-wp' ),
      'result'                                => $result,
      'color'                                 => $color,
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
      return sanitize_text_field($_POST['sagendaAuthenticationCode']);
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
      // add option does nothing if already exist. So try to create, if exist update the value.
      add_option( 'mrs1_authentication_code', sanitize_text_field($_POST['sagendaAuthenticationCode']), '', 'yes' );
      update_option('mrs1_authentication_code', sanitize_text_field($_POST['sagendaAuthenticationCode']));
    }
  }
}
