<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
JFormHelper::loadFieldClass('list');
 
/**
 * Species Form Field class for the Species component
 *
 * @since  0.0.1
 */
class JFormFieldSpecies extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Species';
 
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('species,description');
		$query->where('published = 1');
		$query->from('#__petpoint_species');
		$db->setQuery((string) $query);
		$results = $db->loadObjectList();
		$options  = array();
 
		if ($results)
		{
			foreach ($results as $species)
			{
				$options[] = JHtml::_('select.option', $species->species, $species->description);
			}
		}
 
		return $options;
	}
}
