<div class="smsOutboxes view">
<h2><?php  echo __('Sms Outbox'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contents'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($smsOutbox['User']['id'], array('controller' => 'users', 'action' => 'view', $smsOutbox['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Send Datetime'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['send_datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($smsOutbox['SmsOutbox']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sms Outbox'), array('action' => 'edit', $smsOutbox['SmsOutbox']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sms Outbox'), array('action' => 'delete', $smsOutbox['SmsOutbox']['id']), null, __('Are you sure you want to delete # %s?', $smsOutbox['SmsOutbox']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sms Outboxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sms Outbox'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
