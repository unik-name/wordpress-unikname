<?php
function unik_name_style_button_function( $old_value, $new_value ) {
	if ( isset($old_value['login_color_custom']) && isset($new_value['login_color_custom']) && ($old_value['login_color_custom'] != $new_value['login_color_custom']) ) {
		$listColorOldLoginButton = get_option('_unik_name_color_button_login');

		if(!is_array($listColorOldLoginButton)){
			$listColorOldLoginButton 	= array();	
		}
		if(end($listColorOldLoginButton) != $new_value['login_color_custom']){
			$listColorOldLoginButton 		= array_diff($listColorOldLoginButton, array($new_value['login_color_custom']));
			$listColorOldLoginButton[]  	= $new_value['login_color_custom'];
			update_option('_unik_name_color_button_login', $listColorOldLoginButton);		
		}

	}

	if ( isset($old_value['register_color_custom']) && isset($new_value['register_color_custom']) && ($old_value['register_color_custom'] != $new_value['register_color_custom']) ) {
		$listColorOldLoginButton = get_option('_unik_name_color_button_login');
		if(!is_array($listColorOldLoginButton)){
			$listColorOldLoginButton 	= array();	
		}
		if(end($listColorOldLoginButton) != $new_value['register_color_custom']){
			$listColorOldLoginButton 		= array_diff($listColorOldLoginButton, array($new_value['register_color_custom']));
			$listColorOldLoginButton[]  	= $new_value['register_color_custom'];
			update_option('_unik_name_color_button_login', $listColorOldLoginButton);		
		}
	}
}
add_action( 'update_option_unik_name_style_button', 'unik_name_style_button_function', 10, 2 );

function unik_name_style_email_option_function($old_value, $new_value){
	if ( isset($old_value['email_main_color']) && isset($new_value['email_main_color']) && ($old_value['email_main_color'] != $new_value['email_main_color']) ) {
		$listColorOldLoginButton = get_option('_unik_name_color_button_login');
		if(!is_array($listColorOldLoginButton)){
			$listColorOldLoginButton 	= array();	
		}
		if(end($listColorOldLoginButton) != $new_value['email_main_color']){
			$listColorOldLoginButton 		= array_diff($listColorOldLoginButton, array($new_value['email_main_color']));
			$listColorOldLoginButton[]  	= $new_value['email_main_color'];
			update_option('_unik_name_color_button_login', $listColorOldLoginButton);		
		}
	}
}
add_action( 'update_option_the_champ_login', 'unik_name_style_email_option_function', 10, 2 );

function unik_name_check_validation_login($user, $password) {
	$userID = $user->ID;

	// Check All Site
	$unikNameSecurity 			= get_option('unik_name_security');

	if(is_array($unikNameSecurity) && isset($unikNameSecurity['disable_connect_pass']) && $unikNameSecurity['disable_connect_pass'] == 1 && ((isset($_POST['pwd']) && isset($_POST['log'])) || (isset($_POST['username']) && isset($_POST['password']))) ){
		
		// Disable authentication by password for all users of my website
		$errors = new WP_Error();
		$errors->add('title_error', __('<strong>ERROR</strong>: Connection error', 'unikname-connect'));
		return $errors;
	}

	// Check Login With User Role
	if(is_array($unikNameSecurity) && isset($unikNameSecurity['roles_disable_connect_pass']) && $unikNameSecurity['roles_disable_connect_pass'] == 1 && ((isset($_POST['pwd']) && isset($_POST['log'])) || (isset($_POST['username']) && isset($_POST['password']))) ){
		$roleDisable 	= array();
		if(isset($unikNameSecurity['roles_user_disable']) && is_array($unikNameSecurity['roles_user_disable'])){
			$roleDisable 	= $unikNameSecurity['roles_user_disable'];
		}
		$roleLogin 	= 	$user->roles['0'];
		if(in_array($roleLogin, $roleDisable)){
			$errors = new WP_Error();
			$errors->add('title_error', __('<strong>ERROR</strong>: Connection error', 'unikname-connect'));
			return $errors;
		}
	}

	if( get_the_author_meta('_connection_autorizations', $userID) && get_the_author_meta('_connection_autorizations', $userID) == 1 && ((isset($_POST['pwd']) && isset($_POST['log'])) || (isset($_POST['username']) && isset($_POST['password']))) ){
		// Disable with User
		$errors = new WP_Error();
		$errors->add('title_error', __('<strong>ERROR</strong> Connection error', 'unikname-connect'));
		return $errors;
	}
    return $user;
}

add_action('wp_authenticate_user', 'unik_name_check_validation_login', 10, 2);
 
add_filter( 'body_class','unik_name_disable_authentication_password_body_classes' );
add_filter( 'login_body_class','unik_name_disable_authentication_password_body_classes' );
function unik_name_disable_authentication_password_body_classes( $classes ) {
 
	// Check All Site
	$unikNameSecurity 			= get_option('unik_name_security'); 
	if(is_array($unikNameSecurity) && isset($unikNameSecurity['disable_connect_pass']) && $unikNameSecurity['disable_connect_pass'] == 1){
		$classes[] = 'disable-authentication-password';
	}

    return $classes;
}

function unik_name_disable_form_login_style() { ?>
	<?php 	// Check All Site
		$unikNameSecurity 			= get_option('unik_name_security'); 
		if(is_array($unikNameSecurity) && isset($unikNameSecurity['disable_connect_pass']) && $unikNameSecurity['disable_connect_pass'] == 1){ ?>
		    <style type="text/css">
				.disable-authentication-password #loginform input[name=log], .disable-authentication-password #loginform input[name=pwd]{
					pointer-events: none;
					background-color: #e8e8e8;
				}
		    </style>
		    <script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function(event) {
					document.getElementById("user_login").disabled = true;
					document.getElementById("user_pass").disabled = true;
				});
		    </script>
	<?php } // Endif; ?>
<?php }
add_action( 'login_enqueue_scripts', 'unik_name_disable_form_login_style' );

add_action( 'wp_footer', 'unik_name_disable_form_login_style_frontend' );
function unik_name_disable_form_login_style_frontend(){
	?>
	    <script type="text/javascript">
			jQuery( document ).ready(function($){
			    $('.disable-authentication-password .woocommerce-form input[name=username]').attr("disabled", 'disabled');
			    $('.disable-authentication-password .woocommerce-form input[name=password]').attr("disabled", 'disabled');
			    $('.disable-authentication-password .woocommerce-form button[name=login').prop('disabled', true);
			});
	    </script>
	<?php
}