<?php
App::uses('Plane', 'Model');

/**
 * Plane Test Case
 *
 */
class PlaneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plane',
		'app.beneficiario',
		'app.comision'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plane = ClassRegistry::init('Plane');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plane);

		parent::tearDown();
	}

}
