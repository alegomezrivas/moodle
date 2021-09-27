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
 * Theme functions.
 *
 * @package    theme_yinyang
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_yinyang_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_yinyang', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_yinyang and not theme_boost (see the line above).
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // Moove scss.
    $yinyangvariables = file_get_contents($CFG->dirroot . '/theme/yinyang/scss/yinyang/_variables.scss');
    $yinyang = file_get_contents($CFG->dirroot . '/theme/yinyang/scss/yinyang.scss');

    // Combine them together.
    return $yinyangvariables . "\n" . $scss . "\n" . $yinyang;
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_yinyang_get_extra_scss($theme) {
    $scss = $theme->settings->scss;

    $scss .= theme_yinyang_set_headerimage($theme);

    return $scss;
}

/**
 * Adds the header image to CSS.
 *
 * @param theme_config $theme The theme config object.
 *
 * @return string
 */
function theme_yinyang_set_headerimage($theme) {
    global $OUTPUT;

    $headerimage = $theme->setting_file_url('headerimage', 'headerimage');

    if (is_null($headerimage)) {
        $headerimage = $OUTPUT->image_url('default_headerimg', 'theme');
    }

    $headercss = "#page-site-index.notloggedin #toparea {background-image: url('$headerimage');}";

    return $headercss;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 *
 * @return mixed
 *
 * @throws coding_exception
 */
function theme_yinyang_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    $theme = theme_config::load('yinyang');

    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'headerimage') {
        return $theme->setting_file_serve('headerimage', $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'logo_negative') {
        return $theme->setting_file_serve('logo_negative', $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'loginbg') {
        return $theme->setting_file_serve('loginbg', $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM and $filearea === 'favicon') {
        return $theme->setting_file_serve('favicon', $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM and preg_match("/^logoimage[1-9][0-9]?$/", $filearea) !== false) {
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM and preg_match("/^boximage[1-9][0-9]?$/", $filearea) !== false) {
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    }

    send_file_not_found();
}

/**
 * Get theme setting
 *
 * @param string $setting
 * @param bool $format
 *
 * @return string
 *
 * @throws coding_exception
 */
function theme_yinyang_get_setting($setting, $format = false) {
    $theme = theme_config::load('yinyang');

    if (empty($theme->settings->$setting)) {
        return false;
    }

    if (!$format) {
        return $theme->settings->$setting;
    }

    if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    }

    if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    }

    return format_string($theme->settings->$setting);
}

/**
 * Remove unliked nav items
 *
 * @param flat_navigation $flatnav
 */
function theme_yinyang_remove_coursesections(\flat_navigation $flatnav) {
    foreach ($flatnav as $item) {
        if (is_numeric($item->key)) {
            $flatnav->remove($item->key);
        }

        if ($item->key === 'mycourses') {
            $flatnav->remove($item->key);
        }
    }
}

/**
 * Update key callback.
 *
 * @return bool
 */
function theme_yinyang_update_license_key($keyname) {
    $license = new \theme_yinyang\util\license();

    $license->validate_license($_REQUEST[$keyname]);
}
