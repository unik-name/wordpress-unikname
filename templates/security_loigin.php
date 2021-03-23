<div class="wrap unik-name-admin-container"> 
    <div class="unik-top-header">
        <div class="left">
            <div class="content-left">
                <img src="<?=UNIKNAME_DIR_URL.'assets/images/logo-unikname.png'?>" alt="<?=__('Logo Unik Name','unikname-connect')?>">
                <h3><?=__('The plugin that secures your admin accounts and that rewards your website users for protecting their privacy','unikname-connect')?></h3>
            </div>
        </div>
        <div class="right">
            <img src="<?=UNIKNAME_DIR_URL.'assets/images/form-bg-banner.png'?>" alt="Unik Name">
        </div>
    </div>
    <div class="unik-content-admin">
        <form method="post" action="options.php" novalidate="novalidate">
            <?php
                settings_fields('unik_name_security_options');
            ?>
            <div class="unik-content-tab">
                <div class="column-2">
                    <div class="content-column">
                        <div class="item type-checkbox">
                            <div class="item-checkbox">
                                <input type="checkbox" id="disable_connect_pass" name="unik_name_security[disable_connect_pass]" <?php echo (isset($unikNameSecurity['disable_connect_pass']) && $unikNameSecurity['disable_connect_pass'] == 1) ? 'checked = "checked"' : '';?> value="1"/>
                                <label for="disable_connect_pass"><?=__('Toggle','unikname-connect')?></label>
                            </div>
                            <label class="name left"><?=__('Prevent password login on this website for all users','unikname-connect')?></label>
                            <p><?=__('Forbid anyone to use passwords to log into your web site. Only connections with Unikname Connect are allowed.','unikname-connect')?></p>
                        </div>
                        <div class="item type-checkbox">
                            <div class="item-checkbox">
                                <input type="checkbox" id="roles_disable_connect_pass" name="unik_name_security[roles_disable_connect_pass]" <?php echo (isset($unikNameSecurity['roles_disable_connect_pass']) && $unikNameSecurity['roles_disable_connect_pass'] == 1) ? 'checked = "checked"' : '';?> value="1"/>
                                <label for="roles_disable_connect_pass"><?=__('Toggle','unikname-connect')?></label>
                            </div>
                            <label class="name left"><?=__('Prevent password login on this website only for these roles:','unikname-connect')?></label>
                            <p><?=__('Forbid only users with these roles to log into your web site. Only connections with Unikname Connect are allowed for them.','unikname-connect')?></p>
                        </div>
                        <div class="item type-multi-checkbox roles_user_disable_container <?php echo (isset($unikNameSecurity['roles_disable_connect_pass']) && $unikNameSecurity['roles_disable_connect_pass'] == 1) ? '' : 'disable';?>">
                            <?php 
                                global $wp_roles; 
                                $listRoleCurrent = array('administrator');
                                if(isset($unikNameSecurity['roles_user_disable'])){
                                    $listRoleCurrent = $unikNameSecurity['roles_user_disable'];
                                }
                            ?>
                            <?php if(is_array($wp_roles->roles) && count($wp_roles->roles) > 0) : ?>
                                <?php foreach ( $wp_roles->roles as $key=>$value ): ?>
                                    <div class="item-checkbox">
                                        <label for="<?php echo $key; ?>">
                                            <input type="checkbox" id="<?php echo $key; ?>" name="unik_name_security[roles_user_disable][]" value="<?php echo $key; ?>" <?php echo (in_array($key, $listRoleCurrent)) ? 'checked = "checked"' : '';?> >
                                            <span class="checkmark"></span>
                                            <?php echo $value['name']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="column-2"></div>
            </div>
            <p class="submit"><input type="submit"  class="button button-primary" value="<?=__('Save Changes','unikname-connect')?>"></p>
        </form>
    </div>
</div>