<div class="chats form">
<?php echo $this->Form->create('Chat');?>
	<fieldset>
 		<legend><?php __('Edit Chat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->input('user_id');
		echo $this->Form->input('toUser');
		echo $this->Form->input('refid');
		echo $this->Form->input('read');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Chat.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Chat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chats', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>