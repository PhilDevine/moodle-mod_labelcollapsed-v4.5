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
 * Library of functions and constants for module labelcollapsed
 *
 * @package mod_labelcollapsed
 * @copyright  2011 Thomas Alsén
 * @copyright  2019 Lancaster University (http://www.lancaster.ac.uk/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Phil Devine <p.devine@lancaster.ac.uk>
 */

require_once(dirname(__FILE__, 3) . '/config.php');
require_login();
require_once("lib.php");

$id = required_param('id', PARAM_INT);

$PAGE->set_url('/mod/labelcollapsed/index.php', ['id' => $id]);

$PAGE->requires->jquery();

redirect("$CFG->wwwroot/course/view.php?id=$id");