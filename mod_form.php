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
 * Add labelcollapsedcollapsed form
 *
 * @package    mod_labelcollapsed
 * @copyright  2011 Thomas Alsén
 * @copyright  2019 Lancaster University (http://www.lancaster.ac.uk/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Phil Devine <p.devine@lancaster.ac.uk>
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_labelcollapsed_mod_form extends moodleform_mod {

    public function definition(): void {
        global $CFG;

        $mform = $this->_form;

        // Register custom colourpicker.
        MoodleQuickForm::registerElementType('labelcollapsed_colourpicker',
            $CFG->dirroot . '/mod/labelcollapsed/classes/form/colourpicker_form_element.php',
            'mod_labelcollapsed_colourpicker_form_element');
        // Register validation rule for colourpicker.
        MoodleQuickForm::registerRule('mod_labelcollapsed_colourpicker_rule',
            null,
            'mod_labelcollapsed_colourpicker_rule',
            $CFG->dirroot . '/mod/labelcollapsed/classes/form/colourpicker_form_element.php');

        // Add sectioncolor as colourpicker element.
        $mform->addElement(
            'labelcollapsed_colourpicker',
            'sectioncolor',
            get_string('labelsectionnumcolor', 'labelcollapsed'),
            [
                'id' => 'colourpicker_sectioncolor',
            ]);
        $mform->setDefault('sectioncolor', '');
        // Add validation rule.
        $mform->addRule('sectioncolor', get_string('validateerror', 'admin'), 'mod_labelcollapsed_colourpicker_rule');

        // Add section number label.
        $mform->addElement('text', 'labelsection', get_string('labelsectionnum', 'labelcollapsed'));
        $mform->addRule('labelsection', get_string('maximumchars', '', 12), 'maxlength', 12, 'client');

        // Add sectioncolor as colourpicker element.
        $mform->addElement(
            'labelcollapsed_colourpicker',
            'sectionbgcolor',
            get_string('labelsectionBGcolor', 'labelcollapsed'),
            [
                'id' => 'colourpicker_sectionbgcolor',
            ]);
        $mform->setDefault('sectionbgcolor', '');
        // Add validation rule.
        $mform->addRule('sectionbgcolor', get_string('validateerror', 'admin'), 'mod_labelcollapsed_colourpicker_rule');

        $mform->addElement('text', 'name', get_string('labelcollapsedheader', 'labelcollapsed'), ['size' => '64']);

        $this->standard_intro_elements();

        $this->standard_coursemodule_elements();
        $this->add_action_buttons(true, false);
    }
}