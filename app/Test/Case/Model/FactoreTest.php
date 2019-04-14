<?php
App::uses('Factore', 'Model');

/**
 * Factore Test Case
 *
 */
class FactoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factore',
		'app.dimensione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Factore = ClassRegistry::init('Factore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Factore);

		parent::tearDown();
	}

}
