<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_petpoint
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * PetPoint Search Model
 *
 * @since  0.0.1
 */
class PetPointModelSearch extends JModelItem {
	public function getSpeciesOptions() {
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('species,description');
		$query->where('published = 1');
		$query->from('#__petpoint_species');
		$db->setQuery((string) $query);
		$results = $db->loadObjectList();
		$options  = array();

		if ($results):
			foreach ($results as $species):
				$options[] = JHtml::_('select.option', $species->species, $species->description);
			endforeach;
		endif;
		
		return $options;
	}
}