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
class PetPointViewPetPoint extends JViewLegacy {
	/**
	 * Display the PetPoint Search Results view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null) {
		// get application
		$app = JFactory::getApplication();
		$context = 'petpoint.list.admin.petpoint';
		
		// get the data
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		// pick up filters; default description ascending
		$this->filter_order = $app->getUserStateFromRequest ($context . 'filter_order', 'filter_order', 'description', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest ($context . 'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm = $this->get ('FilterForm');
		$this->activeFilters = $this->get ('ActiveFilters');
		
		// get user actions
		$this->canDo = PetPointHelper::getActions();
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JError::raiseError('500', implode('\n', $errors));
			return false;
		endif;

		// Add a custom toolbar
		$this->addToolbar();
		
		// Display the view
		parent::display($tpl);
	}
	
	protected function addToolbar() {
		// Toolbar title
		$title = JText::_('COM_PETPOINT_TITLE');
		if ($this->pagination->total):
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		endif;
		JToolbarHelper::title($title, 'petpoint');
		
		if ($this->canDo->get('core.create')) {
			JToolBarHelper::addNew ('species.add');
		}
		
		if ($this->canDo->get('core.edit')) {
			JToolBarHelper::editList ('species.edit');
		}
		
		if ($this->canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'petpoint.delete');
		}
		
		if (JFactory::getUser()->authorise('core.admin', 'com_petpoint')):
			JToolBarHelper::preferences('com_petpoint');
		endif;
	}
	
	// set up document properties
	protected function setDocument() {
		$doc = JFactory::getDocument();
		$doc->setTitle(JText::_('COM_PETPOINT_ADMINISTRATION'));
	}
}