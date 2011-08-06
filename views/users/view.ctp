<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id :'); ?><?php echo $user['User']['id']; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username :'); ?><?php echo $user['User']['username']; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password :'); ?><?php echo $user['User']['password']; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email :'); ?> <?php echo $user['User']['email']; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			&nbsp;
		</dd>
	</dl>
</div>

