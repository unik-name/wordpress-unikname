<div class="column-2">
	<div class="content-column">
		<div class="item type-checkbox">
			<label class="name"><?=__('Enable Unikname Connect','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="enable-unikname" name="the_champ_login[enable]" value="1" <?php echo isset($theChampLoginOptions['enable']) ? 'checked = "checked"' : '';?>/>
				<label for="enable-unikname"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="group-item-unikname">
			<div class="item type-text">
				<label class="name"><?=__('Unikname Connect Site Id <span>*</span>','unikname-connect')?></label>
				<div class="item-text">
					<input type="text" name="the_champ_login[un_key]" value="<?php echo isset($theChampLoginOptions['un_key']) ? $theChampLoginOptions['un_key'] : '' ?>"/>
					<p><?=__('The Unikname Connect site identifier. You can find it in your <a href="https://account.connect.unikname.com#mtm_campaign=AccountCreation&mtm_source=wp" target="_blank">Unikname Connect Dashboard</a>.','unikname-connect')?></p>
				</div>
			</div>
			<div class="item type-text">
				<label class="name"><?=__('Unikname Connect Secret <span>*</span>','unikname-connect')?></label>
				<div class="item-text">
					<input type="password" name="the_champ_login[un_secret]" value="<?php echo isset($theChampLoginOptions['un_secret']) ? $theChampLoginOptions['un_secret'] : '' ?>" />
					<p><?=__('The Unikname Connect site secret. You can find it in your <a href="https://account.connect.unikname.com#mtm_campaign=AccountCreation&mtm_source=wp" target="_blank">Unikname Connect Dashboard</a>.','unikname-connect')?></p>
				</div>
			</div>
		</div>
		<input id="the_champ_login_unikname" name="the_champ_login[providers][]" type="hidden" checked = "checked" value="unikname" />
		<input id="the_champ_sl_same_tab" name="the_champ_login[same_tab_login]" type="hidden" value="1" />
	</div>
</div>
<div class="column-2"></div>