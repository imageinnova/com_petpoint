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
}
