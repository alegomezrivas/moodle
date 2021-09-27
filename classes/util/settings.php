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
 * Custom yinyang settings functions
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_yinyang\util;

defined('MOODLE_INTERNAL') || die();

/**
 * Class to get theme settings in Moodle.
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class settings {
    protected $theme;
    protected $files = ['loginbg', 'logo_negative'];

    public function __construct() {
        $this->theme = \theme_config::load('yinyang');
    }

    public function __get($name) {
        if (in_array($name, $this->files)) {
            return $this->theme->setting_file_url($name, $name);
        }

        if (empty($this->theme->settings->$name)) {
            return false;
        }

        return $this->theme->settings->$name;
    }

    public function get_loginbg_setting() {
        global $OUTPUT;

        $loginbgimg = $this->loginbg;

        if (is_null($loginbgimg)) {
            $loginbgimg = $OUTPUT->image_url('default_loginbg', 'theme_yinyang');
        }

        return $loginbgimg;
    }

    public function get_logo_negative_setting() {
        global $OUTPUT;

        $logo = $this->logo_negative;

        if (empty($logo)) {
            if ($haslogo = $OUTPUT->has_logo()) {
                $logo = $OUTPUT->get_logo_url();
            }
        }

        return $logo ?: false;
    }

    public function get_logos_settings() {
        $haslogos = $this->has_logos();

        if ($haslogos) {
            $logos = [];

            for ($i = 1; $i <= $this->logoscounter; $i++) {
                $logoimage = 'logoimage' . $i;
                $logourl = 'logourl' . $i;
                if ($this->$logoimage) {
                    $logos[$i]['logoimage'] = $this->theme->setting_file_url($logoimage, $logoimage);
                    $logos[$i]['logourl'] = $this->$logourl;
                }
            }

            return [
                'haslogos' => true,
                'logos' => array_values($logos)
            ];
        }

        return ['haslogos' => false];
    }

    public function get_boxes_settings() {
        if ($this->enablemarketingboxes) {
            $data = [];

            $data['enablemarketingboxes'] = true;
            $data['boxessubtitle'] = $this->boxessubtitle;
            $data['boxestitle'] = $this->boxestitle;
            $data['boxesdescription'] = $this->boxesdescription;

            $boxes = [];
            for ($i = 1; $i <= 3; $i++) {
                $boximage = 'boximage' . $i;
                $boxtitle = 'boxtitle' . $i;
                $boxdescription = 'boxdescription' . $i;
                $boxurl = 'boxurl' . $i;

                $boxes[$i]['boximage'] = $this->get_box_image($boximage);
                $boxes[$i]['boxtitle'] = $this->$boxtitle;
                $boxes[$i]['boxdescription'] = $this->$boxdescription;
                $boxes[$i]['boxurl'] = $this->$boxurl;
            }

            $data['boxes'] = array_values($boxes);

            return $data;
        }

        return ['enablemarketingboxes' => false];
    }

    public function get_footer_settings() {
        $data = [];

        $footersettings = [
            'address', 'mail', 'phone', 'whatsapp', 'facebook', 'twitter', 'linkedin', 'youtube', 'instagram'
        ];

        foreach ($footersettings as $setting) {
            $value = $this->$setting;
            if (!empty($value)) {
                $data[$setting] = $value;
            }
        }

        $data['logo_negative'] = $this->get_logo_negative_setting();

        $iosappid = get_config('tool_mobile', 'iosappid');
        if (!empty($iosappid)) {
            $data['iosappid'] = $iosappid;
        }

        $androidappid = get_config('tool_mobile', 'androidappid');
        if (!empty($androidappid)) {
            $data['androidappid'] = $androidappid;
        }

        return $data;
    }

    protected function has_logos() {
        $counter = $this->logoscounter;

        if (empty($counter)) {
            return false;
        }

        return $this->logoscounter > 0 ? true : false;
    }

    protected function get_box_image($boximage) {
        $hasimage = $this->$boximage;

        if (!empty($hasimage)) {
            return $this->theme->setting_file_url($boximage, $boximage);
        }

        return new \moodle_url('/theme/yinyang/pix/default_box.png');
    }

}