<?php
App::uses('SmsOutbox', 'Model');

/**
 * SmsOutbox Test Case
 *
 */
class SmsOutboxTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sms_outbox',
		'app.user',
		'app.sms_plan',
		'app.contact',
		'app.credit_history',
		'app.credit'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SmsOutbox = ClassRegistry::init('SmsOutbox');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SmsOutbox);

		parent::tearDown();
	}

}
