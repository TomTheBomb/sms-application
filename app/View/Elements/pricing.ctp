<div id="in_pricing">
            <div class="section_header">
                <h3>Plans</h3>
            </div>

            <div class="row charts_wrapp">
                <!-- Plan Box -->
                <div class="span4">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Free</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">0</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>2</strong>
                                    Free SMS (To start)
                                </p>
                            </div>
			    	<?php 
					echo $this->Html->link('Register', 
						array('controller' => 'users', 'action' => 'register'), 
						array('class' => 'order')
					); 
				?>
                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="span4 pro">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Pro</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">30</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>10</strong>
                                    Free SMS (To start)
				</p>
                                <p>Contact List</p>
                                <p>Mass Sending</p>
                            	<p>API Access</p>
                                <p>Scheduled Messaging</p>
				<p>MMS</p>
			    </div>
                        	<?php
                                        echo $this->Html->link('Register',
                                                array('controller' => 'users', 'action' => 'register'), 
                                                array('class' => 'order')
                                        );
                                ?>
			</div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="span4 standar">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Standard</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">10</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>5</strong>
                                    Free SMS (To start)
                                </p>
                            	<p>Contact List</p>
				<p>Mass Sending</p>
				<p>API Access</p>
			    </div>
                        	<?php
                                        echo $this->Html->link('Register',
                                                array('controller' => 'users', 'action' => 'register'), 
                                                array('class' => 'order')
                                        );
                                ?>
			</div>
                    </div>
                </div>
            </div>
    </div>
