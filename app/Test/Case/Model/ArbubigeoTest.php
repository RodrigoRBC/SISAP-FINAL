<?php
App::uses('Arbubigeo', 'Model');

/**
 * Arbubigeo Test Case
 */
class ArbubigeoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arbubigeo',
		'app.arbperson',
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
		$this->Arbubigeo = ClassRegistry::init('Arbubigeo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Arbubigeo);

		parent::tearDown();
	}

}
