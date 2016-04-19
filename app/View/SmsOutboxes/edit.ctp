<div class="smsOutboxes form">
<?php echo $this->Form->create('SmsOutbox'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sms Outbox'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('from');
		echo $this->Form->input('to');
		echo $this->Form->input('contents');
		echo $this->Form->input('type');
		echo $this->Form->input('user_id');
		echo $this->Form->input('send_datetime');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SmsOutbox.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SmsOutbox.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sms Outboxes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
