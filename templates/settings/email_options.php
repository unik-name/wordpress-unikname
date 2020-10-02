<div class="column-2">
	<div class="content-column">
		<div class="item type-checkbox">
			<label class="name"><?=__('Email required','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="unikname_login_email_required" name="the_champ_login[email_required]" <?php echo isset($theChampLoginOptions['email_required']) ? 'checked = "checked"' : '';?> value="1" />
				<label for="unikname_login_email_required"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-checkbox">
			<label class="name"><?=__('Send post-registration email to user to set account password','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="unikname_password_email" name="the_champ_login[password_email]" <?php echo isset($theChampLoginOptions['password_email']) ? 'checked = "checked"' : '';?> value="1" />
				<label for="unikname_password_email"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-checkbox">
			<label class="name"><?=__('Send new user registration notification email to admin','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="unikname_sl_postreg_admin_email" name="the_champ_login[new_user_admin_email]" <?php echo isset($theChampLoginOptions['new_user_admin_email']) ? 'checked = "checked"' : '';?> value="1" />
				<label for="unikname_sl_postreg_admin_email"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>

		<div class="unilname-email-popup-option">
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable email verification','unikname-connect')?></label>
				<div class="item-checkbox">
					<input id="unikname_password_email_verification" name="the_champ_login[email_verification]" type="checkbox" <?php echo isset($theChampLoginOptions['email_verification']) ? 'checked = "checked"' : '';?> value="1" />
					<label for="unikname_password_email_verification"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="column-2">
	<div class="content-column">
		<div class="item type-image-upload">
			<label class="name"><?=__('Logo','unikname-connect')?></label>
			<div class="item-checkbox">
				<?php
					$imgURL 	 = UNIKNAME_DIR_URL.'assets/images/default-email-logo.png';
					if(isset($theChampLoginOptions['email_logo']) && $theChampLoginOptions['email_logo'] != ''){
						$imgURL  = $theChampLoginOptions['email_logo'];
					}
				?>
			    <img src="<?=$imgURL?>" class="image-display-url">
			    <input type="text" name="the_champ_login[email_logo]" id="waiel_image_url" value="" style="display: none;">
				<a class="waiel-upload-btn">	
					<img src="<?=UNIKNAME_DIR_URL.'assets/images/icon-upload.png';?>">
				</a>		
			</div>
		</div>
		<div class="item type-color-picker">
			<label class="name"><?=__('Main color','unikname-connect')?></label>
			<div class="item-color">
				<input type="text" name="the_champ_login[email_main_color]" value="<?php echo isset($theChampLoginOptions['email_main_color']) ? $theChampLoginOptions['email_main_color'] : '#0F2852' ?>" class="waiel-color-picker" />		
			</div>
		</div>
		<div class="item type-radio">
			<label class="name"><?=__('Button style','unikname-connect')?></label>
			<div class="item-radio">
				<label class="container"><?=__('Standard', 'unikname-connect')?>
					<input type="radio" name="the_champ_login[email_button_style]" <?php echo !isset($theChampLoginOptions['email_button_style']) || $theChampLoginOptions['email_button_style'] == 'standard' ? 'checked = "checked"' : '';?> value="standard" >
					<span class="checkmark"></span>
				</label>
				<label class="container"><?=__('Outline','unikname-connect')?>
					<input type="radio" name="the_champ_login[email_button_style]" <?php echo isset($theChampLoginOptions['email_button_style']) && $theChampLoginOptions['email_button_style'] == 'outline' ? 'checked = "checked"' : '';?> value="outline">
					<span class="checkmark"></span>
				</label>
			</div>
		</div>
		<div class="item type-number-radius">
			<label class="name"><?=__('Border radius','unikname-connect')?></label>
			<div class="item-number-radius">
				<input type="number" name="the_champ_login[email_button_border_radius]" value="<?php echo isset($theChampLoginOptions['email_button_border_radius']) ? $theChampLoginOptions['email_button_border_radius'] : '0' ?>"/>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.waiel-color-picker').wpColorPicker();
	    $('.waiel-upload-btn').click(function(e) {
	    	var thisSelect = $(this);
	        e.preventDefault();
	        var image = wp.media({ 
	            title: 'Upload Image',
	            // mutiple: true if you want to upload multiple files at once
	            multiple: false
	        }).open()
	        .on('select', function(e){
	            // This will return the selected image from the Media Uploader, the result is an object
	            var uploaded_image = image.state().get('selection').first();
	            // We convert uploaded_image to a JSON object to make accessing it easier
	            // Output to the console uploaded_image
	            console.log(uploaded_image.toJSON());
	            var image_url = uploaded_image.toJSON().url;
	            var image_id  = uploaded_image.toJSON().id;
	            // Let's assign the url value to the input field
	            thisSelect.parent().find('.image-display-url').attr("src", image_url);
	            thisSelect.parent().find('#waiel_image_url').val(image_url);
	        });
	    });
	});
</script>