<div class="column-2">
	<div class="content-column">
		<div class="group-item-unikname">
			<div class="title-group">
				<h2><?=__('WordPress pages','unikname-connect')?></h2>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at login page','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="enable-login-page" name="the_champ_login[enableAtLogin]" <?php echo isset($theChampLoginOptions['enableAtLogin']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="enable-login-page"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at register page','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="enable-register-page" name="the_champ_login[enableAtRegister]" <?php echo isset($theChampLoginOptions['enableAtRegister']) ? 'checked = "checked"' : '';?> value="1" />
					<label for="enable-register-page"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at comment form','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="enable-comment-form" name="the_champ_login[enableAtComment]" <?php echo isset($theChampLoginOptions['enableAtComment']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="enable-comment-form"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
		</div>
		<div class="group-item-unikname">
			<div class="title-group">
				<h2><?=__('Other login configurations','unikname-connect')?></h2>
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
			<div class="item type-radio">
				<label class="name"><?=__('Registration redirection','unikname-connect')?></label>
				<div class="item-radio">
					<label class="container"><?=__('Same page where user logged in')?>
						<input type="radio" name="the_champ_login[register_redirection]" <?php echo !isset($theChampLoginOptions['register_redirection']) || $theChampLoginOptions['register_redirection'] == 'same' ? 'checked = "checked"' : '';?> value="same" >
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Homepage','unikname-connect')?>
						<input type="radio" name="the_champ_login[register_redirection]" <?php echo isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'homepage' ? 'checked = "checked"' : '';?> value="homepage">
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Account dashboard','unikname-connect')?>
						<input type="radio" name="the_champ_login[register_redirection]" <?php echo isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'account' ? 'checked = "checked"' : '';?> value="account" >
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Custom Url','unikname-connect')?>
						<input type="radio" name="the_champ_login[register_redirection]" <?php echo isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'custom' ? 'checked = "checked"' : '';?> value="custom">
						<span class="checkmark"></span>
						<div class="unik-name-custom-url-register custom-url-register" <?php echo !isset($theChampLoginOptions['register_redirection']) || $theChampLoginOptions['register_redirection'] != 'custom' ? 'style = "display: none"' : '';?> >
							<input id="unikname_register_redirection_url" name="the_champ_login[register_redirection_url]" type="text" value="<?php echo isset($theChampLoginOptions['register_redirection_url']) ? $theChampLoginOptions['register_redirection_url'] : '' ?>" />
						</div>
					</label>
				</div>
			</div>
			<div class="item type-radio">
				<label class="name"><?=__('Login redirection','unikname-connect')?></label>
				<div class="item-radio">
					<label class="container"><?=__('Same page where user logged in','unikname-connect')?>
						<input type="radio" name="the_champ_login[login_redirection]" <?php echo !isset($theChampLoginOptions['login_redirection']) || $theChampLoginOptions['login_redirection'] == 'same' ? 'checked = "checked"' : '';?> value="same">
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Homepage','unikname-connect')?>
						<input type="radio" name="the_champ_login[login_redirection]" <?php echo isset($theChampLoginOptions['login_redirection']) && $theChampLoginOptions['login_redirection'] == 'homepage' ? 'checked = "checked"' : '';?> value="homepage">
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Account dashboard','unikname-connect')?>
						<input type="radio" name="the_champ_login[login_redirection]" <?php echo isset($theChampLoginOptions['login_redirection']) && $theChampLoginOptions['login_redirection'] == 'account' ? 'checked = "checked"' : '';?> value="account" >
						<span class="checkmark"></span>
					</label>
					<label class="container"><?=__('Custom Url','unikname-connect')?>
						<input type="radio" name="the_champ_login[login_redirection]" type="radio" <?php echo isset($theChampLoginOptions['login_redirection']) && $theChampLoginOptions['login_redirection'] == 'custom' ? 'checked = "checked"' : '';?> value="custom">
						<span class="checkmark"></span>
						<div class="unik-name-custom-url-login custom-url-register" <?php echo !isset($theChampLoginOptions['login_redirection']) || $theChampLoginOptions['login_redirection'] != 'custom' ? 'style = "display: none"' : '';?>>
							<input id="unikname_login_redirection_url" name="the_champ_login[login_redirection_url]" type="text" value="<?php echo isset($theChampLoginOptions['login_redirection_url']) ? $theChampLoginOptions['login_redirection_url'] : '' ?>" />
						</div>
					</label>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="column-2">
	<div class="content-column">
		<div class="group-item-unikname">
			<div class="title-group">
				<h2><?=__('WooCommerce pages','unikname-connect')?></h2>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable before WooCommerce Customer Login Form','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="woo-before-form-login" name="the_champ_login[enable_before_wc]" <?php echo isset($theChampLoginOptions['enable_before_wc']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="woo-before-form-login"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable after WooCommerce Customer Login Form','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="woo-after-form-login" name="the_champ_login[enable_after_wc]" <?php echo isset($theChampLoginOptions['enable_after_wc']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="woo-after-form-login"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at WooCommerce Customer Login Form','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="woo-login-form" name="the_champ_login[enable_form_login_wc]" <?php echo isset($theChampLoginOptions['enable_form_login_wc']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="woo-login-form"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at WooCommerce Customer Register Form','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="woo_enable_register_wc" name="the_champ_login[enable_register_wc]" <?php echo isset($theChampLoginOptions['enable_register_wc']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="woo_enable_register_wc"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
			<div class="item type-checkbox">
				<label class="name"><?=__('Enable at WooCommerce checkout page','unikname-connect')?></label>
				<div class="item-checkbox">
					<input type="checkbox" id="woo_enable_wc_checkout" name="the_champ_login[enable_wc_checkout]" <?php echo isset($theChampLoginOptions['enable_wc_checkout']) ? 'checked = "checked"' : '';?> value="1"/>
					<label for="woo_enable_wc_checkout"><?=__('Toggle','unikname-connect')?></label>
				</div>
			</div>
		</div>

	</div>
</div>