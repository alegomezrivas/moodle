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
 * A two column layout for the boost theme.
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('rightside-open', PARAM_ALPHA);

$darkmodeon = false;
$rightsideopen = false;
if (isloggedin()) {
    $rightsideopen = (get_user_preferences('rightside-open', 'false') == 'true');
    $darkmodeon = (get_user_preferences('dark-mode-on', false) == true);
}

$extraclasses = [];
if ($darkmodeon) {
    $extraclasses[] = 'yinyang-darkmode';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
if ($rightsideopen && $hasblocks) {
    $extraclasses[] = 'drawer-open-right';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'rightsideopen' => $rightsideopen,
    'bodyattributes' => $bodyattributes,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
];

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();

$themesettings = new \theme_yinyang\util\settings();

$templatecontext = array_merge($templatecontext, $themesettings->get_footer_settings());

echo $OUTPUT->render_from_template('theme_yinyang/mydashboard', $templatecontext);

