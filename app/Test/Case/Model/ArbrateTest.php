<?php
App::uses('Arbrate', 'Model');

/**
 * Arbrate Test Case
 */
class ArbrateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arbrate',
		'app.arbperson',
		'app.arbubigeo',
		'app.arbpeople_arbrate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Arbrate = ClassRegistry::init('Arbrate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Arbrate);

		parent::tearDown();
	}

}
