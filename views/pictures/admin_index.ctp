<div class="pictures index">
	<h2><?php __('Pictures');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('single_id');?></th>
			<th><?php echo $this->Paginator->sort('size');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pictures as $picture):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $picture['Picture']['id']; ?>&nbsp;</td>
		<td><?php echo $picture['Picture']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($picture['Single']['name'], array('controller' => 'singles', 'action' => 'view', $picture['Single']['id'])); ?>
		</td>
		<td><?php echo $picture['Picture']['size']; ?>&nbsp;</td>
		<td><?php echo $picture['Picture']['type']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $picture['Picture']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $picture['Picture']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $picture['Picture']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $picture['Picture']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Picture', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Singles', true), array('controller' => 'singles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Single', true), array('controller' => 'singles', 'action' => 'add')); ?> </li>
	</ul>
</div>