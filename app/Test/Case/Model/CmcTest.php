<?php
App::uses('Cmc', 'Model');

/**
 * Cmc Test Case
 *
 */
class CmcTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cmc',
		'app.grupo',
		'app.administradore',
		'app.docente',
		'app.escuela',
		'app.facultade',
		'app.direccione',
		'app.dimensione',
		'app.cmcs_dimensione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cmc = ClassRegistry::init('Cmc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cmc);

		parent::tearDown();
	}

}
