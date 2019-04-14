<?php
App::uses('Arbperson', 'Model');

/**
 * Arbperson Test Case
 */
class ArbpersonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arbperson',
		'app.arbubigeo',
		'app.arbrate',
		'app.arbpeople_arbrate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Arbperson = ClassRegistry::init('Arbperson');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Arbperson);

		parent::tearDown();
	}

}
