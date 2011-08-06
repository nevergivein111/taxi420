<div class="singles form">
<?php echo $this->Form->create('Single');?>
	<fieldset>
 		<legend><?php __('Admin Add Single'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('sex');
		echo $this->Form->input('city_id');
		echo $this->Form->input('age');
		echo $this->Form->input('details');
		echo $this->Form->input('wantToMarry');
		echo $this->Form->input('wantToFlirt');
		echo $this->Form->input('wantToRelationship');
		echo $this->Form->input('dontKnow');
		echo $this->Form->input('picture_id');
		echo $this->Form->input('photo');
		echo $this->Form->input('video');
		echo $this->Form->input('eyes');
		echo $this->Form->input('hairs');
		echo $this->Form->input('bodyType');
		echo $this->Form->input('weight');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Singles', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('controller' => 'pictures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('controller' => 'pictures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>