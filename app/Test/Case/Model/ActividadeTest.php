<?php
App::uses('Actividade', 'Model');

/**
 * Actividade Test Case
 *
 */
class ActividadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.actividade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Actividade = ClassRegistry::init('Actividade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Actividade);

		parent::tearDown();
	}

}
