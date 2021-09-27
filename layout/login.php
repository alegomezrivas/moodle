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

defined('MOODLE_INTERNAL') || die();

/**
 * A login page layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$loginposition = theme_yinyang_get_setting('loginposition');

$template = 'theme_yinyang/login_side';
$extraclasses = [];
switch($loginposition) {
    case 'center':
        $extraclasses[] = 'login-center';
        $template = 'theme_yinyang/login_center';
    break;
    case 'right':
        $extraclasses[] = 'login-right';
    break;
    case 'left':
    default:
        $extraclasses[] = 'login-left';
    break;
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);

$themesettings = new \theme_yinyang\util\settings();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'loginbg' => $themesettings->get_loginbg_setting()
];

echo $OUTPUT->render_from_template($template, $templatecontext);
