<?php
App::uses('Oficina', 'Model');

/**
 * Oficina Test Case
 *
 */
class OficinaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.oficina',
		'app.secperson',
		'app.secassign',
		'app.secproject',
		'app.secorganization',
		'app.secrole',
		'app.secpassword',
		'app.cmc',
		'app.grupo',
		'app.administradore',
		'app.docente',
		'app.escuela',
		'app.facultade',
		'app.direccione',
		'app.historialdocumento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Oficina = ClassRegistry::init('Oficina');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Oficina);

		parent::tearDown();
	}

}
