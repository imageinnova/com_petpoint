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

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_petpoint&view=petpoint'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid">
		<div class="span6">
			<?php echo JText::_('COM_PETPOINT_PETPOINT_FILTER'); ?>
			<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
		</div> <!-- span6 -->
    </div> <!-- row-fluid -->
   	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th width="1%"><?php echo JText::_('COM_PETPOINT_NUM'); ?></th>
				<th width="2%"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th width="90%"><?php echo JHtml::_('grid.sort', 'COM_PETPOINT_HEADING_DESCRIPTION', 'description', $listDirn, $listOrder); ?></th>
				<th width="5%"><?php echo JHtml::_('grid.sort', 'COM_PETPOINT_PUBLISHED', 'published', $listDirn, $listOrder); ?></th>
				<th width="2%"><?php echo JHtml::_('grid.sort', 'COM_PETPOINT_ID', 'id', $listDirn, $listOrder); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
		</tfoot>
		<tbody>
		<?php if (!empty($this->items)) : ?>
			<?php foreach ($this->items as $i => $row) :
				$link = JRoute::_('index.php?option=com_petpoint&task=species.edit&id=' . $row->id);
			?>
			<tr>
				<td><?php echo $this->pagination->getRowOffset($i); ?></td>
				<td><?php echo JHtml::_('grid.id', $i, $row->id); ?></td>
				<td><a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_PETPOINT_EDIT_SPECIES'); ?>"><?php echo $row->description; ?></a></td>
				<td align="center"><?php echo JHtml::_('jgrid.published', $row->published, $i, 'petpoint.', true, 'cb'); ?></td>
				<td align="center"><?php echo $row->id; ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>