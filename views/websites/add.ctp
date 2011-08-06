<div class="websites form">
<?php echo $this->Form->create('Website');?>
	<fieldset>
		<legend><?php __('Add Website'); ?></legend>
	<?php
		echo $this->Form->input('aboutus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Websites', true), array('action' => 'index'));?></li>
	</ul>
</div>