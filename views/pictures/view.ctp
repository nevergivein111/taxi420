<div class="pictures view">
<h2><?php  __('Picture');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $picture['Picture']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $picture['Picture']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Single'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($picture['Single']['name'], array('controller' => 'singles', 'action' => 'view', $picture['Single']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $picture['Picture']['size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $picture['Picture']['type']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Picture', true), array('action' => 'edit', $picture['Picture']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Picture', true), array('action' => 'delete', $picture['Picture']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $picture['Picture']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Singles', true), array('controller' => 'singles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Single', true), array('controller' => 'singles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Singles');?></h3>
	<?php if (!empty($picture['Single'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Sex'); ?></th>
		<th><?php __('City Id'); ?></th>
		<th><?php __('Age'); ?></th>
		<th><?php __('Details'); ?></th>
		<th><?php __('WantToMarry'); ?></th>
		<th><?php __('WantToFlirt'); ?></th>
		<th><?php __('WantToRelationship'); ?></th>
		<th><?php __('DontKnow'); ?></th>
		<th><?php __('Picture Id'); ?></th>
		<th><?php __('Photo'); ?></th>
		<th><?php __('Video'); ?></th>
		<th><?php __('Eyes'); ?></th>
		<th><?php __('Hairs'); ?></th>
		<th><?php __('BodyType'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($picture['Single'] as $single):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $single['id'];?></td>
			<td><?php echo $single['name'];?></td>
			<td><?php echo $single['sex'];?></td>
			<td><?php echo $single['city_id'];?></td>
			<td><?php echo $single['age'];?></td>
			<td><?php echo $single['details'];?></td>
			<td><?php echo $single['wantToMarry'];?></td>
			<td><?php echo $single['wantToFlirt'];?></td>
			<td><?php echo $single['wantToRelationship'];?></td>
			<td><?php echo $single['dontKnow'];?></td>
			<td><?php echo $single['picture_id'];?></td>
			<td><?php echo $single['photo'];?></td>
			<td><?php echo $single['video'];?></td>
			<td><?php echo $single['eyes'];?></td>
			<td><?php echo $single['hairs'];?></td>
			<td><?php echo $single['bodyType'];?></td>
			<td><?php echo $single['weight'];?></td>
			<td><?php echo $single['date'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'singles', 'action' => 'view', $single['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'singles', 'action' => 'edit', $single['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'singles', 'action' => 'delete', $single['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $single['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Single', true), array('controller' => 'singles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
