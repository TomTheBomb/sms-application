<?php
App::uses('Credit', 'Model');

/**
 * Credit Test Case
 *
 */
class CreditTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.credit',
		'app.user',
		'app.sms_plan',
		'app.contact',
		'app.credit_history',
		'app.sms_outbox'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Credit = ClassRegistry::init('Credit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Credit);

		parent::tearDown();
	}

}
