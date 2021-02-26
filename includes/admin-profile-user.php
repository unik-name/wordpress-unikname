<?php
	//extra user info in wp-admin
	add_action( 'show_user_profile', 'unikname_extra_user_profile_fields' );
	add_action( 'edit_user_profile', 'unikname_extra_user_profile_fields' );
	function unikname_extra_user_profile_fields( $user ) {
		$unikNameSecurity 			= get_option('unik_name_security'); 
		$disableButtonCheck 		= '';

		global $wpdb;
		$socialUser = $wpdb->get_var($wpdb->prepare('SELECT user_id FROM '. $wpdb->prefix .'usermeta WHERE user_id = %d and meta_key LIKE "thechamp%"', $user->ID));
		if($socialUser <= 0){
			$disableButtonCheck		= 'disabled';
		}

		if(is_array($unikNameSecurity) && isset($unikNameSecurity['disable_connect_pass']) && $unikNameSecurity['disable_connect_pass'] == 1){ 
			$disableButtonCheck		= 'disabled';
		}

	?>
		<h3><?php _e("Unikname Connect Settings", "unikname-connect"); ?></h3>
		<table class="form-table">
			<tr>
			  	<th><label for="connection_autorizations"><?php _e("Connection autorizations", 'unikname-connect'); ?></label></th>
				<td>
					<input type="checkbox" name="connection_autorizations" id="connection_autorizations" <?=(get_the_author_meta('_connection_autorizations', $user->ID) && get_the_author_meta('_connection_autorizations', $user->ID) == 1) ? 'checked="checked"' : ''?> class="regular-text" value="1" <?=$disableButtonCheck?> style="margin-bottom: 5px;"/>
					<?=__('Prevent any connections to my account with my password','unikname-connect');?>
					<p class="description"><?=__('Forbid anyone to use your password to log into your account. Only Unikname Connect allows you to connect to it.','unikname-connect');?></p>
				</td>
			</tr>   
		</table>
	<?php
	}
	add_action('profile_update', 'unikname_user_register', 100);
	add_action('user_register', 'unikname_user_register', 100); 
	function unikname_user_register ($user_id) {
		if ( isset( $_POST['connection_autorizations'] ) ){
		    update_user_meta($user_id, '_connection_autorizations', $_POST['connection_autorizations']);
		}else{
			update_user_meta($user_id, '_connection_autorizations', $_POST['']);
		}
	}