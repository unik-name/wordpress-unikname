<?php
defined('ABSPATH') or die("Cheating........Uh!!");
/**
 * File contains the functions necessary for Social Login functionality
 */

/**
 * Render Social Login icons HTML
 */
function the_champ_login_button($widget = false, $action = 'login'){
	if(!is_user_logged_in() && the_champ_social_login_enabled()){
		global $theChampLoginOptions, $unikNameStyleButtonOptions;
		global $buttonLoginTitle, $buttonLoginLabel, $buttonRegisterTitle, $buttonRegisterLabel, $subTitleLogin, $subTitleRegister;
	    // Button Name
	    $buttonLoginTitle = array(
	        '1' => __('Login','unikname-connect'),
	        '2' => __('Sign in','unikname-connect'),
	        '3' => __('Continue','unikname-connect'),
	        '4' => '',
	    );
	    $buttonLoginLabel = array(
	        '1' => __('With your @unikname','unikname-connect') 
	    );
	    $subTitleLogin = array(
	        '1' => __('🔐 The next-gen identifier: simple, secure and private. <a href="https://www.unikname.com/my-unikname-app/#pk_campaign=installation&pk_source=login&pk_medium=punch&pk_content=nextgen">Read more.</a>','unikname-connect'),
	        '2' => __('🔐 The next-gen identifier: simple, secure and private.','unikname-connect')
	    );
	    // Register
	    $buttonRegisterTitle = array(
	        '1' => __('Sign up','unikname-connect'),
	        '2' => __('Register','unikname-connect'),
	        '3' => __('Continue','unikname-connect'),
	        '4' => '',
	    );
	    $buttonRegisterLabel = array(
	        '1' => __('With your @unikname','unikname-connect'),
	    );
	    $subTitleRegister = array(
	        '1' => __('🔐 The next-gen identifier: simple, secure and private. <a href="https://www.unikname.com/my-unikname-app/#pk_campaign=installation&pk_source=signup&pk_medium=punch&pk_content=nextgen">Read more.</a>','unikname-connect'),
	        '2' => __('🔐 The next-gen identifier: simple, secure and private.','unikname-connect')
	    );
		$titleButton 		= $buttonLoginTitle;
		$labelButton 		= $buttonLoginLabel;
		$subTitleButton		= $subTitleLogin;
		$bgRegister 	= '#2B6BF3';
		if(isset($unikNameStyleButtonOptions['login_color'])){
			switch ($unikNameStyleButtonOptions['login_color']) {
				case 'blue':
					$bgRegister 	= '#0F2852';
					break;
				case 'turquoise':
					$bgRegister 	= '#2B6BF3';
					break;
				default:
					$bgRegister 	= $unikNameStyleButtonOptions['login_color_custom'];
					break;
			}
		}
		if($action == 'register'){
			$titleButton 	= $buttonRegisterTitle;
			$labelButton 	= $buttonRegisterLabel;
			$subTitleButton	= $subTitleRegister;
			$bgRegister 	= '#2B6BF3';
			if(isset($unikNameStyleButtonOptions['register_color'])){
				switch ($unikNameStyleButtonOptions['register_color']) {
					case 'blue':
						$bgRegister 	= '#0F2852';
						break;
					case 'turquoise':
						$bgRegister 	= '#2B6BF3';
						break;
					default:
						$bgRegister 	= $unikNameStyleButtonOptions['register_color_custom'];
						break;
				}
			}
		} 

		$html = '';
		$customInterface = apply_filters('the_champ_login_interface_filter', '', $theChampLoginOptions, $widget);
		if($customInterface != ''){
			$html = $customInterface;
		}elseif(isset($theChampLoginOptions['providers']) && is_array($theChampLoginOptions['providers']) && count($theChampLoginOptions['providers']) > 0){
			$html = the_champ_login_notifications($theChampLoginOptions);
			if(!$widget){
				$html .= '<div class="the_champ_outer_login_container unikname_alignment_'.$unikNameStyleButtonOptions[$action.'_button_alignment'].'">';
				if(isset($unikNameStyleButtonOptions[$action.'_button_title']) && $unikNameStyleButtonOptions[$action.'_button_title'] != ''){
					$html .= '<div class="the_champ_social_login_title">'.$titleButton[$unikNameStyleButtonOptions[$action.'_button_title']].'</div>';
				}else{
					$html .= '<div class="the_champ_social_login_title">'.$titleButton[1].'</div>';
				}
			}
			$html .= '<div class="the_champ_login_container '.'uniknmae_action_'.$action.' '.'button_color_'.$unikNameStyleButtonOptions[$action.'_color'].'">';
			$gdprOptIn = '';
			if(isset($theChampLoginOptions['gdpr_enable'])){
				$gdprOptIn = '<div class="heateor_ss_sl_optin_container"><label><input type="checkbox" class="heateor_ss_social_login_optin" value="1" />'. str_replace(array($theChampLoginOptions['ppu_placeholder'], $theChampLoginOptions['tc_placeholder']), array('<a href="'. $theChampLoginOptions['privacy_policy_url'] .'" target="_blank">'. $theChampLoginOptions['ppu_placeholder'] .'</a>', '<a href="'. $theChampLoginOptions['tc_url'] .'" target="_blank">'. $theChampLoginOptions['tc_placeholder'] .'</a>'), wp_strip_all_tags($theChampLoginOptions['privacy_policy_optin_text'])) .'</label></div>';
			}
			if(isset($theChampLoginOptions['gdpr_enable']) && $theChampLoginOptions['gdpr_placement'] == 'above'){
				$html .= $gdprOptIn;
			}
			$html .= '<ul class="the_champ_login_ul">';
			if(isset($theChampLoginOptions['providers']) && is_array($theChampLoginOptions['providers']) && count($theChampLoginOptions['providers']) > 0){
				foreach($theChampLoginOptions['providers'] as $provider){
					$html .= '<li><i ';
					// id
					if( $provider == 'google' ){
						$html .= 'id="theChamp'. ucfirst($provider) .'Button" ';
					}
					// class
					$html .= 'class="theChampLogin theChamp'. ucfirst($provider) .'Background theChamp'. ucfirst($provider) .'Login" ';
					$html .= 'style="border-radius: '.$unikNameStyleButtonOptions[$action.'_border_radius'].'px; background-color: '.$bgRegister.' !important;" ';
					// $html .= 'alt="Login with ';
					// $html .= ucfirst($provider);
					// $html .= '" title="Login with ';
					// $html .= ucfirst($provider);
					$html .= 'alt="Login with your private @unikname';
					$html .= '" title="Login with your private @unikname';
					if(current_filter() == 'comment_form_top' || current_filter() == 'comment_form_must_log_in_after'){
						$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
					}else{
						$html .= '" onclick="theChampInitiateLogin(this)" >';
					}
					if($provider == 'facebook'){
						$html .= '<div class="theChampFacebookLogoContainer">';
					}
					$html .= '<ss style="display:block" class="theChampLoginSvg theChamp'. ucfirst($provider) .'LoginSvg"></ss>';
					if(isset($unikNameStyleButtonOptions[$action.'_button_label']) && $unikNameStyleButtonOptions[$action.'_button_label'] != ''){
						$html .= '<label class="button_label">'.$labelButton[$unikNameStyleButtonOptions[$action.'_button_label']].'</label>';
					}else{
						$html .= '<label class="button_label">'.$labelButton[1].'</label>';
					}
					if($provider == 'facebook'){
						$html .= '</div>';
					}
					$html .= '</i></li>';
				}
			}
			$html .= '</ul>';
			if(isset($theChampLoginOptions['gdpr_enable']) && $theChampLoginOptions['gdpr_placement'] == 'below'){
				$html .= '<div style="clear:both"></div>';
				$html .= $gdprOptIn;
			}

			$html .= '</div>';
			if(isset($unikNameStyleButtonOptions[$action.'_button_description']) && $unikNameStyleButtonOptions[$action.'_button_description'] >= 1){
				$html .= '<div class="the_champ_social_button_description"> '.$subTitleButton[$unikNameStyleButtonOptions[$action.'_button_description']].'</div>';
			}else{
				$html .= '<div class="the_champ_social_button_description"> '.$subTitleButton['1'].'</div>';
			}
			if(!$widget){
				$html .= '</div><div style="clear:both; margin-bottom: 6px"></div>';
			}
		}
		if(!$widget){
			echo $html;
		}else{
			return $html;
		}
	}
}
function unikname_link_account_with_unikname(){
	echo the_champ_account_linking();
}

function unikname_html_or_button(){
	global $theChampLoginOptions;
	if ( isset($theChampLoginOptions['enable']) && $theChampLoginOptions['enable'] == 1 ) {
		echo '<div class="waiel-style-or"><span>'.__('or','unikname-connect').'</span></div>';
	}
}

/**
 * Render Unik Name Login icons HTML
 */
function unikname_login_button_icon_or_before(){
	unikname_html_or_button();
	the_champ_login_button(false, 'login');
}
function unikname_login_button_icon_or_after(){
	the_champ_login_button(false, 'login');
	unikname_html_or_button();
}
/**
 * Render Unik Name Login icons HTML
 */
function unikname_register_button_icon_or_before(){
	unikname_html_or_button();
	the_champ_login_button(false, 'register');
}
function unikname_register_button_icon_or_after(){
	the_champ_login_button(false, 'register');
	unikname_html_or_button();
}

// enable FB login at login, register and comment form
if(isset($theChampLoginOptions['enableAtLogin']) && $theChampLoginOptions['enableAtLogin'] == 1){
	add_action('login_form', 'unikname_login_button_icon_or_before', 1000);
	add_action('bp_before_sidebar_login_form', 'unikname_login_button_icon_or_before');
}
if(isset($theChampLoginOptions['enableAtRegister']) && $theChampLoginOptions['enableAtRegister'] == 1){
	add_action('register_form', 'unikname_register_button_icon_or_before');
	add_action('after_signup_form', 'unikname_register_button_icon_or_before');
	add_action('bp_before_account_details_fields', 'unikname_register_button_icon_or_before');
}
if(isset($theChampLoginOptions['enableAtComment']) && $theChampLoginOptions['enableAtComment'] == 1){
	global $user_ID;
	if(get_option('comment_registration') && intval($user_ID) == 0){
		add_action('comment_form_must_log_in_after', 'unikname_register_button_icon_or_before');
	}else{
		add_action('comment_form_top', 'unikname_login_button_icon_or_after');
	}
}
if(isset($theChampLoginOptions['enable_before_wc'])){
	add_action( 'woocommerce_before_customer_login_form', 'unikname_login_button_icon_or_after' );
}
if(isset($theChampLoginOptions['enable_after_wc'])){
	add_action( 'woocommerce_after_customer_login_form', 'unikname_login_button_icon_or_before' );
}
if(isset($theChampLoginOptions['enable_form_login_wc'])){
	add_action( 'woocommerce_login_form_end', 'unikname_login_button_icon_or_before' );
}
if(isset($theChampLoginOptions['enable_register_wc'])){
	add_action( 'woocommerce_register_form_end', 'unikname_register_button_icon_or_before' );
}
if(isset($theChampLoginOptions['enable_wc_checkout']) && $theChampLoginOptions['enable_wc_checkout'] == 1){
	add_action( 'woocommerce_checkout_before_customer_details', 'unikname_login_button_icon_or_after' );
}
if(isset($theChampLoginOptions['link_my_account_fe']) && $theChampLoginOptions['link_my_account_fe'] == 1 && isset($theChampLoginOptions['enable']) && $theChampLoginOptions['enable'] == 1){
	add_action( 'woocommerce_before_edit_account_form', 'unikname_link_account_with_unikname' );
}
/**
 * Login user to Wordpress.
 */
function the_champ_login_user($userId, $profileData = array(), $socialId = '', $update = false){
	$user = get_user_by('id', $userId);

	if($update && !get_user_meta($userId, 'thechamp_dontupdate_avatar', true)){
		if(isset($profileData['avatar']) && $profileData['avatar'] != ''){
			update_user_meta($userId, 'thechamp_avatar', $profileData['avatar']);
		}
		if(isset($profileData['large_avatar']) && $profileData['large_avatar'] != ''){
			update_user_meta($userId, 'thechamp_large_avatar', $profileData['large_avatar']);
		}
	}
	if($socialId != ''){
		update_user_meta($userId, 'thechamp_current_id', $socialId);
	}
	do_action('the_champ_login_user', $userId, $profileData, $socialId, $update);

	wp_set_current_user($userId, $user -> user_login);
	wp_set_auth_cookie($userId, true);
	do_action('wp_login', $user -> user_login, $user);
}

/**
 * Create username
 */
function the_champ_create_username($profileData){
	$username = "";
	$firstName = "";
	$lastName = "";
	if(!empty($profileData['username'])){
		$username = $profileData['username'];
	}
	if(!empty($profileData['first_name']) && !empty($profileData['last_name'])){
		$username = !$username ? $profileData['first_name'] . ' ' . $profileData['last_name'] : $username;
		$firstName = $profileData['first_name'];
		$lastName = $profileData['last_name'];
	}elseif(!empty($profileData['name'])){
		$username = !$username ? $profileData['name'] : $username;
		$nameParts = explode(' ', $profileData['name']);
		if(count($nameParts) > 1){
			$firstName = $nameParts[0];
			$lastName = $nameParts[1];
		}else{
			$firstName = $profileData['name'];
		}
	}elseif(!empty($profileData['username'])){
		$firstName = $profileData['username'];
	}elseif(isset($profileData['email']) && $profileData['email'] != ''){
		$user_name = explode('@', $profileData['email']);
		if(!$username){
			$username = $user_name[0];
		}
		$firstName = str_replace("_", " ", $user_name[0]);
	}else{
		$userNameTemp = __('Redacted user ','unikname-connect').'('.substr($profileData['id'],0,5).')';
		$username = !$username ? $userNameTemp : $username;
		$firstName = $userNameTemp;
	}
	return $username."|tc|".$firstName."|tc|".$lastName;
}

/**
 * Create user in Wordpress database.
 */
function the_champ_create_user($profileData, $verification = false, $userNameCustom = ''){
	// create username, firstname and lastname
	$usernameFirstnameLastname = explode('|tc|', the_champ_create_username($profileData));
	$username = $usernameFirstnameLastname[0];
	$firstName = $usernameFirstnameLastname[1];
	$lastName = $usernameFirstnameLastname[2];
	// make username unique
	$nameexists = true;
	$index = 1;
	$username = str_replace(' ', '-', $username);

	//cyrillic username
	$username = sanitize_user($username, true);
	if($username == '-'){
		$emailParts = explode('@', $profileData['email']);
		$username = $emailParts[0];
	}
	// Custom User Name
	if($userNameCustom != ''){
		$username = $userNameCustom;
	}
	$userName = $username;
	while($nameexists == true){
		if(username_exists($userName) != 0){
			$index++;
			$userName = $username.$index;
		}else{
			$nameexists = false;
		}
	}
	$username = $userName;
	$password = wp_generate_password();

	$userdata = array(
		'user_login' => $username,
		'user_pass' => $password,
		'user_nicename' => sanitize_user($firstName, true),
		'user_email' => $profileData['email'],
		'display_name' => $firstName,
		'nickname' => $firstName,
		'first_name' => $firstName,
		'last_name' => $lastName,
		'description' => isset($profileData['bio']) && $profileData['bio'] != '' ? $profileData['bio'] : '',
		'user_url' => $profileData['provider'] != 'facebook' && isset($profileData['link']) && $profileData['link'] != '' ? $profileData['link'] : '',
		'role' => get_option('default_role')
	);
	if(heateor_ss_is_plugin_active('theme-my-login/theme-my-login.php')){
		$tmlOptions = get_option('theme_my_login');
		$tmlLoginType = isset($tmlOptions['login_type']) ? $tmlOptions['login_type'] : '';
		if($tmlLoginType == 'email'){
			$userdata = array(
				'user_login' => $profileData['email'],
				'user_pass' => $password,
				'user_nicename' => $profileData['email'],
				'user_email' => $profileData['email'],
				'display_name' => $profileData['email'],
				'nickname' => $profileData['email'],
				'first_name' => $firstName,
				'last_name' => $lastName,
				'description' => isset($profileData['bio']) && $profileData['bio'] != '' ? $profileData['bio'] : '',
				'user_url' => $profileData['provider'] != 'facebook' && isset($profileData['link']) && $profileData['link'] != '' ? $profileData['link'] : '',
				'role' => get_option('default_role')
			);
		}
	}

	$userId = wp_insert_user($userdata);
	if(!is_wp_error($userId)){
		if(isset($profileData['id']) && $profileData['id'] != ''){
			update_user_meta($userId, 'thechamp_social_id', $profileData['id']);
		}
		if(isset($profileData['avatar']) && $profileData['avatar'] != ''){
			update_user_meta($userId, 'thechamp_avatar', $profileData['avatar']);
		}
		if(isset($profileData['large_avatar']) && $profileData['large_avatar'] != ''){
			update_user_meta($userId, 'thechamp_large_avatar', $profileData['large_avatar']);
		}
		if(!empty($profileData['provider'])){
			update_user_meta($userId, 'thechamp_provider', $profileData['provider']);
		}

		// send notification email
		heateor_ss_new_user_notification($userId);

		// insert profile data in BP XProfile table
		global $theChampLoginOptions;
		if(isset($theChampLoginOptions['xprofile_mapping']) && is_array($theChampLoginOptions['xprofile_mapping'])){
			foreach($theChampLoginOptions['xprofile_mapping'] as $key => $val){
				// save xprofile fields
				global $wpdb;
				$value = '';
				if(isset($profileData[$val])){
					$value = $profileData[$val];
				}
				if($value){
					$wpdb->insert(
						$wpdb -> prefix . 'bp_xprofile_data',
						array(
							'id' => NULL,
							'field_id' => $wpdb -> get_var( $wpdb -> prepare( "SELECT id FROM " . $wpdb -> prefix . "bp_xprofile_fields WHERE name = %s", $key) ),
							'user_id' => $userId,
							'value' => $value,
							'last_updated' => '',
						),
						array(
							'%d',
							'%d',
							'%d',
							'%s',
							'%s',
						)
					);
				}
			}
		}
		// hook - user successfully created
		do_action('the_champ_user_successfully_created', $userId, $userdata, $profileData);
		return $userId;
	}
	return false;
}

/**
 * Replace default avatar with social avatar
 */
function the_champ_social_avatar($avatar, $avuser, $size, $default, $alt = ''){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['enable']) && isset($theChampLoginOptions['avatar'])){
		if(isset($theChampLoginOptions['avatar_quality']) && $theChampLoginOptions['avatar_quality'] == 'better'){
			$avatarType = 'thechamp_large_avatar';
		}else{
			$avatarType = 'thechamp_avatar';
		}
		$userId = 0;
		if(is_numeric($avuser)){
			if($avuser > 0){
				$userId = $avuser;
			}
		}elseif(is_object($avuser)){
			if(property_exists($avuser, 'user_id') AND is_numeric($avuser->user_id)){
				$userId = $avuser->user_id;
			}
		}elseif(is_email($avuser)){
			$user = get_user_by('email', $avuser);
			$userId = isset($user->ID) ? $user->ID : 0;
		}

		if($avatarType == 'thechamp_large_avatar' && get_user_meta($userId, $avatarType, true) == ''){
			$avatarType = 'thechamp_avatar';
		}
		if(!empty($userId) && ($userAvatar = get_user_meta($userId, $avatarType, true)) !== false && strlen(trim($userAvatar)) > 0){
			return '<img alt="' . esc_attr($alt) . '" src="' . $userAvatar . '" class="avatar avatar-' . $size . ' " height="' . $size . '" width="' . $size . '" style="height:'. $size .'px;width:'. $size .'px" />';
		}
	}
	return $avatar;
}
add_filter('get_avatar', 'the_champ_social_avatar', 100000, 5);
add_filter('bp_core_fetch_avatar', 'the_champ_buddypress_avatar', 10, 2);

/**
 * Replace default avatar url with the url of social avatar
 */
function heateor_ss_social_avatar_url($url, $idOrEmail, $args){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['enable']) && isset($theChampLoginOptions['avatar'])){
		if(isset($theChampLoginOptions['avatar_quality']) && $theChampLoginOptions['avatar_quality'] == 'better'){
			$avatarType = 'thechamp_large_avatar';
		}else{
			$avatarType = 'thechamp_avatar';
		}
		$userId = 0;
		if(is_numeric($idOrEmail)){
			$user = get_userdata($idOrEmail);
			if($idOrEmail > 0){
				$userId = $idOrEmail;
			}
		}elseif(is_object($idOrEmail)){
			if(property_exists($idOrEmail, 'user_id') AND is_numeric($idOrEmail->user_id)){
				$userId = $idOrEmail->user_id;
			}
		}elseif(is_email($idOrEmail)){
			$user = get_user_by('email', $idOrEmail);
			$userId = isset($user->ID) ? $user->ID : 0;
		}

		if($avatarType == 'thechamp_large_avatar' && get_user_meta($userId, $avatarType, true) == ''){
			$avatarType = 'thechamp_avatar';
		}
		if(!empty($userId) && ($userAvatar = get_user_meta($userId, $avatarType, true)) !== false && strlen(trim($userAvatar)) > 0){
			return $userAvatar;
		}
	}
	return $url;
}
add_filter('get_avatar_url', 'heateor_ss_social_avatar_url', 10, 3);

/**
 * Enable social avatar in Buddypress
 */
function the_champ_buddypress_avatar($text, $args){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['enable']) && isset($theChampLoginOptions['avatar'])){
		if(is_array($args)){
			if(!empty($args['object']) && strtolower($args['object']) == 'user'){
				if(!empty($args['item_id']) && is_numeric($args['item_id'])){
					if(($userData = get_userdata($args['item_id'])) !== false){
						if(isset($theChampLoginOptions['avatar_quality']) && $theChampLoginOptions['avatar_quality'] == 'better'){
							$avatarType = 'thechamp_large_avatar';
						}else{
							$avatarType = 'thechamp_avatar';
						}
						if($avatarType == 'thechamp_large_avatar' && get_user_meta($args['item_id'], $avatarType, true) == ''){
							$avatarType = 'thechamp_avatar';
						}
						$avatar = '';
						if(($userAvatar = get_user_meta($args['item_id'], $avatarType, true)) !== false && strlen(trim($userAvatar)) > 0){
							$avatar = $userAvatar;
						}
						if($avatar != ""){
								$imgAlt = (!empty($args['alt']) ? 'alt="'.esc_attr($args['alt']).'" ' : '');
								$imgAlt = sprintf($imgAlt, htmlspecialchars($userData->user_login));
								$imgClass = ('class="'.(!empty ($args['class']) ? ($args['class'].' ') : '').'avatar-social-login" ');
								$imgWidth = (!empty ($args['width']) ? 'width="'.$args['width'].'" ' : 'width="50"');
								$imgHeight = (!empty ($args['height']) ? 'height="'.$args['height'].'" ' : 'height="50"');
								$text = preg_replace('#<img[^>]+>#i', '<img src="'.$avatar.'" '.$imgAlt.$imgClass.$imgHeight.$imgWidth.' style="float:left; margin-right:10px" />', $text);
						}
					}
				}
			}
		}
	}
	return $text;
}

/**
 * Format social profile data
 */
function the_champ_sanitize_profile_data($profileData, $provider){
	// echo "the_champ_sanitize_profile_data";
	$temp = array();
	if($provider == 'facebook'){
		$temp['id'] = isset($profileData['id']) ? sanitize_text_field($profileData['id']) : '';
	 	$temp['email'] = isset($profileData['email']) ? sanitize_email($profileData['email']) : '';
		$temp['name'] = isset($profileData['name']) ? $profileData['name'] : '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData['first_name']) ? $profileData['first_name'] : '';
		$temp['last_name'] = isset($profileData['last_name']) ? $profileData['last_name'] : '';
		$temp['bio'] = '';
		$temp['link'] = '';
		$temp['avatar'] = "//graph.facebook.com/" . $profileData['id'] . "/picture?type=square";
		$temp['large_avatar'] = "//graph.facebook.com/" . $profileData['id'] . "/picture?type=large";
	}elseif($provider == 'twitter'){
		$temp['id'] = isset($profileData -> id) ? sanitize_text_field($profileData -> id) : '';
	 	$temp['email'] = isset($profileData -> email) ? sanitize_email($profileData -> email) : '';
		$temp['name'] = isset($profileData -> name) ? $profileData -> name : '';
		$temp['username'] = isset($profileData -> screen_name) ? $profileData -> screen_name : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = isset($profileData -> description) ? sanitize_text_field($profileData -> description) : '';
		$temp['link'] = $temp['username'] != '' ? 'https://twitter.com/'.sanitize_user($temp['username']) : '';
		$temp['avatar'] = isset($profileData -> profile_image_url) && heateor_ss_validate_url($profileData -> profile_image_url) !== false ? trim($profileData -> profile_image_url) : '';
		$temp['large_avatar'] = $temp['avatar'] != '' ? str_replace('_normal', '', $temp['avatar']) : '';
	}elseif($provider == 'steam'){
		$temp['id'] = isset($profileData->steamid) ? sanitize_text_field($profileData->steamid) : '';
	 	$temp['email'] = '';
		$temp['name'] = isset($profileData->realname) ? $profileData->realname : '';
		$temp['username'] = isset($profileData->personaname) ? $profileData->personaname : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = '';
		$temp['link'] = isset($profileData->profileurl) ? $profileData->profileurl : '';
		$temp['avatar'] = isset($profileData->avatarmedium) && heateor_ss_validate_url($profileData->avatarmedium) !== false ? $profileData->avatarmedium : '';
		$temp['large_avatar'] = isset($profileData->avatarfull) && heateor_ss_validate_url($profileData->avatarfull) !== false ? $profileData->avatarfull : '';
	}elseif($provider == 'linkedin'){
		$temp['id'] = isset($profileData['id']) ? sanitize_text_field($profileData['id']) : '';
		$temp['email'] = isset($profileData['email']) ? sanitize_email($profileData['email']) : '';
		$temp['name'] = '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData['firstName']) ? $profileData['firstName'] : '';
		$temp['last_name'] = isset($profileData['lastName']) ? $profileData['lastName'] : '';
		$temp['bio'] = '';
		$temp['link'] = '';
		$temp['avatar'] = isset($profileData['smallAvatar']) && heateor_ss_validate_url($profileData['smallAvatar']) !== false ? trim($profileData['smallAvatar']) : '';
		$temp['large_avatar'] = isset($profileData['largeAvatar']) && heateor_ss_validate_url($profileData['largeAvatar']) !== false ? trim($profileData['largeAvatar']) : '';
	}elseif($provider == 'google'){
		$temp['id'] = isset($profileData->id) ? sanitize_text_field($profileData->id) : '';
		$temp['email'] = isset($profileData->email) ? sanitize_email($profileData->email) : '';
		$temp['name'] = isset($profileData->name) ? $profileData->name : '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData->givenName) ? $profileData->givenName : '';
		$temp['last_name'] = isset($profileData->familyName) ? $profileData->familyName : '';
		$temp['bio'] = '';
		$temp['link'] = isset($profileData->link) ? $profileData->link : '';
		$temp['large_avatar'] = isset($profileData->picture) && heateor_ss_validate_url($profileData->picture) !== false ? trim($profileData->picture) : '';
		$temp['avatar'] = $temp['large_avatar'] != '' ? $temp['large_avatar'] . '?sz=50' : '';
	}elseif($provider == 'vkontakte'){
		$temp['id'] = isset($profileData['id']) ? sanitize_text_field($profileData['id']) : '';
		$temp['email'] = '';
		$temp['name'] = '';
		$temp['username'] = isset($profileData['screen_name']) ? $profileData['screen_name'] : '';
		$temp['first_name'] = isset($profileData['first_name']) ? $profileData['first_name'] : '';
		$temp['last_name'] = isset($profileData['last_name']) ? $profileData['last_name'] : '';
		$temp['bio'] = '';
		$temp['link'] = $temp['id'] != '' ? 'https://vk.com/id' . $temp['id'] : '';
		$temp['avatar'] = isset($profileData['photo_rec']) && heateor_ss_validate_url($profileData['photo_rec']) !== false ? trim($profileData['photo_rec']) : '';
		$temp['large_avatar'] = isset($profileData['photo_big']) && heateor_ss_validate_url($profileData['photo_big']) !== false ? trim($profileData['photo_big']) : '';
	}elseif($provider == 'instagram'){
		$temp['id'] = isset($profileData -> id) ? sanitize_text_field($profileData -> id) : '';
		$temp['email'] = '';
		$temp['name'] = isset($profileData -> full_name) ? $profileData -> full_name : '';
		$temp['username'] = isset($profileData -> username) ? $profileData -> username : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = isset($profileData -> bio) ? sanitize_text_field($profileData -> bio) : '';
		$temp['link'] = isset($profileData -> website) && heateor_ss_validate_url($profileData -> website) !== false ? trim($profileData -> website) : '';
		$temp['avatar'] = isset($profileData -> profile_picture) && heateor_ss_validate_url($profileData -> profile_picture) !== false ? trim($profileData -> profile_picture) : '';
		$temp['large_avatar'] = '';
	}elseif($provider == 'unikname'){
		$temp['id'] = isset($profileData['id']) ? sanitize_text_field($profileData['id']) : '';
		$temp['email'] = isset($profileData['email']) ? sanitize_email($profileData['email']) : '';
		$temp['name'] = isset($profileData['name']) ? $profileData['name'] : '';
		$temp['username'] = isset($profileData['preferredUsername']) ? $profileData['preferredUsername'] : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = '';
		$temp['link'] ='';
		$temp['avatar'] = '';
		$temp['large_avatar'] = '';
	}
	if($provider != 'steam'){
		$temp['avatar'] = str_replace( 'http://', '//', $temp['avatar'] );
		$temp['large_avatar'] = str_replace( 'http://', '//', $temp['large_avatar'] );
	}
	$temp = apply_filters('the_champ_hook_format_profile_data', $temp, $profileData, $provider);
	$temp['name'] = isset($temp['name'][0]) && ctype_upper($temp['name'][0]) ? ucfirst(sanitize_user($temp['name'], true)) : sanitize_user($temp['name'], true);
	$temp['username'] = isset($temp['username'][0]) && ctype_upper($temp['username'][0]) ? ucfirst(sanitize_user($temp['username'], true)) : sanitize_user($temp['username'], true);
	$temp['first_name'] = isset($temp['first_name'][0]) && ctype_upper($temp['first_name'][0]) ? ucfirst(sanitize_user($temp['first_name'], true)) : sanitize_user($temp['first_name'], true);
	$temp['last_name'] = isset($temp['last_name'][0]) && ctype_upper($temp['last_name'][0]) ? ucfirst(sanitize_user($temp['last_name'], true)) : sanitize_user($temp['last_name'], true);
	$temp['provider'] = $provider;
	// echo var_dump($temp);
	return $temp;
}

/**
 * User authentication after Social Login
 */
function the_champ_user_auth($profileData, $provider = 'facebook', $twitterRedirect = ''){
	// echo "2z99";
	global $theChampLoginOptions, $user_ID;
	// authenticate user
	// check if Social ID exists in database
	if($profileData['id'] == ''){
		return array('status' => false, 'message' => '');
	}
	$existingUser = get_users('meta_key=thechamp_social_id&meta_value='.$profileData['id']);
	// login redirection url
	$loginUrl = '';
	if(isset($theChampLoginOptions['login_redirection']) && $theChampLoginOptions['login_redirection'] == 'bp_profile'){
		$loginUrl = 'bp';
	}
	// echo "3";
	if(count($existingUser) > 0){
		// echo "3a";
		// user exists in the database
		if(isset($existingUser[0] -> ID)){
			// echo "3a1";
			// check if account needs verification
			if(get_user_meta($existingUser[0] -> ID, 'thechamp_key', true) != ''){
				// echo "3a1a";
				if(!in_array($profileData['provider'], array('twitter', 'instagram', 'steam'))){
					if(is_user_logged_in()){
						wp_delete_user($existingUser[0] -> ID);
						the_champ_link_account($socialId, $provider, $user_ID);
						return array('status' => true, 'message' => 'linked');
					}else{
						return array('status' => false, 'message' => 'unverified');
					}
				}
				if(is_user_logged_in()){
					wp_delete_user($existingUser[0] -> ID);
					the_champ_link_account($profileData['id'], $profileData['provider'], $user_ID);
					the_champ_close_login_popup(admin_url() . '/profile.php');	//** may be BP profile/custom profile page/wp profile page
				}else{
					the_champ_close_login_popup(esc_url(home_url()).'?SuperSocializerUnverified=1');
				}
			}
			if(is_user_logged_in()){
				return array('status' => false, 'message' => 'not linked');
			}else{
				// hook to update profile data
				do_action('the_champ_hook_update_profile_data', $existingUser[0] -> ID, $profileData);
				// update Xprofile fields
				if(isset($theChampLoginOptions['xprofile_mapping']) && is_array($theChampLoginOptions['xprofile_mapping'])){
					foreach($theChampLoginOptions['xprofile_mapping'] as $key => $val){
						global $wpdb;
						$value = '';
						if(isset($profileData[$val])){
							$value = $profileData[$val];
						}
						if($value){
							$wpdb->update(
								$wpdb -> prefix . 'bp_xprofile_data',
								array(
									'value' => $value,
									'last_updated' => '',
								),
								array(
									'field_id' => $wpdb -> get_var( $wpdb -> prepare( "SELECT id FROM " . $wpdb -> prefix . "bp_xprofile_fields WHERE name = %s", $key) ),
									'user_id' => $existingUser[0] -> ID
								),
								array(
									'%s',
									'%s'
								),
								array(
									'%d',
									'%d'
								)
							);
						}
					}
				}
				$error = the_champ_login_user($existingUser[0] -> ID, $profileData, $profileData['id'], true);
				if(isset($error) && $error === 0){
					return array('status' => false, 'message' => 'inactive', 'url' => wp_login_url() . '?loggedout=true&hum=1');
				}elseif(get_user_meta($existingUser[0] -> ID, 'thechamp_social_registration', true)){
					// if logging in first time after email verification
					delete_user_meta($existingUser[0] -> ID, 'thechamp_social_registration');
					if(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'bp_profile'){
						return array('status' => true, 'message' => 'register', 'url' => bp_core_get_user_domain($existingUser[0] -> ID));
					}else{
						return array('status' => true, 'message' => 'register');
					}
				}
				return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($existingUser[0] -> ID) : ''));
			}
		}
	}else{
		// check if id in linked accounts
		global $wpdb;
		$existingUserId = $wpdb -> get_var('SELECT user_id FROM ' . $wpdb -> prefix . 'usermeta WHERE meta_key = "thechamp_linked_accounts" and meta_value LIKE "%'. $profileData['id'] .'%"');
		if($existingUserId){
			if(is_user_logged_in()){
				return array('status' => false, 'message' => 'not linked');
			}else{
				$error = the_champ_login_user($existingUserId, $profileData, $profileData['id'], true);
				if(isset($error) && $error === 0){
					return array('status' => false, 'message' => 'inactive', 'url' => wp_login_url() . '?loggedout=true&hum=1');
				}
				return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($existingUserId) : ''));
			}
		}
		// linking
		if(is_user_logged_in()){
			global $user_ID;
			$providerExists = $wpdb -> get_var('SELECT user_id FROM ' . $wpdb -> prefix . 'usermeta WHERE user_id = '. $user_ID .' and meta_key = "thechamp_linked_accounts" and meta_value LIKE "%'. $profileData['provider'] .'%"');
			if($providerExists){
				return array('status' => false, 'message' => 'provider exists');
			}else{
				the_champ_link_account($profileData['id'], $profileData['provider'], $user_ID);
				return array('status' => true, 'message' => 'linked');
			}
		}
		// if email is blank
		if(!isset($profileData['email']) || $profileData['email'] == ''){
			if(!isset($theChampLoginOptions['email_required']) || $theChampLoginOptions['email_required'] != 1){
				// generate dummy email
				//$profileData['email'] = $profileData['id'].'@'.$provider.'.com';
				$profileData['email'] = '';
			}else{
				// save temporary data
				if($twitterRedirect != ''){
					$profileData['twitter_redirect'] = $twitterRedirect;
				}
				$serializedProfileData = maybe_serialize($profileData);
				$uniqueId = mt_rand();
				update_user_meta($uniqueId, 'the_champ_temp_data', $serializedProfileData);
				the_champ_close_login_popup(esc_url(home_url()).'?SuperSocializerEmail=1&par='.$uniqueId);
			}
		}
		// check if email exists in database
		if(isset($profileData['email']) && $userId = email_exists($profileData['email'])){
			// email exists in WP DB
			$error = the_champ_login_user($userId, $profileData, isset($theChampLoginOptions['link_account']) ? $profileData['id'] : '', true);
			if(isset($error) && $error === 0){
				return array('status' => false, 'message' => 'inactive', 'url' => wp_login_url() . '?loggedout=true&hum=1');
			}
			if(isset($theChampLoginOptions['link_account'])){
				if(get_user_meta($userId, 'thechamp_social_id', true) == ''){
					update_user_meta($userId, 'thechamp_social_id', $profileData['id']);
					if(get_user_meta($userId, 'thechamp_provider', true) == ''){
						update_user_meta($userId, 'thechamp_provider', $profileData['provider']);
					}
				}else{
					the_champ_link_account($profileData['id'], $profileData['provider'], $userId);
				}
			}
			return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($userId) : ''));
		}
	}
	$customRedirection = apply_filters('the_champ_before_user_registration', '', $profileData);
	if($customRedirection){
		return $customRedirection;
	}
	do_action('the_champ_before_registration', $profileData);
	// register user
	$userId = the_champ_create_user($profileData);
	if($userId){
		$error = the_champ_login_user($userId, $profileData, $profileData['id'], false);
		if(isset($error) && $error === 0){
			return array('status' => false, 'message' => 'inactive', 'url' => wp_login_url() . '?loggedout=true&hum=1');
		}elseif(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'bp_profile'){
			return array('status' => true, 'message' => 'register', 'url' => bp_core_get_user_domain($userId));
		}else{
			return array('status' => true, 'message' => 'register');
		}
	}
	return array('status' => false, 'message' => '');
}

/**
 * Link Social Account
 */
function the_champ_link_account($socialId, $provider, $userId){
	$linkedAccounts = get_user_meta($userId, 'thechamp_linked_accounts', true);
	if($linkedAccounts){
		$linkedAccounts = maybe_unserialize($linkedAccounts);
	}else{
		$linkedAccounts = array();
	}
	$linkedAccounts[$provider] = $socialId;
	update_user_meta($userId, 'thechamp_linked_accounts', maybe_serialize($linkedAccounts));
}

/**
 * Ask email in a popup
 */
function the_champ_ask_email(){
 	include_once UNIKNAME_ABSPATH . 'templates/email_popup.php';
	die;
}
add_action('wp_ajax_nopriv_the_champ_ask_email', 'the_champ_ask_email');

/**
 * Save email submitted in popup
 */
function the_champ_save_email(){
	if(isset($_POST['elemId'])){
		$elementId = sanitize_text_field(trim($_POST['elemId']));
		if(isset($_POST['id']) && ($id = intval(trim($_POST['id']))) != ''){
			if($elementId == 'save'){
				global $theChampLoginOptions;
				$email 				= isset($_POST['email']) ? sanitize_email(trim($_POST['email'])) : '';
				$userNameCustom 	= isset($_POST['username']) ? trim($_POST['username']) : '';
				// validate email
				if(is_email($email) && !email_exists($email)){
					if(($tempData = get_user_meta($id, 'the_champ_temp_data', true)) != ''){
						delete_user_meta($id, 'the_champ_temp_data');
						// get temp data unserialized
						$tempData = maybe_unserialize($tempData);
						$tempData['email'] = $email;
						if(isset($theChampLoginOptions['email_verification']) && $theChampLoginOptions['email_verification'] == 1){
							$verify = true;
						}else{
							$verify = false;
						}
						$customRedirection = apply_filters('the_champ_before_user_registration', '', $tempData);
						if($customRedirection){
							the_champ_ajax_response($customRedirection);
						}
						do_action('the_champ_before_registration', $tempData);
						// create new user
						$userId = the_champ_create_user($tempData, $verify, $userNameCustom);
						if($userId && !$verify){
							// login user
							$tempData['askemail'] = 1;
							$error = the_champ_login_user($userId, $tempData, $tempData['id']);
							if(isset($error) && $error === 0){
								the_champ_ajax_response(array('status' => false, 'message' => 'inactive', 'url' => wp_login_url() . '?loggedout=true&hum=1'));
							}elseif(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'same' && isset($tempData['twitter_redirect'])){
								the_champ_ajax_response(array('status' => 1, 'message' => array('response' => 'success', 'url' => $tempData['twitter_redirect'])));
							}elseif(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'bp_profile'){
								the_champ_ajax_response(array('status' => 1, 'message' => array('response' => 'success', 'url' => bp_core_get_user_domain($userId))));
							}else{
								the_champ_ajax_response(array('status' => 1, 'message' => 'success'));
							}
						}elseif($userId && $verify){
							$verificationKey = $userId.time().mt_rand();
							update_user_meta($userId, 'thechamp_key', $verificationKey);
							update_user_meta($userId, 'thechamp_social_registration', 1);
							the_champ_send_verification_email($email, $verificationKey);
							the_champ_ajax_response(array('status' => 1, 'message' => 'verify'));
						}
					}
				}else{
					the_champ_ajax_response(array('status' => 0, 'message' => isset($theChampLoginOptions['email_error_message']) ? __($theChampLoginOptions['email_error_message'], 'super-socializer') : ''));
				}
			}
			// delete temporary data
			delete_user_meta($id, 'the_champ_temp_data');
			the_champ_ajax_response(array('status' => 1, 'message' => 'cancelled'));
		}
	}
	die;
}
add_action('wp_ajax_nopriv_the_champ_save_email', 'the_champ_save_email');

// Check User Name Exist
function unikname_check_username_exist(){
	if(isset($_POST['user_name']) && $_POST['user_name'] != ''){
		$userNameCheck 	= $_POST['user_name'];
		$statusExist 	= 0;
		if(username_exists($userNameCheck) > 0){
			$statusExist = 1;
		}
		the_champ_ajax_response(array('status' => 'done', 'user_name' => $statusExist));
	}
	die;
}
add_action('wp_ajax_nopriv_unikname_check_username_exist', 'unikname_check_username_exist');

// Check Email Exist
function unikname_check_email_exist(){
	if(isset($_POST['email']) && $_POST['email'] != ''){
		$userEmail 		= $_POST['email'];
		$statusExist 	= 0;
		if(is_email($userEmail) && email_exists($userEmail) > 0){
			$statusExist = 1;
		}
		the_champ_ajax_response(array('status' => 'done', 'email' => $statusExist));
	}
	die;
}
add_action('wp_ajax_nopriv_unikname_check_email_exist', 'unikname_check_email_exist');

/**
 * Send verification email to user.
 */
function the_champ_send_verification_email($receiverEmail, $verificationKey){
	$subject = "[".wp_specialchars_decode(trim(get_option('blogname')), ENT_QUOTES)."] " . __('Email Verification', 'unikname-connect');
	$url = esc_url(home_url())."?SuperSocializerKey=".$verificationKey;
	$message = __("Please click on the following link or paste it in browser to verify your email", 'super-socializer') . "\r\n" . $url;
	wp_mail($receiverEmail, $subject, $message);
}

/**
 * Prevent Social Login if registration is disabled
 */
function heateor_ss_disable_social_registration($profileData){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['disable_reg'])){
		$redirectionUrl = home_url();
		if(isset($theChampLoginOptions['disable_reg_redirect']) && $theChampLoginOptions['disable_reg_redirect'] != ''){
			$redirectionUrl = $theChampLoginOptions['disable_reg_redirect'];
		}
		the_champ_close_login_popup($redirectionUrl);
	}
}
add_action('the_champ_before_registration', 'heateor_ss_disable_social_registration', 10, 1);

/**
 * Send new user notification email
 */
function heateor_ss_new_user_notification($userId){
	global $theChampLoginOptions;
	$notificationType = '';
	if(isset($theChampLoginOptions['password_email'])){
		$notificationType = 'both';
	}elseif(isset($theChampLoginOptions['new_user_admin_email'])){
		$notificationType = 'admin';
	}
	if($notificationType){
		if(class_exists('WC_Emails') && $notificationType == 'both'){
			$wc_emails = WC_Emails::instance();
			$wc_emails->customer_new_account($userId);
			wp_new_user_notification($userId, null, 'admin');
		}else{
			wp_new_user_notification($userId, null, $notificationType);
		}
	}
}
