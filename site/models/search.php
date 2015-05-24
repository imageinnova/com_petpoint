<?php

defined('_JEXEC') or die;

class PetPointModelSearch extends JModelItem {
	//protected $species;
	
	public function getSpecies($arg = null) {
		error_log("Entered getSpecies");
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('code,description');
		$query->from('#__petpoint-search');
		$query->where('lang = "' . $JFactory::getApplication()->language . '" and published > 0'
				. $arg ? ' and code = "' . $arg . '"' : '');
		$db->setQuery((string) $query);
		$result = $db->loadObjectList();
		$options = array();
		
		foreach ($result as $species):
			$options[] = JHtml::_('select.option', $species->code, $species->description);
		endforeach;

		return $options;
	}
}