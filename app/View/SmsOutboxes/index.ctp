<div class="smsOutboxes index">
	<h2><?php echo __('SMS Outbox'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-hover table-condensed">
	<tr>
			<th><?php echo $this->Paginator->sort('from'); ?></th>
			<th><?php echo $this->Paginator->sort('to'); ?></th>
			<th><?php echo $this->Paginator->sort('contents', 'Message'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('send_datetime', 'Delivery Date'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>
	<?php foreach ($smsOutboxes as $smsOutbox): ?>
	<tr>
		<td><?php echo h($smsOutbox['SmsOutbox']['from']); ?>&nbsp;</td>
		<td><?php echo h($smsOutbox['SmsOutbox']['to']); ?>&nbsp;</td>
		<td><?php echo h($smsOutbox['SmsOutbox']['contents']); ?>&nbsp;</td>
		<td><?php echo h(strtoupper($smsOutbox['SmsOutbox']['type'])); ?>&nbsp;</td>
		<td><?php echo h(date('Y-m-d H:i', strtotime($smsOutbox['SmsOutbox']['send_datetime']))); ?>&nbsp;</td>
		<td><?php echo ucfirst(h($smsOutbox['SmsOutbox']['status'])); ?>&nbsp;</td>
		<td><?php echo h(date('Y-m-d H:i', strtotime($smsOutbox['SmsOutbox']['created']))); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
