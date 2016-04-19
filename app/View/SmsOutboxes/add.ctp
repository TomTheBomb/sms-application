<div class="smsOutboxes form span5">
<?php 
	echo $this->Form->create('SmsOutbox', array(
		'inputDefaults' => array(
			'error' => array('attributes' => array('class' => 'alert alert-error')),
		),
	)); 	
?>
	<fieldset>
		<legend><?php echo __('Send SMS'); ?></legend>
	<?php
		echo $this->Form->input('from');
		echo $this->Form->input('to');
		echo $this->Form->input('send_datetime', array('label' => 'Delivery Date', 'after' => '<small class="span5">Leaving as is delivers straight away</small>'));	
		echo $this->Form->input('contents', array('label' => 'Message'));
	?>
	</fieldset>
<?php
	$options = array(
		'label' => __('Send'),
		'class' => 'btn btn-success',
	);
?>
<?php echo $this->Form->end($options); ?>
</div>
