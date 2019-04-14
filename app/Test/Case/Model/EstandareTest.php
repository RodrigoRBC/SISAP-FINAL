<?php
App::uses('Estandare', 'Model');

/**
 * Estandare Test Case
 *
 */
class EstandareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estandare',
		'app.factor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Estandare = ClassRegistry::init('Estandare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estandare);

		parent::tearDown();
	}

}
