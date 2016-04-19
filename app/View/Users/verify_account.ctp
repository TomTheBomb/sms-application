<div id="sign_in2">
        <div class="container">
            <h3>Register</h3>
            <div class="row login">
                <div class="span6 signin_box">
                     <div class="box">
                        <div class="box_cont">
                            <div class="social">
                                <h4>Verify your Account</h4>
                            </div>

                            <div class="form">
				<?php echo $this->Form->create('User'); ?>
				    <?php 
					echo $this->Form->input('code', array('placeholder' => 'Code', 'label' => false));
				    ?>
                                    <div class="forgot">
                                        <span>Didn't receive the code?</span>
                                        <?php echo $this->Html->link('Resend it', array('controller' => 'users', 'action' => 'verifyAccount'), array('resend' => true)); ?></a>
                                    </div>
				<?php echo $this->Form->end(__('Verify')); ?>
                            </div>

                        </div>
                    </div>
		</div>
            </div>
        </div>
    </div>
