<?php
	global $buttonLinkTitle, $buttonLinkLabel, $buttonLinkDes;
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
?>
<div class="column-2">
	<div class="unikname-group-item margin-left-30">
		<div class="title-group">
			<h5><?=__('Account linking options','unikname-connect')?></h5>
		</div>
		<div class="button-custom-style">
			<div class="item type-select">
				<label class="name"><?=__('Button title','unikname-connect')?></label>
				<div class="item-select">
					<select name="the_champ_login[scl_title]">
						<?php foreach ($buttonLinkTitle as $key => $value) { ?>
							<option <?php echo isset($theChampLoginOptions['scl_title']) && $theChampLoginOptions['scl_title'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button label','unikname-connect')?></label>
				<div class="item-select">
					<select name="the_champ_login[scl_link_label]">
						<?php foreach ($buttonLinkLabel as $key => $value) { ?>
							<option <?php echo isset($theChampLoginOptions['scl_link_label']) && $theChampLoginOptions['scl_link_label'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<div class="item type-select">
				<label class="name"><?=__('Button description','unikname-connect')?></label>
				<div class="item-select">
					<select name="the_champ_login[scl_description]">
						<?php foreach ($buttonLinkDes as $key => $value) { ?>
							<option <?php echo isset($theChampLoginOptions['scl_description']) && $theChampLoginOptions['scl_description'] == $key ? 'selected="selected"' : '';?> value="<?=$key?>"><?=$value?></option>
						<?php } // Endforeach ?>
					</select>
				</div>
			</div>
			<?php if( class_exists('WooCommerce') ) : ?>
				<div class="item type-checkbox">
					<label class="name"><?=__('Enable at WooCommerce my account page (link account)','unikname-connect')?></label>
					<div class="item-checkbox">
						<input type="checkbox" id="woo-my-account" name="the_champ_login[link_my_account_fe]" <?php echo isset($theChampLoginOptions['link_my_account_fe']) ? 'checked = "checked"' : '';?> value="1"/>
						<label for="woo-my-account"><?=__('Toggle','unikname-connect')?></label>
					</div>
				</div>
			<?php endif; ?>
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