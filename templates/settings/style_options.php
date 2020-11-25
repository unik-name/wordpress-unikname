<?php
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
        '1' => __('🔐 The next-gen identifier: simple, secure and private. <a href=" https://my.unikname.app/#pk_campaign=installation&pk_source=login&pk_medium=punch&pk_content=nextgen">Read more.</a>','unikname-connect'),
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
        '1' => __('🔐 The next-gen identifier: simple, secure and private. <a href=" https://my.unikname.app/#pk_campaign=installation&pk_source=signup&pk_medium=punch&pk_content=nextgen">Read more.</a>','unikname-connect'),
        '2' => __('🔐 The next-gen identifier: simple, secure and private.','unikname-connect')
    );
?>
<div class="column-2">
	<div class="unik-style-button-container">
		<h5><?=__('Login button','unikname-connect')?></h5>
		<div class="unikname-button-preview-container ">
			<div class="button-preview <?php echo isset($unikNameStyleButtonOptions['login_button_alignment']) ? $unikNameStyleButtonOptions['login_button_alignment'] : 'left';?>" id="unikname_button_login">
				<h6><?php echo isset($unikNameStyleButtonOptions['login_button_title']) ? $buttonLoginTitle[$unikNameStyleButtonOptions['login_button_title']] : $buttonLoginTitle['1'];?></h6>
				<div class="button-unikname-connect">
					<img src="<?=UNIKNAME_DIR_URL.'assets/images/icon-unikname.svg'?>" alt="<?=__('icon unik name')?>">
					<label><?php echo isset($unikNameStyleButtonOptions['login_button_label']) ? $buttonLoginLabel[$unikNameStyleButtonOptions['login_button_label']] : $buttonLoginLabel['1'];?></label>
				</div>
				<p><?php echo isset($unikNameStyleButtonOptions['login_button_description']) ? $subTitleLogin[$unikNameStyleButtonOptions['login_button_description']] : $subTitleLogin['1'];?></p>
			</div>
		</div>
		<?php
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
		?>
		<style type="text/css">
			#unikname_button_login .button-unikname-connect{
				background-color: <?php echo  $bgRegister; ?>;
				border-radius: <?php echo isset($unikNameStyleButtonOptions['login_border_radius']) ? $unikNameStyleButtonOptions['login_border_radius'].'px' : '30px' ?>;
			}
		</style>
		<div class="button-custom-style">
			<div class="item type-radio-color">
				<label class="name"><?=__('Color','unikname-connect')?></label>
				<div class="item-radio-color">
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_color]" <?php echo !isset($unikNameStyleButtonOptions['login_color']) || $unikNameStyleButtonOptions['login_color'] == 'blue' ? 'checked = "checked"' : '';?> value="blue">
						<span class="checkmark blue"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_color]" <?php echo !isset($unikNameStyleButtonOptions['login_color']) || $unikNameStyleButtonOptions['login_color'] == 'turquoise' ? 'checked = "checked"' : '';?> value="turquoise">
						<span class="checkmark turquoise"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_color]" <?php echo !isset($unikNameStyleButtonOptions['login_color']) || $unikNameStyleButtonOptions['login_color'] == 'custom' ? 'checked = "checked"' : '';?> value="custom">
						<span class="checkmark custom"></span>
					</label>
				</div>
			</div>
			<div class="item type-color-picker unikname-custom-color unikname-login-custom-color"  <?php echo !isset($unikNameStyleButtonOptions['login_color']) || $unikNameStyleButtonOptions['login_color'] == 'custom' ? 'style="display: block;"' : '';?>>
				<label class="name"><?=__('Custom Color','unikname-connect')?></label>
				<div class="item-color">
					<input type="text" name="unik_name_style_button[login_color_custom]" value="<?php echo isset($unikNameStyleButtonOptions['login_color_custom']) ? $unikNameStyleButtonOptions['login_color_custom'] : '#0F2852' ?>" class="waiel-color-picker" />		
				</div>
			</div>
			<div class="item type-number-radius">
				<label class="name"><?=__('Border radius','unikname-connect')?></label>
				<div class="item-number-radius">
					<input type="number" name="unik_name_style_button[login_border_radius]" value="<?php echo isset($unikNameStyleButtonOptions['login_border_radius']) ? $unikNameStyleButtonOptions['login_border_radius'] : '30' ?>"/>
				</div>
			</div>
			<div class="item type-radio-alignment">
				<label class="name"><?=__('Alignment','unikname-connect')?></label>
				<div class="item-radio-alignment">
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['login_button_alignment']) || $unikNameStyleButtonOptions['login_button_alignment'] == 'left' ? 'checked = "checked"' : '';?> value="left">
						<span class="checkmark-alignment left"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['login_button_alignment']) || $unikNameStyleButtonOptions['login_button_alignment'] == 'center' ? 'checked = "checked"' : '';?> value="center">
						<span class="checkmark-alignment center"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[login_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['login_button_alignment']) || $unikNameStyleButtonOptions['login_button_alignment'] == 'right' ? 'checked = "checked"' : '';?> value="right">
						<span class="checkmark-alignment right"></span>
					</label>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button title','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[login_button_title]">
						<?php foreach ($buttonLoginTitle as $key => $value) { ?>
							<option <?php echo !isset($unikNameStyleButtonOptions['login_button_title']) || $unikNameStyleButtonOptions['login_button_title'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button label','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[login_button_label]">
						<?php foreach ($buttonLoginLabel as $key => $value) { ?>
							<option <?php echo !isset($unikNameStyleButtonOptions['login_button_label']) || $unikNameStyleButtonOptions['login_button_label'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button description','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[login_button_description]">
						<?php foreach ($subTitleLogin as $key => $value) { ?>
							<option data-value='<?=$value?>' <?php echo !isset($unikNameStyleButtonOptions['login_button_description']) || $unikNameStyleButtonOptions['login_button_description'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
					<p><?=__('Read more link: ','unikname-connect')?> <a href=" https://my.unikname.app/#pk_campaign=installation&pk_source=login&pk_medium=punch&pk_content=nextgen"><?=__('Read more','unikname-connect')?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="column-2">
	<div class="unik-style-button-container">
		<h5 class="title-register"><?=__('Register button','unikname-connect')?></h5>
		<div class="unikname-button-preview-container">
			<div class="button-preview <?php echo isset($unikNameStyleButtonOptions['login_button_alignment']) ? $unikNameStyleButtonOptions['register_button_alignment'] : 'left';?>" id="unikname_button_register">
				<h6><?php echo isset($unikNameStyleButtonOptions['register_button_title']) ? $buttonRegisterTitle[$unikNameStyleButtonOptions['register_button_title']] : $buttonRegisterTitle['1'];?></h6>
				<div class="button-unikname-connect">
					<img src="<?=UNIKNAME_DIR_URL.'assets/images/icon-unikname.svg'?>" alt="<?=__('icon unik name','unikname-connect')?>">
					<label><?php echo isset($unikNameStyleButtonOptions['register_button_label']) ? $buttonRegisterLabel[$unikNameStyleButtonOptions['register_button_label']] : $buttonRegisterLabel['1'];?></label>
				</div>
				<p><?php echo isset($unikNameStyleButtonOptions['register_button_description']) ? $subTitleRegister[$unikNameStyleButtonOptions['register_button_description']] : $subTitleRegister['1'];?></p>
			</div>
		</div>
		<?php
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
		?>
		<style type="text/css">
			#unikname_button_register .button-unikname-connect{
				background-color: <?php echo $bgRegister;?>;
				border-radius: <?php echo isset($unikNameStyleButtonOptions['register_border_radius']) ? $unikNameStyleButtonOptions['register_border_radius'].'px' : '30px' ?>;
			}
		</style>
		<div class="button-custom-style">
			<div class="item type-radio-color">
				<label class="name"><?=__('Color','unikname-connect')?></label>
				<div class="item-radio-color">
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_color]" <?php echo !isset($unikNameStyleButtonOptions['register_color']) || $unikNameStyleButtonOptions['register_color'] == 'blue' ? 'checked = "checked"' : '';?> value="blue">
						<span class="checkmark blue"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_color]" <?php echo !isset($unikNameStyleButtonOptions['register_color']) || $unikNameStyleButtonOptions['register_color'] == 'turquoise' ? 'checked = "checked"' : '';?> value="turquoise">
						<span class="checkmark turquoise"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_color]" <?php echo !isset($unikNameStyleButtonOptions['register_color']) || $unikNameStyleButtonOptions['register_color'] == 'custom' ? 'checked = "checked"' : '';?> value="custom">
						<span class="checkmark custom"></span>
					</label>
				</div>
			</div>
			<div class="item type-color-picker unikname-custom-color unikname-register-custom-color"  <?php echo !isset($unikNameStyleButtonOptions['register_color']) || $unikNameStyleButtonOptions['register_color'] == 'custom' ? 'style="display: block;"' : '';?>>
				<label class="name"><?=__('Custom Color','unikname-connect')?></label>
				<div class="item-color">
					<input type="text" name="unik_name_style_button[register_color_custom]" value="<?php echo isset($unikNameStyleButtonOptions['register_color_custom']) ? $unikNameStyleButtonOptions['register_color_custom'] : '#0F2852' ?>" class="waiel-color-picker" />		
				</div>
			</div>
			<div class="item type-number-radius">
				<label class="name"><?=__('Border radius','unikname-connect')?></label>
				<div class="item-number-radius">
					<input type="number" name="unik_name_style_button[register_border_radius]" value="<?php echo isset($unikNameStyleButtonOptions['register_border_radius']) ? $unikNameStyleButtonOptions['register_border_radius'] : '30' ?>"/>
				</div>
			</div>
			<div class="item type-radio-alignment">
				<label class="name"><?=__('Alignment','unikname-connect')?></label>
				<div class="item-radio-alignment">
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['register_button_alignment']) || $unikNameStyleButtonOptions['register_button_alignment'] == 'left' ? 'checked = "checked"' : '';?> value="left">
						<span class="checkmark-alignment left"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['register_button_alignment']) || $unikNameStyleButtonOptions['register_button_alignment'] == 'center' ? 'checked = "checked"' : '';?> value="center">
						<span class="checkmark-alignment center"></span>
					</label>
					<label class="container">
						<input type="radio" name="unik_name_style_button[register_button_alignment]" <?php echo !isset($unikNameStyleButtonOptions['register_button_alignment']) || $unikNameStyleButtonOptions['register_button_alignment'] == 'right' ? 'checked = "checked"' : '';?> value="right">
						<span class="checkmark-alignment right"></span>
					</label>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button title','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[register_button_title]">
						<?php foreach ($buttonRegisterTitle as $key => $value) { ?>
							<option <?php echo !isset($unikNameStyleButtonOptions['register_button_title']) || $unikNameStyleButtonOptions['register_button_title'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button label','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[register_button_label]">
						<?php foreach ($buttonRegisterLabel as $key => $value) { ?>
							<option <?php echo !isset($unikNameStyleButtonOptions['register_button_label']) || $unikNameStyleButtonOptions['register_button_label'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button description','unikname-connect')?></label>
				<div class="item-select">
					<select name="unik_name_style_button[register_button_description]">
						<?php foreach ($subTitleRegister as $key => $value) { ?>
							<option data-value='<?=$value?>' <?php echo !isset($unikNameStyleButtonOptions['register_button_description']) || $unikNameStyleButtonOptions['register_button_description'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
					<p><?=__('Read more link: ','unikname-connect')?> <a href=" https://my.unikname.app/#pk_campaign=installation&pk_source=signup&pk_medium=punch&pk_content=nextgen"><?=__('Read more','unikname-connect')?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$listColorOldLoginButton = array();
	if(get_option('_unik_name_color_button_login')){
		$listColorOldLoginButton = get_option('_unik_name_color_button_login');
		if(is_array($listColorOldLoginButton)){
			$listColorOldLoginButton = array_reverse($listColorOldLoginButton);
		}
	}
	$arrayOld 				 = array();
	$arrayDefault 			 = array('#ffffff', '#000000','#dd3333', '#dd9933','#eeee22');
	for($i = 0; $i < 5; $i++){
		if(array_key_exists($i, $listColorOldLoginButton)){
			$arrayOld[$i] 	= $listColorOldLoginButton[$i];
		}else{
			$arrayOld[$i] 	= $arrayDefault[$i];
		}
	}
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		var myOptions = {
		    defaultColor: '#0F2852',
		    change: function(event, ui){
		    	var theColor = ui.color.toString();
		    	$('#unikname_button_login').find('.button-unikname-connect').css('background-color', theColor);
		    },
		    // a callback to fire when the input is emptied or an invalid color
		    clear: function() {},
		    hide: true,
		    palettes: <?=json_encode($arrayOld);?>
		};
		$('.unikname-login-custom-color .waiel-color-picker').wpColorPicker(myOptions);

		var myOptionsRegister = {
		    defaultColor: '#0F2852',
		    change: function(event, ui){
		    	var theColor = ui.color.toString();
		    	$('#unikname_button_register').find('.button-unikname-connect').css('background-color', theColor);
		    },
		    // a callback to fire when the input is emptied or an invalid color
		    clear: function() {},
		    hide: true,
		    palettes: <?=json_encode($arrayOld);?>
		};
		$('.unikname-register-custom-color .waiel-color-picker').wpColorPicker(myOptionsRegister);
	});
</script>