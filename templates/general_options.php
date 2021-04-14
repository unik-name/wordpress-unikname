<div class="wrap unik-name-admin-container"> 
    <div class="unik-top-header">
        <div class="left">
            <div class="content-left">
                <img src="<?=UNIKNAME_DIR_URL.'assets/images/logo-unikname.png'?>" alt="<?=__('Logo Unik Name','unikname-connect')?>">
                <h3><?=__('The best plugin to secure your admin accounts','unikname-connect')?></h3>
            </div>
        </div>
        <div class="right">
            <img src="<?=UNIKNAME_DIR_URL.'assets/images/form-bg-banner.png'?>" alt="Unik Name">
        </div>
    </div>
    <div class="unik-content-admin">
        <form method="post" action="options.php" novalidate="novalidate" id="waiel-job-setting-content">
            <?php 
                $urlAdmin       = admin_url('/admin.php?page=unikname-general-options');
                $tabCurrent     = '';
                if(isset($_GET['tab']) && $_GET['tab'] != '') $tabCurrent = $_GET['tab']; 
            ?>
            <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
                <a href="<?=$urlAdmin?>" class="nav-tab <?=(($tabCurrent == '') ? 'nav-tab-active' : '')?>">
                    <?=__('General','unikname-connect');?>
                </a>
                <a href="<?=$urlAdmin?>&tab=login-options" class="nav-tab <?=(($tabCurrent == 'login-options') ? 'nav-tab-active' : '')?>">
                    <?=__('Login','unikname-connect');?>
                </a>
                <a href="<?=$urlAdmin?>&tab=style-options" class="nav-tab <?=(($tabCurrent == 'style-options') ? 'nav-tab-active' : '')?>">
                    <?=__('Style','unikname-connect');?>
                </a>
                <a href="<?=$urlAdmin?>&tab=email-options" class="nav-tab <?=(($tabCurrent == 'email-options') ? 'nav-tab-active' : '')?>">
                    <?=__('Email','unikname-connect');?>
                </a>
                <a href="<?=$urlAdmin?>&tab=advanced-options" class="nav-tab <?=(($tabCurrent == 'advanced-options') ? 'nav-tab-active' : '')?>">
                    <?=__('Account linking','unikname-connect');?>
                </a>
                <a href="<?=$urlAdmin?>&tab=general-options" class="nav-tab <?=(($tabCurrent == 'general-options') ? 'nav-tab-active' : '')?>">
                    <?=__('Advanced','unikname-connect');?>
                </a>
            </nav>
            <div class="unik-content-tab">
                <?php
                    switch ($tabCurrent) {
                        case 'general-options':
                            settings_fields('the_champ_general_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/general_options.php';
                            break;
                        case 'login-options':
                            settings_fields('the_champ_login_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/login_options.php';
                            echo '<div style="display:none">';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/basic_configuration.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/email_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/advanced_options.php';
                            echo '</div>';
                            break;
                        case 'style-options':
                            settings_fields('unik_name_style_button_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/style_options.php';
                            break;
                        case 'advanced-options':
                            settings_fields('the_champ_login_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/advanced_options.php';
                            echo '<div style="display:none">';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/login_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/email_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/basic_configuration.php';
                            echo '</div>';
                            break;
                        case 'email-options':
                            settings_fields('the_champ_login_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/email_options.php';
                            echo '<div style="display:none">';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/basic_configuration.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/login_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/advanced_options.php';
                            echo '</div>';
                            break;
                        default:
                            settings_fields('the_champ_login_options');
                            include_once UNIKNAME_ABSPATH . 'templates/settings/basic_configuration.php';
                            echo '<div style="display:none">';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/login_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/email_options.php';
                                include_once UNIKNAME_ABSPATH . 'templates/settings/advanced_options.php';
                            echo '</div>';
                    }
                ?>
            </div>
            <p class="submit"><input type="submit"  class="button button-primary" value="<?=__('Save Changes','unikname-connect')?>"></p>
        </form>
    </div>
</div>