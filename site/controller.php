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
 * PetPoint Component Controller
 *
 * @since  0.1
 */
class PetPointController extends JControllerLegacy {
	protected $default_view = 'search';
//	protected $model_prefix = 'PetPointModel';
/*	
	function display($cachable = false, $urlparams = array()) {
		$document = JFactory::getDocument();
		// sets the view
		$viewName = $this->input->get('view', 'search');
		// type, e.g. html
		$viewType = $document->getType();
		// sets the template
		$viewLayout = $this->input->get('layout', 'default');
	
		$view = $this->getView( 'search', 'html' );
		$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
		$view->setModel( $this->getModel( 'Search' ), true );
		$view->display();
	}
*/	
	public function __construct($config = array()) {
		parent::__construct($config);
		
		var_dump($this);
		echo '<hr />';
	}
	
	public function getModel($name = '', $prefix = '', $config = array())
	{
	echo 'in getModel for ' . $prefix . $name . '<br />';
		if (empty($name))
		{
			$name = $this->getName();
		}
	
		if (empty($prefix))
		{
			$prefix = $this->model_prefix;
		}
		if ($model = $this->createModel($name, $prefix, $config))
		{
			// Task is a reserved state
			$model->setState('task', $this->task);
	
			// Let's get the application object and set menu information if it's available
			$app = JFactory::getApplication();
			$menu = $app->getMenu();
	
			if (is_object($menu))
			{
				if ($item = $menu->getActive())
				{
					$params = $menu->getParams($item->id);
	
					// Set default state data
					$model->setState('parameters.menu', $params);
				}
			}
		}
	
		return $model;
	}
	
	protected function createModel($name, $prefix = '', $config = array())
	{
		// Clean the model name
		$modelName = preg_replace('/[^A-Z0-9_]/i', '', $name);
		$classPrefix = preg_replace('/[^A-Z0-9_]/i', '', $prefix);
		echo 'in createModel for ' . $classPrefix . $modelName . '<br />';	
		$result = JModelLegacy::getInstance($modelName, $classPrefix, $config);
	var_dump($result);
		return $result;
	}
	
}
