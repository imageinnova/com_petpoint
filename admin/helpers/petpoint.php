<?php
defined('_JEXEC') or die;

abstract class PetPointHelper {
	public static function getActions($item = 0) {
		$result = new JObject;
		
		if (empty($item)):
			$assetName = 'com_petpoint';
		else:
			$assetName = 'com_petpoint.item' . (int) $item;
		endif;
		
		$actions = JAccess::getActions('com_petpoint', 'component');
		
		foreach ($actions as $action):
			$result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
		endforeach;
		
		return $result;
	}
}