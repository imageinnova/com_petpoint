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
	
	public function getSexOptions() {
		$options = array();
		
		$options[] = JHtml::_('select.option', 'A', JText::_('JALL'));
		$options[] = JHtml::_('select.option', 'M', JText::_('COM_PETPOINT_SEX_OPT_MALE'));
		$options[] = JHtml::_('select.option', 'F', JText::_('COM_PETPOINT_SEX_OPT_FEMALE'));
		
		return $options;
	}
	
	public function getAgeGroupOptions() {
		$options = array();
	
		$options[] = JHTML::_('select.option', 'All', JText::_('JALL'));
		$options[] = JHTML::_('select.option', 'UnderYear', JText::_('COM_PETPOINT_AGEGROUP_OPT_UNDER_1_YEAR'));
		$options[] = JHTML::_('select.option', 'OverYear', JText::_('COM_PETPOINT_AGEGROUP_OPT_OVER_1_YEAR'));
			
		return $options;
	}
	
	public function getOnHoldOptions() {
		$options = array();
	
		$options[] = JHTML::_('select.option', 'A', JText::_('JALL'));
		$options[] = JHTML::_('select.option', 'Y', JText::_('COM_PETPOINT_ONHOLD_OPT_ON_HOLD'));
		$options[] = JHTML::_('select.option', 'N', JText::_('COM_PETPOINT_ONHOLD_OPT_NOT_ON_HOLD'));
					
		return $options;
	}
	
	public function getOrderByOptions() {
		$options = array();
	
		$options[] = JHTML::_('select.option', 'ID', JText::_('COM_PETPOINT_ORDERBY_OPT_ID'));
		$options[] = JHTML::_('select.option', 'Name', JText::_('COM_PETPOINT_ORDERBY_OPT_NAME'));
		$options[] = JHTML::_('select.option', 'Breed', JText::_('COM_PETPOINT_ORDERBY_OPT_BREED'));
		$options[] = JHTML::_('select.option', 'Sex', JText::_('COM_PETPOINT_ORDERBY_OPT_SEX'));
		$options[] = JHTML::_('select.option', 'Random', JText::_('COM_PETPOINT_ORDERBY_OPT_RANDOM'));
							
		return $options;
	}
}