<?php
App::uses('Criterio', 'Model');

/**
 * Criterio Test Case
 *
 */
class CriterioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.criterio',
		'app.estandar',
		'app.fgenerale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Criterio = ClassRegistry::init('Criterio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Criterio);

		parent::tearDown();
	}

}
