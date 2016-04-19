<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>SPOOF.im - Affordable SMS & MMS Solutions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Spoof.im offers affordable SMS & MMS solutions">
	<meta name="keywords" content="sms, mms, sms marketing, mms marketing, sms clubs, sms spoofing, spoof sms, mobile marketing, sms messaging software, sms marketing tools, free sms, free mms">

	<meta property="og:title" content="Affordable SMS & MMS solutions | Spoof.im" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Spoof.im" />
	<meta property="og:image" content="http://spoof.im/img/logo.png" /> 
	<meta property="og:description" content="Spoof.im offers affordable SMS & MMS solutions" /> 
	<meta property="og:url" content="http://spoof.im/"> 
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('theme');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
	//	echo $this->Html->css('pricing');
		echo $this->Html->css(array('lib/flexslider', 'lib/animate'));
	//	echo $this->Html->css('services');
		echo $this->Html->css('sign-in');
		echo $this->Html->css('misc');	
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style="padding-top: 0px;">
	<?php echo $this->element('menu'); ?>
	<div class="container">
		<div class="row">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Html->script(array('http://code.jquery.com/jquery-latest.js', 'theme')); ?>
</body>
</html>
