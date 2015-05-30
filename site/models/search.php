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
class PetpointModelSearch extends JModelItem {
	/**
	 * Get the species list
	 *
	 * @return  array        results list (all published species) as an array of select.options
	 */
	public function getSpeciesOptions() {
		$db = $this->getDBO();
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
