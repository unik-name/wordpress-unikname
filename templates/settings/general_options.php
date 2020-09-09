<div class="column-2">
	<div class="content-column">
		<div class="item type-checkbox">
			<label class="name"><?=__('Include Javascript in website footer','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="include-javascript" name="the_champ_general[footer_script]" <?php echo isset($theChampGeneralOptions['footer_script']) ? 'checked = "checked"' : '';?> value="1"/>
				<label for="include-javascript"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-checkbox">
			<label class="name"><?=__('Load all Javascript files in single file','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="load-all-javascript" name="the_champ_general[combined_script]" <?php echo isset($theChampGeneralOptions['combined_script']) ? 'checked = "checked"' : '';?> value="1"/>
				<label for="load-all-javascript"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-checkbox">
			<label class="name"><?=__('Delete all the options on plugin deletion','unikname-connect')?></label>
			<div class="item-checkbox">
				<input type="checkbox" id="delete-all-option" name="the_champ_general[delete_options]" <?php echo isset($theChampGeneralOptions['delete_options']) ? 'checked = "checked"' : '';?> value="1"/>
				<label for="delete-all-option"><?=__('Toggle','unikname-connect')?></label>
			</div>
		</div>
		<div class="item type-textarea">
			<label class="name"><?=__('Custom CSS','unikname-connect')?></label>
			<div class="item-textarea">
				<textarea rows="7" cols="63" id="the_champ_custom_css" name="the_champ_general[custom_css]"><?php echo isset( $theChampGeneralOptions['custom_css'] ) ? $theChampGeneralOptions['custom_css'] : '' ?></textarea>
			</div>
		</div>
	</div>
</div>
<div class="column-2"></div>