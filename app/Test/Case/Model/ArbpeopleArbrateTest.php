<?php
App::uses('ArbpeopleArbrate', 'Model');

/**
 * ArbpeopleArbrate Test Case
 */
class ArbpeopleArbrateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arbpeople_arbrate',
		'app.arbperson',
		'app.arbubigeo',
		'app.arbrate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArbpeopleArbrate = ClassRegistry::init('ArbpeopleArbrate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArbpeopleArbrate);

		parent::tearDown();
	}

}
