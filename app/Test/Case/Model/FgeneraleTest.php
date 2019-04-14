<?php
App::uses('Fgenerale', 'Model');

/**
 * Fgenerale Test Case
 *
 */
class FgeneraleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fgenerale',
		'app.criterio',
		'app.estandar'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fgenerale = ClassRegistry::init('Fgenerale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fgenerale);

		parent::tearDown();
	}

}
