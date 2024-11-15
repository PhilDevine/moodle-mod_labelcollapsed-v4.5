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

namespace mod_labelcollapsed\output;

class mobile {

    /* Returns the initial page when viewing the activity for the mobile app.
     *
     * @param  array $args Arguments from tool_mobile_get_content WS
     * @return array HTML, javascript and other data
     */
    public static function mobile_view($args): array {
        global $OUTPUT;

        $cm = get_coursemodule_from_id('labelcollapsed', $args['cmid'], $args['courseid'], false, MUST_EXIST);
        $renderable = new content_view($cm->instance, $cm->id);
        $templatedata = $renderable->export_for_template(null);

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => $OUTPUT->render_from_template('mod_labelcollapsed/mobile_view_page', $templatedata),
                ],
            ],
        ];
    }
}