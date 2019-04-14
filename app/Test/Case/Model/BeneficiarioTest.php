<?php
App::uses('Beneficiario', 'Model');

/**
 * Beneficiario Test Case
 *
 */
class BeneficiarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.beneficiario',
		'app.plane'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Beneficiario = ClassRegistry::init('Beneficiario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Beneficiario);

		parent::tearDown();
	}

}
