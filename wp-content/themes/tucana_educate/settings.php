<?php
/**
 * jbrsoft Tabbed Settings Page
 */

add_action( 'init', 'jbrsoft_admin_init' );
add_action( 'admin_menu', 'jbrsoft_settings_page_init' );

function jbrsoft_admin_init() {
	$settings = get_option( "jbrsoft_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'jbrsoft_default'     => 'Some default information',
			'jbrsoft_facebook'    => 'http://facebook.com',
			'jbrsoft_twitter'     => 'http://twitter.com',
			'jbrsoft_facebook'    => 'http://facebook.com',
			'jbrsoft_google'      => 'http://google.com',
			'jbrsoft_email'       => 'http://example@gmail.com',
			'jbrsoft_map'         => '',
			'jbrsoft_phone'       => '+8801989442856',
			'jbrsoft_address'     => 'Dhaka, Bangladesh',
			'jbrsoft_linkedin'    => 'http://linkedin.com'
		);
		add_option( "jbrsoft_theme_settings", $settings, '', 'yes' );
	}	
}

function jbrsoft_settings_page_init() {

	$theme_data    = wp_get_theme( get_template_directory()  . '/style.css' );
	$settings_page = add_theme_page(  'Theme Settings', 'Theme Settings', 'edit_theme_options', 'theme-settings', 'jbrsoft_settings_page' );
	add_action( "load-{$settings_page}", 'jbrsoft_load_settings_page' );

}

function jbrsoft_load_settings_page() {

	if ( isset($_POST["jbrsoft-settings-submit"]) && $_POST["jbrsoft-settings-submit"] == 'Y' ) {
		check_admin_referer( "jbrsoft-settings-page" );
		jbrsoft_save_theme_settings();
		$url_parameters = isset($_GET['tab']) ? 'updated=true&tab=' . $_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit();
	}

}

function jbrsoft_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "jbrsoft_theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ) { 
		if ( isset ( $_GET['tab'] ) ) {
	        $tab = $_GET['tab']; 
		}  else {
	        $tab = 'homepage'; 
	    }

	    switch ( $tab ) { 
	        case 'general' :
				$settings['jbrsoft_tag_class'] = $_POST['jbrsoft_tag_class'];
			break; 
	        case 'footer' : 
				$settings['jbrsoft_map']       = $_POST['jbrsoft_map'];
			break;
			case 'homepage' : 
				$settings['jbrsoft_img']	      = $_POST['jbrsoft_img'];
				$settings['jbrsoft_default']	  = $_POST['jbrsoft_default'];
				$settings['jbrsoft_facebook']	  = $_POST['jbrsoft_facebook'];
				$settings['jbrsoft_twitter']	  = $_POST['jbrsoft_twitter'];
				$settings['jbrsoft_linkedin']	  = $_POST['jbrsoft_linkedin'];
				$settings['jbrsoft_google']	      = $_POST['jbrsoft_google'];
				$settings['jbrsoft_email']	      = $_POST['jbrsoft_email'];
				$settings['jbrsoft_phone']	      = $_POST['jbrsoft_phone'];
				$settings['jbrsoft_address']	  = $_POST['jbrsoft_address'];
			break;
	    }
	}
	
	if( !current_user_can( 'unfiltered_html' ) ) {

		if ( $settings['jbrosoft_checkbox']  ) {
			$settings['jb   rosoft_checkbox'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['jbrosoft_checkbox'] ) ) );
		}
		
		if ( $settings['jbrsoft_default'] ) {
			$settings['jbrsoft_default'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['jbrsoft_default'] ) ) );
		}

		if ( $settings['jbrsoft_map'] ) {
			$settings['jbrsoft_map'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['jbrsoft_map'] ) ) );
		}
	}

	$updated = update_option( "jbrsoft_theme_settings", $settings );
}

function jbrsoft_admin_tabs( $current = 'homepage' ) { 

    $tabs = array( 
    	'homepage' 	=> 'Home', 
	    'general' 	=> 'General', 
	    'footer' 	=> 'Map' 
    ); 

    $links = array();
    
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';

    foreach( $tabs as $tab => $name ) {
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";   
    }
    echo '</h2>';
}

function jbrsoft_settings_page() {
	global $pagenow;
	$settings   = get_option( "jbrsoft_theme_settings" );
	$theme_data = wp_get_theme( get_template_directory()  . '/style.css' );
	?>	
	<div class="wrap">
		<h2>Theme Settings</h2>
		<?php
			if ( isset( $_GET['updated']) && esc_attr( $_GET['updated'] ) ) {
				echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			}

			if ( isset ( $_GET['tab'] ) ) {
				jbrsoft_admin_tabs($_GET['tab']); 
			} else {
				jbrsoft_admin_tabs('homepage');
			}
		?>
		<div id="poststuff">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
					wp_nonce_field( "jbrsoft-settings-page" ); 
				
					if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ) { 

						if ( isset ( $_GET['tab'] ) ){
							$tab = $_GET['tab']; 
						}
						else {
							$tab = 'homepage'; 
						}
					
						echo '<table class="form-table">';
						switch ( $tab ) {
							case 'general' :
								?>
								<tr>
									<th><label for="jbrsoft_tag_class">Tags with CSS classes:</label></th>
									<td>
										<input id="jbrsoft_tag_class" name="jbrsoft_tag_class" type="checkbox" <?php if ( $settings["jbrsoft_tag_class"] ) echo 'checked="checked"'; ?> value="true" /> 
										<span class="description">Output each post tag with a specific CSS class using its slug.</span>
									</td>
								</tr>
								<?php
							break; 
							case 'footer' : 
								?>
								<tr>
									<th><label for="jbrsoft_map">Jbrsoft map Setting</label></th>
									<td>
										<textarea id="jbrsoft_map" name="jbrsoft_map" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["jbrsoft_map"] ) ); ?></textarea><br/>
										<span class="description">Enter your Google Analytics tracking code:</span>
									</td>
								</tr>
								<?php
							break;
							case 'homepage' : 
								?>
								
								<tr>
									<th><label for="jbrsoft_default">Adress:</label></th>
									<td>
										<textarea id="jbrsoft_default" name="jbrsoft_default" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["jbrsoft_default"] ) ); ?></textarea><br/>
										<span class="description">Enter the introductory text for the home page:</span>
									</td>
								</tr>

								<tr>
									<th><label for="jbrsoft_facebook">Faccbook:</label></th>
									<td>
										<input type="text" id="jbrsoft_facebook" name="jbrsoft_facebook"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_facebook"] ) ); ?>">
									</td>
								</tr>

								<tr>
									<th><label for="jbrsoft_twitter">Twitter:</label></th>
									<td>
										<input type="text" id="jbrsoft_twitter" name="jbrsoft_twitter"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_twitter"] ) ); ?>">
									</td>
								</tr>

								<tr>
									<th><label for="jbrsoft_google">Google:</label></th>
									<td>
										<input type="text" id="jbrsoft_google" name="jbrsoft_google"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_google"] ) ); ?>">
									</td>
								</tr>

								<tr>
									<th><label for="jbrsoft_linkedin">Linkedin</label></th>
									<td>
										<input type="text" id="jbrsoft_linkedin" name="jbrsoft_linkedin"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_linkedin"] ) ); ?>">
									</td>
								</tr>

								<tr>
									<th><label for="jbrsoft_email">Email:</label></th>
									<td>
										<input type="email" id="jbrsoft_email" name="jbrsoft_email"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_email"] ) ); ?>">
									</td>
								</tr>
								<tr>
									<th><label for="jbrsoft_email">Phone number:</label></th>
									<td>
										<input type="text" id="jbrsoft_phone" name="jbrsoft_phone"  value="<?php echo esc_html( stripslashes( $settings["jbrsoft_phone"] ) ); ?>">
									</td>
								</tr>
								
								<?php
							break;
						}
						echo '</table>';
					}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
					<input type="hidden" name="jbrsoft-settings-submit" value="Y" />
				</p>
			</form>
			<p> Theme developed by <a href="#">JBRSOFT IT FIRM</a> | <a href="#">Follow me on Twitter</a>! | Join <a href="#"> Facebook</a>!</p>
		</div>
	</div>
<?php
}
?>