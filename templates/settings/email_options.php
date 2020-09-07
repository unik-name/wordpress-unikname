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
			<h4><?php _e('Email popup options', 'unikname-connect');?></h4>
			<div class="item type-textarea">
				<label class="name"><?=__("Text on 'Email required' popup",'unikname-connect')?></label>
				<div class="item-textarea">
					<textarea rows="4" cols="40" id="unikname_login_email_required_text" name="the_champ_login[email_popup_text]"><?php echo isset($theChampLoginOptions['email_popup_text']) ? $theChampLoginOptions['email_popup_text'] : '' ?></textarea>
				</div>
			</div>
			<div class="item type-textarea">
				<label class="name"><?=__("Error message for 'Email required' popup",'unikname-connect')?></label>
				<div class="item-textarea">
					<textarea rows="4" cols="40" id="unikname_login_email_required_error" name="the_champ_login[email_error_message]"><?php echo isset($theChampLoginOptions['email_error_message']) ? $theChampLoginOptions['email_error_message'] : '' ?></textarea>
				</div>
			</div>
			<div class="item type-text">
				<label class="name"><?=__('Email popup height','unikname-connect')?></label>
				<div class="item-text">
					<input id="unikname_email_popup_height" name="the_champ_login[popup_height]" type="number" value="<?php echo isset($theChampLoginOptions['popup_height']) ? $theChampLoginOptions['popup_height'] : '' ?>" /> px
				</div>
			</div>
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
<div class="column-2"></div>