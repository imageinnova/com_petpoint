<?php
defined('__JEXEC') or die();

JFormHelper::LoadFieldClass('list');

class JFormFieldSpecies extends JFormFieldList {
	protected $type = 'Species';
	
	protected function getOptions($published = false) {
		$app = JFactory::getApplication();

		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('code,description');
		$query->where('lang = "' . $app->get('language') . $published ? ' and published > 0' : '');
		$query->from('#__petpoint_species');
		$db->setQuery((string) $query);
		$results = $db->loadObjectList();
		$options = array();
		
		if ($results):
			foreach($results as $species):
				$options[] = JHtml::_('select.option', $species->code, $species->description);
			endforeach;
		endif;
		
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}