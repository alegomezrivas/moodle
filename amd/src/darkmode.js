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
 * Contain the logic for dark mode.
 *
 * @package    theme_yinyang
 * @copyright  2020 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['jquery', 'core/str', 'core/ajax'], function($, Str, Ajax) {

    var SELECTORS = {
        BTN: '#darkmodebtn',
        MODECLASS: 'yinyang-darkmode'
    };

    var ISACTIVATED = false;

    var DarkMode = function() {
        this.registerEventListeners();

        if ($('body').hasClass(SELECTORS.MODECLASS)) {
            ISACTIVATED = true;
        }

        this.setButtonText();
    };

    DarkMode.prototype.registerEventListeners = function() {
        $(SELECTORS.BTN).click(function() {
            this.toggleDarkMode();
        }.bind(this));
    };

    DarkMode.prototype.toggleDarkMode = function() {
        $('body').toggleClass(SELECTORS.MODECLASS);

        ISACTIVATED = !ISACTIVATED;

        var request = Ajax.call([{
            methodname: 'theme_yinyang_toggledarkmode',
            args: {}
        }]);

        request[0].done(function() {
            this.setButtonText();
        }.bind(this));
    };

    DarkMode.prototype.setButtonText = function() {
        if (ISACTIVATED) {
            return Str.get_string('darkmode-disable', 'theme_yinyang')
                    .then(function(nameStr) {
                        $(SELECTORS.BTN).html(nameStr);
                    });
        }

        return Str.get_string('darkmode-enable', 'theme_yinyang')
            .then(function(nameStr) {
                $(SELECTORS.BTN).html(nameStr);
            });
    };

    return {
        'init': function() {
            return new DarkMode();
        }
    };
});