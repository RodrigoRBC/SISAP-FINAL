<?php
App::uses('Fdesagregada', 'Model');

/**
 * Fdesagregada Test Case
 *
 */
class FdesagregadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fdesagregada',
		'app.fgeneral'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fdesagregada = ClassRegistry::init('Fdesagregada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fdesagregada);

		parent::tearDown();
	}

}
