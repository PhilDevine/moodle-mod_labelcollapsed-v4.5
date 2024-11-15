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

global $CFG;

require_once($CFG->dirroot . '/lib/form/editor.php');

/**
 * Form element for handling the colour picker.
 *
 * @package    mod_labelcollapsed
 * @copyright  2023 Mario Wehr <m.wehr@fh-kaernten.at>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_labelcollapsed_colourpicker_form_element extends HTML_QuickForm_element implements templatable {

    // String html for help button, if empty then no help.
    public string $_helpbutton = '';

    /**
     * Class constructor
     *
     * @param    string     $elementname Name of the element
     * @param    mixed      $elemenlabel Label(s) for the element
     * @param    mixed      $attributes Associative array of tag attributes or HTML attributes name="value" pairs
     * @since     1.0
     * @access    public
     * @return    void
     */
    public function __construct($elementname=null, $elemenlabel=null, $attributes=null) {
        parent::__construct($elementname, $elemenlabel, $attributes);
        $this->_type = 'static';
    }

    /**
     * Sets name of editor
     *
     * @param string $name name of element
     */
    // @codingStandardsIgnoreStart
    public function setName($name): void {
        $this->updateAttributes(array('name' => $name));
    }
    // @codingStandardsIgnoreEnd
    /**
     * Returns name of element
     *
     * @return string
     */
    // @codingStandardsIgnoreStart
    function getName(): string {
        return $this->getAttribute('name');
    }
    // @codingStandardsIgnoreEnd
    /**
     * get html for help button
     *
     * @return string html for help button
     */
    // @codingStandardsIgnoreStart
    public function getHelpButton(): string {
        return $this->_helpbutton;
    }
    // @codingStandardsIgnoreEnd
    /**
     * Sets the value of the form element
     *
     * @param string $value
     */
    // @codingStandardsIgnoreStart
    public function setvalue($value): void {
        $this->updateAttributes(array('value' => $value));
    }
    // @codingStandardsIgnoreEnd
    /**
     * Gets the value of the form element
     */
    public function getvalue() {
        return $this->getAttribute('value');
    }

    /**
     * Returns the html string to display this element.
     *
     * @return string
     */
    public function tohtml(): string {
        global $PAGE, $OUTPUT;

        $icon = new pix_icon('i/loading', get_string('loading', 'admin'), 'moodle', ['class' => 'loadingicon']);
        $context = (object) [
            'icon' => $icon->export_for_template($OUTPUT),
            'name' => $this->getAttribute('name'),
            'id' => $this->getAttribute('id'),
            'value' => $this->getAttribute('value'),
            "readonly" => false,
            'haspreviewconfig' => false,
        ];
        $PAGE->requires->js_init_call('M.util.init_colour_picker', [$this->getAttribute('id'), null]);
        return $OUTPUT->render_from_template('core_admin/setting_configcolourpicker', $context);
    }

    /**
     * Function to export the renderer data in a format that is suitable for a mustache template.
     *
     * @param renderer_base $output Used to do a final render of any components that need to be rendered for export.
     * @return stdClass|array
     */
    public function export_for_template(renderer_base $output): array|stdClass {
        $context['html'] = $this->toHtml();
        $context['id'] = $this->getAttribute('id');
        return $context;
    }
}

/**
 * Colour picker validation rule
 *
 * @package    mod_labelcollapsed
 * @copyright  2023 Mario Wehr <m.wehr@fh-kaernten.at>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_labelcollapsed_colourpicker_rule extends HTML_QuickForm_Rule {

    /**
     * Validates the colour that was entered by the user
     *
     * @param string $value Value to check
     * @param int|string|array $options Not used yet
     * @return bool|string true if value is not empty
     */
    public function validate($value, $options = null): bool|string {

        if (preg_match('/^#?([[:xdigit:]]{3}){1,2}$/', $value)) {
            if (!str_starts_with($value, '#')) {
                $value = '#'.$value;
            }
            return $value;
        } else {
            return false;
        }
    }
}