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
	if ($params->get('pretext')): 
?>
<div class="pretext"><?php echo $params->get('pretext');?></div>
	<?php endif; ?>
<form action="#" method="get" id="form-petpoint" class="form-inline">
	<div class="controls">
		<?php if ($params->get('showspecies')): ?>
			<div class="form-group">
				<label for="form-petpoint-species"><?php echo JText::_('COM_PETPOINT_SPECIES_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $this->speciesOptions, 'form-petpoint-species', 'class="form-control"', 'value', 'text', $params->get('species')); ?>
			</div> <!-- form-group -->
		<?php endif;?>
		<?php if ($params->get('showsex')): ?>
			<div class="form-group">
				<label for="form-petpoint-sex"><?php echo JText::_('COM_PETPOINT_SEX_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $this->sexOptions, 'form-petpoint-sex', 'class="form-control"', 'value', 'text', $params->get('sex')); ?>
			</div> <!-- form-group -->
		<?php endif; ?>
		<?php if ($params->get('showagegroup')): ?>
			<div class="form-group">
				<label for="form-petpoint-agegroup"><?php echo JText::_('COM_PETPOINT_AGEGROUP_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $this->ageGroupOptions, 'form-petpoint-agegroup', 'class="form-control"', 'value', 'text', $params->get('agegroup')); ?>
			</div> <!-- form-group -->
		<?php endif; ?>
		<?php if ($params->get('showlocation')): ?>
				<div class="form-group">
    				<label for="form-petpoint-location"><?php echo JText::_('COM_PETPOINT_LOCATION_LABEL')?></label>
    				<input type="text" class="form-control" name="form-petpoint-location" value="<?php echo $params->get('location'); ?>" />
  				</div> <!-- form-group -->
		<?php endif; ?>
		<?php if ($params->get('showsite')): ?>
				<div class="form-group">
    				<label for="form-petpoint-site"><?php echo JText::_('COM_PETPOINT_SITE_LABEL')?></label>
    				<input type="text" class="form-control" name="form-petpoint-site" value="<?php echo $params->get('site'); ?>" />
  				</div> <!-- form-group -->
		<?php endif; ?>
		<?php if ($params->get('showonhold')): ?>
			<div class="form-group">
				<label for="form-petpoint-onhold"><?php echo JText::_('COM_PETPOINT_ONHOLD_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $this->onHoldOptions, 'form-petpoint-onhold', 'class="form-control"', 'value', 'text', $params->get('onhold')); ?>
			</div> <!-- form-group -->
		<?php endif; ?>
		<?php if ($params->get('showorderby')): ?>
			<div class="form-group">
				<label for="form-petpoint-orderby"><?php echo JText::_('COM_PETPOINT_ORDERBY_LABEL'); ?></label>
				<?php echo JHtml::_('select.genericlist', $this->orderByOptions, 'form-petpoint-orderby', 'class="form-control"', 'value', 'text', $params->get('orderby')); ?>
			</div> <!-- form-group -->
		<?php endif; ?>
	</div> <!-- controls -->
	<div id="form-petpoint-submit" class="control-group">
		<div class="controls">
			<button type="submit" tabindex="0" name="submit" id="submit" class="btn btn-primary"><?php echo JText::_('COM_PETPOINT_SEARCH_LABEL') ?></button>
		</div> <!-- controls -->
	</div> <!-- control-group -->
</form>
<?php /* src will be set at run time in client */ ?>
<iframe id="petpoint-search" width="<?php echo $params->get('ppwidth'); ?>" height="<?php echo $params->get('ppheight'); ?>"></iframe>
<?php if ($params->get('posttext')): ?>
<div class="posttext"><?php echo $params->get('posttext');?></div>
<?php 
	endif; 
endif; 
?>
<script>
jQuery(function($) {
	function setUrl() {
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
				detailsinpopup: "<?php echo $params->get('detailsinpopup'); ?>",
				css: "<?php echo $params->get('css'); ?>"
		};

		// adjust number of columns if device is mobile and config is higher
	    var isMobile = window.matchMedia("only screen and (max-width: 760px)");

		if (isMobile.matches && parms.colnum > 2) {
			parms.colnum = 2;
		}
	
		var queryString = $.param(parms);

		var url = "<?php echo $params->get('url'); ?>" + '?' + queryString;
		$('#petpoint-search').attr('src', url);
	}
	
	$( document ).ready(function() {      
	    setUrl();
	 });

	$('#submit').click(function(ev){ 
		// suppress default action
		ev.preventDefault();
		setUrl();
	});
});
</script>