<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_petpoint
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the PetPoint Component
 *
 * @since  0.1
 */
class PetPointViewSearch extends JViewLegacy {
	/**
	 * Display the PetPoint Search Results view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null) {
		// Assign data to the view
		$this->species = $this->get('Species');

		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
 
			return false;
		endif;
 
		// Display the view
		parent::display($tpl);
	}
}
