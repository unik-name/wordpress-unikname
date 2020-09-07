<div class="column-2">
	<div class="content-column">
		<div class="item type-checkbox">
			<label class="name"><?=__('Enable Unikname Connect','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="enable-unikname" name="the_champ_login[enable]" value="1" <?php echo isset($theChampLoginOptions['enable']) ? 'checked = "checked"' : '';?>/>
				<label for="enable-unikname"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-checkbox">
			<label class="name"><?=__('Disable user registration via Unikname Connect','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="unikname_disable_reg_options" name="the_champ_login[disable_reg]" value="1" <?php echo isset($theChampLoginOptions['disable_reg']) ? 'checked = "checked"' : '';?>/>
				<label for="unikname_disable_reg_options"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-text unikname_disable_reg_options" <?php echo !isset($theChampLoginOptions['disable_reg']) ? 'style = "display: none"' : '';?> >
			<label class="name"><?=__('Redirection url','unikname-connect')?></label>
			<div class="item-text">
				<input type="text" name="the_champ_login[disable_reg_redirect]" value="<?php echo isset($theChampLoginOptions['disable_reg_redirect']) ? $theChampLoginOptions['disable_reg_redirect'] : '' ?>"/>
			</div>
		</div>
		<div class="item type-text">
			<label class="name"><?=__('Unikname Connect @unikname','unikname-connect')?></label>
			<div class="item-text">
				<input type="text" name="the_champ_login[un_key]" value="<?php echo isset($theChampLoginOptions['un_key']) ? $theChampLoginOptions['un_key'] : '' ?>"/>
			</div>
		</div>
		<div class="item type-text">
			<label class="name"><?=__('Unikname Connect Secret','unikname-connect')?></label>
			<div class="item-text">
				<input type="password" name="the_champ_login[un_secret]" value="<?php echo isset($theChampLoginOptions['un_secret']) ? $theChampLoginOptions['un_secret'] : '' ?>" />
			</div>
		</div>
		<input id="the_champ_login_unikname" name="the_champ_login[providers][]" type="hidden" checked = "checked" value="unikname" />
		<input id="the_champ_sl_same_tab" name="the_champ_login[same_tab_login]" type="hidden" value="1" />
	</div>
</div>
<div class="column-2"></div>