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
//	protected $default_view = 'search';
//	protected $view = 'search';
//	protected $model = 'search';
	
	function display($cachable = false, $urlparams = array()) {
		// sets the view 
//		$view = $this->getView( $this->default_view, 'html');
		$view = $this->input->get('view', 'search');
		// sets the template 
//		$viewLayout  = JRequest::getVar( 'tmpl', $this->view);
		$viewLayout = $this->input->get('layout', 'default');
		
		return parent::display();
	}
}
