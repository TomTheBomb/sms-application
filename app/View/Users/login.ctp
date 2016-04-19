<div id="sign_in2">
        <div class="container">
            <h3>Login</h3>
            <div class="row login">
                <div class="span6 signin_box">
                     <div class="box">
                        <div class="box_cont">
                            <div class="social">
                                <h4>Login to your account</h4>
                            </div>

                            <div class="form">
				<?php echo $this->Form->create('User'); ?>
				    <?php 
					echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => false));
        				echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => false));
				    ?>
                                    <div class="forgot">
                                        <span>Forgot your password?</span>
                                        <?php echo $this->Html->link('Reset it', array('controller' => 'users', 'action' => 'resetPassword')); ?></a>
                                    </div>
				<?php echo $this->Form->end(__('Login')); ?>
                            </div>

                        </div>
                    </div>
		</div>
            </div>
        </div>
    </div>
