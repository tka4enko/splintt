<?php
/*
Plugin Name: Online Success Visitors
Plugin URI: http://www.onlinesucces.nl
Description: Simple insert of the basic Online Success Visitor Forensics tracking code into the body section of every page.
Version: 1.01
Author: Online Succes
Author URI: http://www.onlinesucces.nl
License: GPLv3
Based on: Simple Google Analytics Plugin by Bitacre / Shinra Web Holdings / http://shinraholdings.com
*/

if( !class_exists( 'onlineSuccessVisitors' ) ) : // namespace collision check
class onlineSuccessVisitors {
	// declare globals
	var $options_name = 'online_succes_visitors_item';
	var $options_group = 'online_succes_visitors_option_option';
	var $options_page = 'online_succes_visitors';
	var $plugin_name = 'Online Success Visitors';
	var $plugin_textdomain = 'onlineSuccessVisitors';

	// constructor
	function onlineSuccessVisitors() {
		$options = $this->optionsGetOptions();
		add_filter( 'plugin_row_meta', array( &$this, 'optionsSetPluginMeta' ), 10, 2 ); // add plugin page meta links
		add_action( 'admin_init', array( &$this, 'optionsInit' ) ); // whitelist options page
		add_action( 'admin_menu', array( &$this, 'optionsAddPage' ) ); // add link to plugin's settings page in 'settings' menu on admin menu initilization
		if( $options['location'] == 'head' )
			add_action( 'wp_head', array( &$this, 'getTrackingCode' ), 99999 ); 
		else
			add_action( 'wp_footer', array( &$this, 'getTrackingCode' ), 99999 ); 
		register_activation_hook( __FILE__, array( &$this, 'optionsCompat' ) );
	}

	// load i18n textdomain
	/*
	function loadTextDomain() {
		load_plugin_textdomain( $this->plugin_textdomain, false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'lang/' );
	}
	*/
	
	
	// compatability with upgrade from version <1.4
	function optionsCompat() {
		$old_options = get_option( 'ssga_item' );
		if ( !$old_options ) return false;
		
		$defaults = optionsGetDefaults();
		foreach( $defaults as $key => $value )
			if( !isset( $old_options[$key] ) )
				$old_options[$key] = $value;
		
		add_option( $this->options_name, $old_options, '', false );
		delete_option( 'ssga_item' );
		return true;
	}
	
	// get default plugin options
	function optionsGetDefaults() { 
		$defaults = array( 
			'account' => '', 
			'profile' => '', 
			'insert_code' => 0,
			'location' => 'body'
		);
		return $defaults;
	}
	
	function optionsGetOptions() {
		$options = get_option( $this->options_name, $this->optionsGetDefaults() );
		return $options;
	}
	
	// set plugin links
	function optionsSetPluginMeta( $links, $file ) { 
		$plugin = plugin_basename( __FILE__ );
		if ( $file == $plugin ) { // if called for THIS plugin then:
			$newlinks = array( '<a href="options-general.php?page=' . $this->options_page . '">' . __( 'Settings', $this->plugin_textdomain ) . '</a>' ); // array of links to add
			return array_merge( $links, $newlinks ); // merge new links into existing $links
		}
	return $links; // return the $links (merged or otherwise)
	}
	
	// plugin startup
	function optionsInit() { 
		register_setting( $this->options_group, $this->options_name, array( &$this, 'optionsValidate' ) );
	}
	
	// create and link options page
	function optionsAddPage() { 
		add_options_page( $this->plugin_name . ' ' . __( 'Settings', $this->plugin_textdomain ), __( 'Online Success Visitors', $this->plugin_textdomain ), 'manage_options', $this->options_page, array( &$this, 'optionsDrawPage' ) );
	}
	
	// sanitize and validate options input
	function optionsValidate( $input ) { 
		$input['insert_code'] = ( $input['insert_code'] ? 1 : 0 ); 	// (checkbox) if TRUE then 1, else NULL
		$input['account'] =  wp_filter_nohtml_kses( $input['account'] ); // (textbox) safe text, no html
		$input['profile'] =  wp_filter_nohtml_kses( $input['profile'] ); // (textbox) safe text, no html
		$input['location'] = ( $input['location'] == 'head' ? 'head' : 'body' ); // (radio) either head or body
		return $input;
	}
	
	// draw a checkbox option
	function optionsDrawCheckbox( $slug, $label, $style_checked='', $style_unchecked='' ) { 
		$options = $this->optionsGetOptions();
		if( !$options[$slug] ) 
			if( !empty( $style_unchecked ) ) $style = ' style="' . $style_unchecked . '"';
			else $style = '';
		else
			if( !empty( $style_checked ) ) $style = ' style="' . $style_checked . '"';
			else $style = ''; 
	?>
		 <!-- <?php _e( $label, $this->plugin_textdomain ); ?> -->
			<tr valign="top">
				<th scope="row">
					<label<?php echo $style; ?> for="<?php echo $this->options_name; ?>[<?php echo $slug; ?>]">
						<?php _e( $label, $this->plugin_textdomain ); ?>
					</label>
				</th>
				<td>
					<input name="<?php echo $this->options_name; ?>[<?php echo $slug; ?>]" type="checkbox" value="1" <?php checked( $options[$slug], 1 ); ?>/>
				</td>
			</tr>
			
	<?php }
	
	// draw the options page
	function optionsDrawPage() { ?>
		<div class="wrap">
		<div class="icon32" id="icon-options-general"><br /></div>
			<h2><?php echo $this->plugin_name . __( ' Settings', $this->plugin_textdomain ); ?></h2>
			<form name="form1" id="form1" method="post" action="options.php">
				<?php settings_fields( $this->options_group ); // nonce settings page ?>
				<?php $options = $this->optionsGetOptions();  //populate $options array from database ?>
				
				<!-- Description -->
				<p style="font-size:0.95em"><?php 
					printf( __( 'If you don\'t have a subscription to the Online Success software services, you can <a href=\'http://www.onlinesucces.nl\'>sign up for one here</a>.', $this->plugin_textdomain )); ?></p>
				
				<table class="form-table">
	
					<?php $this->optionsDrawCheckbox( 'insert_code', 'Insert tracking code?', '', '' ); ?>					 
	
					 <!-- <?php _e( 'UA-numbers (text boxes)', $this->plugin_textdomain ); ?> -->
					<tr valign="top"><th scope="row"><label for="<?php echo $this->options_name; ?>[account]"><?php _e( 'Online Succes API Token', $this->plugin_textdomain ); ?>: </label></th>
						<td>
							<input type="text" name="<?php echo $this->options_name; ?>[account]" value="<?php echo $options['account']; ?>" style="width:300px;" maxlength="50" />
							<br>
							<? printf( __( 'You can find your Online Success API key by logging into your account <a href=\'https://app.onlinesucces.nl\'>on our website</a> at your company profile.', $this->plugin_textdomain )); ?>
						</td>
					</tr>
					
							<input name="<?php echo $this->options_name; ?>[location]" type="hidden" value="body" />

					
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Changes', $this->plugin_textdomain ) ?>" />
				</p>
			</form>
		</div>
		
		<?php
	}
	
	// 	the Online Success Visitors html tracking code to be inserted in header/footer
	function getTrackingCode() { 
		$options = $this->optionsGetOptions();
	
	// header
	$header = sprintf( 
		__( '<!-- 
			Plugin: Online Success Visitors 
	Plugin URL: %1$s', $this->plugin_textdomain ), 
		$this->plugin_name );
	
	// footer
	$footer = '
	-->';
	
	// code removed for all pages
	$disabled = $header . __( 'You\'ve chosen to prevent the tracking code from being inserted on 
	any page. 
	
	You can enable the insertion of the tracking code by going to 
	Settings > Online Success Visitors on the Dashboard.', $this->plugin_textdomain ) . $footer;
	
	// code removed for admin
	$admin = $header . __( 'You\'ve chosen to prevent the tracking code from being inserted on 
	pages viewed by logged-in administrators. 
	
	You can re-enable the insertion of the tracking code on all pages
	for all users by going to Settings > Online Success Visitors on the Dashboard.', $this->plugin_textdomain ) . $footer;
	
	// core tracking code
	//example code: 55b4a99e5364b8d639d4fa318efa73d4d3005cff
	//_gaq.push([\'_setAccount\', \'UA-%1$s-%2$s\']);
	$core = sprintf( '<script type="text/javascript">
	var image = document.createElement("img");
	image.src =\'//connect.onlinesucces.nl/?i=%1$s&ts=\'+new Date().getTime()+\'&f=\'+encodeURIComponent(document.location.href)+\'&r=\'+encodeURIComponent(document.referrer)+\'&t=\'+encodeURIComponent(document.title);
	</script>', 
		$options['account'],
		$options['profile'] 
	); 
	
	// build code
	if( !$options['insert_code'] ) 
		echo $disabled; 
	else 
		echo $header . "\n\n" . $footer . "\n\n" . $core ; 
	}
} // end class
endif; // end collision check

$onlineSuccessVisitors_instance = new onlineSuccessVisitors;
?>