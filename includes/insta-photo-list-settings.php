<?php
  // Create options menu link
  function ipl_options_menu_link()
  {
    add_options_page(
      'Instagram Photo List Options',
      'Instagram Photo List',
      'manage_options',
      'ipl-options',
      'ipl_options_content'
    );
  }

  function ipl_options_content()
  {
    // Init global options
    global $ipl_options;
    $redirect_url = 'http://'.$_SERVER['HTTP_HOST'];
    $redirect_url .= $_SERVER['REQUEST_URI'];
    ?>
      <div class="wrap">
        <h2>Instagram Photo List</h2>
        <p>Settings for IPL</p>
        <form action="options.php" method="post">
          <?php settings_fields('ipl_settings_group'); ?>
          <table class="form-table">
            <tbody>
              <tr>
                <th scope="row"><label for="ipl_settings[redirect_url]"><?php _e('Redirect URL', 'ipl-domain'); ?></label></th>
                <td>
                  <input type="text" class="regular-text" name="ipl_settings[redirect_url]" id="ipl_settings[redirect_url]" value="<?php echo $redirect_url; ?>" disabled>
                  <p class="description" id="ipl_settings['redirect_url']"><?php _e('Add this URL in your Instagram client redirect URL field', 'ipl-domain'); ?></p>
                </td>
              </tr>

              <tr>
                <th scope="row"><label for="ipl_settings[client_id]"><?php _e('Client ID', 'ipl-domain'); ?></label></th>
                <td>
                  <input type="text" class="regular-text" name="ipl_settings[client_id]" id="ipl_settings[client_id]" value="<?php echo $ipl_options['client_id']; ?>">
                  <p class="description" id="ipl_settings[client_id]"><?php _e('Get the client id from your Instagram APP and paste here', 'ipl-domain'); ?></p>
                </td>
              </tr>

              <tr>
                <th scope="row"><label for="ipl_settings[authenticate]"><?php _e('Authenticate', 'ipl-domain'); ?></label></th>
                <td>
                  <a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo $ipl_options['client_id'] ?>&redirect_uri=<?php echo $redirect_url ?>&response_type=token&scope=public_content" class="button btn">Authenticate</a>
                  <p class="description" id="ipl_settings[client_id]"><?php _e('IMPORTANT: Click after adding a redirect URL & client id', 'ipl-domain'); ?></p>
                </td>
              </tr>

              <tr>
                <th scope="row"><label for="ipl_settings[access_token]"><?php _e('Access Token', 'ipl-domain'); ?></label></th>
                <td>
                  <input type="text" class="regular-text" name="ipl_settings[access_token]" id="ipl_settings[access_token]" value="<?php echo $ipl_options['access_token']; ?>">
                  <p class="description" id="ipl_settings[access_token]"><?php _e('Get this from the URL after you are authenticated', 'ipl-domain'); ?></p>
                </td>
              </tr>

              <tr>
                <th scope="row"><label for="ipl_settings[linked]"><?php _e('Link photos to Instagram', 'ipl-domain'); ?></label></th>
                <td>
                  <input type="checkbox" name="ipl_settings[linked]" id="ipl_settings[linked]" value="1" <?php checked('1', $ipl_options['linked']); ?>>
                </td>
              </tr>

              <tr>
                <th scope="row"><label for="ipl_settings[page_caption]"><?php _e('Page caption', 'ipl-domain'); ?></label></th>
                <td>
                  <input type="text" class="regular-text" name="ipl_settings[page_caption]" id="ipl_settings[page_caption]" value="<?php echo $ipl_options['page_caption']; ?>">
                  <p class="description" id="ipl_settings[page_caption]"><?php _e('Add some text to the top of the page', 'ipl-domain'); ?></p>
                </td>
              </tr>

            </tbody>
          </table>

          <p class="submit">
            <input type="submit" name="submit" id="submit" class="button" value="<?php _e('Save Changes', 'ipl-domain'); ?>">
          </p>
        </form>
      </div>
    <?php
  }
  add_action('admin_menu', 'ipl_options_menu_link');

  // Register settings
  function ipl_regsiter_settings()
  {
    register_setting('ipl_settings_group', 'ipl_settings');
  }
  add_action('admin_init', 'ipl_regsiter_settings');
