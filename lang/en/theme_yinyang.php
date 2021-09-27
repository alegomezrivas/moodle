<?php
// This file is part of Moodle - http://moodle.org/
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
 * Language file.
 *
 * @package    theme_yinyang
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Yin-Yang';
$string['choosereadme'] = 'Yin-Yang is a modern highly-customisable theme. This theme is intended to be used directly, or as a parent theme when creating new themes utilising Bootstrap 4.';
$string['topic_progress'] = 'Topic\'s progress';
$string['access'] = 'Access';
$string['prev_topic'] = 'Previous topic';
$string['prev_week'] = 'Previous week';
$string['next_topic'] = 'Next topic';
$string['next_week'] = 'Next week';
$string['region-side-pre'] = 'Right';
$string['globalsearchtext'] = 'What are you looking for?';
$string['darkmode-title'] = 'Colors are affecting your eyes?';
$string['darkmode-enable'] = 'Enable dark mode';
$string['darkmode-disable'] = 'Disable dark mode';

// Data privacy.
$string['privacy:metadata:preference:dark-mode-on'] = 'The user\'s preference for dark mode.';
$string['privacy:dark-mode-on'] = 'The current preference for the dark mode is: {$a}.';

// Settings.
// General settings tab.
$string['generalsettings'] = 'General';
$string['logo_negative'] = 'Negative logo';
$string['logo_negative_desc'] = 'Negative logo displayed in the footer and sidebar with dark mode enabled';
$string['favicon'] = 'Custom favicon';
$string['favicon_desc'] = 'Upload your own favicon.  It should be an .ico or .png file.';
$string['loginbg'] = 'Login page background';
$string['loginbg_desc'] = 'Upload your custom background image for the login page.';
$string['loginposition'] = 'Login box position';
$string['loginposition_desc'] = 'Where you want to position the login box in the login page.';
$string['loginposition_left'] = 'Left';
$string['loginposition_center'] = 'Centered';
$string['loginposition_right'] = 'Right';
$string['brandcolor'] = 'Brand color';
$string['brandcolor_desc'] = 'The accent color.';

// Advanced settings tab.
$string['advancedsettings'] = 'Advanced';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['googleanalytics'] = 'Google Analytics Code';
$string['googleanalytics_desc'] = 'Please enter your Google Analytics code to enable analytics on your website. The code format shold be like [UA-XXXXX-Y]';

// Frontpage settings tab.
$string['headertext'] = 'Header text';
$string['headertext_desc'] = 'You could add any HTML text with all available bootstrap classes.';
$string['headerimage'] = 'Header image';
$string['headerimage_desc'] = 'Upload your custom header-image here if you want to add it to the header. Recommended size: 1922px x 844px, but you are free to create your own image with custom size.';
$string['enablemarketingboxes'] = 'Enable marketing boxes';
$string['enablemarketingboxes_desc'] = 'When enabled, display three marketing in the frontpage.';
$string['boxessubtitle'] = 'Marketing boxes subtitle';
$string['boxestitle'] = 'Marketing boxes title';
$string['boxesdescription'] = 'Marketing boxes description';
$string['boximage'] = 'Box image';
$string['boxtitle'] = 'Box title';
$string['boxdescription'] = 'Box description';
$string['boxurl'] = 'Box URL';
$string['frontpagesettings'] = 'Frontpage';
$string['logoscounter'] = 'Logos counter';
$string['logoscounter_desc'] = 'Select how many logos you want to add <strong>then click SAVE</strong> to load the input fields.';
$string['logoimage'] = 'Logo';
$string['logourl'] = 'Logo URL';

// Footer settings tab.
$string['footersettings'] = 'Footer';
$string['address_desc'] = 'Enter your full address';
$string['mail'] = 'E-Mail';
$string['phone'] = 'Phone';
$string['whatsapp'] = 'Whatsapp number';
$string['whatsapp_desc'] = 'Enter your whatsapp number for contact. Only numbers!';
$string['facebook'] = 'Facebook URL';
$string['twitter'] = 'Twitter URL';
$string['linkedin'] = 'Linkedin URL';
$string['youtube'] = 'Youtube URL';
$string['instagram'] = 'Instagram URL';

// Contact numbers strings.
$string['somenumbers'] = 'Some of our numbers';
$string['somenumbers_desc'] = 'Numbers that reflect our credibility and trust placed in us.';

// Footer strings.
$string['address'] = 'Address';
$string['phone'] = 'Phone';
$string['email'] = 'Email';
$string['followus'] = 'Follow us';
$string['contactinfo'] = 'Contact info';

// License Settings.
$string['licensingsettings'] = 'Licensing';
$string['licensenotactive'] = '<b>Alert!</b> License is not activated , please activate your license in the theme settings.';
$string['licensenotactiveadmin'] = '<b>Alert!</b> License is not activated , please activate your license <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingyinyang#theme_yinyang_licensing" >here</a>.';
$string['licensekey'] = 'License key';
$string['licensekey_desc'] = 'Type the license key you get from PluginStore site.';
$string['licensestatus'] = 'License Status';
$string['active'] = 'Active';
$string['invalid'] = 'Invalid license';
$string['expired'] = 'Expired';

$string['active_msg'] = 'Your license is active';
$string['invalid_msg'] = 'Your license key is invalid';
$string['expired_msg'] = 'Your license is expired';
$string['alreadyregistered_msg'] = 'This license is already registered for another site';