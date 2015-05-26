<?php
defined('_JEXEC') or die;

class PetPointControllerPetPoint extends JControllerAdmin {
	// identify model
	public function getModel($name = 'Species', $prefix = 'PetPointModel', $config = array('ignore_request' => true)) {
		return parent::getModel($name, $prefix, $config);
	}	
}