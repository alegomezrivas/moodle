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
 * Accessibility API endpoints
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_yinyang\api;

defined('MOODLE_INTERNAL') || die;

use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;

/**
 * Accessibility API endpoints class
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class darkmode extends external_api {
    /**
     * Font size endpoint parameters definition
     *
     * @return external_function_parameters
     */
    public static function toggledarkmode_parameters() {
        return new external_function_parameters([]);
    }

    /**
     * Font size endpoint implementation
     *
     * @param array $action
     *
     * @return array
     *
     * @throws \coding_exception
     * @throws \invalid_parameter_exception
     */
    public static function toggledarkmode() {
        if (isloggedin() && !isguestuser()) {
            $darkmode = get_user_preferences('dark-mode-on', 'false');

            set_user_preference('dark-mode-on', !$darkmode);
        }

        return ['status' => 'ok'];
    }

    /**
     * Font size endpoint return definition
     *
     * @return external_single_structure
     */
    public static function toggledarkmode_returns() {
        return new external_single_structure([
            'status' => new external_value(PARAM_RAW, 'The status message')
        ]);
    }
}
