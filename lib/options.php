<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_init(){
	register_setting( 'tucano_options', 'tucano_theme_options', 'tucano_validate_options' );
	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_script("admin", $file_dir."/js/admin.js", false, "1.0"); 
}

function theme_options_add_page() {
	add_theme_page('Optionen', 'Optionen', 'edit_theme_options', 'theme-optionen', 'tucano_theme_options_page' ); // Seitentitel, Titel in der Navi, Berechtigung zum Editieren (http://codex.wordpress.org/Roles_and_Capabilities) , Slug, Funktion 
}

function tucano_theme_options_page() {
global $select_options, $radio_options;
if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false; ?>

<div class="wrap"> 
<?php screen_icon(); ?><h2>Theme-Optionen › <?php echo get_current_theme(); ?></h2> 
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?> 
<div class="updated fade">
	<p><strong>Einstellungen wurden erfolgreich gespeichert!</strong></p>
</div>
<?php endif; ?>

  <form method="post" action="options.php">
	<?php settings_fields( 'tucano_options' ); ?>
    <?php $options = get_option( 'tucano_theme_options' ); ?>

    <table class="form-table">
	<tr valign="top">
        <th scope="row">URL für Logo</th>
        <td><input id="tucano_theme_options[logo-url]" class="regular-text" type="text" name="tucano_theme_options[logo-url]" value="<?php esc_attr_e( $options['logo-url'] ); ?>" /></td>
      </tr>  
	<tr valign="top">
        <th scope="row">Ladeleiste</th>
		<td>
			<select name="tucano_theme_options[progress-bar]" id="tucano_theme_options[progress-bar]">
				<option<?php if ($options['progress-bar'] == 1) : ?> selected="selected"<?php endif; ?> value="1">Aktiviert</option>
				<option<?php if ($options['progress-bar'] == 0) : ?> selected="selected"<?php endif; ?> value="0">Deaktiviert</option>
			</select>
			<code>#progressBar</code>
		</td>
      </tr>
      <tr valign="top">
        <th scope="row">Twitter-Nutzername (ohne "@")</th>
        <td><input id="tucano_theme_options[twitter-user]" class="regular-text" type="text" name="tucano_theme_options[twitter-user]" value="<?php esc_attr_e( $options['twitter-user'] ); ?>" /></td>
      </tr>
	  <?php if ($options['social-flattr'] == 1) : ?>
	  <tr valign="top">
        <th scope="row">Flattr-Benutzername</th>
        <td><input id="tucano_theme_options[flattr-username]" class="regular-text" type="text" name="tucano_theme_options[flattr-username]" value="<?php esc_attr_e( $options['flattr-username'] ); ?>" /></td>
      </tr>
	  <?php endif; ?>
	<tr valign="top">
		<th scope="row">Buttons zum Teilen</th>
		<td><fieldset>
		<label for="tucano_theme_options[social-facebook]"><input name="tucano_theme_options[social-facebook]" type="checkbox" id="tucano_theme_options[social-facebook]" value="1"<?php if ($options['social-facebook'] == 1) : ?>checked="checked"<?php endif; ?>>
		Facebook</label>&nbsp;&nbsp;&nbsp;
		<label for="tucano_theme_options[social-twitter]"><input name="tucano_theme_options[social-twitter]" type="checkbox" id="tucano_theme_options[social-twitter]" value="1"<?php if ($options['social-twitter'] == 1) : ?>checked="checked"<?php endif; ?>>
		Twitter</label>&nbsp;&nbsp;&nbsp;
		<label for="tucano_theme_options[social-flattr]"><input name="tucano_theme_options[social-flattr]" data-related-item="hiz" type="checkbox" id="tucano_theme_options[social-flattr]" value="1"<?php if ($options['social-flattr'] == 1) : ?>checked="checked"<?php endif; ?>>
		Flattr</label>&nbsp;&nbsp;&nbsp;
		<label for="tucano_theme_options[social-googleplus]"><input name="tucano_theme_options[social-googleplus]" type="checkbox" id="tucano_theme_options[social-googleplus]" value="1"<?php if ($options['social-googleplus'] == 1) : ?>checked="checked"<?php endif; ?>>
		Google Plus</label>
		</fieldset></td>
	</tr>
	 
      <tr valign="top">
        <th scope="row">Info am oberen Bildschirmrand</th>
		<td>
			<select name="tucano_theme_options[top-message]" id="tucano_theme_options[top-message]">
				<option<?php if ($options['top-message'] == 1) { echo ' selected="selected"'; } ?> value="1">Aktiviert</option>
				<option<?php if ($options['top-message'] == 0) { echo ' selected="selected"'; } ?> value="0">Deaktiviert</option>
			</select>
			<?php if ($options['top-message'] == 1) : ?> <b>&#8211; Inhalt:</b> <input id="tucano_theme_options[top-msg-con]" class="regular-text" type="text" name="tucano_theme_options[top-msg-con]" value="<?php esc_attr_e( $options['top-msg-con'] ); ?>" /><?php endif; ?>
			<p class="description">Zeigt ihre persönliche Nachricht im Design an.<?php if ($options['top-message'] == 1) : ?> &nbsp;&nbsp;<code>HTML erlaubt</code></p><?php endif; ?>
		</td>
      </tr>

	  <tr valign="top">
        <th scope="row">Eigener CSS-Code</th>
        <td><textarea id="tucano_theme_options[custom_css]" class="large-text" style="font-family: Courier New;" cols="50" rows="8" name="tucano_theme_options[custom_css]"><?php echo esc_textarea( $options['custom_css'] ); ?></textarea></td>
      </tr>
	  <tr valign="top">
        <th scope="row">Link zum Impressum</th>
        <td><input id="tucano_theme_options[imprint-link]" class="regular-text" type="text" name="tucano_theme_options[imprint-link]" value="<?php esc_attr_e( $options['imprint-link'] ); ?>" /><p class="description">Diese URL wird im Impressums-Link rechts unten verwendet.</p></td>
      </tr>
	  <tr valign="top">
        <th scope="row">Eigener Code für head-Bereich</th>
        <td><textarea id="tucano_theme_options[extended_head]" class="large-text" cols="50" rows="5" name="tucano_theme_options[extended_head]"><?php echo esc_textarea( $options['extended_head'] ); ?></textarea></td>
      </tr>
    </table>
    <p class="submit"><input type="submit" class="button-primary" value="Einstellungen speichern" /></p>
  </form>
</div>
<?php }

function tucano_validate_options( $input ) {
	$input['logo-url'] = wp_filter_nohtml_kses( $input['logo-url'] );
	$input['twitter-user'] = wp_filter_nohtml_kses( $input['twitter-user'] );
	$input['imprint-link'] = wp_filter_nohtml_kses( $input['imprint-link'] );
	$input['flattr-username'] = wp_filter_nohtml_kses( $input['flattr-username'] );
	return $input;
}

?>