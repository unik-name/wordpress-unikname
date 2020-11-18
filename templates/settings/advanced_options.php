<div class="column-2">
		<div class="unik-style-button-container">
			<h5 class="account-link"><?=__('Account linking options','unikname-connect')?></h5>
			<div class="button-custom-style">
				<div class="item type-text">
					<label class="name"><?=__('Sub Title','unikname-connect')?></label>
					<div class="item-text">
						<input id="unikname_scl_title" name="the_champ_login[scl_title]" type="text" value="<?php echo isset($theChampLoginOptions['scl_title']) ? $theChampLoginOptions['scl_title'] : '' ?>" />
					</div>
				</div>
				<div class="item type-text">
					<label class="name"><?=__('Label','unikname-connect')?></label>
					<div class="item-text">
						<input id="unikname_scl_title" name="the_champ_login[scl_link_label]" type="text" value="<?php echo isset($theChampLoginOptions['scl_link_label']) && $theChampLoginOptions['scl_link_label'] != '' ? $theChampLoginOptions['scl_link_label'] : __('With your @unikname','unikname-connect') ?>" />
					</div>
				</div>
				<div class="item type-checkbox">
					<label class="name"><?=__('Enable at WooCommerce my account page (link account)','unikname-connect')?></label>
					<div class="item-checkbox">
						<input type="checkbox" id="woo-my-account" name="the_champ_login[link_my_account_fe]" <?php echo isset($theChampLoginOptions['link_my_account_fe']) ? 'checked = "checked"' : '';?> value="1"/>
						<label for="woo-my-account"><?=__('Toggle','unikname-connect')?></label>
					</div>
				</div>
				<div class="item type-checkbox">
					<label class="name"><?=__('Link social account to already existing account, if email address matches','unikname-connect')?></label>
					<div class="item-checkbox">
						<input type="checkbox" id="link-social-with-account" name="the_champ_login[link_account]" <?php echo isset($theChampLoginOptions['link_account']) ? 'checked = "checked"' : '';?> value="1"/>
						<label for="link-social-with-account"><?=__('Toggle','unikname-connect')?></label>
					</div>
				</div>
			</div>
		</div>
</div>
<div class="column-2"></div>