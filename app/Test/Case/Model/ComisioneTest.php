<?php
App::uses('Comisione', 'Model');

/**
 * Comisione Test Case
 *
 */
class ComisioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comisione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comisione = ClassRegistry::init('Comisione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comisione);

		parent::tearDown();
	}

}
