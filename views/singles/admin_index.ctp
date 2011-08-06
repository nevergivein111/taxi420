<div class="singles index">
	<h2><?php __('Singles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('sex');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('age');?></th>
			<th><?php echo $this->Paginator->sort('details');?></th>
			<th><?php echo $this->Paginator->sort('wantToMarry');?></th>
			<th><?php echo $this->Paginator->sort('wantToFlirt');?></th>
			<th><?php echo $this->Paginator->sort('wantToRelationship');?></th>
			<th><?php echo $this->Paginator->sort('dontKnow');?></th>
			<th><?php echo $this->Paginator->sort('picture_id');?></th>
			<th><?php echo $this->Paginator->sort('photo');?></th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('eyes');?></th>
			<th><?php echo $this->Paginator->sort('hairs');?></th>
			<th><?php echo $this->Paginator->sort('bodyType');?></th>
			<th><?php echo $this->Paginator->sort('weight');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($singles as $single):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $single['Single']['id']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['name']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['sex']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($single['City']['name'], array('controller' => 'cities', 'action' => 'view', $single['City']['id'])); ?>
		</td>
		<td><?php echo $single['Single']['age']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['details']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['wantToMarry']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['wantToFlirt']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['wantToRelationship']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['dontKnow']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($single['Picture']['name'], array('controller' => 'pictures', 'action' => 'view', $single['Picture']['id'])); ?>
		</td>
		<td><?php echo $single['Single']['photo']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['video']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['eyes']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['hairs']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['bodyType']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['weight']; ?>&nbsp;</td>
		<td><?php echo $single['Single']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $single['Single']['id'])); ?>
		
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $single['Single']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $single['Single']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $single['Single']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Single', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('controller' => 'pictures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('controller' => 'pictures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>