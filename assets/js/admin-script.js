/* Global variables and functions */
var unikNameJS = (function ($, window, undefined) {
    'use strict';

    function unik_name_basic_configuration(){
        $('#unikname_disable_reg_options').change(function() {
            if(this.checked){
                $('.unikname_disable_reg_options').css('display','block');
            }else{
                $('.unikname_disable_reg_options').css('display','none');
            }
        });
    }
    function unik_name_login_option(){
        $('input[name="the_champ_login[login_redirection]"]').change(function() {
            if(this.value == 'custom'){
                $('.unik-name-custom-url-login').css('display','block');
            }else{
                $('.unik-name-custom-url-login').css('display','none');
            }
        });  
        $('input[name="the_champ_login[register_redirection]"]').change(function() {
            if(this.value == 'custom'){
                $('.unik-name-custom-url-register').css('display','block');
            }else{
                $('.unik-name-custom-url-register').css('display','none');
            }
        });        
    };

    function unik_name_style_option(){
        
        // LOGIN BUTTON
        var buttonLogin = $('#unikname_button_login');
        // Change Color
        $('input[name="unik_name_style_button[login_color]"]').change(function() {
            if(this.value == 'blue') buttonLogin.find('.button-unikname-connect').css('background-color', '#0F2852');
            if(this.value == 'turquoise') buttonLogin.find('.button-unikname-connect').css('background-color', '#2B6BF3');
        }); 
        // Change Border Radius
        $('input[name="unik_name_style_button[login_border_radius]"]').change(function() {
            buttonLogin.find('.button-unikname-connect').css('border-radius', this.value+'px');
        }); 
        // Change Button Label
        $('select[name="unik_name_style_button[login_button_label]"]').change(function() {
            var optionSelected = $("option:selected", this);
           buttonLogin.find('.button-unikname-connect').find('label').html(optionSelected.html());
        }); 
        $('select[name="unik_name_style_button[login_button_title]"]').change(function() {
            var optionSelected = $("option:selected", this);
            buttonLogin.find('h6').html(optionSelected.html());
        }); 
        $('select[name="unik_name_style_button[login_button_description]"]').change(function() {
            var optionSelected = $("option:selected", this);
            buttonLogin.find('p').html(optionSelected.data('value'));
        });          
        // Change Alignment
        $('input[name="unik_name_style_button[login_button_alignment]"]').change(function() {
            console.log(this.value);
            if(this.value == 'left') buttonLogin.css('margin-right', 'auto').css('margin-left', '0');
            if(this.value == 'center') buttonLogin.css('margin-right', 'auto').css('margin-left', 'auto');
            if(this.value == 'right') buttonLogin.css('margin-right', '0').css('margin-left', 'auto');
        });         

        // REGISTER BUTTON
        var buttonRegister = $('#unikname_button_register');
        // Change Color
        $('input[name="unik_name_style_button[register_color]"]').change(function() {
            if(this.value == 'blue') buttonRegister.find('.button-unikname-connect').css('background-color', '#0F2852');
            if(this.value == 'turquoise') buttonRegister.find('.button-unikname-connect').css('background-color', '#2B6BF3');
        }); 
        // Change Border Radius
        $('input[name="unik_name_style_button[register_border_radius]"]').change(function() {
            buttonRegister.find('.button-unikname-connect').css('border-radius', this.value+'px');
        }); 
        // Change Button Label
        $('select[name="unik_name_style_button[register_button_label]"]').change(function() {
            var optionSelected = $("option:selected", this);
           buttonRegister.find('.button-unikname-connect').find('label').html(optionSelected.html());
        }); 
        $('select[name="unik_name_style_button[register_button_title]"]').change(function() {
            var optionSelected = $("option:selected", this);
            buttonRegister.find('h6').html(optionSelected.html());
        }); 
        $('select[name="unik_name_style_button[register_button_description]"]').change(function() {
            var optionSelected = $("option:selected", this);
            buttonRegister.find('p').html(optionSelected.data('value'));
        });
        // Change Alignment
        $('input[name="unik_name_style_button[register_button_alignment]"]').change(function() {
            console.log(this.value);
            if(this.value == 'left') buttonRegister.css('margin-right', 'auto').css('margin-left', '0');
            if(this.value == 'center') buttonRegister.css('margin-right', 'auto').css('margin-left', 'auto');
            if(this.value == 'right') buttonRegister.css('margin-right', '0').css('margin-left', 'auto');
        });         
  
    }
    return {
        init: function () {
            unik_name_basic_configuration();
            unik_name_login_option();
            unik_name_style_option();
        }
    };
}(jQuery, window));

jQuery(document).ready(function ($) {
    unikNameJS.init();
});