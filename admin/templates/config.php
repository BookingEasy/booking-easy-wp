<div id="mrs-<?php echo $tab; ?>" class="wrap mrs-settings">
    <form class="mrs1-reservation-form" action="admin-post.php" method="post">
        <div class="mrs-heading">
            Sagenda for WordPress: Sagenda Settings           
        </div>
        <?php 
        global $wp_version;
        $version = $wp_version;
        if($version >= 3.0) {
            settings_errors(); 
        }
        ?>
        <h3 class="mrs-title">Sagenda Authentication Settings <?php if ($connected) { ?><span class="status positive">CONNECTED</span> <?php } else { ?><span class="status negative">NOT CONNECTED</span><?php } ?></h3>
        <input type="hidden" name="action" value="save_mrs1_options" />
        <?php wp_nonce_field('mrs1'); ?>

        <table class="form-table">

            <tr valign="top">
                <th scope="row"><label for="mrs-auth-code">Sagenda Authentication Code</label></th>
                <td>
                    <input type="text" name="mrs1_authentication_code" id="mrs1_authentication_code" value="<?php echo esc_html($options); ?>"/>
                    <p class="help"><a target="_blank" href="https://www.sagenda.net/">Click here to get your Authentication code.</a></p>
                </td>

            </tr>            
        </table>
        
        <br />                
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></p>
    </form>
    <p>[sagenda-wp] add this short code either in post or page where you want to display the Sagenda form.</p>
    <p>If you want to use a shortcode outside of the WordPress post or page editor, you can use this snippet to output from the shortcode’s handler(s):  <pre> echo do_shortcode('[sagenda-wp]')</pre></p>
</div>
<div class="footer">
    <?php include_once 'footer.php'; ?>
</div>