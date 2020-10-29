<?php
function unik_name_style_button_function( $old_value, $new_value ) {
	if ( $old_value['login_color_custom'] != $new_value['login_color_custom'] ) {
		$listColorOldLoginButton = get_option('_unik_name_color_button_login');
		if(!is_array($listColorOldLoginButton)){
			$listColorOldLoginButton 	= array();	
		}
		if( !in_array($old_value['login_color_custom'], $listColorOldLoginButton)){
			$listColorOldLoginButton[]  = $old_value['login_color_custom'];
			update_option('_unik_name_color_button_login', $listColorOldLoginButton);			
		}
	}
}
add_action( 'update_option_unik_name_style_button', 'unik_name_style_button_function', 10, 2 );