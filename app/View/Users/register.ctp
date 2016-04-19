<div id="sign_in2">
        <div class="container">
            <h3>Register</h3>
            <div class="row login">
                <div class="span5 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">
                            	<h4>Register a new account</h4>
			    </div>

                            <div class="form">
				<div class="alert alert-error">
					<ul>
					<li>Free plan is only available during Beta.</li>
					<li>Australian mobiles are currently only supported.</li>
					</ul>
				</div>
                <?php 
					echo $this->Form->create('User', array(
							'inputDefaults' => array(
								'error' => array('attributes' => array('class' => 'alert alert-error')),
							)
						)
					); 
				?>
				<?php $tnc = $this->Html->link('Terms of Use', array('controller' => 'pages', 'action' => 'terms'), array('class'=>'ext', 'target'=>'_blank')); ?>
				<?php
					echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => false));
					echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => false));
					echo $this->Form->input('confirm_password', array('placeholder' => 'Confirm Password', 'label' => false, 'type' => 'password'));
				    echo $this->Form->input('number', array('placeholder' => 'Mobile Number', 'label' => false));
				    echo $this->Form->input('sms_plan_id', array('options' => array(1 => 'Free Plan (*7 Free SMS)'), 'label' => false, 'emtpy' => 'Plan'));
					echo $this->Form->input('agree', array('type' => 'checkbox', 'label' => 'I agree to the ' . $tnc));
				?>
				<div><small>Mobile number is required for verifying the account.</small></div>
					<?php echo $this->Form->end(__('Register')); ?>
			    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
