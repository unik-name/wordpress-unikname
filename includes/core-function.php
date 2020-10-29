<?php
function unik_name_style_button_function( $old_value, $new_value ) {
	if ( $old_value['login_color_custom'] != $new_value['login_color_custom'] ) {
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

	if ( $old_value['register_color_custom'] != $new_value['register_color_custom'] ) {
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
	if ( $old_value['email_main_color'] != $new_value['email_main_color'] ) {
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