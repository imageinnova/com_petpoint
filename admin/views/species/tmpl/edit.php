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

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_petpoint&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">
	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_PETPOINT_SPECIES_DETAILS'); ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php foreach ($this->form->getFieldset() as $field): ?>
                        <div class="control-group">
                            <div class="control-label"><?php echo $field->label; ?></div>
                            <div class="controls"><?php echo $field->input; ?></div>
                        </div> <!-- control-group -->
                    <?php endforeach; ?>
				</div> <!-- span6 -->
			</div> <!-- row-fluid -->
		</fieldset>
	</div> <!-- form-horizontal -->
	<input type="hidden" name="task" value="species.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>