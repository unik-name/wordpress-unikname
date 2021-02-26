<?php
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

    // Button Link Account
    $buttonLinkTitle = array(
        '1' => __('🔐 Link your @unikname to login to your account at this website','unikname-connect'),
    );
    $buttonLinkLabel = array(
        '1' => __('with your @unikname','unikname-connect'),
    ); 
    $buttonLinkDes   = array(
        '1' => __('🔐 The next-gen identifier: simple, secure and private. <a href="https://www.unikname.com/my-unikname-app/#pk_campaign=installation&pk_source=login&pk_medium=punch&pk_content=nextgen">Read more.</a>','unikname-connect'),
        '2' => __('🔐 The next-gen identifier: simple, secure and private.','unikname-connect')
    );
    
    add_action('init', 'unikname_default_value_style', 1);
    function unikname_default_value_style(){
    	if( !get_option('unik_name_style_button') ){
            $styleDefault = array(
                'login_color'                   => 'blue',
                'login_border_radius'           => '30',
                'login_button_alignment'        => 'left',
                'login_button_title'            => '1',
                'login_button_label'            => '1',
                'login_button_description'      => '1',
                'register_color'                => 'blue',
                'register_border_radius'        => '30',
                'register_button_alignment'     => 'left',
                'register_button_title'         => '1',
                'register_button_label'         => '1',
                'register_button_description'   => '1',
            );
            update_option('unik_name_style_button', $styleDefault);
    	}

        if( !get_option('unik_name_security') ){
            $securityDefault = array(
                'disable_connect_pass'          => ''
            );
            update_option('unik_name_security', $securityDefault);
        }
    }
?>