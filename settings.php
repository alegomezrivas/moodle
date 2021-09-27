<?php
// This file is part of Ranking block for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Yin-Yang block settings file
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingyinyang', get_string('pluginname', 'theme_yinyang'));

    /*
    * ----------------------
    * General settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_yinyang_general', get_string('generalsettings', 'theme_yinyang'));

    // Favicon setting.
    $name = 'theme_yinyang/logo_negative';
    $title = get_string('logo_negative', 'theme_yinyang');
    $description = get_string('logo_negative_desc', 'theme_yinyang');
    $opts = array('accepted_types' => array('.jpg', '.png', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo_negative', 0, $opts);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_yinyang/favicon';
    $title = get_string('favicon', 'theme_yinyang');
    $description = get_string('favicon_desc', 'theme_yinyang');
    $opts = array('accepted_types' => array('.ico', '.png'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $page->add($setting);

    // Login page background image.
    $name = 'theme_yinyang/loginbg';
    $title = get_string('loginbg', 'theme_yinyang');
    $description = get_string('loginbg_desc', 'theme_yinyang');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbg', 0, $opts);
    $page->add($setting);

    // Login box position.
    $name = 'theme_yinyang/loginposition';
    $title = get_string('loginposition', 'theme_yinyang');
    $description = get_string('loginposition_desc', 'theme_yinyang');

    $choices = [
        'left' => get_string('loginposition_left', 'theme_yinyang'),
        'center' => get_string('loginposition_center', 'theme_yinyang'),
        'right' => get_string('loginposition_right', 'theme_yinyang')
    ];

    $setting = new admin_setting_configselect($name, $title, $description,'left', $choices);
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_yinyang/brandcolor';
    $title = get_string('brandcolor', 'theme_yinyang');
    $description = get_string('brandcolor_desc', 'theme_yinyang');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    /*
    * ----------------------
    * Advanced settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_yinyang_advanced', get_string('advancedsettings', 'theme_yinyang'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_yinyang/scsspre',
        get_string('rawscsspre', 'theme_yinyang'), get_string('rawscsspre_desc', 'theme_yinyang'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_yinyang/scss', get_string('rawscss', 'theme_yinyang'),
        get_string('rawscss_desc', 'theme_yinyang'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Google analytics block.
    $name = 'theme_yinyang/googleanalytics';
    $title = get_string('googleanalytics', 'theme_yinyang');
    $description = get_string('googleanalytics_desc', 'theme_yinyang');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
    * --------------------
    * Frontpage settings tab
    * --------------------
    */
    $page = new admin_settingpage('theme_yinyang_frontpage', get_string('frontpagesettings', 'theme_yinyang'));

    // Header text.
    $name = 'theme_yinyang/headertext';
    $title = get_string('headertext', 'theme_yinyang');
    $default = '<h1>Because education matters.</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p><a href="https://conecti.me" class="btn btn-lg btn-primary">Conecti.me</a></p>';
    $description = get_string('headertext_desc', 'theme_yinyang');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    // Header image.
    $fileid = 'headerimage';
    $name = 'theme_yinyang/headerimage';
    $title = get_string('headerimage', 'theme_yinyang');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg'), 'maxfiles' => 1);
    $description = get_string('headerimage_desc', 'theme_yinyang');
    $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
    $page->add($setting);

    // Enable marketing boxes.
    $name = 'theme_yinyang/enablemarketingboxes';
    $title = get_string('enablemarketingboxes', 'theme_yinyang');
    $description = get_string('enablemarketingboxes_desc', 'theme_yinyang');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Boxes subtitle.
    $name = 'theme_yinyang/boxessubtitle';
    $title = get_string('boxessubtitle', 'theme_yinyang');
    $default = 'ONLINE COURSES';
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $page->add($setting);

    // Boxes title.
    $name = 'theme_yinyang/boxestitle';
    $title = get_string('boxestitle', 'theme_yinyang');
    $default = 'Essential Fast Facts';
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $page->add($setting);

    // Boxes description.
    $name = 'theme_yinyang/boxesdescription';
    $title = get_string('boxesdescription', 'theme_yinyang');
    $setting = new admin_setting_configtextarea($name, $title, '', '');
    $page->add($setting);

    for ($boxesindex = 1; $boxesindex <= 3; $boxesindex++) {
        $fileid = 'boximage' . $boxesindex;
        $name = 'theme_yinyang/boximage' . $boxesindex;
        $title = get_string('boximage', 'theme_yinyang');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, '', $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_yinyang/boxtitle' . $boxesindex;
        $title = get_string('boxtitle', 'theme_yinyang');
        $setting = new admin_setting_configtext($name, $title, '', 'Box title', PARAM_TEXT);
        $page->add($setting);

        $name = 'theme_yinyang/boxdescription' . $boxesindex;
        $title = get_string('boxdescription', 'theme_yinyang');
        $setting = new admin_setting_configtext($name, $title, '', 'Box description', PARAM_TEXT);
        $page->add($setting);

        $name = 'theme_yinyang/boxurl' . $boxesindex;
        $title = get_string('boxurl', 'theme_yinyang');
        $setting = new admin_setting_configtext($name, $title, '', '#promoboxes', PARAM_TEXT);
        $page->add($setting);
    }

    // Logos counter.
    $name = 'theme_yinyang/logoscounter';
    $title = get_string('logoscounter', 'theme_yinyang');
    $description = get_string('logoscounter_desc', 'theme_yinyang');
    $default = 0;
    $options = array();
    for ($i = 0; $i < 7; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $logoscounter = get_config('theme_yinyang', 'logoscounter');

    if ($logoscounter) {
        for ($logosindex = 1; $logosindex <= $logoscounter; $logosindex++) {
            $fileid = 'logoimage' . $logosindex;
            $name = 'theme_yinyang/logoimage' . $logosindex;
            $title = get_string('logoimage', 'theme_yinyang');
            $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
            $setting = new admin_setting_configstoredfile($name, $title, '', $fileid, 0, $opts);
            $page->add($setting);

            $name = 'theme_yinyang/logourl' . $logosindex;
            $title = get_string('logourl', 'theme_yinyang');
            $setting = new admin_setting_configtext($name, $title, '', '#logos', PARAM_TEXT);
            $page->add($setting);
        }
    }

    $settings->add($page);

    /*
    * --------------------
    * Footer settings tab
    * --------------------
    */
    $page = new admin_settingpage('theme_yinyang_footer', get_string('footersettings', 'theme_yinyang'));

    // Address.
    $name = 'theme_yinyang/address';
    $title = get_string('address', 'theme_yinyang');
    $description = get_string('address_desc', 'theme_yinyang');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $page->add($setting);

    // Mail.
    $name = 'theme_yinyang/mail';
    $title = get_string('mail', 'theme_yinyang');
    $default = 'willianmano@conecti.me';
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $page->add($setting);

    // Mobile.
    $name = 'theme_yinyang/phone';
    $title = get_string('phone', 'theme_yinyang');
    $default = '+55 (98) 00123-45678';
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $page->add($setting);

    // Whatsapp url setting.
    $name = 'theme_yinyang/whatsapp';
    $title = get_string('whatsapp', 'theme_yinyang');
    $description = get_string('whatsapp_desc', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $page->add($setting);

    // Facebook url setting.
    $name = 'theme_yinyang/facebook';
    $title = get_string('facebook', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $page->add($setting);

    // Twitter url setting.
    $name = 'theme_yinyang/twitter';
    $title = get_string('twitter', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $page->add($setting);

    // Linkdin url setting.
    $name = 'theme_yinyang/linkedin';
    $title = get_string('linkedin', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $page->add($setting);

    // Youtube url setting.
    $name = 'theme_yinyang/youtube';
    $title = get_string('youtube', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $page->add($setting);

    // Instagram url setting.
    $name = 'theme_yinyang/instagram';
    $title = get_string('instagram', 'theme_yinyang');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $page->add($setting);

    $settings->add($page);

    // Licensing tab.
    $page = new admin_settingpage('theme_yinyang_licensing', get_string('licensingsettings', 'theme_yinyang'));

    // License key.
    $name = 'theme_yinyang/licensekey';
    $title = get_string('licensekey', 'theme_yinyang');
    $description = get_string('licensekey_desc', 'theme_yinyang');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_yinyang_update_license_key');
    $page->add($setting);

    // License status.
    $license = new \theme_yinyang\util\license();
    $name = 'theme_yinyang/licensestatus';
    $title = get_string('licensestatus', 'theme_yinyang');
    $licensestatus = $license->get_license_status_badge();
    $setting = new admin_setting_configempty($name, $title, $licensestatus);
    $page->add($setting);

    $settings->add($page);
}
