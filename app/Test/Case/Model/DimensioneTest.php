<?php
App::uses('Dimensione', 'Model');

/**
 * Dimensione Test Case
 *
 */
class DimensioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dimensione',
		'app.cmc',
		'app.cmcs_dimensione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dimensione = ClassRegistry::init('Dimensione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dimensione);

		parent::tearDown();
	}

}
