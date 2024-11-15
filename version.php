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
 * labelcollapsed module version info
 *
 * @package    mod_labelcollapsed
 * @copyright  2011 Thomas Alsén
 * @copyright  2019 Lancaster University (http://www.lancaster.ac.uk/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Phil Devine <p.devine@lancaster.ac.uk>
 */

defined('MOODLE_INTERNAL') || die;

$plugin->release = 'v4.5';
$plugin->maturity = MATURITY_BETA;
$plugin->version  = 2024111504;  // The current module version (Date: YYYYMMDDXX).
$plugin->requires = 2024100500;  // Requires this Moodle version.
$plugin->cron     = 0;           // Period for cron to check this module (secs).
$plugin->component = 'mod_labelcollapsed';