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
 * Theme yinyang functions and service definitions.
 *
 * @package   theme_yinyang
 * @copyright 2020 Willian Mano - http://conecti.me
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = [
    'theme_yinyang_toggledarkmode' => [
        'classname' => 'theme_yinyang\api\darkmode',
        'classpath' => 'theme_yinyang/classes/api/darkmode.php',
        'methodname' => 'toggledarkmode',
        'description' => 'Increase or decrease the site font size.',
        'type' => 'write',
        'ajax' => true
    ],
];
