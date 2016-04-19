<div class="navbar navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="/">
				<img src="/img/flag_aus.gif" alt="Aus" title="Australian mobiles are only supported at this stage."/>
				<strong>SPOOF.im</strong>
				<em>BETA</em>
			</a>
			<ul class="nav nav-pills">
				<li><?php //echo $this->Html->link('Contact', array('controller' => 'pages', 'action' => 'contact')); ?></a></li>
				<li><?php //echo $this->Html->link('Terms', array('controller' => 'pages', 'action' => 'faqs')); ?>
				<?php if (!$this->Session->read('Auth.User')) : ?>
					<li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li>
					<li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
				<?php else : ?>
					<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>	
					<li><?php echo $this->Html->link('Send', array('controller' => 'SmsOutboxes', 'action' => 'add')); ?></li>
					<li><?php echo $this->Html->link('Outbox', array('controller' => 'SmsOutboxes', 'action' => 'index')); ?></li>
					<?php if (in_array($this->Session->read('Auth.User.email'), Configure::read('Admin.emails'))) : ?>
						<li><?php echo $this->Html->link('Admin', '/admin'); ?></li>
					<?php endif; ?>
				<?php endif; ?>
			<?php if ($this->Session->read('Auth.User')) : ?>
				<li><span class="badge badge-inverse" title="SMS Credit Available">Credit:<?php echo $creditAmount; ?></span></li>
			<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
