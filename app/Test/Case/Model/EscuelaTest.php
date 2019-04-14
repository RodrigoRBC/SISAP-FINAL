<?php
App::uses('Escuela', 'Model');

/**
 * Escuela Test Case
 *
 */
class EscuelaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.escuela',
		'app.facultad',
		'app.grupo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Escuela = ClassRegistry::init('Escuela');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Escuela);

		parent::tearDown();
	}

}
