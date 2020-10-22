<?php
	global $theChampLoginOptions;
	$buttonStyle 		= isset($theChampLoginOptions['email_button_style']) ? $theChampLoginOptions['email_button_style'] : 'standard';
?>
<div class="unik-name-popup-email">
	<div class="unikname-list-content-step">
		<div class="unikname-item-step active">
			<?php

				$imgURL 	 = UNIKNAME_DIR_URL.'assets/images/default-email-logo.png';

				if(isset($theChampLoginOptions['email_logo']) && $theChampLoginOptions['email_logo'] != ''){
					$imgURL  = $theChampLoginOptions['email_logo'];
				}
			?>
			<img class="email-logo" src="<?=$imgURL?>" alt="Logo">
			<h4><?=__('Welcome to ','unikname-connect')?> <?=get_bloginfo( 'name' )?></h4>
			<div class="description">
				<p><?=__('Your account must be set up before using it.','unikname-connect')?></p>
				<p><?=__('Let’s go!','unikname-connect')?></p>
			</div>
			<div class="btn-button-action <?=$buttonStyle?>">
				<button type="button" data-step="1" class="unikname-btn-next-step"> <?php _e('Next', 'unikname-connect') ?></button>
			</div>
		</div>	
		<div class="unikname-item-step">
			<h3><?=__('Contact','unikname-connect')?></h3>
			<div class="sub-description">
				<?=__('This email is used to communicate with you','unikname-connect')?>
			</div>
			<div id="unikname_the_champ_error"></div>
			<div class="email-input">
				<label><?php _e('Your email', 'unikname-connect') ?></label>
				<input placeholder="<?php _e('Your email', 'unikname-connect') ?>" type="text" id="the_champ_email" />
			</div>
			<div class="email-input">
				<label><?php _e('Confirm your email', 'unikname-connect') ?></label>
				<input placeholder="<?php _e('Confirm your email', 'unikname-connect') ?>" type="text" id="the_champ_confirm_email" />
			</div>
			<div class="btn-button-action <?=$buttonStyle?>">
				<button type="button" data-step="2" class="unikname-btn-next-step"> <?php _e('Next', 'unikname-connect') ?></button>
			</div>
		</div>
		<div class="unikname-item-step">
			<h3><?=__('Username','unikname-connect')?></h3>
			<div id="the_champ_error"></div>
			<div class="email-input">
				<label><?php _e('Your username', 'unikname-connect') ?></label>
				<input placeholder="<?php _e('Your username', 'unikname-connect') ?>" type="text" id="the_champ_user_name" />
			</div>	
			<div class="btn-button-action <?=$buttonStyle?>">
				<button type="button" data-step="3" id="save" onclick="the_champ_save_email(this)"> <?php _e('Finish', 'unikname-connect') ?></button>
			</div>		
		</div>		
	</div>
	<div class="unikname-session-navigation">
		<ul class="unikname-list-step">		
			<li class="active original-active"><span></span></li>
			<li><span></span></li>
			<li><span></span></li>
		</ul>
	</div>
</div>
<?php
	$mainColor 			= isset($theChampLoginOptions['email_main_color']) ? $theChampLoginOptions['email_main_color'] : '#0F2852';
	$buttonBorderRadius = isset($theChampLoginOptions['email_button_border_radius']) ? $theChampLoginOptions['email_button_border_radius'].'px' : '0px';
?>
<style type="text/css">
	.unik-name-popup-email .unikname-session-navigation ul.unikname-list-step li.active span{
		background-color: <?=$mainColor?> !important;
	}
	.unik-name-popup-email .unikname-list-content-step .unikname-item-step .btn-button-action.standard button{
		color: #fff !important;
		background-color: <?=$mainColor?> !important; 
		border-color: <?=$mainColor?> !important;
		border-radius: <?=$buttonBorderRadius?> !important;
		border: 1px solid;
	}
	.unik-name-popup-email .unikname-list-content-step .unikname-item-step .btn-button-action.outline button{
		color: <?=$mainColor?> !important;
		background-color: #fff !important; 
		border-color: <?=$mainColor?> !important;
		border-radius: <?=$buttonBorderRadius?> !important;
		border: 1px solid;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		function unikname_nextStep(thisSelect){
			$('.unikname-list-content-step .unikname-item-step').removeClass('active').eq(thisSelect.index()).addClass('active');
			$('.unikname-list-step li').removeClass('original-active');
	        thisSelect.addClass('active original-active');
			thisSelect.prevAll().addClass('active');
			thisSelect.nextAll().removeClass('active');	
		}

		function uniknameValidateEmail(email) {
		    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(String(email).toLowerCase());
		}

		$('.unikname-btn-next-step').click(function(event) {
			var $stepCurrent 	= $(this).data('step');
			if($stepCurrent == 2){
				var email 		= document.getElementById("the_champ_email").value.trim(),
					confimEmail = document.getElementById("the_champ_confirm_email").value.trim();
				if(!uniknameValidateEmail(email)){
					$('#unikname_the_champ_error').html('<?=__('Email is not in the correct format!','unikname-connect')?>');
				}else if(email == '' || confimEmail == ''){
					$('#unikname_the_champ_error').html('<?=__('Email field is required!','unikname-connect')?>');
				}else if(email !=  confimEmail){
					$('#unikname_the_champ_error').html('<?=__('Email addresses do not match!','unikname-connect')?>');
				}else{
					jQuery.ajax({
						type: "POST",
						dataType: "json",
						url: theChampAjaxUrl,
						data: {
							action: "unikname_check_email_exist",
							email: email,
						},
					    beforeSend: function() {
					        // setting a timeout
					        $('#TB_window').addClass('loadding');
					    },
						success: function (e) {
							if(e.email == 1){
								jQuery('#unikname_the_champ_error').html('<?=__('Email already exists.','unikname-connect')?>');
							}else{
								jQuery('#unikname_the_champ_error').html('');
								var res = email.split("@");
								$('#the_champ_user_name').val(res[0]);
								if( !$('.unikname-list-step li').last().hasClass('original-active')){
									var nextStep1 = $('.unikname-list-step li.original-active').next();
									unikname_nextStep(nextStep1);
								}				
							}
							$('#TB_window').removeClass('loadding');
						},
					});
				
				}
			}else{
				if( !$('.unikname-list-step li').last().hasClass('original-active')){
					var nextStep1 = $('.unikname-list-step li.original-active').next();
					unikname_nextStep(nextStep1);
				}				
			}
		});	
	});
</script>