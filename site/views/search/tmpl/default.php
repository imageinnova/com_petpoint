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

//$params = JComponentHelper::getParams('com_petpoint');
$app = JFactory::getApplication();
$params = $app->getParams();
if (!$params): 
	echo 'This component must be configured before attempting to display it on the site.';
else:
	// Build up arrays of control options (TO DO: make these into db tables)
	
	// species
	/*
	$speciesOpts = array();
	$speciesOpts[] = JHtml::_('select.option', 'All', JText::_('JALL'));
	$speciesOpts[] = JHtml::_('select.option', 'Dog', JText::_('COM_PETPOINT_SPECIES_OPT_DOG'));
	$speciesOpts[] = JHtml::_('select.option', 'Cat', JText::_('COM_PETPOINT_SPECIES_OPT_CAT'));
	$speciesOpts[] = JHtml::_('select.option', 'Rabbit', JText::_('COM_PETPOINT_SPECIES_OPT_RABBIT'));
	$speciesOpts[] = JHtml::_('select.option', 'Horse', JText::_('COM_PETPOINT_SPECIES_OPT_HORSE'));
	$speciesOpts[] = JHtml::_('select.option', JText::_('Small & Furry'), JText::_('COM_PETPOINT_SPECIES_OPT_SMALL_FURRY'));
	$speciesOpts[] = JHtml::_('select.option', 'Pig', JText::_('COM_PETPOINT_SPECIES_OPT_PIG'));
	$speciesOpts[] = JHtml::_('select.option', 'Reptile', JText::_('COM_PETPOINT_SPECIES_OPT_REPTILE'));
	$speciesOpts[] = JHtml::_('select.option', 'Barnyard', JText::_('COM_PETPOINT_SPECIES_OPT_BARNYARD'));
	$speciesOpts[] = JHtml::_('select.option', 'Other', JText::_('COM_PETPOINT_SPECIES_OPT_OTHER'));
	*/
	$speciesOpts = $this->species;

	// sex
	$sexOpts = array();
	$sexOpts[] = JHtml::_('select.option', 'A', JText::_('JALL'));
	$sexOpts[] = JHtml::_('select.option', 'M', JText::_('COM_PETPOINT_SEX_OPT_MALE'));
	$sexOpts[] = JHtml::_('select.option', 'F', JText::_('COM_PETPOINT_SEX_OPT_FEMALE'));
	
	// age group
	$agegroupOpts = array();
	$agegroupOpts[] = JHTML::_('select.option', 'All', JText::_('JALL'));
	$agegroupOpts[] = JHTML::_('select.option', 'UnderYear', JText::_('COM_PETPOINT_AGEGROUP_OPT_UNDER_1_YEAR'));
	$agegroupOpts[] = JHTML::_('select.option', 'OverYear', JText::_('COM_PETPOINT_AGEGROUP_OPT_OVER_1_YEAR'));
	
	// on hold
	$onholdOpts = array();
	$onholdOpts[] = JHTML::_('select.option', 'A', JText::_('JALL'));
	$onholdOpts[] = JHTML::_('select.option', 'Y', JText::_('COM_PETPOINT_ONHOLD_OPT_ON_HOLD'));
	$onholdOpts[] = JHTML::_('select.option', 'N', JText::_('COM_PETPOINT_ONHOLD_OPT_NOT_ON_HOLD'));
	
	// sort order
	$orderbyOpts = array();
	$orderbyOpts[] = JHTML::_('select.option', 'ID', JText::_('COM_PETPOINT_ORDERBY_OPT_ID'));
	$orderbyOpts[] = JHTML::_('select.option', 'Name', JText::_('COM_PETPOINT_ORDERBY_OPT_NAME'));
	$orderbyOpts[] = JHTML::_('select.option', 'Breed', JText::_('COM_PETPOINT_ORDERBY_OPT_BREED'));
	$orderbyOpts[] = JHTML::_('select.option', 'Sex', JText::_('COM_PETPOINT_ORDERBY_OPT_SEX'));
	$orderbyOpts[] = JHTML::_('select.option', 'Random', JText::_('COM_PETPOINT_ORDERBY_OPT_RANDOM'));
	
	// build initial query string
	$queryParms = array();
	foreach (array('species', 'sex', 'agegroup', 'location', 'site', 'onhold', 'orderby', 'authkey', 'css', 'detailsinpopup', 'colnum') as $key):
		$queryParms[$key] = $params->get($key);
	endforeach;
	?>
	<form action="#" method="get" id="form-petpoint" class="form-inline">
	<div class="userdata">
		<div class="controls">
			<?php if ($params->get('showspecies')): ?>
				<label for="form-petpoint-species"><?php echo JText::_('COM_PETPOINT_SPECIES_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $speciesOpts, 'form-petpoint-species', 'class="form-control"', 'value', 'text', $params->get('species')); ?>
			<?php endif;?>
			<?php if ($params->get('showsex')): ?>
				<label for="form-petpoint-sex"><?php echo JText::_('COM_PETPOINT_SEX_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $sexOpts, 'form-petpoint-sex', 'class="form-control"', 'value', 'text', $params->get('sex')); ?>
			<?php endif; ?>
			<?php if ($params->get('showagegroup')): ?>
				<label for="form-petpoint-agegroup"><?php echo JText::_('COM_PETPOINT_AGEGROUP_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $agegroupOpts, 'form-petpoint-agegroup', 'class="form-control"', 'value', 'text', $params->get('agegroup')); ?>
			<?php endif; ?>
			<?php if ($params->get('showlocation')): ?>
				<div class="form-group">
    				<label for="form-petpoint-location"><?php echo JText::_('COM_PETPOINT_LOCATION_LABEL')?></label>
    				<input type="text" class="form-control" name="form-petpoint-location" value="<?php echo $params->get('location'); ?>" />
  				</div>
			<?php endif; ?>
			<?php if ($params->get('showsite')): ?>
				<div class="form-group">
    				<label for="form-petpoint-site"><?php echo JText::_('COM_PETPOINT_SITE_LABEL')?></label>
    				<input type="text" class="form-control" name="form-petpoint-site" value="<?php echo $params->get('site'); ?>" />
  				</div>
			<?php endif; ?>
			<?php if ($params->get('showonhold')): ?>
				<label for="form-petpoint-onhold"><?php echo JText::_('COM_PETPOINT_ONHOLD_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $onholdOpts, 'form-petpoint-onhold', 'class="form-control"', 'value', 'text', $params->get('onhold')); ?>
			<?php endif; ?>
			<?php if ($params->get('showorderby')): ?>
				<label for="form-petpoint-orderby"><?php echo JText::_('COM_PETPOINT_ORDERBY_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $orderbyOpts, 'form-petpoint-orderby', 'class="form-control"', 'value', 'text', $params->get('orderby')); ?>
			<?php endif; ?>
			</div>
		<div id="form-petpoint-submit" class="control-group">
			<div class="controls">
				<button type="submit" tabindex="0" name="submit" id="submit" class="btn btn-primary"><?php echo JText::_('COM_PETPOINT_SEARCH_LABEL') ?></button>
			</div>
		</div>
	</div>
</form>
<iframe id="petpoint-search" width="<?php echo $params->get('ppwidth'); ?>" height="<?php echo $params->get('ppheight'); ?>" src="<?php echo $params->get('url') . '?' . http_build_query($queryParms); ?>"></iframe>
<?php endif; ?>
<script>
jQuery(function($) {
	$('#submit').click(function(ev){ 
		// suppress default action
		ev.preventDefault();

		// collect query string
		var parms = {
				species: $('#form-petpoint-species').val(),
				sex: $('#form-petpoint-sex').val(),
				agegroup: $('#form-petpoint-agegroup').val(),
				location: $('#form-petpoint-location').val(),
				site: $('#form-petpoint-site').val(),
				onhold: $('#form-petpoint-onhold').val(),
				orderby: $('#form-petpoint-orderby').val(),
				colnum: "<?php echo $params->get('colnum'); ?>",
				authkey: "<?php echo $params->get('authkey'); ?>",
				detailsinpopup: "<?php echo $params->get('detailsinpopup'); ?>"
		};
		var queryString = $.param(parms);

		var url = "<?php echo $params->get('url'); ?>" + '?' + queryString;
		$('#petpoint-search').attr('src', url);
	});
});
</script>