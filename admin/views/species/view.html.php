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
 * HTML Species View class for the PetPoint Component
 *
 * @since  0.1
 */
class PetPointViewSpecies extends JViewLegacy {
	protected $form = null;
		
	/**
	 * Display the PetPoint Search Results view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null) {
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))):
			JError::raiseError('500', implode('\n', $errors));
			return false;
		endif;

		// Add a custom toolbar & page title
		$this->addToolbar();
		
		// Display the view
		parent::display($tpl);
		
		// set document properties
		$this->setDocument();
	}
	
	// add page title and toolbar
	protected function addToolbar() {
		$input = JFactory::getApplication()->input;
		
		// hide administrator menu
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		if ($isNew):
			$title = JText::_('COM_PETPOINT_MANAGER_SPECIES_NEW');
		else:
			$title = JText::_('COM_PETPOINT_MANAGER_SPECIES_EDIT');
		endif;
		
		JToolbarHelper::title($title, 'petpoint');
		JToolbarHelper::save('species.save');
		JToolbarHelper::cancel('species.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
	
	protected function setDocument() {
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument ();
		$document->setTitle ( $isNew ? JText::_ ('COM_PETPOINT_SPECIES_CREATING') : JText::_ ('COM_PETPOINT_SPECIES_EDITING'));
	}
}